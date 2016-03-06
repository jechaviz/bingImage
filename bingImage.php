<?php
$s = $_GET['s'];
if($s == 'big'){
	$str = file_get_contents('http://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1');
	$array = json_decode($str);
	$imgurl = $array->{"images"}[0]->{"url"};
	if($imgurl){
		header('Location: '.$imgurl);
		exit();
	}else{
		exit('error');
	}
}else{
	$str=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
	if(preg_match("/<url>(.+?)<\/url>/ies",$str,$matches)){
		$imgurl='http://cn.bing.com'.$matches[1];
	}
	if($imgurl){
		header('Location: '.$imgurl);
		exit();
	}else{
		exit('error');
	}
}
?>
