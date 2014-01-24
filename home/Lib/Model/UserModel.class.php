<?php 
class UserModel extends Model {
	public function add_user($data){
		$email ="".$data['email']."";
		$password="".md5("rp".$data['password'])."";
		$status =0;
		$register_time=time();
		$last_login=time();
		$sql="insert into rp_users(email,password,status,register_time,last_login) values('$email','$password',$status,$register_time,$last_login)";
		 $res=M()->execute($sql);
		 if($res==1){
		 	return true;
		 }else{
		 	return false;
		 }
	}


	public function active_user($data){
		$uid=$data['uid'];
		$sql="update rp_user set status = 1 where email =$uid";
		$res=M()->execute($sql);

		if($res==1){
			return true;
		}else{
			return false;
		}


	}




	public function rest_password($data){
		$password="".md5("rp".$data['password'])."";
		$email = $data['email'];
		$sql="update rp_user set password = '$password' where email =$email";
		//未完待续
	}


		public function get_back_password($data,$email){
		$password="".md5("rp".$data)."";
		$sql="update rp_user set password = '$password' where email =$email";
		//未完待续
	}

}
?>
