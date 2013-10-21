<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>自定义采集节点项目-<?php echo C("web_name");?> </title>
<link rel='stylesheet' type='text/css' href='./views/css/admin_style.css'>
<link rel='stylesheet' type='text/css' href='./views/css/collect.css'>
<link rel='stylesheet' type='text/css' href='./views/css/dialog.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/jquery.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/admin_all.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/collect.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/dialog.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="./views/js/formvalidator.js"></script>

</head>

<body>

<script type="text/javascript">
$(document).ready(function() {			
	$.formValidator.initConfig({formid:"colform",autotip:true,onerror:function(msg,obj){art.dialog({content:msg,lock:true,width:'200',height:'50'})}});
	$("#name").formValidator({onshow:"",onfocus:"请输入名称"}).inputValidator({min:1,onerror:"请输入采集项目名称"});
	 if($("#fixed").attr("checked")==false){
		 //alert('#fixed unchecked.');
	}else{
		 //alert('#fixed checked.');
		 $("#pid").formValidator({onshow:"请选择栏目分类",onfocus:"请选择栏目分类",oncorrect:""}).inputValidator({min:1,onerror:"请选择栏目分类"})
	}
	
 });
function menucheck(){
   if($("#fixed").attr("checked")==false){
		 //alert('#fixed unchecked.');
		 //focus on $("#_desc")
		 $("#pid").formValidator({onshow:"请选择栏目分类",onfocus:"请选择栏目分类",oncorrect:""});
		 return false;
	}else{
		// alert('#fixed checked.');
		 $("#pid").formValidator({onshow:"请选择栏目分类",onfocus:"请选择栏目分类",oncorrect:""}).inputValidator({min:1,onerror:"请选择栏目分类"})
	}
}
</script>

<div class="main">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="table">
<tr>
  <td colspan="6" class="table_title">
  <ul>
  <li><a  href="?s=Admin/CustomCollect/ListShow">采集节点管理</a> </li>
  <li><a href="?s=Admin/CustomCollect/Add">添加采集节点</a></li>
  <li><a href="?s=Admin/CustomCollect/Manage/action/import">导入采集规则</a></li>
  </ul>
  </td>
</tr>
</table>
<div class="nav clear"><ul><li id='set_1' class="now">第一步：基本参数填写</li><li id='set_2'>第二步：采集内容规则设置</li><li id='set_3'>第三步：在线模拟预览结果</li><li id='set_4'>完成并演示</li></ul></div>

<ul class="tab_menu">
<li class="on" id="tab_1" onclick="javascript:show_div('1')">基本规则</li>
<li id="tab_2"  onclick="javascript:show_div('2')">内容规则</li>
<li  id="tab_3"  onclick="javascript:show_div('3')" >模拟测试</li>

