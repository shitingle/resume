<?php 
class ResumeModel extends Model {
 public function add_resume($data,$uid)
	{
		$resume_type=$data['resume_type'];
		$theme=$data['theme'];
		//先创建一份简历，插入数据到简历表
		$sql="insert into rp_resumes(user_id,resume_type,resume_templete_id) values($uid,'$resume_type',$theme)";
		$res=M()->execute($sql);

	}
	public function update_resume($data)
	{
		$sql="update rp_resumes()";
	}

	public function list_resumes($data){
		$sql="";
	}
	public function del_resumes(){
		$sql="";
	}

	public function get_resume_seq($data)
	{
		$sql="select * from rp_templet where templet_id=$data";
		 $res=M()->query($sql);
		 return $res;
	}

}
?>
