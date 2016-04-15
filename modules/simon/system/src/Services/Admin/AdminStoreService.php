<?php
namespace Simon\System\Services\Admin;
use Simon\System\Services\Admin;
use Simon\System\Services\Admin\Interfaces\AdminStoreInterface;
class AdminStoreService extends Admin implements AdminStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\System\Services\Admin\Interfaces\AdminStoreInterface::store()
	 * @author simon
	 */
	public function store(array $data, \Illuminate\Http\Request $Request)
	{
		// TODO Auto-generated method stub
		$this->model->name = $data['name'];
		$this->model->password = bcrypt($data['password']);
		$this->model->status = $data['status'];
		$this->model->register_ip = long_ip($Request->ip());
		$this->model->save();
	
		return $this->model;
	}

	
	
}