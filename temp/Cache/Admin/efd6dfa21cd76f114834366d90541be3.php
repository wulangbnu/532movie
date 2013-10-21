<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加/编辑专题</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
</head>
<body>
<?php if(($id)  >  "0"): ?><form action="?s=Admin/Special/Update" method="post" name="gxform" id="gxform">
<input type="hidden" name="id" value="<?php echo ($id); ?>">
<?php else: ?>
<form action="?s=Admin/Special/Insert" method="post" name="gxform" id="gxform"><?php endif; ?>        
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
<tr class="table_title"><td colspan="2"><?php echo ($tpltitle); ?>专题：</td></tr> 
<tr class="tr">
<td width="120" class="rt">专题名称：</td>
<td><input name="title" type="text" size="60" maxlength="255" value="<?php echo ($title); ?>"> 状态：<select id="showStatus" name="status"><option value="1" >显示</option><option value="0" <?php if(($status)  ==  "0"): ?>selected<?php endif; ?>>隐藏</option></select> 更新时间：<input name="addtime" type="text" size="20" maxlength="25" value="<?php echo (date('Y-m-d H:i:s',$addtime)); ?>"> <input name="checktime" type="checkbox"  class="noborder" value="1" <?php echo ($checktime); ?> title="勾选则使用当前系统时间"></td>
</tr>
<tr class="tr">
<td class="rt">专题LOGO图片：</td>
<td style="padding-top:10px"><span class="fl"><input name="logo" id="logo" type="text" size="60" maxlength="255" value="<?php echo ($logo); ?>"></span><span class="fl"><iframe src="?s=Admin/Upload/Show/mid/special/fileback/logo" scrolling="no" topmargin="0" width="350" height="30" marginwidth="0" marginheight="0" frameborder="0"></iframe></span></td>
</tr>   
<tr class="tr">
<td class="rt">Banner横幅图片：</td>
<td style="padding-top:10px"><span class="fl"><input name="banner" id="banner" type="text" size="60" maxlength="255" value="<?php echo ($banner); ?>"></span><span class="fl"><iframe src="?s=Admin/Upload/Show/mid/special/fileback/banner" scrolling="no" topmargin="0" width="350" height="30" marginwidth="0" marginheight="0" frameborder="0"></iframe></span></td>
</tr>
<?php if(($id)  >  "0"): ?><tr class="tr">
<td class="rt">已收录影视：</td>
<td><input id="mids" name="mids" type="text" size="60" maxlength="255" value="<?php echo ($mids); ?>"> <a href="?s=Admin/Video/Showspecial/id/<?php echo ($id); ?>">管理影视</a></td>
</tr>      
<tr class="tr">
<td class="rt">已收录文章：</td>
<td><input id="aids" name="aids" type="text" size="60" maxlength="255" value="<?php echo ($aids); ?>"> <a href="?s=Admin/Info/Showspecial/id/<?php echo ($id); ?>">管理文章</a></td>
</tr>
<tr class="tr">
<td class="rt">专题总人气：</td>
<td><input name="hits" type="text" size="5" maxlength="8" value="<?php echo (($hits)?($hits):'0'); ?>" class="ct"> 月人气：<input name="monthhits" type="text" size="5" maxlength="8" value="<?php echo (($monthhits)?($monthhits):'0'); ?>" class="ct"> 周人气：<input name="weekhits" type="text" size="5" maxlength="8" value="<?php echo (($weekhits)?($weekhits):'0'); ?>" class="ct"> 日人气：<input name="dayhits" type="text" size="5" maxlength="8" value="<?php echo (($dayhits)?($dayhits):'0'); ?>" class="ct"></td>
</tr><?php endif; ?>
<tr class="tr">
<td class="rt">专题简介：</td>
<td><textarea id="content" name="content" style="width:95%;height:250px;"><?php echo ($content); ?></textarea></td>
</tr>
<tr class="tr">
<td colspan="2"><p><input class="bginput" type="submit" name="submit" value="提交"> <input class="bginput" type="reset" name="Input" value="重置"></p></td>
</tr> 
</table>
</form>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/kindeditor.js"></script>
<script language="javascript" type="text/javascript" charset="utf-8" src="./views/editor/lang/zh_CN.js"></script>
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