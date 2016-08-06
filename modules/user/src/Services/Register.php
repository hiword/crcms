<?php
namespace User\Services;
use App\Services\Service;
use User\Models\User;
use CrCms\User\Process\Interfaces\RegisterProcessInterface;
use CrCms\User\Lang\Interfaces\RegisterLangInterface;
use CrCms\ValidatorForm\Process\Interfaces\ValidatorFormProcessInterface;
use CrCms\VerificationCode\Process\Interfaces\VerifyCodeProcessInterface;
use CrCms\VerificationCode\Lang\Interfaces\VerifyCodeLangInterface;
class Register extends Service implements RegisterProcessInterface,RegisterLangInterface,ValidatorFormProcessInterface,VerifyCodeProcessInterface,VerifyCodeLangInterface
{
	
	public function __construct(User $user)
	{
		parent::__construct($user);
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\ValidatorForm\Process\Interfaces\ValidatorFormProcessInterface::validateForm()
	 * @author simon
	 */
	public function validateForm(array $data): bool
	{
		// TODO Auto-generated method stub
		$type = $this->getNameType($data['mixed']);
		$data[$type] = $data['mixed'];
		return $this->validator($data, [
				'password'=>['required','min:6','max:20'],
				$type=>$this->getNameTypeValidatorRule($type),
		]);
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\User\Process\Interfaces\RegisterProcessInterface::register()
	 * @author simon
	 */
	public function register(array $data)
	{
		dd($this->model);
		// TODO Auto-generated method stub
		$type = $this->getNameType($data['mixed']);
		
		$this->model->mobile= $data['mixed'];
		
		$this->model->password = bcrypt($data['password']);
		$this->model->register_ip = ip_long(request()->ip());
		//$this->model->mail_status = \User\Models\User::MAIL_STATUS_NOT_VERIFY;
		
		$this->model->save();
		
		return $this->model;
	}

	/**
	 * 获取表单名称填写的类别
	 * @param string $name
	 * @return string
	 * @author simon
	 */
	protected function getNameType(string $name) : string
	{
		if (preg_match('/@/', $name))
		{
			return 'email';
		}
		elseif (preg_match('/^1[\d]{10}$/', $name))
		{
			return 'mobile';
		}
		else
		{
			return 'name';
		}
	}
	
	/**
	 * 获取Name的验证规则
	 * @param string $type
	 * @return string
	 * @author simon
	 */
	protected function getNameTypeValidatorRule(string $type) : array
	{
		$rule = [
				'name'=>['required','regex:/^[\w]{3,15}$/','unique:users'],
				'mobile'=>['required','regex:/^1[\d]{10}$/','unique:users'],
				'email'=>['required','email','unique:users'],
		];
		return $rule[$type];
	}




	
}