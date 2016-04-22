<div class="form-group">
	<label class="Validform_label label-name">字段类型</label>
	<select class="form-control" name="setting[type]" id="">
		<option value="">请选择字段类型</option>
		<option value="char" {{isset($setting->type) && $setting->type=='char' ? 'selected' : null}}>CHAR</option>
		<option value="string" {{isset($setting->type) && $setting->type=='string' ? 'selected' : null}}>VARCHAR</option>
	</select>
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">字段长度</label>
	<input type="number" class="form-control" name="setting[length]" value="{{$setting->length or null}}" />
	<p class="help-block Validform_checktip"></p>
</div>
