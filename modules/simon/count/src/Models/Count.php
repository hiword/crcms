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
	
// 	public function outside() 
// 	{
// 		if (strpos('\\', $this->attributes['outside_type']) === false)
// 		{
// 			//where('id') 这里先用id，不是每个主表的是id
// 			return $this->setTable($this->attributes['outside_type'])->where('id',$this->attributes['outside_id'])->first();
// 		}
// 		else
// 		{
// 			return $this->hasOne($this->attributes['outside_type'],'id','outside_id')->first();
// 		}
// 	}
}