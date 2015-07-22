<?php
if (!defined('SUBPAGE_WIDGET')){
	exit('Access denied');
}
?>

<div id="wlogindiv" class="" >

<?php
function check_login(){//自定义登录验证罗辑
	return (get_session('islogin')=='true')?true:false;
}

if (check_login()){
global $_F;
?>

Hello <?=$_F['username']?><br />
<a href="/?user.login&act=logout" target="_self">退出</a>


<?php
}else{
?>
<style>
.winp{
	width:160px;
}
</style>
<div style="padding-bottom:10px;">
<form name="wloginform" id="wloginform" method="post" action="/?user.login">
		<input type="hidden" name="act" value="login" />
		<label for="wuser_login">用户名<br>
		<input type="text" name="username" id="wuser_login" class="winp" value="" ></label>
	
		<label for="wuser_pass">密码<br>
		<input type="password" name="passwd" id="wuser_pass" class="winp" value="" ></label>
	
	

		
			<div style="float:left;margin-top:8px;"><a href="/?user.register">没有帐号？</a></div>
			<div class="submit wp-core-ui" style="float:right;padding-right:10px;">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large"  value="登录">
			</div>
			
		
	
	
	
</form>
</div>
<?php
}
?>
</div>
