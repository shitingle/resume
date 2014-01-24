<?php 
class VerifyModel extends Model {
	var $error=array();
	//验证邮箱是否已经存在

//登录校验
  public function login_check($data){
    $rules=array('check_email_format',
                'check_email_exists',
                'check_password_matching');
    foreach ($rules as $rule) {
    if (!$this->$rule($data,'login')) {
      break;
    }

}

  }
//注册校验
  public function register_check($data){
    $rules=array('check_email_format',
                'check_email_exists',
                'check_password_format',
                'check_repassword_matching');

    foreach ($rules as $rule) {
    if (!$this->$rule($data,'register')) {
      break;
    }
}
  }

	public function check_email_exists($data,$pattern){

        $email =$data['email'];
        $sql="select count(*) as counts from rp_users where rp_users.email='$email'";
        $res=M()->query($sql);

      if($pattern=='login'){

        if($res[0]['counts']=1){
            return true;
        }else{
            $this->error[] = "not a valid user account!";
            return false;
        }
      }else if ($pattern=='register'){
        if($res[0]['counts']>0){
            $this->error[] = "already userd ";
            return false;
        }else{
            return true;
        }
      }
}
//验证密码是否匹配
	public function check_password_matching($data){
		$password= md5("rp".$date['password']);
		$email =$data['email'];
		if($password!=''){
 			$sql="select count(*) as counts from rp_users where rp_users.email='$email' and password='$password'";
	        $res=M()->query($sql);
	        if($res[0]['counts']==1){
	        	return true;
	        }else{
	        	$this->error[]='wrong account!';
	        	return false;
	        }
		}else{
			$this->error[]='password can not be null';
			return false;
		}
		  
	}

//验证邮箱格式
  public function check_email_format($data) {
        $email =$data['email'];
        if(strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email)) {
          return true;
        }else{
          $this->error[]='not a valid email !';
          return false;
        }

    }

//验证密码格式
    public function check_password_format($data){
            $score = 0;
           if(preg_match("/[0-9]+/",$data['password']))
           {
              $score ++; 
           }
           if(preg_match("/[0-9]{3,}/",$data['password']))
           {
              $score ++; 
           }
           if(preg_match("/[a-z]+/",$data['password']))
           {
              $score ++; 
           }
           if(preg_match("/[a-z]{3,}/",$data['password']))
           {
              $score ++; 
           }
           if(preg_match("/[A-Z]+/",$data['password']))
           {
              $score ++; 
           }
           if(preg_match("/[A-Z]{3,}/",$data['password']))
           {
              $score ++; 
           }
           if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/",$data['password']))
           {
              $score += 2; 
           }
           if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]{3,}/",$data['password']))
           {
              $score ++ ; 
           }
           if(strlen($data['password']) >= 10)
           {
              $score ++; 
           }
         if(!$data['password']){
            $this->error[] ="password is required";
            return false;
        }
        if($score<1){
             $this->error[] ="password is too weak";
            return false;
        }else{
            return true;
        }
    }
//验证重复密码是否匹配
     public function check_repassword_matching($data)
    {
         if($data['password']!=$data['repasswd']){
            $this->error[]= "password don't match";
            return false;
        }else{
            return true;
        }
    }

}
?>
