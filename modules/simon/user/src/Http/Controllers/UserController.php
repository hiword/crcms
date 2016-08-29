<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/25
 * Time: 14:13
 */

namespace Simon\User\Http\Controllers;



use Simon\Kernel\Http\Controllers\Controller;
use Simon\User\Facades\User;
use Simon\User\Http\Requests\BasicInformationRequest;
use Simon\User\Http\Requests\UpdatePasswordRequest;
use Simon\User\Repositorys\Interfaces\UserInfoRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{

    protected $view = 'user::default.user.';

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        parent::__construct();
        $this->repository = $UserRepository;
    }


    public function getIndex()
    {
        return $this->view('index');
    }

    public function postBasicInformation(BasicInformationRequest $BasicInformationRequest,UserInfoRepositoryInterface $UserInfo)
    {
        $userId = User::id();

        $UserInfo->findById($userId)
            ?
            $UserInfo->update($this->input,$userId)
            :
            $UserInfo->create($this->input);

        return $this->response(['kernel::app.success']);
    }

    public function getBasicInformation(UserInfoRepositoryInterface $UserInfoRepository)
    {
        $userInfo = $UserInfoRepository->findUserInfo(User::id());

        return $this->view('basic-information',compact('userInfo'));
    }

    public function getUpdatePassword()
    {
        return $this->view('update-password');
    }

    public function postUpdatePassword(UpdatePasswordRequest $UpdatePasswordRequest)
    {

        $this->repository->comparePassword($this->input['old_password'],User::user());

        $password = $this->repository->generatePassword($this->input['password'],User::user()->secret_key);

        $this->repository->updatePassword($password,User::user());

        return $this->response(['kernel::app.success']);
    }


}