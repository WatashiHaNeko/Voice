<?php
declare(strict_types=1);

namespace App\Controller\Liff;

use App\Exception\Exception as AppException;
use Cake\Datasource\ConnectionManager;

class VoicesController extends LiffController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('MessageSchedules');

    $this->loadComponent('File');
  }

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

            $this->File->deployVoiceAvatarImage($voice, $avatarImageFile);

            $voiceSaved = $this->Voices->save($voice);

            if (!$voiceSaved) {
              throw new AppException(__('ペットを登録できませんでした。'));
            }
          }
        });

        $this->Flash->success(__('{0}を新しく登録しました！', $voice['name']));

        return $this->redirect([
          'controller' => 'Voices',
          'action' => 'view',
          $voice['id'],
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

  public function view($id) {
    $voice = $this->Voices->find()
        ->contain([
          'MessageSchedules',
        ])
        ->where([
          ['Voices.user_id' => $this->authUser['id']],
          ['Voices.id' => $id],
        ])
        ->first();

    if (empty($voice)) {
      $this->Flash->error(__('ペットが見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    $this->set(compact([
      'voice',
    ]));
  }

  public function update($id) {
    $voice = $this->Voices->find()
        ->where([
          ['Voices.user_id' => $this->authUser['id']],
          ['Voices.id' => $id],
        ])
        ->first();

    if (empty($voice)) {
      $this->Flash->error(__('ペットが見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    if ($this->request->is(['put'])) {
      try {
        ConnectionManager::get('default')->transactional(function ($connection) use (&$voice) {
          $this->Voices->patchEntity($voice, [
            'name' => $this->request->getData('name'),
          ]);

          $voiceSaved = $this->Voices->save($voice);

          if (!$voiceSaved) {
            throw new AppException(__('ペットを登録できませんでした。'));
          }

          $avatarImageFile = $this->request->getData('avatar_image_file');

          if ($avatarImageFile->getError() !== UPLOAD_ERR_NO_FILE) {
            if ($avatarImageFile->getError() !== UPLOAD_ERR_OK) {
              throw new AppException(__('{0}の情報を更新できませんでした。', $voice['name']));
            }

            $voice['avatar_image_media_type'] = $avatarImageFile->getClientMediaType();

            $voiceSaved = $this->Voices->save($voice);

            if (!$voiceSaved) {
              throw new AppException(__('{0}の情報を更新できませんでした。', $voice['name']));
            }

            $this->File->deployVoiceAvatarImage($voice, $avatarImageFile);

            $voiceSaved = $this->Voices->save($voice);

            if (!$voiceSaved) {
              throw new AppException(__('{0}の情報を更新できませんでした。', $voice['name']));
            }
          }
        });

        $this->Flash->success(__('{0}の情報を更新しました！', $voice['name']));

        return $this->redirect([
          'controller' => 'Voices',
          'action' => 'view',
          $voice['id'],
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      } catch (\Exception $exception) {
        $this->Flash->error(__('{0}の情報を更新できませんでした。', $voice['name']));
      }
    }

    $this->set(compact([
      'voice',
    ]));
  }

  public function delete($id) {
    $voice = $this->Voices->find()
        ->where([
          ['Voices.user_id' => $this->authUser['id']],
          ['Voices.id' => $id],
        ])
        ->first();

    if (empty($voice)) {
      $this->Flash->error(__('ペットが見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    if ($this->request->is(['delete'])) {
      try {
        $voiceDeleted = $this->Voices->delete($voice);

        if (!$voiceDeleted) {
          throw new AppException(__('{0}の登録を解除できませんでした。', $voice['name']));
        }

        $this->MessageSchedules->deleteAll([
          ['MessageSchedules.user_id' => $this->authUser['id']],
          ['MessageSchedules.voice_id' => $id],
        ]);;

        $this->Flash->success(__('{0}の登録を解除しました。', $voice['name']));
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());

        return $this->redirect($this->request->referer());
      }
    }

    return $this->redirect([
      'controller' => 'Home',
      'action' => 'index',
    ]);
  }
}

