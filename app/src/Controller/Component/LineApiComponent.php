<?php
declare(strict_types=1);

namespace App\Controller\Component;

use App\Exception\Exception as AppException;
use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Http\Client;

class LineApiComponent extends Component {
  protected $_accessToken = null;

  public function setAccessToken($accessToken) {
    $requestQuery = [
      'access_token' => $accessToken,
    ];

    $client = new Client();

    $response = $client->get(vsprintf('%s://%s/%s', [
      'https',
      implode('.', ['api', 'line', 'me']),
      implode('/', ['oauth2', 'v2.1', 'verify']),
    ]), $requestQuery);

    if ($response->getStatusCode() !== 200) {
      return false;
    }

    $responseData = $response->getJson();

    if ($responseData['expires_in'] <= 0) {
      return false;
    }
    
    if ($responseData['client_id'] !== Configure::read('Line.Login.channelId')) {
      return false;
    }

    $this->_accessToken = $accessToken;

    return true;
  }

  public function getUserProfile(): ?array {
    if (empty($this->_accessToken)) {
      throw new AppException('AccessToken is not set.');
    }

    $client = new Client();

    $response = $client->get(vsprintf('%s://%s/%s', [
      'https',
      implode('.', ['api', 'line', 'me']),
      implode('/', ['v2', 'profile']),
    ]), [], [
      'headers' => [
        'Authorization' => sprintf('Bearer %s', $this->_accessToken),
      ],
    ]);

    if ($response->getStatusCode() !== 200) {
      return null;
    }

    $responseData = $response->getJson();

    return $responseData;
  }

  public function checkFriendshipWithOfficialAccount(): bool {
    if (empty($this->_accessToken)) {
      throw new AppException('AccessToken is not set.');
    }

    $client = new Client();

    $response = $client->get(vsprintf('%s://%s/%s', [
      'https',
      implode('.', ['api', 'line', 'me']),
      implode('/', ['friendship', 'v1', 'status']),
    ]), [], [
      'headers' => [
        'Authorization' => sprintf('Bearer %s', $this->_accessToken),
      ],
    ]);

    if ($response->getStatusCode() !== 200) {
      return false;
    }

    $responseData = $response->getJson();

    return $responseData['friendFlag'];
  }
}

