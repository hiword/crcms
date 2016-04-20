<?php
namespace Simon\Model\Services;
use App\Services\Service;
use Simon\Model\Models\Model as ModelModel;
use Simon\Model\Models\ModelRelation;
abstract class Model extends Service
{
	
	public function __construct(ModelModel $Model) 
	{
		parent::__construct();
		$this->model = $Model;
	}
	
	protected function storeExtends(array $extends,$modelId)
	{
		foreach ($extends as $value)
		{
			ModelRelation::create([
				'extend_id'=>$value,
				'model_id'=>$modelId,
			]);
		}
	}
	
}