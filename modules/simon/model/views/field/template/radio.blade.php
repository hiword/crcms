<div class="form-group">
	<label class="Validform_label label-name">{{$form['label']}}</label>
	@if($form['attributes']['type'] === 'radio')
	<div>
		@foreach($form['options'] as $key=>$value)
		<label class="radio-inline">
			<input type="radio" name="{{$form['attributes']['name']}}" value="{{$key}}" /> {{$value}}
		</label>
		@endforeach
	</div>
	@elseif($form['attributes']['type'] === 'select')
	
	@endif
	<p class="help-block Validform_checktip">{{$form['tip']}}</p>
</div>
