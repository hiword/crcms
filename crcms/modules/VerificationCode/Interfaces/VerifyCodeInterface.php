<?php
namespace CrCms\VerificationCode\Interfaces;
use CrCms\CrCmsInterface;

interface VerifyCodeInterface extends CrCmsInterface
{
	/**
	 * 验证图片验证码
	 * @param string $code
	 * @return bool
	 */
	public function verifyImageCode(string $code) : bool;
	
	/**
	 * 图片验证表单名称
	 * @return string
	 */
	public function nameForImageCode() : string;
	
	/**
	 * 是否开启图片码验证
	 * @return bool
	 */
	public function openImageCodeVerify() : bool;
	
	/**
	 * 图片验证码错误提示
	 * @return string
	 */
	public function langImageCodeError() : string;
	
	/**
	 * 验证手机验证码
	 * @param string $code
	 * @return bool
	 */
	public function verifyMobileCode(string $mobile,string $code) : bool;
	
	/**
	 * 手机验证表单名称
	 * @return string
	 */
	public function nameForMobileCode() : string;
	
	/**
	 * 是否开启手机码验证
	 * @return bool
	 */
	public function openMobileCodeVerify() : bool;
	
	/**
	 * 手机验证码错误提示
	 * @return string
	 */
	public function langMobileCodeError() : string;
	
	/**
	 * 验证Email验证码
	 * @param string $code
	 * @return bool
	 */
	public function verifyEmailCode(string $code) : bool;
	
	/**
	 * Email验证码表单名称
	 * @return string
	 */
	public function nameForEmailCode() : string;
	
	/**
	 * 是否开启Email码验证
	 * @return bool
	 */
	public function openEmailCodeVerify() : bool;
	
	/**
	 * Email验证码错误提示
	 * @return string
	 */
	public function langEmailCodeError() : string;
	
}