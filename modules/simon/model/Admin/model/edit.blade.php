@extends('manage.coding.layout.layout')

@section('h')
编辑模型
@stop

@section('body')
<div class="form">
{!! Form::open(['url' => "manage/model/".$data->id,'class'=>'valid-form','method'=>'put']) !!}
	{!!Form::hidden('id',$data->id)!!}
	{!!Form::hidden('_hash',$data->_hash)!!}
    @include('manage.coding.layout.form-container')
    
{!! Form::close() !!}
</div>
@stop

@section('script')
@include('manage.coding.model.js-controller')
@stop