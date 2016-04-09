<?php

namespace Simon\Tag\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Simon\Tag\Models\Tag;
use Illuminate\Support\Facades\DB;
use Simon\Tag\Services\Tag\Interfaces\TagInterface;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideStoreInterface;

class TagOutside implements ShouldQueue
{
	
	use InteractsWithQueue;
	
	protected $tag = null;
	
	protected $tagOutsideStore = null;
	
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(TagInterface $Tag,TagOutsideStoreInterface $TagStoreInterface)
    {
        //
        $this->tag = $Tag;
        $this->tagOutsideStore = $TagStoreInterface;
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
    		$tags = $this->tag->lists($Event->tags);
    		if ($tags)
    		{
    			$tag = [];
    			foreach ($tags as $_tag)
    			{
    				$tag['tag_id'] = $_tag->id;
    				$tag['outside_id'] = $Event->outside['id'];
    				$tag['outside_type'] = $Event->outside['model'];
    				$this->tagOutsideStore->store($tag);
    			}
    		}
    		
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}
