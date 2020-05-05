<?php
use Cake\Core\Configure;

echo $this->Form->create(null, [
  'id' => 'auth-form',
]);

echo $this->Form->hidden('line_user_id', [
  'id' => 'line-user-id-field',
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

  const profile = await liff.getProfile().catch(() => {
    return null;
  });

  if (!profile) {
    alert("<?= __('LINEユーザー情報を取得できませんでした。') ?>");

    return liff.closeWindow();
  }

  const authForm = document.querySelector("#auth-form");
  const lineUserIdField = document.querySelector("#line-user-id-field");

  lineUserIdField.value = profile.userId;

  authForm.submit();
});
</script>
<?php $this->end(); ?>

