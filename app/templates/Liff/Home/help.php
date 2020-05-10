<div style="<?= $this->Html->style([
    'margin' => '24px 0',
  ]) ?>">
  <a href="mailto:dev@neko.report" style="<?= $this->Html->style([
      'display' => 'flex',
      'justify-content' => 'flex-start',
      'align-items' => 'stretch',
      'padding' => '8px 16px',
      'background-color' => '#ffffff',
      'border-top' => 'solid 1px #d1d1d6',
      'border-bottom' => 'solid 1px #d1d1d6',
      'color' => '#1c1c1e',
    ]) ?>">
    <div style="<?= $this->Html->style([
        'flex' => 1,
        'line-height' => '24px',
        'font-size' => '16px',
        'font-weight' => '600',
      ]) ?>">
      <?= __('ご意見・ご要望') ?>
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

  <div style="<?= $this->Html->style([
      'margin' => '4px 0 12px',
      'padding' => '0 16px',
      'color' => '#8e8e93',
      'font-size' => '14px',
    ]) ?>">
    <?= __('ご質問もこちら') ?>
  </div>
</div>

<div style="<?= $this->Html->style([
    'margin' => '24px 0',
  ]) ?>">
  <a href="<?= $this->Url->build([
      'prefix' => false,
      'controller' => 'Pages',
      'action' => 'display',
      'terms_of_service',
    ]) ?>" style="<?= $this->Html->style([
      'display' => 'flex',
      'justify-content' => 'flex-start',
      'align-items' => 'stretch',
      'padding' => '8px 16px',
      'background-color' => '#ffffff',
      'border-top' => 'solid 1px #d1d1d6',
      'border-bottom' => 'solid 1px #d1d1d6',
      'color' => '#1c1c1e',
    ]) ?>">
    <div style="<?= $this->Html->style([
        'flex' => 1,
        'line-height' => '24px',
        'font-size' => '16px',
        'font-weight' => '600',
      ]) ?>">
      <?= __('利用規約') ?>
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

  <a href="<?= $this->Url->build([
      'prefix' => false,
      'controller' => 'Pages',
      'action' => 'display',
      'privacy_policy',
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
        'flex' => 1,
        'line-height' => '24px',
        'font-size' => '16px',
        'font-weight' => '600',
      ]) ?>">
      <?= __('プライバシーポリシー') ?>
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
</div>

