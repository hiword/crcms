@section('sidebar')
<h2 class="logo">Hacker</h2>
<div class="sidebar">
	<ul class="nav nav-pills nav-stacked">
	     <li id="accordion0" class="active">
			<a href="#collapse-ul-0" data-parent="#accordion0" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">HackerTest</a>
			<ul  id="collapse-ul-0" class="collapse in">
				<li><a href="{{url('manage/subject/index')}}">题目列表</a></li>
				<li><a href="{{url('manage/answer/index')}}">回答列表</a></li>
			</ul>
		</li>
	</ul>
</div>
@endsection