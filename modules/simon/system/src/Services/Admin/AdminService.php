<?php
namespace Simon\System\Services\Admin;
use Simon\System\Services\Admin;
use Simon\System\Models\Admin as AdminModel;
use Simon\System\Services\Admin\Interfaces\AdminInterface;
class AdminService extends Admin implements AdminInterface
{
	
	public function paginate(array $appends = [])
	{
		$paginate = $this->model->orderBy(AdminModel::CREATED_AT,'DESC')->paginate(15);
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
	public function status()
	{
		return AdminModel::STATUS;
	}
	
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}
	
	
}