<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-165940788-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-165940788-1');

  gtag('set', {
    <?php if (!empty($authUser)): ?>
    'user_id': '<?= $authUser['id'] ?>',
    <?php endif; ?>
  });
</script>

