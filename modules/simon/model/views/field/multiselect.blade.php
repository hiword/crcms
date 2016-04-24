<div class="form-group">
	<label class="Validform_label label-name">字段类型</label>
	<select class="form-control" name="setting[type]" id="">
		<option value="">请选择字段类型</option>
		<option value="char" {{isset($setting->type) && $setting->type=='char' ? 'selected' : null}}>CHAR</option>
		<option value="string" {{isset($setting->type) && $setting->type=='string' ? 'selected' : null}}>VARCHAR</option>
		<option value="text" {{isset($setting->type) && $setting->type=='text' ? 'selected' : null}}>TEXT</option>
		<option value="mediumText" {{isset($setting->type) && $setting->type=='mediumText' ? 'selected' : null}}>MEDIUMTEXT</option>
		<option value="enum" {{isset($setting->type) && $setting->type=='enum' ? 'selected' : null}}>ENUM</option>
	</select>
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class=" Validform_label label-name">默认值</label>
	<input type="text" class="form-control" name="setting[default_value]" value="{{$setting->default_value or null}}" />
	<p class="help-block Validform_checktip">多个值以“,”隔开，如：a,b,c</p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">表单类型</label>
		<div>
			<label class="radio-inline">
				<input type="radio" name="setting[mult_type]" value="checkbox" {{!isset($setting->mult_type) || (isset($setting->mult_type) && $setting->mult_type=='checkbox') ? 'checked' : null}}> Checkbox
			</label>
			<label class="radio-inline">
				<input type="radio" name="setting[mult_type]" value="select" {{isset($setting->mult_type) && $setting->mult_type=='select' ? 'checked' : null}}> Select
			</label>
		</div>
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">表单选项</label>
	<textarea name="setting[option]" class="form-control">{{isset($setting->option) ? implode("\n",$setting->option) : null}}</textarea>
	<p class="help-block Validform_checktip">
		一行一个，可关联数据表，格式如下：<br />
		SQL:SQLvalue:值字段,显示字段，如：select id,name from models where id=? or id=?:3,4:id,name<br />
		其它格式如：值字段:显示字段，如id:name
	</p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">存储方式</label>
		<div>
			<label class="radio-inline">
				<input type="radio" name="setting[store_type]" value="table" {{isset($setting->store_type) && $setting->store_type=='table' ? 'checked' : null}}> 外部表
			</label>
			<label class="radio-inline">
				<input type="radio" name="setting[store_type]" value="field" {{isset($setting->store_type) && $setting->store_type=='field' ? 'checked' : null}}> 字段
			</label>
		</div>
		<div class="mt5">
			<input class="form-control" type="text" name="setting[store_table]" value="{{$setting->store_table or null}}" datatype="*1-120" placeholder="">
		</div>
		<p class="help-block Validform_checktip">
			格式：表名,外键名:值,字段名:值,其它字段:值，如：table,id:{Id},value:{Value},other_field:abc<br />
			本地字段将会以“,”分隔<br />
			{Id}表单当前数据id，{Value}表示当前值<br />
		</p>
</div>
