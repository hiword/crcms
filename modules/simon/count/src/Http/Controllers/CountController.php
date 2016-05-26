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
		event(new Count('54', 'Simon\Document\Models\Document'));
	}
	
}