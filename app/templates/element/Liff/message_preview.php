<?php
$avatarImageUrl = !empty($avatarImageUrl) ? $avatarImageUrl : $this->Url->image('avatar-default.jpg');
$name = !empty($name) ? $name : h('-');
?>

<div style="<?= $this->Html->style([
    'display' => 'flex',
    'justify-content' => 'flex-start',
    'align-items' => 'stretch',
    'padding' => '8px 16px',
    'background-color' => '#ffffff',
    'border' => 'solid 1px #d1d1d6',
    'color' => '#1c1c1e',
  ]) ?>">
  <div style="<?= $this->Html->style([
      'width' => '48px',
      'min-width' => '48px',
      'height' => '48px',
    ]) ?>">
    <img src="<?= $avatarImageUrl ?>" class="avatar" style="<?= $this->Html->style([
        'padding' => '2px',
        'border' => 'solid 1px #d1d1d6',
      ]) ?>">
  </div>

  <div style="<?= $this->Html->style([
      'margin-left' => '8px',
    ]) ?>">
    <p style="<?= $this->Html->style([
        'margin' => '0',
        'line-height' => '24px',
        'font-size' => '16px',
        'font-weight' => '600',
      ]) ?>">
      <?= $name ?>
    </p>

    <div style="<?= $this->Html->style([
        'position' => 'relative',
        'display' => 'flex',
        'align-items' => 'flex-end',
        'margin-top' => '8px',
      ]) ?>">
      <span style="<?= $this->Html->style([
          'position' => 'absolute',
          'top' => '0',
          'left' => '-8px',
          'width' => '0',
          'height' => '0',
          'border' => 'solid 16px transparent',
          'border-top-color' => '#34c759',
        ]) ?>"></span>

      <p id="message-preview" style="<?= $this->Html->style([
          'margin' => '0',
          'padding' => '8px',
          'min-width' => '16px',
          'line-height' => '20px',
          'background' => '#34c759',
          'border-radius' => '8px',
          'color' => '#ffffff',
          'font-size' => '16px',
        ]) ?>"></p>

      <span id="scheduled-time-preview" style="<?= $this->Html->style([
          'margin-left' => '8px',
          'line-height' => '12px',
          'color' => '#8e8e93',
          'font-size' => '12px',
        ]) ?>">
        0:00
      </span>
    </div>
  </div>
</div>

<?php $this->append('script'); ?>
<script>
window.addEventListener("messagePreviewUpdate", (event) => {
  const messagePreview = document.querySelector("#message-preview");
  const scheduledTimePreview = document.querySelector("#scheduled-time-preview");

  if ("message" in event.detail) {
    messagePreview.textContent = event.detail.message;
  }

  if ("hour" in event.detail && "minute" in event.detail) {
    scheduledTimePreview.textContent = `${String(event.detail.hour)}:${String(event.detail.minute).padStart(2, "0")}`;
  }
});
</script>
<?php $this->end(); ?>

