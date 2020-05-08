<?php
use Cake\Core\Configure;
?>

<div style="<?= $this->Html->style([
    'padding' => '64px 16px 16px',
  ]) ?>">

  <p style="<?= $this->Html->style([
      'margin-top' => '24px',
      'font-size' => '16px',
      'font-weight' => '800',
      'text-align' => 'center',
    ]) ?>">
    <?= __('まずはわんわんボイス公式アカウントを友達に追加してね！') ?>

    <?= __('わんわんボイスからの通知は公式アカウントから送信されるよ！') ?>
  </p>

  <div style="<?= $this->Html->style([
      'margin-top' => '48px',
    ]) ?>">
    <a href="<?= vsprintf('%s://%s/%s', [
        'https',
        implode('.', ['line', 'me']),
        implode('/', ['R', 'ti', 'p', Configure::read('Line.OfficialAccount.id')]),
      ]) ?>" class="button">
      <?= __('わんわんボイス公式アカウント') ?>
    </a>
  </div>

  <div style="<?= $this->Html->style([
      'margin-top' => '24px',
    ]) ?>">
    <a href="<?= $this->Url->build([
      'action' => 'index',
    ]) ?>" class="button">
      <?= __('わんわんボイストップ') ?>
    </a>
  </div>
</div>

