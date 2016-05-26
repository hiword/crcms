<?php
namespace Simon\Document\Services\Document;
use Simon\Document\Services\Document;
use App\Services\Interfaces\DestroyInterface;
use App\Services\Traits\DestroyTrait;
class DocumentDestroyService extends Document implements DestroyInterface
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