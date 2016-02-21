<form action="{{url('tags/store')}}" method="post" id="create-tags">
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	<div class="form-group">
		<input type="text" placeholder="标签名" value="{{$name or null}}" id="name" name="name" class="form-control" />
		<p class="help-block"></p>
	</div>
	<div class="form-group">
		<textarea name="content" placeholder="标签详述" class="form-control"></textarea>
		<p class="help-block"></p>
	</div>
</form>
