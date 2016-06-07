<?php
    global $smof_data, $post;
    /** value */
    $c_pageID = empty($post->ID)? null : $post->ID;
    $body_class = $wrapper_class = '';
    /** header setting */
    global $header_setings;
    $header_setings = cshero_generetor_header_setting();
    $body_class = $header_setings->body_class;
    /** site id */
    $header_select = cshero_getHeader();
    if(is_page()){
        $bg_parallax = get_post_meta($post->ID, 'cs_header_bg_parallax', true);
        $background_image = get_post_meta($c_pageID, 'cs_header_bg_image', true);
        if(get_post_meta($c_pageID, 'cs_header_setting', true)){
            $smof_data['header_fixed_top'] = get_post_meta($c_pageID, 'cs_header_fixed_top', true);
        }
        if(get_post_meta($c_pageID, 'cs_body_custom_class', true)){
            $body_class .= ' '.get_post_meta($c_pageID, 'cs_body_custom_class', true);
        }    
        if ($background_image) {
            $attachment_image = wp_get_attachment_metadata($background_image, 'full');
            $smof_data['background-header']['media']['height'] = $attachment_image['height'];
            $smof_data['background-header']['media']['width'] = $attachment_image['width'];
        }
        if($bg_parallax != ''){
            $smof_data['header_bg_parallax'] = $bg_parallax;
        }
    }
    $border_body = get_post_meta($c_pageID, 'cs_border_body', true);
    $border_body_color = get_post_meta($c_pageID, 'cs_border_body_color', true);
    $header_top_widgets = get_post_meta(get_the_ID(), 'cs_header_top_widgets', true);
    if($border_body == '1') {
        $body_class .= ' border-body-fixed';
    }
    if($smof_data['header_fixed_top']){
        $body_class .= ' body-header-fixed-top';
    }
    if (!$smof_data['header_sticky']) {
        $body_class .= ' no-sticky-desktop';
    }
    if($header_top_widgets != ''){
        $smof_data['header_top_widgets'] = $header_top_widgets;
    }
    if ($smof_data['header_top_widgets'] =='1') {
        $body_class .= ' header-top-active';
    }
?>
<!DOCTYPE html>
<html class="<?php if($border_body == '1') { echo 'border-html-fixed'; } ?>" <?php language_attributes(); ?>>
<head>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <?php wp_head(); ?>
</head>
<?php
/** render options */
$hidden_class='';
if(isset($smof_data['enable_hidden_sidebar']) && $smof_data['enable_hidden_sidebar']){
    $hidden_class = 'meny-right';
}
?>
<body <?php body_class($body_class.' '.$hidden_class.' header-'.$header_select .' '.cshero_getCSSite()); ?> id="wp-exo-theme">
    <?php if($border_body == '1') { ?>
        <span class="body-line line-top" style="<?php echo ''.$border_body_color; ?>"></span>
        <span class="body-line line-right" style="<?php echo ''.$border_body_color; ?>"></span>
        <span class="body-line line-bottom" style="<?php echo ''.$border_body_color; ?>"></span>
        <span class="body-line line-left" style="<?php echo ''.$border_body_color; ?>"></span>
    <?php } ?>
    <?php if($smof_data['page_loader']=='1'):?>
        <div id="cs_loader" class="<?php echo esc_attr($smof_data['page_loader_style']);?>">
            
            <?php 
                $page_loader_color = HexToRGB($smof_data['page_loader_color']['color'],$smof_data['page_loader_color']['alpha']);
                $page_loader_color2 = HexToRGB($smof_data['page_loader_color2']['color'],$smof_data['page_loader_color2']['alpha']);
                require_once 'framework/includes/loading/'.$smof_data['page_loader_style'].'.php'; ?>
        </div>
    <?php endif;?>
    <div id="wrapper" class="<?php if( $smof_data['page_loader'] == '1'):?>cs_hidden<?php endif;?> <?php if (!$smof_data['header_sticky_mobile']) { echo 'exo-no-sticky-mobile'; } ?> <?php if (!$smof_data['header_sticky_tablet']) { echo 'exo-no-sticky-tablet'; } ?>">
        <header class="header-wrapper <?php if (!$smof_data['header_sticky_mobile']) { echo 'no-sticky-mobile-wrapper'; } ?> <?php if (!$smof_data['header_sticky_tablet']) { echo 'no-sticky-tablet-wrapper'; } ?>">
            <?php cshero_header(); ?>
        </header>
        <?php require_once 'framework/includes/page-title.php'; ?>

