<?php

namespace app\library;

use Google\Client;
use Google\Service\Oauth2 as ServiceOAuth2;
use GuzzleHttp\Client as GuzzleClient;
use Google\Service\Oauth2\Userinfo;
class GoogleClient
{
    public readonly Client $client;

    private userInfo $dataClass;
    public function __construct()
    {
        $this->client = new Client;
    }

    public function init()
    {
        $guzzleClient = new GuzzleClient(['curl'=>[CURLOPT_SSL_VERIFYPEER => false]]);
        $this->client->setHttpClient($guzzleClient);
        $this->client->setAuthConfig('credentials.json');
        $this->client->setRedirectUri('http://localhost:63342');
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function authorized()
    {
        if(isset($_GET['code'])){
           $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
           $this->client->setAccessToken($token['access_token']);
           $googleService = new ServiceOAuth2($this->client);
           $this->dataClass->$googleService->userinfo->get();
        }
    }

    public function getData()
    {
        return $this->dataClass;
    }

    public function generateAuthLink()
    {
        return $this->client->createAuthUrl();
    }
}