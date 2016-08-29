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
                <h2 class="mb30">修改密码</h2>
                @include('kernel::layout.alert')
                <form action="{{route('update-password')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>原密码</label>
                        <input type="password" class="form-control input-lg" value="" name="old_password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>新密码</label>
                        <input type="password" class="form-control input-lg" value="" name="password" placeholder="">
                    </div>
                    <div class="form-group mt30">
                        <button type="submit" class="btn btn-lg btn-success btn-block">修改密码</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('kernel::default.footer')
@endsection
