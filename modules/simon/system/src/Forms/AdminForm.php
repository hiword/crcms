<?php
namespace Simon\System\Forms;
use App\Forms\AbsForm;
abstract class AdminForm extends AbsForm
{
	
	protected $rule = [
		'name'=>['required','regex:/^[\w]{3,15}$/'],
		'password'=>['required','min:6','max:12'],
		'status'=>['required','integer'],
	];
	
}