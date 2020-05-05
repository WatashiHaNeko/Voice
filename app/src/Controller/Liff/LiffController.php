<?php
declare(strict_types=1);

namespace App\Controller\Liff;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class LiffController extends AppController {
  public function initialize(): void {
    parent::initialize();
  }

  public function beforeRender(EventInterface $event): void {
    parent::beforeRender($event);

    $this->viewBuilder()
        ->setLayout('liff');

    debug([
      'request' => $this->request,
    ]);
  }
}

