<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>专题管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
</head>
<body>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
<tr class="table_title"><td colspan="7">网站专题管理</td></tr>
<tr class="list_head ct">
  <td width="60">编号<?php if(($order)  ==  "id desc"): ?><a href="?s=Admin/Special/Show/type/id/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按ID升序排列"></a><?php else: ?><a href="?s=Admin/Special/Show/type/id/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按ID降序排列"></a><?php endif; ?></td>
  <td >专题名称</td>
  <td width="60">人气<?php if(($order)  ==  "hits desc"): ?><a href="?s=Admin/Special/Show/type/hits/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按人气升序排列"></a><?php else: ?><a href="?s=Admin/Special/Show/type/hits/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按人气降序排列"></a><?php endif; ?></td>
  <td width="50">影视</td>
  <td width="50">文章</td>
  <td width="80">录入时间<?php if(($order)  ==  "addtime desc"): ?><a href="?s=Admin/Special/Show/type/addtime/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按时间升序排列"></a><?php else: ?><a href="?s=Admin/Special/Show/type/addtime/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按时间降序排列"></a><?php endif; ?></td>
  <td width="100">操作</td>
</tr>
<form action="?s=Admin/Special/Delall" method="post" id="gxform" name="gxform">
<?php if(is_array($list_special)): $i = 0; $__LIST__ = $list_special;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><tr  class="tr">
  <td align="left"><input name="ids[]" type="checkbox" value="<?php echo ($gxcms["id"]); ?>" class="noborder"><?php echo ($gxcms["id"]); ?></td>
  <td align="left"><a href="<?php echo ($gxcms["specialurl"]); ?>" target="_blank"><?php echo htmlspecialchars(msubstr($gxcms['title'].$gxcms['intro'],0,40));?></a></td>
  <td class="td ct"><?php echo ($gxcms["hits"]); ?></td>
  <td class="td ct"><a href="?s=Admin/Video/Showspecial/id/<?php echo ($gxcms["id"]); ?>" title="管理影视"><?php echo ($gxcms["countvideo"]); ?>部</a></td>
  <td class="td ct"><a href="?s=Admin/Info/Showspecial/id/<?php echo ($gxcms["id"]); ?>" title="管理文章"><?php echo ($gxcms["countinfo"]); ?>篇</a></td>
  <td class="td ct"><?php echo (date('Y-m-d',$gxcms["addtime"])); ?></td>
  <td class="td ct"><a href="?s=Admin/Special/Add/id/<?php echo ($gxcms["id"]); ?>"  title="点击修改专题">编辑</a> <a href="?s=Admin/Special/Del/id/<?php echo ($gxcms["id"]); ?>" onClick="return confirm('确定删除该专题吗?')"  title="点击删除专题">删除</a> <?php if(($gxcms['status'])  ==  "1"): ?><a href="?s=Admin/Special/Status/id/<?php echo ($gxcms["id"]); ?>/sid/0" title="点击隐藏专题">隐藏</a><?php else: ?><a href="?s=Admin/Special/Status/id/<?php echo ($gxcms["id"]); ?>/sid/1" title="点击显示专题"><font color="red">显示</font></a><?php endif; ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?> 
<tr><td colspan="7" bgcolor="#FFFFFF"><div class="pages"><?php echo ($listpages); ?></div></td></tr>
<tr class="tr"><td colspan="7"><input type="button" id="checkall" value="全/反选" class="bginput"> <input type="submit" value="批量删除" onClick="return confirm('删除后将无法还原,确定要删除吗?')" class="bginput"/></td></tr> 
</form>
</table>
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