<?php
namespace Simon\Document\Models;
use App\Models\Model;
class DoubiData extends Model
{
	
	protected $primaryKey = 'did';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
	
}