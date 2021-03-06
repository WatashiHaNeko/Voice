<div class="row justify-content-between">
  <div class="col-auto flex">
    <?= $this->Form->postLink(__('Send to Admin Users'), [
      'controller' => 'Broadcasts',
      'action' => 'sendToAdminUsers',
      $broadcast['id'],
    ], [
      'confirm' => __('Are you sure you want to send messages to admin users?'),
      'block' => true,
      'class' => 'btn btn-warning',
    ]) ?>

    <?= $this->Form->postLink(__('Send to All Users'), [
    ], [
      'confirm' => __('Are you sure you want to send messages to all users?'),
      'block' => true,
      'class' => 'btn btn-danger',
    ]) ?>
  </div>

  <div class="col-auto">
    <a href="<?= $this->Url->build([
      'action' => 'create',
      $broadcast['id'],
    ]) ?>" class="btn btn-primary">
      <?= __('New BroadcastMessage') ?>
    </a>
  </div>
</div>

<div class="card mt-2">
  <div class="card-body">
    <?= h($broadcast['title']) ?>
  </div>
</div>

<table class="table table-bordered table-striped mt-2">
  <thead>
    <tr>
      <th scope="col" style="<?= $this->Html->style([
          'width' => '48px',
        ]) ?>">
        <?= __('ID') ?>
      </th>

      <th scope="col">
        <?= __('Message') ?>
      </th>

      <th scope="col" style="<?= $this->Html->style([
          'width' => '132px',
        ]) ?>">
        <?= __('Created') ?>
      </th>

      <th scope="col" style="<?= $this->Html->style([
          'width' => '132px',
        ]) ?>">
        <?= __('#') ?>
      </th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($broadcast['broadcast_messages'] as $broadcastMessage): ?>
    <tr>
      <td>
        <?= h($broadcastMessage['id']) ?>
      </td>

      <td>
        <?= nl2br(h($broadcastMessage['message'])) ?>

        <?php if (!empty($broadcastMessage['image_filename'])): ?>
        <img src="<?= $broadcastMessage->getImageUrl() ?>" class="img-thumbnail d-block mt-2">
        <?php endif; ?>
      </td>

      <td>
        <?= $broadcastMessage['created']->i18nFormat('yyyy/MM/dd') ?>
      </td>

      <td>
        <a href="#" class="btn btn-warning btn-block btn-sm">
          <?= __('Update') ?>
        </a>

        <?= $this->Form->postLink(__('Delete'), [
          'action' => 'delete',
          $broadcast['id'],
          $broadcastMessage['id'],
        ], [
          'method' => 'delete',
          'confirm' => __('Are you sure you want to delete this BroadcastMessage?'),
          'block' => true,
          'class' => 'btn btn-danger btn-block btn-sm',
        ]) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

