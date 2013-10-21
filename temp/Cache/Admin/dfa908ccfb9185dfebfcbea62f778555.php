<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>自定义菜单设置</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<style type="text/css">
.input{ font-size:14px}
</style> 
</head>
<body>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table" id="tool1">
<form action="?s=Admin/Config/Updatenav" method="post" name="gxform" id="gxform">
<tr class="table_title"><td>自定义快捷菜单</td></tr>
<tr class="tr">
<td><textarea name="con[web_admin_nav]" style="width:99%; height:300px"><?php if(is_array($web_admin_nav)): $i = 0; $__LIST__ = $web_admin_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><?php echo ($key); ?>|<?php echo ($gxcms); ?><?php echo(chr(13)); ?><?php endforeach; endif; else: echo "" ;endif; ?></textarea></td>
</tr>
<tr class="tr">
  <td><input class="bginput" type="submit" name="submit" value=" 提交 "> <input class="bginput" type="reset" name="Input" value="重置" > 格式：菜单名称|菜单链接地址(一行一个)</td>
</tr>
</form>
</table>
<?php if(($_GET['reload'])  ==  "1"): ?><script>window.parent.left.location.reload();</script><?php endif; ?>
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