<?php
namespace Simon\System\Fields\Admin;
use App\Fields\Field;
class Status extends Field
{
	
	/**
	 * 状态
	 * @var numeric
	 * @author simon
	 */
	const STATUS_VERIFIED = 1;
	
	/**
	 * 状态 禁止
	 * @var numeric
	 * @author simon
	 */
	const STATUS_BAN = 2;
	
	/**
	 * 会员状态数组
	 * @var numeric
	 * @author simon
	 */
	const STATUS = [self::STATUS_VERIFIED=>'正常',self::STATUS_BAN=>'禁止'];
	
	
	/* (non-PHPdoc)
	 * @see \App\Fields\Field::destroyHandle()
	 */
	public function destroyHandle()
	{
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see \App\Fields\Field::formAttributes()
	 */
	public function formAttributes()
	{
		// TODO Auto-generated method stub
		return [
				'attr'=>[
				]
		];
	}

	/* (non-PHPdoc)
	 * @see \App\Fields\Field::handle()
	 */
	public function handle()
	{
		// TODO Auto-generated method stub
		return intval($this->value);
	}

	/* (non-PHPdoc)
	 * @see \App\Fields\Field::storeHandle()
	 */
	public function storeHandle()
	{
		// TODO Auto-generated method stub
		return $this->handle();
	}

	/* (non-PHPdoc)
	 * @see \App\Fields\Field::updateHandle()
	 */
	public function updateHandle()
	{
		// TODO Auto-generated method stub
		return $this->handle();
	}

	/* (non-PHPdoc)
	 * @see \App\Fields\Field::validateRule()
	 */
	public function validateRule()
	{
		// TODO Auto-generated method stub
		return ['required','integer',];
	}

}