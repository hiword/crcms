<?php
namespace App\Forms;
use App\Forms\Interfaces\FormInterface;
abstract class Form implements FormInterface
{
	
	protected $request = null;
	
	public function __construct()
	{
		$this->request = app('request');
	}
	
	
}