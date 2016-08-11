<?php
namespace CrCms\User\Interfaces;

use CrCms\CrCmsInterface;

interface RegisterInterface extends CrCmsInterface
{
    
	/**
	 * 表单验证
	 * @param array $data
	 * @author simon
	 */
	public function validateForm(array $data);
	
	 /**
     * 验证注册的时间间隔
     * @return bool
     */
    public function verifyRegisterTimeInterval() : bool;
	
    /**
     * 注册实现主体
     * @param array $data
     */
    public function register(array $data);
    
    /**
     * 发送邮件
     */
    public function sendMail();
    
    /**
     * 记录邮件
     */
    public function storeLog();
   
    /**
     * 不允许时间段注册的提示信息
     * @return string
     */
//     public function langRegisterTimeIntervalError() : string;
    
}