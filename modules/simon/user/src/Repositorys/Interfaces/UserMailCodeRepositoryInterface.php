<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 19:47
 */

namespace Simon\User\Repositorys\Interfaces;


use App\Repositorys\RepositoryInterface;

interface UserMailCodeRepositoryInterface extends RepositoryInterface
{

    public function findLatelyHash(string $hash);

}