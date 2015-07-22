<?php

if (!defined('FPAPI')){
	require '../core/core.php';
}

//包含标志
define('SUBPAGE_API',TRUE);


function apiout($data=''){
	header('Cache-Control: no-cache, must-revalidate');
	header('Content-type: application/json');	
	echo json_encode($data);
	die();
}


//取得需要的变量
if (isset($_POST["api"])){//取得API
	$_api_uri_ = $_POST["api"];
}else if (isset($_GET["api"])){
	$_api_uri_ = $_GET["api"];
}else{
	$_api_uri_='';
}


($_api_uri_ == '' ) and apiout(array('result'=>false,'message'=>'api not found '));


//分解$_api变量，得到api文件地址，require api文件
$_api_uri_ = strtr($_api_uri_,array('/' => '.','\\' => '.'));
$_api_uri_ = trim(trim($_api_uri_),'.');

$_api_uri_ =strtr($_api_uri_ ,array('.' => '/')). '.php';

if (file_exists($_api_uri_)) {
	require $_api_uri_;

}else{
	apiout(array('result'=>false,'message'=>'Wrong API Call'));
}

apiout(array('result'=>true));



?>
