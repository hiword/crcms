<div class="form-group">
	<label class="Validform_label label-name">{{$label}}</label>
	@if($attributes['type'] === 'radio')
	<div>
		@foreach($options as $key=>$value)
		<label class="radio-inline">
			<input {!!$attribute!!} value="{{$key}}" {{$key==$radio_value ? 'checked' : null}} /> {{$value}}
		</label>
		@endforeach
	</div>
	@elseif($attributes['type'] === 'select')
		<select {!!$attribute!!}>
		@foreach($options as $key=>$value)
			<option {!!$attribute!!} value="{{$key}}" {{$key==$radio_value ? 'selected' : null}}>{{$value}}</option>
		@endforeach
		</select>
	@elseif($attributes['type'] === 'checkbox')
	<div>
		@foreach($options as $key=>$value)
		<label class="checkbox-inline">
			<input {!!$attribute!!} value="{{$key}}" {{$key==$radio_value ? 'checked' : null}} /> {{$value}}
		</label>
		@endforeach
	</div>
	@endif
	<p class="help-block Validform_checktip">{{$tip}}</p>
</div>
