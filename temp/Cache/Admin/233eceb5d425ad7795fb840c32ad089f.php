<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>访问路径设置</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<style type="text/css">.input{ font-size:14px}</style> 
<script language="javascript">
function showtab(mid,val,n){
 	for(var i=1;i<=n;i++){
		$('#'+mid+i).hide();
	}
	$('#'+mid+val).show();
}
function showtabs(mid,val,n){
    if(val>0){
		for(var i=1;i<=n;i++){
			$('#'+mid+i).show();
		}
	}else{
		for(var i=1;i<=n;i++){
			$('#'+mid+i).hide();
		}
	}
}
$(document).ready(function(){
	$('#url_rewrite').change(function(){
		showtab('rewrite',$(this).val(),1);
	});
	<?php if(($url_rewrite)  ==  "1"): ?>showtab('rewrite',1,1);<?php endif; ?>
	$('#url_html').change(function(){
		showtabs('html',$(this).val(),13);
		if($(this).val()==1){
			if($('#url_html_rule').val()==1){
				showtabs('html',0,10);
				showtabs('html',1,5);
				$('#html13').show();
			}else{
				showtabs('html',1,13);
				$('#html13').hide();
			}
		}
	});
	<?php if(($url_html)  ==  "1"): ?>showtabs('html',1,13);<?php endif; ?>
	$('#url_html_rule').change(function (){
		if($(this).val()==1){
			showtabs('html',0,10);
			showtabs('html',1,5);
			$('#html13').show();
		}else{
			showtabs('html',1,13);
			$('#html13').hide();
		}
	});	
	<?php if(($url_html)  ==  "1"): ?><?php if(($url_html_rule)  ==  "1"): ?>showtabs('html',0,10);showtabs('html',1,5);$('#html13').show();<?php else: ?>$('#html13').hide();<?php endif; ?><?php endif; ?>
});
</script>
</head>
<body>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
<form action="?s=Admin/Config/Updateurl" method="post" id="gxform"> 
<tr class="table_title"><td colspan="4">访问路径设置</td></tr>
<tr class="tr">
  <td class="left">伪静态重写功能</td>
  <td colspan="3"><select name="con[url_rewrite]" id="url_rewrite" class="w100"><option value="1">开启</option><option value="0" <?php if(($url_rewrite)  ==  "0"): ?>selected<?php endif; ?>>关闭</option></select>　<span id="rewrite1" style="display:none">后缀名：<select name="con[url_html_suffix]"><option value=".html">.html</option><?php if(($url_html_suffix)  ==  ".htm"): ?><option value=".htm" selected>.htm</option><?php else: ?><option value=".htm">.htm</option><?php endif; ?><?php if(($url_html_suffix)  ==  ".shtml"): ?><option value=".shtml" selected>.shtml</option><?php else: ?><option value=".shtml">.shtml</option><?php endif; ?><?php if(($url_html_suffix)  ==  ".shtm"): ?><option value=".shtm" selected>.shtm</option><?php else: ?><option value=".shtm">.shtm</option><?php endif; ?></select></span>
  </td>
</tr>
<tr class="ji">
  <td class="left">网站运行模式</td>
  <td colspan="3"><select name="con[url_html]" id="url_html" class="w100"><option value="1">静态</option><option value="0" <?php if(($url_html)  ==  "0"): ?>selected<?php endif; ?>>动态</option></select>　<span id="html1" style="display:none">后缀名：<select name="con[html_file_suffix]"><option value=".html">.html</option><?php if(($html_file_suffix)  ==  ".htm"): ?><option value=".htm" selected>.htm</option><?php else: ?><option value=".htm">.htm</option><?php endif; ?><?php if(($html_file_suffix)  ==  ".shtml"): ?><option value=".shtml" selected>.shtml</option><?php else: ?><option value=".shtml">.shtml</option><?php endif; ?><?php if(($html_file_suffix)  ==  ".shtm"): ?><option value=".shtm" selected>.shtm</option><?php else: ?><option value=".shtm">.shtm</option><?php endif; ?></select>　目录结构：<select name="con[url_html_rule]" id="url_html_rule"><option value="1">目录1：/[enname]/id/</option><option value="2" <?php if(($url_html_rule)  ==  "2"): ?>selected<?php endif; ?>>目录2：/[dir]/[id]</option><option value="3" <?php if(($url_html_rule)  ==  "3"): ?>selected<?php endif; ?>>目录3：/[dir]/[enname][id]</option></select></span>
  </td>
