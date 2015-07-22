<?php
if (!defined('SUBPAGE_PAGE')){
	exit('Access denied');
}
?>

<?php
global $login_messages;
$login_messages='';
$login=false;


$act=getvar('act');
$username=getvar('username');
$passwd=getvar('passwd');

if ($act=='login'){

	if (($username=='') || ($passwd=='')) $login_messages='用户名和密码不能为空';

	if (empty($login_messages)){
	
		//
	
		if (($username=='test')&&($passwd=='test')){
			
				set_session('islogin','true');
				$login=true;
			
			}else{
				$login_messages='用户名或密码错误';
			}
			
		
		}else{
			$login_messages='用户名或密码错误';
		}
	
	
	
	
	}


}else if ($act=='logout'){
	
	set_session('islogin','false');
	
}

if ($login){
	//登录状态跳转
	header("location: /?user.center");
}



?>



<div class="sssp xd" style="height:300px;">

<div class="jd" style="width:400xp;padding-left:30px;">

<img src="/images/sssb3.gif" />

<img src="/images/line.png" class="jd" style="left:520px;top:0px;width:3px;height:260px;"/>
</div>

<div class="jd" style="left:600px;top:0px;padding:30px;">

	<?=(empty($login_messages))?'':'<div ><p class="loginmessage">'.$login_messages.'</p></div>';?>


	<form name="loginform" id="loginform" method="post">
		<input type="hidden" name="act" value="login" />
		<p>
			<label for="user_login">用户名<br>
			<input type="text" name="username" id="user_login" class="input" value="" size="20"></label>
		</p>
		<p>
			<label for="user_pass">密码<br>
			<input type="password" name="passwd" id="user_pass" class="input" value="" size="20"></label>
		</p>
	
		<p class="submit wp-core-ui">
	
			<!--<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="登录">
			<span style="float:right;margin-top:8px;"><a href="/?user.register">没有帐号？</a></span>-->
			<div style="float:left;margin-top:8px;"><a href="/?user.register">没有帐号？</a></div>
			<div class="submit wp-core-ui" style="float:right;">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large"  value="登录">
			</div>
		</p>
	</form>
</div>
</div>
