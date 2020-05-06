<?php if (empty($voices)): ?>
<?= $this->element('Liff/Home/index/voices_empty') ?>
<?php else: ?>
<?= $this->element('Liff/Home/index/voices_list', [
  'voices' => $voices,
]) ?>
<?php endif; ?>

