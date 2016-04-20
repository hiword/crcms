<?php
namespace Simon\Model\Models;
use App\Models\Model as AppModel;
class ModelRelation extends AppModel
{
	public $incrementing = false;
	
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;
}