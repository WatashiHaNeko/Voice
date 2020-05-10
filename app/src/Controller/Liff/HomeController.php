<?php
declare(strict_types=1);

namespace App\Controller\Liff;

use App\Exception\Exception as AppException;
use Cake\Core\Configure;

class HomeController extends LiffController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Users');
    $this->loadModel('Voices');

    $this->loadComponent('LineApi');
  }

  public function index() {
    $voices = [];

    if (!empty($this->authUser)) {
      $voices = $this->Voices->find()
          ->where([
            ['Voices.user_id' => $this->authUser['id']],
          ])
          ->toList();
    }

    $this->set(compact([
      'voices',
    ]));
  }

  public function auth() {
    if ($this->request->is(['post'])) {
      try {
        $lineAccessToken = $this->request->getData('line_access_token');

        if (empty($lineAccessToken)) {
          throw new AppException(__('LINEユーザー情報を取得できませんでした。'));
        }

        $isAccessTokenValid = $this->LineApi->setAccessToken($lineAccessToken);

        if (!$isAccessTokenValid) {
          throw new AppException(__('LINEユーザー情報を取得できませんでした。'));
        }

        $hasFriendshipWithOfficialAccount = $this->LineApi->checkFriendshipWithOfficialAccount();

        if (!$hasFriendshipWithOfficialAccount) {
          return $this->redirect([
            'action' => 'officialAccount',
          ]);
        }

        $lineUserProfile = $this->LineApi->getUserProfile();

        if (empty($lineUserProfile)) {
          throw new AppException(__('LINEユーザー情報を取得できませんでした。'));
        }

        $user = $this->Users->find()
            ->where([
              ['Users.line_user_id' => $lineUserProfile['userId']],
            ])
            ->first();

        if (empty($user)) {
          $user = $this->Users->newEntity([
            'line_user_id' => $lineUserProfile['userId'],
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

  public function officialAccount() {
  }

  public function help() {
  }
}

