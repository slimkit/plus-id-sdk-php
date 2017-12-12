<?php

namespace SlimKit\PlusID\Client\Auth;

use SlimKit\PlusID\Client\Client;
use SlimKit\PlusID\Client\Support\URL;

class Resolve
{
    protected $client;
    protected $user;
    protected $time;

    public function __construct(Client $client)
    {
        $this->client = $client;
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
            'action' => 'auth/resolve',
            'time' => $this->time,
        ];

        return $this->client->getSign($action);
    }

    public function getURI(): string
    {
        $url = new URL($this->client->getServe());
        $url->addQuery('time', $this->time);
        $url->addQuery('sign', $this->getSign());
        $url->addQuery('action', 'auth/resolve');

        return $url->make();
    }
}