</ul>
<div class="clear"></div>
<div id="content">
<form name="colform" action="?s=Admin/CustomCollect/Add" method="post" id="colform">
<input type="hidden" name="data[nid]" value="<?php echo ($id); ?>" />
<div class="content pad-10" id="show_div_1" style="height:auto; display:block;" >
<div class="common-form">
<div id="result" class="none result" style="font-family:微软雅黑,Tahoma;letter-spacing:2px"></div>
<fieldset>
	<legend>节点基本信息</legend>
	<table width="90%" class="table_form" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td width="120" class="left">采集项目名：</td> 
			<td>
			<input type="text" name="data[name]" id="name"  class="input-text"  value="<?php echo ($name); ?>"></input><span id='title_result'></span>
			</td>
		</tr>
		<tr>
			<td width="120">采集目标页面编码：</td> 
			<td>
			<input type="radio" name="data[sourcecharset]" id="_gbk"  <?php if($sourcecharset == 'gbk' or $sourcecharset == ''): ?>checked<?php endif; ?> value="gbk"  class="radio"> GBK
            <input type="radio" name="data[sourcecharset]" id="_utf-8" <?php if(($sourcecharset)  ==  "utf-8"): ?>checked="checked"<?php endif; ?>  value="utf-8" class="radio"> UTF-8
            <input type="radio" name="data[sourcecharset]" id="_big5"  <?php if(($sourcecharset)  ==  "big5"): ?>checked="checked"<?php endif; ?> value="big5" class="radio"> BIG5			
            </td>
		</tr>
        <tr>
			<td width="120">数据栏目分类：</td> 
			<td>
			<input type="radio" name="data[menutype]"  value="1" class="radio" id='fixed' <?php if(($menutype)  ==  "1"): ?>checked="checked"<?php endif; ?>  onclick="show_switch(this,'class','show');show_switch(this,'baserule2','hide');menucheck();">固定分类 
            <input type="radio" name="data[menutype]"  value="2" class="radio"  id='intel' onclick="show_switch(this,'class','hide');show_switch(this,'baserule2','show');menucheck();" <?php if(($menutype)  !=  "1"): ?>checked="checked"<?php endif; ?>  > 智能分类
            </td>
		</tr>
        <tr id="class" <?php if(($menutype)  !=  "1"): ?>style="display:none;"<?php endif; ?>>
			<td width="120">所属栏目分类：</td> 
			<td>
		    <select name="data[cid]" id="pid" style="width:132px">
              <option value="0" >选择栏目分类</option>
              <?php if(is_array($channel_tree)): $i = 0; $__LIST__ = $channel_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><?php if(($gxcms["status"])  >  "0"): ?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>>├─<?php echo ($gxcms["cname"]); ?></option>
              <?php if(is_array($gxcms['son'])): $i = 0; $__LIST__ = $gxcms['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxcms): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($gxcms["id"]); ?>" <?php if(($gxcms["id"])  ==  $cid): ?>selected<?php endif; ?>>├──<?php echo ($gxcms["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            </td>
		</tr>
         <tr>
			<td width="120">采集方式：</td> 
			<td>
		<input type="checkbox" name="data[colmode]" id="_desc"  <?php if($colmode == 'desc'): ?>checked="checked"<?php endif; ?> value="desc" class="radio" >倒序采集
        <input type="checkbox" name="data[direct]" id="_direct"  <?php if($direct == '1'): ?>checked="checked"<?php endif; ?> value="1" class="radio" >采集完毕自动入库
           
            </td>
		</tr>
    
	</table>
</fieldset>
<fieldset>
	<legend>采集网址</legend>
	<table width="90%" class="table_form"  cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td width="120">网址类型：</td> 
			<td>
			<input type="radio" name="data[sourcetype]" onclick="show_url_type(this.value)" id="_1" <?php if($sourcetype == '1' or $sourcetype  == ''): ?>checked<?php endif; ?> value="1"  class="radio"> 序列网址
            <input type="radio" name="data[sourcetype]" onclick="show_url_type(this.value)" id="_2"  value="2"  <?php if(($sourcetype)  ==  "2"): ?>checked="checked"<?php endif; ?> class="radio"> 多个网页
            <input type="radio" name="data[sourcetype]" onclick="show_url_type(this.value)" id="_3"  value="3"  <?php if(($sourcetype)  ==  "3"): ?>checked="checked"<?php endif; ?> class="radio"> 单一网页(直接采集内容页)
            <!--<input type="radio" name="data[sourcetype]" onclick="show_url_type(this.value)" id="_4"  value="4"  <?php if(($sourcetype)  ==  "4"): ?>checked="checked"<?php endif; ?> class="radio"> 从RSS获取	-->
            </td>

		</tr>
		<tbody id="url_type_1" <?php if($sourcetype == '2' or $sourcetype == '3' or $sourcetype == '4'): ?>style="display:none"<?php endif; ?> >
		<tr>
			<td width="120">采集地址：</td> 
			<td>
			 <input type="text" name="urlpage1" id="urlpage_1" size="100"  <?php if(($sourcetype)  ==  "1"): ?>value="<?php echo ($urlpage); ?>"<?php endif; ?>> <input type="button" class="button" onclick="show_url()" value="测试"><br /> 
			 (如：http://www.xxx.com/lists/p/(*).html,页码使用<a href="javascript:insertText('urlpage_1', '(*)')">(*)</a>做为通配符。<br />

			 页码从: <input type="text" name="data[pagesize_start]"  value="<?php echo (($pagesize_start)?($pagesize_start):'1'); ?>" size="4"> 到 <input type="text" name="data[pagesize_end]" value="<?php echo (($pagesize_end)?($pagesize_end):'1'); ?>" size="4"> 每次增加 <input type="text" name="data[par_num]" size="4" value="<?php echo (($par_num)?($par_num):'1'); ?>">
			</td>
		</tr>
		</tbody>
		<tbody id="url_type_2"   <?php if(($sourcetype)  !=  "2"): ?>style="display:none"<?php endif; ?>>
		<tr>
			<td width="120">采集地址：</td> 
			<td>
			<textarea rows="10" cols="80" name="urlpage2" id="urlpage_2" ><?php if(($sourcetype)  ==  "2"): ?><?php echo ($urlpage); ?><?php endif; ?></textarea> <br>每行一条</td>
		</tr>
		</tbody>
		<tbody id="url_type_3"  <?php if(($sourcetype)  !=  "3"): ?>style="display:none"<?php endif; ?>>
		<tr>
			<td width="120">采集地址：</td> 
			<td>
			 <input type="text" name="urlpage3" id="urlpage_3" size="100"  <?php if(($sourcetype)  ==  "3"): ?>value="<?php echo ($urlpage); ?>"<?php endif; ?>>
			</td>
		</tr>
		</tbody>
		<tbody id="url_type_4"  <?php if(($sourcetype)  !=  "4"): ?>style="display:none"<?php endif; ?>>
		<tr>
			<td width="120">采集地址：</td> 
			<td>
			 <input type="text" name="urlpage4" id="urlpage_4" size="100" <?php if(($sourcetype)  ==  "4"): ?>value="<?php echo ($urlpage); ?>"<?php endif; ?>>
			</td>
		</tr>
		</tbody>
		<tr>
			<td width="120">采集地址：</td> 
			<td>
			网址中必须包含 <input type="text" name="data[url_contain]"  value="<?php echo ($url_contain); ?>"> 网址中不得包含  <input type="text" name="data[url_except]"  value="<?php echo ($url_except); ?>">
			</td>
		</tr>
         <tr>
			<td width="120">获取图片方式：</td> 
			<td>
			<input type="radio" name="data[picmode]" id="_list"  value="1" class="radio"  <?php if(($picmode)  ==  "1"): ?>checked="checked"<?php endif; ?> onclick="show_switch(this,'getpic','show');show_switch(this,'baserule8','hide');">从列表页获取 
            <input type="radio" name="data[picmode]" id="_cont"  value="2" class="radio" onclick="show_switch(this,'getpic','hide');show_switch(this,'baserule8','show')"  <?php if(($picmode)  !=  "1"): ?>checked="checked"<?php endif; ?>> 从内容页获取
            </td>
		</tr>
        <tr id="getpic"  <?php if(($picmode)  !=  "1"): ?>style="display:none;"<?php endif; ?>>
			<td width="120">提取链接中图片：</td> 
            <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr><td>
			<textarea rows="5" cols="30" name="data[picurl1_rule]" id="picurl1_rule"><?php echo ($picurl_rule); ?></textarea> <span class='bottom'><a href="javascript:insertText('picurl1_rule', '[内容]')" title="点击使用'[内容]'通配符">[内容]</a>	</span> </td>
			<td width="60">过滤选项：</td> 
			<td>
			<textarea rows="5" cols="40" name="data[picurl1_filter]" id="picurl1_filter"><?php echo ($picurl_filter); ?></textarea>
			<input type="button"   value="常用规则" class="button bottom"  onclick="html_rule('data[picurl1_filter]')">
			</td>
           </tr>
          </table>
</td>
			<!--<td>
			从采集列表页 <textarea rows="5" cols="40" name="data[pic_start]"><?php echo ($pic_start); ?></textarea> 到 <textarea rows="5" name="data[pic_end]" cols="40"><?php echo ($pic_end); ?></textarea> 结束			</td>-->
		</tr>
        <tr>
			<td width="120">获取网址：</td> 
			<td>
			从采集目标页面中 <textarea rows="5"  cols="40" name="data[url_start]" ><?php echo ($url_start); ?></textarea> 到 <textarea rows="5" name="data[url_end]" cols="40"><?php echo ($url_end); ?></textarea> 结束			</td>
		</tr>

	</table>
</fieldset>
</div>
</div>

<div class="content pad-10" id="show_div_2" style="height:auto;display:none">

<div class="clear"></div>


<div class="note" >1、匹配规则请设置开始和结束符，具体内容使用“[内容]”做为通配符 。<BR>2、过滤选项格式为“要过滤的内容[|]替换值”，要过滤的内容支持正则表达式，每行一条。<BR></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
 <div id="col_tab"><strong>采集字段</strong>

<?php if(is_array($base)): $k = 0; $__LIST__ = $base;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$k;$mod = ($k % 2 )?><input type="checkbox" name="data[fields][]" value="<?php echo ($key); ?>"  class="radio"  id="field_<?php echo ($k); ?>"  <?php if(empty($fields)): ?>checked="checked"<?php else: ?><?php if(is_array($fields)): foreach($fields as $k2=>$fo): ?><?php if($fo == $key): ?>checked="checked";<?php endif; ?><?php endforeach; endif; ?><?php endif; ?>  onclick="show_switch(this,'baserule<?php echo ($k); ?>','show')"/><?php echo ($vo); ?><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</td>
 <td>
 <div class="button_show clear"><input type="button" class="button" value="全部展开" onclick="$('#show_div_2').children('fieldset').children('.table_form').show()"> <input type="button" class="button" value="全部合上" onclick="$('#show_div_2').children('fieldset').children('.table_form').hide()"></div>
 </td>
  </tr>
</table>

<fieldset >
	<legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">可选采集规则</a></legend>
	<table width="100%" class="table_form"  cellpadding="0"  cellspacing="0">
<?php if(is_array($base)): $k = 0; $__LIST__ = $base;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$k;$mod = ($k % 2 )?><tr id="baserule<?php echo ($k); ?>" <?php if(($picmode == '1' and $key == 'picurl') or ($menutype == '1' and $key == 'cname') ): ?>style="display:none;"<?php endif; ?> <?php if(!empty($fields)): ?><?php if(in_array($key,$fields)) {echo $key.'style=display:block';}else{echo 'style="display:none;"';} ?><?php endif; ?>>
			<td width="120"><?php echo ($vo); ?>规则：</td> 
			<td>
			<textarea rows="5" cols="30" name="data[<?php echo ($key); ?>_rule]" id="<?php echo ($key); ?>_rule"><?php if($k == 1): ?><?php echo (($title_rule)?($title_rule):"<title>[内容]</title>"); ?><?php else: ?><?php $a=$key.'_rule';echo $$a; ?><?php endif; ?></textarea> <span class='bottom'><a href="javascript:insertText('<?php echo ($key); ?>_rule', '[内容]')" title="点击使用'[内容]'通配符">[内容]</a>	</span> </td>
			<td width="60">过滤选项：</td> 
			<td>

			<textarea rows="5" cols="40" name="data[<?php echo ($key); ?>_filter]" id="<?php echo ($key); ?>_filter"><?php $b=$key.'_filter';echo $$b; ?></textarea>
			<input type="button"   value="常用规则" class="button bottom"  onclick="html_rule('data[<?php echo ($key); ?>_filter]')">
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
</fieldset>

<fieldset>
	<legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">播放地址规则</a></legend>
	<table width="100%" class="table_form"  cellpadding="0" cellspacing="0" >

		  <tr>
			<td width="120">播放列表范围：</td> 
			<td colspan="3" >
			<input type="radio" name="data[range]" onclick="show_switch(this,'field_plist','show')" id="_1"  value="1"  <?php if(($range)  ==  "1"): ?>checked="checked"<?php endif; ?>  class="radio"> 开启<input type="radio" name="data[range]"  onclick="show_switch(this,'field_plist','hide')" id="_2"  <?php if(($range)  !=  "1"): ?>checked="checked"<?php endif; ?> value="2" class="radio"> 关闭</td>
		  </tr>
            
           <tr id="field_plist" <?php if(($range)  !=  "1"): ?>style="display:none;"<?php endif; ?>>
			<td width="120">播放列表范围规则：</td> 
            <td colspan="3">
			从影片内容页面中 <textarea rows="5" cols="30" name="data[playlist_start]"><?php echo ($playlist_start); ?></textarea> 到 <textarea rows="5" name="data[playlist_end]" cols="40"><?php echo ($playlist_end); ?></textarea> 结束			            </td>
		   </tr>
           
		   <tr>
			<td width="120">获取播放地址方式：</td> 
			<td colspan="3" >
			<input type="radio" name="data[playmode]" onclick="show_switch(this,'field_playurl','show')" id="_1" <?php if(($playmode)  ==  "1"): ?>checked="checked"<?php endif; ?>  value="1" class="radio"> 播放页获取单个地址
            <input type="radio" name="data[playmode]" onclick="show_switch(this,'field_playurl','show')" id="_2" <?php if(($playmode)  ==  "2"): ?>checked="checked"<?php endif; ?> value="2" class="radio"> 播放页获取所有地址
            <input type="radio" name="data[playmode]" onclick="show_switch(this,'field_playurl','hide')" id="_3"  <?php if($playmode != '1' and $playmode  != '2'): ?>checked<?php endif; ?> value="3" class="radio"> 内容页直接获取地址</td>
		   </tr>
            
            <tr id="field_playurl"  <?php if($playmode == '3' or $playmode == ''): ?>style="display:none;"<?php endif; ?>>
			<td width="120">播放链接规则：</td> 
           <!-- <td>
		链接中必须包含 <input type="text" name="data[playlink_contain]"  value="<?php echo ($playlink_contain); ?>">不得包含  <input type="text" name="data[playlink_except]"  value="<?php echo ($playlink_except); ?>">
			</td>-->
			<td>
			<textarea rows="5" cols="30" name="data[playlink_rule]" id="playlink_rule"><?php echo ($playlink_rule); ?></textarea> <span class='bottom'><a href="javascript:insertText('playlink_rule', '[内容]')" title="点击使用'[内容]'通配符">[内容]</a>	</span> </td>
			<td width="60">过滤选项：</td> 
			<td>
			<textarea rows="5" cols="40" name="data[playlink_filter]" id="playlink_filter"><?php echo ($playlink_filter); ?></textarea>
			<input type="button"   value="常用规则" class="button bottom"  onclick="html_rule('data[playlink_filter]')">
			</td>
		</tr>
         <tr>
			<td width="120">播放地址范围：</td> 
			<td colspan="3" >
			<input type="radio" name="data[purl_range]" onclick="show_switch(this,'field_purllist','show')" id="_1"  value="1"  <?php if(($purl_range)  ==  "1"): ?>checked="checked"<?php endif; ?>  class="radio"> 开启<input type="radio" name="data[purl_range]"  onclick="show_switch(this,'field_purllist','hide')" id="_2"  <?php if(($purl_range)  !=  "1"): ?>checked="checked"<?php endif; ?> value="2" class="radio"> 关闭 (选择在播放页获取影片播放地址，该功能设置才有效)</td>
		  </tr>
            
           <tr id="field_purllist" <?php if(($purl_range)  !=  "1"): ?>style="display:none;"<?php endif; ?>>
			<td width="120">播放地址范围规则：</td> 
            <td colspan="3">
			从影片播放页面中 <textarea rows="5" cols="30" name="data[playurl_start]"><?php echo ($playurl_start); ?></textarea> 到 <textarea rows="5" name="data[playurl_end]" cols="40"><?php echo ($playurl_end); ?></textarea> 结束			            </td>
		   </tr>
          <tr >
			<td width="120">播放地址规则：</td> 
			<td>
			<textarea rows="5" cols="30" name="data[playurl_rule]" id="playurl_rule"><?php echo ($playurl_rule); ?></textarea> <span class='bottom'><a href="javascript:insertText('playurl_rule', '[内容]')" title="点击使用'[内容]'通配符">[内容]</a>	</span> </td>
			<td width="60">过滤选项：</td> 
			<td>
			<textarea rows="5" cols="40" name="data[playurl_filter]" id="playurl_filter"><?php echo ($playurl_filter); ?></textarea>
			<input type="button"   value="常用规则" class="button bottom"  onclick="html_rule('data[playurl_filter]')">
			</td>
		</tr>
        <tr>
			<td width="120">分集名称设置方式：</td> 
			<td colspan="3" >
			<input type="radio" name="data[vnamemode]"  id="_1"  <?php if(($vnamemode)  !=  "2"): ?>checked="checked"<?php endif; ?> value="1" class="radio" onclick="show_switch(this,'field_vname','hide')"> 系统默认设置<input type="radio" name="data[vnamemode]" onclick="show_switch(this,'field_vname','show')" <?php if(($vnamemode)  ==  "2"): ?>checked="checked"<?php endif; ?> id="_2"  value="2" class="radio"> 采集分集名称</td>
			</tr>
          <tr id="field_vname" <?php if(($vnamemode)  !=  "2"): ?>style="display:none;"<?php endif; ?>>
			<td width="120">分集名称规则：</td> 
			<td>
			<textarea rows="5" cols="30" name="data[vname_rule]" id="vname_rule"><?php echo ($vname_rule); ?></textarea> <span class='bottom'><a href="javascript:insertText('vname_rule', '[内容]')" title="点击使用'[内容]'通配符">[内容]</a>	</span> </td>
			<td width="60">过滤选项：</td> 
			<td>
			<textarea rows="5" cols="40" name="data[vname_filter]" id="vname_filter"><?php echo ($vname_filter); ?></textarea>
			<input type="button"   value="常用规则" class="button bottom"  onclick="html_rule('data[vname_filter]')">
			</td>
		</tr>
	</table>

</fieldset>


</div>

<div class="content pad-10" id="show_div_3" style="height:auto;display:none">
<table width="100%"  class="table_form"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">测试采集结果预览</td>
  </tr>
    <tr>
    <td width="20%">确定要预览吗？<span class="red" id="curren_url"></span></td>
     <td  align="left"><input type="submit" id="test" value="预览" class="bginput"  onclick="colform.action='?s=Admin/CustomCollect/ColTest';"  ></td>
  </tr>

</table>


</div>

    <div class="clear"></div>
    <input name="dosubmit" type="submit" id="dosubmit" value="确认提交" class="button" style="margin-top:10px;">


</form>

</div>
</div>
<script type="text/javascript">
<!--
function html_rule(id, type) {
	art.dialog({id:'test_url',content:'<ul class="ib"><?php if(is_array($files)): $k = 0; $__LIST__ = $files;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): ++$k;$mod = ($k % 2 )?><li><input type="checkbox" name="filter" id="_<?php echo ($k); ?>" class="radio" value="<?php echo ($fvo); ?>"> <?php echo ($key); ?></li><?php endforeach; endif; else: echo "" ;endif; ?><ul><div class="clear"></div><center><input type="button" value="全/反选" class="button"  onclick="selectall(1)" ></center>', width:'450', height:'120', lock: false}, function(){var old = $("textarea[name='"+id+"']").val();var str = '';$("input[name='filter']:checked").each(function(){str+=$(this).val()+"\n";});$((type == 1 ? "#"+id :"textarea[name='"+id+"']")).val((old ? old+"\n" : '')+str);}, function(){art.dialog({id:'test_url'}).close()});
}

-->
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