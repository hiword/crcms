<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 22:26
 */

namespace Simon\User\Services\Traits;


trait PasswordConfusionTrait
{

    public function createConfusion(string $password, string $random) : string
    {
        // TODO: Implement createConfusion() method.
        return $random.$random.$password;
    }

}