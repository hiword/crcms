<?php
namespace Simon\User\Forms;
use App\Forms\AbsForm;
abstract class UserForm extends AbsForm
{
	
	protected $rule = [
		'name'=>['required','regex:/^[\w]{3,15}$/'],
		'password'=>['required','min:6','max:20'],
	];
	
}