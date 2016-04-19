<?php
namespace Simon\User\Forms\User;
use Simon\User\Forms\UserForm;
use App\Forms\Interfaces\FormInterface;
class UserLoginForm extends UserForm implements FormInterface
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
		if (is_numeric($this->request->input('name')))
		{
			$this->rule['name'] = ['required','regex:/^1[\d]{10}$/'];
		}
		elseif (filter_var($this->request->input('name'),FILTER_VALIDATE_EMAIL))
		{
			$this->rule['name'] = ['required','email'];
		}
		
		return $this->rule;
	}

	
}