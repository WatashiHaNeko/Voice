<div style="<?= $this->Html->style([
    'display' => 'flex',
    'justify-content' => 'space-between',
    'padding' => '32px 16px',
    'background-color' => '#ffffff',
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

