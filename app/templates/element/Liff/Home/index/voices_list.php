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

  <a href="<?= $this->Url->build([
    'action' => 'help',
  ]) ?>" style="<?= $this->Html->style([
    'display' => 'flex',
    'align-items' => 'baseline',
    'margin' => '24px',
    'padding' => '16px',
    'border' => 'solid 1px #8e8e93',
    'border-radius' => '8px',
    'color' => '#8e8e93',
  ]) ?>">
    <i class="far fa-question-circle"></i>

    <span style="<?= $this->Html->style([
        'margin-left' => '16px',
      ]) ?>">
      <?= __('ご意見・お問い合わせ') ?>
    </span>
  </a>
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

