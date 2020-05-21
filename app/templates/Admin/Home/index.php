<?php
use Cake\I18n\Time;

$today = Time::now('Asia/Tokyo')
    ->hour(0)
    ->minute(0)
    ->second(0);

$usersCountMapBySpan = [
  'day' => 0,
  'week' => 0,
  'month' => 0,
  'year' => 0,
  'total' => 0,
];

foreach ($usersCreatedList as $created) {
  $created = $created->setTimezone('Asia/Tokyo');
  $dayOfWeek = intval($created->i18nFormat('e'));

  $createdDateFormatString = $created->i18nFormat('yyyy.MM.dd');
  $todayDateFormatString = $today->i18nFormat('yyyy.MM.dd');
  $createdYearWeekFormatString = $created->i18nFormat('yyyy.w');
  $todayYearWeekFormatString = $today->i18nFormat('yyyy.w');

  $usersCountMapBySpan['total']++;

  if ($createdYearWeekFormatString === $todayYearWeekFormatString) {
    $usersCountMapBySpan['week']++;
  }

  if (substr($createdDateFormatString, 0, 4) !== substr($todayDateFormatString, 0, 4)) {
    continue;
  }

  $usersCountMapBySpan['year']++;

  if (substr($createdDateFormatString, 0, 7) !== substr($todayDateFormatString, 0, 7)) {
    continue;
  }

  $usersCountMapBySpan['month']++;

  if ($createdDateFormatString !== $todayDateFormatString) {
    continue;
  }

  $usersCountMapBySpan['day']++;
}
?>

<h2 class="mt-4">
  <?= __('User Analytics') ?>
</h2>

<h3 class="mt-3">
  <?= __('Total Users') ?>
</h3>

<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 class="h6 text-center text-nowrap">
          <?= __('Total') ?>
        </h4>

        <div class="display-4 text-center text-nowrap">
          <?= h($usersCountMapBySpan['total']) ?>
        </div>
      </div>
    </div>
  </div>
</div>

<h3 class="mt-3">
  <?= __('New Users (Span Type)') ?>
</h3>

<div class="row">
  <div class="col-sm-2">
    <div class="card">
      <div class="card-body">
        <h4 class="h6 text-center text-nowrap">
          <?= __('Today') ?>
        </h4>

        <div class="display-4 text-center text-nowrap">
          <?= h($usersCountMapBySpan['day']) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-2">
    <div class="card">
      <div class="card-body">
        <h4 class="h6 text-center text-nowrap">
          <?= __('This Week') ?>
        </h4>

        <div class="display-4 text-center text-nowrap">
          <?= h($usersCountMapBySpan['week']) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-2">
    <div class="card">
      <div class="card-body">
        <h4 class="h6 text-center text-nowrap">
          <?= __('This Month') ?>
        </h4>

        <div class="display-4 text-center text-nowrap">
          <?= h($usersCountMapBySpan['month']) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-2">
    <div class="card">
      <div class="card-body">
        <h4 class="h6 text-center text-nowrap">
          <?= __('This Year') ?>
        </h4>

        <div class="display-4 text-center text-nowrap">
          <?= h($usersCountMapBySpan['year']) ?>
        </div>
      </div>
    </div>
  </div>
</div>

<h3 class="mt-3">
  <?= __('New Users (Recent)') ?>
</h3>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body" style="<?= $this->Html->style([
          'overflow-x' => 'scroll',
          'direction' => 'rtl',
        ]) ?>">
        <?= $this->element('Admin/Home/index/user_chart_recent', [
          'usersCreatedList' => $usersCreatedList,
        ]) ?>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <h3 class="mt-3">
      <?= __('New Users (Hour)') ?>
    </h3>

    <div class="card">
      <div class="card-body">
        <?= $this->element('Admin/Home/index/user_chart_hour', [
          'usersCreatedList' => $usersCreatedList,
        ]) ?>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <h3 class="mt-3">
      <?= __('New Users (Weekday)') ?>
    </h3>

    <div class="card">
      <div class="card-body">
        <?= $this->element('Admin/Home/index/user_chart_week', [
          'usersCreatedList' => $usersCreatedList,
        ]) ?>
      </div>
    </div>
  </div>
</div>

<h2 class="mt-4">
  <?= __('Message Schedule Analytics') ?>
</h2>

<div class="row">
  <div class="col-md-6">
    <h3 class="mt-3">
      <?= __('Message Schedule (Hour)') ?>
    </h3>

    <div class="card">
      <div class="card-body">
        <?= $this->element('Admin/Home/index/message_schedule_chart_hour', [
          'messageSchedules' => $messageSchedules,
        ]) ?>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <h3 class="mt-3">
      <?= __('Message Schedule (Weekday)') ?>
    </h3>

    <div class="card">
      <div class="card-body">
        <?= $this->element('Admin/Home/index/message_schedule_chart_week', [
          'messageSchedules' => $messageSchedules,
        ]) ?>
      </div>
    </div>
  </div>
</div>

