@extends('layout.manage-layout')
@section('body')
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-2">
			<h2>CRCMS</h2>
			<div class="sidebar">
				<ul class="nav nav-pills nav-stacked">
					<li id="accordion1" class="active">
						<a href="#collapse-ul-1" data-parent="#accordion1" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">文档</a>
						<ul  id="collapse-ul-1" class="collapse in">
							<li><a href="{{url('manage/document/index')}}">文档列表</a></li>
							<li><a href="{{url('manage/category/index')}}">文档分类</a></li>
						</ul>
					</li>
					<li id="accordion2">
						<a href="#collapse-ul-2" data-parent="#accordion3" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">BBBBB</a>
						<ul  id="collapse-ul-2" class="collapse in">
							<li><a href="###">BBBBBB</a></li>
							<li><a href="###">CCCCCC</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-xs-10">10</div>
	</div>
</div>
@endsection