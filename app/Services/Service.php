<?php
namespace App\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Toplan\Sms\Facades\SmsManager;
abstract class Service
{
	protected $model = null;
	
	protected $validator = null;
	
	/**
	 * 验证码开启状态
	 * @var string
	 */
	protected $openVerifyCode = false;
	
	public function __construct(Model $model = null)
	{
		$this->model = $model;
	}
	
	
	protected function validator(array $data,array $rule) : bool
	{
		$this->validator = Validator::make($data,$rule);
		return $this->validator->fails();
	}
	
	public function getValidateMessage() : string
	{
		return $this->validator->errors()->first();
	}
	
	public function getValidateAllMessage()
	{
		return $this->validator->all();
	}
	
	/*
	 * (non-PHPdoc)
	 * @see \CrCms\VerificationCode\Process\Interfaces\VerifyCodeProcessInterface::verifyCode()
	 * @author simon
	 */
	public function verifyImageCode(string $code): bool
	{
		// TODO Auto-generated method stub
		return !$this->validator(['code'=>$code], [
				'code' => ['required','captcha'],
		]);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Process\Interfaces\VerifyCodeInterface::langEmailCodeError()
	 */
	public function langEmailCodeError(): string
	{
	    // TODO Auto-generated method stub
	    return trans('app.code_error');
	}
	
	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Process\Interfaces\VerifyCodeInterface::langImageCodeError()
	 */
	public function langImageCodeError(): string
	{
	    // TODO Auto-generated method stub
	    return trans('app.code_error');
	}
	
	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Process\Interfaces\VerifyCodeInterface::langMobileCodeError()
	 */
	public function langMobileCodeError(): string
	{
	    // TODO Auto-generated method stub
	    return trans('app.code_error');
	}
	
	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Interfaces\VerifyCodeInterface::nameForEmailCode()
	 */
	public function nameForEmailCode(): string
	{
	    // TODO Auto-generated method stub
	    return 'email_code';
	}
	
	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Interfaces\VerifyCodeInterface::nameForImageCode()
	 */
	public function nameForImageCode(): string
	{
	    // TODO Auto-generated method stub
	    return 'code';
	}
	
	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Interfaces\VerifyCodeInterface::nameForMobileCode()
	 */
	public function nameForMobileCode(): string
	{
	    // TODO Auto-generated method stub
	    return 'mobile_code';
	}
	
	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Interfaces\VerifyCodeInterface::openEmailCodeVerify()
	 */
	public function openEmailCodeVerify(): bool
	{
	    // TODO Auto-generated method stub
	    return false;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Interfaces\VerifyCodeInterface::openImageCodeVerify()
	 */
	public function openImageCodeVerify(): bool
	{
	    // TODO Auto-generated method stub
	    return false;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Interfaces\VerifyCodeInterface::openMobileCodeVerify()
	 */
	public function openMobileCodeVerify(): bool
	{
	    // TODO Auto-generated method stub
	    return false;
	}
	
	/*
	 * (non-PHPdoc)
	 * @see \CrCms\VerificationCode\Process\Interfaces\VerifyCodeProcessInterface::verifyMobileCode()
	 * @author simon
	 */
	public function verifyMobileCode(string $mobile,string $code): bool
	{
		// TODO Auto-generated method stub
		//验证数据
		$status = $this->validator([
		    'mobile'=>$mobile,
		    'mobile_code'=>$code,
		], [
				'mobile'     => 'required|confirm_mobile_not_change',
				'mobile_code' => 'required|verify_code|confirm_rule:mobile,mobile_required',
		]);
	
		if ($status)
		{
			//验证失败后建议清空存储的发送状态，防止用户重复试错
			SmsManager::forgetState();
		}
	
		return $status;
	}
	

	/**
	 * {@inheritDoc}
	 * @see \CrCms\VerificationCode\Process\Interfaces\VerifyCodeInterface::verifyEmailCode()
	 */
	public function verifyEmailCode(string $code): bool
	{
	    // TODO Auto-generated method stub
	
	}
	
}