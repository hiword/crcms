<?php
namespace Simon\Tag\Models;
use App\Models\Model;
class TagContent extends Model
{
	
	/**
	 * 字段
	 * @var array
	 * @author simon
	 */
	protected static $fields = [
			'tid'=>'Simon\Tag\Fields\TagContents\Tid',
			'content'=>'Simon\Tag\Fields\TagContents\Content',
	];
	
	
}