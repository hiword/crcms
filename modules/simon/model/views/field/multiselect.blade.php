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
<label class="Validform_label label-name">字段长度</label>
<input class="form-control" type="number" value="{{$setting->length or null}}" name="setting[length]">
<p class="help-block Validform_checktip">CHAR，VARCHAR类型请填写，数字类型无需填写</p>
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
			格式：表名,外键字段,数据字段,类型字段，如：table,forkId,valueId,typeId<br />
			本地字段将会以“,”分隔<br />
		</p>
</div>
