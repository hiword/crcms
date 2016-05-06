@extends('document::default.document-layout')
    @section('body')
    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('http://7xln77.com1.z0.glb.clouddn.com/coffeboy/blog/img/waterfall-1081997_1920.jpg?imageView2/1/w/1920/h/500')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 ">
            <div class="site-heading">
              <h1>
                CRCMS
              </h1>
              <!--<hr class="small">-->
              <span class="subheading">致力于打造全面化的开源CMS</span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- main -->
    <div class="container">
      <div class="row">
        <!-- USE SIDEBAR -->
        <!-- Post Container -->
        <div class="col-lg-8 col-lg-offset-1col-md-8 col-md-offset-1col-sm-12col-xs-12 post-container">
        	@document(app('request')->segment(1,0))
        	
	          <div class="post-preview">
	            <a href="{{url('show/'.$document->id)}}">
	              <h2 class="post-title">
	                {{$document->title}}
	              </h2>
	              @if($document->thumbnail)
	              <img src="{{img_url($document->thumbnail,'img_1')}}">
	              @endif
	              <div class="post-content-preview">
	              	@if(!empty($document->hasOneDocumentData->content))
	              	{{mb_substr(str_replace(["\r\n","\n"],"",strip_tags($document->hasOneDocumentData->content)),0,mt_rand(100,200),'UTF-8')}}
	              	@endif
	              </div>
	            </a>
	            <p class="post-meta">
	              Posted by Admin on {{format_date($document->created_at)}}
	            </p>
	          </div>
          	<hr>
	          @enddocument
	          <!-- Pager -->
	          {{$page}}
        </div>
        <!-- Sidebar Container -->
        <div class="col-lg-3 col-lg-offset-0 col-md-3 col-md-offset-0 col-sm-12 col-xs-12 sidebar-container">
          <!-- Featured Tags -->
          <section>
            <hr class="hidden-sm hidden-xs">
            <h5>
              <a href="">常用标签</a>
            </h5>
            <div class="tags">
            @tag
            <a href="{{url('tags/search')}}?name={{$tag->name}}" title="{{$tag->name}}" rel="1">{{$tag->name}}</a>
            @endtag
            </div>
          </section>
          <!-- Short About -->
          <section class="visible-md visible-lg">
            <hr>
            <h5>
              <a href="">
                关于
              </a>
            </h5>
            <div class="short-about">
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog/img/avatar2.png"
              />
              <p>
                做一个自由的人、潇洒地周游世界
                <br>
                不会PHP的前端程序猿不是好硬件工程师
              </p>
              <!-- SNS Link -->
              <ul class="list-inline">
                <li>
                  <a  href="https://www.zhihu.com/people/zebulon.jiang">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x">
                      </i>
                      <i class="fa  fa-stack-1x fa-inverse">
                        知
                      </i>
                    </span>
                  </a>
                </li>
                <li>
                  <a  href="http://weibo.com/jzb8736">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x">
                      </i>
                      <i class="fa fa-weibo fa-stack-1x fa-inverse">
                      </i>
                    </span>
                  </a>
                </li>
                <li>
                  <a  href="https://github.com/Zebulonjiang">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x">
                      </i>
                      <i class="fa fa-github fa-stack-1x fa-inverse">
                      </i>
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </section>
          <!-- Friends Blog -->
          <hr>
          <h5>
            友情链接
          </h5>
          <ul class="list-inline">
            <li>
              <a id="friend-tag" href="http://crcms.cn/">
                crcms
              </a>
            </li>
          </ul>
        </div>
      </div>
     </div>
@endsection