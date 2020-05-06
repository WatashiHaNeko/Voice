<div style="<?= $this->Html->style([
    'padding-bottom' => '108px',
  ]) ?>">
  <?php foreach ($voices as $voice): ?>
  <a href="#" style="<?= $this->Html->style([
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
      <img src="<?= $voice->getAvatarImageUrl() ?>" style="<?= $this->Html->style([
          'display' => 'block',
          'padding' => '2px',
          'width' => '100%',
          'height' => '100%',
          'background-color' => '#ffffff',
          'border' => 'solid 1px #d1d1d6',
          'border-radius' => '50%',
        ]) ?>">
    </div>

    <div style="<?= $this->Html->style([
        'margin-left' => '8px',
      ]) ?>">
      <p style="<?= $this->Html->style([
          'margin' => '0',
          'line-height' => '24px',
          'font-size' => '16px',
          'font-weight' => '600',
        ]) ?>">
        <?= $voice['name'] ?>
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
  </a>
  <?php endforeach; ?>
</div>

<div style="<?= $this->Html->style([
    'position' => 'fixed',
    'right' => '32px',
    'bottom' => '32px',
    'left' => '32px',
  ]) ?>">
  <a href="<?= $this->Url->build([
      'controller' => 'Voices',
      'action' => 'create',
    ]) ?>" style="<?= $this->Html->style([
      'display' => 'block',
      'padding' => '12px 24px',
      'line-height' => '20px',
      'background-color' => '#34c759',
      'background' => 'linear-gradient(0, #34c759 0%, #30d158 50%)',
      'border-radius' => '21px',
      'box-shadow' => '0px 4px 8px 0px #8e8e93',
      'color' => '#ffffff',
      'font-size' => '20px',
      'font-weight' => '600',
      'text-align' => 'center',
    ]) ?>">
    <?= __('新しくペットを登録する') ?>
  </a>
</div>

