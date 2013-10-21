<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($webtitle); ?></title>
<meta name="keywords" content="<?php echo ($ckeywords); ?><?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($cdescription); ?><?php echo ($description); ?>">
<link rel="shortcut icon" href="<?php echo ($webpath); ?>favicon.png" />
<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>top.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ($tplpath); ?>list.css" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>views/css/system.css'>

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
			
			<div class="ranks j-rank"><h4>热门<?php echo ($cname); ?>排行</h4>
				<ol>
				<?php $tag['name'] = 'info';$tag['cid'] = ''.$cid.'';$tag['limit'] = '10';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): ++$i;$mod = ($i % 2 );?><li><span></span><a href="<?php echo ($info["readurl"]); ?>" target="_blank" title="<?php echo ($info["title"]); ?>"><?php echo (get_replace_html($info["title"],0,20)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?> 
				</ol>
			</div>
			
			
			<div class="ranks j-rank"><h4>热门影视排行</h4>
				<ol>
				<?php $tag['name'] = 'video';$tag['cid'] = '1,2,3,4,5,6';$tag['limit'] = '10';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><li><span><?php echo ($video["hits"]); ?>℃</span><a href="<?php echo ($video["readurl"]); ?>" target="_blank" title="<?php echo ($video["title"]); ?>"><?php echo (get_replace_html($video["title"],0,15)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
		</ol>
			</div>
			
		</div>

		<div class="list_r">
			<div class="longtit">
				<div class="fl">您现在的位置<?php echo ($navtitle); ?></div>
				<div class="fr aves">
				</div>
			</div>
            <ol class="on" id="tabx_c_1">
<div class="soyall">
 <?php $tag['name'] = 'info';$tag['limit'] = '20';$tag['order'] = ''.$order.''; $__LIST__ = get_tag_gxlist($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): ++$i;$mod = ($i % 2 );?><div class="newlist">
				<dl class="news_dl">
					  <dt><span><?php echo (get_color_date('m-d',$info["addtime"])); ?></span><a href="<?php echo ($info["readurl"]); ?>" target="_blank"><?php echo ($info["title"]); ?></a></dt>
					  <dd> <?php echo (get_replace_html($info["content"],0,200,'utf-8',true)); ?>......[<a href="<?php echo ($info["readurl"]); ?>" target="_blank">阅读全文</a>] </dd>
					  <dd class="time"></dd>
				</dl>
			</div><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>		
<?php if($count > 10): ?><div class="page"><?php echo ($pages); ?></div><?php endif; ?>	
			</div>
            </ol>

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