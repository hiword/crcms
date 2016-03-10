<?php
namespace App\Services;
// use Illuminate\Database\Eloquent\Model;
class Paginate 
{

	protected $pageSize = 2;

	protected $pagePath = '';

	protected $pageUrlParams = [];

	protected $pageType = 'full';

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		return $this;
	}

	public function setPath($path)
	{
		$this->pagePath = $path;
		return $this;
	}

	public function setUrlParams($params)
	{
		$this->pageUrlParams = $params;
		return $this;
	}

	public function setPageType($type)
	{
		$this->pageType = $type;
		return $this;
	}

	public function page($Model,callable $callable = null)
	{

		if ($this->pageType === 'full')
		{
			$paginate = $Model->paginate($this->pageSize);
		}
		elseif ($this->pageType === 'simple')
		{
			$paginate = $Model->simplePaginate($this->pageSize);
		}

		$items = $paginate->items();

		if ($callable)
		{
			$items = $callable($items);
		}

		return ['total'=>$paginate->total(),'models'=>$items,'page_json'=>$paginate,'page'=>$paginate->setPath($this->pagePath)->appends($this->pageUrlParams)->render()];
	}

}