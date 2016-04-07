<?php
namespace Simon\Document\Fields\Document;
use App\Fields\Field;
class AuditStatus extends Field
{
	
	/**
	 * 通过
	 * @var numeric
	 * @author simon
	 */
	const AUDIT_THROUGH = 1;
	
	/**
	 * 等待
	 * @var numeric
	 * @author simon
	 */
	const  AUDIT_WAIT = 2;
	
	/**
	 * 未通过
	 * @var numeric
	 * @author simon
	 */
	const AUDIT_NOT_THROUGH = 3;
	
	/**
	 * 会员状态数组
	 * @var numeric
	 * @author simon
	 */
	const AUDIT = [self::AUDIT_THROUGH=>'通过审核',self::AUDIT_WAIT=>'等待审核',self::AUDIT_NOT_THROUGH=>'未通过审核'];
	
	
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