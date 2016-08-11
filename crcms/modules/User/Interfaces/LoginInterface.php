<?php
namespace CrCms\User\Interfaces;
use CrCms\CrCmsInterface;
interface LoginInterface extends CrCmsInterface
{
    /**
     * 用户不存在的错误提示
     * @return string
     */
    public function langUserNotExistsError() : string;
    
    /**
     * 密码错误提示
     * @return string
     */
    public function langPasswordError() : string;
    
    /**
     * 存储登录日志
     */
    public function storeAuthLog();
}