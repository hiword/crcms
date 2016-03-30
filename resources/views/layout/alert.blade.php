@if((boolean)$_msg = session('app_message'))
<div class="alert {{count($errors)>0 ? 'alert-danger' : 'alert-success'}}">错误码：{{session('app_code')}}，错误信息：{{$_msg}}</div>
@endif
