<div style="<?= $this->Html->style([
    'padding' => '64px 16px 16px',
  ]) ?>">
  <?= $this->Form->create($voice, [
    'type' => 'file',
    'novalidate' => true,
  ]) ?>
    <label style="<?= $this->Html->style([
        'display' => 'block',
        'margin' => '0 auto',
        'width' => '148px',
        'height' => '148px',
      ]) ?>" class="avatar-image-container">
      <?= $this->Form->file('avatar_image_file', [
        'id' => 'avatar-image-file-field',
        'accept' => 'image/*',
        'style' => $this->Html->style([
          'display' => 'none',
        ]),
      ]) ?>

      <img src="<?= $this->Url->image('avatar-default.jpg') ?>" id="avatar-image-preview" class="avatar">
    </label>

    <div class="field-container" style="<?= $this->Html->style([
        'margin-top' => '24px',
      ]) ?>">
      <label class="field-label">
        <?= __('ペットのお名前') ?>
      </label>

      <?= $this->Form->text('name', [
        'class' => implode(' ', [
          'field',
          $this->Form->isFieldError('name') ? 'invalid' : '',
        ]),
      ]) ?>

      <?php if ($this->Form->isFieldError('name')): ?>
      <p class="field-help invalid">
        <?= $this->Form->error('name') ?>
      </p>
      <?php endif; ?>
    </div>

    <div style="<?= $this->Html->style([
        'margin-top' => '48px',
      ]) ?>">
      <button class="button">
        <?= __('新しくペットを登録する') ?>
      </button>
    </div>
  </div>
  <?= $this->Form->end() ?>
</div>

<?php $this->append('css'); ?>
<style>
.avatar-image-container {
  position: relative;
}

.avatar-image-container::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: rgba(0, 0, 0, .5);
  background-image: url('data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20512%20512%22%3E%3Cpath%20fill%3D%22%23ffffff%22%20d%3D%22M512%20144v288c0%2026.5-21.5%2048-48%2048H48c-26.5%200-48-21.5-48-48V144c0-26.5%2021.5-48%2048-48h88l12.3-32.9c7-18.7%2024.9-31.1%2044.9-31.1h125.5c20%200%2037.9%2012.4%2044.9%2031.1L376%2096h88c26.5%200%2048%2021.5%2048%2048zM376%20288c0-66.2-53.8-120-120-120s-120%2053.8-120%20120%2053.8%20120%20120%20120%20120-53.8%20120-120zm-32%200c0%2048.5-39.5%2088-88%2088s-88-39.5-88-88%2039.5-88%2088-88%2088%2039.5%2088%2088z%22%20%2F%3E%3C%2Fsvg%3E');
  background-repeat: no-repeat;
  background-size: 48px;
  background-position: center;
  border-radius: 50%;
  content: "";
}
</style>
<?php $this->end(); ?>

<?php $this->append('css'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
  const avatarImageFileField = document.querySelector("#avatar-image-file-field");
  const avatarImagePreview = document.querySelector("#avatar-image-preview");

  avatarImageFileField.addEventListener("change", async (event) => {
    const file = avatarImageFileField.files[0];
    const fileReader = new FileReader();

    fileReader.addEventListener("load", async (event) => {
      avatarImagePreview.src = fileReader.result;
    });

    fileReader.readAsDataURL(file);
  });
});
</script>
<?php $this->end(); ?>

