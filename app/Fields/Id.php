<?php
namespace App\Fields;
class Id extends Field
{
	/* (non-PHPdoc)
	 * @see \App\Fields\Field::destroyHandle()
	 */
	public function destroyHandle()
	{
		// TODO Auto-generated method stub
		if (is_array($this->value))
		{
			return array_map(function ($value){
				return intval($value);
			}, $this->value);
		}
		return $this->handle();
	}

	/* (non-PHPdoc)
	 * @see \App\Fields\Field::formAttributes()
	 */
	public function formAttributes()
	{
		// TODO Auto-generated method stub
		return [
			'attr'=>[
				'type'=>'hidden',
				'value'=>$this->value,
				'name'=>'id',
			],
			'label_name' => '标题',
			'label_explain' => '',
			'role' => 'text',
			'sort' => 0 
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
		return 'regex:/^[1-9][\d]$/';
	}

	
}