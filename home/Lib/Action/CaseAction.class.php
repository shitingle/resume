<?php
// 本类由系统自动生成，仅供测试用途
class CaseAction extends Action{
    public function index(){
    	//$this->display('resumeplan/user/index');
    	echo "welcome to user center";
    }
    
    public function students(){
    	$this->display('resumeplan/message/students');
    }

    public function graduate(){
        $this->display('resumeplan/message/graduate');
    }

    public function professionals(){
        $this->display('resumeplan/message/professionals');
    }
    
}
?>