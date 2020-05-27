<div class="card">
  <div class="card-body">
    <?= h($broadcast['title']) ?>
  </div>
</div>

<div class="card bg-light mt-2">
  <div class="card-body">
    <?= $this->Form->create($broadcastMessage, ['novalidate' => true]) ?>
      <div class="form-group">
        <label>
          <?= __('Title') ?>
        </label>

        <?= $this->Form->textarea('message', [
          'class' => implode(' ', [
            'form-control',
            $this->Form->isFieldError('message') ? 'is-invalid' : '',
          ]),
        ]) ?>

        <div class="invalid-feedback">
          <?= $this->Form->error('message') ?>
        </div>
      </div>

      <button class="btn btn-primary">
        <?= __('CREATE') ?>
      </button>
    <?= $this->Form->end() ?>
  </div>
</div>


