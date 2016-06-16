<?php
namespace Simon\Hacker\Forms\UserSubject;
use Simon\Hacker\Forms\UserSubjectForm;
use App\Forms\Interfaces\FormInterface;
class UserSubjectStoreForm extends UserSubjectForm implements FormInterface
{
	/*
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::getAttr()
	 * @author simon
	 */
	public function getAttr() {
		// TODO Auto-generated method stub

	}

	/*
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::getRule()
	 * @author simon
	 */
	public function getRule() {
		// TODO Auto-generated method stub
		return $this->rule;
	}


}