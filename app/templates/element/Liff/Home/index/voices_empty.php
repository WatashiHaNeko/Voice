<div style="<?= $this->Html->style([
    'display' => 'flex',
    'flex-direction' => 'column',
    'justify-content' => 'center',
    'align-items' => 'center',
    'height' => '100vh',
  ]) ?>">
  <div style="<?= $this->Html->style([
      'display' => 'flex',
      'flex-direction' => 'column',
      'align-items' => 'center',
      'padding' => '16px',
      'width' => 'calc(100% - 32px)',
    ]) ?>">
    <div style="<?= $this->Html->style([
        'width' => '148px',
        'height' => '148px',
      ]) ?>">
      <img src="<?= $this->Url->image('avatar-default.jpg') ?>" style="<?= $this->Html->style([
          'display' => 'block',
          'padding' => '4px',
          'width' => '100%',
          'height' => '100%',
          'background-color' => '#ffffff',
          'border' => 'solid 2px #d1d1d6',
          'border-radius' => '50%',
        ]) ?>">
    </div>

    <p style="<?= $this->Html->style([
        'margin-top' => '24px',
        'font-size' => '16px',
        'font-weight' => '600',
      ]) ?>">
      <?= __('まだペットが登録されていません！') ?>
    </p>

    <div style="<?= $this->Html->style([
        'margin-top' => '24px',
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
        ]) ?>">
        <?= __('新しくペットを登録する') ?>
      </a>
    </div>
  </div>
</div>

