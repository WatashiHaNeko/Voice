<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.10.0/css/all.css') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;800&display=swap') ?>

    <?= $this->element('css/liff') ?>

    <?= $this->fetch('css') ?>

    <title>
      Voice
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