</tr>
<tr class="ji" id="html2" style="display:none">
  <td class="left">栏目页运行模式</td>
  <td colspan="3"><select name="con[url_html_channel]" id="url_html_channel" class="w100"><option value="1">静态生成</option><option value="0" <?php if(($url_html_channel)  ==  "0"): ?>selected<?php endif; ?>>动态不生成</option></select>
  </td>
</tr> 
 <tr class="ji" id="html3" style="display:none">
  <td class="left">播放页运行模式</td>
  <td colspan="3"><select name="con[url_html_play]" id="url_html_play" class="w100"><option value="1">静态生成</option><option value="2" <?php if(($url_html_play)  ==  "2"): ?>selected<?php endif; ?>>每集生成静态</option><option value="0" <?php if(($url_html_play)  ==  "0"): ?>selected<?php endif; ?>>动态不生成</option></select> 如果每集生成静态则请尽量减小每页生成的数量(否则容易造成超时)
  </td>
</tr>         
<tr class="tr" id="html4" style="display:none">
  <td class="left">网页生成时间间隔</td>
  <td colspan="3"><input type="text" name="con[url_create_time]" maxlength="6" value="<?php echo ($url_create_time); ?>" class="w100"> 静态生成内容页过程中暂停几秒
  </td>
</tr>
<tr class="ji" id="html5" style="display:none">
  <td class="left">每页生成文件数量</td>
  <td colspan="3"><input type="text" name="con[url_create_num]" maxlength="6" value="<?php echo ($url_create_num); ?>" class="w100"> 静态生成网页时每一页生成的数量
  </td>
</tr>
<tr class="ji" id="html6" style="display:none">
  <td class="left">影视栏目页保存目录</td>
  <td colspan="3"><input type="text" name="con[url_dir_video]" maxlength="30" value="<?php echo ($url_dir_video); ?>" class="w100"></td>
</tr>
<tr class="ji" id="html7" style="display:none">
  <td class="left">影视详情页保存目录</td>
  <td colspan="3"><input type="text" name="con[url_dir_videoread]" maxlength="30" value="<?php echo ($url_dir_videoread); ?>" class="w100"></td>
</tr>
<tr class="ji" id="html8" style="display:none">
  <td class="left">影视播放页保存目录</td>
  <td colspan="3"><input type="text" name="con[url_dir_videoplay]" maxlength="30" value="<?php echo ($url_dir_videoplay); ?>" class="w100"></td>
</tr> 
<tr class="ji" id="html9" style="display:none">
  <td class="left">新闻栏目页保存目录</td>
  <td colspan="3"><input type="text" name="con[url_dir_info]" maxlength="30" value="<?php echo ($url_dir_info); ?>" class="w100"></td>
</tr>
<tr class="ji" id="html10" style="display:none">
  <td class="left">新闻详情页保存目录</td>
  <td colspan="3"><input type="text" name="con[url_dir_inforead]" maxlength="30" value="<?php echo ($url_dir_inforead); ?>" class="w100"></td>
</tr>
<tr class="ji" id="html11" style="display:none">
  <td class="left">网站专题页保存目录</td>
  <td colspan="3"><input type="text" name="con[url_dir_special]" maxlength="30" value="<?php echo ($url_dir_special); ?>" class="w100"></td>
</tr>
<tr class="ji" id="html12" style="display:none">
  <td class="left">地图排行榜保存目录</td>
  <td colspan="3"><input type="text" name="con[url_dir_maps]" maxlength="30" value="<?php echo ($url_dir_maps); ?>" class="w100"></td>
</tr> 
<tr class="ji" id="html13" style="display:none">
  <td class="left">是否保存到指定目录</td>
  <td colspan="3"><input type="text" name="con[url_dir_all]" maxlength="30" value="<?php echo ($url_dir_all); ?>" class="w100"> 请填写目录名称，如"html"</td>
</tr>      
<tr class="tr">
  <td colspan="4"><input type="hidden" name="setting_sub" value="true">
    <input class="bginput" type="submit" name="submit" value="提交">
    <input class="bginput" type="reset" name="Input" value="重置" >
  </td>
</tr>
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