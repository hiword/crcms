<?php
namespace Simon\User\Forms\User;
use Simon\User\Forms\UserForm;
use App\Forms\Interfaces\FormInterface;
class UserRegisterForm extends UserForm implements FormInterface
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
		$rule = [
			'email'=>['required','email','unique:users'],
			'name'=>array_merge($this->rule['name'],['unique:users'])
		];
		
		
		return array_merge($this->rule,$rule);
	}

	
}