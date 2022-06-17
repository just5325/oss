<?php

declare (strict_types=1);

namespace Hcg\Oss;

class Config
{
    public $access_key_id;
    public $access_key_secret;
    public $endpoint;
    public $bucket;
    public $url;

    public function __construct(
        string $access_key_id,
        string $access_key_secret,
        string $endpoint,
        string $bucket,
        string $url = ''
    ){
        $this->access_key_id = $access_key_id;
        $this->access_key_secret = $access_key_secret;
        $this->endpoint = $endpoint;
        $this->bucket = $bucket;
        $this->url = $url;
    }

    /**
     * 是否配置阿里云OSS自定义访问域名
     * */
    public function isUrl(): bool
    {
        return !empty($this->url);
    }
}
