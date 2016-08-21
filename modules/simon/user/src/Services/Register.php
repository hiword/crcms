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

class Register implements RegisterInterface
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

        $this->user = $this->repository->create([
            'name'=>$data['name'],
            'password'=>bcrypt($data['password']),
        ]);

        return true;
    }


}