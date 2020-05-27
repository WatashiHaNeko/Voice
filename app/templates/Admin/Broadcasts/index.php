<div class="row justify-content-end">
  <div class="col-auto">
    <a href="<?= $this->Url->build([
      'action' => 'create',
    ]) ?>" class="btn btn-primary">
      <?= __('New Broadcast') ?>
    </a>
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
        <?= __('Title') ?>
      </th>

      <th scope="col" style="<?= $this->Html->style([
          'width' => '132px',
        ]) ?>">
        <?= __('Created') ?>
      </th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($broadcasts as $broadcast): ?>
    <tr>
      <td>
        <?= h($broadcast['id']) ?>
      </td>

      <td>
        <?= h($broadcast['title']) ?>
      </td>

      <td>
        <?= $broadcast['created']->i18nFormat('yyyy/MM/dd') ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

