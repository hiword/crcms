<?php
namespace Simon\Model\Services;
use App\Services\Service;
use Simon\Model\Models\Field as FieldModel;
abstract class Field extends Service
{
	public function __construct(FieldModel $Field)
	{
		parent::__construct();
		$this->model = $Field;
	}

	protected function attribute($attribute) 
	{
		if ($attribute)
		{
			$formAttr = enter_format_array($attribute);
			$newFormAttr = [];
			foreach ($formAttr as $value)
			{
				$value = explode(':',$value);
				$newFormAttr[$value[0]] = str_replace(',',' ',$value[1]);
			}
		}
		else
		{
			$newFormAttr = [];
		}
		
		return $newFormAttr;
	}
}