<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/23
 * Time: 7:57
 */

namespace Simon\User\Services;


use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Services\Interfaces\LoginInterface;

class LoginService implements LoginInterface
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

    }

    /**
     * @param array $data
     * @return mixed
     */
    public function login(array $data) : bool
    {
        // TODO: Implement login() method.
        $this->user = $this->repository->findUser('name',$data['name']);
        if (empty($this->user))
        {
            return false;
        }
    }

    protected function comparePassword($password)
    {

    }


}