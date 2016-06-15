<?php
namespace Simon\Hacker\Forms;
use App\Forms\AbsForm;
abstract class SubjectForm extends AbsForm
{
	protected $rule = [
		'title'=>['required','max:255'],
		'answer'=>['required','max:512'],
		'sort'=>['required','integer'],
		'status'=>['required','integer'],
		'score'=>['required','integer'],
		'content'=>['required'],
	];
}