<?php
namespace Simon\File\Services\Image;
use Simon\File\Services\Image;
use Simon\File\Services\Image\Interfaces\ImageDestroyInterface;
class ImageDestroyService extends Image implements ImageDestroyInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\File\Services\Image\Interfaces\ImageDestroyInterface::outsideDestroy()
	 * @author simon
	 */
	public function outsideDestroy(array $outsideIds, $outsideType)
	{
		// TODO Auto-generated method stub
		return $this->model->whereIn('outside_id',$outsideIds)->where('outside_type',$outsideType)->delete();
	}

	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\DestroyInterface::destroy()
	 * @author simon
	 */
	public function destroy(array $data)
	{
		// TODO Auto-generated method stub
		return $this->model->destroy($data);
	}

	
}