<?php
namespace Simon\Count\Models;
use App\Models\Model;
class CountDetail extends Model
{
	
	public $timestamps = false;
	
	public $incrementing = false;
	
	protected $primaryKey = 'cid';
	
}