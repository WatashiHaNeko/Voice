<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\ORM\Table;
use Cake\Validation\Validator;

class MessageSchedulesTable extends Table {
  public function initialize(array $config): void {
    parent::initialize($config);

    $this->belongsTo('Users');
    $this->belongsTo('Voices');
  }

  public function validationDefault(Validator $validator): Validator {
    $validator
        ->notEmptyString('message', __('メッセージを入力してください。'));

    return $validator;
  }
}

