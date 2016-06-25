<?php
namespace Simon\Document\Blade;
use App\Blade\AbsBlade;
use App\Blade\BladeInterface;
use Simon\Document\Services\Document\Interfaces\DocumentInterface;
use Simon\Document\Services\Doubi\Interfaces\DoubiInterface;
class Document extends AbsBlade
{
	
	protected $document = null;
	
	protected $doubi = null;
	
	public function __construct(DocumentInterface $DocumentInterface,DoubiInterface $DoubiInterface)
	{
		$this->document = $DocumentInterface;
		$this->doubi = $DoubiInterface;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Blade\BladeInterface::resolve()
	 * @author simon
	 */
	public function resolve($type = 'document',$cid = 0)
	{
		// TODO Auto-generated method stub
		return $this->$type->paginateFront($cid,app('request')->all());
	}
	
	public function next($type = 'document',$id) 
	{
		return $this->$type->next($id);
	}
	
	public function prev($type = 'document',$id)
	{
		return $this->$type->prev($id);
	}
}