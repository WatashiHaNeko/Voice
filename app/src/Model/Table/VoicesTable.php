<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\ORM\Table;
use Cake\Validation\Validator;

class VoicesTable extends Table {
  const MEDIA_TYPE_EXT_MAP = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
  ];

  public function validationDefault(Validator $validator): Validator {
    $validator->notEmpty([
      'name' => [
        'message' => __('ペットのお名前を入力してください。'),
      ],
    ]);

    return $validator;
  }

  public static function checkMediaTypeSupported(string $mediaType): bool {
    return array_key_exists($mediaType, self::MEDIA_TYPE_EXT_MAP);
  }

  public static function getExtByMediaType(string $mediaType): ?string {
    if (!self::checkMediaTypeSupported($mediaType)) {
      return null;
    }

    return self::MEDIA_TYPE_EXT_MAP[$mediaType];
  }
}

