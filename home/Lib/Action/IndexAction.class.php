<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action{
    public function index(){
    	$this->display('index');
    }
    public function choose(){
        //var_dump(__APP__);

        $this->display('choose');
    }

    public function prints(){
    	$this->display('print');
    }
    public function about(){
    	$this->display('about');
    }
}
?>