<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\ORM\Table;

class MessageSchedulesTable extends Table {
  public function initialize(array $config): void {
    parent::initialize($config);

    $this->belongsTo('Users');
    $this->belongsTo('Voices');
  }
}

