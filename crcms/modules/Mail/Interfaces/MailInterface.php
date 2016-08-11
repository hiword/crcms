<?php
namespace CrCms\Mail\Interfaces;
use CrCms\CrCmsInterface;
interface MailInterface extends CrCmsInterface
{
	/**
	 * 发送邮件
	 * @param string $to
	 * @param string $subject
	 * @param string $template
	 * @param array $data
	 * @return bool
	 * @author simon
	 */
	public function sendMail(string $to,string $subject,string $template,array $data) : bool;
	
	/**
	 * mail日志
	 * @param array $data
	 * @author simon
	 */
	public function mailLog(array $data);
	
	/**
	 * 创建Mail验证码
	 * @return string
	 * @author simon
	 */
// 	public function createMailCode() : string;
	
	
// 	public function toMailLink();
	
// 	public function verfiyMailLink($id,$time,$rand,$hash);
	
// 	public function checkMailVerifyStatus($id);
	
// 	public function updateMailVerifyStatus($id);
	
// 	public function 
	
// 	function mailer($template,$email,array $data = [],$subject = null)
// 	{
// 		event(new Mail($template, $email,$data,$subject));
// 	}
	
}