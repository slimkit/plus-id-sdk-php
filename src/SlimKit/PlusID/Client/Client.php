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

    /**
     * Get sign.
     *
     * @param array $action
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function getSign(array $action = []): string
    {
        ksort($action);
        $action = json_encode($action);

        return md5(hash_hmac('sha256', $action, $this->key, true));
    }

    /**
     * Get app id.
     *
     * @return int
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function getApp(): int
    {
        return $this->app;
    }

    public function getServe(): string
    {
        return $this->serve;
    }
}
