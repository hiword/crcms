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
			'mark'=>'Simon\Document\Fields\Category\Mark',
			'status'=>'Simon\Document\Fields\Category\Status',
	];
	
	/**
	 * 对多对  所有category
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 * @author simon
	 */
	public function belongsToManyDocument()
	{
		return $this->belongsToMany('Simon\Document\Models\Document','category_documents','category_id','document_id');
	}
	
}