<div class="row justify-content-end">
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
      </td>

      <td>
        <?= $broadcastMessage['created']->i18nFormat('yyyy/MM/dd') ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

