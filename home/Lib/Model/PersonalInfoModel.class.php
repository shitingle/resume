<?php
/**
* 
*/
class PersonalInfoModel extends Model
{
	var $sql;
	function add($data)
	{
		$user_id=$data['user_id']; 
	    $name=$data['name'];
	    $sex=$data['sex'];
	    $birthday=$data['birthday'];
	    $edu_background=$data['edu_background'];
	    $specialty=$data['specialty'];

		$this->sql="insert into rp_personal_info(user_id
											,name
											,sex
											,birthday
											,edu_background
											,specialty) values($user_id
																,'$name'
																,'$sex'
																,'$birthday'
																,'$edu_background'
																,'$specialty')";


		 $res=M()->execute($this->sql);
		 if($res==1){
		 	return true;
		 }else{
		 	return false;
		 }
	}

	function update($data)
	{
		$resume_id=$data['resume_id'];
		$user_id=$data['user_id']; 
	    $name=$data['name'];
	    $sex=$data['sex'];
	    $birthday=$data['birthday'];
	    $edu_background=$data['edu_background'];
	    $specialty=$data['specialty'];

		$this->sql="update  rp_personal_info set name='$name'
											,sex='$sex'
											,birthday='$birthday'
											,edu_background='$edu_background'
											,specialty='$specialty' where user_id=$user_id and id=$resume_id";


		 $res=M()->execute($this->sql);
		 if($res==1){
		 	return true;
		 }else{
		 	return false;
		 }
	}


	public function get_sql()
	{
		return $this->sql;
	}
}

?>