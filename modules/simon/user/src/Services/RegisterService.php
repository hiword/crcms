<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 12:04
 */

namespace Simon\User\Services;

use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Repositorys\UserRepository;
use Simon\User\Services\Interfaces\RegisterInterface;
use Simon\User\Services\Traits\PasswordConfusionTrait;

class RegisterService implements RegisterInterface
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
     * @return bool
     */
    public function register(array $data) : RegisterInterface
    {
        // TODO: Implement register() method.
        $secretKey = str_random(10);

        $this->user = $this->repository->create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($this->createConfusion($data['password'],$secretKey)),
            'secret_key'=>$secretKey,
            'mail_status'=>UserRepository::MAIL_STATUS_NOT_VERIFY,
            'mobile_status'=>UserRepository::MOBILE_STATUS_NOT_VERIFY,
        ]);

        return $this;
    }


}