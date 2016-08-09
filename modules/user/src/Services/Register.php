<?php
namespace User\Services;
use App\Services\Service;
use User\Models\User;
use CrCms\User\Interfaces\RegisterInterface;
use CrCms\VerificationCode\Interfaces\VerifyCodeInterface;
use CrCms\ValidatorForm\Interfaces\ValidatorFormInterface;
use App\Services\Traits\StoreTrait;
use Illuminate\Support\Facades\DB;
class Register extends Service implements RegisterInterface,VerifyCodeInterface,ValidatorFormInterface
{

    use StoreTrait;
    
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
		return !$this->validator($data, [
				$type=>$this->getNameTypeValidatorRule($type),
		      'password'=>['required','min:6','max:20'],
		]);
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\User\Process\Interfaces\RegisterProcessInterface::register()
	 * @author simon
	 */
	public function register(array $data)
	{
		// TODO Auto-generated method stub
		$type = $this->getNameType($data['mixed']);
		
		$this->model->{$type}= $data['mixed'];
		
		$this->model->password = bcrypt($data['password']);
		$this->model->register_ip = ip_long(request()->ip());
	    $this->model->register_time = time();
// 		$this->model->mail_status = \User\Models\User::MAIL_STATUS_NOT_VERIFY;
		
	    //默认字段添加
	    $this->builtModelStore();
	    
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

	public function openImageCodeVerify() : bool
	{
	    return config('user.open_image_verify_code');
	}
	
	public function verifyImageCode(string $code) : bool
	{
	    return true;
	}
	
    /**
     * {@inheritDoc}
     * @see \CrCms\User\Interfaces\RegisterInterface::langRegisterTimeIntervalError()
     */
    public function langRegisterTimeIntervalError(): string
    {
        // TODO Auto-generated method stub
        return trans('user.register_time_interval');
    }

    /**
     * {@inheritDoc}
     * @see \CrCms\User\Interfaces\RegisterInterface::verifyRegisterTimeInterval()
     */
    public function verifyRegisterTimeInterval(): bool
    {
        // TODO Auto-generated method stub
        $log = \User\Models\AuthLog::where('client_ip',ip_long(app('request')->ip()))->orderBy('id','desc')->first();
        if ($log)
        {
            return !(time() - $log->created_at < intval(config('user.register_time_interval'))); 
        }
        return true;
    }
	
}