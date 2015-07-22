<?php 

if (!defined('WP_USE_THEMES')){
	exit('Access denied');
}
if (!defined('SUBPAGE')){
	exit('Access denied');
}
define('SUBPAGE_PAGE',true);


ob_start();
get_header();

$sv_cmd=sssvpn_get_page_hash();

if (!empty($sv_cmd)){
	
	$_page_uri_=ABSPATH.'page/'.strtr($sv_cmd,array('.' => '/')). '.php';
	
	if (file_exists($_page_uri_)) {
		require $_page_uri_;

	}else{
		die('请勿非法提交');
	}

}

get_footer();
?>
