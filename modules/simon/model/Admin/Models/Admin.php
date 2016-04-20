<?php
namespace Admin\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Admin extends Model {
	
	use SoftDeletes;
	
}