<?php
use Cake\Core\Configure;
?>

<div class="card">
  <div class="card-body">
    <?= h($broadcast['title']) ?>
  </div>
</div>

<div class="card bg-light mt-2">
  <div class="card-body">
    <?= $this->Form->create($broadcastMessage, ['type' => 'file', 'novalidate' => true]) ?>
      <div class="form-group">
        <label>
          <?= __('Message') ?>
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

      <div class="form-group">
        <label>
          <?= __('Image') ?>
        </label>

        <div class="row">
          <div class="col-md-6">
            <label class="card">
              <?= $this->Form->file('image_file', [
                'id' => 'image-file-field',
                'accept' => 'image/*',
                'style' => $this->Html->style([
                  'display' => 'none',
                ]),
              ]) ?>

              <img src="<?= implode('/', [
                Configure::read('App.fullBaseUrl'),
                'upload', 'broadcast_messages',
                'placeholder.png',
              ]) ?>" id="image-preview" class="card-img-top">

              <div class="card-footer d-flex justify-content-end">
                <button type="button" id="image-clear-button" class="btn btn-danger btn-sm">
                  <?= __('Clear') ?>
                </button>
              </div>
            </label>
          </div>
        </div>
      </div>

      <button class="btn btn-primary">
        <?= __('CREATE') ?>
      </button>
    <?= $this->Form->end() ?>
  </div>
</div>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", (event) => {
  const imageFileField = document.querySelector("#image-file-field");
  const imagePreview = document.querySelector("#image-preview");
  const imageClearButton = document.querySelector("#image-clear-button");

  imageFileField.addEventListener("change", (event) => {
    const fileReader = new FileReader();

    fileReader.addEventListener("load", (event) => {
      imagePreview.src = fileReader.result;
    });

    fileReader.readAsDataURL(imageFileField.files[0]);
  });
});
</script>
<?php $this->end(); ?>

