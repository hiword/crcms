<?php
namespace Simon\Document\Forms\Category;
use Simon\Document\Forms\Category;
use App\Forms\Interfaces\FormInterface;
use Illuminate\Support\Facades\Input;
class CategoryFormUpdate extends Category implements FormInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Document\Forms\Category::getAttr()
	 * @author simon
	 */
	public function getAttr()
	{
		// TODO Auto-generated method stub
		
	}

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Document\Forms\Category::getRule()
	 * @author simon
	 */
	public function getRule()
	{
		$this->rule['mark'] = ['required','unique:categorys,id,'.$this->request->input('id')];
		return $this->rule;
	}

	
}