<!doctype html>
<html>
  <head>
    <?= $this->element('google_analytics') ?>
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

    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.10.0/css/all.css') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;800&display=swap') ?>

    <?= $this->element('css/liff') ?>

    <?= $this->fetch('css') ?>

    <title>
      <?= __('わんわんボイス') ?>
    </title>
  </head>

  <body style="background-color: #f2f2f7;">
    <main class="main">
      <?= $this->Flash->render() ?>

      <?= $this->fetch('content') ?>
    </main>

    <?= $this->fetch('postLink') ?>

    <?= $this->Html->script('https://static.line-scdn.net/liff/edge/2.1/sdk.js') ?>

    <?= $this->fetch('script') ?>
  </body>
</html>

