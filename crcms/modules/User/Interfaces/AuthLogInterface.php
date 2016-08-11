<?php
namespace CrCms\User\Interfaces;
use CrCms\CrCmsInterface;

interface AuthLogInterface extends CrCmsInterface
{
    
    /**
     * 登录，注册日志存储
     * @param int $type
     * @param array $data
     */
    public function log(int $type,array $data);
    
}