<?php
namespace Simon\Comment\Models;
use App\Models\Model;
class CommentData extends Model
{
	
	protected $primaryKey = 'cid';
	
	public $incrementing = false;
	
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;
	
}