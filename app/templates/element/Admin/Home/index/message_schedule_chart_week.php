<?php
$this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js', [
  'block' => true,
]);

$messageSchedules = !empty($messageSchedules) ? $messageSchedules : [];

$messageSchedulesCountMapByWeek = [
  'Sun' => 0,
  'Mon' => 0,
  'Tue' => 0,
  'Wed' => 0,
  'Thu' => 0,
  'Fri' => 0,
  'Sat' => 0,
];

foreach ($messageSchedules as $messageSchedule) {
  if ($messageSchedule['scheduled_weekday_1']) {
    $messageSchedulesCountMapByWeek['Sun']++;
  }

  if ($messageSchedule['scheduled_weekday_2']) {
    $messageSchedulesCountMapByWeek['Mon']++;
  }

  if ($messageSchedule['scheduled_weekday_3']) {
    $messageSchedulesCountMapByWeek['Tue']++;
  }

  if ($messageSchedule['scheduled_weekday_4']) {
    $messageSchedulesCountMapByWeek['Wed']++;
  }

  if ($messageSchedule['scheduled_weekday_5']) {
    $messageSchedulesCountMapByWeek['Thu']++;
  }

  if ($messageSchedule['scheduled_weekday_6']) {
    $messageSchedulesCountMapByWeek['Fri']++;
  }

  if ($messageSchedule['scheduled_weekday_7']) {
    $messageSchedulesCountMapByWeek['Sat']++;
  }
}
?>

<canvas id="message-schedule-chart-week-canvas"></canvas>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
  const canvas = document.querySelector("#message-schedule-chart-week-canvas");

  const labels = <?= json_encode(array_keys($messageSchedulesCountMapByWeek)) ?>;
  const values = <?= json_encode(array_values($messageSchedulesCountMapByWeek)) ?>;

  const chart = new Chart(canvas, {
    type: "line",
    data: {
      labels,
      datasets: [
        {
          label: "<?= __('Message Schedule Count') ?>",
          data: values,
          backgroundColor: "hsla(211, 100%, 50%, .5)",
          borderWidth: 1,
          borderColor: "hsl(211, 100%, 50%)",
        },
      ],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              min: 0,
              stepSize: 1,
            },
          },
        ],
      },
    },
  });
});
</script>
<?php $this->end(); ?>

