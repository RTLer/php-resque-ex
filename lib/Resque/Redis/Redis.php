<?php
namespace PhpResque\Resque\Redis;

use PhpResque\Resque\Redis\RedisApi;

class Redis extends RedisApi
{
    public function __construct($host, $port = 6379, $password = null)
    {
        parent::__construct($host, $port, 5, $password);
    }
}