<?php

namespace Simon\File\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Simon\File\Models\Image;
use Simon\File\Services\Image\Interfaces\ImageInterface;
use Simon\File\Services\Image\Interfaces\ImageStoreInterface;
use Simon\File\Services\Image\Interfaces\ImageDestroyInterface;

class ImageOutside implements ShouldQueue
{
	
	use InteractsWithQueue;
	
	protected $imageStore = null;
	
	protected $imageDestroy = null;
	
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(ImageDestroyInterface $ImageDestroyInterface,ImageStoreInterface $ImageStoreInterface)
    {
        //
        $this->imageStore = $ImageStoreInterface;
        $this->imageDestroy = $ImageDestroyInterface;
    }

    /**
     * Handle the event.
     *
     * @param  Register  $event
     * @return void
     */
    public function handle(Event $Event)
    {
    	try 
    	{
    		//先删除原数据
    		$this->imageDestroy->outsideDestroy((array)$Event->outside['id'], $Event->outside['model']);
    		
    		$img = [];
    		foreach ($Event->images as $image)
    		{
    			if (empty($image['path'])) continue;
    			
    			$img['path'] = $image['path'];
    			$img['hash'] = isset($image['hash']) ? $image['hash'] : '';
    			$img['alt'] = isset($image['alt']) ? $image['alt'] : '';
    			$img['outside_id'] = $Event->outside['id'];
    			$img['outside_type'] = $Event->outside['model'];
    			$this->imageStore->store($img);
    		}
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}