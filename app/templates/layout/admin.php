<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', [
      'integrity' => 'sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->fetch('css') ?>
  </head>

  <body>
    <header class="navbar navbar-expand navbar-dark bg-dark flex-column flex-md-row">
      <ul class="navbar-nav bd-navbar-nav flex-row">
        <li class="<?= implode(' ', [
            'nav-item',
            $this->request->getParam('controller') === 'Home' ? 'active' : '',
          ]) ?>">
          <a href="<?= $this->Url->build([
              'controller' => 'Home',
              'action' => 'index',
            ]) ?>" class="nav-link">
            <?= __('Home') ?>
          </a>
        </li>

        <li class="<?= implode(' ', [
            'nav-item',
            in_array($this->request->getParam('controller'), [
              'Broadcasts',
              'BroadcastMessages',
            ]) ? 'active' : '',
          ]) ?>">
          <a href="<?= $this->Url->build([
              'controller' => 'Broadcasts',
              'action' => 'index',
            ]) ?>" class="nav-link">
            <?= __('Broadcasts') ?>
          </a>
        </li>
      </ul>
    </header>

    <?= $this->Flash->render() ?>

    <main class="container py-5">
      <h1>
        <?= $this->request->getParam('controller') ?>

        <small class="text-secondary">
          <?= sprintf(' / %s', $this->request->getParam('action')) ?>
        </small>
      </h1>

      <?= $this->fetch('content') ?>
    </main>

    <?= $this->fetch('postLink') ?>

    <?= $this->Html->script('https://code.jquery.com/jquery-3.5.1.slim.min.js', [
      'integrity' => 'sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [
      'integrity' => 'sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', [
      'integrity' => 'sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI',
      'crossorigin' => 'anonymous',
    ]) ?>

    <?= $this->fetch('script') ?>
  </body>
</html>

