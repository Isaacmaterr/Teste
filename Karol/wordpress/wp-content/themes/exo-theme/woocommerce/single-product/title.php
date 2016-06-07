<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="woo-nav-links">
	<div class="woo-label">
		<?php _e('Previous / Next', THEMENAME); ?>
	</div>
	<?php
		previous_post_link( '<div class="nav-previous">%link</div>', '<span><i class="fa fa-angle-left"></i></span>' );
		next_post_link(     '<div class="nav-next">%link</div>',     '<span><i class="fa fa-angle-right"></i></span>' );
	?>
</div><!-- .nav-links -->
<h3 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h3>
