<?php

declare (strict_types=1);

namespace Hcg\Oss;

/**
 *
 * @author hcg<532508307@qq.com>
 * */
class OssUpload
{
    private $oss_client;
    private $config;
    private $upload_file_origin_content;
    private $object;

    /**
     * @param Config $config
     * @author hcg<532508307@qq.com>
     */
    public function __construct(Config $config){
        $oss_client_util = OssClientUtil::getInstance($config);
        $this->oss_client = $oss_client_util->getOssClient();
        $this->config = $config;
    }

    /**
     * 文件上传
     * @author hcg<532508307@qq.com>
     */
    public function uploadFile(string $object, string $filePath): OssUpload
    {
        $this->upload_file_origin_content = $this->oss_client->uploadFile($this->config->bucket, $object, $filePath);
        $this->object = $object;
        return $this;
    }

    /**
     * 获取文件上传后的url
     * @author hcg<532508307@qq.com>
     */
    public function getUploadFileUrl(): string
    {
        if($this->config->isUrl()){
            return $this->config->url.'/'.$this->object;
        }
        return $this->upload_file_origin_content['oss-request-url'];
    }

    /**
     * 获取文件上传后原始返回内容
     * @author hcg<532508307@qq.com>
     */
    public function getUploadFileOriginContent()
    {
        return $this->upload_file_origin_content;
    }

    /**
     * 生成object
     * @param string $object_prefix object前缀名
     * @author hcg<532508307@qq.com>
     */
    public function generateObject(string $file_path, string $object_prefix = ''): string
    {
        $path_info = pathinfo($file_path);
        $file_name = md5_file($file_path).'.'.$path_info['extension'];
        $object = date('Ymd').'/'.$file_name;
        if(!empty($object_prefix)){
            $object =  $object_prefix.'/'.$object;
        }
        return $object;
    }

}
