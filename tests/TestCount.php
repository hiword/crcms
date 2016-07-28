<?php
class TestCount extends TestCase
{
	
	public function testPostCount()
	{
		$response = $this->get('http://localhost/3.1/public/index.php/count/count/id/doubi/good');
		dd($response->getResult());
	}
}