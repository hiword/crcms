<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/25
 * Time: 6:36
 */

namespace Simon\User\Http\Controllers\Manage;


use App\Http\Controllers\Controller;
use Simon\User\Models\User;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{

    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function index()
    {


        $data = $this->repository->all();

        dd((new User())->where('id',38)->forceDelete());

        exit();

        $this->repository->delete($data->first()->id);

        exit();

        dd($data->first());



        foreach ($data as $v)
        {
            var_dump($v->id);
            $this->repository->delete($v->id);
            break;
            echo $v->created_at->format('Y-m-d H:i:s');
        }

    }

}