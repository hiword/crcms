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
	
	protected $std = null;
	
	protected $data = [];
	
	public function __construct()
	{}
	
}