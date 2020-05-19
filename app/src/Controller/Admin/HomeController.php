<?php
declare(strict_types=1);

namespace App\Controller\Admin;

class HomeController extends AdminController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Users');
  }

  public function index() {
    $usersCreatedList = $this->Users->find()
        ->select(['created'])
        ->order(['created' => 'desc'])
        ->extract('created')
        ->toList();

    $this->set(compact([
      'usersCreatedList',
    ]));
  }
}

