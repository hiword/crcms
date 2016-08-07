<?php
namespace CrCms\User\Interfaces;

use CrCms\CrCmsInterface;

interface RegisterInterface extends CrCmsInterface
{
    
    /**
     * 注册实现主体
     * @param array $data
     */
    public function register(array $data);
    
}