<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/27
 * Time: 20:35
 */

namespace Simon\User\Repositorys;


use Simon\Kernel\Repositorys\AbstraceRepository;
use Simon\User\Models\UserInfo;
use Simon\User\Repositorys\Interfaces\UserInfoRepositoryInterface;

class UserInfoRepository extends AbstraceRepository implements UserInfoRepositoryInterface
{

    public function __construct(UserInfo $Model)
    {
        parent::__construct($Model);
    }

    public function create(array $data)
    {
        // TODO: Change the autogenerated stub

        list($year,$month,$day) = $this->separateBirthday($data['birthday']);

        return parent::create([
            'birthday_year'=>intval($year),
            'birthday_month'=>intval($month),
            'birthday_day'=>intval($day),
            'website'=>$data['website'],
            'real_name'=>$data['real_name'],
            'introduction'=>$data['introduction'],
        ]);
    }

    public function update(array $data, int $id)
    {
        // TODO: Change the autogenerated stub

        list($year,$month,$day) = $this->separateBirthday($data['birthday']);

        return parent::update([
            'birthday_year'=>intval($year),
            'birthday_month'=>intval($month),
            'birthday_day'=>intval($day),
            'website'=>$data['website'],
            'real_name'=>$data['real_name'],
            'introduction'=>$data['introduction'],
        ],$id);

    }

    public function findUserInfo(int $id) : UserInfo
    {
        $userInfo = parent::findById($id);

        if (strlen($userInfo->birthday_month) == 1)
        {
            $userInfo->birthday_month = '0'.(string)$userInfo->birthday_month;
        }

        if (strlen($userInfo->birthday_day) == 1)
        {
            $userInfo->birthday_day = '0'.(string)$userInfo->birthday_day;
        }

        $userInfo->birthday = (string)$userInfo->birthday_year.'-'.(string)$userInfo->birthday_month.'-'.(string)$userInfo->birthday_day;

        return $userInfo;
    }

    /**
     * @param string $birthday
     * @return array
     */
    protected function separateBirthday(string $birthday) : array
    {
        return explode('-',$birthday);
    }

}