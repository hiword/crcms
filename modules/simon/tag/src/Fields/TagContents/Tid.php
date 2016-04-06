<?php
namespace Simon\Tag\Fields\TagContents;
use App\Fields\Field;
class Tid extends Field
{
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
// 						'name'=>'content',
// 						'value'=>$this->value,
// 						'type'=>'textarea',
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
		return ['required','integer'];
	}

	
}