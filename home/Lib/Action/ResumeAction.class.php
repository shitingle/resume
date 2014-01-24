<?php
// 本类由系统自动生成，仅供测试用途
class ResumeAction extends Action{
    public function index(){
    	//$this->display('resumeplan/user/index');
    	echo "welcome to resume center";
    }
    
    public function diy(){
        $templet_id=$_GET['id'];

        //依据id，来得到顺序。
        /*
        1.先输出模板。
        2.读取顺序，输出每个模块。
        */
        $resume=D('resume');
        $resume_seq=$resume->get_resume_seq($templet_id);

        $layout=file_get_contents('http://localhost/resumeplan/Public/templ/student/diy.html');
        $this->assign('layout',$layout);

        $seq=$resume_seq[0]['templet_seq'];
        $seq_arr = explode(',',$seq);
        $seq_length=count($seq_arr);
    	$this->display('edit');
    }

    public function save_resume(){
        //先得到界面上有那几个模块。
        //通过映射表，得到具体的表，然后，是模型。case
        $seq=$_POST['seq'];
        $seq_arr = explode(',',$seq);
        if($seq_arr!=null){
            for ($i=0; $i <count($seq_arr) ; $i++) { 
               switch ($seq_arr[$i])
                {
                case 1:
                  $PersonalInfo = D("PersonalInfo");
                  $data['user_id']=5; 
                  $data['name'] = $_POST['name'];
                  $data['sex']=$_POST['sex'];
                  $data['birthday']=$_POST['birthday'];
                  $data['edu_background']=$_POST['edu_background'];
                  $data['specialty']=$_POST['specialty'];
                  if($PersonalInfo->add($data)){
                    $this->redirect('Resume/success');
                  }else{
                    echo "save error".var_dump($data)."".$PersonalInfo->get_sql()."";
                  };
                  break;
                case 2:
                  echo "Number 2";
                  break;
                case 3:
                  echo "Number 3";
                  break;
                default:
                  echo "No number between 1 and 3";
                }
            }
        }
    }
    public function edit()
    {
        //显示编辑页面（这个需要按照顺序和填写的内容输出。最复杂一点）
        //$layout=file_get_contents('http://localhost/resumeplan/Public/templ/student/edit.html');
        //$this->assign('layout',$layout);
        $this->display();  
    }

    public function edit_resume(){
        //先得到界面上有那几个模块。
        //通过映射表，得到具体的表，然后，是模型。case
        $resume_id=$_GET['resume_id'];
        $seq=$_GET['seq'];
        $seq_arr = explode(',',$seq);
        var_dump($_POST);
        if($seq_arr!=''&&$resume_id!=''){
            for ($i=0; $i <count($seq_arr) ; $i++) { 
               switch ($seq_arr[$i])
                {
                case 1:
                  $PersonalInfo = D("PersonalInfo");
                  $data['resume_id']=$resume_id;
                  $data['user_id']=5; 
                  $data['name'] = $_POST['name'];
                  $data['sex']=$_POST['sex'];
                  $data['birthday']=$_POST['birthday'];
                  $data['edu_background']=$_POST['edu_background'];
                  $data['specialty']=$_POST['specialty'];
                  if($PersonalInfo->update($data)){
                    $this->redirect('Resume/success');
                  }else{
                    echo "save error".var_dump($data)."".$PersonalInfo->get_sql()."";
                  };
                  break;
                case 2:
                  echo "Number 2";
                  break;
                case 3:
                  echo "Number 3";
                  break;
                default:
                  echo "No number between 1 and 3";
                }
            }
        }

    }





    
    public function cux(){
    	$this->display('cux');
    }
    

    public function event(){
    	$this->display('event');
    }

    public function templet(){
        //依据 选择的类别来输出
        $category=$_GET['category'];
        $templet=D('templet');

        $res=$templet->get_all_resumes($category);
        //可以依据id来生成编辑简历的url
        $this->display('templet');
    }
    public function success()
    {
        $this->display('success');
    }
}
?>