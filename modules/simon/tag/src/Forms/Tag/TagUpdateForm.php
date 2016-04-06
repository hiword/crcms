<?php
namespace Simon\Tag\Forms\Tag;
use Simon\Tag\Forms\TagForm;
use App\Forms\Interfaces\FormInterface;
class TagUpdateForm extends TagForm implements FormInterface
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
		$rule = [
				'name'=>['required','min:1','max:50','unique:tags,name,'.intval($this->request->input('id'))],
		];
		return array_merge($this->rule,$rule);
	}

	
	
	
}