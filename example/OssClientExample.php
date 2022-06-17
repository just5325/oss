<?php

require_once __DIR__ . '/../vendor/autoload.php';

// 相关配置
$access_key_id = '';
$access_key_secret = '';
$bucket = '';
$endpoint = '';
$url = '';
$config = new Hcg\Oss\Config($access_key_id, $access_key_secret, $endpoint, $endpoint);
$oss_client = Hcg\Oss\OssClientUtil::getInstance($config)->getOssClient();;

