<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>栏目管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
</head>
<body>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
<?php if(($id)  >  "0"): ?><form action="?s=Admin/Channel/Update" method="post" name="gxform" id="gxform">
<?php else: ?>
<form action="?s=Admin/Channel/Insert" method="post" name="gxform" id="gxform"><?php endif; ?> 
<tr class="table_title"><td colspan="2"><?php echo ($tpltitle); ?>栏目：</td></tr>
<tr class="ji"><td class="rt">所属分类：</td>
<td><select name="pid" id="pid" style="width:132px">
  <option value="0">现有分类</option>
  <?php if(is_array($channel_tree)): $i = 0; $__LIST__ = $channel_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><?php if(($gxcms["status"])  >  "0"): ?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $pid): ?>selected<?php endif; ?>><?php echo ($gxcms["cname"]); ?></option><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select> * 不选择将成为一级分类</td></tr>
<tr class="tr"><td width="17%" class="rt">模型分类：</td>
<td ><select name="mid" id="mid" style="width:132px">
  <option value="1" <?php if(($mid)  ==  "1"): ?>selected<?php endif; ?>>视频模型 | video</option>
  <option value="2" <?php if(($mid)  ==  "2"): ?>selected<?php endif; ?>>信息模型 | info</option>
  <option value="9" <?php if(($mid)  ==  "9"): ?>selected<?php endif; ?>>外部链接 | website</option>
  </select> *</td>
</tr>
<tr class="ji"><td class="rt" width="25%" >栏目名称：</td><td><input type="text" name="cname" id="cname" value="<?php echo ($cname); ?>" size="20" maxlength="50" class="ct"> * </td>
</tr>          
<tr class="tr"><td class="rt">栏目排序：</td><td ><input type="text" name="oid"  id="oid" value="<?php echo ($oid); ?>" size="20" maxlength="6" class="ct"> * 越小越前面</td></tr>
<tr class="ji" id="channelseo">
<td class="rt">本栏目使用的模板名：</td>
<td><input type="text" name="ctpl" id="ctpl" value="<?php echo ($ctpl); ?>" size="20" maxlength="100" class="ct"> * </td>
</tr> 
<tr class="tr" id="trcfile">
  <td class="rt">自定义栏目英文别名：</td>
  <td><input type="text" name="cfile" id="cfile" value="<?php echo ($cfile); ?>" size="20" maxlength="50" class="ct"> * 唯一性</td>
</tr>
<tr class="ji">
  <td class="rt">栏目SEO标题：</td>
  <td><input type="text" name="ctitle" id="ctitle" value="<?php echo ($ctitle); ?>" maxlength="50" size="40"></td>
</tr>
<tr class="tr">
  <td class="rt">栏目SEO关键词：</td>
  <td><input type="text" name="ckeywords" id="ckeywords" value="<?php echo ($ckeywords); ?>" maxlength="255" size="40"></td>
</tr>
<tr class="ji">
  <td class="rt">栏目SEO简介：</td>
  <td><textarea name="cdescription" id="cdescription"  style="width:301px; height:40px"><?php echo ($cdescription); ?></textarea></td>
</tr>
<tr class="tr" id="channelwebsite" style="display:none">
  <td class="rt">外部链接地址：</td>
  <td><input type="text" name="cwebsite" id="cwebsite" value="<?php echo (($cwebsite)?($cwebsite):'http://'); ?>" maxlength="255" style="width:400px"></td>
</tr>
<tr class="tr ct">
  <td colspan="2"><input type="hidden" name="id" id="id" value="<?php echo ($id); ?>">
    <input class="bginput" type="submit" value="提交" >
    <input class="bginput" type="reset" name="Input" value="重置" >
  </td>
</tr>
</form>
</table>
<script language="javascript">
function changeid(){
	var $pidval = $('#pid').val();
	if($pidval == 0){
		var $tplname = '_channel';
	}else{
		var $tplname = '_list';
	}
	var $midval = $('#mid').val();
	if($midval == 1){
		$('#ctpl').val('video'+$tplname);
		showseo(1);
	}else if($midval == 2){
		$('#ctpl').val('info'+$tplname);
		showseo(1);
	}else{ 
		showseo(9);
	}
};
function showseo($val){
	if($val<3){
		//$('#cfiles').remove();
		$('#channelseo').css({display:''});
		$('#channelwebsite').css({display:"none"});	
	}else{
		//$('#cfile').after("<span id='cfiles'></span>");
		$('#cfile').val($('#cfile').val().length);
		$('#channelseo').css({display:"none"});
		$('#channelwebsite').css({display:''});	
	}
}
$(document).ready(function(){
	$('#pid').change(function(){
		changeid();
	});
	$('#mid').change(function(){
		changeid();
	});
	<?php if(!empty($id)): ?>showseo(<?php echo ($mid); ?>);<?php endif; ?>
});
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