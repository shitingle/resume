<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends Action{
    public function index(){
        $this->assign('name',$_SESSION['user_id']); 
    	$this->display('index');
    }
    
    public function login(){
        if($_SESSION['user_id']){
            redirect('index',2,'跳转自用户中心...');
        }else{
            $this->display('login');
        }
    	
    }

    public function login_process(){
       //var_dump($_POST);
        $loginform = D("Loginform");
        if($loginform->check_all($_POST)){
                $_SESSION['user_id']=$_POST['email'];
                redirect('index',2,'登陆成功跳转自用户中心...');
        }else{
            echo $loginform->error;
        }

    }
    
    public function register(){
    	$this->display('register');
    }
    public function register_process(){
        $verify=D('Verify');
        $verify->register_check($_POST);
        if(empty($verify->error)){
           $user=D('User');
           if($user->add_user($_POST)){
                $_SESSION['user_id']=$_POST['email'];
                //redirect('index',2,'注册成功跳转自用户中心...');
                $active_code = base64_encode('rp'.$_SESSION['user_id']);
                $active_link='http://localhost/resumeplan/index.php/user/mail_check?active_code='.$active_code.'&uid='.$_SESSION['user_id'];
                //the next step send mail
                import('@.ORG.Mail');
                SendMail('yangyaodream@qq.com','简历计划邮件激活','激活连接'.$active_link,'程序员杨某');
                echo "resister sucessfull please active your account by email";
           }else{
            echo "用户注册失败";
           };
        }else{
            var_dump($verify->error);
        }


    
    }

    public function ajax_login(){
    //ajax api
    $regform = D("Regform");
    if($_GET['method']){

    switch ($_GET['method']) {
        case 'check_email':
        if(!$regform->check_email($_GET))
        {
         echo $regform->error;
        }else{
            echo "sucess";
        };
         break;
        case 'check_password':
        if(!$regform->check_password($_GET))
            {
                echo $regform->error;
            }else{
                echo "sucess";
            };
         break;
        case "check_repassword":
         if(!$regform->check_repassword($_GET)){
            echo $regform->error;
         }else{
            echo "sucess";
         };
         break;
    }

}

    }

    public function mail_check(){
        $user_id=$_GET['uid'];
        $active_code=base64_decode($_GET['active']);
        if($active_code=="rp".$user_id){
            //active user
             $user=D("User");
             if($user->active_user($_GET)){
                echo "active sucess";
             }else{
                echo "active faill ";
             }

        }

    }

    public function logout(){
    	$_SESSION['user_id']='';
    }
    public function rest_pass(){
    	$this->display('rest_pass');
    }

    public function rest_process(){
        if($_SESSION['user_id']){
            //checkpassword
            $regform = D("Regform");
            $regform->check_password($_POST);
            $regform->check_repassword($_POST);
            if($regform->error!=''){
                //reset password
                //未完待续

            }else{
                echo $regform->error;
            }

        }
    }

    public function forget(){
    	$this->display('forget');
    }
    public function get_pass_back(){

        //验证邮箱。
        $verify =D('Verify');
         $rules=array('check_email_format',
                'check_email_exists');

        foreach ($rules as $rule) {
            if (!$verify->$rule($data,'login')) {
              break;
                }
            };
        //验证成功
        if(empty($verify->error)){
            //构建一个rest密码的连接。
            $email =$_POST['email'];

            $reset_code = base64_encode('rp'.$email);
            $reset_link="http://localhost/resumeplan/index.php/user/reset_check?reset_code=$reset_code&uid=$email";
            //发送连接到指定邮箱。

            //存入session
            $_SESSION['reset_code']=$reset_code;
            $_SESSION['email']=$_POST['email'];

        }

    }



    public function reset_check(){
        //验证重置密码的code
        $reset_code=$_GET['reset_code'];
        if($_SESSION['reset_code']==$reset_code){
            //随机生成一个密码
            $rese_pass=$this->create_password(8);
            //发送到用户邮箱

            //更新至用户表
            $user=D('User');
            $user->get_back_password($rese_pass,$uid);

        }else{
            echo "修改密码连接已经失效，重新找回密码！";
        }
    }


    private function create_password($pw_length = 8)
    {
        $randpwd = '';
        for ($i = 0; $i < $pw_length; $i++) 
        {
            $randpwd .= chr(mt_rand(33, 126));
        }
        return $randpwd;
    }


    
}
?>