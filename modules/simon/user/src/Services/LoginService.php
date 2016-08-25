<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/23
 * Time: 7:57
 */

namespace Simon\User\Services;
use Illuminate\Support\Facades\Hash;
use Simon\User\Exceptions\PasswordErrorException;
use Simon\User\Exceptions\UserNotExistsException;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Services\Interfaces\LoginInterface;
use Simon\User\Services\Traits\PasswordConfusionTrait;

class LoginService implements LoginInterface
{

    use PasswordConfusionTrait;

    protected $repository = null;

    protected $user = null;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->repository = $UserRepository;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        // TODO: Implement getUser() method.
        return $this->user;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function login(array $data) : LoginInterface
    {
        // TODO: Implement login() method.
        $this->user = $this->repository->findOneBy('name',$data['name']);
        if (empty($this->user))
        {
            throw new UserNotExistsException(trans('user::user.user_not_exists'));
        }

        if (!$this->comparePassword($data['password']))
        {
            throw new PasswordErrorException(trans('user::user.password_error'));
        }

        return $this;
    }

    /**
     * @param $password
     * @return bool
     */
    protected function comparePassword($password) : bool
    {
        $password = $this->createConfusion($password,$this->user->secret_key);
        return Hash::check($password,$this->user->password);
    }


}