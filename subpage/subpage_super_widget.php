<?php
class sssvpn_super_widget extends WP_Widget {
 
/**
	 * 注册一个WordPress小工具
	 */
	public function __construct() {
		parent::__construct(
	 		'sssvpn_super_widget', // 基本 ID
			'sssvpn_super_widget', // 名称
			array( 
				'description' =>'sssvpn小工具框架',

			),
			array(
				'width' => 400,
				'height' => 350,
			)
		);
	}
 
	/**
	 * 前端显示小工具
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	
		extract( $args );
		$title =isset($instance['title'])?trim($instance['title']):'';
		$caption=isset($instance['caption'])?trim($instance['caption']):'';
		$config=isset($instance['config'])?trim($instance['config']):'';

 
		echo $before_widget;
		if ( ! empty( $caption ) ) echo $before_title . $caption . $after_title;
		
		//正式代码
			if (!defined('SSSVPN_WIDGET')){
				define('SSSVPN_WIDGET',true);
			}
			
			$config=trim($config);
			if (!empty($config)){
				$config=trim($config,';').';';
				eval($config);
			}
			if (!empty($title)){
				$_sssvpn_widget_inc_file_=ABSPATH.'widget/'.$title.'.php';
				if (file_exists($_sssvpn_widget_inc_file_)){
					require $_sssvpn_widget_inc_file_;
				}
			}
		//
		echo $after_widget;
	}
 
	/**
	 * 保存小工具设置选项
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['caption'] = strip_tags( $new_instance['caption'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['config'] = strip_tags( $new_instance['config'] );
 		
 		
		return $instance;
	}
 
	/**
	 * 后台小工具表单
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'caption' ] ) ) {
			$caption = $instance[ 'caption' ];
		}
		else {
			$caption = '';
		}
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = '';
		}
		
		if ( isset( $instance[ 'config' ] ) ) {
			$config = $instance[ 'config' ];
		}
		else {
			$config = '';
		}
		
		$caption_id=$this->get_field_id( 'caption' );
		$caption_name=$this->get_field_name( 'caption' );
		$caption=esc_attr( $caption );
		
		$title_id=$this->get_field_id( 'title' );
		$title_name=$this->get_field_name( 'title' );
		$title=esc_attr( $title );
		
		$config_id=$this->get_field_id( 'config' );
		$config_name=$this->get_field_name( 'config' );
		$config=esc_attr( $config );
		echo <<<CODE
		<div style="width:380px;">
		
		<p>
		<label for="$title_id">widget</label> 
		<input class="widefat" id="$title_id" name="$title_name" type="text" value="$title" />
		</p>
		
		<p>
		<label for="$caption_id">caption</label> 
		<input class="widefat" id="$caption_id" name="$caption_name" type="text" value="$caption" />
		</p>
		
		<p>
		<label for="$config_id">config</label> 
		<textarea class="widefat" id="$config_id" name="$config_name" style="height:200px;">$config</textarea>
		</p>
		</div>
CODE;
	}
 
}
?>
