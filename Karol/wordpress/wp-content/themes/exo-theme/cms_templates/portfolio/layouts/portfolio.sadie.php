
<?php
global $post, $wp_query, $portfolio_options, $cs_portfolio_id;
$custom = get_post_custom($post->ID);
$portfolio_link = get_post_meta(get_the_ID(), 'cs_portfolio_link', true);
$portfolio_about = get_post_meta(get_the_ID(), 'cs_portfolio_about_project', true);

?>
<div class="cshero-portfolio-container" style="margin:<?php echo ''.$item_margin; ?>;">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="cshero-portfolio-wrapper">
            <div class="cshero-portfolio-pic-wrapper">
                <div class="cshero-portfolio-pic-inner">
                    <?php
                    if (has_post_thumbnail()) {
                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                        if($crop_image){
                            $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                            echo '<img alt="" src="'. esc_url($image_resize) .'" />';
                        }else{
                            echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'" />';
                        }
                        $image_large = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                        $full_image = $image_large[0];
                    } else{
                        $no_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                        if($crop_image){
                            $image_resize = mr_image_resize( $no_image, $width_image, $height_image, true,'c', false );
                            echo '<img alt="" src="'. esc_url($image_resize) .'" />';
                        }else{
                            echo '<img alt="" src="'. esc_attr($no_image) .'" />';
                        }
                        $full_image = $no_image;
                    }
                    ?>
                </div>
            </div>
            <div class="cshero-portfolio-content-wrapper">
                <div class="cshero-portfolio-content-inner">
                    <?php
                        if ($show_title) {
                            echo '<'.$title_size.' class="cshero-portfolio-title"><a style="color:'.$title_color.';" class="overlay-more" title="" href="' . esc_url(get_the_permalink())  . '" ><span>' . get_the_title() . '</span></a></'.$title_size.'>';
                        }
                        if ($show_category) {
                            echo '<div class="cshero-portfolio-category">' . get_the_term_list($wp_query->post->ID, 'portfolio_category', '', ', ', '') . '</div>';
                        }
                        if ($show_description) {
                            echo '<div class="cshero-portfolio-description" style="color:'.$description_color.';">';
                            if ($excerpt_length != -1) {
                                echo cshero_content_max_charlength($portfolio_about, (int) $excerpt_length);
                            } else {
                                echo strip_shortcodes(get_the_content());
                            }
                            echo '</div>';
                        }
                    ?>
                    <div class="link-wrap">
                        <?php
                        if($link_type == 'button'){
                            $readmore_link = '<a class="btn btn-default" title="" href="' . esc_url(get_the_permalink())  . '" >'.__($read_more_text,CSCORE_NAME).'</a>';
                            $zoom_link = '<a class="btn btn-default colorbox" href="'.esc_url($full_image).'" >'.__($zoom_text,CSCORE_NAME).'</a>';
                        } elseif($link_type == 'text'){
                            $readmore_link = '<a class="" title="" href="' . esc_url(get_the_permalink())  . '" >'.__($read_more_text,CSCORE_NAME).'</a>';
                            $zoom_link = '<a class="colorbox" href="'.esc_url($full_image).'" >'.__($zoom_text,CSCORE_NAME).'</a>';
                        } else {
                            $readmore_link = '<a class="icon-link btn btn-default" title="'.__(get_the_title(),CSCORE_NAME).'" href="' . esc_url(get_the_permalink())  . '" ><i class="'.$read_more_icon.'"></i></a>';
                            $zoom_link = '<a class="icon-link colorbox btn btn-default" title="'.__(get_the_title(),CSCORE_NAME).'" href="'.esc_url($full_image).'" ><i class="'.$zoom_icon.'"></i></a>';
                        }
                        if($read_more){
                            echo $readmore_link;
                        }
                        if($zoom){
                            echo $zoom_link;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <span class="overlay-content1"></span>
            <span class="overlay-content2"></span>
            <?php echo '<a class="overlay-more" title="" href="' . esc_url(get_the_permalink())  . '" ></a>'; ?>
        </div>
    </article>
</div>
