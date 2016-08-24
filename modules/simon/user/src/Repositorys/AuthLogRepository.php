<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 21:42
 */

namespace Simon\User\Repositorys;


use App\Repositorys\AbstraceRepository;
use Simon\User\Models\AuthLog;
use Simon\User\Repositorys\Interfaces\AuthLogRepositoryInterface;

class AuthLogRepository extends AbstraceRepository implements AuthLogRepositoryInterface
{

    const TYPE_REGISTER = 1;

    const TYPE_LOGIN = 2;

    public function __construct(AuthLog $Model)
    {
        parent::__construct($Model);
    }

}