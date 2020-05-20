<?php
$scheduledTimeTypeOptions = [
  '0' => __('午前'),
  '1' => __('午後'),
];

$scheduledTimeHourOptions = [];

for ($hour = 0; $hour < 12; $hour++) {
  $scheduledTimeHourOptions[$hour] = $hour;
}

$scheduledTimeMinuteOptions = [];

for ($minute = 0; $minute < 60; $minute += 10) {
  $scheduledTimeMinuteOptions[$minute] = $minute;
}

$scheduledTime = $messageSchedule['scheduled_time']->copy()->setTimezone('Asia/Tokyo');
?>

<div style="<?= $this->Html->style([
    'padding' => '16px',
  ]) ?>">
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
      <img src="<?= $voice->getAvatarImageUrl() ?>" class="avatar" style="<?= $this->Html->style([
          'padding' => '2px',
          'border' => 'solid 1px #d1d1d6',
        ]) ?>">
    </div>

    <div style="<?= $this->Html->style([
        'margin-left' => '8px',
      ]) ?>">
      <p class="field-heading" style="<?= $this->Html->style([
          'margin' => '0',
        ]) ?>">
        <?= h($voice['name']) ?>
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

  <?= $this->Form->create($messageSchedule, [
      'novalidate' => true,
      'style' => $this->Html->style([
        'margin-top' => '24px',
      ]),
    ]) ?>
    <h2 class="field-heading" style="<?= $this->Html->style([
        'margin' => '0',
      ]) ?>">
      <?= __('通知する時間を選択してください') ?>
    </h2>

    <div style="<?= $this->Html->style([
        'display' => 'flex',
        'margin-top' => '12px',
      ]) ?>">
      <div class="field-container" style="<?= $this->Html->style([
          'flex' => 1,
        ]) ?>">
        <label class="field-label">
          <?= __('午前/午後') ?>
        </label>

        <?= $this->Form->select('scheduled_time[type]', $scheduledTimeTypeOptions, [
          'value' => $scheduledTime->hour < 12 ? '0' : '1',
          'id' => 'scheduled-time-type-field',
          'class' => 'field select',
        ]) ?>
      </div>

      <div style="<?= $this->Html->style([
          'flex-basis' => '16px',
        ]) ?>"></div>

      <div class="field-container" style="<?= $this->Html->style([
          'flex' => 1,
        ]) ?>">
        <label class="field-label">
          <?= __('時') ?>
        </label>

        <?= $this->Form->select('scheduled_time[hour]', $scheduledTimeHourOptions, [
          'value' => strval($scheduledTime->hour % 12),
          'id' => 'scheduled-time-hour-field',
          'class' => 'field select',
        ]) ?>
      </div>

      <div style="<?= $this->Html->style([
          'flex-basis' => '16px',
        ]) ?>"></div>

      <div class="field-container" style="<?= $this->Html->style([
          'flex' => 1,
        ]) ?>">
        <label class="field-label">
          <?= __('分') ?>
        </label>

        <?= $this->Form->select('scheduled_time[minute]', $scheduledTimeMinuteOptions, [
          'value' => strval($scheduledTime->minute),
          'id' => 'scheduled-time-minute-field',
          'class' => 'field select',
        ]) ?>
      </div>
    </div>

    <h2 style="<?= $this->Html->style([
        'margin' => '36px 0 0',
        'line-height' => '24px',
        'font-size' => '16px',
        'font-weight' => '600',
        'text-align' => 'center',
      ]) ?>">
      <?= __('メッセージを入力してください') ?>
    </h2>

    <div style="<?= $this->Html->style([
        'display' => 'flex',
        'margin-top' => '12px',
      ]) ?>">
      <div class="field-container" style="<?= $this->Html->style([
          'flex' => 1,
        ]) ?>">
        <label class="field-label">
          <?= __('メッセージ') ?>
        </label>

        <?= $this->Form->textarea('message', [
          'rows' => 5,
          'id' => 'message-field',
          'class' => implode(' ', [
            'field',
            $this->Form->isFieldError('message') ? 'invalid' : '',
          ]),
        ]) ?>

        <?php if ($this->Form->isFieldError('message')): ?>
        <p class="field-help invalid">
          <?= $this->Form->error('message') ?>
        </p>
        <?php endif; ?>
      </div>
    </div>

    <div style="<?= $this->Html->style([
        'margin-top' => '48px',
      ]) ?>">
      <button class="button">
        <?= __('通知を更新する') ?>
      </button>
    </div>
  <?= $this->Form->end() ?>

  <div style="<?= $this->Html->style([
      'margin-top' => '48px',
    ]) ?>">
    <?= $this->Form->postLink(__('通知を削除する'), [
      'action' => 'delete',
      $messageSchedule['id'],
    ], [
      'confirm' => __('通知を削除しますか？'),
      'method' => 'delete',
      'block' => true,
      'class' => 'button danger',
    ]) ?>
  </div>
</div>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
  const messagePreview = document.querySelector("#message-preview");
  const scheduledTimePreview = document.querySelector("#scheduled-time-preview");
  const scheduledTimeTypeField = document.querySelector("#scheduled-time-type-field");
  const scheduledTimeHourField = document.querySelector("#scheduled-time-hour-field");
  const scheduledTimeMinuteField = document.querySelector("#scheduled-time-minute-field");
  const messageField = document.querySelector("#message-field");

  scheduledTimeTypeField.addEventListener("change", scheduledTimeChangeHandler);
  scheduledTimeHourField.addEventListener("change", scheduledTimeChangeHandler);
  scheduledTimeMinuteField.addEventListener("change", scheduledTimeChangeHandler);

  messageField.addEventListener("input", messageInputHandler);

  scheduledTimeChangeHandler();

  messageInputHandler();

  function scheduledTimeChangeHandler() {
    const type = Number.parseInt(scheduledTimeTypeField.value);
    const hour = Number.parseInt(scheduledTimeHourField.value) + (type * 12);
    const minute = Number.parseInt(scheduledTimeMinuteField.value);

    scheduledTimePreview.textContent = `${String(hour)}:${String(minute).padStart(2, "0")}`;
  }

  function messageInputHandler() {
    messagePreview.textContent = messageField.value;
  }
});
</script>
<?php $this->end(); ?>

