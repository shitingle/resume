<?php
// 本类由系统自动生成，仅供测试用途
class BuildResumeAction extends Action{
	public function display(){


		$templ_type=$_GET['templ_type'];
		$templid=$_GET['templ_id'];
		/*
		根据选择的模板id来调用相应的模板。
		构建路径
		然后输出模板
		*/
		$templ =file_get_contents(basepath.'templ/$templ_type/.$templ_id.tmpl');

		$this-assign('templ',$templ);
		$this->display();
	}

}
?>