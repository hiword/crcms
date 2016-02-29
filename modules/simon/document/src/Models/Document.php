<?php
namespace Simon\Document\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Document extends Model
{
	
	protected static $fields = [
			'title'=>'Simon\Document\Fields\Document\Title',
			'thumbnail'=>'Simon\Document\Fields\Document\Thumbnail',
			'status'=>'Simon\Document\Fields\Document\Status',
			'category_id'=>'Simon\Document\Fields\Document\CategoryId',
	];
	
	use SoftDeletes;
	
	public function hasOneDocumentData() 
	{
		return $this->hasOne('Simon\Document\Models\DocumentData','did','id');
	}
	
	public function belongsToManyCategory()
	{
		return $this->belongsToMany('Simon\Document\Models\Category','category_documents','document_id','category_id');
	}
	
	/**
	 * 多态多对多Tags
	 * @author simon
	 */
	public function morphToManyTag()
	{
		return $this->morphToMany('Simon\Tag\Models\Tag', 'outside','tag_outsides','outside_id','tag_id');
	}
	
	/**
	 * 多态，images,多对多
	 * @author simon
	 */
	public function morphManyImages()
	{
		return $this->morphMany('Simon\File\Models\Image','images','outside_type','outside_id');
	}
	
}