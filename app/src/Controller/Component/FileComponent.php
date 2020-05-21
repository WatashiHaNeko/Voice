<?php
declare(strict_types=1);

namespace App\Controller\Component;

use App\Exception\Exception as AppException;
use App\Model\Entity\Voice;
use Cake\Controller\Component;
use Cake\I18n\Time;
use Cake\Log\Log;
use Imagick;
use Laminas\Diactoros\UploadedFile;

class FileComponent extends Component {
  public function deployVoiceAvatarImage(Voice $voice, UploadedFile $file): void {
    $dirname = $voice->getDirname();

    if (!file_exists($dirname)) {
      $isDirectoryMade = mkdir($dirname);

      if (!$isDirectoryMade) {
        throw new AppException(__('画像を保存できませんでした。'));
      }
    }

    $tmpFilename = vsprintf('%s/tmp-%s', [
      $dirname,
      Time::now()->i18nFormat('yyyyMMddHHmmss'),
    ]);

    $file->moveTo($tmpFilename);

    $voice['avatar_image_filename'] = hash_file('sha256', $tmpFilename);

    $imagick = new Imagick($tmpFilename);

    $imageWritten = $imagick->writeImage($voice->getAvatarImageFilepath(true));

    if (!$imageWritten) {
      throw new AppException(__('画像を保存できませんでした。'));
    }

    $imagick->resizeImage(400, 400, Imagick::FILTER_LANCZOS, 1, true);

    $imageWritten = $imagick->writeImage($voice->getAvatarImageFilepath());

    if (!$imageWritten) {
      throw new AppException(__('画像を保存できませんでした。'));
    }

    unlink($tmpFilename);
  }
}

