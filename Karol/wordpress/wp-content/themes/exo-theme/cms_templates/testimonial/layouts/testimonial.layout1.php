
<article id="post-<?php the_ID() ?>"  class="cshero_testimonial_content" style="<?php echo ''.$content_style;?>">
    <?php if($show_image) { ?> 
    <div class="cshero-testimonial-image">
        <?php
        if (has_post_thumbnail()){
            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
            if($crop_image){
                $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                echo '<img alt="" src="'. esc_url($image_resize) .'" '.$image_style.' />';
            }else{
               echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'"  '.$image_style.' />';
            }
        } else { 
            $no_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
            if($crop_image){
                $image_resize = mr_image_resize( $no_image, $width_image, $height_image, true, false );
                echo '<img alt="" src="'. esc_url($image_resize) .'"  '.$image_style.'  />';
            }else{
               echo '<img alt="" src="'. esc_attr($no_image) .'"  '.$image_style.'  />';
            }

        } ?>
    </div>
    <?php } ?>
    <?php if ($show_description == '1') { ?>
        <div class="cshero-testimonial-description">
            <div class="cshero-testimonial-text" style="font-size: <?php echo ''.$excerpt_length_font_size; ?>">
                <?php echo substr(get_the_content($read_more), 0, $excerpt_length); ?>
            </div>
        </div>
    <?php } ?>
    <?php if ($show_title || $show_category) { ?>
        <div class="cshero-testimonial-content">
            <?php if ($show_title) { ?>
                <<?php echo ''.$item_title_heading; ?> class="cshero-testimonial-title" <?php if($content_color){ echo 'style="color:'.$content_color.'"'; } ?>>
                    <?php the_title() ?>
                </<?php echo ''.$item_title_heading; ?>>
            <?php } ?>
            <?php if ($show_category) { ?>
                <div class="cshero-testimonial-category"><?php echo strip_tags (get_the_term_list($post->ID, 'testimonial_category', '', ', ', '')); ?></div>
            <?php } ?>

        </div>
    <?php } ?>
    <?php if($show_readmore) { ?>
    <div class="cshero-readmore">
        <a class="btn btn-default" href="<?php the_permalink(); ?>">
            <?php echo __($read_more, CSCORE_NAME) ; ?>
        </a>
    </div>
    <?php } ?>
</article>

