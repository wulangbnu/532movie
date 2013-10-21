<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($webtitle); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<link rel="shortcut icon" href="<?php echo ($webpath); ?>favicon.png" />
<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>top.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>index.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>all.css" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>views/css/system.css'>

<script type="text/javascript" src="<?php echo ($tplpath); ?>core.js"></script>
<style type="text/css">
<!--
.STYLE2 {font-family: "微软雅黑"}
.left li{float:left;width:140px;margin-left:3px;line-height:30px;}
-->
</style>

</head>
<body>
<script language="JavaScript" type="text/javascript" src="<?php echo ($tplpath); ?>template.js"></script>
<style type="text/css">
<!--
.STYLE1 {
	color: #000000;
	font-weight: bold;
}
.STYLE2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<div class="Header">
<div class="Atop">
    <a title="<?php echo ($webname); ?>" class="logo_a" href="<?php echo ($webpath); ?>"><img alt="<?php echo ($webname); ?>" src="<?php echo ($tplpath); ?>image/logo.png"></a>
	<div class="topnavbox">
		<div class="topdown">
			<div class="topTXT">
			<form action="<?php echo ($webpath); ?>index.php?s=video/search" method="post" name="search" id="search" >
				<input type="text" class="inputText" id="wd" name="wd" value="请输入电影或演员名!-----未搜到影片请点后面的求片!" onclick="this.value = ''" maxLength="26" />
				<input type="submit" class="inputBtn"  value="" />
			  </form>
			</div>
			<p><?php echo ($hotkey); ?></p>
		</div>
		<div class="topup">
			<div id="agkjl">
			  <p align="center">
			  <div id="ckepop">
			    <p><a href="?s=guestbook/lists.html" class="STYLE2">求片</a>&nbsp;|&nbsp;<a href="javascript:void(0)" id="fav">收藏本站</a></p>
			  </div>
		  </div>
		</div>
	</div>

