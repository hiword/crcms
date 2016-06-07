<?php
namespace Simon\Comment\Forms;
use App\Forms\AbsForm;
abstract class CommentForm extends AbsForm
{
	
	protected $rule = [
		'outside_id'=>['required','integer'],
		'outside_type'=>['required'],
		'content'=>['required'],
	];
	
}