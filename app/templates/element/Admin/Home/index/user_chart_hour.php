<?php
$this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js', [
  'block' => true,
]);

$usersCreatedList = !empty($usersCreatedList) ? $usersCreatedList : [];
$style = !empty($style) ? $style : [];

$usersCountMapByHour = [
  '0' => 0,
  '1' => 0,
  '2' => 0,
  '3' => 0,
  '4' => 0,
  '5' => 0,
  '6' => 0,
  '7' => 0,
  '8' => 0,
  '9' => 0,
  '10' => 0,
  '11' => 0,
  '12' => 0,
  '13' => 0,
  '14' => 0,
  '15' => 0,
  '16' => 0,
  '17' => 0,
  '18' => 0,
  '19' => 0,
  '20' => 0,
  '21' => 0,
  '22' => 0,
  '23' => 0,
];

foreach ($usersCreatedList as $created) {
  $created = $created->setTimezone('Asia/Tokyo');

  $usersCountMapByHour[$created->i18nFormat('H')]++;
}
?>

<canvas id="user-chart-hour-canvas" style="<?= $this->Html->style($style) ?>"></canvas>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
  const canvas = document.querySelector("#user-chart-hour-canvas");

  const labels = <?= json_encode(array_keys($usersCountMapByHour)) ?>;
  const values = <?= json_encode(array_values($usersCountMapByHour)) ?>;

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
  });
});
</script>
<?php $this->end(); ?>

