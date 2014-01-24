<?php
// 本类由系统自动生成，仅供测试用途
class MessageAction extends Action{
    public function index(){
    	//$this->display('resumeplan/user/index');
    	echo "welcome to user center";
    }
    
    public function hire(){
    	$this->display('resumeplan/message/hire');
    }

    public function host(){
        $this->display('resumeplan/message/host');
    }

    public function test(){
        $this->display('resumeplan/message/test');
    }
    
}
?>