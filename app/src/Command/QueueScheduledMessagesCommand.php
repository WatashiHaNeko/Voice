<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\I18n\Time;
use Cake\Log\Log;

class QueueScheduledMessagesCommand extends Command {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('MessageSchedules');
    $this->loadModel('MessageQueues');
  }

  public function execute(Arguments $args, ConsoleIo $io) {
    $messageSchedules = $this->MessageSchedules->find()
        ->where([
          ['MessageSchedules.next_send_datetime <=' => Time::now()],
        ])
        ->order(['next_send_datetime' => 'asc'])
        ->toList();

    foreach ($messageSchedules as $messageSchedule) {
      $messageQueue = $this->MessageQueues->newEntity([
        'message_schedule_id' => $messageSchedule['id'],
      ]);

      $messageQueueSaved = $this->MessageQueues->save($messageQueue);

      if (!$messageQueueSaved) {
        Log::error(vsprintf('Failed to queue message. (%s)', [
          'message_queue' => $messageQueue,
        ]));

        continue;
      }

      $nextSendDatetime = (new Time($messageSchedule['next_send_datetime']))
          ->setTimezone('Asia/Tokyo')
          ->addDay(1);

      $weekdayCheckLoopLimit = 6;

      while (!$messageSchedule[sprintf('scheduled_weekday_%s', $nextSendDatetime->i18nFormat('e'))]) {
        $nextSendDatetime->addDay(1);

        if ($weekdayCheckLoopLimit-- === 0) {
          break;
        }
      }

      $this->MessageSchedules->patchEntity($messageSchedule, [
        'next_send_datetime' => $nextSendDatetime->setTimezone('UTC'),
      ]);

      $messageScheduleSaved = $this->MessageSchedules->save($messageSchedule);

      if (!$messageScheduleSaved) {
        Log::error(vsprintf('Failed to update message schedule. (%s)', [
          'message_schedule' => $messageSchedule,
        ]));
      }
    }
  }
}

