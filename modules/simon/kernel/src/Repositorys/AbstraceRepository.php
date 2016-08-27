<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 11:48
 */

namespace Simon\Kernel\Repositorys;


use Illuminate\Database\Eloquent\Model;

abstract class AbstraceRepository
{
    protected $model = null;

    protected $query = null;

    public function __construct(Model $Model)
    {
        $this->model = $Model;
    }

    protected function byQueryOrModel()
    {
        return $this->query ?? $this->model;
    }

    public function all(array $columns = ['*'])
    {
        return $this->model->select($columns)->orderBy($this->model->getKeyName(),'desc')->get();
    }

    public function findAllPaginate(int $perPage = 15, array $columns = ['*'])
    {
        return $this->byQueryOrModel()->select($columns)->orderBy($this->model->getKeyName(),'desc')->paginate($perPage);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data,int $id)
    {
        return $this->model->where($this->model->getKeyName(),$id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }

    public function findById(int $id, array $columns = ['*'])
    {
        return $this->model->select($columns)->where($this->model->getKeyName(),$id)->first();
    }

    public function findBy(string $field,string $value,array $columns = ['*'])
    {
        return $this->model->select($columns)->where($field,$value)->orderBy($this->model->getKeyName(),'desc')->get();
    }

    public function findOneBy(string $field,string $value,array $columns = ['*'])
    {
        return $this->model->select($columns)->where($field,$value)->orderBy($this->model->getKeyName(),'desc')->first();
    }

    /*public function find(array $wheres,array $order = ['id','desc'],int $take = 0,int $skip = 0,array $columns = ['*'])
    {
        //多条件where
        foreach ($wheres as $where)
        {
            $this->model = call_user_func_array([$this->model,'where'],$where);
        }

        //字段
        $this->model->select($columns)->orderBy($order[0],$order[1]);

        //limit
        if ($take !== 0)
        {
            $this->model->skip($take);
        }

        //从第几条查起
        if ($skip !== 0)
        {
            $this->model->skip($skip);
        }

        return $this->model->get();
    }*/

//    public function model()
//    {
//        return $this->model;
//    }

    public function allPaginateBySearch(array $data) : RepositoryInterface
    {
        // TODO: Implement allPaginateBySearch() method.
        return $this;
    }


}