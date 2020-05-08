<?php
use Cake\Core\Configure;

$this->disableAutoLayout();
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <meta property="og:url" content="<?= $this->Url->build([], ['fullBase' => true]) ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= __('わんわんボイス') ?>">
    <meta property="og:image" content="<?= $this->Url->image('ogp.jpg', ['fullBase' => true]) ?>">
    <meta property="og:description" content="<?= __('指定した時間にペットからLINEでメッセージが届く！') ?>">
    <meta property="og:site_name" content="<?= __('わんわんボイス') ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="@watashi_ha_neko">

    <?= $this->Html->css('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;800&display=swap') ?>

    <style>
    .button {
      position: relative;
      top: -4px;
      display: block;
      box-sizing: border-box;
      padding: 12px 24px;
      width: 100%;
      line-height: 20px;
      background-color: #34c759;
      background: linear-gradient(0, #34c759 0%, #30d158 50%);
      border: none;
      border-radius: 21px;
      box-shadow: 0 4px 8px 0 #8e8e93;
      color: #ffffff;
      font-size: 20px;
      font-weight: 800;
      text-align: center;
      text-decoration: none;
      transition-duration: .2s;
    }

    .button:hover {
      outline: none;
    }

    .button:hover {
      top: -8px;
      box-shadow: 0 8px 8px 0 #8e8e93;
    }

    .button:active {
      top: 0;
      box-shadow: 0 0 8px 0 #8e8e93;
    }
    </style>

    <title>
      <?= sprintf('%s | %s', __('わんわんボイス'), __('指定した時間にペットからLINEでメッセージが届く！')) ?>
    </title>
  </head>

  <body style="<?= $this->Html->style([
      'box-sizing' => 'border-box',
      'margin' => '0',
      'padding' => '16px',
      'font-family' => '\'M PLUS Rounded 1c\', sans-serif',
      'border' => 'solid 8px #34c759',
      'min-height' => '100vh',
    ]) ?>">
    <div style="<?= $this->Html->style([
        'margin' => '48px auto 0',
        'width' => '160px',
        'height' => '160px',
      ]) ?>">
      <img src="<?= $this->Url->image('avatar-default.jpg') ?>" style="<?= $this->Html->style([
          'display' => 'block',
          'box-sizing' => 'border-box',
          'padding' => '4px',
          'width' => '100%',
          'height' => '100%',
          'background-color' => '#ffffff',
          'border' => 'solid 2px #d1d1d6',
          'border-radius' => '50%',
          'object-fit' => 'cover',
        ]) ?>">
    </div>

    <h1 style="<?= $this->Html->style([
        'margin' => '24px 0 0',
        'color' => '#34c759',
        'font-size' => '40px',
        'font-weight' => '800',
        'text-align' => 'center',
      ]) ?>">
      <?= __('わんわんボイス') ?>
    </h1>

    <p style="<?= $this->Html->style([
        'margin' => '24px 0 0',
        'color' => '#34c759',
        'font-size' => '24px',
        'font-weight' => '400',
        'text-align' => 'center',
      ]) ?>">
      <?= implode('<br>', [
        __('指定した時間に'),
        __('ペットから'),
        __('LINEでメッセージが届く！'),
      ]) ?>
    </p>

    <div style="<?= $this->Html->style([
        'margin' => '36px 0 0 ',
      ]) ?>">
      <a href="<?= vsprintf('%s://%s/%s', [
        'https',
        implode('.', ['line', 'me']),
        implode('/', ['R', 'ti', 'p', Configure::read('Line.OfficialAccount.id')]),
      ]) ?>" class="button">
        <?= __('まずはLINEで友だち登録！') ?>
      </a>
    </div>

    <div style="<?= $this->Html->style([
        'position' => 'relative',
        'bottom' => '-40px',
        'margin' => '36px 0 0 ',
      ]) ?>">
      <img src="<?= $this->Url->image('usecase_1.png') ?>" style="<?= $this->Html->style([
          'display' => 'block',
          'width' => '100%',
        ]) ?>">
    </div>
  </body>
</html>

