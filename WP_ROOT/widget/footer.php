<?php
if (!defined('SUBPAGE_WIDGET')){
	exit('Access denied');
}
?>



<div id="wfooter">

<?php


$item=array(
	array(
		'name'=>'Windows XP',
		'ico'=>'xp.png',
		'url'=>'',
		
	),
	array(
		'name'=>'Windows 7',
		'ico'=>'xp.png',
		'url'=>'',
		
	),
	array(
		'name'=>'Windows 8',
		'ico'=>'windows8.png',
		'url'=>'',
		
	),
	


);



?>



<style>
.textcenter{
	text-align:center;
}
.wfimg{
	
	width:50px;
	height:50px;
}
.wftxt{
	width:80px;
}
.wfitem{
	padding:5px;
	margin-left:6px;
	margin-right:6px;
}
</style>

	<div class="xd" style="width:978px;">
	
<?php
	foreach ($item as $v){
		$name=$v['name'];
		$ico=$v['ico'];
		$url=$v['url'];
		echo <<<CODE
		<div class="xd wfitem textcenter" style="float:left"><a href="$url">
			<div class=""><img class="wfimg" src="/images/$ico" /></div>
			<div class="wftxt textcenter">$name</div></a>
		
		</div>
		
CODE;
	
	}
?>
		
	<div class="jd" style="width:150px;height:100px;right:5px;top:95px;">
		
			<span style="color:#9D9D9D;">SubPage.fengpiao.xyz &#169; <?=date('Y')?></span>
		
	</div>	
		
		
	</div>



</div>
