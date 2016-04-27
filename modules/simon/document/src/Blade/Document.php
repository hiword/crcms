<?php
namespace Simon\Document\Blade;
use App\Blade\AbsBlade;
use App\Blade\BladeInterface;
use Simon\Document\Services\Document\Interfaces\DocumentInterface;
class Document extends AbsBlade
{
	
	public function __construct(DocumentInterface $DocumentInterface)
	{
		$this->service = $DocumentInterface;	
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Blade\BladeInterface::resolve()
	 * @author simon
	 */
	public function resolve($cid = 0)
	{
		// TODO Auto-generated method stub
		return $this->service->paginateFront($cid,app('request')->all());
	}

	
}