<?php
namespace Simon\Hacker\Services\Subject;
use Simon\Hacker\Services\Subject;
use App\Services\Interfaces\DestroyInterface;
use App\Services\Traits\DestroyTrait;
use Simon\Hacker\Services\Subject\Interfaces\SubjectDestroyInterface;
class SubjectDestroyService extends Subject implements SubjectDestroyInterface
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