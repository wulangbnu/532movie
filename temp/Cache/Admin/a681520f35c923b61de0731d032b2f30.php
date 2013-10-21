<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>采集影片入库-<?php echo C("web_name");?></title>
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<link rel='stylesheet' type='text/css' href='./views/css/collect.css'>
<link rel='stylesheet' type='text/css' href='./views/css/dialog.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/collect.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/dialog.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/formvalidator.js"></script>
<style type="text/css">
<!--
.green{ color:#0c8918;}
.tr strong a{color:#f30;}
-->
</style>
</head>
<body>
<table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
<tr>
  <td colspan="8" class="table_title">
  <ul>
  <li><a  href="?s=Admin/CustomCollect/ListShow">采集节点管理</a> </li>
  <li><a href="?s=Admin/CustomCollect/Add">添加采集节点</a></li>
    <li><a href="?s=Admin/CustomCollect/Manage/action/import">导入采集规则</a></li>
  </ul>
  
  </td>
</tr>


<tr class="tr">
<form action="?s=Admin/CustomCollect/ColVideo" method="post" id="search" name="search">
<td colspan="8"><table width="300px" border="0" cellspacing="0" cellpadding="0" align="left" style="height:25px">
  <tr>
    <td>搜索影片：</td>
    <td><select id="selectFilter"   name="nid" onChange="self.location.href='?s=Admin/CustomCollect/ColVideo/nid/'+this.value+''">
    <option value="">所有采集节点项目</option>
    <?php if(is_array($nodetree)): $i = 0; $__LIST__ = $nodetree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($no["id"]); ?>" <?php if(($no["id"])  ==  $Arr["nid"]): ?>selected<?php endif; ?>><?php echo ($no["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></td>
    <td><input name="title" type="text" id="title" size="20" value="<?php echo (htmlspecialchars($Arr['title'])); ?>"></td>
    <td><input type="submit" value="搜 索" class="bginput" title="输入关键字搜索影片"/></td>
  </tr>
</table>
</td>
</form>
</tr>

<form action="" method="post" id="gxform" name="gxform">
<tr align="center" class="list_head">
<td width="2%"></td>
<td width='5%'>ID<?php if(($Arr["order"])  ==  "id desc"): ?><a href="?s=Admin/CustomCollect/ColVideo/order/id/sort/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按ID升序排列"></a><?php else: ?><a href="?s=Admin/CustomCollect/ColVideo/order/id/sort/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按ID降序排列"></a><?php endif; ?></td>
<td width='20%'>影片名称</td>
<td width='15%'>状态<?php if(($Arr["order"])  ==  "status desc"): ?><a href="?s=Admin/CustomCollect/ColVideo/order/status/sort/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按状态升序排列"></a><?php else: ?><a href="?s=Admin/CustomCollect/ColVideo/order/status/sort/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按状态降序排列"></a><?php endif; ?></td>
<td width='15%'>栏目分类</td>
<td width='15%'>所属节点</td>
<td width='15%'>采集时间<?php if(($Arr["order"])  ==  "addtime desc"): ?><a href="?s=Admin/CustomCollect/ColVideo/order/addtime/sort/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按时间升序排列"></a><?php else: ?><a href="?s=Admin/CustomCollect/ColVideo/order/addtime/sort/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按时间降序排列"></a><?php endif; ?></td>
<td width=''></td>
</tr>
<?php if(is_array($Arr["video"])): $i = 0; $__LIST__ = $Arr["video"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr class="tr" align="center">
<td  width="2%"><input name='ids[]' type='checkbox' value='<?php echo ($vo["id"]); ?>' class="noborder"></td>
<td  width='5%'><?php echo ($vo["id"]); ?></td>
<td  width='20%'><?php echo ($vo["data"]["title"]); ?></td>
<td  width='15%'><?php if($vo['status'] == '2'): ?><span class="green">已入库</span><?php elseif($vo['status'] == '1'): ?>未入库<?php endif; ?></td>
<td  width='15%'><?php if(empty($vo["data"]["cname"])): ?>未知<?php else: ?><?php echo ($vo["data"]["cname"]); ?><?php endif; ?><?php if(($vo["data"]["cid"])  ==  "999"): ?><strong><a href="?s=Admin/CustomCollect/AutoChannel">待绑定</a></strong><?php endif; ?></td>
<td  width='15%'><?php echo ($vo["name"]); ?></td>
<td  width='15%'><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
<td class="td" id='action'><!--<a href="?s=Admin/CustomCollect/ColManage/act/del/vid/<?php echo ($vo["id"]); ?>"  onClick="return confirm('确定删除该视频吗?')" title="点击删除影片">删除</a>--><a href="javascript:void(0)" onclick="$('#show_<?php echo ($vo["id"]); ?>').show();">查看</a><a href="javascript:void(0)" onclick="$('#show_<?php echo ($vo["id"]); ?>').hide();">收起</a></td>
</tr>
<tr class="tr" id='show_<?php echo ($vo["id"]); ?>' style="display:none">
<td colspan="8">
<ul class="show_info"  style="overflow-y:scroll;height:300px;margin:10px;">
<?php if(is_array($vo["base"]["base"])): $k = 0; $__LIST__ = $vo["base"]["base"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): ++$k;$mod = ($k % 2 )?><li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="10%"><?php echo ($key); ?>：</td>
    <td width="800px" ><div style="width:800px;" class="break"><?php echo ($co); ?></div></td>
  </tr>
</table>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="10%">播放地址：</td>
    <td width="800px" class="break">
    <div style="width:800px;" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="url">
    <?php if(is_array($vo["base"]["playurl"])): $i = 0; $__LIST__ = $vo["base"]["playurl"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): ++$i;$mod = ($i % 2 )?><tr><td><?php echo ($u); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table></div ></td>
  </tr>
</table>
</li>
</ul>
<div style="float:right;margin-right:30px;"><a href="javascript:void(0)" onclick="$('#show_<?php echo ($vo["id"]); ?>').hide();">收起</a></div>
</td></tr><?php endforeach; endif; else: echo "" ;endif; ?>

<tr class="tr"><td colspan="8" class="pages"><?php echo ($Arr['pagelist']['listpages']); ?></td></tr>
<tr class="tr"><td colspan="8"><span><input type="button" id="checkall" value="全/反选" class="bginput"></span><span><input type="submit" value="入库所选" class="bginput" onClick="gxform.action='?s=Admin/CustomCollect/ColManage/act/inflow';" /></span><span><input type="submit" value="入库当天" class="bginput" onClick="gxform.action='?s=Admin/CustomCollect/ColManage/act/today';" /></span><span><input type="submit" value="入库所有未入库" class="bginput" onClick="gxform.action='?s=Admin/CustomCollect/ColManage/act/allunused';" /></span><span><input type="submit" value="入库所有" class="bginput" onClick="gxform.action='?s=Admin/CustomCollect/ColManage/act/allinflow';" /></span><span><input type="submit" value="批量删除所选" onClick="if(confirm('删除后将无法还原,确定要删除吗?')){gxform.action='?s=Admin/CustomCollect/ColManage/act/delselect';}else{return false}" class="bginput"/></span><span><input type="submit" value="删除所有" onClick="if(confirm('删除后将无法还原,确定要删除所有吗?')){gxform.action='?s=Admin/CustomCollect/ColManage/act/delall';}else{return false}" class="bginput"/></span> <span><strong  class="blue">不想再次采集到该链接影片：</strong><input type="submit" value="批量删除" onClick="if(confirm('删除后将无法还原,确定要删除吗?')){gxform.action='?s=Admin/CustomCollect/ColManage/act/delonly';}else{return false}" class="bginput"/></span></td>
</tr>
</form>
</table>
<!--连载框 -->
<div id="msg_tbc" class="tbc-block"></div>
<!--浮动层 -->

<style>#dia_title{height:25px;line-height:25px}.jqmWindow{height:300px;width:500px;}</style>
<script language="JavaScript" type="text/javascript">
function showhtml(id){
	$.get('?s=Admin/Html/Videoid/ids/'+id,null,function(data){
		$("#html_"+id).html('<font color=#ff0000>'+data+'</font>');
		window.setTimeout(function(){
			$("#html_"+id).html('');
		},1000);
	});
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