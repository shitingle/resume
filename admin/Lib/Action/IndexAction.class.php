<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action{
    public function index(){
     $this->display();
    }
    
    
    public function top(){
    	$this->assign(admin,"杨尧");
    	 $this->display();
    }
    public function left(){
    	
    	 $this->display();
    }
    
    public function right(){
    	
    	 $this->display();
    }
}
?>