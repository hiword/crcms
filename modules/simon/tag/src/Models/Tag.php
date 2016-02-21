<?php
namespace Simon\Tag\Models;
use App\Models\Model;
use Simon\Tag\Models\TagOutside;
class Tag extends Model
{
// 	/**
// 	 * 文章模块类别
// 	 * @var numeric
// 	 * @author simon
// 	 */
// 	CONST TYPE_ARTICLE = 1;
	
// 	CONST TYPE_USER = 2;
	
// 	CONST TYPE_ASK = 3;
	
	/**
	 * 已验证状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_VERIFIED = 1;
	
	/**
	 * 未验证状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_NOT_VERIFIED = 2;
	
	/**
	 * 未通过状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_NOT_BY = 3;
	
	/**
	 * 禁止
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_BAN = 4;
	
	/**
	 * 字段
	 * @var array
	 * @author simon
	 */
	protected static $fields = [
			'name'=>'Simon\Tag\Fields\Tags\Name',
			'thumbnail'=>'Simon\Tag\Fields\Tags\Thumbnail',
	];
	
	/**
	 * 
	 * (non-PHPdoc)
	 * @see \App\Models\Model::dataStoreHandle()
	 * @author simon
	 */
	public function dataStoreHandle()
	{
		parent::dataStoreHandle();
		
		//前台添加则status为未验证
		//(user_session() && user_session()->session_type == 2) && $this->data['status'] = static::STATUS_NOT_VERIFIED;
		user_session('session_type') == 2 && $this->data['status'] = static::STATUS_NOT_VERIFIED;
	}
	
	/**
	 * TagContent关系
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 * @author simon
	 */
	public function hasOneTagContent()
	{
		return $this->hasOne('Simon\Tag\Models\TagContent','tid','id');
	}
	
	/**
	 * tag type 多对多
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 * @author simon
	 */
	public function hasBelongsToManyTagType()
	{
		return $this->belongsToMany('Simon\Tag\Models\TagType','tag_tag_types','tag_id','type_id');
	}
	

	/**
	 * 一对多tags
	 * @param numeric $outside_id
	 * @param string $outside_model
	 * @author simon
	 */
	public function hasManyTags($outside_id,$outside_model)
	{
		$tags = TagOutside::where('outside_id',$outside_id)->where('outside_model',$outside_model)->lists('tag_id');
		return $this->whereIn('id',$tags)->orderBy(static::CREATED_AT,'desc')->get();
	}
	
	
	public function morphedByManyTopic()
	{
		return $this->morphedByMany('Simon\Topic\Models\Topic', 'outside','tag_outsides','tag_id','outside_id');
	}
	
	public function morphedByManyDocument()
	{
		return $this->morphedByMany('Simon\Document\Models\Document', 'outside','tag_outsides','tag_id','outside_id');
	}

}