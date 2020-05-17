<div class="settings-group">
  <a href="mailto:dev@neko.report" class="settings-item">
    <div class="settings-item-label">
      <?= __('ご意見・ご要望') ?>
    </div>

    <div class="settings-item-indicator">
      <i class="fas fa-chevron-right settings-item-indicator-icon"></i>
    </div>
  </a>

  <div class="settings-item-help">
    <?= __('ご質問もこちら') ?>
  </div>
</div>

<div class="settings-group">
  <a href="<?= $this->Url->build([
      'prefix' => false,
      'controller' => 'Pages',
      'action' => 'display',
      'terms_of_service',
    ]) ?>" class="settings-item">
    <div class="settings-item-label">
      <?= __('利用規約') ?>
    </div>

    <div style="settings-item-indicator">
      <i class="fas fa-chevron-right settings-item-indicator-icon"></i>
    </div>
  </a>

  <a href="<?= $this->Url->build([
      'prefix' => false,
      'controller' => 'Pages',
      'action' => 'display',
      'privacy_policy',
    ]) ?>" class="settings-item">
    <div class="settings-item-label">
      <?= __('プライバシーポリシー') ?>
    </div>

    <div style="settings-item-indicator">
      <i class="fas fa-chevron-right settings-item-indicator-icon"></i>
    </div>
  </a>
</div>

