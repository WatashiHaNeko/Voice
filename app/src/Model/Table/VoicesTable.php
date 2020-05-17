<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\ORM\Table;
use Cake\Validation\Validator;

class VoicesTable extends Table {
  public function initialize(array $config): void {
    parent::initialize($config);

    $this->hasMany('MessageSchedules');
  }

  public function validationDefault(Validator $validator): Validator {
    $validator
        ->notEmptyString('name', __('ペットのお名前を入力してください。'));

    return $validator;
  }
}

