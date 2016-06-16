<?php
namespace Simon\Hacker\Models;
use App\Models\Model;
use Illuminate\Support\Facades\DB;
class UserSubject extends Model
{
	const STATUS_SUCCESS = 1;
	
	const STATUS_ERROR = 2;
	/**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
//     public $incrementing = false;

//     /**
//      * Indicates if the model should be timestamped.
//      *
//      * @var bool
//      */
//     public $timestamps = false;
    
//     /**
//      * The primary key for the model.
//      *
//      * @var string
//      */
//     protected $primaryKey = null;
	
	public function hasOneUser() 
	{
		return $this->hasOne('Simon\User\Models\User','id','user_id');
	}
	
	/**
	 * 获取所有分数
	 * 
	 * @author simon
	 */
	public function scores() 
	{
		return $this->where('user_subjects.user_id',$this->attributes['user_id'])->where('user_subjects.status',static::STATUS_SUCCESS)->join('subjects','user_subjects.subject_id','=','subjects.id')->sum('subjects.score');
	}
}