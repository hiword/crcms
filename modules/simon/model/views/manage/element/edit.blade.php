@extends('layout.manage-layout')
@section('list-header')
<h3>
	新增字段
	<a class="btn btn-sm btn-default" href="{{url('manage/field/index')}}">列表</a>
</h3>
@endsection
@section('main')
<form action="{{url('manage/element/update/'.$id)}}" method="post" class="valid-form">
<input type="hidden" name="id" value="{{$id}}" />
<input type="hidden" name="_method" value="put" />
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<input type="hidden" name="model_id" value="{{$model_id}}" />
@foreach($append_model_ids as $extendId)
<input type="hidden" name="extend_id[]" value="{{$extendId}}" />
@endforeach
<div class="row">
	<div class="col-md-9">
		@foreach($forms as $form)
		{!!$form!!}
		@endforeach
		<div class="form-group btn-action">
      		<button class="btn btn-default mr10" type="button">重置</button>
      		<button class="btn btn-success " type="submit">提交</button>
      	</div>
	</div>
	<div class="col-md-3">
	</div>
</div>
</form>

@endsection
@section('script')
@parent
<script>
</script>
@endsection