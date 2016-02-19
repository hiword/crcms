<?php
namespace Simon\Document\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Category extends Model
{
	
	use SoftDeletes;
	
	protected $table = 'categorys';
	
	/**
	 * 
	 * @var array
	 * @author simon
	 */
	protected static $fields = [
			'pid'=>'Simon\Document\Fields\Category\Pid',
			'name'=>'Simon\Document\Fields\Category\Name',
			'status'=>'Simon\Document\Fields\Category\Status',
	];
	
}