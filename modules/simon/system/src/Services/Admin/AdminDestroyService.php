<?php
namespace Simon\System\Services\Admin;
use Simon\System\Services\Admin;
use Simon\System\Services\Admin\Interfaces\AdminDestroyInterface;
use App\Services\Traits\DestroyTrait;
class AdminDestroyService extends Admin implements AdminDestroyInterface
{
	
	use DestroyTrait;
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\DestroyInterface::destroy()
	 * @author root
	 */
	public function destroy(array $data)
	{
		// TODO Auto-generated method stub
		$this->updateDestroyBuilt($data);
		
		return $this->model->destroy($data);
	}

	
	
	
}