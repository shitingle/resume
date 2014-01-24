<?php 
class RegformModel extends Model {
    var $error;
    public function check_all($data){
      $this->check_email($data);
      $this->check_password($data);
      $this->check_repassword($data);

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
            $this->error = "email is required";
            return false;
        }else if($res[0]['counts']>0){
            $this->error = "already userd ";
            return false;
        }else{
            return true;
        };
}
    public function check_password($data){
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
            $this->error ="password is required";
            return false;
        }
        if($score<1){
             $this->error ="password is too weak";
            return false;
        }else{
            return true;
        }
    }

     public function check_repassword($data)
    {
         if($data['password']!=$data['repasswd']){
            $this->error= "password don't match";
            return false;
        }else{
            return true;
        }
    }
}
?>
