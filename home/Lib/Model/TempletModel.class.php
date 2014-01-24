<?php 
class TempletModel extends Model {
	public function get_all_resumes($data){
		$sql="select * from rp_templet where templet_category='$data'";
		 $res=M()->query($sql);
		 return $res;
	}
	
}
?>