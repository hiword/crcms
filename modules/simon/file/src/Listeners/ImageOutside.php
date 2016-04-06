<?php

namespace Simon\File\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Simon\File\Models\Image;

class ImageOutside implements ShouldQueue
{
	
	use InteractsWithQueue;
	
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
    		$Image = new Image();
    		
    		//先删除原数据
    		$Image->where('outside_id',$Event->outside['id'])->where('outside_type',$Event->outside['model'])->delete();
    		
    		$img = [];
    		foreach ($Event->images as $image)
    		{
    			if (empty($image['path']))
    			{
    				continue;
    			}
    			$img['path'] = $image['path'];
    			$img['hash'] = isset($image['hash']) ? $image['hash'] : '';
    			$img['alt'] = isset($image['alt']) ? $image['alt'] : '';
    			$img['outside_id'] = $Event->outside['id'];
    			$img['outside_type'] = $Event->outside['model'];
    			$Image->storeData($img);
    		}
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}
