<?php
namespace Simon\Tag\Forms;
use App\Forms\AbsForm;
abstract class TagContentForm extends AbsForm
{
	
	protected $rule = [
			'content'=>['min:5'],
	];
	
}