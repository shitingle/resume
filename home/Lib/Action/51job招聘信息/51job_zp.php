<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>51job招聘信息提取</title>
</head>

<body>
<?php
/*
	请选择正确的招聘页面URL进行测试
*/
	set_time_limit(0);	
	$url = 'http://search.51job.com/job/41838787,c.html';
	$s_fname = md5($url).'.txt';	//网页源文件
	$r_fname = md5($url).'_rs.txt';	//正则处理缓存文件
	if(!file_exists($r_fname)){
		if(!file_exists($s_fname)){
			$s = file_get_contents($url);
			file_put_contents($s_fname,$s);
		}else{
			$s = file_get_contents($s_fname);
		}
		$reg = "/<div class=\"s_txt_jobs\">[\s\S]*<div class=\"jobs_com\">/i";	
		$reg_job = '/<td class="sr_bt"[^>]*>([\s\S]*)<\/td>/iU';	
		$reg_gs = '/<strong[^>]*>([\s\S]*)<\/strong>/iU';
		$reg_hy = '/<strong>公司行业：<\/strong>([^<]*)/i';
		$reg_xz = '/<strong>公司性质：<\/strong>([^<]*)/i';
		$reg_gm = '/<strong>公司规模：<\/strong>([^<]*)人/i';
		$reg_fb = '/<td class="txt_2">([\s\S]*)<\/td>/iU';
		$reg_zw = '/<td colspan=\"6\" class=\"txt_4 wordBreakNormal job_detail\">([\s\S]*)<\/td>/iU';
		$reg_email = '/电子邮箱：<\/td><td[^>]*><a>([\s\S]*)<\/a>/iU';
		$reg_detail = '/<p class="txt_font">([\s\S]*)<\/p>/i';
		$reg_intro = '/([\s\S]*)<p /iU';
		$reg_gaddress = '/地址：([^<>]*)/';
		$reg_gcode = '/邮政编码：(\d*)/';
		$reg_gren = '/联系人：([^<>]*)/';
		$reg_web = '/公司网站：<a>([^<>]*)<\/a>/';
		
		preg_match($reg,$s,$d);
		$s = $d[0];
		$regx = array("/\s+/","/\s*<\s*/","/\s*>\s*/","/\s*=\s*/","/<a[^>]*>/i");
		$to = array(' ','<','>','=','<a>');
		$s = preg_replace($regx,$to,$s);
		$s = preg_replace(array("/<!--[\s\S]*-->/U","/<img[^>]*>/i"),'',$s);
		//echo $s.'<hr>';
		
		preg_match($reg_job,$s,$d);
		$RS_data['job_name'] = $d[1];
		preg_match($reg_gs,$s,$d);
		$RS_data['gs'] = $d[1];
		preg_match($reg_hy,$s,$d);
		$RS_data['hy'] = trim($d[1],'&nbsp; <br>');
		preg_match($reg_xz,$s,$d);
		$RS_data['xz'] = trim($d[1],'&nbsp; <br>');
		preg_match($reg_gm,$s,$d);
		$RS_data['gm'] = trim($d[1],'&nbsp; <br>');
		preg_match_all($reg_fb,$s,$d);
		list($RS_data['date'],$RS_data['address'],$RS_data['num'],
		$RS_data['year'],$RS_data['language'],$RS_data['xuel']) = $d[1];
		preg_match($reg_zw,$s,$d);
		$str = str_replace('</span>','',$d[1]);
		$str = preg_replace(array('/<meta[^>]*>/i','/<link[^>]*>/i','/<style[^>]*>[\s\S]*<\/style>/iU','/<span[^>]*>/i'),'',$str);
		 $RS_data['zw'] = $str;
		 preg_match($reg_email,$s,$d);
		$RS_data['email'] = $d[1];
		
		preg_match($reg_detail,$s,$d);
		$str = str_replace(array('</p>','&nbsp;'),'',$d[1]);
		preg_match($reg_intro,$str,$d);
		$RS_data['intro'] = $d[1];
		preg_match($reg_web,$str,$d);
		$RS_data['g_web'] = $d[1];
		preg_match($reg_gaddress,$str,$d);		
		$RS_data['g_address'] = $d[1];
		preg_match($reg_gcode,$str,$d);
		$RS_data['g_code'] = $d[1];
		preg_match($reg_gren,$str,$d);
		$RS_data['g_ren'] = $d[1];
		
		$rs = serialize($RS_data);		
		file_put_contents($r_fname,$rs);
	}else{
		$rs = file_get_contents($r_fname);		
		$RS_data = unserialize($rs);
	}
	echo '<pre>';
	print_r($RS_data);
	echo '</pre>';
?>
</body>
</html>
