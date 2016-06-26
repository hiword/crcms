<?php
namespace Simon\Count\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Count\Services\Count\Interfaces\CountInterface;
use Simon\Count\Events\Count;
class CountController extends Controller 
{

	public function __construct(CountInterface $Count)
	{
		parent::__construct();
		$this->service = $Count;
	}
	
	public function getIndex()
	{
// 		event(new Count('54', 'Simon\Document\Models\Document'));
	}
	
	public function getCount($outsideId,$outsideType,$outsideField)
	{
		$outsideType = rawurldecode($outsideType);
		$count = $this->service->count($outsideId,$outsideType,$outsideField);
		return $this->response(['app.success'],['count'=>$count]);
	}
	
	public function postCount($outsideId,$outsideType,$outsideField)
	{
		//this is not add cookie in the future need add
		event(new Count($outsideId, $outsideType,$outsideField));
		return $this->response(['app.success']);
	}
	
}