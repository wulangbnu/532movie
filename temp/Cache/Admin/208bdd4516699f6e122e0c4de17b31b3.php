<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>文章资讯管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
</head>
<body>
<table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
<form action="?s=Admin/Info/Show/keyword" method="post" name="gxform" id="gxform">
  <tr>
  <td colspan="8" class="table_title"><span class="fl">文章数据管理(<a href="#" onClick="if(confirm('消耗资源较多，请勿在高峰期执行该操作!')){dialogPop('?s=Admin/Info/Downimg','远程图片下载');}else{return false}" style="color:#f00;">下载远程图片</a>)</span><span class="fr"><a href="?s=Admin/Info/Add">添加文章</a></span></td>
  <tr class="tr">
    <td colspan="8"><span style="float:left"><label>搜索文章：&nbsp;&nbsp;</label><select onChange="self.location.href='?s=Admin/Info/Show/cid/'+this.value+''"><option value="">所有分类</option><?php if(is_array($list_channel_info)): $i = 0; $__LIST__ = $list_channel_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>><?php echo ($gxcms["cname"]); ?></option><?php if(is_array($gxcms['son'])): $i = 0; $__LIST__ = $gxcms['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>>├ <?php echo ($gxcms["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select></span>&nbsp;&nbsp;<input name="keyword" type="text" id="keyword" size="20" value="<?php echo (htmlspecialchars($keyword)); ?>"> <input type="submit" value="搜 索" class="bginput" />&nbsp;
    </td>
  </tr>      
  <tr class="list_head ct">
    <td width="70">编号<?php if(($order)  ==  "id desc"): ?><a href="?s=Admin/Info/Show/type/id/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按ID升序排列"></a><?php else: ?><a href="?s=Admin/Info/Show/type/id/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按ID降序排列"></a><?php endif; ?></td>
    <td >文章标题</td>
    <td width="80">文章分类</td>
    <td width="70">人气
      <?php if(($order)  ==  "hits desc"): ?><a href="?s=Admin/Info/Show/type/hits/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按人气升序排列"></a><?php else: ?><a href="?s=Admin/Info/Show/type/hits/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按人气降序排列"></a><?php endif; ?></td>
    <td width="90">推荐星级
      <?php if(($order)  ==  "stars desc"): ?><a href="?s=Admin/Info/Show/type/stars/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按星级升序排列"></a><?php else: ?><a href="?s=Admin/Info/Show/type/stars/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按星级降序排列"></a><?php endif; ?></td>
    <td width="85">更新时间
      <?php if(($order)  ==  "addtime desc"): ?><a href="?s=Admin/Info/Show/type/addtime/order/asc"><img src="./views/images/admin/up.gif" border="0" alt="点击按时间升序排列"></a><?php else: ?><a href="?s=Admin/Info/Show/type/addtime/order/desc"><img src="./views/images/admin/down.gif" border="0" alt="点击按时间降序排列"></a><?php endif; ?></td>
    <td width="105" >操作</td>
  </tr>
  <?php if(is_array($list_info)): $i = 0; $__LIST__ = $list_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><tr class="tr">
    <td ><input name='ids[]' type='checkbox' value='<?php echo ($gxcms["id"]); ?>' class="noborder" checked="checked"><?php echo ($gxcms["id"]); ?></td>
    <td ><?php if(c('url_html') > 0): ?><a href="javascript:showhtml(<?php echo ($gxcms["id"]); ?>);"><font color="green">生成</font></a><?php endif; ?> <a href="<?php echo ($gxcms["infourl"]); ?>" target="_blank"><?php echo get_color_title(get_replace_html($gxcms['title'],0,60),$gxcms['color']);?></a></td> 
    <td class="td ct"><a href="<?php echo ($gxcms["channelurl"]); ?>"><?php echo ($gxcms["cname"]); ?></a></td> 
    <td class="td ct"><?php echo ($gxcms["hits"]); ?></td>
    <td id="stars_<?php echo ($gxcms["id"]); ?>"><?php if(is_array($gxcms['stararr'])): $i = 0; $__LIST__ = $gxcms['stararr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcmsstars): ++$i;$mod = ($i % 2 )?><span class="star-<?php echo ($gxcmsstars); ?>" onClick="sendStar('<?php echo (get_replace_html($gxcms["title"])); ?>',parseInt('<?php echo ($gxcms["id"]); ?>'),parseInt('<?php echo ($key); ?>'),this)"; title="推荐为<?php echo ($key); ?>星级"></span><?php endforeach; endif; else: echo "" ;endif; ?></td>
    <td class="td ct"><?php echo (date('Y-m-d',$gxcms["addtime"])); ?></td>
    <td class="td ct"><a href="?s=Admin/Info/Add/id/<?php echo ($gxcms["id"]); ?>" title="点击编辑文章">编辑</a> <a href="?s=Admin/Info/Del/id/<?php echo ($gxcms["id"]); ?>" onClick="return confirm('确定删除该文章吗?')" title="点击删除文章">删除</a> <?php if(($gxcms['status'])  ==  "1"): ?><a href="?s=Admin/Info/Status/id/<?php echo ($gxcms["id"]); ?>/sid/0" title="点击隐藏文章">隐藏</a><?php else: ?><a href="?s=Admin/Info/Status/id/<?php echo ($gxcms["id"]); ?>/sid/1" title="点击显示文章"><font color="red">显示</a><?php endif; ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  <tr class="tr"><td colspan="9" class="pages"><?php echo ($listpages); ?></td></tr>
  <tr class="tr"><td colspan="9" valign="middle"><input type="button" id="checkall" value="全/反选" class="bginput">&nbsp;&nbsp;<input type="submit" value="批量审核" class="bginput" onClick="gxform.action='?s=Admin/Info/Statusall/sid/1';" />&nbsp;&nbsp;<input type="submit" value="取消审核" class="bginput" onClick="gxform.action='?s=Admin/Info/Statusall/sid/0';" />&nbsp;&nbsp;<input type="submit" value="批量删除" onClick="if(confirm('确定要删除吗')){gxform.action='?s=Admin/Info/Delall';}else{return false}" class="bginput"/>&nbsp;&nbsp;<input type="button" value="批量生成" id="createhtml" name="Infoid" class="bginput" <?php if((C("url_html"))  !=  "1"): ?>disabled<?php endif; ?>/>&nbsp;&nbsp;<input type="button" id="changecid" name="changecid" class="bginput" value="批量移动"/> <span style="display:none" id="changeciddiv"><select name="changecid"><option value="">选择目标分类</option><?php if(is_array($list_channel_info)): $i = 0; $__LIST__ = $list_channel_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" ><?php echo ($gxcms["cname"]); ?></option><?php if(is_array($gxcms['son'])): $i = 0; $__LIST__ = $gxcms['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" >├ <?php echo ($gxcms["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select> <input type="submit" class="bginput" value="确定转移" onClick="gxform.action='?s=Admin/Info/Changecid';"/></span></td>
  </tr></form>
</table>
<!--浮动层 -->
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery_jqmodal.js"></script>
<link rel='stylesheet' type='text/css' href='./views/css/jquery_jqmodal.css'>
<style>#dia_title{height:25px;line-height:25px}.jqmWindow{height:200px;}</style>
<div class="jqmWindow" id="dialog">
<div id="dia_title"><span class="jqmTitle"></span><a href="javascript:void(0)" class="jqmClose" title="关闭窗口"></a></div>
<div id="dia_content"></div>
</div>
<script language="JavaScript" type="text/javascript">
//弹出浮动层 $('#dialog').jqm({modal: true, trigger: 'a.showDialog'});
$('#dialog').jqm({modal: false, trigger: '#window' , opacity:'0.1'});
</script>
<style>#dia_title{height:25px;line-height:25px}.jqmWindow{height:300px;width:500px;}</style>
<script language="JavaScript" charset="utf-8" type="text/javascript">
function showhtml(id){
	$.get('?s=Admin/Html/Infoid/ids/'+id,null,function(data){
		$("#html_"+id).html('<font color=#ff0000>'+data+'</font>');
		window.setTimeout(function(){
			$("#html_"+id).html('');
		},1000);
	});
}
//ajax请求:选择星级控制
var sendStar = function(infoName,infoid,star,obj){
	var clip_type = '文章';
	sub_infoName = infoName.length>8?infoName.substr(0,8)+'..':infoName+'》';
	$.ajax({
		  type: 'get',
		  url: "?s=Admin/Info/Stars/id/"+infoid+"/sid/"+star,
		  data: infoid,
		  success:function(){
			var collect = obj.parentNode.children;
			for(var i=0;i<collect.length;i++)
			{
				if(star<=i)
				{
					collect[i].className = 'star-0';
				}else{
					collect[i].className = 'star-1';
				}
			}
		}
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