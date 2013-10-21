<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加或编辑文章</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/kindeditor.js"></script>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/lang/zh_CN.js"></script>
</head>
<body>
<?php if(($id)  >  "0"): ?><form action="?s=Admin/Info/Update" method="post" id="gxform" name="update">
<input type="hidden" name="id" value="<?php echo ($id); ?>">
<?php else: ?>
<form action="?s=Admin/Info/Insert" method="post" id="gxform" name="add"><?php endif; ?>
<table cellpadding="0" cellspacing="0" class="boxadd">
<tr class="tabs_title">
    <td><span id="tabs" class="fl"><a class="on" href="javascript:void(0)" name="1,2"><?php echo ($tpltitle); ?>文章</a><a class="tab2" href="javascript:void(0)" name="2,2">其它设置</a></span><span class="fr"><a href="?s=Admin/Info/Show" class="no">返回文章管理</a></span>
    </td>
</tr>
<tr><td>
<div id="showtab_1" style="border-top:1px solid #C6DCF2;">
<ul><li class="l">标 题：<input name="title" type="text" class="input" maxlength="255" value="<?php echo ($title); ?>"></li>
<li class="r">分 类：<select name="cid" class="select"><?php if(is_array($list_channel_info)): $i = 0; $__LIST__ = $list_channel_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>><?php echo ($gxcms["cname"]); ?></option><?php if(is_array($gxcms['son'])): $i = 0; $__LIST__ = $gxcms['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>>├ <?php echo ($gxcms["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select></li>
<li class="r">作 者：<input name="inputer" type="text" size="10" value="<?php echo ($inputer); ?>" class="ct"></li>
</ul>
<ul>
<li class="l">优 化：<input name="director" type="text" class="input" maxlength="255" value="<?php echo ($director); ?>" title="SEO关键词"></li>
<li class="r">颜 色：<select name="color" class="select"><option value=''>标题颜色</option><option value='#FF0000' style='background-color:#FF0000' <?php if(($color)  ==  "#FF0000"): ?>selected<?php endif; ?>>红色</option><option value='#FF33CC' style='background-color:#FF33CC' <?php if(($color)  ==  "#FF33CC"): ?>selected<?php endif; ?>>粉红</option><option value='#00FF00' style='background-color:#00FF00' <?php if(($color)  ==  "#00FF00"): ?>selected<?php endif; ?>>绿色</option><option value='#660099' style='background-color:#660099' <?php if(($color)  ==  "#660099"): ?>selected<?php endif; ?>>紫色</option><option value='#FFFF00' style='background-color:#FFFF00' <?php if(($color)  ==  "#FFFF00"): ?>selected<?php endif; ?>>黄色</option><option value='#0000CC' style='background-color:#0000CC' <?php if(($color)  ==  "#0000CC"): ?>selected<?php endif; ?>>深蓝</option><option value=''>无色</option></select></li>
<li class="r">人 气：<input name="hits" type="text" size="10" value="<?php echo ($hits); ?>" class="ct"></li>
</ul>
<ul>
<li class="l">跳 转：<input name="jumpurl" type="text" class="input" maxlength="255" value="<?php echo ($jumpurl); ?>" title="跳转链接"></li>
<li class="r">星 级：<select name="stars" class="select"><option value="1" <?php if(($stars)  ==  "1"): ?>selected<?php endif; ?>>☆</option><option value="2" <?php if(($stars)  ==  "2"): ?>selected<?php endif; ?>>☆☆</option><option value="3" <?php if(($stars)  ==  "3"): ?>selected<?php endif; ?>>☆☆☆</option><option value="4" <?php if(($stars)  ==  "4"): ?>selected<?php endif; ?>>☆☆☆☆</option><option value="5" <?php if(($stars)  ==  "5"): ?>selected<?php endif; ?>>☆☆☆☆☆</option>
</select></li>
<li class="r">评 分：<input name="score" type="text" size="10" maxlength="4" value="<?php echo ($score); ?>" class="ct"></li>
</ul>
<ul>
<li class="l">来 源：<input name="reurl" type="text" class="input" maxlength="255" value="<?php echo ($reurl); ?>"></li>
<li class="r">状 态：<select name="status" class="select"><option value="1">显示</option><option value="0" <?php if(($status)  ==  "0"): ?>selected<?php endif; ?>>隐藏</option></select></li>
<li class="r">时 间：<input name="addtime" type="text" size="20" value="<?php echo (date('Y-m-d H:i:s',$addtime)); ?>"> <input name="checktime" type="checkbox"value="1" <?php echo ($checktime); ?> class="noborder" title="勾选则使用系统当前时间"></li>
</ul>
<ul>
<li class="l">图 片：<input name="picurl" id="picurl" type="text" class="input" maxlength="255" value="<?php echo ($picurl); ?>"></li>
<li class="r" style="padding-top:6px"><iframe src="?s=Admin/Upload/Show/mid/info" scrolling="no" topmargin="0" width="300" height="25" marginwidth="0" marginheight="0" frameborder="0" align="left"></iframe></li>
</ul>
<ul style="height:70px;line-height:70px;padding-top:5px">
<li style="padding-left:40px;float:left;">简 介：</li>
<li style="float:left"><textarea name='remark' style="width:760px;height:65px;" title="留空则自动截取内容前100个字符"><?php echo ($remark); ?></textarea></li>
</ul>
<ul style="height:310px;line-height:310px;padding-top:5px;overflow:hidden">
<li style="padding-left:40px;float:left;">内 容：</li>
<li style="float:left"><textarea id="content" name="content" style="width:760px;height:300px;"><?php echo ($content); ?></textarea></li>
</ul>
</div>
<div id="showtab_2" style="display:none;border-top:1px solid #C6DCF2;text-align:left">
<ul><li class="l">评分人：<input name="scoreer" type="text" size="10" value="<?php echo ($scoreer); ?>" class="ct" title="共多少人评分" maxlength="8"></li></ul>
<ul><li class="l">首字母：<input name="letter" type="text" size="10" value="<?php echo ($letter); ?>" class="ct" maxlength="2"></li></ul>
<ul><li class="l">月人气：<input name="monthhits" type="text" size="10" value="<?php echo ($monthhits); ?>" class="ct" maxlength="8"></li></ul>
<ul><li class="l">周人气：<input name="weekhits" type="text" size="10" value="<?php echo ($weekhits); ?>" class="ct" maxlength="8"></li></ul>
<ul><li class="l">日人气：<input name="dayhits" type="text" size="10" value="<?php echo ($dayhits); ?>" class="ct" maxlength="8"></li></ul>
<ul><li class="l">支&nbsp;&nbsp;&nbsp;&nbsp;持：<input name="up" type="text" size="10" value="<?php echo (($up)?($up):'0'); ?>" class="ct" maxlength="8"></li></ul>
<ul><li class="l">反&nbsp;&nbsp;&nbsp;&nbsp;对：<input name="down" type="text" size="10" value="<?php echo (($down)?($down):'0'); ?>" class="ct" maxlength="8"></li></ul>
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