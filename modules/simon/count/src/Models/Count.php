<?php
namespace Simon\Count\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Count extends Model 
{
	
	use SoftDeletes;

	public function counts()
	{
		return $this->morphTo('counts','outside_type','outside_id');
	}
	
	public function hasOneCountDetail() 
	{
		return $this->hasOne('Simon\Count\Models\CountDetail','cid','id');
	}
}