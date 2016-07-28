<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\Field;
use Simon\Model\Fields\FieldInterface;
use Illuminate\Support\Facades\DB;
class Radio extends Field implements FieldInterface
{
	/**
	 * 
	 * @var string
	 * @author simon
	 */
	protected $type = 'radio';
	
	public function arrayForm($value = null)
	{
		$form = parent::arrayForm($value);
		$form['radio_value'] = $value ? $value : $this->field->setting->default_value;
		return $form;
	}
	
	protected function attributes($value = null)
	{
		$this->attributes['name'] = $this->attributeName();
		$this->attributes['type'] = $this->field->setting->radio_type;
	}
	
	public function filter($value)
	{
		return xss_clean($value);
	}
	
	public function show($value, $primaryKey = 'id')
	{
		//这里的SQL还是全部查询出来了，会影响效率
		//应该先判断是否在key:value中，不存在，则匹配SQL，查询条件加上where key=$value的值单条
		$options = $this->options($this->field->setting->option);
		return array_filter($options,function($vo,$key) use ($value){
			return $vo==$value;
		},ARRAY_FILTER_USE_BOTH);
	}
}