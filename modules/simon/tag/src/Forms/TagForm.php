<?php
namespace Simon\Tag\Forms;
use App\Forms\AbsForm;
abstract class TagForm extends AbsForm
{
	
	protected $rule = [
			'status'=>['required','integer',],
	];
	
}
