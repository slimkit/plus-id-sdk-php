<?php

namespace SlimKit\PlusID\Client;

class Client
{
    protected $app;
    protected $key;
    protected $serve;

    /**
     * Create a Plus ID client.
     *
     * @param int $app
     * @param string $key
     * @param string $serve
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function __construct(int $app, string $key, string $serve)
    {
        $this->app = $app;
        $this->key = $key;
        $this->serve = $serve;
    }
}
