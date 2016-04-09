<?php
namespace Simon\Document\Forms;
use App\Forms\AbsForm;
abstract class DocumentForm extends AbsForm
{
	protected $rule = [
		'document.title'=>['required','max:150',],
		'document.sort'=>['required','integer',],
		'document.status'=>['required','integer',],
			
		'document_data.content'=>['required',],
		'document_data.keyword'=>['max:255',],
		'document_data.intro'=>['max:512',],
	];
}