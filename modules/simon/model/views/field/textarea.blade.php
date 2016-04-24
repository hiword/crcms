<div class="form-group">
	<label class="Validform_label label-name">字段类型</label>
	<select class="form-control" name="setting[type]" id="">
		<option value="">请选择字段类型</option>
		<option value="char" {{isset($setting->type) && $setting->type=='char' ? 'selected' : null}}>CHAR</option>
		<option value="string" {{isset($setting->type) && $setting->type=='string' ? 'selected' : null}}>VARCHAR</option>
		<option value="text" {{isset($setting->type) && $setting->type=='text' ? 'selected' : null}}>TEXT</option>
		<option value="mediumText" {{isset($setting->type) && $setting->type=='mediumText' ? 'selected' : null}}>MEDIUMTEXT</option>
		<option value="longText" {{isset($setting->type) && $setting->type=='longText' ? 'selected' : null}}>LONGTEXT</option>
	</select>
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">字段长度</label>
	<input type="number" class="form-control" name="setting[length]" value="{{$setting->length or null}}" />
	<p class="help-block Validform_checktip"></p>
</div>
