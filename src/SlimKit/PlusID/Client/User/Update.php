<?php

namespace SlimKit\PlusID\Client\User;

use SlimKit\PlusID\Client\Client;

class Update
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
            'action' => 'user/update',
            'time' => $this->time,
            'user' => $this->user,
        ];

        return $this->client->getSign($action);
    }
}
