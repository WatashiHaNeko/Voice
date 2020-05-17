<?php
declare(strict_types=1);

namespace App\Utility;

class MediaType {
  const MEDIA_TYPE_EXT_MAP = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'video/mp4' => 'mp4',
    'audio/x-m4a' => 'm4a',
  ];

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

