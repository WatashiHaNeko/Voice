<?php
declare(strict_types=1);

namespace App\Model\Entity;

use App\Utility\MediaType;
use Cake\Core\Configure;
use Cake\ORM\Entity;
use Cake\Routing\Asset;

class Voice extends Entity {
  protected $_accessible = [
    '*' => true,
    'id' => false,
  ];

  public function getDirname() {
    return WWW_ROOT . implode(DS, [
      'upload', 'voices', $this['id'],
    ]);
  }

  public function getAvatarImageFilename(bool $originalSize = false) {
    $filename = $this['avatar_image_filename'];
    $mediaType = $this['avatar_image_media_type'];

    if (!$originalSize) {
      $filename .= '.400';
    }

    if (MediaType::checkMediaTypeSupported($mediaType)) {
      $filename .= '.' . MediaType::getExtByMediaType($mediaType);
    }

    return $filename;
  }

  public function getAvatarImageFilepath(bool $originalSize = false) {
    return implode(DS, [
      $this->getDirname(),
      $this->getAvatarImageFilename($originalSize),
    ]);
  }

  public function getAvatarImageUrl(bool $originalSize = false) {
    if (empty($this['avatar_image_filename'])) {
      return Asset::imageUrl('avatar-default.jpg', [
        'fullBase' => true,
      ]);
    }

    return implode('/', [
      Configure::read('App.fullBaseUrl'),
      'upload', 'voices', $this['id'],
      $this->getAvatarImageFilename($originalSize),
    ]);
  }
}

