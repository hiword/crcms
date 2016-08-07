<?php

namespace User\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Simon\Tag\Models\Tag;
use Illuminate\Support\Facades\DB;
use Simon\Tag\Services\Tag\Interfaces\TagInterface;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideStoreInterface;
use Simon\Tag\Services\Tag\Interfaces\TagStoreInterface;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideInterface;
use Simon\Tag\Services\Tag\Interfaces\TagDestroyInterface;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideDestroyInterface;
use Simon\Tag\Services\Tag\Interfaces\TagUpdateInterface;

class TagOutside implements ShouldQueue
{
	
	use InteractsWithQueue;
	
	protected $log = null;
	
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(TagInterface $Tag,TagOutsideInterface $TagOutsideInterface,TagOutsideStoreInterface $TagOutsideStoreInterface,TagUpdateInterface $TagUpdateInterface,TagOutsideDestroyInterface $TagDestroyInterface)
    {
        //
        $this->tag = $Tag;
        $this->tagOutsideStore = $TagOutsideStoreInterface;
        $this->tagUpdate = $TagUpdateInterface;
        $this->tagOutside = $TagOutsideInterface;
        $this->tagOutsideDestroy = $TagDestroyInterface;
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
    		extract($Event->outside);
    		
    		//获取已存在的sideout
    		$tagsOutside = $this->tagOutside->lists($id,$model);
    		
    		foreach ($tagsOutside as $key=> $outside)
    		{
    			//删除已去除的tags
    			if (!in_array($outside->tag_id, $Event->tags))
    			{
    				$this->tagOutsideDestroy->tagAssocDestroy($outside->tag_id,$outside->outside_id,$outside->outside_type);
    				$tagsOutside->forget($key);
    				
    				//tags数量 -1
    				$this->tagUpdate->decrement($outside->tag_id);
    			}
    		}
    		
    		//获取本次
    		foreach ($Event->tags as $tagId)
    		{
    			$index = $tagsOutside->search(function($item,$key) use ($tagId){
    				return $item->tag_id == $tagId;
    			});
    			
    			//已存在，则不作考虑
    			if($index !== false) continue;
				
    			//增加不存在的
    			if($this->tagOutsideStore->store([
    					'tag_id'=>$tagId,
    					'outside_id'=>$id,
    					'outside_type'=>$model,
    			])) {
    				//增加统计次数
    				$this->tagUpdate->increment($tagId);
    			}
    		}
    		
//     		dd($tagsOutside);
// //     		dd($Event->tags);
    		
//     		//这里是添加的，编辑时候，先删除还未做
//     		$tags = $this->tag->lists($Event->tags);
//     		if ($tags)
//     		{
//     			$tag = [];
//     			foreach ($tags as $_tag)
//     			{
//     				$tag['tag_id'] = $_tag->id;
//     				$tag['outside_id'] = $Event->outside['id'];
//     				$tag['outside_type'] = $Event->outside['model'];
//     				$result = $this->tagOutsideStore->store($tag);
    				
//     				if ($result)
//     				{
//     					//增加统计次数
//     					$this->tagStore->increment($tag['tag_id']);
//     				}
//     			}
//     		}
//     		dd($result);
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}
