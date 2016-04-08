<?php
namespace Simon\Tag\Forms\Tag;
use Simon\Tag\Forms\TagForm;
use App\Forms\Interfaces\FormInterface;
class TagUserStoreForm extends TagForm implements FormInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::getAttr()
	 * @author simon
	 */
	public function getAttr()
	{
		// TODO Auto-generated method stub
		
	}

	/* 
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::getRule()
	 * @author simon
	 */
	public function getRule()
	{
		// TODO Auto-generated method stub
		$rule = $this->rule;
		unset($rule['status']);
		return $rule;
	}

	
}