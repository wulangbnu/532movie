<?php if (!defined('THINK_PATH')) exit();?><div class="commlist">
<?php if(!empty($list_comment)): ?><?php if(is_array($list_comment)): $i = 0; $__LIST__ = $list_comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): ++$i;$mod = ($i % 2 )?><div class="listA">
    <div class="txt">
         <div>
        <p style="float:right;"><?php echo (date('Y-m-d',$comment["addtime"])); ?></p>
     <b>第<?php echo ($comment["floor"]); ?>楼:&nbsp;<?php echo (remove_xss(htmlspecialchars($comment["username"]))); ?></b>
    </div>
   <div><?php echo (remove_xss(htmlspecialchars($comment["content"]))); ?></div>
</div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if($count > C('user_page_cm')): ?><div class="page"><?php echo ($pages); ?></div><?php endif; ?><?php endif; ?>
<!--发表评论表单 -->
<div class="form">
	<?php if((C('user_post') == 1) and ($userid == 0)): ?><div class="comment_login">发表评论，请登录： <a href="<?php echo ($webpath); ?>index.php?s=user/login">登录</a>&nbsp;|&nbsp;<a href="index.php?s=user/reg">注册</a></div>
        <div id="comentDiv"><textarea name="content" id="comment_content" rows="5" disabled="disabled" onFocus="if(this.value=='我来评论，最多200个字。'){this.value='';};this.select();" onblur="if(this.value==''){this.value='我来评论，最多200个字。';};" maxlength="200" class="txt_in"></textarea></div>
        <p class="under_row"><input id="submitCommBtn" disabled="disabled" onclick="commitFunc()" class="submit" type="button" value="发表评论"/> </p>
    <?php else: ?>
        <textarea name="content" id="comment_content" rows="5" onfocus="if(this.value=='我来评论，最多200个字。'){this.value='';}" onblur="if(this.value==''){this.value='我来评论，最多200个字。';};" maxlength="200" class="txt_in"><?php echo (($content)?($content):'我来评论，最多200个字。'); ?></textarea>
        <p class="under_row"><input id="comment_button" class="submit" onclick="CommentPost();" type="button" value="发表评论"/></p><?php endif; ?>
</div>
</div>