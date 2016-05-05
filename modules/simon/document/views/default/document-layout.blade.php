<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="crcms,php,laravel,开源cms,crcms模板">
    <meta name="description" content="crcms官方网站,crcms一直致力于打造全面化的开源CMS系统,crcms官网还提供大量的PHP教程和实例以及众多PHP开源CMS和CMS模板,还有CMS模块插件">
    <title>CRCMS - 致力于打造全面化的开源CMS</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{static_asset('vendor/default/css/bootstrap.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{static_asset('vendor/default/css/hux-blog.css')}}"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{static_asset('vendor/default/css/index.css')}}">
    <!-- Pygments Github CSS -->
    <link rel="stylesheet" href="{{static_asset('vendor/default/css/syntax.css')}}">
    <!-- Custom Fonts -->
    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <!-- Hux change font-awesome CDN to qiniu -->
    <link href="http://cdn.staticfile.org/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Hux Delete, sad but pending in China
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/
    css'>
    -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- ga & ba script hoook -->
    @yield('style')
  </head>
  <!-- hack iOS CSS :active style -->
  
  <body ontouchstart="">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle">
            <span class="sr-only">
              Toggle navigation
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </button>
          <a class="navbar-brand" href="">
            CRCMS
          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- Known Issue, found by Hux: <nav>'s height woule be hold on by its content.
        so, when navbar scale out, the <nav> will cover tags.
        also mask any touch event of tags, unfortunately.
        -->
        <div id="huxblog_navbar">
          <div class="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="{{url('/')}}">首页</a>
              </li>
              @category
              <li>
                <a href="{{url('/'.$category->id)}}">
                  {{$category->name}}
                </a>
              </li>
              @endcategory
              <li>
                <a href="{{url('/tags')}}">标签</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
    <script>
      // Drop Bootstarp low-performance Navbar
      // Use customize navbar with high-quality material design animation
      // in high-perf jank-free CSS3 implementation
      var $body = document.body;
      var $toggle = document.querySelector('.navbar-toggle');
      var $navbar = document.querySelector('#huxblog_navbar');
      var $collapse = document.querySelector('.navbar-collapse');

      $toggle.addEventListener('click', handleMagic);
      function handleMagic(e){
          if ($navbar.className.indexOf('in') > 0) {
          // CLOSE
              $navbar.className = " ";
              // wait until animation end.
              setTimeout(function(){
                  // prevent frequently toggle
                  if($navbar.className.indexOf('in') < 0) {
                      $collapse.style.height = "0px"
                  }
              },400)
          }else{
          // OPEN
              $collapse.style.height = "auto"
              $navbar.className += " in";
          }
      }
    </script>
    
    <!-- Main Content -->
    @yield('body')
    <div id="top" data-toggle="tooltip" data-placement="left" title="回到顶部">
      <a href="javascript:;">
        <div class="arrow">
        </div>
        <div class="stick">
        </div>
      </a>
    </div>
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <ul class="list-inline text-center">
              <!-- add Weibo, Zhihu by Hux, add target=" _blank" to <a> by Hux -->
              <li>
                <a  href="###">
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
                <a  href="###">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x">
                    </i>
                    <i class="fa fa-weibo fa-stack-1x fa-inverse">
                    </i>
                  </span>
                </a>
              </li>
              <li>
                <a  href="https://github.com/hiword">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x">
                    </i>
                    <i class="fa fa-github fa-stack-1x fa-inverse">
                    </i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">
            	版权所有，保留一切权利！ Copyright © 2013-2016 CRCMS-v2.1强力驱动 皖ICP备12004017号-2
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery -->
    <script src="{{static_asset('vendor/default/js/jquery.min.js')}} ">
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{static_asset('vendor/default/js/bootstrap.min.js')}} ">
    </script>
    <!-- Custom Theme JavaScript -->
    <script src="{{static_asset('vendor/default/js/hux-blog.js')}} ">
    </script>
    <!-- Custom Theme JavaScript -->
    <script src="{{static_asset('vendor/default/js/index.js')}} ">
    </script>
    <!-- async load function -->
    <script>
      function async(u, c) {
        var d = document,
        t = 'script',
        o = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
        o.src = u;
        if (c) {
          o.addEventListener('load',
          function(e) {
            c(null, e);
          },
          false);
        }
        s.parentNode.insertBefore(o, s);
      }
    </script>
    <!-- Highlight.js -->
    <script>
      async("http://cdn.bootcss.com/highlight.js/8.6/highlight.min.js",
      function() {
        hljs.initHighlightingOnLoad();
      })
      // only load tagcloud.js in tag.html
      if ($('#tag_cloud').length !== 0) {
        async("js/jquery.tagcloud.js",
        function() {
          $.fn.tagcloud.defaults = {
            //size: {start: 1, end: 1, unit: 'em'},
            color: {
              start: '#bbbbee',
              end: '#0085a1'
            },
          };
          $('#tag_cloud a').tagcloud();
        })
      }
    </script>
    <link href="http://cdn.bootcss.com/highlight.js/8.6/styles/github.min.css"
    rel="stylesheet">
    <!--fastClick.js -->
    <script>
      async("http://cdn.bootcss.com/fastclick/1.0.6/fastclick.min.js",
      function() {
        var $nav = document.querySelector("nav");
        if ($nav) FastClick.attach($nav);
      })
    </script>
    <!-- Google Analytics -->
    <!-- Baidu Tongji -->
    <!-- Migrate from head to bottom, no longer block render and still work
    -->
    <!-- 在新窗口中打开 -->
    <script type="text/javascript">
      function addBlankTargetForLinks() {
        $('a[href^="http"]').each(function() {
          //$(this).attr('target', '_blank');
        });
      }
      //每次在有DOM插入时触发
      $(document).bind('DOMNodeInserted',
      function(event) {
        addBlankTargetForLinks();
      });
    </script>
    @yield('script')
  </body>

</html>