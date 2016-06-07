<?php
global $smof_data, $post;
if(is_page()){
    $footer_top_widgets = get_post_meta(get_the_ID(), 'cs_footer_top_widgets', true);
    $footer_bottom_enable = get_post_meta(get_the_ID(), 'cs_footer_bottom_enable', true);
    $enable_curve_footer_page = get_post_meta(get_the_ID(), 'cs_enable_curve_footer_page', true);
    $curve_color_footer_page = get_post_meta(get_the_ID(), 'cs_curve_color_footer_page', true);
    $curve_height_footer_page = get_post_meta(get_the_ID(), 'cs_curve_height_footer_page', true);
    if($footer_top_widgets != ''){
        $smof_data['footer_top_widgets'] = $footer_top_widgets;
    }
    if($footer_bottom_enable != ''){
        $smof_data['footer_bottom_widgets'] = $footer_bottom_enable;
    }

    if($enable_curve_footer_page != '') {
    	$smof_data['enable_curve_footer'] = $enable_curve_footer_page;
    }
    if($curve_color_footer_page != '') {
    	$smof_data['curve_footer_color'] = $curve_color_footer_page;
    }

    if($curve_height_footer_page != '') {
    	$smof_data['curve_footer_height'] = $curve_height_footer_page;
    }
}
?>
<?php if($smof_data['footer_top_widgets'] == '1'){
/** data parallax */
$top_parallax = '';
$top_class = '';
if($smof_data['footer_top_bg_parallax'] && !empty($smof_data['background-footer-top']['media'])){
    $top_parallax = " data-stellar-background-ratio='0.6' data-background-width='{$smof_data['background-footer-top']['media']['width']}' data-background-height='{$smof_data['background-footer-top']['media']['height']}'";
    $top_class = ' stripe-parallax-bg';
} 
?>
<footer id="footer-top" class="<?php echo $top_class; ?>"<?php echo $top_parallax; ?>>
	<?php
		$off_bottom_top = get_post_meta(get_the_ID(), 'cs_off_bottom_top_image', true);
		$bottom_top_image_arrow_color = get_post_meta(get_the_ID(), 'cs_bottom_top_image_arrow_color', true);
	?>
	<?php if(isset($smof_data['footer_border_img']) && $smof_data['footer_border_img']){ ?>
        <div class="footer-border-top-image <?php if($off_bottom_top == 'yes') { echo 'hide'; } ?>">
            <img src="<?php echo ''.$smof_data['footer_border_img_select']['url']; ?>" alt="" />
            <span class="footer-top-arrow" style="border-color: <?php echo esc_attr($bottom_top_image_arrow_color ? $bottom_top_image_arrow_color : $smof_data['footer_border_color_arrow']); ?> transparent transparent;"></span>
        </div>
    <?php } ?>

    <?php if(isset($smof_data['enable_curve_footer']) && $smof_data['enable_curve_footer']){ ?>
    	<svg style="fill: <?php echo ($smof_data['curve_footer_color']); ?>;" class="engle-curve curve-position-top" height="<?php echo ($smof_data['curve_footer_height']); ?>" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg"><path d="M0 0 C50 100 50 100 100 0  L100 100 0 100" stroke-width="0"/></svg>
	<?php } ?>
	<div class="<?php echo ($smof_data['footer_full_width'])?'no-container':'container';?>">
		<div class="row">
			<div class="footer-top">
				<?php cshero_sidebar_footer_top(); ?>
			</div>
		</div>
	</div>
</footer>
<?php } ?>
<?php if($smof_data['footer_bottom_widgets'] == '1'){ ?>
<footer id="footer-bottom">
	<div class="<?php echo ($smof_data['footer_full_width'])?'no-container':'container';?>">
		<div class="row">
			<div class="footer-bottom">
				<?php cshero_sidebar_footer_bottom(); ?>
			</div>
		</div>
	</div>
</footer>
<?php } ?>