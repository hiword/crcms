<div class="form-group">
	<label class="Validform_label label-name">字段类型</label>
	<select class="form-control" name="setting[type]" id="">
		<option value="">请选择字段类型</option>
		<option value="char">CHAR</option>
		<option value="string">VARCHAR</option>
		<option value="tinyInteger">TINYINT</option>
		<option value="smallInteger">SMALLINT</option>
		<option value="mediumInteger">MEDIUMINT</option>
		<option value="integer">BIGINT</option>
	</select>
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">字段长度</label>
	<input type="number" class="form-control" name="setting[length]" />
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">表单类型</label>
		<div>
			<label class="radio-inline">
				<input type="radio" name="setting[radio_type]" value="radio" checked> Radio
			</label>
			<label class="radio-inline">
				<input type="radio" name="setting[radio_type]" value="checkbox"> Checkbox
			</label>
			<label class="radio-inline">
				<input type="radio" name="setting[radio_type]" value="select"> Select
			</label>
		</div>
	<p class="help-block Validform_checktip"></p>
</div>
<div class="form-group">
	<label class="Validform_label label-name">表单选项</label>
	<textarea name="setting[option]" class="form-control"></textarea>
	<p class="help-block Validform_checktip">
		一行一个，可关联数据表，格式如下：<br />
		SQL:SQLvalue:值字段,显示字段，如：select id,name from models where id=? or id=?:3,4:id,name<br />
		其它格式如：值字段:显示字段，如id:name
	</p>
</div>
