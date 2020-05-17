<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\Utility\Security;

class LineMessageController extends ApiController {
  public function initialize(): void {
    parent::initialize();

    $this->loadModel('WebhookEventLogs');

    $this->loadComponent('LineApi');
  }

  public function webhook() {
    $requestBody = $this->request->input();

    $digest = hash_hmac('sha256', $requestBody, Configure::read('Line.OfficialAccount.channelSecret'), true);
    $signature = base64_encode($digest);
    $lineSignature = $this->request->getHeaderLine('X_LINE_SIGNATURE');

    $isSignatureValid = $signature === $lineSignature;

    $requestData = json_decode($requestBody, true);

    $events = !empty($requestData['events']) ? $requestData['events'] : [];

    foreach ($events as $event) {
      $webhookEventLog = $this->WebhookEventLogs->newEntity([
        'is_signature_valid' => $isSignatureValid,
      ]);

      $webhookEventLog['line_user_id'] = !empty($event['source']['userId']) ? $event['source']['userId'] : null;
      $webhookEventLog['type'] = $event['type'];

      if ($webhookEventLog['type'] === 'message') {
        $webhookEventLog['message_id'] = $event['message']['id'];
        $webhookEventLog['message_type'] = $event['message']['type'];

        if ($webhookEventLog['message_type'] === 'text') {
          $webhookEventLog['message_text'] = $event['message']['text'];
        }

        if ($webhookEventLog['message_type'] === 'image') {
          $contentType = $this->LineApi->getMessageContent($webhookEventLog['message_id']);

          if (!empty($contentType)) {
            $webhookEventLog['message_media_type'] = $contentType;
          }
        }

        if ($webhookEventLog['message_type'] === 'video') {
          $contentType = $this->LineApi->getMessageContent($webhookEventLog['message_id']);

          if (!empty($contentType)) {
            $webhookEventLog['message_media_type'] = $contentType;
          }
        }

        if ($webhookEventLog['message_type'] === 'audio') {
          $contentType = $this->LineApi->getMessageContent($webhookEventLog['message_id']);

          if (!empty($contentType)) {
            $webhookEventLog['message_media_type'] = $contentType;
          }
        }

        if ($webhookEventLog['message_type'] === 'location') {
          $webhookEventLog['message_location_title'] = $event['message']['title'];
          $webhookEventLog['message_location_address'] = $event['message']['address'];
          $webhookEventLog['message_location_latitude'] = $event['message']['latitude'];
          $webhookEventLog['message_location_longitude'] = $event['message']['longitude'];
        }
      }

      $webhookEventLogSaved = $this->WebhookEventLogs->save($webhookEventLog);

      if (!$webhookEventLogSaved) {
        Log::error(sprintf('Failed to save webhook event log. Original event data: %s', json_encode($event)));
      }
    }
  }
}

