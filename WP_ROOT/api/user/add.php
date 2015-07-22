<?php

if (!defined('SUBPAGE_API')){
	fpapi_exit('Access denied');
}


$user=getvar('user');

if (empty($user)) apiout(array('result'=>'false'));

//do something


	
apiout(array(
	'result'=>'true',
	'msg'=>$user.'提交成功',
));
		

?>
