<?php
declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Table\VoicesTable;
use Cake\ORM\Entity;

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

  public function getAvatarImageFilename() {
    $filename = 'avatar';
    $mediaType = $this['avatar_image_media_type'];

    if (VoicesTable::checkMediaTypeSupported($mediaType)) {
      $filename .= '.' . VoicesTable::getExtByMediaType($mediaType);
    }

    return $filename;
  }

  public function getAvatarImageFilepath() {
    return implode(DS, [
      $this->getDirname(),
      $this->getAvatarImageFilename(),
    ]);
  }

  public function getAvatarImageUrl() {
    return implode('/', [
      Configure::read('App.fullBaseUrl'),
      'upload', 'voices', $this['id'],
      $this->getAvatarImageFilename(),
    ]);
  }
}
