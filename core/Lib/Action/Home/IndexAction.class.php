<?php
class IndexAction extends HomeAction{
    public function index(){
		$this->assign('model','index');	
		$this->assign('webtitle',C('web_name'));
		$this->display('index');
    }
}
?>
