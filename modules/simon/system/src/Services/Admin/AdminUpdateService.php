<?php
namespace Simon\System\Services\Admin;
use Simon\System\Services\Admin;
use Simon\System\Services\Admin\Interfaces\AdminUpdateInterface;
class AdminUpdateService extends Admin implements AdminUpdateInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author simon
	 */
	public function update($id, array $data)
	{
		// TODO Auto-generated method stub
		$this->data['name'] = $data['name'];
		$this->data['status'] = $data['status'];
		
		if (!empty($data['password']))
		{
			$this->data['password'] = bcrypt($data['password']);
		}
		
		return $this->model->where('id',$id)->update($this->data);
	}

	
}
