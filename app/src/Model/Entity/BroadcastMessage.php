<?php
declare(strict_types=1);

namespace App\Model\Entity;

use App\Utility\MediaType;
use Cake\Core\Configure;
use Cake\ORM\Entity;

class BroadcastMessage extends Entity {
  protected $_accessible = [
    '*' => true,
    'id' => false,
  ];

  public function getDirname(): string {
    return WWW_ROOT . implode(DS, [
      'upload', 'broadcast_messages', $this['id'],
    ]);
  }

  public function getImageFilename(bool $originalSize = false): string {
    $filename = $this['image_filename'];
    $mediaType = $this['image_media_type'];

    if (!$originalSize) {
      $filename .= '.400';
    }

    if (MediaType::checkMediaTypeSupported($mediaType)) {
      $filename .= '.' . MediaType::getExtByMediaType($mediaType);
    }

    return $filename;
  }

  public function getImageFilepath(bool $originalSize = false): string {
    return implode(DS, [
      $this->getDirname(),
      $this->getImageFilename($originalSize),
    ]);
  }

  public function getImageUrl(bool $originalSize = false): ?string {
    if (empty($this['image_filename'])) {
      return null;
    }

    return implode('/', [
      Configure::read('App.fullBaseUrl'),
      'upload', 'broadcast_messages', $this['id'],
      $this->getImageFilename($originalSize),
    ]);
  }
}

