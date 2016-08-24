<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 11:46
 */
namespace App\Repositorys;
interface RepositoryInterface
{

    public function all(array $columns = ['*']);

    public function paginate(int $perPage = 15, array $columns = ['*']);

    public function create(array $data);

    public function update(array $data,int $id);

    public function delete(int $id);

    public function find(int $id, array $columns = ['*']);

    public function findBy(string $field,string $value,array $columns = ['*']);

    public function findOneBy(string $field,string $value,array $columns = ['*']);

}