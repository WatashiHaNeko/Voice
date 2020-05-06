<?php
declare(strict_types=1);

namespace App\Controller\Liff;

use App\Exception\Exception as AppException;

class HomeController extends LiffController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Users');
  }

  public function index() {
  }

  public function auth() {
    if ($this->request->is(['post'])) {
      try {
        $lineUserId = $this->request->getData('line_user_id');

        if (empty($lineUserId)) {
          throw new AppException(__('LINEユーザー情報を取得できませんでした。'));
        }

        $user = $this->Users->find()
            ->where([
              ['Users.line_user_id' => $lineUserId],
            ])
            ->first();

        if (empty($user)) {
          $user = $this->Users->newEntity([
            'line_user_id' => $lineUserId,
          ]);

          $userSaved = $this->Users->save($user);

          if (!$userSaved) {
            throw new AppException(__('LINEユーザー情報を取得できませんでした。'));
          }
        }

        $this->Auth->setUser([
          'id' => $user['id'],
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }

      return $this->redirect([
        'action' => 'index',
      ]);
    }
  }
}

