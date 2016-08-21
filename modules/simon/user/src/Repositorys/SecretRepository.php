<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 13:11
 */

namespace Simon\User\Repositorys;


use App\Repositorys\AbstraceRepository;
use Simon\User\Models\Secret;
use Simon\User\Repositorys\Interfaces\SecretRepositoryInterface;

class SecretRepository extends AbstraceRepository implements SecretRepositoryInterface
{

    public function __construct(Secret $Model)
    {
        parent::__construct($Model);
    }

}