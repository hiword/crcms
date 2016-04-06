<?php
namespace Simon\Tag\Services;
use App\Services\Service;
use Simon\Tag\Models\TagContent as TagContentModel;
abstract class TagContent extends Service
{
	
	public function __construct(TagContentModel $TagContent)
	{
		parent::__construct();
		$this->model = $TagContent;
	}
	
}