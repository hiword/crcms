<?php
namespace Simon\System\Forms\Admin;
use Simon\System\Forms\AdminForm;
use App\Forms\Interfaces\FormInterface;
class AdminLoginForm extends AdminForm implements FormInterface
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
		$rule = [];
		$rule['name'] = $this->rule['name'];
		$rule['password'] = $this->rule['password'];
		return $rule;
	}

	
}