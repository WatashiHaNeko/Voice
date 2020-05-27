<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\ORM\Table;
use Cake\Validation\Validator;

class BroadcastsTable extends Table {
  public function initialize(array $config): void {
    parent::initialize($config);
  }

  public function validationDefault(Validator $validator): Validator {
    $validator
        ->notEmptyString('title');

    return $validator;
  }
}

