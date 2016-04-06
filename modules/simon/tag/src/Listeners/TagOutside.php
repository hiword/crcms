<?php

namespace Simon\Tag\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Simon\Tag\Models\TagOutside as TagOutsideModel;
use Simon\Tag\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagOutside implements ShouldQueue
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
    		//tags过滤
    		//$tags = array_unique(explode(" ", $Event->data['tags']));
    		
    		//查找tags
    		$Tag = new Tag();
    		$tags = $Tag->whereIn('id',$Event->tags)->lists('id');
    		if(empty($tags))
    		{
    			return ;
    		}
    		
    		$TagOutside = new TagOutsideModel();
    		$tag = [];
    		foreach ($tags as $id)
    		{
    			$tag['tag_id'] = $id;
    			$tag['outside_id'] = $Event->outside['id'];
    			$tag['outside_type'] = $Event->outside['model'];
    			$TagOutside->storeData($tag);
    		}
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}
