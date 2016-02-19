<?php
namespace App\Services;
use Illuminate\Database\Eloquent\Model;
use Searchs\Driver\LaravelSearch;
use Searchs\Search as Searching;
class Search 
{
	
	protected $options = ['where'=>[],'limit'=>[],'order'=>[],'field'=>[],'join'=>[]];
	
	public function searchd(Model $Model,$isSave = false)
	{
		
		empty($this->options['order']) && $this->options['order'] = ['created_at','desc'];
		
		$search = new Searching(new LaravelSearch(), $Model,$this->options);
		
		$searchd = $search->get();
		
		if ($isSave)
		{
			$this->components()->model = $searchd;
		}
		
		return $searchd;
	}
	
	public function setField(array $field)
	{
		$this->options['field'] = $field;
		return $this;
	}
	
	public function setOrder(array $order)
	{
		empty($order) && $order = ['created_at','desc'];
		$this->options['order'] = $order;
		return $this;
	}
	
	public function setLimit(array $limit)
	{
		$this->options['limit'] = $limit;
		return $this;
	}
	
	public function setWhere(array $where)
	{
		$this->options['where'] = $where;
		return $this;
	}
	
	public function setJoin(array $join)
	{
		$this->options['join'] = $join;
		return $this;
	}
	
}