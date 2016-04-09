<?php
namespace Simon\Tag\Fields\Tags;
use App\Fields\Field;
class Status extends Field
{
	
	/**
	 * 已验证状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_VERIFIED = 1;
	
	/**
	 * 未验证状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_NOT_VERIFIED = 2;
	
	/**
	 * 未通过状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_NOT_BY = 3;
	
	/**
	 * 禁止
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_BAN = 4;
	
	/**
	 * 会员状态数组
	 * @var numeric
	 * @author simon
	 */
	const STATUS = [self::STATUS_VERIFIED=>'已验证',self::STATUS_NOT_VERIFIED=>'未验证',self::STATUS_NOT_BY=>'未通过',self::STATUS_BAN=>'已禁止'];
	
	
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