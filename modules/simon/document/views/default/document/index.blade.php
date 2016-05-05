<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="1PE0i9eNPdsddm46zItCZd3fR9myhlYWIYM1NRS-nCM"
    />
    <meta name="baidu-site-verification" content="1CfQmzzLcg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="业精于勤荒于嬉，行成于思毁于随">
    <meta name="keywords" content="Jekyll 智能硬件 电子diy laravel php">
    <link rel="shortcut icon" href="http://7xln77.com1.z0.glb.clouddn.com/coffeboy/blog/img/ico.jpg">
    <title>
      CRCMS - 致力于打造全面化的开源CMS
    </title>
    <link rel="canonical" href="">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{static_asset('vendor/default/css/bootstrap.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{static_asset('vendor/default/css/hux-blog.css')}}"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{static_asset('vendor/default/css/index.css')}}">
    <!-- Pygments Github CSS -->
    <link rel="stylesheet" href="{{static_asset('vendor/default/css/syntax.css')}}">
    <!-- Custom Fonts -->
    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css"> -->
    <!-- Hux change font-awesome CDN to qiniu -->
    <link href="http://cdn.staticfile.org/font-awesome/4.2.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <!-- Hux Delete, sad but pending in China <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic'
    rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/
    css'>
    -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
    queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://
    -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
      </script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
      </script>
    <![endif]-->
    <!-- ga & ba script hoook -->
    <script>
    </script>
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
                <a href="{{url('/')}}">
                  首页
                </a>
              </li>
              @category
              <li>
                <a href="{{url('/'.$category->id)}}">
                  {{$category->name}}
                </a>
              </li>
              @endcategory
              <li>
                <a href="{{url('/tags')}}">
                  标签
                </a>
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

      $toggle.addEventListener('click', handleMagic) function handleMagic(e) {
        if ($navbar.className.indexOf('in') > 0) {
          // CLOSE
          $navbar.className = " ";
          // wait until animation end.
          setTimeout(function() {
            // prevent frequently toggle
            if ($navbar.className.indexOf('in') < 0) {
              $collapse.style.height = "0px"
            }
          },
          400)
        } else {
          // OPEN
          $collapse.style.height = "auto"$navbar.className += " in";
        }
      }
    </script>
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
              <span class="subheading">
                致力于打造全面化的开源CMS
              </span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <!-- USE SIDEBAR -->
        <!-- Post Container -->
        <div class="col-lg-8 col-lg-offset-1col-md-8 col-md-offset-1col-sm-12col-xs-12post-container">
        	@document(app('request')->segment(1,0))
          <div class="post-preview">
            <a href="{{url('show/'.$document->id)}}">
              <h2 class="post-title">
                {{$document->title}}
              </h2>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/tianjin-shijizhong.jpg?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
              @if(isset($document->hasOneDocumentData))
              	{{mb_substr(strip_tags($document->hasOneDocumentData->content),0,mt_rand(100,200),'UTF-8')}}
              	@else
              	abdfdasfdsa
              	@endif
              </div>
            </a>
            <p class="post-meta">
              Posted by Admin on {{format_date($document->created_at)}}
            </p>
          </div>
          <hr>
          @enddocument
          <div class="post-preview">
            <a href="2016/03/19/osx-resources/">
              <h2 class="post-title">
                OSX资源汇总
              </h2>
              <h3 class="post-subtitle">
                汇集OSX常用命令
              </h3>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/apple-mac.jpg?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
                前言 OSX下的常用命令 kill特定进程 问题现象 解决办法 前言 osx系统的terminal无疑效率神器，但是从win转过来的自己对unix很多命令并不是很熟悉，仅以此blog记录自己不会但是比较常用的unix命令。
                环境：mac电脑osx系统 工...
              </div>
            </a>
            <p class="post-meta">
              Posted by Zebulon on March 19, 2016
            </p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="2016/02/29/hardware-design-keypoint/">
              <h2 class="post-title">
                电路设计心得
              </h2>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/pcb.jpg?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
                前言 成本节约篇 低功耗设计篇 系统效率篇 信号完整性篇 可靠性设计篇 前言 在电路设计中，可能会遇到很多的为什么，如，这里为什么会用一个这么大的电阻？电容为什么没有5uF？今天给大家分享一些电路设计的经验。
                成本节约篇 现象一：这些拉高/拉低的电阻用多大的阻值关系不大，就选个整数5K吧 点评...
              </div>
            </a>
            <p class="post-meta">
              Posted by Zebulon on February 29, 2016
            </p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="2016/01/28/proxy-on-aws/">
              <h2 class="post-title">
                Aws代理上网[2]
              </h2>
              <h3 class="post-subtitle">
                使用shadowsocks代理
              </h3>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/internet-1181586_1280.jpg?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
                前言 如何出轨 介绍 步骤 申请aws主机。 服务器设置 安装 配置 启动和停止服务 客户端连接 ...
              </div>
            </a>
            <p class="post-meta">
              Posted by Zebulon on January 28, 2016
            </p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="2016/01/26/ssh-tunnel-on-aws/">
              <h2 class="post-title">
                Aws代理上网[1]
              </h2>
              <h3 class="post-subtitle">
                使用ssh隧道
              </h3>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog%2Fpost-img%2Fwhite-legged-damselfly-darter.jpg?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
                前言 步骤 配置ssh客户端 配置浏览器 代理方式 配置浏览器 IE/Chrome Firefox 使用 ...
              </div>
            </a>
            <p class="post-meta">
              Posted by Zebulon on January 26, 2016
            </p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="2016/01/21/tool-of-create-blog/">
              <h2 class="post-title">
                写博客常用工具 @Jekyll
              </h2>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/template.png?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
                前言 编辑器 osX Win 其它 图床工具 创建模板 下篇预告 前言 Markdown 是一种简单的、轻量级的标记语法。用户可以使用简单的标记符号以最小的输入代价生成极富表现力的文档。
                Markdown具有很多优点： 排版简单，通过一些简单的标记字符，轻松完成页面排版。你不用花太多的时间在格式...
              </div>
            </a>
            <p class="post-meta">
              Posted by Zebulon on January 21, 2016
            </p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="2016/01/19/git-resources/">
              <h2 class="post-title">
                Git资源汇总
              </h2>
              <h3 class="post-subtitle">
                汇集git常用命令
              </h3>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog%2Fpost-img%2Fgirls.jpg?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
                前言 Git的基本操作 设置用户名和邮箱 Git命令帮助 常用命令 参考资源 前言 由于工作原因，之前一直用的是svn，由于某些原因接触了git，之后就深深地喜欢了git。目前git托管的网站也非常的多。譬如github、国内的coding、GitCafe;目前也是在慢慢熟悉git的一些功能，特此将自己常用的一些...
              </div>
            </a>
            <p class="post-meta">
              Posted by Zebulon on January 19, 2016
            </p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="2016/01/17/xbmc-on-raspberryPi/">
              <h2 class="post-title">
                XBMC on Raspberry Pi
              </h2>
              <h3 class="post-subtitle">
                在树莓派上体验XBMC
              </h3>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/xbmc-home.png?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
                介绍 注意事项： 器件清单： 介绍 这是很久以前写过的一个Blog，当时玩树莓派和openwrt路由。树莓派刷一个XBMC的系统。结合openwrt路由的bt下载。完成了以下功能：
                1、用XBMC视频插件在线看视频；主流视频网站如优酷、搜狐、腾讯等插件都能用。搜狐还带电视直播。另外百度云插件支持直接播放。现在很多视频资源都在百度云上了，如果有兴趣不妨收藏到自己的云盘，然...
              </div>
            </a>
            <p class="post-meta">
              Posted by Zebulon on January 17, 2016
            </p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="2016/01/15/config-jekyll-blog/">
              <h2 class="post-title">
                用Jekyll和GitHub搭建自己的Blog[2]
              </h2>
              <h3 class="post-subtitle">
                自己配置jekyll项目
              </h3>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog%2Fpost-img%2Fdamselfly.jpg?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
                配置jekyll jekyll目录结构 我的blog目录结构 我的配置文件 部署 部署到github 部署到自己的服务器 下篇预告 配置jekyll
                jekyll目录结构 用jekyll new projectname 一个项目时，默认的文件结构如官网 所示: ....
              </div>
            </a>
            <p class="post-meta">
              Posted by Zebulon on January 15, 2016
            </p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="2016/01/14/deploy-jekyll-blog/">
              <h2 class="post-title">
                用Jekyll和GitHub搭建自己的Blog[1]
              </h2>
              <h3 class="post-subtitle">
                初识Jekyll的运行环境
              </h3>
              <img src="http://7xq2ld.com1.z0.glb.clouddn.com/blog%2Fpost-img%2Fbookshelf.jpg?imageView2/1/w/800/h/200">
              <div class="post-content-preview">
                介绍 GitHub Pages Jekyll Why? 安装步骤 GitHub账号 本地环境 好的主题 修改配置 总结 下篇预告 介绍 GitHub
                Pages GitHub就不多说了，世界上最大也是最流行的代码托管仓库，GitHub官网...
              </div>
            </a>
            <p class="post-meta">
              Posted by Zebulon on January 14, 2016
            </p>
          </div>
          <hr>
          <!-- Pager -->
          <ul class="pager">
            <li class="next">
              <a href="page2">
                下一页&rarr;
              </a>
            </li>
          </ul>
        </div>
        <!-- Sidebar Container -->
        <div class="
        col-lg-3 col-lg-offset-0
        col-md-3 col-md-offset-0
        col-sm-12
        col-xs-12
        sidebar-container
        ">
          <!-- Featured Tags -->
          <section>
            <hr class="hidden-sm hidden-xs">
            <h5>
              <a href="">
                常用标签
              </a>
            </h5>
            <div class="tags">
              <a href="tags/#生活" title="生活" rel="1">
                生活
              </a>
              <a href="tags/#jekyll" title="jekyll" rel="3">
                jekyll
              </a>
              <a href="tags/#树莓派" title="树莓派" rel="1">
                树莓派
              </a>
              <a href="tags/#git" title="git" rel="1">
                git
              </a>
              <a href="tags/#科学上网" title="科学上网" rel="2">
                科学上网
              </a>
              <a href="tags/#电路" title="电路" rel="1">
                电路
              </a>
              <a href="tags/#OSX" title="OSX" rel="1">
                OSX
              </a>
              <a href="tags/#踏青" title="踏青" rel="1">
                踏青
              </a>
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
                  <a target="_blank" href="https://www.zhihu.com/people/zebulon.jiang">
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
                  <a target="_blank" href="http://weibo.com/jzb8736">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x">
                      </i>
                      <i class="fa fa-weibo fa-stack-1x fa-inverse">
                      </i>
                    </span>
                  </a>
                </li>
                <li>
                  <a target="_blank" href="https://github.com/Zebulonjiang">
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
              <a id="friend-tag" href="http://www.csoneplus.com/">
                中安亿嘉科技
              </a>
            </li>
            <li>
              <a id="friend-tag" href="http://micrortl.com/">
                MicroRTL
              </a>
            </li>
            <li>
              <a id="friend-tag" href="https://laravist.com">
                For Laravel Artist
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
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
                <a target="_blank" href="https://www.zhihu.com/people/zebulon.jiang">
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
                <a target="_blank" href="http://weibo.com/jzb8736">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x">
                    </i>
                    <i class="fa fa-weibo fa-stack-1x fa-inverse">
                    </i>
                  </span>
                </a>
              </li>
              <li>
                <a target="_blank" href="https://github.com/Zebulonjiang">
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
              Copyright &copy; Zebulon 2016| Powered by
              <a href="http://jekyllrb.com">
                Jekyll
              </a>
              |
              <script type="text/javascript">
                var cnzz_protocol = (("https:" == document.location.protocol) ? " https://": " http://");
                document.write(unescape("%3Cspan id='cnzz_stat_icon_1257159415'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1257159415%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
              </script>
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
          $(this).attr('target', '_blank');
        });
      }
      //每次在有DOM插入时触发
      $(document).bind('DOMNodeInserted',
      function(event) {
        addBlankTargetForLinks();
      });
    </script>
  </body>

</html>