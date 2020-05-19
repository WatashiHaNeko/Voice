<?php
$this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js', [
  'block' => true,
]);

$usersCreatedList = !empty($usersCreatedList) ? $usersCreatedList : [];
$style = !empty($style) ? $style : [];

$usersCountMapByWeek = [
  'Sun' => 0,
  'Mon' => 0,
  'Tue' => 0,
  'Wed' => 0,
  'Thu' => 0,
  'Fri' => 0,
  'Sat' => 0,
];

foreach ($usersCreatedList as $created) {
  $created = $created->setTimezone('Asia/Tokyo');

  $usersCountMapByWeek[$created->i18nFormat('E')]++;
}
?>

<canvas id="user-chart-week-canvas" style="<?= $this->Html->style($style) ?>"></canvas>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
  const canvas = document.querySelector("#user-chart-week-canvas");

  const labels = <?= json_encode(array_keys($usersCountMapByWeek)) ?>;
  const values = <?= json_encode(array_values($usersCountMapByWeek)) ?>;

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

