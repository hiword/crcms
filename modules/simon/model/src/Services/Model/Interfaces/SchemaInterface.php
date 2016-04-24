<?php
namespace Simon\Model\Services\Model\Interfaces;
use Simon\Model\Models\Model;
use Illuminate\Database\Eloquent\Collection;
interface SchemaInterface
{
	
	public function createTable(Model $model,Collection $fields);
	
}