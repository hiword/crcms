<?php
namespace Simon\Document\Forms;
use App\Forms\AbsForm;
abstract class CategoryDocumentForm extends AbsForm
{
	protected $rule = [
		'category_id'=>['required','array'],
	];
}