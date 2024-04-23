<?php

namespace app\library;

use Google\Client;
use Google\Service\Exception;
use Google\Service\Oauth2 as ServiceOAuth2;
use GuzzleHttp\Client as GuzzleClient;
use Google\Service\Oauth2\Userinfo;

class GoogleClient
{
    public readonly Client $client;

    private Userinfo $data;
    public function __construct()
    {
        $this->client = new Client;
    }


    /**
     * @throws \Google\Exception
     */
    public function init():void
    {
        $guzzleClient = new GuzzleClient(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]);
        $this->client->setHttpClient($guzzleClient);
        $this->client->setAuthConfig('credentials.json');
        $this->client->setRedirectUri('http://localhost:63342');
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    /**
     * @throws Exception
     */
    public function authorized(): bool
    {
        if(isset($_GET['code'])){
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->client->setAccessToken($token['access_token']);
            $googleService = new ServiceOauth2($this->client);
            $this->data = $googleService->userinfo->get();

            return true;
        }

        return false;
    }

    /**
     * @return Userinfo
     */
    public function getData(): Userinfo
    {
        return $this->data;
    }

    public function generateAuthLink(): string
    {
        return $this->client->createAuthUrl();
    }

}

