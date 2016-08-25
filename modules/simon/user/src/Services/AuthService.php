<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/25
 * Time: 16:21
 */

namespace Simon\User\Services;


use App\Services\AppService;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Services\Interfaces\AuthInterface;

class AuthService extends AppService implements AuthInterface
{

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mailVerify()
    {
        // TODO: Implement mailVerify() method.
    }

}