<?php
class UpAction extends Action{	
    public function _initialize() {
	    header("Content-Type:text/html; charset=utf-8");
		if(is_file(RUNTIME_PATH.'temp/Install/up13.lock')){
			$this->error('GXCMS-1.3版已经升级过了，不需要再次升级!');
		}
    }
	
    public function index(){
		$db_config = array('dbms'=>'mysql','username'=>C('db_user'),'password'=>C('db_pwd'),'hostname'=>C('db_host'),'hostport'=>C('db_port'),'database'=>C('db_name'));	
		$sql = str_replace('gx_',c('db_prefix'),'ALTER TABLE `gx_video` ADD `downurl` LONGTEXT NOT NULL AFTER `playurl` ,ADD `genuine` INT NOT NULL AFTER `downurl`;');
		$this->batQuery($sql,$db_config);
		touch('./temp/Install/up13.lock');
		@unlink('./temp/~app.php');
		@unlink('./temp/~runtime.php');
		$this->assign("jumpUrl",'index.php');
		$this->success('恭喜您！GXCMS-1.3升级完成！');
    }
	
	public function batQuery($sql,$db_config){
	    // 连接数据库
		require THINK_PATH.'/Lib/Think/Db/Driver/DbMysql.class.php';
		$db = new Dbmysql($db_config);
		$db->query($sql);
		return true;
	}								
}
?>