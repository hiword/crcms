<?php
namespace Simon\Document\Services;
use App\Services\Service;
use Simon\Document\Models\Doubi as DoubiModel;
abstract class Doubi extends Service
{
	
	public function __construct(DoubiModel $Doubi) 
	{
		parent::__construct();
		$this->model = $Doubi;
	}
	
}