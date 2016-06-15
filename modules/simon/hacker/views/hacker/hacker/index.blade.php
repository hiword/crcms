@extends('hacker::layout.layout')

@section('son-body')
<div class="container">
	<div class="row index mt30">
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-6">
			<ul class="list-group">
				@foreach($models as $model)
			  <li class="list-group-item">
			  	<a href="{{url('hacker/show/'.$model->id)}}" class="">({{$model->id}})&nbsp;<span class="set-red">{{$model->score}}分</span>&nbsp;{{$model->title}}</a>
			  	<span class="badge"><i class="glyphicon glyphicon-ok"></i></span>
			  </li>
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