<?php
namespace App\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Toplan\Sms\Facades\SmsManager;
abstract class Service
{
	protected $model = null;
	
	protected $validator = null;
	
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
		return true;
		return !$this->validator(['code'=>$code], [
				'code' => ['required','captcha'],
		]);
	}
	
	/*
	 * (non-PHPdoc)
	 * @see \CrCms\VerificationCode\Lang\Interfaces\VerifyCodeLangInterface::codeError()
	 * @author simon
	 */
	public function codeImageError(): string
	{
		// TODO Auto-generated method stub
		return trans('app.code_error');
	}
	
	/*
	 * (non-PHPdoc)
	 * @see \CrCms\VerificationCode\Process\Interfaces\VerifyCodeProcessInterface::verifyEmailCode()
	 * @author simon
	 */
	public function verifyEmailCode(string $code): bool
	{
		// TODO Auto-generated method stub
	
	}
	
	/*
	 * (non-PHPdoc)
	 * @see \CrCms\VerificationCode\Process\Interfaces\VerifyCodeProcessInterface::verifyMobileCode()
	 * @author simon
	 */
	public function verifyMobileCode(string $code): bool
	{
		// TODO Auto-generated method stub
		//验证数据
		$status = $this->validator($data, [
				'mobile'     => 'required|confirm_mobile_not_change',
				'verifyCode' => 'required|verify_code|confirm_rule:mobile,mobile_required',
		]);
	
		if ($status)
		{
			//验证失败后建议清空存储的发送状态，防止用户重复试错
			SmsManager::forgetState();
		}
	
		return $status;
	}
	
	/*
	 * (non-PHPdoc)
	 * @see \CrCms\VerificationCode\Lang\Interfaces\VerifyCodeLangInterface::codeEmailError()
	 * @author simon
	 */
	public function codeEmailError(): string
	{
		// TODO Auto-generated method stub
	
	}
	
	/*
	 * (non-PHPdoc)
	 * @see \CrCms\VerificationCode\Lang\Interfaces\VerifyCodeLangInterface::codeMobileError()
	 * @author simon
	 */
	public function codeMobileError(): string
	{
		// TODO Auto-generated method stub
	
	}
	
}