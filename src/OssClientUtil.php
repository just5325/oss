<?php

declare (strict_types=1);

namespace Hcg\Oss;

use OSS\OssClient;

class OssClientUtil
{
    private static $instance;
    private $oss_client;
    private $config;

    private function __construct(Config $config){
        $this->config = $config;
        $this->oss_client = new OssClient($config->access_key_id, $config->access_key_secret, $config->endpoint);
    }

    public function getOssClient(): OssClient
    {
        return $this->oss_client;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public static function getInstance(Config $config): self
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }
}
