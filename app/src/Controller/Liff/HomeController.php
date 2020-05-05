<?php
declare(strict_types=1);

namespace App\Controller\Liff;

class HomeController extends LiffController {
  public function initialize(): void {
    parent::initialize();
  }

  public function index() {
  }

  public function auth() {
    if ($this->request->is(['post'])) {
      $lineUserId = $this->request->getData('line_user_id');

      if (!empty($lineUserId)) {
        $this->Auth->setUser([
          'lineUserId' => $lineUserId,
        ]);
      }

      return $this->redirect([
        'action' => 'index',
      ]);
    }
  }
}

