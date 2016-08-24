<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 12:04
 */

namespace Simon\User\Services;

use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Services\Interfaces\RegisterInterface;

class RegisterService extends AuthService implements RegisterInterface
{

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
    public function register(array $data) : bool
    {
        // TODO: Implement register() method.
        $secretKey = str_random(10);

        $this->user = $this->repository->create([
            'name'=>$data['name'],
            'password'=>bcrypt($this->createConfusion($data['password'],$secretKey)),
            'secret_key'=>$secretKey,
        ]);

        return true;
    }


}