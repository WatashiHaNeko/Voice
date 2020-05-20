<div style="<?= $this->Html->style([
    'display' => 'flex',
    'justify-content' => 'space-between',
    'padding' => '32px 16px',
    'background-color' => '#ffffff',
    'border-bottom' => 'solid 1px #d1d1d6',
  ]) ?>">
  <div style="<?= $this->Html->style([
      'flex' => 1,
    ]) ?>">
    <div style="<?= $this->Html->style([
        'width' => '80px',
        'height' => '80px',
      ]) ?>">
      <img src="<?= $voice->getAvatarImageUrl() ?>" class="avatar">
    </div>

    <h1 style="<?= $this->Html->style([
        'margin' => '16px 0 0',
        'line-height' => '24px',
        'font-size' => '24px',
        'font-weight' => '600',
      ]) ?>">
      <?= h($voice['name']) ?>
    </h1>
  </div>

  <div style="<?= $this->Html->style([
      'min-width' => '80px',
    ]) ?>">
    <a href="<?= $this->Url->build([
        'action' => 'update',
        $voice['id'],
      ]) ?>" class="button secondary">
      <?= __('編集') ?>
    </a>
  </div>
</div>

<div style="<?= $this->Html->style([
    'padding-bottom' => '108px',
  ]) ?>">
  <?php foreach ($voice['message_schedules'] as $messageSchedule): ?>
  <a href="<?= $this->Url->build([
      'controller' => 'MessageSchedules',
      'action' => 'update',
      $messageSchedule['id'],
    ]) ?>" style="<?= $this->Html->style([
      'display' => 'flex',
      'justify-content' => 'flex-start',
      'align-items' => 'stretch',
      'padding' => '8px 16px',
      'background-color' => '#ffffff',
      'border-bottom' => 'solid 1px #d1d1d6',
    ]) ?>">
    <div>
      <p style="<?= $this->Html->style([
          'box-sizing' => 'border-box',
          'margin' => '0',
          'padding-top' => '16px',
          'width' => '64px',
          'height' => '64px',
          'background-color' => '#007aff',
          'border-radius' => '32px',
          'color' => '#ffffff',
          'font-weight' => '800',
        ]) ?>">
        <span style="<?= $this->Html->style([
            'display' => 'block',
            'line-height' => '12px',
            'font-size' => '12px',
            'text-align' => 'center',
          ]) ?>">
          <?= $messageSchedule['scheduled_time']->i18nFormat('a', 'Asia/Tokyo') ?>
        </span>

        <span style="<?= $this->Html->style([
            'display' => 'block',
            'line-height' => '16px',
            'font-size' => '16px',
            'text-align' => 'center',
          ]) ?>">
          <?= $messageSchedule['scheduled_time']->i18nFormat('h:mm', 'Asia/Tokyo') ?>
        </span>
      </p>
    </div>

    <div style="<?= $this->Html->style([
        'flex' => 1,
        'margin-left' => '8px',
      ]) ?>">
      <p style="<?= $this->Html->style([
          'margin' => '0',
        ]) ?>">
        <?= nl2br(h($messageSchedule['message'])) ?>
      </p>

      <?php if ($messageSchedule['scheduled_weekday_1']
          && $messageSchedule['scheduled_weekday_2']
          && $messageSchedule['scheduled_weekday_3']
          && $messageSchedule['scheduled_weekday_4']
          && $messageSchedule['scheduled_weekday_5']
          && $messageSchedule['scheduled_weekday_6']
          && $messageSchedule['scheduled_weekday_7']): ?>
      <div style="<?= $this->Html->style([
          'display' => 'flex',
          'margin-top' => '4px',
        ]) ?>">
        <span style="<?= $this->Html->style([
            'padding' => '2px 4px',
            'font-size' => '10px',
            'border' => 'solid 1px #8e8e93',
            'border-radius' => '7px',
            'color' => '#8e8e93',
          ]) ?>">
          <?= __('毎日') ?>
        </span>
      </div>

      <?php else: ?>

      <div style="<?= $this->Html->style([
          'display' => 'flex',
          'margin-top' => '4px',
        ]) ?>">
        <?php if ($messageSchedule['scheduled_weekday_1']): ?>
        <span style="<?= $this->Html->style([
            'margin-right' => '4px',
            'padding' => '2px 4px',
            'font-size' => '10px',
            'border' => 'solid 1px #ff2d55',
            'border-radius' => '7px',
            'color' => '#ff2d55',
          ]) ?>">
          <?= __('日') ?>
        </span>
        <?php endif; ?>

        <?php if ($messageSchedule['scheduled_weekday_2']): ?>
        <span style="<?= $this->Html->style([
            'margin-right' => '4px',
            'padding' => '2px 4px',
            'font-size' => '10px',
            'border' => 'solid 1px #8e8e93',
            'border-radius' => '7px',
            'color' => '#8e8e93',
          ]) ?>">
          <?= __('月') ?>
        </span>
        <?php endif; ?>

        <?php if ($messageSchedule['scheduled_weekday_3']): ?>
        <span style="<?= $this->Html->style([
            'margin-right' => '4px',
            'padding' => '2px 4px',
            'font-size' => '10px',
            'border' => 'solid 1px #8e8e93',
            'border-radius' => '7px',
            'color' => '#8e8e93',
          ]) ?>">
          <?= __('火') ?>
        </span>
        <?php endif; ?>

        <?php if ($messageSchedule['scheduled_weekday_4']): ?>
        <span style="<?= $this->Html->style([
            'margin-right' => '4px',
            'padding' => '2px 4px',
            'font-size' => '10px',
            'border' => 'solid 1px #8e8e93',
            'border-radius' => '7px',
            'color' => '#8e8e93',
          ]) ?>">
          <?= __('水') ?>
        </span>
        <?php endif; ?>

        <?php if ($messageSchedule['scheduled_weekday_5']): ?>
        <span style="<?= $this->Html->style([
            'margin-right' => '4px',
            'padding' => '2px 4px',
            'font-size' => '10px',
            'border' => 'solid 1px #8e8e93',
            'border-radius' => '7px',
            'color' => '#8e8e93',
          ]) ?>">
          <?= __('木') ?>
        </span>
        <?php endif; ?>

        <?php if ($messageSchedule['scheduled_weekday_6']): ?>
        <span style="<?= $this->Html->style([
            'margin-right' => '4px',
            'padding' => '2px 4px',
            'font-size' => '10px',
            'border' => 'solid 1px #8e8e93',
            'border-radius' => '7px',
            'color' => '#8e8e93',
          ]) ?>">
          <?= __('金') ?>
        </span>
        <?php endif; ?>

        <?php if ($messageSchedule['scheduled_weekday_7']): ?>
        <span style="<?= $this->Html->style([
            'margin-right' => '4px',
            'padding' => '2px 4px',
            'font-size' => '10px',
            'border' => 'solid 1px #22b3f7',
            'border-radius' => '7px',
            'color' => '#22b3f7',
          ]) ?>">
          <?= __('土') ?>
        </span>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>

    <div style="<?= $this->Html->style([
        'display' => 'flex',
        'align-items' => 'center',
        'margin-left' => '8px',
      ]) ?>">
      <i class="fas fa-chevron-right" style="<?= $this->Html->style([
          'color' => '#8e8e93',
          'font-size' => '16px',
        ]) ?>"></i>
    </div>
  </a>
  <?php endforeach; ?>
</div>

<?php if (empty($voice['message_schedules'])): ?>
<p style="<?= $this->Html->style([
    'margin-top' => '24px',
    'padding' => '16px',
    'font-size' => '16px',
    'font-weight' => '800',
    'text-align' => 'center',
  ]) ?>">
  <?= __('まだ通知が登録されていません！') ?>
</p>
<?php endif; ?>

<div style="<?= $this->Html->style([
    'position' => 'fixed',
    'right' => '16px',
    'bottom' => '32px',
    'left' => '16px',
  ]) ?>">
  <a href="<?= $this->Url->build([
    'controller' => 'MessageSchedules',
    'action' => 'create',
    $voice['id'],
  ]) ?>" class="button">
    <?= __('新しく通知を登録する') ?>
  </a>
</div>

