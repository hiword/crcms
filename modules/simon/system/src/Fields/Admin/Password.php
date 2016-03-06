<?php
namespace Simon\System\Fields\Admin;
class Password extends \App\Fields\Field 
{
	/* (non-PHPdoc)
	 * @see \App\Field::destroyHandle()
	 */
	public function destroyHandle()
	{
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see \App\Field::formAttributes()
	 */
	public function formAttributes()
	{
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see \App\Field::handle()
	 */
	public function handle()
	{
		// TODO Auto-generated method stub
		return bcrypt($this->value);
	}

	/* (non-PHPdoc)
	 * @see \App\Field::storeHandle()
	 */
	public function storeHandle()
	{
		// TODO Auto-generated method stub
		return $this->handle();
	}

	/* (non-PHPdoc)
	 * @see \App\Field::updateHandle()
	 */
	public function updateHandle()
	{
            return $this->handle();
	}

	/* (non-PHPdoc)
	 * @see \App\Field::validateRule()
	 */
	public function validateRule()
	{
		// TODO Auto-generated method stub
		$request = app('request');
		if ($request->is('manage/admin/update*'))
		{
		    return ['max:16','min:6'];
		}
		else
		{
		    return ['required','max:16','min:6'];
		}
	}

	
}