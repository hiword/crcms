<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 12:01
 */

namespace Simon\User\Repositorys;


use App\Repositorys\AbstraceRepository;
use Simon\User\Models\User;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;

class UserRepository extends AbstraceRepository implements UserRepositoryInterface
{

    /**
     * 邮件验证
     */
    const MAIL_STATUS_VERIFY = 1;

    /**
     * 邮件未验证
     */
    const MAIL_STATUS_NOT_VERIFY = 2;

    /**
     * 邮件验证失败
     */
    const MAIL_STATUS_VERIFY_FAIL = 3;


    public function __construct(User $User)
    {
        parent::__construct($User);
    }

    /**
     * 存储登录信息
     * @param User $user
     * @return User
     */
    public function storeLoginInfo(User $user) : User
    {
        // TODO: Implement storeLoginInfo() method.
        $user->login_time = time();
        $user->login_ip = ip_long(app('request')->ip());
        $user->save();
        return $user;
    }


}