<?php
namespace Simon\Tag\Services;
use App\Services\Service;
use Simon\Tag\Models\TagOutside as TagOutsideModel;
abstract class TagOutside extends Service
{
	
	public function __construct(TagOutsideModel $TagOutside) 
	{
		parent::__construct();
		$this->model = $TagOutside;
	}
	
}