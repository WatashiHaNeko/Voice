<div style="<?= $this->Html->style([
    'padding' => '64px 16px 16px',
  ]) ?>">
  <div style="<?= $this->Html->style([
      'margin' => '0 auto',
      'width' => '148px',
      'height' => '148px',
    ]) ?>">
    <img src="<?= $this->Url->image('avatar-default.jpg') ?>" class="avatar">
  </div>

  <p style="<?= $this->Html->style([
      'align-self' => 'stretch',
      'margin-top' => '24px',
      'font-size' => '16px',
      'font-weight' => '800',
      'text-align' => 'center',
    ]) ?>">
    <?= __('まだペットが登録されていません！') ?>
  </p>

  <div style="<?= $this->Html->style([
      'margin-top' => '48px',
    ]) ?>">
    <a href="<?= $this->Url->build([
        'controller' => 'Voices',
        'action' => 'create',
      ]) ?>" class="button">
      <?= __('新しくペットを登録する') ?>
    </a>
  </div>
</div>

