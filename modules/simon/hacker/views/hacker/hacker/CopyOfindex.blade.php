@extends('hacker::layout.layout')

@section('son-body')
<div class="container">
	<div class="row index mt30">
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-6">
			<ul class="list-group">
			<?php $i=1?>
				@foreach($models as $model)
			  <li class="list-group-item">
			  	<a href="{{url('hacker/show/'.$model->id)}}" class="">({{$i}})&nbsp;<span class="set-red">{{$model->score}}分</span>&nbsp;{{$model->title}}</a>
			  	@if($model->answer_status_code)
			  	<span class="badge"><i class="glyphicon glyphicon-{{$model->answer_status}}"></i></span>
			  	@endif
			  </li>
			  <?php $i+=1?>
			  @endforeach
			</ul>
			<div class="page">
				{{$page}}
			</div>
		</div>
		<div class="col-md-3">&nbsp;</div>
	</div>
</div>
@endsection