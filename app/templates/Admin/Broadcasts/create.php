<div class="card bg-light">
  <div class="card-body">
    <?= $this->Form->create($broadcast, ['novalidate' => true]) ?>
      <div class="form-group">
        <label>
          <?= __('Title') ?>
        </label>

        <?= $this->Form->text('title', [
          'class' => implode(' ', [
            'form-control',
            $this->Form->isFieldError('title') ? 'is-invalid' : '',
          ]),
        ]) ?>

        <div class="invalid-feedback">
          <?= $this->Form->error('title') ?>
        </div>
      </div>

      <button class="btn btn-primary">
        <?= __('CREATE') ?>
      </button>
    <?= $this->Form->end() ?>
  </div>
</div>

