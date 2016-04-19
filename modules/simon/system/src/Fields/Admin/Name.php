<?php
namespace Simon\System\Fields\Admin;
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
					'type'=>'text',
					'name'=>'name',
					'value'=>$this->value,
			],
		];
	}

	/* (non-PHPdoc)
	 * @see \App\Fields\Field::handle()
	 */
	public function handle()
	{
		// TODO Auto-generated method stub
		return $this->value;
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
        if ($request->is('manage/admin/update*'))
        {
            $rule = 'unique:admins,name,'.intval($request->input('id'));
        }
        elseif ($request->is('manage/auth/login*'))
        {
            $rule = '';
        }
        else
        {
            $rule = 'unique:admins,name';
        }
        return ['required','regex:/^[\w]{3,12}$/',$rule];
	}

	
	
	
}