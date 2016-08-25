<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 19:48
 */

namespace Simon\User\Repositorys;


use App\Repositorys\AbstraceRepository;
use Simon\User\Models\UserMailCode;
use Simon\User\Repositorys\Interfaces\UserMailCodeRepositoryInterface;

class UserMailCodeRepository extends AbstraceRepository implements UserMailCodeRepositoryInterface
{

    public function __construct(UserMailCode $Model)
    {
        parent::__construct($Model);
    }


    /**
     * 验证成功
     */
    const STATUS_VERIFY_SUCCESS = 1;

    /**
     * 未验证
     */
    const STATUS_NOT_VERIFY = 2;

    /**
     * 验证失败
     */
    const STATUS_VERIFY_FAIL = 3;

    /**
     * @param string $hash
     * @return mixed
     */
    public function findLatelyHash(string $hash) : UserMailCode
    {
        // TODO: Implement findLatelyHash() method.
        return $this->model->where('hash',$hash)->orderBy($this->model->getKeyName(),'desc')->firstOrFail();
    }

    public function updateStatus(string $hash,int $status) : bool
    {
        // TODO: Implement updateStatus() method.

        //修改此条未验证数据
        $userMail = parent::findOneBy('hash',$hash);

        if ($userMail->status !== static::STATUS_NOT_VERIFY)
        {
            return false;
        }

        //未验证的情况下
        $userMail->status = $status;
        $userMail->save();

        return true;
    }

}