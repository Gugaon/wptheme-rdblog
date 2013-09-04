<?php 

class RDStickyWidget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'rd_sticky_widget', // Base ID
			'Sticky Content', // Name
			array( 'description' => __( 'Caixa que "gruda" no topo da página e continua visível na rolagem até atingir o rodapé.', 'rd' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		wp_enqueue_script( 'rd-sticky-banner', get_template_directory_uri() . '/sticky-banner.js', array('jquery'), '1.0.0', true );
		echo '<div class="sticky-banner">'.$instance['content'].'</div>';
		/*
			<div class="banner">
				<a href="#" title=""><img src="<?php bloginfo( 'template_url' ); ?>/images/banner_sidebar.png" /></a>
			</div>
			*/
	}

 	public function form( $instance ) {
		if ( isset( $instance[ 'content' ] ) ) {
			$content = $instance[ 'content' ];
		}
?>
		<p><textarea class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo esc_attr( $content ); ?></textarea></p>
<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();

		//TODO improve with better sanitization
		$instance['content'] = ( ! empty( $new_instance['content'] ) ) ? $new_instance['content'] : '';

		return $instance;
	}
}


// register Foo_Widget widget
function register_rdfloatbox_widget() {
    register_widget( 'RDStickyWidget' );
}
add_action( 'widgets_init', 'register_rdfloatbox_widget' );