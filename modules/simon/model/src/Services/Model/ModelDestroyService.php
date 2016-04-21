<?php
namespace Simon\Model\Services\Model;
use Simon\Model\Services\Model;
use Simon\Model\Services\Model\Interfaces\ModelDestroyInterface;
use App\Services\Traits\DestroyTrait;
class ModelDestroyService extends Model implements ModelDestroyInterface
{
	use DestroyTrait;
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\DestroyInterface::destroy()
	 * @author simon
	 */
	public function destroy(array $data)
	{
		// TODO Auto-generated method stub
// 		$this->updateDestroyBuilt($data);
		
		return $this->model->destroy($data);
	}

	
	
	
}

