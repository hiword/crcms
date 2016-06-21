@extends('killBox::layout')

@section('body')
<div class="killbox-header">
	<nav class="navbar navbar-default killbox-nav">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">中新网安</a>
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">分析 <span class="sr-only">(current)</span></a></li>
	        <!-- 
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li> -->
	      </ul>
	      <!-- 
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form> -->
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success">
				杀盒简介
			</div>
		</div>
		<div class="col-md-12 col-xs-12">
			<div class="box-1 text-center">
				<button class="btn btn-primary btn-lg">
					<i class="glyphicon glyphicon-cloud-upload"></i>
					点击上传文件
				</button>
			</div>
		</div>
		<div class="col-md-12 col-xs-12 mt20">
			<ul id="myTabs" class="nav killbox-tabs nav-tabs" role="tablist">
				<li class="active" role="presentation">
					<a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" href="#home">检测结果</a>
				</li>
				<li class="" role="presentation">
					<a aria-controls="profile" data-toggle="tab" role="tab" href="#profile" aria-expanded="false">静态信息</a>
				</li>
				<li class="" role="presentation">
					<a aria-controls="profile" data-toggle="tab" role="tab" href="#profile" aria-expanded="false">行为分析</a>
				</li>
			</ul>
			<div class="box-1 tabs-content killbox-tab-contents">
				<div id="home" class="tab-pane fade active in" aria-labelledby="home-tab" role="tabpanel">
					<table class="table table-striped">
						<tr>
							<th>反病毒软件</th>
							<th>结果</th>
							<th class="text-right">病毒库日期</th>
						</tr>
						<tr>
							<td>百度国际版（Baidu-International）</td>
							<td class="text-danger">HackTool.Win32.Agent.45</td>
							<td class="text-right">2015-12-02</td>
							</tr>
							<tr>
							<td>IKARUS</td>
							<td>
							<img class="res-ok" src="/static/img/res_ok.png">
							</td>
							<td class="text-right">2015-12-02</td>
							</tr>
					</table>
				</div>
				<div id="profile" class="tab-pane fade" aria-labelledby="profile-tab" role="tabpanel">
					<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="footer mt30 container-fluid">
	<div class="footer-block ">
		<div class="copyright">
			Copyright © 2016 www.cnzxsoft.com All Rights Reserved！
			<a href="http://www.cnzxsoft.com/index.html" target="_blank">中新网安</a>
	  		皖ICP备1234567号-2
		</div>
	</div>
</div>
@endsection


