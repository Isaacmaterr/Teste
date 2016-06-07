<div id="<?php echo esc_attr($fancybox_id); ?>" class="cshero-fancybox-wrap <?php echo esc_attr($fancy_wrap.' ' .$icon_animate_type. ' '.$custom_class.' '.$content_align); ?>" <?php echo ''.$box_style;?>>
    <style type="text/css" scoped>
        #<?php echo esc_attr($fancybox_id); ?>.<?php echo esc_attr($fancy_wrap);?>:hover .fancy-icon {
            background-color:<?php echo esc_attr($icon_bg_color_hover);?> !important;
            border-color:<?php echo esc_attr($border_color_hover);?> !important;
            color:<?php echo esc_attr($icon_color_hover);?> !important;
        }
        #<?php echo esc_attr($fancybox_id); ?>.<?php echo esc_attr($fancy_wrap);?> .cshero-read-more:hover i {
            color: <?php echo esc_attr($box_bg_hover); ?>;
        }
        #<?php echo esc_attr($fancybox_id); ?>.<?php echo esc_attr($fancy_wrap);?> .fancy-icon.icon-hover-<?php echo ''.$icon_hover_style;?>:after{
    		-webkit-border-radius:<?php echo esc_attr($border_radius);?>;
    		-moz-border-radius:<?php echo esc_attr($border_radius);?>;
    		-ms-border-radius:<?php echo esc_attr($border_radius);?>;
    		-o-border-radius:<?php echo esc_attr($border_radius);?>;
    		border-radius:<?php echo esc_attr($border_radius);?>;
    		background-color:<?php echo esc_attr($icon_bg_color_hover);?>;
    		border-width:<?php echo esc_attr($border_width);?>;
    		border-style:<?php echo esc_attr($border_style);?>;
    		border-color:<?php echo esc_attr($border_color_hover);?>;
	   }
        <?php if ( isset( $box_bg ) && $box_bg ) : ?>
        #<?php echo esc_attr($fancybox_id); ?> {
            background: <?php echo esc_attr($box_bg); ?>;
        }
        <?php endif; ?>

        <?php if ( isset( $box_bg_hover ) && $box_bg_hover ) : ?>
        #<?php echo esc_attr($fancybox_id); ?>:hover {
            background: <?php echo esc_attr($box_bg_hover); ?>;
        }
        <?php endif; ?>

        <?php if ( $imgage_border_bottom_color ) : ?>
        #<?php echo esc_attr($fancybox_id); ?> .cshero-fancybox-image img {
            border-bottom: 4px solid <?php echo esc_attr($imgage_border_bottom_color); ?>;
        }
        <?php endif; ?>

        <?php if ( $content_color ) : ?>
        #<?php echo esc_attr($fancybox_id); ?> .content {
            color: <?php echo esc_attr($content_color); ?>;
        }
        <?php endif; ?>

       <?php if ( isset( $title_color_hover ) && $title_color_hover ) : ?>
       #<?php echo esc_attr($fancybox_id); ?>:hover .cshero-title-main,
       #<?php echo esc_attr($fancybox_id); ?>:hover .sub-title {
            color: <?php echo esc_attr($title_color_hover); ?>;
       }
       <?php endif; ?>
       <?php if ( isset( $content_color_hover ) && $content_color_hover ) : ?>
       #<?php echo esc_attr($fancybox_id); ?>:hover .content {
            color: <?php echo esc_attr($content_color_hover); ?>;
       }
       <?php endif; ?>
	</style>
    <div class="cshero-fancybox-title-image clearfix">
        <?php if (!empty($image_url)) { ?>
            <div class="cshero-fancybox-image left">
                <img class="img" src="<?php echo esc_attr($image_url); ?>" alt="<?php echo ''.$title; ?>" />
                <img class="img-hover" src="<?php echo esc_attr($image_url_hover); ?>" alt="<?php echo ''.$title; ?>" />
            </div>
        <?php } ?>
        <<?php echo ''.$heading_size ?> class="cshero-fancybox-title-wrap" <?php echo ''.$title_style; ?> >
            <span class="cshero-title-main"><?php echo ''.$title; ?></span>
            <span class="sub-title"><?php echo ''.$sub_title; ?></span>
        </<?php echo ''.$heading_size; ?>>
    </div>
    <?php if ( !empty( $content ) || !empty( $read_more ) ) : ?>
        <div class="cshero-fancybox-content">
            <?php if ( $content ) : ?>
                <div class="content">
                    <?php echo ''.$content; ?>
                </div>
            <?php endif; ?>
            <div class="cshero-read-more" <?php if ( $read_more_margin ) echo 'style="margin: '.esc_attr($read_more_margin).'"'; ?>>
                <a class="read-more-link <?php if($read_btn){ echo ''.$button_type. ' btn ' . $button_size;} ?>" title="<?php echo esc_attr($read_more); ?>" href="<?php echo esc_url($link_show_more); ?>">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>