<div style="<?= $this->Html->style([
    'display' => 'flex',
    'justify-content' => 'space-between',
    'padding' => '32px 16px',
    'background-color' => '#ffffff',
    'border-bottom' => 'solid 1px #d1d1d6',
  ]) ?>">
  <div>
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

  <div>
    <a href="#" class="button secondary">
      <?= __('編集') ?>
    </a>
  </div>
</div>

<div style="<?= $this->Html->style([
    'padding-bottom' => '108px',
  ]) ?>">
  <?php foreach ($voice['message_schedules'] as $messageSchedule): ?>
  <div style="<?= $this->Html->style([
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
        'margin-left' => '16px',
      ]) ?>">
      <p style="<?= $this->Html->style([
          'margin' => '0',
        ]) ?>">
        <?= nl2br(h($messageSchedule['message'])) ?>
      </p>
    </div>

    <div style="<?= $this->Html->style([
        'display' => 'flex',
        'align-items' => 'center',
        'margin-left' => 'auto',
      ]) ?>">
      <i class="fas fa-chevron-right" style="<?= $this->Html->style([
          'color' => '#8e8e93',
          'font-size' => '16px',
        ]) ?>"></i>
    </div>
  </div>
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

