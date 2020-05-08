<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\ORM\Table;
use Cake\Validation\Validator;

class MessageQueuesTable extends Table {
  public function initialize(array $config): void {
    parent::initialize($config);

    $this->belongsTo('MessageSchedules');
  }
}

