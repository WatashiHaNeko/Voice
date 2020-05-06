<div style="<?= $this->Html->style([
    'display' => 'flex',
    'flex-direction' => 'column',
    'justify-content' => 'center',
    'align-items' => 'center',
    'height' => '100vh',
  ]) ?>">
  <?= $this->Form->create($voice, [
    'type' => 'file',
    'novalidate' => true,
    'style' => $this->Html->style([
      'display' => 'flex',
      'flex-direction' => 'column',
      'align-items' => 'center',
      'padding' => '16px',
      'width' => 'calc(100% - 32px)',
    ]),
  ]) ?>
    <label style="<?= $this->Html->style([
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

      <img src="<?= $this->Url->image('avatar-default.jpg') ?>" style="<?= $this->Html->style([
          'display' => 'block',
          'padding' => '4px',
          'width' => '100%',
          'height' => '100%',
          'background-color' => '#ffffff',
          'border' => 'solid 2px #d1d1d6',
          'border-radius' => '50%',
          'object-fit' => 'cover',
        ]) ?>" id="avatar-image-preview">
    </label>

    <div style="<?= $this->Html->style([
        'position' => 'relative',
        'display' => 'flex',
        'flex-direction' => 'column',
        'align-items' => 'center',
        'margin-top' => '24px',
      ]) ?>">
      <label style="<?= $this->Html->style([
        'position' => 'absolute',
        'top' => '8px',
        'line-height' => '12px',
        'color' => '#8e8e93',
        'font-size' => '12px',
        'font-weight' => '200',
      ]) ?>">
        <?= __('ペットのお名前') ?>
      </label>

      <?= $this->Form->text('name', [
        'style' => $this->Html->style([
          'padding' => '20px 24px 12px',
          'width' => '240px',
          'line-height' => '20px',
          'border' => sprintf('solid 2px %s', $this->Form->isFieldError('name') ? '#ff3b30' : '#8e8e93'),
          'border-radius' => '28px',
          'text-align' => 'center',
          'font-size' => '16px',
          'font-weight' => '600',
        ]),
      ]) ?>

      <?php if ($this->Form->isFieldError('name')): ?>
      <p style="<?= $this->Html->style([
        'margin' => '4px 0 0',
        'line-height' => '18px',
        'color' => '#ff3b30',
        'text-align' => 'center',
        'font-size' => '12px',
        'font-weight' => '600',
      ]) ?>">
        <?= $this->Form->error('name') ?>
      </p>
      <?php endif; ?>
    </div>

    <div style="<?= $this->Html->style([
        'margin-top' => '32px',
      ]) ?>">
      <button style="<?= $this->Html->style([
          'display' => 'block',
          'padding' => '12px 24px',
          'line-height' => '20px',
          'background-color' => '#34c759',
          'background' => 'linear-gradient(0, #34c759 0%, #30d158 50%)',
          'border' => 'none',
          'border-radius' => '21px',
          'box-shadow' => '0px 4px 8px 0px #8e8e93',
          'color' => '#ffffff',
          'font-size' => '20px',
          'font-weight' => '600',
        ]) ?>">
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