</div>
</div>
<div class="navbar"> <div class="Boxmenu">
	<div class="Anav">
        <div class="AnavL w">
            <a href="<?php echo ($webpath); ?>" title="<?php echo ($webname); ?>">首 页</a>
			 <?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><a href="<?php echo ($menu["showurl"]); ?>"><?php echo ($menu["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
			 <a href="<?php echo ($specialurl); ?>" >专题</a>
			 <a href="<?php echo ($topurl); ?>" >排行</a>
      </div>
        <div class="AnavR w1">
            <div class="AnavRl">
                <?php if(C('user_register') == 1): ?><div id="Login"></div><?php endif; ?>
            </div>
        </div>
	</div>	
</div>
</div>

<!-- flash幻灯开始 -->

<div class="Boxflash">
  <div class="Aflash">
    <ul class="picUL">
      <li class="picLI" id="j-focusPic">
        <div class="picbox j-slider">
		<?php $tag['name'] = 'slide';$tag['limit'] = '8';$tag['order'] = 'oid desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide): ++$i;$mod = ($i % 2 );?><span class="j-item"><a target="_blank" href="<?php echo ($slide["link"]); ?>" title="<?php echo ($slide["title"]); ?>"><img alt="<?php echo ($slide["title"]); ?>" width="970" src="<?php echo ($slide["picurl"]); ?>"></a></span><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</div>
        <div class="bg j-infobg"></div>
        <div class="info j-info"></div>
        <div class="info j-infocontainer" style="display:none;">
		<?php $tag['name'] = 'slide';$tag['limit'] = '8';$tag['order'] = 'oid desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide): ++$i;$mod = ($i % 2 );?><div class="infotxt w"><h2><a target="_blank" href="<?php echo ($slide["link"]); ?>" title="<?php echo ($slide["title"]); ?>"><?php echo ($slide["title"]); ?></a></h2><p><a target="_blank" href="<?php echo ($slide["link"]); ?>" title="<?php echo ($slide["title"]); ?>"><?php echo (get_replace_html($slide["content"],0,80)); ?></a></p></div><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</div>
      </li>
    </ul>
    <div class="infobtn" id="j-focusBtns">
      <div class="smalpic j-container">
        <div class="smallbox j-slider">
            <a class="j-item">1</a><a class="j-item">2</a><a class="j-item">3</a><a class="j-item">4</a><a class="j-item">5</a><a class="j-item">6</a><a class="j-item">7</a><a class="j-item">8</a>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- flash幻灯结束,热门开始 -->
<div class="DoboShow">
  <div class="title">
      <h2 class="H201"></h2>
      	<div class="fr" style="color: #992A2C">本站共收录影片总数 [<?php echo get_channel_count(-1);?>] 部 今天更新 [<?php echo get_channel_count(0);?>] 部</div>
  </div>
 


  <div class="list">
	<?php $tag['name'] = 'video';$tag['limit'] = '28';$tag['order'] = 'weekhits desc,stars desc,addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "8"): ?><dl class="w128"><dt><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading"></a></dt><dd><p class="p1"><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a></p><p class="p2"></p></dd></dl>
				  <?php else: ?>
				<dl class="w128"><dd><p class="p1 left"><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>">·<?php echo (get_replace_html($video["title"],0,8)); ?></a></p></dd></dl></eq><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
				</div>

</div>

<!-- 热门结束,最近更新开始 -->
<div class="DoboShow">
	<div class="title">
		<h2 class="H212">最新</h2>
		<div class="fr"></div>
    </div>

    <div class="list">
	 <?php $tag['name'] = 'video';$tag['limit'] = '28';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><?php if(($i)  <  "8"): ?><dl class="w128"><dt><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading"></a></dt><dd><p class="p1"><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a></p><p class="p2"></p></dd></dl>
				  <?php else: ?>
				<dl class="w128"><dd><p class="p1 left"><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>">·<?php echo (get_replace_html($video["title"],0,8)); ?></a></p></dd></dl></eq><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
				</div>
</div>



<!--电影-->
<div class="Movie">
  <div class="left">
    <div class="title">
	
	<h2 class="H204">
		<span><a href="<?php echo ($webpath); ?>?s=video/lists/id/8.html" >动作片</a> | <a href="<?php echo ($webpath); ?>?s=video/lists/id/9.html" >喜剧片</a> | <a href="<?php echo ($webpath); ?>?s=video/lists/id/10.html" >爱情片</a> | <a href="<?php echo ($webpath); ?>?s=video/lists/id/11.html" >科幻片</a> | <a href="<?php echo ($webpath); ?>?s=video/lists/id/12.html" >剧情片</a> | <a href="<?php echo ($webpath); ?>?s=video/lists/id/13.html" >恐怖片</a> | <a href="<?php echo ($webpath); ?>?s=video/lists/id/14.html" >战争片</a> | <a target="_blank" href="<?php echo ($webpath); ?>?s=video/lists/id/1.html" title="更多&gt;&gt;">更多&gt;&gt;</a></span></h2>
    </div>
    <div class="viscera">
      <div class="LiInfo">
        <div class="list">
		 <?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['stars'] = '5';$tag['limit'] = '1';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w210">
                     <dt><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading"></a></dt>
			</dl>
			<div class="ind">
            <h6><?php echo (get_replace_html($video["title"],0,7)); ?></h6>
            <p class="p1">
			<?php echo (get_replace_html($video["content"],0,40,'utf-8',true)); ?>...</p>
			<h6>导演</h6>
            <p class="p1"><?php echo ($video["director"]); ?></p>
            <h6>主演</h6>
            <p class="p1"><?php echo ($video["actor"]); ?></p>
            <h6>影片人气：<strong style="color:#ff0000"><?php echo ($video["hits"]); ?>℃</strong></h6>
          </div><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
        </div>
      </div>
      <div class="texInfo">
        <div class="list">
		 <?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '6';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dt><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading"></a></dt><dd><p class="p1"><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a></p><p class="p2"></p></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
		</div>
        <div class="list">
		<?php $tag['name'] = 'video';$tag['cid'] = '1';$tag['limit'] = '7,9';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dd><em><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>">·<?php echo (get_replace_html($video["title"],0,8)); ?></a></em></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 		
		</div>
      </div>
    </div>
  </div>
  <div class="right">
    
    <div class="rank" id="j-rankmovie">
      <h4><span><a class="active" href="javascript:void(0);">周</a> <a href="javascript:void(0);">月</a> <a href="javascript:void(0);">总</a></span><em class="e06"><a  target="_blank" title="电影排行">电影排行</a></em></h4>
       <ol class="active">
	    <?php $tag['name'] = 'video';$tag['limit'] = '20';$tag['cid'] = '1';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["weekhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '20';$tag['cid'] = '1';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["monthhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					  </ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '20';$tag['cid'] = '1';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["hits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					 </ol>
    </div>
  </div>
</div>


<!-- 没有电视剧 -->

<!-- 动漫 -->
<div class="Comic">
  <div class="left">
    <div class="title">
       <h2 class="H205">
	   <span><a target="_blank" href="<?php echo ($webpath); ?>?s=video/lists/id/3.html" title="更多&gt;&gt;">更多&gt;&gt;</a></span></h2>
    </div>
    <div class="viscera">
      <div class="texInfos">
        <div class="list">
		<?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dt><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading"></a></dt><dd><p class="p1"><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a></p><p class="p2"></p></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
		</div>
        <div class="list">
		<?php $tag['name'] = 'video';$tag['cid'] = '3';$tag['limit'] = '11,10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dd><em><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>">·<?php echo (get_replace_html($video["title"],0,8)); ?></a></em></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
		</div>
      </div>
    </div>
  </div>
  <div class="right">
    
	
    <div class="rank" id="j-rankcomic">
      <h4><span><a class="active" href="javascript:void(0);">周</a> <a href="javascript:void(0);">月</a> <a href="javascript:void(0);">总</a></span><em class="e07"><a  target="_blank" title="动漫排行">动漫排行</a></em></h4>
      <ol class="active">
	    <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '3';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["weekhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '3';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["monthhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					  </ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '3';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["hits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					 </ol>
    </div>
  </div>
</div>
<!-- 综艺 -->
<div class="variety">
  <div class="left">
    <div class="title">
      <h2 class="H206"><span><a target="_blank" href="<?php echo ($webpath); ?>?s=video/lists/id/4.html" title="更多&gt;&gt;">更多&gt;&gt;</a></span></h2>
    </div>
    <div class="viscera">
      <div class="texInfos">
        <div class="list">
		<?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dt><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading"></a></dt><dd><p class="p1"><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a></p><p class="p2"></p></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
					 </div>
        <div class="list">
		<?php $tag['name'] = 'video';$tag['cid'] = '4';$tag['limit'] = '11,10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dd><em><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>">·<?php echo (get_replace_html($video["title"],0,8)); ?></a></em></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
		 </div>
      </div>
    </div>
  </div>
  <div class="right">
   
    <div class="rank" id="j-rankzongyi">
      <h4><span><a class="active" href="javascript:void(0);">周</a> <a href="javascript:void(0);">月</a> <a href="javascript:void(0);">总</a></span><em class="e09"><a  target="_blank" title="综艺排行">综艺排行</a></em></h4>
      <ol class="active">
	    <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '4';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["weekhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '4';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["monthhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					  </ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '4';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["hits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					 </ol>
    </div>
  </div>
</div>
<!-- 综艺结束 -->


<!--体育-->
<div class="variety">
  <div class="left">
    <div class="title">
      <h2 class="H211"><span><a target="_blank" href="<?php echo ($webpath); ?>?s=video/lists/id/5.html" title="更多&gt;&gt;">更多&gt;&gt;</a></span></h2>
    </div>
    <div class="viscera">
      <div class="texInfos">
        <div class="list">
		<?php $tag['name'] = 'video';$tag['cid'] = '5';$tag['limit'] = '10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dt><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading"></a></dt><dd><p class="p1"><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a></p><p class="p2"></p></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
					 </div>
        <div class="list">
		<?php $tag['name'] = 'video';$tag['cid'] = '5';$tag['limit'] = '11,10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dd><em><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>">·<?php echo (get_replace_html($video["title"],0,8)); ?></a></em></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
		 </div>
      </div>
    </div>
  </div>
  <div class="right">
   
    <div class="rank" id="j-ranksport">
      <h4><span><a class="active" href="javascript:void(0);">周</a> <a href="javascript:void(0);">月</a> <a href="javascript:void(0);">总</a></span><em class="e11"><a  target="_blank" title="体育排行">体育排行</a></em></h4>
      <ol class="active">
	    <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '5';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["weekhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '5';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["monthhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					  </ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '5';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["hits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					 </ol>
    </div>
  </div>
</div>
<!--体育结束-->

<!--纪录片-->
<div class="variety">
  <div class="left">
    <div class="title">
      <h2 class="H208"><span><a target="_blank" href="<?php echo ($webpath); ?>?s=video/lists/id/6.html" title="更多&gt;&gt;">更多&gt;&gt;</a></span></h2>
    </div>
    <div class="viscera">
      <div class="texInfos">
        <div class="list">
		<?php $tag['name'] = 'video';$tag['cid'] = '6';$tag['limit'] = '10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dt><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><img alt="<?php echo ($video["title"]); ?>" src="<?php echo ($video["picurl"]); ?>"  onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" class="loading"></a></dt><dd><p class="p1"><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,7)); ?></a></p><p class="p2"></p></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
					 </div>
        <div class="list">
		<?php $tag['name'] = 'video';$tag['cid'] = '6';$tag['limit'] = '11,10';$tag['order'] = 'addtime desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><dl class="w128"><dd><em><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>">·<?php echo (get_replace_html($video["title"],0,8)); ?></a></em></dd></dl><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
		 </div>
      </div>
    </div>
  </div>
  <div class="right">
   
    <div class="rank" id="j-rankdocumentary">
      <h4><span><a class="active" href="javascript:void(0);">周</a> <a href="javascript:void(0);">月</a> <a href="javascript:void(0);">总</a></span><em class="e12"><a  target="_blank" title="纪录片排行">纪录片排行</a></em></h4>
      <ol class="active">
	    <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '6';$tag['order'] = 'weekhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["weekhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '6';$tag['order'] = 'monthhits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["monthhits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					  </ol>
      <ol>
		 <?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['cid'] = '6';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["hits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,13)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
					 </ol>
    </div>
  </div>
</div>
<!--纪录片结束-->


<div class="Map">
  <div class="left"> 
     <div class="title">
    <h2 class="H210"></h2>
  </div>
  <ul>
    <?php $tag['name'] = 'link';$tag['limit'] = '100';$tag['order'] = 'type asc,oid desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): ++$i;$mod = ($i % 2 );?><?php if(($link["type"])  ==  "1"): ?><li><a href="<?php echo ($link["url"]); ?>" target="_blank"><?php echo (get_replace_html($link["title"],0,8)); ?></a></li>
    <?php else: ?>
    <li><a href="<?php echo ($link["url"]); ?>" target="_blank"><img alt="<?php echo ($link["title"]); ?>" src="<?php echo ($link["logo"]); ?>"  width="88" height="31"></a></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	 </ul>
  </div>
</div>

<div class="footer">
   <br/>
  <p>Copyright &copy; 2011-2013 <a href="<?php echo ($weburl); ?>"><?php echo ($webname); ?></a> All rights reserved.</p>
  <p>Anything about the Problems, Please Contact Admin:<a href="mailto:wulang@mail.bnu.edu.cn">BNU532</a>
  </p>
  <br>
</div>


	<script type="text/javascript" src="<?php echo ($tplpath); ?>js/lib/jquery-1.9.0.min.js"></script>

	<script type="text/javascript" src="<?php echo ($tplpath); ?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<script type="text/javascript" src="<?php echo ($tplpath); ?>js/source/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>js/source/jquery.fancybox.css?v=2.1.4" media="screen" />

	<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo ($tplpath); ?>js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo ($tplpath); ?>js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<script type="text/javascript" src="<?php echo ($tplpath); ?>js/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

	<script type="text/javascript">
		$(document).ready(function() {
	
			$('.fancybox').fancybox({openEffect : 'elastic'});

			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');}
			});


			$('.fancybox-thumbs').fancybox({
				prevEffect : 'fade',
				nextEffect : 'fade', 
				closeBtn  : false,
				arrows    : true,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					},
					title : {
						type : 'inside'
					},
					buttons	: {position : 'bottom'}
				},
				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}

			});

		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>





<script type="text/javascript">
	LETV.include(['common.js','index.js'],function(){
	page_impl();
},'<?php echo ($tplpath); ?>');
</script>
</body>
</html>