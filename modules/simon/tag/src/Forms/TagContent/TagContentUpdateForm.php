<?php
namespace Simon\Tag\Forms\TagContent;
use Simon\Tag\Forms\TagContentForm;
use App\Forms\Interfaces\FormInterface;
class TagContentUpdateForm extends TagContentForm implements FormInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::getAttr()
	 * @author root
	 */
	public function getAttr()
	{
		// TODO Auto-generated method stub
		
	}

	/* 
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::getRule()
	 * @author root
	 */
	public function getRule()
	{
		// TODO Auto-generated method stub
		return $this->rule;
	}

	
	
	
}