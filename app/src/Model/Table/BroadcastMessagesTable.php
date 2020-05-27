<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\ORM\Table;
use Cake\Validation\Validator;

class BroadcastMessagesTable extends Table {
  public function initialize(array $config): void {
    parent::initialize($config);

    $this->belongsTo('Broadcasts');
  }

  public function validationDefault(Validator $validator): Validator {
    $validator
        ->notEmptyString('message');

    return $validator;
  }
}

