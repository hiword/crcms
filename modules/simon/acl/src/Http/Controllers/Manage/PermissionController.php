<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/1
 * Time: 11:16
 */

namespace Simon\Acl\Http\Controllers\Manage;


use Simon\Acl\Http\Requests\PermissionRequest;
use Simon\Acl\Repositorys\Interfaces\PermissionRepositoryInterface;
use Simon\Kernel\Http\Controllers\Controller;

class PermissionController extends Controller
{

    protected $view = 'acl::default.permission.';

    public function __construct(PermissionRepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function index()
    {
        $models = $this->repository->allPaginateBySearch([])->findAllPaginate();
        $status = $this->repository->status();
        return $this->view('index',compact('models','status'));
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(PermissionRequest $permissionRequest)
    {

        $this->repository->create($this->input);

        return $this->response(['kernel::app.success']);
    }

    public function edit($id)
    {
        $model = $this->repository->findById($id);

        if (empty($model))
        {
            abort(404);
        }

        return $this->view('edit',compact('model'));
    }

    public function update($id,PermissionRequest $permissionRequest)
    {
        $this->repository->update($this->input,$id);

        return $this->response(['kernel::app.success']);
    }

    public function destroy($id)
    {
        foreach (explode(',',$id) as $val)
        {
            $this->repository->delete($val);
        }

        return $this->response(['kernel::app.success']);
    }
}