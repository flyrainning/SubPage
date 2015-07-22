<?php
/*
Plugin Name: SubPage
Plugin URI: http://subpage.fengpiao.xyz
Description: 自定义页面和widgets支持
Version: 0.8
Author: flyrainning
Author URI: http://www.fengpiao.xyz
*/
$subpage_template=ABSPATH.'page/index.php';

if (file_exists(ABSPATH.'core/core.php')) require ABSPATH.'core/core.php';


function subpage_get_page_hash(){
	$_vpn_page_hash='';
	foreach ($_GET as $k => $v) {
		if (empty($v)){
			$k=strtr($k,array('_' => '.'));
			if (strpos($k,'.')>0){
				$_vpn_page_hash=$k;
			}

		}
	}
	return $_vpn_page_hash;
}
function subpage_css($file){
	$t=rand(10000,99999);
	wp_register_style( 'subpage_main_css_'.$t, site_url('css/'.$file) );
	wp_enqueue_style('subpage_main_css_'.$t);
}
function subpage_js($file){
	$t=rand(10000,99999);
	wp_register_script( 'subpage_main_script_'.$t, site_url('js/'.$file) );
	wp_enqueue_script('subpage_main_script_'.$t);
}
function subpage_widget($widget,$caption='',$config='',$option=''){
	the_widget('subpage_super_widget', array(
		'title'=>$widget,
		'caption'=>$caption,
		'config'=>$config,
	),$option);

}

add_filter( 'template_include', 'subpage_template' );
function subpage_template($template){
	
	$_page_h=subpage_get_page_hash();
	if (!empty($_page_h)){
		$template =$subpage_template;
		
		
	}
	
	 
	return $template;
}



include_once dirname( __FILE__ ) . '/subpage_super_widget.php';
add_action( 'widgets_init','subpage_set_superwidget' );
function subpage_set_superwidget(){
	register_widget( 'subpage_super_widget' );
}


register_sidebar(array(
  'name' => 'subpage_sidebar_1' ,
  'id' => 'subpage_sidebar_1',
  'description' => 'subpage 自定义 sidebar',
  'before_title' => '<h1>',
  'after_title' => '</h1>'
));

//add_action('init','start_session');


?>
