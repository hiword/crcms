<?php
namespace Simon\Document\Forms\Category;
use Simon\Document\Forms\Category;
use App\Forms\Interfaces\FormInterface;

class CategoryFormStore extends Category implements FormInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Document\Forms\Category::getAttr()
	 * @author root
	 */
	public function getAttr()
	{
		// TODO Auto-generated method stub
		
	}

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Document\Forms\Category::getRule()
	 * @author root
	 */
	public function getRule()
	{
		$this->rule['mark'] = ['required','unique:categorys'];
		return $this->rule;
	}

}