<?php
namespace Simon\Comment\Forms\Comment;
use Simon\Comment\Forms\CommentForm;
use App\Forms\Interfaces\FormInterface;
class CommentStoreForm extends CommentForm implements FormInterface
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