<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加/编辑影片</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/kindeditor.js"></script>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/lang/zh_CN.js"></script>
</head>
<body> 
<?php if(($id)  >  "0"): ?><form name="update" action="?s=Admin/Video/Update" method="post" id="gxform">
<input type="hidden" name="id" value="<?php echo ($id); ?>">
<?php else: ?>
<form name="add" action="?s=Admin/Video/Insert" method="post" id="gxform"><?php endif; ?>
<table cellpadding="0" cellspacing="0" class="boxadd">
<tr class="tabs_title">
    <td><span id="tabs" class="fl"><a class="on" href="javascript:void(0)" name="1,2" hideFocus='true'><?php echo ($tpltitle); ?>影片</a><a class="tab2" href="javascript:void(0)" name="2,2" hideFocus='true'>其它设置</a></span><span class="fr"><a href="?s=Admin/Video/Show" class="no">返回数据管理</a></span>
    </td>
</tr>
<tr><td>
<div id="showtab_1" style="border-top:1px solid #C6DCF2;">
<ul><li class="l">名 称：<input name="title" type="text" class="input" maxlength="255" value="<?php echo ($title); ?>"></li>
<li class="r">分 类：<select name="cid" class="select"><?php if(is_array($list_channel_video)): $i = 0; $__LIST__ = $list_channel_video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>><?php echo ($gxcms["cname"]); ?></option><?php if(is_array($gxcms['son'])): $i = 0; $__LIST__ = $gxcms['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>>├ <?php echo ($gxcms["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select></li>
<li class="r">连载信息：<input name="serial" type="text" size="10" value="<?php echo ($serial); ?>" class="ct"></li>
</ul>
<ul>
<li class="l">备 注：<input name="intro" type="text" class="input" maxlength="255" value="<?php echo ($intro); ?>"></li>
<li class="r">颜 色：<select name="color" class="select"><option value=''>标题颜色</option><option value='#FF0000' style='background-color:#FF0000' <?php if(($color)  ==  "#FF0000"): ?>selected<?php endif; ?>>红色</option><option value='#FF33CC' style='background-color:#FF33CC' <?php if(($color)  ==  "#FF33CC"): ?>selected<?php endif; ?>>粉红</option><option value='#00FF00' style='background-color:#00FF00' <?php if(($color)  ==  "#00FF00"): ?>selected<?php endif; ?>>绿色</option><option value='#660099' style='background-color:#660099' <?php if(($color)  ==  "#660099"): ?>selected<?php endif; ?>>紫色</option><option value='#FFFF00' style='background-color:#FFFF00' <?php if(($color)  ==  "#FFFF00"): ?>selected<?php endif; ?>>黄色</option><option value='#0000CC' style='background-color:#0000CC' <?php if(($color)  ==  "#0000CC"): ?>selected<?php endif; ?>>深蓝</option><option value=''>无色</option></select></li>
<li class="r">点播人气：<input name="hits" type="text" size="10" value="<?php echo ($hits); ?>" class="ct"></li>
</ul>
<ul>
<li class="l">主 演：<input name="actor" type="text" class="input" maxlength="255" value="<?php echo ($actor); ?>" title="半角逗号分隔"></li>
<li class="r">星 级：<select name="stars" class="select"><option value="1" <?php if(($stars)  ==  "1"): ?>selected<?php endif; ?>>☆</option><option value="2" <?php if(($stars)  ==  "2"): ?>selected<?php endif; ?>>☆☆</option><option value="3" <?php if(($stars)  ==  "3"): ?>selected<?php endif; ?>>☆☆☆</option><option value="4" <?php if(($stars)  ==  "4"): ?>selected<?php endif; ?>>☆☆☆☆</option><option value="5" <?php if(($stars)  ==  "5"): ?>selected<?php endif; ?>>☆☆☆☆☆</option>
</select></li>
<li class="r">影片评分：<input name="score" type="text" size="10" maxlength="4" value="<?php echo (($score)?($score):'10'); ?>" class="ct"></li>
</ul>
<ul>
<li class="l">导 演：<input name="director" type="text" class="input" maxlength="255" value="<?php echo ($director); ?>" title="半角逗号分隔"></li>
<li class="r">对 白：<select name="language" class="select" title="对白语言"><?php if(is_array($list_language)): $i = 0; $__LIST__ = $list_language;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms); ?>" <?php if(($gxcms)  ==  $language): ?>selected<?php endif; ?>><?php echo ($gxcms); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></li>
<li class="r">发行年份：<input name="year"  type="text" size="10" maxlength="5" value="<?php echo (($year)?($year):'2000'); ?>"  class="ct"/></li>
</ul>
<ul>
<li class="l">优 化：<input name="keywords" type="text" class="input" maxlength="255" value="<?php echo ($keywords); ?>" title="SEO关键词"></li>
<li class="r">地 区：<select name="area" class="select" title="生产地区"><?php if(is_array($list_area)): $i = 0; $__LIST__ = $list_area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms); ?>" <?php if(($gxcms)  ==  $area): ?>selected<?php endif; ?>><?php echo ($gxcms); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></li>
<li class="r">影片录入：<input name="inputer" type="text" size="10" value="<?php echo ($inputer); ?>" class="ct" title="设为gxcms将强制该影片为手动更新"></li>
</ul>
<ul>
<li class="l">海 报：<input name="picurl" id="picurl" type="text" class="input" maxlength="255" value="<?php echo ($picurl); ?>"></li>
<li class="r" style="padding-top:5px"><iframe src="?s=Admin/Upload/Show/mid/video" scrolling="no" topmargin="0" width="300" height="28" marginwidth="0" marginheight="0" frameborder="0" align="left"></iframe></li>
</ul>
<ul style="height:160px;line-height:160px;padding:5px 0px">
<li style="padding-left:22px;float:left;">播放地址：</li>
<li style="float:left"><textarea name='playurl' style="width:755px;height:150px" title="播放地址请按每集一行的格式输入"><?php echo ($playurl); ?></textarea></li>
</ul>
<ul style="height:160px;line-height:160px;padding:5px 0px">
<li style="padding-left:22px;float:left;">下载地址：</li>
<li style="float:left"><textarea name='downurl' style="width:755px;height:150px" title="下载地址请按每集一行的格式输入,没有请留空"><?php echo ($downurl); ?></textarea></li>
</ul>
<ul style="height:260px;line-height:260px;padding:5px 0px">
<li style="padding-left:22px;float:left;">剧情简介：</li>
<li style="float:left"><textarea id="content" name="content" style="width:760px;height:250px;"><?php echo ($content); ?></textarea></li>
</ul>
</div>
<div id="showtab_2" style="display:none;border-top:1px solid #C6DCF2;text-align:left">
<ul><li class="l">状&nbsp;&nbsp;&nbsp;&nbsp;态：<select name="status"><option value="1" >显示</option><option value="0" <?php if(($status)  ==  "0"): ?>selected<?php endif; ?>>隐藏</option></select></li></ul>
<ul><li class="l">评分人：<input name="scoreer" type="text" size="10" value="<?php echo (($scoreer)?($scoreer):'1'); ?>" class="ct" title="共多少人评分" maxlength="8"></li></ul>
<ul><li class="l">首字母：<input name="letter" type="text" size="10" value="<?php echo ($letter); ?>" class="ct" maxlength="2"></li></ul>
<ul><li class="l">月人气：<input name="monthhits" type="text" size="10" value="<?php echo ($monthhits); ?>" class="ct" maxlength="8"></li></ul>
<ul><li class="l">周人气：<input name="weekhits" type="text" size="10" value="<?php echo ($weekhits); ?>" class="ct" maxlength="8"></li></ul>
<ul><li class="l">日人气：<input name="dayhits" type="text" size="10" value="<?php echo ($dayhits); ?>" class="ct" maxlength="8"></li></ul>
<ul><li class="l">支&nbsp;&nbsp;&nbsp;&nbsp;持：<input name="up" type="text" size="10" value="<?php echo (($up)?($up):'0'); ?>" class="ct" maxlength="8"></li></ul>
<ul><li class="l">反&nbsp;&nbsp;&nbsp;&nbsp;对：<input name="down" type="text" size="10" value="<?php echo (($down)?($down):'0'); ?>" class="ct" maxlength="8"></li></ul>
<ul><li class="l" title="勾选则使用系统当前时间">时&nbsp;&nbsp;&nbsp;&nbsp;间：<input name="addtime" type="text" size="20" maxlength="35" value="<?php echo (date('Y-m-d H:i:s',$addtime)); ?>"> <input name="checktime" type="checkbox" class="noborder" value="1" <?php echo ($checktime); ?>></li></ul>
<ul><li class="l">来&nbsp;&nbsp;&nbsp;&nbsp;源：<input name="reurl" type="text" class="input" maxlength="255" value="<?php echo ($reurl); ?>" class="ct" title="请勿随意修改,将作为采集更新的标识"></li></ul>
</div>
<ul>
<li style="margin-left:70px;text-align:left;padding-top:5px"><input class="bginput" type="submit" name="submit" value=" 提 交 " > <input class="bginput" type="reset" name="Input" value=" 重 置 " ></li>
</ul>
</td></tr>
</table>
</form>
<script type="text/javascript">
var editor;
KindEditor.ready(function(K){
    editor = K.create('#content', {
	resizeType : 1,
	allowPreviewEmoticons : false,
	allowImageUpload : false,
	items : [
	'source', '|', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
	'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
	'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'unlink', 'about']
})});
var $content = $('#content').val();
	document.getElementById("gxform").onreset = function(){
	KindEditor.html('content', $content);
}
</script>
<style>
#footer, #footer a:link, #footer a:visited {
	clear:both;
	color:#0072e3;
	font:12px/1.5 Arial;
	margin-top:10px;
	text-align:center;
	white-space:nowrap;
}
</style>
<div id="footer">Copyright © 532Movie All rights reserved</div>
</body>
</html>