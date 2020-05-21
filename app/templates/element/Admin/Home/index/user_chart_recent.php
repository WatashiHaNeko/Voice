<?php
use Cake\I18n\Time;

$this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js', [
  'block' => true,
]);

$usersCreatedList = !empty($usersCreatedList) ? $usersCreatedList : [];
$style = !empty($style) ? $style : [];

$usersCountMapByDate = [];

$today = Time::now('Asia/Tokyo')
    ->hour(0)
    ->minute(0)
    ->second(0);

foreach ($usersCreatedList as $created) {
  $todayDateFormatString = $today->i18nFormat('yyyy.MM.dd', 'Asia/Tokyo');

  if (!array_key_exists($todayDateFormatString, $usersCountMapByDate)) {
    $usersCountMapByDate[$todayDateFormatString] = 0;
  }

  $createdDateFormatString = $created->i18nFormat('yyyy.MM.dd', 'Asia/Tokyo');

  while ($todayDateFormatString !== $createdDateFormatString) {
    $todayDateFormatString = $today
        ->subDay(1)
        ->i18nFormat('yyyy.MM.dd', 'Asia/Tokyo');

    if (!array_key_exists($todayDateFormatString, $usersCountMapByDate)) {
      $usersCountMapByDate[$todayDateFormatString] = 0;
    }
  }

  $usersCountMapByDate[$createdDateFormatString]++;
}

$width = intval(100 + (16 * count($usersCountMapByDate)));
$height = 250;

$style['min-width'] = sprintf('%dpx', $width);
$style['max-height'] = sprintf('%dpx', $height);
?>

<div style="<?= $this->Html->style($style) ?>">
  <canvas id="user-chart-recent-canvas"></canvas>
</div>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
  const canvas = document.querySelector("#user-chart-recent-canvas");

  const labels = <?= json_encode(array_reverse(array_keys($usersCountMapByDate))) ?>;
  const values = <?= json_encode(array_reverse(array_values($usersCountMapByDate))) ?>;

  const chart = new Chart(canvas, {
    type: "line",
    data: {
      labels,
      datasets: [
        {
          label: "<?= __('User Registration Count') ?>",
          data: values,
          backgroundColor: "hsla(211, 100%, 50%, .5)",
          borderWidth: 1,
          borderColor: "hsl(211, 100%, 50%)",
        },
      ],
    },
    options: {
      aspectRatio: <?= $width / $height ?>,
      scales: {
        xAxes: [
          {
            ticks: {
              autoSkip: false,
              callback: (value, index, values) => {
                const monthAndDay = value.substr(5);

                if (index === 0 || monthAndDay === "01.01") {
                  return value;
                }

                const day = value.substr(8);

                if (day === "01") {
                  return monthAndDay;
                }

                return day;
              },
            },
          },
        ],
        yAxes: [
          {
            ticks: {
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

