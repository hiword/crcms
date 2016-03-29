<?php
namespace App\Forms;
abstract class AbsForm
{
	
	protected $rule = [];
	
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