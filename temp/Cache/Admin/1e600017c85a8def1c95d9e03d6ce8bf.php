<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>栏目频道列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
</head>
<body>
<form action="?s=Admin/Channel/Updateall" method="post" name="gxform" id="gxform">
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
  <tr class="table_title">
    <td colspan="10">栏目分类列表</td>
  </tr>
  <tr class="list_head ct">
    <td width="50">编号</td>
    <td >栏目名称</td>
    <td width="70">类型</td>
    <td width="70">记录</td>
    <td width="70">发表</td>
    <td width="70">内容</td>
    <td width="90">创建</td>
    <td width="50">状态</td>
    <td width="70">操作</td>
    <td width="50">排序</td>
  </tr>
  <?php if(is_array($listtree)): $i = 0; $__LIST__ = $listtree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><tr class="tr ct">
    <td ><input type='checkbox' name='ids[]' value='<?php echo ($gxcms["id"]); ?>' class="noborder"><?php echo ($gxcms["id"]); ?></td>
    <td class="lt">【<?php if(get_channel_son($gxcms['id']) == 1): ?><a href="?s=Admin/<?php echo (ucwords(get_model_name($gxcms["mid"]))); ?>/Show/cid/<?php echo ($gxcms["id"]); ?>"><?php echo ($gxcms["cname"]); ?></a><?php else: ?><?php echo ($gxcms["cname"]); ?><?php endif; ?>】</td>
    <td class="td"><?php if(($gxcms["mid"])  ==  "9"): ?><font color="green">外部链接</font><?php else: ?><font color="red">大分类</font><?php endif; ?></td>
    <td class="td"><?php if(($gxcms["mid"])  !=  "9"): ?><font color="red"><?php echo (get_channel_count($gxcms["id"])); ?></font>条<?php endif; ?></td>
    <td class="td"><?php if(($gxcms["mid"])  !=  "9"): ?><?php if(get_channel_son($gxcms['id']) == 1): ?><a href="?s=Admin/<?php echo (ucwords(get_model_name($gxcms["mid"]))); ?>/Add/cid/<?php echo ($gxcms["id"]); ?>">发表内容</a><?php endif; ?><?php endif; ?></td>
    <td class="td"><?php if(($gxcms["mid"])  !=  "9"): ?><?php if(get_channel_son($gxcms['id']) == 1): ?><a href="?s=Admin/<?php echo (ucwords(get_model_name($gxcms["mid"]))); ?>/Show/cid/<?php echo ($gxcms["id"]); ?>">查看内容</a><?php endif; ?><?php endif; ?></td>
    <td class="td"><?php if(($gxcms["mid"])  !=  "9"): ?><a href="?s=Admin/Channel/Add/pid/<?php echo ($gxcms["id"]); ?>/mid/<?php echo ($gxcms["mid"]); ?>">创建子栏目</a><?php endif; ?></td>
    <td class="td"><?php if(($gxcms['status'])  ==  "1"): ?><a href="?s=Admin/Channel/Status/id/<?php echo ($gxcms["id"]); ?>/sid/0" title="显示状态,将在导航栏上显示">显示</a><?php else: ?><a href="?s=Admin/Channel/Status/id/<?php echo ($gxcms["id"]); ?>/sid/1" title="隐藏状态,不会显示在导航栏"><font color="red">隐藏</font></a><?php endif; ?></td>
    <td class="td"><a href="?s=Admin/Channel/Add/id/<?php echo ($gxcms["id"]); ?>">编辑</a> <a href="?s=Admin/Channel/Del/id/<?php echo ($gxcms["id"]); ?>" onClick="return confirm('确定删除该分类吗?删除后将不能恢复！')">删除</a></td>
    <td class="td"><input type='text' name='oid[<?php echo ($gxcms["id"]); ?>]' value='<?php echo ($gxcms["oid"]); ?>' class="bginput" style="width:22px;" maxlength="3"></td>
  </tr>
  <?php if(is_array($gxcms['son'])): $i = 0; $__LIST__ = $gxcms['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><tr class="tr ct">
    <td align="left"><input type='checkbox' name='ids[]' value='<?php echo ($gxcms["id"]); ?>' class="noborder"><?php echo ($gxcms["id"]); ?></td>
    <td align="left">&nbsp;&nbsp;├─ 【<a href="?s=Admin/<?php echo (ucwords(get_model_name($gxcms["mid"]))); ?>/Show/cid/<?php echo ($gxcms["id"]); ?>"><?php echo ($gxcms["cname"]); ?></a>】</td>
    <td class="td"><?php if(($gxcms["mid"])  ==  "9"): ?><font color="green">外部链接</font><?php else: ?>子栏目<?php endif; ?></td>
    <td class="td"><?php if(($gxcms["mid"])  !=  "9"): ?><?php echo (get_channel_count($gxcms["id"])); ?>条<?php endif; ?></td>
    <td class="td"><?php if(($gxcms["mid"])  !=  "9"): ?><a href="?s=Admin/<?php echo (ucwords(get_model_name($gxcms["mid"]))); ?>/Add/cid/<?php echo ($gxcms["id"]); ?>">发表内容</a><?php endif; ?></td>
    <td class="td"><?php if(($gxcms["mid"])  !=  "9"): ?><a href="?s=Admin/<?php echo (ucwords(get_model_name($gxcms["mid"]))); ?>/Show/cid/<?php echo ($gxcms["id"]); ?>">查看内容</a><?php endif; ?></td>
    <td class="td">&nbsp;</td>
    <td class="td"><?php if(($gxcms['status'])  ==  "1"): ?><a href="?s=Admin/Channel/Status/id/<?php echo ($gxcms["id"]); ?>/sid/0" title="显示状态,将在导航栏上显示">显示</a><?php else: ?><a href="?s=Admin/Channel/Status/id/<?php echo ($gxcms["id"]); ?>/sid/1" title="隐藏状态,不会显示在导航栏"><font color="red">隐藏</font></a><?php endif; ?></td>
    <td class="td"><a href="?s=Admin/Channel/Add/id/<?php echo ($gxcms["id"]); ?>">编辑</a> <a href="?s=Admin/Channel/Del/id/<?php echo ($gxcms["id"]); ?>" onClick="return confirm('确定删除该分类吗?')">删除</a></td>
    <td class="td"><input type='text' name='oid[<?php echo ($gxcms["id"]); ?>]' value='<?php echo ($gxcms["oid"]); ?>' class="bginput" style="width:22px;" maxlength="3"></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
  <tr>
    <td colspan="10" bgcolor="#FFFFFF"><input style="*padding-top:2px;" class="bginput" type="button" id="checkall" value="全/反选"> <input type="submit" value="批量删除" onClick="if(confirm('删除后将无法还原,确定要删除吗?')){gxform.action='?s=Admin/Channel/Delall';}else{return false}" class="bginput"/>&nbsp;&nbsp;<input type="submit" value="修改排序" name="Submit"  class="bginput"  onclick="gxform.action='?s=Admin/Channel/Updateall';"/> 注：删除分类将删除该分类下面的所有影片或新闻</td>
  </tr>
</table>
</form>
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