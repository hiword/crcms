<?php
namespace Simon\Document\Services\Doubi;
use Simon\Document\Services\Doubi;
use App\Services\Interfaces\DestroyInterface;
use App\Services\Traits\DestroyTrait;
class DoubiDestroyService extends Doubi implements DestroyInterface
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
		$this->updateDestroyBuilt($data);
		
		return $this->model->destroy($data);
	}

	
}