<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Core\Configure;
use Cake\Log\Log;

class AdminController extends AppController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Users');

    $this->loadComponent('Auth');
  }

  public function beforeFilter(EventInterface $event): void {
    parent::beforeFilter($event);

    $this->Auth->allow();

    if (empty($this->Auth->user('id')) || !in_array($this->Auth->user('id'), Configure::read('Admin.userIds'))) {
      $this->redirect([
        'prefix' => 'liff',
        'controller' => 'Home',
        'action' => 'auth',
      ]);
    }
  }

  public function beforeRender(EventInterface $event): void {
    parent::beforeRender($event);

    $this->viewBuilder()
        ->setLayout('admin');
  }
}

