@extends('kernel::layout.layout')

@include('kernel::default.style')

@section('body')

@include('kernel::default.header')


<div class="container">
    <div class="row mt20">

        <div class="col-md-3  radius">
            <div class=" white ">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Panel title</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{route('basic_information')}}">我的信息</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
        <!-- -->
        <div class="col-md-9">
            <div class="auth-box white radius">
                <h2 class="mb30">基本信息</h2>
                @include('kernel::layout.alert')
                <form action="{{route('basic_information')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>姓名</label>
                        <input type="text" class="form-control input-lg" value="{{$userInfo->real_name ?? null}}" name="real_name" placeholder="请填写您的真实姓名">
                    </div>
                    <div class="form-group">
                        <label>生日</label>
                        <input type="text" class="form-control input-lg" value="{{$userInfo->birthday ?? null}}" name="birthday" placeholder="如：1990-05-03">
                    </div>
                    <div class="form-group">
                        <label>站点</label>
                        <input type="text" class="form-control input-lg" value="{{$userInfo->website ?? null}}" name="website" placeholder="http:// or https://">
                    </div>
                    <div class="form-group">
                        <label>简介</label>
                        <textarea class="form-control input-lg" name="introduction" rows="2" placeholder="用一句简单的话描述自己吧！">{{$userInfo->introduction ?? null}}</textarea>
                    </div>
                    <div class="form-group mt30">
                        <button type="submit" class="btn btn-lg btn-success btn-block">修改基本信息</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('kernel::default.footer')
@endsection
