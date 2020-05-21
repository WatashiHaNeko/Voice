<?php
declare(strict_types=1);

namespace App\Controller\Admin;

class HomeController extends AdminController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Users');
    $this->loadModel('MessageSchedules');
  }

  public function index() {
    $usersCreatedList = $this->Users->find()
        ->select(['created'])
        ->order(['created' => 'desc'])
        ->extract('created')
        ->toList();

    $messageSchedules = $this->MessageSchedules->find()
        ->select([
          'scheduled_time',
          'scheduled_weekday_1',
          'scheduled_weekday_2',
          'scheduled_weekday_3',
          'scheduled_weekday_4',
          'scheduled_weekday_5',
          'scheduled_weekday_6',
          'scheduled_weekday_7',
        ])
        ->enableHydration(false)
        ->toList();

    $this->set(compact([
      'messageSchedules',
      'usersCreatedList',
    ]));
  }
}

