<?php

namespace SlimKit\PlusID\Client\Auth;

use SlimKit\PlusID\Client\Client;
use SlimKit\PlusID\Client\Support\URL;

class Login
{
    protected $client;
    protected $user;
    protected $time;

    public function __construct(Client $client, int $user)
    {
        $this->client;
        $this->user = $user;
        $this->time = time();
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function getSign(): string
    {
        $action = [
            'app' => $this->client->getApp(),
            'action' => 'auth/login',
            'time' => $this->time,
            'user' => $this->user,
        ];

        return $this->client->getSign($action);
    }

    public function getURI(): string
    {
        $url = new URL($this->client->getServe());
        $url->addQuery('time', $this->time);
        $url->addQuery('user', $this->user);
        $url->addQuery('sign', $this->getSign());
        $url->addQuery('action', 'auth/login');

        return $url->make();
    }
}
