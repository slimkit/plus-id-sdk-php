<?php

namespace SlimKit\PlusID\Client\User;

use SlimKit\PlusID\Client\Client;

class Check
{
    protected $client;
    protected $user;
    protected $time;

    public function __construct(Client $client)
    {
        $this->client;
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
            'action' => 'user/check',
            'time' => $this->time,
        ];

        return $this->client->getSign($action);
    }
}
