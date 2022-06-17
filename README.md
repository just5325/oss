# OSS工具类
1.安装 `composer require hcg/oss`
2.如果因为composer镜像问题无法使用`composer require hcg/oss`时，可以给项目配置自定义包存储库
```
 "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/just5325/oss"
        }
    ]
```

# 使用示例
> 更多请看example目录中的使用示例

1.文件上传
```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

// 相关配置
$access_key_id = '';
$access_key_secret = '';
$bucket = '';
$endpoint = '';
// OSS自定义访问域名（非必传）
$url = '';
$config = new Hcg\Oss\Config($access_key_id, $access_key_secret, $endpoint, $bucket, $url);

// 文件上传
$oss_upload = new Hcg\Oss\OssUpload($config);
$file_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'static'.DIRECTORY_SEPARATOR.'hcg-test.png';

// 获取文件上传后的url
$url = $oss_upload->uploadFile('hcg-test/hcg-test.png', $file_path)->getUploadFileUrl();
var_dump($url);
```