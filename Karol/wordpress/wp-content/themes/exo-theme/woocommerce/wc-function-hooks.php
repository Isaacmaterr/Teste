<?php
/*-----------HACK WC Widget---------------------*/
add_action( 'widgets_init', 'override_woocommerce_widgets', 15 );
function override_woocommerce_widgets() { 
    if ( class_exists( 'WC_Widget_Product_Categories' ) ) {
        unregister_widget( 'WC_Widget_Product_Categories' );
        include_once( 'widgets/product_categories.php' );
        register_widget( 'Custom_WC_Widget_Product_Categories' );
    } 
}

/*social share list*/
function cms_socials_share($url, $image, $title=''){
	ob_start();
	?>	
		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($url);?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a>
		<a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode(__('Check out this article',THEMENAME));?>:%20<?php echo urlencode($title);?>%20-%20<?php echo urlencode($url);?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a>
		<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode($url);?>&amp;media=<?php echo urlencode($image);?>&amp;description=<?php echo urlencode($title);?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a>
		<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($url);?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a>
		<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode($url);?>&amp;title=<?php echo urlencode($title);?>"><span class="share-box"><i class="fa fa-linkedin"></i></span></a>
	
	<?php
	return ob_get_clean();
}

if(!function_exists('cms_social_share_product')){
	function cms_social_share_product(){
		global $post;
		$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
    	$img = esc_attr($attachment_image[0]);
    	$title = get_the_title();
    	echo '<div class="cms-product-share-wrap"><label>'.__('Share:', THEMENAME).' </label>'.cms_socials_share( get_the_permalink(),$img, $title).'</div>';
	}
}
?>