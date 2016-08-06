<?php
namespace User\Services;
use CrCms\User\Process\Interfaces\LoginProcessInterface;
use User\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;
use App\Facades\Auth;
use CrCms\User\Lang\Interfaces\LoginLangInterface;
use CrCms\ValidatorForm\Process\Interfaces\ValidatorFormProcessInterface;

class Login extends Service implements LoginProcessInterface,LoginLangInterface,ValidatorFormProcessInterface
{
	protected $user = null;
	
	protected $auth = null;
	
	public function __construct(User $user,\App\Services\Auth $auth)
	{
		parent::__construct();
		$this->model = $user;
		$this->auth = $auth;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\User\Process\Interfaces\LoginProcessInterface::session()
	 * @author simon
	 */
	public function session()
	{
		// TODO Auto-generated method stub
		$this->auth->store($this->user);
	}

	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\User\Process\Interfaces\LoginProcessInterface::user()
	 * @author simon
	 */
	public function findUser(string $name): bool
	{
		// TODO Auto-generated method stub
		$this->user = $this->model->where('name',$name)->first();
		return (bool)$this->user;
	}

	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\User\Process\Interfaces\LoginProcessInterface::verifyPassword()
	 * @author simon
	 */
	public function comparePassword(string $password) : bool
	{
		// TODO Auto-generated method stub
		return Hash::check($password, $this->user->password);
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\User\Process\Interfaces\LoginProcessInterface::storeLoginInfo()
	 * @author simon
	 */
	public function storeLoginInfo()
	{
		// TODO Auto-generated method stub
		
	}
	
	

	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\ValidatorForm\Process\Interfaces\ValidatorFormProcessInterface::validateForm()
	 * @author simon
	 */
	public function validateForm(array $data): bool
	{
		// TODO Auto-generated method stub
		return $this->validator($data, [
				'name'=>['required','regex:/^[\w]{3,15}$/'],
				'password'=>['required','min:6','max:20'],
		]);
	}

	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\User\Lang\Interfaces\LoginLangInterface::passwordError()
	 * @author simon
	 */
	public function passwordError(): string
	{
		// TODO Auto-generated method stub
		return trans('user.password_error');
	}

	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\User\Lang\Interfaces\LoginLangInterface::userNotExistsError()
	 * @author simon
	 */
	public function userNotExistsError(): string
	{
		// TODO Auto-generated method stub
		return trans('user.user_not_exists');
	}

	
	
}