<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}

?>
<nav class="woocommerce-pagination load-more">
    <input id="paged" type="hidden" value="<?php echo !empty($wp_query->query_vars['paged']) ? $wp_query->query_vars['paged'] : 1; ?>">
    <input id="number-items" type="hidden" value="<?php echo !empty($wp_query->query_vars['posts_per_page']) ? $wp_query->query_vars['posts_per_page'] : 10 ; ?>">
    <input id="max_num_pages" type="hidden" value="<?php echo $wp_query->max_num_pages; ?>">
	<button id="woo-load-more" type="button"><?php _e('+ LOAD MORE PRODUCTS', THEMENAME); ?></button>
</nav>
