<?php
namespace Simon\Tag\Services;
use App\Services\Service;
use Simon\Tag\Models\Tag as TagModel;
abstract class Tag extends Service
{
	
	public function __construct(TagModel $Tag)
	{
		parent::__construct();
		$this->model = $Tag;
	}
	
}