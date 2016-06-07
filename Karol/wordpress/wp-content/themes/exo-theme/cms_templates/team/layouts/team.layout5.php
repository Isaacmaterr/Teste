<?php
    global $team_options;
    extract($team_options);
?>
<article id="post-<?php the_ID(); ?>" <?php  post_class(); ?>>
    <div class="cshero-team-image-wrap">
        <?php if (has_post_thumbnail()) { ?>
            <div class="cshero-team-image clearfix">
                <?php
                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);;
                if($crop_image){
                    $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                    echo '<img alt="" src="'. esc_url($image_resize) .'" '.$image_style.' />';
                }else{
                    echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'" '.$image_style.' />';
                }
                ?>
            </div>
        <?php } else { ?>
            <?php
                $no_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                if($crop_image){
                    $image_resize = mr_image_resize( $no_image, $width_image, $height_image, true, false );
                }
            ?>
            <div class="cshero-team-image no-image clearfix" <?php echo ''.$crop_image_size;?>>
                <?php if($crop_image){ ?>
                    <img alt="" src="<?php echo ''.$image_resize; ;?>" <?php echo ''.$image_style;?> />
                <?php } else { ?>
                    <img alt="" src="<?php echo ''.$no_image; ;?>" <?php echo ''.$image_style;?> />
                <?php } ?>
            </div>
        <?php } ?>
        <span class="team-overlay" style="background-color: <?php echo ''.$overlay_bg; ?>;"></span>
        <div class="cshero-team-effect-content">
            <div class="cshero-team-effect-top">
                <div class="cshero-team-title-wrap">
                    <?php if ($show_title) { ?>
                        <<?php echo ''.$item_heading_size;?> class="cshero-team-title" style="color: <?php echo ''.$title_team_color; ?>">
                            <?php the_title() ?>
                        </<?php echo ''.$item_heading_size;?>>
                    <?php } ?>
                </div>
                <div class="cshero-team-info-wrap">
                    <?php  if($show_team_position) {                            
                        $team_position = isset($custom['team_position'][0]) ? $custom['team_position'][0] : '';
                        if ($team_position) { ?>
                        <div class="cshero-team-position" style="color: <?php echo ''.$title_team_color; ?>"><?php echo strip_tags ($team_position); ?></div>
                    <?php } } ?>
                    <?php if ($show_category) { ?>
                        <div class="cshero-team-category"><?php echo strip_tags (get_the_term_list($post->ID, 'team_category', '', ', ', '')); ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="cshero-team-effect-bottom">
                <div class="cshero-team-effect-bottom-inner">
                    <div class="cshero-team-title-wrap">
                        <?php if ($show_title) { ?>
                            <<?php echo ''.$item_heading_size;?> class="cshero-team-title">
                                <a <?php if($title_team_color) echo 'style="color:'.$title_team_color.';"';?> title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title() ?></a>
                            </<?php echo ''.$item_heading_size;?>>
                        <?php } ?>
                    </div>
                    <div class="cshero-team-info-wrap">
                        <?php  if($show_team_position) {                            
                            $team_position = isset($custom['team_position'][0]) ? $custom['team_position'][0] : '';
                            if ($team_position) { ?>
                            <div class="cshero-team-position" style="color: <?php echo ''.$title_team_color; ?>"><?php echo strip_tags ($team_position); ?></div>
                        <?php } } ?>
                        <?php if ($show_category) { ?>
                            <div class="cshero-team-category"><?php echo strip_tags (get_the_term_list($post->ID, 'team_category', '', ', ', '')); ?></div>
                        <?php } ?>
                    </div>
                </div>
                <?php if($read_more) echo '<div class="cshero-team-readmore">'.$readmore_link.'</div>';  ?>
            </div>
        </div>
    </div>
    <?php if ($show_description) { ?>
    <div class="cshero-team-content">
        <div class="cshero-team-description">
            <?php 
                $content = get_the_content();
                echo substr(wp_filter_nohtml_kses( $content ), 0, $excerpt_length); 
            ?>
        </div>
    </div>
    <?php } ?>
    <?php if ($show_socials) {
        if (!empty($links)) {
            echo '<div class="cshero-team-social">' . implode('', $links) . '</div>';
        }
    } ?>
</article>
