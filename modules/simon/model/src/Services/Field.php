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

}