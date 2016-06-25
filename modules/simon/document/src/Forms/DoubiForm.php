<?php
namespace Simon\Document\Forms;
use App\Forms\AbsForm;
abstract class DoubiForm extends AbsForm
{
	protected $rule = [
		'document.seo_title'=>['max:150',],
		'document.sort'=>['required','integer',],
		'document.status'=>['required','integer',],
			
// 		'document_data.content'=>['required',],
		'document_data.seo_keyword'=>['max:255',],
		'document_data.seo_intro'=>['max:512',],
	];
}