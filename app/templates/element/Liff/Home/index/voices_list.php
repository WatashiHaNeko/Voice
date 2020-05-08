<div style="<?= $this->Html->style([
    'padding-bottom' => '108px',
  ]) ?>">
  <?php foreach ($voices as $voice): ?>
  <a href="<?= $this->Url->build([
    'controller' => 'Voices',
    'action' => 'view',
    $voice['id'],
  ]) ?>" style="<?= $this->Html->style([
      'display' => 'flex',
      'justify-content' => 'flex-start',
      'align-items' => 'stretch',
      'padding' => '8px 16px',
      'background-color' => '#ffffff',
      'border-bottom' => 'solid 1px #d1d1d6',
      'color' => '#1c1c1e',
    ]) ?>">
    <div style="<?= $this->Html->style([
        'width' => '48px',
        'height' => '48px',
      ]) ?>">
      <img src="<?= $voice->getAvatarImageUrl() ?>" class="avatar" style="<?= $this->Html->style([
          'padding' => '2px',
          'border' => 'solid 1px #d1d1d6',
        ]) ?>">
    </div>

    <div style="<?= $this->Html->style([
        'flex' => 1,
        'margin-left' => '8px',
      ]) ?>">
      <p style="<?= $this->Html->style([
          'margin' => '0',
          'line-height' => '24px',
          'font-size' => '16px',
          'font-weight' => '600',
        ]) ?>">
        <?= h($voice['name']) ?>
      </p>
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

<div style="<?= $this->Html->style([
    'position' => 'fixed',
    'right' => '16px',
    'bottom' => '32px',
    'left' => '16px',
  ]) ?>">
  <a href="<?= $this->Url->build([
      'controller' => 'Voices',
      'action' => 'create',
    ]) ?>" class="button">
    <?= __('新しくペットを登録する') ?>
  </a>
</div>

