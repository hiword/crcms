<?php
namespace Simon\Document\Forms;
use App\Forms\AbsForm;
abstract class CategoryForm extends AbsForm
{
	
	protected $rule = [
		'name'=>['required','max:100'],
		'pid'=>['required','integer'],
		'status'=>['required','integer'],
	];
	
}