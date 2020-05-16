<?php
$this->disableAutoLayout();
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <title>
      <?= vsprintf('%s | %s', [
        __('わんわんボイス'),
        __('利用規約'),
      ]) ?>
    </title>
  </head>

  <body>
    <h1>
      <?= __('利用規約') ?>
    </h1>

    <p>
      <?= __('この利用規約（以下、「本規約」といいます。）は、{0}（以下、「本サービス」といいます。）の利用条件を定めるものです。', vsprintf('<a href="%s">%s</a>', [
        $this->Url->build([
          'home',
        ]),
        __('わんわんボイス'),
      ])) ?>
      <?= __('登録ユーザーの皆さま（以下、「ユーザー」といいます。）には、本規約に従って、本サービスをご利用いただきます。') ?>
    </p>

    <h2>
      <?= __('第1条（適用）') ?>
    </h2>

    <ol>
      <li>
        <?= __('本サービスに関し、本規約のほか、ご利用にあたってのルール等、各種の定め（以下、「個別規定」といいます。）をすることがあります。') ?>
        <?= __('これら個別規定はその名称のいかんに関わらず、本規約の一部を構成するものとします。') ?>
      </li>

      <li>
        <?= __('本規約の規定が前条の個別規定の規定と矛盾する場合には、個別規定において特段の定めなき限り、個別規定の規定が優先されるものとします。') ?>
      </li>
    </ol>

    <h2>
      <?= __('第2条（禁止事項）') ?>
    </h2>

    <p>
      <?= __('ユーザーは、本サービスの利用にあたり、以下の行為をしてはなりません。') ?>
    </p>

    <ol>
      <li>
        <?= __('法令または公序良俗に違反する行為') ?>
      </li>

      <li>
        <?= __('犯罪行為に関連する行為') ?>
      </li>

      <li>
        <?= __('本サービスの内容等、本サービスに含まれる著作権、商標権ほか知的財産権を侵害する行為') ?>
      </li>

      <li>
        <?= __('本サービス、ほかのユーザー、またはその他第三者のサーバーまたはネットワークの機能を破壊したり、妨害したりする行為') ?>
      </li>

      <li>
        <?= __('本サービスによって得られた情報を商業的に利用する行為') ?>
      </li>

      <li>
        <?= __('本サービスの運営を妨害するおそれのある行為') ?>
      </li>

      <li>
        <?= __('不正アクセスをし、またはこれを試みる行為') ?>
      </li>

      <li>
        <?= __('他のユーザーに関する個人情報等を収集または蓄積する行為') ?>
      </li>

      <li>
        <?= __('不正な目的を持って本サービスを利用する行為') ?>
      </li>

      <li>
        <?= __('本サービスの他のユーザーまたはその他の第三者に不利益、損害、不快感を与える行為') ?>
      </li>

      <li>
        <?= __('他のユーザーに成りすます行為') ?>
      </li>

      <li>
        <?= __('面識のない異性との出会いを目的とした行為') ?>
      </li>

      <li>
        <?= __('本サービスに関連して、反社会的勢力に対して直接または間接に利益を供与する行為') ?>
      </li>
    </ol>

    <h2>
      <?= __('第3条（本サービスの提供の停止等）') ?>
    </h2>

    <ol>
      <li>
        <?= __('以下のいずれかの事由があると判断した場合、ユーザーに事前に通知することなく本サービスの全部または一部の提供を停止または中断することができるものとします。') ?>
        <ol>
          <li>
            <?= __('本サービスにかかるコンピュータシステムの保守点検または更新を行う場合') ?>
          </li>

          <li>
            <?= __('地震、落雷、火災、停電または天災などの不可抗力により、本サービスの提供が困難となった場合') ?>
          </li>

          <li>
            <?= __('コンピュータまたは通信回線等が事故により停止した場合') ?>
          </li>

          <li>
            <?= __('その他、本サービスの提供が困難と判断した場合') ?>
          </li>
        </ol>
      </li>

      <li>
        <?= __('本サービスの提供の停止または中断により、ユーザーまたは第三者が被ったいかなる不利益または損害についても、一切の責任を負わないものとします。') ?>
      </li>
    </ol>

    <h2>
      <?= __('第4条（利用制限および登録抹消）') ?>
    </h2>

    <ol>
      <li>
        <?= __('ユーザーが以下のいずれかに該当する場合には、事前の通知なく、ユーザーに対して、本サービスの全部もしくは一部の利用を制限し、またはユーザーとしての登録を抹消することができるものとします。') ?>
        <ol>
          <li>
            <?= __('本規約のいずれかの条項に違反した場合') ?>
          </li>
          <li>
            <?= __('その他、本サービスの利用を適当でないと判断した場合') ?>
          </li>
        </ol>
      </li>

      <li>
        <?= __('本条に基づき本サービスが行った行為によりユーザーに生じた損害について、一切の責任を負いません。') ?>
      </li>
    </ol>

    <h2>
      <?= __('第5条（保証の否認および免責事項）') ?>
    </h2>

    <ol>
      <li>
        <?= __('本サービスに事実上または法律上の瑕疵（安全性、信頼性、正確性、完全性、有効性、特定の目的への適合性、セキュリティなどに関する欠陥、エラーやバグ、権利侵害などを含みます。）がないことを明示的にも黙示的にも保証しておりません。') ?>
      </li>

      <li>
        <?= __('本サービスに起因してユーザーに生じたあらゆる損害について一切の責任を負いません。') ?>
        <?= __('ただし、本サービスに関するユーザーとの間の契約（本規約を含みます。）が消費者契約法に定める消費者契約となる場合、この免責規定は適用されません。') ?>
      </li>

      <li>
        <?= __('本サービスに関して、ユーザーと他のユーザーまたは第三者との間において生じた取引、連絡または紛争等について一切責任を負いません。') ?>
      </li>
    </ol>

    <h2>
      <?= __('第6条（サービス内容の変更等）') ?>
    </h2>

    <p>
      <?= __('ユーザーに通知することなく、本サービスの内容を変更しまたは本サービスの提供を中止することができるものとし、これによってユーザーに生じた損害について一切の責任を負いません。') ?>
    </p>

    <h2>
      <?= __('第7条（利用規約の変更）') ?>
    </h2>

    <p>
      <?= __('必要と判断した場合には、ユーザーに通知することなくいつでも本規約を変更することができるものとします。') ?>
      <?= __('なお、本規約の変更後、本サービスの利用を開始した場合には、当該ユーザーは変更後の規約に同意したものとみなします。') ?>
    </p>

    <h2>
      <?= __('第8条（個人情報の取扱い）') ?>
    </h2>

    <p>
      <?= __('本サービスの利用によって取得する個人情報については、「{0}」に従い適切に取り扱うものとします。', vsprintf('<a href="%s">%s</a>', [
        $this->Url->build([
          'privacy_policy',
        ]),
        __('プライバシーポリシー'),
      ])) ?>
    </p>

    <h2>
      <?= __('第9条（準拠法・裁判管轄）') ?>
    </h2>

    <ol>
      <li>
        <?= __('本規約の解釈にあたっては、日本法を準拠法とします。') ?>
      </li>
    </ol>

    <p>
      <?= __('以上') ?>
    </p>

    <ul>
      <li>
        <a href="<?= $this->Url->build([
            'prefix' => 'Liff',
            'controller' => 'Home',
            'action' => 'index',
          ]) ?>">
          <?= __('トップへ') ?>
        </a>
      </li>
    </ul>
  </body>
</html>
