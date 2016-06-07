<?php
/**
 * Woo cart search
 * @since 1.0.0
 */
add_action('widgets_init', 'register_cart_search_widget');

function register_cart_search_widget() {
    register_widget('WC_Widget_Cart_Search');
}

class WC_Widget_Cart_Search extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'widget_cart_search', // Base ID
            __('Cart & Search', THEMENAME), // Name
            array('description' => __("Display the user's Cart and Search form in the sidebar.", THEMENAME),) // Args
        );
        add_action('wp_enqueue_scripts', array($this, 'widget_scripts'));
    }
    function widget_scripts() {
        wp_enqueue_script('widget_cart_search_scripts', get_template_directory_uri() . '/framework/widgets/widgets.js');
        wp_enqueue_style('widget_cart_search_scripts', get_template_directory_uri() . '/framework/widgets/widgets.css');
    }
    function widget($args, $instance) {
        extract(shortcode_atts($instance,$args));
        //if ( is_cart() || is_checkout() ) return;
        $title = apply_filters('widget_title', empty( $instance['title'] ) ?'' : $instance['title'], $instance, $this->id_base );
        $show_cart = isset($instance['show_cart']) ? $instance['show_cart'] : 0;
        $show_search = isset($instance['show_search']) ? $instance['show_search'] : 1;
        $hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
        ob_start();
		echo isset($before_widget)?$before_widget:'';
		$before_title = isset($before_title)?$before_title:'';
		$after_title = isset($after_title)?$after_title:'';
        if ( $title ) echo "".$before_title . $title . $after_title;
        $total = 0;
        global $woocommerce;
        ?>
        <div class="widget_cart_search_wrap">
            <div class="header">
				<?php if($woocommerce && $show_cart):?>
                <a href="javascript:void(0)" class="icon_cart_wrap" data-display=".shopping_cart_dropdown" data-no_display=".widget_searchform_content">
                    <span class="whishlist">
                        <i class="pe-7s-like"></i>
                        <?php echo _e( "WISHLIST: ", THEMENAME );?>
                        <?php echo !empty($_SESSION['wl_pids']) ? count($_SESSION['wl_pids']) : 0 ; ?>
                    </span>
                    <span class="icon-total">
                        <i class="pe-7s-shopbag cart-icon"></i>
                        <span class="cart_total">
                            <?php echo !empty($woocommerce)?' '.$woocommerce->cart->get_cart_contents_count():'';?>
                        </span>
                        <span class="total">
                            <?php echo _e( "CART: ", THEMENAME );?>
                            <?php echo $woocommerce->cart->get_cart_subtotal(); ?>
                        </span>
                    </span>
                </a>
				<?php endif; ?>
				<?php if($show_search):?>
				<a href="javascript:void(0)" class="icon_search_wrap" data-display=".widget_searchform_content" data-no_display=".shopping_cart_dropdown"><i class="fa fa-search search-icon"></i></a>
				<?php endif; ?>
            </div>
			<?php if($woocommerce && $show_cart):?>
		    <div class="woocommerce-wishlists" style="display: none">
                <span class="wishlists-title"><?php _e('Wishlists', THEMENAME); ?></span>
			     <ul class="cart_list product_list_widget">
                    <?php 
                    if(!empty($_SESSION['wl_pids'])){
                        
                        foreach ( $_SESSION['wl_pids'] as $pid)
                        {
                            $product = new WC_Product($pid);
                            echo '<li class="cart-list clearfix">
                                
                                '.$product->get_image().'
                                <a href="'.$product->get_permalink().'">'.$product->get_title().'</a>
                                <a class="select-option" href="'.$product->get_permalink().'">'.__('Select Options', THEMENAME).'</a>
                            </li>';
                        }
                    }
                    ?>
                </ul>
                <span class="cart-title"><?php _e('Cart', THEMENAME); ?></span>
            </div>
            <div class="shopping_cart_dropdown "></div>
			<?php endif;?>
			<?php if($show_search):?>
            <div class="widget_searchform_content">
                <form role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) );?>">
                    <input type="text" value="<?php echo get_search_query();?>" name="s" placeholder="Search" />
                    <input type="submit" value="<?php echo esc_attr__( 'Search', 'woocommerce' )?>" />
					<?php if($woocommerce):?>
						<?php if(is_woocommerce()):?>
						<input type="hidden" name="post_type" value="product" />
						<?php endif;?>
					<?php endif;?>
                </form>
            </div>
			<?php endif;?>
        </div>
		<?php
        echo isset($after_widget)?$after_widget:'';
        echo ob_get_clean();
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['show_cart'] = $new_instance['show_cart'];
        $instance['show_search'] = $new_instance['show_search'];
		return $instance;
    }
    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $show_cart = isset($instance['show_cart']) ? $instance['show_cart'] : 1;
        $show_search = isset($instance['show_search']) ? $instance['show_search'] : 0;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e( 'Title:', THEMENAME ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_url($this->get_field_id('show_cart')); ?>"><?php _e( 'Show Cart:', THEMENAME ); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id('show_cart')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('show_cart')); ?>">
				<option value="0" <?php selected($show_cart,0); ?>><?php echo __('No',THEMENAME); ?></option>
				<option value="1" <?php selected($show_cart,1); ?>><?php echo __('Yes',THEMENAME); ?></option>
			</select>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('show_search')); ?>"><?php _e( 'Show Search:', THEMENAME ); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id('show_search')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('show_search')); ?>">
				<option value="0" <?php selected($show_search,0); ?>><?php echo __('No',THEMENAME); ?></option>
				<option value="1" <?php selected($show_search,1); ?>><?php echo __('Yes',THEMENAME); ?></option>
			</select>
        </p>
    <?php
    }
}