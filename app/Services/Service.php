<?php
namespace App\Services;
abstract class Service
{
	
	/**
	 * 
	 * @var App\Models\Model
	 * @author simon
	 */
	protected $model = null;
	

	public function __construct() {}
	
}