<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 11:29
 */

namespace App\Components\VerifyCode\Realizes;
use App\Components\VerifyCode\Interfaces\VerifyCodeInterface;
use Simon\User\Models\User;

class EmailVerifyCodeRealize implements VerifyCodeInterface
{

    protected $user = null;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getCode() : string
    {
        // TODO: Implement getCode() method.
        return str_random(16);
    }

    /**
     * @param string $code
     * @return bool
     */
    public function verifyCode(string $code) : bool
    {
        // TODO: Implement verifyCode() method.
    }

}