<?php
namespace Simon\Document\Forms\CategoryDocument;
use Simon\Document\Forms\CategoryDocumentForm;
use App\Forms\Interfaces\FormInterface;
class CategoryDocumentUpdateForm extends CategoryDocumentForm implements FormInterface
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
		return $this->rule;
	}

	
	
	
}