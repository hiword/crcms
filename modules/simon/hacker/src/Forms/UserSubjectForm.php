<?php
namespace Simon\Hacker\Forms;
use App\Forms\AbsForm;
abstract class UserSubjectForm extends AbsForm
{
	protected $rule = [
		'answer'=>['required','max:512'],
		'subject_id'=>['required','integer'],
	];
}