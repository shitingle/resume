<?php 
class LoginformModel extends Model {

	var $error;

	public function check_all($data){
		$this->check_email($data);
		$this->check_password($data);
		if($this->error==''){
			return true;
		}else{
			return false;
		}

	}

	public function check_email($data){
	       $email =$data['email'];
	        $sql="select count(*) as counts from rp_users where rp_users.email='$email'";
	        $res=M()->query($sql);

	        if(!$email){
	            $this->error = "email is null";
	            return false;
	        }else if($res[0]['counts']==1){
	            return true;
	        };
	}

	public function check_password($data){


		$password= md5("rp".$date['password']);
		$email =$data['email'];
		if($password!=''){
 			$sql="select count(*) as counts from rp_users where rp_users.email='$email' and password='$password'";
	        $res=M()->query($sql);
	        if($res[0]['counts']==1){
	        	return true;
	        }else{
	        	$this->error='wrong account!';
	        	return false;
	        }
		}else{
			$this->error='password can not be null';
			return false;
		}
		  
	}







}
?>
