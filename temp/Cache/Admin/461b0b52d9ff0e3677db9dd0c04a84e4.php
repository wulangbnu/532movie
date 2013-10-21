<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>用户中心设置</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript">
$(document).ready(function(){
	$("#user_pay_0").click(function(){
		$("#listpay").hide();
	});
	$("#user_pay_1").click(function(){
		$("#listpay").show();
	});
	<?php if(($user_pay)  ==  "1"): ?>$("#listpay").show();<?php endif; ?>	
});
</script>
</head>
<body>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
<form action="?s=Admin/Config/Updateuser" method="post" id="gxform">
<tr class="table_title"><td colspan="2">用户中心设置：</td></tr>    
 <tr class="ji">
  <td class="left">开启会员注册</td>
  <td><input type="radio" class="radio" name="con[user_register]" value="1" <?php if(($user_register)  ==  "1"): ?>checked="checked"<?php endif; ?>/>开启 <input type="radio" class="radio" name="con[user_register]" value="0" <?php if(($user_register)  ==  "0"): ?>checked="checked"<?php endif; ?>/>关闭</td>
</tr> 
<tr class="ji">
  <td class="left">影片评论</td>
  <td><input type="radio" class="radio" name="con[user_comment]" value="1" <?php if(($user_comment)  ==  "1"): ?>checked="checked"<?php endif; ?>/>开启 <input type="radio" class="radio" name="con[user_comment]" value="0" <?php if(($user_comment)  ==  "0"): ?>checked="checked"<?php endif; ?>/>关闭</td>
</tr> 
<tr class="tr">
  <td class="left">评论与留言是否需要登录</td>
  <td><input type="radio" class="radio" name="con[user_post]" value="1" <?php if(($user_post)  ==  "1"): ?>checked="checked"<?php endif; ?>/>开启 <input type="radio" class="radio" name="con[user_post]" value="0" <?php if(($user_post)  ==  "0"): ?>checked="checked"<?php endif; ?>/>关闭</td>
</tr>    
<tr class="tr">
  <td class="left">评论与留言是否需要审核</td>
  <td><input type="radio" class="radio" name="con[user_check]" value="1" <?php if(($user_check)  ==  "1"): ?>checked="checked"<?php endif; ?>/>开启 <input type="radio" class="radio" name="con[user_check]" value="0" <?php if(($user_check)  ==  "0"): ?>checked="checked"<?php endif; ?>/>关闭</td>
</tr>      
<tr class="ji">
  <td class="left">是否开启收费功能</td>
  <td><input type="radio" class="radio" name="con[user_pay]" id="user_pay_1" value="1" <?php if(($user_pay)  ==  "1"): ?>checked="checked"<?php endif; ?>/>开启 <input type="radio" class="radio" name="con[user_pay]" id="user_pay_0" value="0" <?php if(($user_pay)  ==  "0"): ?>checked="checked"<?php endif; ?>/>关闭</td>
</tr>
<tr class="tr" id="listpay" style="display:none">
  <td class="left">需付费观看的栏目<br><br>用户在观看影片的过程中将保存付费观看记录</td>
  <td><?php if(is_array($channel_tree)): $i = 0; $__LIST__ = $channel_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><?php if(get_channel_son($gxcms['id']) == 1): ?><?php if($key%10 == 0): ?><br /><?php endif; ?>
        <input title="<?php echo ($key); ?>" type="checkbox" class="checkbox" value="<?php echo ($gxcms["id"]); ?>" name="con[user_paycid][]" <?php if(in_array(($gxcms["id"]), is_array($user_paycid)?$user_paycid:explode(',',$user_paycid))): ?>checked<?php endif; ?>/><?php echo ($gxcms["cname"]); ?>
    <?php else: ?>
        <?php if(is_array($gxcms["son"])): $i = 0; $__LIST__ = $gxcms["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><?php if($key%10 == 0): ?><br /><?php endif; ?>
            <input title="<?php echo ($key); ?>-2" type="checkbox" class="checkbox" value="<?php echo ($gxcms["id"]); ?>" name="con[user_paycid][]" <?php if(in_array(($gxcms["id"]), is_array($user_paycid)?$user_paycid:explode(',',$user_paycid))): ?>checked<?php endif; ?>/><?php echo ($gxcms["cname"]); ?><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?><br /><br />
    </td>
</tr>     
 <tr class="ji">
  <td class="left">每次观看影片消费点数</td>
  <td><input type="text" name="con[user_money_play]" value="<?php echo ($user_money_play); ?>" class="ct" maxlength="5" size="6"> *</td>
</tr>
 <tr class="tr">
  <td class="left">升级为包月会员需要的点数</td>
  <td><input type="text" name="con[user_money_change]" value="<?php echo ($user_money_change); ?>" class="ct" maxlength="5" size="6"> *</td>
</tr>             
 <tr class="ji">
  <td class="left">注册赠送积分</td>
  <td><input type="text" name="con[user_money_add]" value="<?php echo ($user_money_add); ?>" class="ct" maxlength="5" size="6"> *</td>
</tr>        
<tr class="tr">
  <td class="left">用户操作间隔时间(秒钟)</td>
  <td><input type="text" name="con[user_check_time]" value="<?php echo ($user_check_time); ?>" class="ct" maxlength="5" size="6" title="两次评论/留言/顶踩/评分的间隔时间"> * 
  </td>
</tr> 
<tr class="ji">
  <td class="left">留言本每页数量</td>
  <td><input type="text" name="con[user_page_gb]" value="<?php echo ($user_page_gb); ?>" class="ct" maxlength="2" size="6"> *
  </td>
</tr> 
<tr class="tr">
  <td class="left">评论页每页数量</td>
  <td><input type="text" name="con[user_page_cm]" value="<?php echo ($user_page_cm); ?>" class="ct" maxlength="2" size="6"> *
  </td>
</tr>                 
<tr class="ji">
  <td class="left">脏话文字过滤<br />（词语会被替换成***)</td>
  <td><textarea name="con[user_replace]" style="width:400px;height:50px" title="用|分开，但不要在结尾加|"><?php echo ($user_replace); ?></textarea></td>
</tr>     
<tr class="tr">
  <td colspan="2"><input type="hidden" name="setting_sub" value="true">
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