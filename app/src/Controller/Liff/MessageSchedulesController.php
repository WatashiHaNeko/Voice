<?php
declare(strict_types=1);

namespace App\Controller\Liff;

use App\Exception\Exception as AppException;
use Cake\I18n\Time;

class MessageSchedulesController extends LiffController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('Voices');
  }

  public function create($voiceId) {
    $voice = $this->Voices->find()
        ->where([
          ['Voices.user_id' => $this->authUser['id']],
          ['Voices.id' => $voiceId],
        ])
        ->first();

    if (empty($voice)) {
      $this->Flash->error(__('ペットが見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    $messageSchedule = null;

    if ($this->request->is(['post'])) {
      try {
        $scheduledTimeType = intval($this->request->getData('scheduled_time.type'));
        $scheduledTimeHour = intval($this->request->getData('scheduled_time.hour')) + ($scheduledTimeType * 12);
        $scheduledTimeMinute = intval($this->request->getData('scheduled_time.minute'));

        $scheduledTime = (new Time(sprintf('%s:%s', $scheduledTimeHour, $scheduledTimeMinute), 'Asia/Tokyo'))->setTimezone('UTC');

        $messageSchedule = $this->MessageSchedules->newEntity([
          'user_id' => $this->authUser['id'],
          'voice_id' => $voiceId,
          'scheduled_time' => $scheduledTime,
          'message' => $this->request->getData('message'),
        ]);

        $messageScheduleSaved = $this->MessageSchedules->save($messageSchedule);

        if (!$messageScheduleSaved) {
          throw new AppException(__('通知を登録できませんでした。'));
        }

        $this->Flash->success(__('通知を新しく登録しました！'));

        return $this->redirect([
          'controller' => 'Voices',
          'action' => 'view',
          $voiceId,
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    $this->set(compact([
      'voice',
      'messageSchedule',
    ]));
  }

  public function update($id) {
    $messageSchedule = $this->MessageSchedules->find()
        ->where([
          ['MessageSchedules.user_id' => $this->authUser['id']],
          ['MessageSchedules.id' => $id],
        ])
        ->first();

    if (empty($messageSchedule)) {
      $this->Flash->error(__('通知が見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    $voice = $this->Voices->find()
        ->where([
          ['Voices.user_id' => $this->authUser['id']],
          ['Voices.id' => $messageSchedule['voice_id']],
        ])
        ->first();

    if (empty($voice)) {
      $this->Flash->error(__('ペットが見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    if ($this->request->is(['put'])) {
      try {
        $scheduledTimeType = intval($this->request->getData('scheduled_time.type'));
        $scheduledTimeHour = intval($this->request->getData('scheduled_time.hour')) + ($scheduledTimeType * 12);
        $scheduledTimeMinute = intval($this->request->getData('scheduled_time.minute'));

        $scheduledTime = (new Time(sprintf('%s:%s', $scheduledTimeHour, $scheduledTimeMinute), 'Asia/Tokyo'))->setTimezone('UTC');

        $this->MessageSchedules->patchEntity($messageSchedule, [
          'scheduled_time' => $scheduledTime,
          'message' => $this->request->getData('message'),
        ]);

        $messageScheduleSaved = $this->MessageSchedules->save($messageSchedule);

        if (!$messageScheduleSaved) {
          throw new AppException(__('通知を更新できませんでした。'));
        }

        $this->Flash->success(__('通知を更新しました！'));

        return $this->redirect([
          'controller' => 'Voices',
          'action' => 'view',
          $voice['id'],
        ]);
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());
      }
    }

    $this->set(compact([
      'voice',
      'messageSchedule',
    ]));
  }

  public function delete($id) {
    $messageSchedule = $this->MessageSchedules->find()
        ->where([
          ['MessageSchedules.user_id' => $this->authUser['id']],
          ['MessageSchedules.id' => $id],
        ])
        ->first();

    if (empty($messageSchedule)) {
      $this->Flash->error(__('通知が見つかりませんでした。'));

      return $this->redirect($this->request->referer());
    }

    if ($this->request->is(['delete'])) {
      try {
        $messageScheduleDeleted = $this->MessageSchedules->delete($messageSchedule);

        if (!$messageScheduleDeleted) {
          throw new AppException(__('通知を削除できませんでした。'));
        }

        $this->Flash->success(__('通知を削除しました。'));
      } catch (AppException $exception) {
        $this->Flash->error($exception->getMessage());

        return $this->redirect($this->request->referer());
      }
    }

    return $this->redirect([
      'controller' => 'Voices',
      'action' => 'view',
      $messageSchedule['voice_id'],
    ]);
  }
}

