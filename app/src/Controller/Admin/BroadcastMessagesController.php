<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Exception\Exception as AppException;

class BroadcastMessagesController extends AdminController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Broadcasts');
  }

  public function create(string $broadcastId) {
    $broadcast = $this->Broadcasts->find()
        ->where([
          ['Broadcasts.id' => $broadcastId],
        ])
        ->first();

    if (empty($broadcast)) {
      $this->Flash->error(__('Failed to find Broadcast.'));

      return $this->redirect([
        'controller' => 'Broadcasts',
        'action' => 'index',
      ]);
    }

    $broadcastMessage = null;

    if ($this->request->is(['post'])) {
      try {
        $broadcastMessage = $this->BroadcastMessages->newEntity([
          'broadcast_id' => $broadcast['id'],
          'message' => $this->request->getData('message'),
        ]);

        $broadcastSaved = $this->BroadcastMessages->save($broadcastMessage);

        if (!$broadcastSaved) {
          throw new AppException(__('Failed to save BroadcastMessage.'));
        }

        $this->Flash->success(__('Created new BroadcastMessage.'));

        return $this->redirect([
          'action' => 'index',
          $broadcast['id'],
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    $this->set(compact([
      'broadcast',
      'broadcastMessage',
    ]));
  }

  public function index(string $broadcastId) {
    $broadcast = $this->Broadcasts->find()
        ->contain([
          'BroadcastMessages',
        ])
        ->where([
          ['Broadcasts.id' => $broadcastId],
        ])
        ->first();

    if (empty($broadcast)) {
      $this->Flash->error(__('Failed to find Broadcast.'));

      return $this->redirect([
        'controller' => 'Broadcasts',
        'action' => 'index',
      ]);
    }

    $this->set(compact([
      'broadcast',
    ]));
  }

  public function delete(string $broadcastId, string $id) {
    $broadcast = $this->Broadcasts->find()
        ->where([
          ['Broadcasts.id' => $broadcastId],
        ])
        ->first();

    if (empty($broadcast)) {
      $this->Flash->error(__('Failed to find Broadcast.'));

      return $this->redirect([
        'controller' => 'Broadcasts',
        'action' => 'index',
      ]);
    }

    if ($this->request->is(['delete'])) {
      try {
        $broadcastMessage = $this->BroadcastMessages->find()
            ->where([
              ['BroadcastMessages.broadcast_id' => $broadcast['id']],
              ['BroadcastMessages.id' => $id],
            ])
            ->first();

        if (empty($broadcastMessage)) {
          throw new AppException(__('Failed to find BroadcastMessage.'));
        }

        $broadcastMessageDeleted = $this->BroadcastMessages->delete($broadcastMessage);

        if (!$broadcastMessageDeleted) {
          throw new AppException(__('Failed to delete BroadcastMessage.'));
        }

        $this->Flash->success(__('Deleted BroadcastMessage.'));
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    return $this->redirect([
      'action' => 'index',
      $broadcast['id'],
    ]);
  }
}

