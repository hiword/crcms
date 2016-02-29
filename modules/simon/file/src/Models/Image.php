<?php
namespace Simon\File\Models;
use App\Models\Model;
class Image extends Model
{
	
	public function images() 
	{
		return $this->morphTo('images','outside_type','outside_id');
	}
	
}