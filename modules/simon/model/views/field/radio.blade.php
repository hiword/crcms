<div class="form-group">
	<label class="Validform_label label-name">字段类型</label>
	<select class="form-control" name="setting[type]" id="">
		<option value="">请选择字段类型</option>
		<option value="char" {{isset($setting->type) && $setting->type=='char' ? 'selected' : null}}>CHAR</option>
		<option value="string" {{isset($setting->type) && $setting->type=='string' ? 'selected' : null}}>VARCHAR</option>
		<option value="tinyInteger" {{isset($setting->type) && $setting->type=='tinyInteger' ? 'selected' : null}}>TINYINT</option>
		<option value="smallInteger" {{isset($setting->type) && $setting->type=='smallInteger' ? 'selected' : null}}>SMALLINT</option>
		<option value="mediumInteger" {{isset($setting->type) && $setting->type=='mediumInteger' ? 'selected' : null}}>MEDIUMINT</option>
		<option value="integer" {{isset($setting->type) && $setting->type=='integer' ? 'selected' : null}}>BIGINT</option>
	</select>
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">字段长度</label>
	<input type="number" class="form-control" name="setting[length]" value="{{$setting->length or null}}" />
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class=" Validform_label label-name">默认值</label>
	<input class="form-control" type="text" name="setting[default_value]" value="{{$setting->default_value or null}}" datatype="*1-120" placeholder="">
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">表单类型</label>
		<div>
			<label class="radio-inline">
				<input type="radio" name="setting[radio_type]" value="radio" {{isset($setting->radio_type) && $setting->radio_type=='radio' ? 'checked' : null}}> Radio
			</label>
			<label class="radio-inline">
				<input type="radio" name="setting[radio_type]" value="checkbox" {{isset($setting->radio_type) && $setting->radio_type=='checkbox' ? 'checked' : null}}> Checkbox
			</label>
			<label class="radio-inline">
				<input type="radio" name="setting[radio_type]" value="select" {{isset($setting->radio_type) && $setting->radio_type=='select' ? 'checked' : null}}> Select
			</label>
		</div>
	<p class="help-block Validform_checktip">
		checkbox类型，最多只能有一个选项
	</p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">表单选项</label>
	<textarea name="setting[option]" class="form-control">{{isset($setting->option) ? $setting->option : null}}</textarea>
	<p class="help-block Validform_checktip">
		一行一个，可关联数据表，格式如下：<br />
		SQL:SQLvalue:值字段,显示字段，如：select id,name from models where id=? or id=?:3,4:id,name<br />
		其它格式如：值字段:显示字段，如id:name
	</p>
</div>
