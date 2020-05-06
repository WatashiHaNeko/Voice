<?php
declare(strict_types=1);

namespace App\Controller\Liff;

use App\Exception\Exception as AppException;
use Cake\Datasource\ConnectionManager;

class VoicesController extends LiffController {
  public function create() {
    $voice = null;

    if ($this->request->is(['post'])) {
      try {
        ConnectionManager::get('default')->transactional(function ($connection) use (&$voice) {
          $voice = $this->Voices->newEntity([
            'user_id' => $this->authUser['id'],
            'name' => $this->request->getData('name'),
          ]);

          $voiceSaved = $this->Voices->save($voice);

          if (!$voiceSaved) {
            throw new AppException(__('ペットを登録できませんでした。'));
          }

          $avatarImageFile = $this->request->getData('avatar_image_file');

          if ($avatarImageFile->getError() !== UPLOAD_ERR_NO_FILE) {
            if ($avatarImageFile->getError() !== UPLOAD_ERR_OK) {
              throw new AppException(__('ペットを登録できませんでした。'));
            }

            $voice['avatar_image_media_type'] = $avatarImageFile->getClientMediaType();

            $voiceSaved = $this->Voices->save($voice);

            if (!$voiceSaved) {
              throw new AppException(__('ペットを登録できませんでした。'));
            }

            if (!file_exists($voice->getDirname())) {
              $isDirectoryMade = mkdir($voice->getDirname(), 0777, true);

              if (!$isDirectoryMade) {
                throw new AppException(__('ペットを登録できませんでした。'));
              }
            }

            $avatarImageFile->moveTo($voice->getAvatarImageFilepath());
          }
        });

        $this->Flash->success(__('{0}を新しく登録しました！', $voice['name']));

        return $this->redirect([
          'controller' => 'Home',
          'action' => 'index',
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      } catch (\Exception $exception) {
        $this->Flash->error(__('ペットを登録できませんでした。'));
      }
    }

    $this->set(compact([
      'voice',
    ]));
  }
}

