<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name="description" content="<?php echo ($description); ?>">
    <meta name="keywords" content="<?php echo ($keywords); ?>">
    <meta name="author" content="<?php echo ($author); ?>">
    <link rel="shortcut icon" href="<?php echo ($webpath); ?>favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo ($tplpath); ?>css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo ($tplpath); ?>css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo ($tplpath); ?>css/my.css" rel="stylesheet">

    <!--your head-->
    <title><?php echo ($webtitle); ?></title>
    
  </head>
  <body>
    
  <!--首页导航条 yanhl , modified wulang-->
  <div class="index_header navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a title="<?php echo ($webname); ?>" href="<?php echo ($webpath); ?>"  class="brand"><?php echo ($webname); ?></a>
        <div class="nav-collapse collapse">
          <div class="pull-left">
            <ul class="nav">
              <li id="menu0" class="active"><a href="<?php echo ($webpath); ?>" title="首页">首页</a></li>
              <?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($menu["showurl"]); ?>"><?php echo ($menu["cname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
              <li><a href="<?php echo ($specialurl); ?>"  title="专题">专题</a></li>
              <li><a href="<?php echo ($topurl); ?>"  title="排行">排行</a></li>
            </ul>
          </div>
          <div class="pull-right">
            <form class="navbar-search form-search" id="search" action="<?php echo ($webpath); ?>index.php?s=video/search" method="post">
              <div class="input-append">
                <input class="search-query" name="keyword" placeholder="search" type="text" style="width:120px;">
                <input type="hidden" name="currentroot.id" value="">
                <button class="btn btn-inverse" type="button" onclick="javascript:window.location='searchresult.html'"><li class="icon-search icon-white"></li></button>
              </div>
            </form>
            <!--Login need to change to js!-->
            <ul class="nav" style="margin-left:30px;">
              <li><a href="#"><i class="icon-user icon-white" style="margin-top:4px;"></i>登录</a></li>
              <li><a href="#">注册</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <!-- 幻灯 -->
  <div  id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel"  data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel"  data-slide-to="1"></li>
      <li data-target="#myCarousel"  data-slide-to="2"></li>
      <li data-target="#myCarousel"  data-slide-to="3"></li>
      <li data-target="#myCarousel"  data-slide-to="4"></li>
      <li data-target="#myCarousel"  data-slide-to="5"></li>
      <li data-target="#myCarousel"  data-slide-to="6"></li>
      <li data-target="#myCarousel"  data-slide-to="7"></li>
    </ol>
    <div class="carousel-inner">

      <?php $tag['name'] = 'slide';$tag['limit'] = '8';$tag['order'] = 'oid desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide): ++$i;$mod = ($i % 2 );?><?php if(($i)  ==  "1"): ?><div class="item  active">
          <?php else: ?><div class="item"><?php endif; ?>
          <a target="_blank" href="<?php echo ($slide["link"]); ?>" title="<?php echo ($slide["title"]); ?>">
            <img src="<?php echo ($slide["picurl"]); ?>" class="loading">
            <div class="mycarousel-caption">
              <h3><?php echo ($slide["title"]); ?></h3>
              <p><?php echo (get_replace_html($slide["content"],0,80)); ?></p>
            </div>
          </a>
        </div><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>

    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
  </div>
  
 
  <!--Popular-->
  <div class="container index_thumbnails">
    <h3>Popular Shows
      <div class="btn-group pull-right">
        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Popular This Week<span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">Popular Today</a></li>
          <li><a href="#">Popular This Week</a></li>
          <li><a href="#">Popular This Month</a></li>
          <li><a href="#">Popular All Time</a></li>
        </ul>
      </div>
    </h3>  

    <ul class="thumbnails">
      <?php $tag['name'] = 'video';$tag['limit'] = '6';$tag['order'] = 'weekhits desc,stars desc,addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li class="span2">
          <a target="_blank" href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="thumbnail">
            <img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading" />
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
    </ul>
  </div>

  <!--Latest-->
  <div class="container index_thumbnails">
    <h3>Latest Shows
      <span class="pull-right">今日更新 [<?php echo get_channel_count(0);?>] 部</span>
    </h3>  
    <ul class="thumbnails"> 
      <?php $tag['name'] = 'video';$tag['limit'] = '6';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li class="span2">
          <a target="_blank" href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="thumbnail">
            <img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading" />
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
    </ul>
  </div>

  <!--Movie-->
  <div class="container index_thumbnails">
    <h3>Movies
      <ul class="nav nav-pills pull-right">
        <li><a href="<?php echo ($webpath); ?>?s=video/lists/id/8.html"  title="动作">动作</a></li>
        <li><a href="<?php echo ($webpath); ?>?s=video/lists/id/9.html"  title="喜剧">喜剧</a></li>
        <li><a href="<?php echo ($webpath); ?>?s=video/lists/id/10.html" title="爱情">爱情</a></li>
        <li><a href="<?php echo ($webpath); ?>?s=video/lists/id/11.html" title="科幻">科幻</a></li>
        <li><a href="<?php echo ($webpath); ?>?s=video/lists/id/12.html" title="剧情">剧情</a></li>
        <li><a href="<?php echo ($webpath); ?>?s=video/lists/id/13.html" title="恐怖">恐怖</a></li>
        <li><a href="<?php echo ($webpath); ?>?s=video/lists/id/14.html" title="战争">战争</a></li>
        <li><a href="<?php echo ($webpath); ?>?s=video/lists/id/1.html"  title="More">More...</a></li>
      </ul>
    </h3>  
    <ul class="thumbnails"> 
      <?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '6';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li class="span2">
          <a target="_blank" href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="thumbnail">
            <img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading" />
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
    </ul>
  </div>

  <!--Anime-->
  <div class="container index_thumbnails">
    <h3>Anime
      <ul class="nav nav-pills pull-right">
        <li><a target="_blank" href="<?php echo ($webpath); ?>?s=video/lists/id/3.html" title="More">More...</a></li>
      </ul>
    </h3>  
    <ul class="thumbnails"> 
      <?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '6';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li class="span2">
          <a target="_blank" href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="thumbnail">
            <img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading" />
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
    </ul>
  </div>

  <!--Documentary-->
  <div class="container index_thumbnails">
    <h3>Documentaries
      <ul class="nav nav-pills pull-right">
        <li><a target="_blank" href="<?php echo ($webpath); ?>?s=video/lists/id/6.html" title="More">More...</a></li>
      </ul>
    </h3>  
    <ul class="thumbnails"> 
      <?php $tag['name'] = 'video';$tag['cid'] = '6';$tag['limit'] = '6';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li class="span2">
          <a target="_blank" href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="thumbnail">
            <img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading" />
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
    </ul>
  </div>

  <!--Campus-->
  <div class="container index_thumbnails">
    <h3>Campuses
      <ul class="nav nav-pills pull-right">
        <li><a target="_blank" href="<?php echo ($webpath); ?>?s=video/lists/id/5.html" title="More">More...</a></li>
      </ul>
    </h3>  
    <ul class="thumbnails"> 
      <?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '6';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li class="span2">
          <a target="_blank" href="<?php echo ($video["readurl"]); ?>" title="<?php echo ($video["title"]); ?>" class="thumbnail">
            <img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading" />
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
    </ul>
  </div>


  <!--footer-->
  <div class="footer well">
    <div class="container">
      <p class="text-center">Copyright © 2011-2013<a href="<?php echo ($webpath); ?>"> 532Movie</a> All Rights Reserved.</p>
      <p class="text-center">Anything About The Problems, Please Contact Us: <a href="mailto:wulang@mail.bnu.edu.cn">BNU532</a>
      </p>
    </div>
  </div>






    <script src="<?php echo ($tplpath); ?>js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo ($tplpath); ?>js/bootstrap.min.js"></script>
  </body>
</html>