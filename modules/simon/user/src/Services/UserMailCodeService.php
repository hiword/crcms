<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 19:51
 */

namespace Simon\User\Services;


use Simon\User\Models\User;
use Simon\User\Repositorys\Interfaces\MailCodeRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserMailCodeRepositoryInterface;
use Simon\User\Repositorys\MailCodeRepository;
use Simon\User\Repositorys\UserMailCodeRepository;
use Simon\User\Services\Interfaces\MailCodeInterface;
use Simon\User\Services\Interfaces\UserMailCodeInterface;

class UserMailCodeService implements UserMailCodeInterface
{
    protected $repository = null;

    public function __construct(UserMailCodeRepositoryInterface $MailCode)
    {
        $this->repository = $MailCode;
    }

    /**
     * @param User $user
     * @return string
     */
    public function generate(int $userId) : string
    {
        // TODO: Implement generate() method.
        /**
         * @return string
         */
        // TODO: Implement generate() method.

        $hash = sha1(str_random(10).time().$userId.str_random(10));

        $this->repository->create([
            'user_id'=>$userId,
            'type'=>get_class($this->repository),
            'hash'=>$hash,
            'status'=>UserMailCodeRepository::STATUS_NOT_VERIFY,
        ]);

        return $hash;
    }


    /**
     * @param string $code
     * @return bool
     */
    public function verify(int $userId,string $hash) : bool
    {
        // TODO: Implement verify() method.
        $repository = $this->repository->findLatelyHash($hash);

        //判断是否是未验证状态
        if ($repository->status !== MailCodeRepository::STATUS_NOT_VERIFY)
        {
            //error，已验证过了
            return false;
        }

        //验证时间，这里暂时未决定 是否用Carbon还是int类型存储
        //if (time() - $repository->created_at->)

        //验证id是否一致
        if ($repository->userid !== $userId)
        {
            //erro Exception

            return false;
        }

        return true;
    }

}