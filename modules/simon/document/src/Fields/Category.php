<?php
namespace Simon\Document\Fields;
use App\Fields\Field;
class Category extends Field
{
	
	protected $fields = [
		'pid'=>Simon\Document\Fields\Category\Pid::class,
		'name'=>Simon\Document\Fields\Category\Name::class,
		'mark'=>'Simon\Document\Fields\Category\Mark',
		'status'=>'Simon\Document\Fields\Category\Status',
	];
	
}