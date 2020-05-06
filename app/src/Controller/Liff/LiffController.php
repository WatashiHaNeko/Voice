<?php
declare(strict_types=1);

namespace App\Controller\Liff;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Log\Log;

class LiffController extends AppController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Users');

    $this->loadComponent('Auth');
  }

  public function beforeFilter(EventInterface $event): void {
    parent::beforeFilter($event);

    $this->Auth->allow();

    if ($this->request->getParam('controller') !== 'Home' || $this->request->getParam('action') !== 'auth') {
      if (empty($this->Auth->user('id'))) {
        $this->redirect([
          'controller' => 'Home',
          'action' => 'auth',
        ]);
      }
    }

    $this->authUser = null;

    if (!empty($this->Auth->user('id'))) {
      $this->authUser = $this->Users->find()
          ->where([
            ['Users.id' => $this->Auth->user('id')],
          ])
          ->first();
    }

    $this->set('authUser', $this->authUser);
  }

  public function beforeRender(EventInterface $event): void {
    parent::beforeRender($event);

    $this->viewBuilder()
        ->setLayout('liff');
  }
}

