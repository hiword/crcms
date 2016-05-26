<?php
namespace Simon\Count\Services;
use App\Services\Service;
use Simon\Count\Models\Count as CountModel;
abstract class Count extends Service
{
	
	public function __construct(CountModel $Count)
	{
		parent::__construct();
		$this->model = $Count;
	}
	
}