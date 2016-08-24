Hello {{$user->name}}
<br />
点击链接 {{url('auth/verify-email/'.$user->id.'/'.$hash)}}
<br />\
{{time()}}