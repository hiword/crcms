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
	
	protected $append = null;
	

	public function __construct() {}
	
}