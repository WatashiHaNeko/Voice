<?php
use Cake\Core\Configure;

echo $this->Form->create(null, [
  'id' => 'auth-form',
]);

echo $this->Form->hidden('line_access_token', [
  'id' => 'line-access-token-field',
]);

echo $this->Form->end();
?>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
  await liff.init({ liffId: "<?= Configure::read('Line.Liff.id') ?>" }).catch((error) => {
    alert(JSON.stringify(error, null, "  "));
  });

  if (!liff.isLoggedIn()) {
    return liff.login({
      redirectUri: "<?= $this->Url->build([], ['fullBase' => true]) ?>",
    });
  }

  const authForm = document.querySelector("#auth-form");
  const lineAccessTokenField = document.querySelector("#line-access-token-field");

  lineAccessTokenField.value = liff.getAccessToken();

  authForm.submit();
});
</script>
<?php $this->end(); ?>

