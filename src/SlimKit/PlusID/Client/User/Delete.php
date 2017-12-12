<?php

namespace SlimKit\PlusID\Client\User;

use SlimKit\PlusID\Client\Client;

class Delete
{
    protected $client;
    protected $user;
    protected $time;

    public function __construct(Client $client, int $user)
    {
        $this->client = $client;
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
            'action' => 'user/delete',
            'time' => $this->time,
            'user' => $this->user,
        ];

        return $this->client->getSign($action);
    }
}
