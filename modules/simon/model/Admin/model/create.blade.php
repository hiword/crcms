@extends('manage.coding.layout.layout')

@section('h')
新增模型
@stop

@section('body')
<div class="form">
{!! Form::open(['url' => 'manage/model','class'=>'valid-form','method'=>'post']) !!}

    @include('manage.coding.layout.form-container')
    
{!! Form::close() !!}
</div>
@stop

@section('script')
@include('manage.coding.model.js-controller')
@stop