<?php


//定义FPAPI
define('SUBPAGE',TRUE);


define('SUBPAGE_ROOT',dirname(dirname(__FILE__)).'/');

define('LOCATION_PATH_API',SUBPAGE_ROOT.'api/');
define('LOCATION_PATH_PAGE',SUBPAGE_ROOT.'page/');
define('LOCATION_PATH_CONFIG',SUBPAGE_ROOT.'config/');


require(LOCATION_PATH_CONFIG.'config.php');

require_once SUBPAGE_ROOT.'wp-config.php';



(CONFIG_DEBUG)?error_reporting(E_ALL):error_reporting(0);







function set_file_conf($name, $value='') {
	$filename=LOCATION_PATH_CONFIG.$name.'.conf.php';
	file_exists($filename) or touch($filename);
	file_put_contents($filename, '<?php return '.var_export($value, TRUE).'; ?>');
}



function get_file_conf($name,$v=''){
	$filename=LOCATION_PATH_CONFIG.$name.'.conf.php';
	return file_exists($filename)? require($filename):$v;

}


function start_session($session_id=''){
	$a = session_id();
	if ($a == '') session_start();
}
function destory_session(){
	start_session();
	$_SESSION = array();
	session_destroy();
}
function set_session($k,$v=''){
	start_session();
	$_SESSION[$k]=$v;

}
function get_session($k){
	start_session();
	$res=(isset($_SESSION[$k]))?$_SESSION[$k]:'';
	return $res;

}


function getvar($k,$v=''){
	return isset($_REQUEST[$k])?$_REQUEST[$k]:$v;
}
function makedef(&$k,$v=''){
	if (empty($k)) $k=$v;
	return $k;
}

function arraytostr($arr,$parm=','){
	$arr=is_array($arr)?implode($parm, $arr):$arr;
	return trim($arr,$parm);

}
function strtoarray($str,$parm=','){
	if (is_string($str) && trim($str)==''){
		$str=array();
	}else{
		$str=is_array($str)?$str:explode($parm,trim($str,$parm));
	}
	return $str;

}

function utf8($s){
	return iconv("gbk", "UTF-8", $s);
}
function gbk($s){
	return iconv("UTF-8","gbk" ,$s);
}
function jsontoarr($json){
	return json_decode($json,true);
}
function arrtojson($arr){
	return json_encode($arr);
}

?>
