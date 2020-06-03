<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Exception\Exception as AppException;
use Cake\Core\Configure;
use Cake\Http\Client;

class BroadcastsController extends AdminController {
  public function create() {
    $broadcast = null;

    if ($this->request->is(['post'])) {
      try {
        $broadcast = $this->Broadcasts->newEntity([
          'title' => $this->request->getData('title'),
        ]);

        $broadcastSaved = $this->Broadcasts->save($broadcast);

        if (!$broadcastSaved) {
          throw new AppException('Failed to save Broadcast.');
        }

        $this->Flash->success(__('Created new Broadcast.'));

        return $this->redirect([
          'action' => 'index',
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    $this->set(compact([
      'broadcast',
    ]));
  }

  public function index() {
    $broadcasts = $this->Broadcasts->find()
        ->order(['Broadcasts.created' => 'desc'])
        ->toList();

    $this->set(compact([
      'broadcasts',
    ]));
  }

  public function sendToAdminUsers(string $id) {
    $broadcast = $this->Broadcasts->find()
        ->contain([
          'BroadcastMessages',
        ])
        ->where([
          ['Broadcasts.id' => $id],
        ])
        ->first();

    if (empty($broadcast)) {
      $this->Flash->error(__('Failed to find Broadcast.'));

      return $this->redirect([
        'controller' => 'Broadcasts',
        'action' => 'index',
      ]);
    }

    if ($this->request->is(['post'])) {
      try {
        if (empty($broadcast['broadcast_messages'])) {
          throw new AppException(__('Failed to find BroadcastMessages'));
        }

        $requestBody = [
          'notificationDisabled' => true,
          'messages' => [],
        ];

        foreach ($broadcast['broadcast_messages'] as $broadcastMessage) {
          $requestBody['messages'][] = [
            'type' => 'text',
            'text' => $broadcastMessage['message'],
            'sender' => [
              'name' => __('お知らせ'),
            ],
          ];

          if (!empty($broadcastMessage['image_filename'])) {
            $requestBody['messages'][] = [
              'type' => 'image',
              'originalContentUrl' => $broadcastMessage->getImageUrl(true),
              'previewImageUrl' => $broadcastMessage->getImageUrl(),
              'sender' => [
                'name' => __('お知らせ'),
              ],
            ];
          }
        }

        $adminUsers = $this->Users->find()
            ->where([
              ['Users.id IN' => Configure::read('Admin.userIds')],
            ])
            ->toList();

        foreach ($adminUsers as $user) {
          $client = new Client();

          $response = $client->post(vsprintf('%s://%s/%s', [
            'https',
            implode('.', ['api', 'line', 'me']),
            implode('/', ['v2', 'bot', 'message', 'push']),
          ]), json_encode($requestBody + [
            'to' => $user['line_user_id'],
          ]), [
            'type' => 'json',
            'headers' => [
              'Authorization' => sprintf('Bearer %s', Configure::read('Line.OfficialAccount.channelAccessToken')),
            ],
          ]);

          if ($response->getStatusCode() !== 200) {
            throw new AppException(json_encode([
              'code' => $response->getStatusCode(),
              'body' => $response->getJson(),
            ], JSON_PRETTY_PRINT));
          }
        }

        $this->Flash->success(__('Sent messages to Admin Users.'));
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    return $this->redirect([
      'controller' => 'BroadcastMessages',
      'action' => 'index',
      $broadcast['id'],
    ]);
  }
}

