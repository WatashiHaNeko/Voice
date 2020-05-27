<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Exception\Exception as AppException;

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
}

