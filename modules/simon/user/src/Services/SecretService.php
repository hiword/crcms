<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/23
 * Time: 9:50
 */

namespace Simon\User\Services;


use Simon\User\Repositorys\Interfaces\SecretRepositoryInterface;
use Simon\User\Services\Interfaces\SecretInterface;

class SecretService implements SecretInterface
{

    protected $repository = null;

    public function __construct(SecretRepositoryInterface $SecretRepository)
    {
        $this->repository = $SecretRepository;
    }

    public function get()
    {

    }

    public function createConfusion(string $password) : string
    {
        // TODO: Implement encrypt() method.
        $randString = str_random();

        $this->repository->create([
            //$randString
        ]);

        return $this->getConfusion($randString,$password);
    }


    public function getConfusion(string $string1,string $string2) : string
    {
        return $string1.$string2.$string1;
    }
}