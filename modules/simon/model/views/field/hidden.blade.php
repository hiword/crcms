<div class="form-group">
	<label class="Validform_label label-name">字段类型</label>
	<select class="form-control" name="setting[type]" id="">
		<option value="">请选择字段类型</option>
		<option value="tinyInteger" {{isset($setting->type) && $setting->type=='tinyInteger' ? 'selected' : null}}>TINYINT</option>
		<option value="smallInteger" {{isset($setting->type) && $setting->type=='smallInteger' ? 'selected' : null}}>SMALLINT</option>
		<option value="mediumInteger" {{isset($setting->type) && $setting->type=='mediumInteger' ? 'selected' : null}}>MEDIUMINT</option>
		<option value="integer" {{isset($setting->type) && $setting->type=='integer' ? 'selected' : null}}>INTEGER</option>
		<option value="bigInteger" {{isset($setting->type) && $setting->type=='bigInteger' ? 'selected' : null}}>BIGINT</option>
	</select>
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	 <div class="form-group">
		<label class=" Validform_label label-name">默认值</label>
		<input class="form-control" type="text" name="setting[default_value]" value="{{$setting->default_value or null}}" datatype="*1-120" placeholder="">
		<p class="help-block Validform_checktip"></p>
	</div>
</div>
