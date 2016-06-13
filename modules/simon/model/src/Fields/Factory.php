<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 16-6-1
 * Time: 下午6:54
 */
namespace Simon\Model\Fields;
use Illuminate\Database\Eloquent\Collection;
use Simon\Model\Models\Model;

abstract class Factory
{

    protected $model = null;

    protected $fields = null;

    protected $data = [];

    public function __construct(Model $model,Collection $fields,array $data = [])
    {
        $this->model = $model;
        $this->data = $data;
        $this->fields = $this->fieldInstance($fields);
    }

    protected function fieldInstance(Collection $fields)
    {
        $fields->each(function($field){
            $namespace = 'Simon\Model\Fields\Option\\'.$field->type;
            $field->instance = new $namespace($field,$this->model);
        });
        return $fields;
//         $field
//         $this->fields = collect();
//         foreach ($fields as $key=>$field)
//         {

//             //匹配uri模式
//             if ($field->uri)
//             {
//                 $uri = array_filter($field->uri,function($value) {
//                     return app('request')->is($value);
//                 });

//                 if (empty($uri))
//                 {
//                     continue;
//                 }
//             }

//             $namespace = 'Simon\Model\Fields\Option\\'.$field->type;
//             $field->instance = new $namespace($field,$this->model);

//             $this->fields->push($field);
//         }
    }

}