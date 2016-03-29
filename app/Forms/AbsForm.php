<?php
namespace App\Forms;
abstract class AbsForm
{
	
	/**
	 * 
	 * @var array $rule
	 */
	protected $rule = [];
	
	/**
	 * 
	 * @var array $attr
	 */
	protected $attr = [];
	

	/**
	 *
	 * @var Illuminate\Http\Request
	 * @author simon
	 */
	protected $request = null;
	
	/**
	 *
	 *
	 * @author simon
	 */
	public function __construct()
	{
		$this->request = app('request');
	}
	
}