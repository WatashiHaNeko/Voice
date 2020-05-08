<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Core\Configure;
use Cake\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;

class SendMessagesCommand extends Command {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('MessageQueues');
  }

  public function execute(Arguments $args, ConsoleIo $io) {
    $messageQueues = $this->MessageQueues->find()
        ->contain([
          'MessageSchedules',
          'MessageSchedules.Voices',
          'MessageSchedules.Users',
        ])
        ->where([
          ['MessageQueues.sent_datetime IS' => null],
        ])
        ->toList();

    foreach ($messageQueues as $messageQueue) {
      $messageSchedule = !empty($messageQueue['message_schedule']) ? $messageQueue['message_schedule'] : null;

      if (empty($messageSchedule) || empty($messageSchedule['voice']) || empty($messageSchedule['user'])) {
        $this->MessageQueues->delete($messageQueue);

        continue;
      }

      $requestBody = [
        'to' => $messageSchedule['user']['line_user_id'],
        'messages' => [
          [
            'type' => 'text',
            'text' => $messageSchedule['message'],
            'sender' => [
              'name' => $messageSchedule['voice']['name'],
              'iconUrl' => $messageSchedule['voice']->getAvatarImageUrl(),
            ],
          ],
        ],
      ];

      $client = new Client();

      $response = $client->post(vsprintf('%s://%s/%s', [
        'https',
        implode('.', ['api', 'line', 'me']),
        implode('/', ['v2', 'bot', 'message', 'push']),
      ]), json_encode($requestBody), [
        'type' => 'json',
        'headers' => [
          'Authorization' => sprintf('Bearer %s', Configure::read('Line.OfficialAccount.channelAccessToken')),
        ],
      ]);

      if ($response->getStatusCode() !== 200) {
        Log::error(sprintf('Failed to send push line message. (%s)', json_encode([
          'code' => $response->getStatusCode(),
          'body' => $response->getJson(),
          'message_schedule' => $messageSchedule,
        ])));

        continue;
      }

      $this->MessageQueues->patchEntity($messageQueue, [
        'sent_datetime' => Time::now(),
      ]);

      $messageQueueSaved = $this->MessageQueues->save($messageQueue);

      if (!$messageQueueSaved) {
        Log::error(sprintf('Failed to update message queue. (%s)', json_encode([
          'message_queue' => $messageQueue,
        ])));
      }
    }
  }
}

