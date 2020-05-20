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
?>

<div style="<?= $this->Html->style([
    'padding' => '16px',
  ]) ?>">
  <?= $this->element('Liff/message_preview', [
    'avatarImageUrl' => $voice->getAvatarImageUrl(),
    'name' => h($voice['name']),
  ]) ?>

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
          'value' => $this->request->getData('scheduled_time.type'),
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
          'value' => $this->request->getData('scheduled_time.hour'),
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
          'value' => $this->request->getData('scheduled_time.minute'),
          'id' => 'scheduled-time-minute-field',
          'class' => 'field select',
        ]) ?>
      </div>
    </div>

    <h2 class="field-heading" style="<?= $this->Html->style([
        'margin' => '36px 0 0',
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
        <?= __('新しく通知を登録する') ?>
      </button>
    </div>
  <?= $this->Form->end() ?>
</div>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
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

    window.dispatchEvent(new CustomEvent("messagePreviewUpdate", {
      detail: {
        hour,
        minute,
      },
    }));
  }

  function messageInputHandler() {
    const message = messageField.value;

    window.dispatchEvent(new CustomEvent("messagePreviewUpdate", {
      detail: {
        message,
      },
    }));
  }
});
</script>
<?php $this->end(); ?>

