<div class="form-group">
	<label class="Validform_label label-name">{{$label}}</label>
	@if($attributes['type'] === 'select')
		<select {!!$attribute!!} multiple="multiple">
		@foreach($options as $key=>$value)
			<option value="{{$key}}" {{in_array($key,$multi_value) ? 'selected' : null}}>{{$value}}</option>
		@endforeach
		</select>
	@elseif($attributes['type'] === 'checkbox')
	<div>
		@foreach($options as $key=>$value)
		<label class="checkbox-inline">
			<input {!!$attribute!!} value="{{$key}}" {{in_array($key,$multi_value) ? 'checked' : null}} /> {{$value}}
		</label>
		@endforeach
	</div>
	@endif
	<p class="help-block Validform_checktip">{{$tip}}</p>
</div>
