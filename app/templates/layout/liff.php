<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Sawarabi+Mincho&display=swap') ?>

    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.10.0/css/all.css') ?>

    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', [
      'integrity' => 'sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->fetch('css') ?>

    <title>
      Voice
    </title>
  </head>

  <body>
    <main class="main">
      <?= $this->Flash->render() ?>

      <?= $this->fetch('content') ?>
    </main>

    <?= $this->fetch('postLink') ?>

    <?= $this->Html->script('https://code.jquery.com/jquery-3.4.1.slim.min.js', [
      'integrity' => 'sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [
      'integrity' => 'sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', [
      'integrity' => 'sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->Html->script('https://static.line-scdn.net/liff/edge/2.1/sdk.js') ?>

    <?= $this->fetch('script') ?>
  </body>
</html>

