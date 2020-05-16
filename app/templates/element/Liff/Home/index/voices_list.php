<?php
use Cake\Core\Configure;
?>

<div style="<?= $this->Html->style([
    'padding-bottom' => '108px',
  ]) ?>">
  <?php foreach ($voices as $voice): ?>
  <a href="<?= $this->Url->build([
    'controller' => 'Voices',
    'action' => 'view',
    $voice['id'],
  ]) ?>" style="<?= $this->Html->style([
      'display' => 'flex',
      'justify-content' => 'flex-start',
      'align-items' => 'stretch',
      'padding' => '8px 16px',
      'background-color' => '#ffffff',
      'border-bottom' => 'solid 1px #d1d1d6',
      'color' => '#1c1c1e',
    ]) ?>">
    <div style="<?= $this->Html->style([
        'width' => '48px',
        'height' => '48px',
      ]) ?>">
      <img src="<?= $voice->getAvatarImageUrl() ?>" class="avatar" style="<?= $this->Html->style([
          'padding' => '2px',
          'border' => 'solid 1px #d1d1d6',
        ]) ?>">
    </div>

    <div style="<?= $this->Html->style([
        'flex' => 1,
        'margin-left' => '8px',
      ]) ?>">
      <p style="<?= $this->Html->style([
          'margin' => '0',
          'line-height' => '24px',
          'font-size' => '16px',
          'font-weight' => '600',
        ]) ?>">
        <?= h($voice['name']) ?>
      </p>
    </div>

    <div style="<?= $this->Html->style([
        'display' => 'flex',
        'align-items' => 'center',
        'margin-left' => '8px',
      ]) ?>">
      <i class="fas fa-chevron-right" style="<?= $this->Html->style([
          'color' => '#8e8e93',
          'font-size' => '16px',
        ]) ?>"></i>
    </div>
  </a>
  <?php endforeach; ?>

  <a href="<?= $this->Url->build([
    'action' => 'help',
  ]) ?>" style="<?= $this->Html->style([
    'display' => 'flex',
    'align-items' => 'baseline',
    'margin' => '24px',
    'padding' => '16px',
    'border' => 'solid 1px #8e8e93',
    'border-radius' => '8px',
    'color' => '#8e8e93',
  ]) ?>">
    <i class="far fa-question-circle"></i>

    <span style="<?= $this->Html->style([
        'margin-left' => '16px',
      ]) ?>">
      <?= __('ご意見・お問い合わせ') ?>
    </span>
  </a>

  <span id="line-share-button" style="<?= $this->Html->style([
    'display' => 'flex',
    'align-items' => 'baseline',
    'margin' => '24px',
    'padding' => '16px',
    'border' => 'solid 1px #2aa248',
    'border-radius' => '8px',
    'color' => '#2aa248',
  ]) ?>">
    <i class="fab fa-line"></i>

    <span style="<?= $this->Html->style([
        'margin-left' => '16px',
      ]) ?>">
      <?= __('LINEで友だちにシェア') ?>
    </span>
  </span>

  <a href="<?= vsprintf('%s://%s/%s?%s', [
    'https',
    implode('.', ['twitter', 'com']),
    implode('/', ['intent', 'tweet']),
    http_build_query([
      'hashtags' => __('わんわんボイス'),
      'url' => $this->Url->build([
        'prefix' => false,
        'controller' => 'Pages',
        'action' => 'display',
        'home',
      ], [
        'fullBase' => true,
      ]),
      'in_reply_to' => Configure::read('Twitter.Ads.tweetId'),
    ]),
  ]) ?>" target="_blank" style="<?= $this->Html->style([
    'display' => 'flex',
    'align-items' => 'baseline',
    'margin' => '24px',
    'padding' => '16px',
    'border' => 'solid 1px #0689c6',
    'border-radius' => '8px',
    'color' => '#0689c6',
  ]) ?>">
    <i class="fab fa-twitter"></i>

    <span style="<?= $this->Html->style([
        'margin-left' => '16px',
      ]) ?>">
      <?= __('Twitterでシェア') ?>
    </span>
  </a>
</div>

<div style="<?= $this->Html->style([
    'position' => 'fixed',
    'right' => '16px',
    'bottom' => '32px',
    'left' => '16px',
  ]) ?>">
  <a href="<?= $this->Url->build([
      'controller' => 'Voices',
      'action' => 'create',
    ]) ?>" class="button">
    <?= __('新しくペットを登録する') ?>
  </a>
</div>

<?php $this->append('script'); ?>
<script>
window.addEventListener("DOMContentLoaded", async (event) => {
  await liff.init({ liffId: "<?= Configure::read('Line.Liff.id') ?>" }).catch((error) => {
    alert(JSON.stringify(error, null, "  "));
  });

  const lineShareButton = document.querySelector("#line-share-button");

  lineShareButton.addEventListener("click", async (event) => {
    if (true || liff.isApiAvailable("shareTargetPicker")) {
      const result = await liff.shareTargetPicker([
        {
          type: "flex",
          altText: "<?= implode('\n', [
            __('わんわんボイス'),
            $this->Url->build([
              'prefix' => false,
              'controller' => 'Pages',
              'action' => 'display',
              'home',
            ], [
              'fullBase' => true,
            ]),
          ]) ?>",
          contents: {
            type: "bubble",
            hero: {
              type: "image",
              url: "<?= $this->Url->image('ogp_3.jpg', [
                'fullBase' => true,
              ]) ?>",
              size: "full",
              aspectRatio: "20:13",
              aspectMode: "cover",
              action: {
                type: "uri",
                uri: "<?= vsprintf('%s://%s/%s', [
                  'https',
                  implode('.', ['line', 'me']),
                  implode('/', ['R', 'ti', 'p', Configure::read('Line.OfficialAccount.id')]),
                ]) ?>",
              },
            },
            body: {
              type: "box",
              layout: "vertical",
              contents: [
                {
                  type: "text",
                  text: "<?= __('わんわんボイス') ?>",
                  weight: "bold",
                  size: "xl",
                },
                {
                  type: "text",
                  text: "<?= __('指定した時間にペットからLINEでメッセージが届く！') ?>",
                  wrap: true,
                },
              ],
            },
            footer: {
              type: "box",
              layout: "vertical",
              spacing: "sm",
              contents: [
                {
                  type: "button",
                  style: "link",
                  height: "sm",
                  action: {
                    type: "uri",
                    label: "<?= __('ためしに使ってみる') ?>",
                    uri: "<?= vsprintf('%s://%s/%s', [
                      'https',
                      implode('.', ['line', 'me']),
                      implode('/', ['R', 'ti', 'p', Configure::read('Line.OfficialAccount.id')]),
                    ]) ?>",
                  },
                },
              ],
            },
          },
        },
      ]).catch((error) => {
        alert(JSON.stringify({ error }, null, "  "));

        return null;
      });
    }
  });
});
</script>
<?php $this->end(); ?>

