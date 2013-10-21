<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($webtitle); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<link rel="shortcut icon" href="<?php echo ($webpath); ?>favicon.png" />
<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>top.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>list.css" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>views/css/system.css'>

<style>
    .blue {background:#bcd4ec;}
</style>
<script language="javascript">
$(document).ready(function(){
	$('.gre>li>a').click(function(){
		id = $(this).attr('id');
		$('.gre>li').removeClass('on');
		$('#menu'+id).addClass('on');
		$('.hot').hide();
		$('#hot'+id).show();
    });

    $(".top_table tr").hover(
    function(){
		$(this).addClass("blue");
	}, function() {
		$(this).removeClass("blue");
	});
    
});
</script>
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

<div class="box_n">
	<div class="main_n">
		<div class="list_l">
			<h3></h3>
            <ul class="gre">
        <li id="menu0" class="on"><a onfocus="this.blur();" href="javascript:void(0)" id="0">全部</a><small></small></li>
			<?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(($menu["mid"])  ==  "1"): ?><li id="menu<?php echo ($menu["id"]); ?>"><a onfocus="this.blur();" href="javascript:void(0)" id="<?php echo ($menu["id"]); ?>"><?php echo ($menu["cname"]); ?></a><small></small></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		    </ul>
            <div class="h3_b"></div>
			<div style="margin:6px;"></div>
		</div>
        <div class="list_r">


<div class="ct hot" id="hot0">
        <div class="hd"><h3>总人气排行榜</h3></div>
        <div class="top_table">
		
		 <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <th>序号</th>
              <th class="name">名称</th>
              <th>点击数</th>
              <th>网友评分</th>
              <th class="nobrd">更新日期</th>
            </tr>
            <?php $tag['name'] = 'video';$tag['cid'] = '1,2,3,4,5,6';$tag['limit'] = '50';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><tr>
                <td><?php echo ($i); ?></td>
                <td class="name"><a href="<?php echo ($video["readurl"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,17)); ?></a></td>
                <td><?php echo (number_format($video["hits"])); ?></td>
                <td class="score"><?php echo ($video["score"]); ?></td>
                <td><?php echo (get_color_date('Y-m-d',$video["addtime"])); ?></td>
              </tr>
              <?php if($i != 50): ?><?php if($i%10 == 0): ?><td colspan="5" class="line">&nbsp;
                  </tr><?php endif; ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
          </table>
        </div>
    </div>
	


<?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><?php if(($menu["mid"])  ==  "1"): ?><div class="ct hot" id="hot<?php echo ($menu["id"]); ?>" <?php if(($i)  !=  "0"): ?>style="display:none"<?php endif; ?>>
        <div class="hd"><h3><?php echo get_channel_name($menu['id']);?>总人气排行榜</h3></div>
        <div class="top_table">
		
		 <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <th>序号</th>
              <th class="name">名称</th>
              <th>点击数</th>
              <th>网友评分</th>
              <th class="nobrd">更新日期</th>
            </tr>
            <?php $tag['name'] = 'video';$tag['cid'] = ''.$menu['id'].'';$tag['limit'] = '50';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><tr>
                <td><?php echo ($i); ?></td>
                <td class="name"><a href="<?php echo ($video["readurl"]); ?>" target="_blank"><?php echo (get_replace_html($video["title"],0,17)); ?></a></td>
                <td><?php echo (number_format($video["hits"])); ?></td>
                <td class="score"><?php echo ($video["score"]); ?></td>
                <td><?php echo (get_color_date('Y-m-d',$video["addtime"])); ?></td>
              </tr>
              <?php if($i != 50): ?><?php if($i%10 == 0): ?><td colspan="5" class="line">&nbsp;
                  </tr><?php endif; ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
          </table>
        </div>
    </div><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
		</div>
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





</body>
</html>