<?php
namespace Simon\Tag\Fields\Tags;
use App\Fields\Field;
class Name extends Field
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
						'name'=>'name',
						'value'=>$this->value,
						'type'=>'text',
				]
		];
	}

	/* (non-PHPdoc)
	 * @see \App\Fields\Field::handle()
	 */
	public function handle()
	{
		// TODO Auto-generated method stub
		return (string)$this->value;
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
		$request = app('request');
		$rule = ['required','min:1','max:50'];
		if ($request->is('*tags/store'))
		{
			$rule[] = 'unique:tags,name';
		}
		elseif ($request->is('manage/tags/update*'))
		{
			$rule[] = 'unique:tags,name,'.intval($request->input('id'));
		}
		return $rule;
	}

	
}