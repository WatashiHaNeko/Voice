<?php
declare(strict_types=1);

namespace App\Controller\Liff;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Log\Log;

class LiffController extends AppController {
  public function initialize(): void {
    parent::initialize();

    $this->loadComponent('Auth');
  }

  public function beforeFilter(EventInterface $event): void {
    parent::beforeFilter($event);

    $this->Auth->allow();

    if ($this->request->getParam('controller') !== 'Home' || $this->request->getParam('action') !== 'auth') {
      if (empty($this->Auth->user())) {
        $this->redirect([
          'controller' => 'Home',
          'action' => 'auth',
        ]);
      }
    }

    $this->set('authUser', $this->Auth->user());
  }

  public function beforeRender(EventInterface $event): void {
    parent::beforeRender($event);

    $this->viewBuilder()
        ->setLayout('liff');
  }
}

