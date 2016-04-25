<?php
namespace Simon\Model\Services\Model;
use Simon\Model\Services\Model\Interfaces\SchemaInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Collection;
use Simon\Model\Models\Field;
class SchemaService implements SchemaInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Services\Model\Interfaces\SchemaInterface::createTable()
	 * @author root
	 */
	public function createTable(\Simon\Model\Models\Model $model, \Illuminate\Database\Eloquent\Collection $fields)
	{
		// TODO Auto-generated method stub
		Schema::create($model->table_name, function(Blueprint $table) use ($fields)
		{
			
			foreach ($fields as $field)
			{
				$this->createElement($table,$field);
			}
			
			$this->createBuiltInElement($table);
		});
	}

	protected function createBuiltInElement(Blueprint $table)
	{
		$table->mediumInteger('model_id',false,true)->default(0);
		
		$table->mediumInteger('created_uid',false,true)->default(0);
		$table->mediumInteger('updated_uid',false,true)->default(0);
		$table->mediumInteger('deleted_uid',false,true)->default(0);
		
		$table->unsignedInteger('created_at')->default(0);
		$table->unsignedInteger('updated_at')->default(0);
		$table->unsignedInteger('deleted_at')->default(0);
	}

	protected function createElement(Blueprint $table,Field $field)
	{
		
			//type
			switch($field->setting->type)
			{
				case 'char':
				case 'string':
					$table_ = $table->{$field->setting->type}($field->name,$field->setting->length);
					break;
				case 'text':
				case 'textarea':
				case 'mediumText':
				case 'longText':
					$table_ = $table->{$field->setting->type}($field->name);
					break;
				case 'tinyInteger':
				case 'smallInteger':
				case 'mediumInteger':
				case 'integer':
				case 'bigInteger':
					if ($field->is_primary === Field::PRIMARY_INCREMENT)
					{
						$table_ = $table->{$field->setting->type}($field->name,true,true);
					}
					elseif ($field->is_primary === Field::PRIMARY_YES)
					{
						$table_ = $table->{$field->setting->type}($field->name,false,true)->primary();
					}
					else
					{
						$table_  = $table->{$field->setting->type}($field->name,false,true);
					}
					break;
				default:
					$table_ = null;
			}
		
			//set default value
			if (!empty($field->setting->default_value) && $table_)
			{
				$table_->default($field->setting->default_value);
			}
			
	}
	
}