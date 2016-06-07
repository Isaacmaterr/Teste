<?php 
global $smof_data;
/*
 * Convert HEX to GRBA
 */
if(!function_exists('HexToRGB')){
    function HexToRGB($hex,$opacity = 1) {
        $hex = str_replace("#",null, $hex);
        $color = array();
        if(strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
            $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
            $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            $color['a'] = $opacity;
        }
        else if(strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
            $color['a'] = $opacity;
        }
        $color = "rgba(".implode(', ', $color).")";
        return $color;
    }
}
?>
/* local fonts */
<?php for ($i = 1 ; $i <= 3; $i++):
if(!empty($smof_data["typography_local_$i"])):
    $local_fonts = $smof_data["typography_local_$i"];
    $local_fonts_selector = $smof_data["typography_local_selector_$i"];
    ?>
    @font-face {
        font-family: '<?php echo esc_attr($local_fonts); ?>';
        src: url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.eot');
        src: url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.eot?#iefix') format('embedded-opentype'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.woff') format('woff'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.ttf') format('truetype'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/<?php echo esc_attr($local_fonts);?>.svg#<?php echo esc_attr($local_fonts);?>') format('svg');
        font-weight: normal;
        font-style: normal;
    }
    <?php echo !empty($local_fonts_selector) ? $local_fonts_selector."{font-family:".$local_fonts."!important}" : '' ; ?>
<?php endif; endfor; ?>
/* =========================================================        Reset Body    ========================================================= */
<?php
$body_padding = $smof_data['main_content_padding'];
if($body_padding): ?>
    .csbody:not(.home) #primary {
        background-image:  url("<?php echo esc_url($smof_data['bg_content_image']); ?>");
		background-repeat: <?php echo esc_attr($smof_data['bg_content_repeat']); ?>;
		<?php if ($smof_data['bg_content_full']=="1") { ?>
		background-size: cover;
		background-attachment: fixed;
		<?php } ?>
    }
<?php endif; ?>
	#primary.no_breadcrumb_page > .container {
		margin-top: <?php echo esc_attr($smof_data['main_content_margin_top']); ?>;
		margin-bottom: <?php echo esc_attr($smof_data['main_content_margin_bottom']); ?>;
	}
	.csbody:not(.home) #primary > .container {
		padding: <?php echo esc_attr($body_padding); ?>;
	}
	.csbody:not(.home) #primary > .container,
	.csbody:not(.home) #primary > .no-container{
		 background-color:  <?php echo esc_attr($smof_data['content_bg_color']); ?>;
	}
.csbody a {
    color: <?php echo esc_attr($smof_data['link_color']); ?>;
}
.csbody a:hover,
.csbody a:focus,
.csbody a:active,
.csbody a.active,
.csbody .magazine_posts-layout1 .post-list-content .cms-blog-title a:hover,
.csbody .magazine_posts-layout1 .magazine-post-lists .cms-post-list-readmore a:hover {
    color: <?php echo esc_attr($smof_data['link_color_hover']); ?>;
}
.color-primary,
.primary-color,
.primary-color *,
#cs-breadcrumb-wrapper a:hover,
.custom-heading-wrap.title-primary-color h2,
.custom-heading-wrap.title-primary-color h3,
.custom-heading-wrap.title-primary-color h4,
.custom-heading-wrap.title-primary-color h5,
.custom-heading-wrap.title-primary-color h6 {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.color-secondary,
.custom-heading-wrap.title-secondary-color h2,
.custom-heading-wrap.title-secondary-color h3,
.custom-heading-wrap.title-secondary-color h4,
.custom-heading-wrap.title-secondary-color h5,
.custom-heading-wrap.title-secondary-color h6{
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}

.bg-primary-color,
ul.cs_list_circle li:before, 
ul.cs_list_circleNumber li:before{
    background-color:<?php echo esc_attr($smof_data['primary_color']); ?>;
}
.bx-pager-inner li .bx-pager-link:hover,
.bx-pager-inner li .bx-pager-link.active{
    background-color: <?php echo HexToRGB($smof_data['secondary_color'],0.8); ?>;
}
/*** Boxed Body ***/
<?php if($smof_data['layout'] == '1'): ?>
    #wp-exo-theme #cshero-header {
        max-width: <?php echo esc_attr($smof_data['layout_width']); ?>;
    }
    #wp-exo-theme #wrapper {
        max-width: <?php echo esc_attr($smof_data['layout_width']); ?>;
        margin: auto;
        background-color: <?php echo esc_attr($smof_data['content_boxed_color']); ?>;
    }
    #primary > .no-container > .row {
        margin-left: 0;
        margin-right: 0;
    }
    .admin-bar.wpb-js-composer .entry-footer {
         position: inherit;
    }
<?php endif; ?>
/*** End Boxed Body ***/
/* =========================================================        Start Typo    ========================================================= */
body.csbody h1,
body.csbody h1 > a {
    color:<?php echo esc_attr($smof_data['typography_h1']['color']); ?>;
}
body.csbody h2,
body.csbody h2 > a,
body.csbody h2 > label {
    color: <?php echo esc_attr($smof_data['typography_h2']['color']); ?>;
}
body.csbody h3,
body.csbody h3 > a,
body.csbody h3 > label {
    color:<?php echo esc_attr($smof_data['typography_h3']['color']); ?>;
}
body.csbody h4,
body.csbody h4 > a,
body.csbody h4 > label {
   color: <?php echo esc_attr($smof_data['typography_h4']['color']); ?>;
}
body.csbody h5,
body.csbody h5 > a {
   color: <?php echo esc_attr($smof_data['typography_h5']['color']); ?>;
}
body.csbody h6,
body.csbody h6 > a {
   color:<?php echo esc_attr($smof_data['typography_h6']['color']); ?>;
}

/* ========================================    Start Header   ================================ */
/* Cart */
.shopping_cart_dropdown.active,
.widget_searchform_content.active {
    top: <?php echo esc_attr($smof_data['nav_height']); ?> !important;
}
#cshero-header.header-fixed .shopping_cart_dropdown.active,
#cshero-header.header-fixed .widget_searchform_content.active {
    top: <?php echo esc_attr($smof_data['sticky_header_height']); ?> !important;
}
/* Header V4 */
.header-v4 #cshero-header{
    height:<?php echo esc_attr($smof_data['nav_height']); ?>;
}
.header-v4 #cshero-header.header-fixed {
    height:<?php echo esc_attr($smof_data['sticky_header_height']); ?>;
}
.header-menu {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* Header Color Option */
    #header-top h1,#header-top h2,#header-top h3,
    #header-top h4,#header-top h5,#header-top h6{
        color: <?php echo esc_attr($smof_data['header_top_headings_color']); ?>;
    }
    #header-top {
        background-color: <?php echo HexToRGB($smof_data['header_top_bg_color']['color'],$smof_data['header_top_bg_color']['alpha']);?>;
        color:<?php echo esc_attr($smof_data['header_top_text_color']); ?> ;
    }
    #header-top a{
        color: <?php echo esc_attr($smof_data['header_top_link_color']); ?>;
    }
    #header-top a:hover,
    #header-top a:focus,
    #header-top a:active{
        color: <?php echo esc_attr($smof_data['header_top_link_hover_color']); ?>;
    }
    
/* Default Main Navigation Header Widget */
    #cshero-header .cshero-header-content-widget {
        height:<?php echo esc_attr($smof_data['nav_height']); ?>;
        position: relative;
    }
    #cshero-header .cshero-header-content-widget a{
        padding:<?php echo esc_attr($smof_data['default_search_padding']); ?>;
        display:inline-block;
    }
    #cshero-header .cshero-header-content-widget .cshero-hidden-sidebar-btn > a{
        padding:<?php echo esc_attr($smof_data['default_hidden_sidebar_padding']); ?>;
    }
/* End Default Main Navigation Header Widget */

#cshero-header{
    padding:<?php echo esc_attr($smof_data['header_padding']); ?>;
    margin:<?php echo esc_attr($smof_data['header_margin']); ?>;
}
#cshero-header .logo > a {
    padding: <?php echo esc_attr($smof_data['padding_logo']); ?>;
    margin:<?php echo esc_attr($smof_data['margin_logo']); ?>;
    line-height:<?php echo esc_attr($smof_data['nav_height']); ?>;
}
#cshero-header.header-fixed .logo img {
    max-height: <?php echo esc_attr($smof_data['header_sticky_logo_max_height']); ?> !important;
}
@media (max-width: 992px) {
    #wrapper #cshero-header #cshero-main-menu-mobile {
        top: <?php echo esc_attr($smof_data['nav_height']); ?>;
    }
    #cshero-header .cshero-menu-mobile .btn-navbar:hover i:after,
    #cshero-header.mobile-arrow-effect .btn-navbar i:after {
        -webkit-box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
           -moz-box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
            -ms-box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
             -o-box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
                box-shadow: 0 2px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 9px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>, 0 16px 0 2px <?php echo esc_attr($smof_data['primary_color']); ?>;
    }
    body.csbody.body-header-fixed-top {
        margin-top: <?php echo esc_attr($smof_data['nav_height']); ?>;
    }
}

/*** Border Bottom ***/
#wrapper #cshero-header {
    border-style:<?php echo esc_attr($smof_data['header_border_style']);?>;
    border-color:<?php echo esc_attr($smof_data['header_border_color']);?>;
    border-width:<?php echo esc_attr($smof_data['header_border_width']);?>;
}
.cshero-menu-dropdown > ul > li > a,
.menu-pages .menu > ul > li > a,
.cshero-mobile-menu > li > a,
.meny-right .hidden-sidebar-text span i {
    <?php if(isset($smof_data['menu_first_level_text_uppecase']) && $smof_data['menu_first_level_text_uppecase']=='1'): ?>
        text-transform: uppercase;
    <?php endif; ?>
}

    <?php if (!$smof_data['header_sticky_tablet']): ?>
        @media (max-width: 992px) and (min-width: 768px) {
            #header-sticky{
                display: none;
            }
        }
    <?php endif; ?>
    <?php if (!$smof_data['header_sticky_mobile']): ?>
        @media (max-width: 767px) {
            #header-sticky{
                display: none;
            }
        }
    <?php endif; ?>
/*** Start Main Menu ***/
    /* General Option */
    .cshero-menu-dropdown .multicolumn,
    .cshero-menu-dropdown .multicolumn > li.group > a {
        background-color: <?php echo esc_attr($smof_data['menu_sub_bg_color']); ?> !important;
    }
    .cshero-menu-dropdown .cshero-dropdown .multicolumn > li.group > a,
    .cshero-menu-dropdown .cshero-dropdown .multicolumn > li.group > a:hover {
        color: <?php echo esc_attr($smof_data['menu_sub_color']); ?> !important;  
    }
    /* Sub level */
    .cshero-menu-dropdown ul li ul {
        min-width: 210px;
    }
    /* End General Option */

    /* Default Menu */
    #cshero-header .main-menu-content,
    #cshero-header .full-menu-background   {
        background-color: <?php echo esc_attr($smof_data['menu_bg_color']); ?> ;
    }

    /* First Level */
    #cshero-header ul.cshero-dropdown > li > a,
    #cshero-header .menu-pages .menu > ul > li > a {
        color: <?php echo esc_attr($smof_data['menu_first_color']);?>;
        font-size:<?php echo esc_attr($smof_data['menu_fontsize_first_level']);?>;
        line-height: <?php echo esc_attr($smof_data['nav_height']); ?>;
        padding-left: <?php echo esc_attr($smof_data['nav_padding_left']); ?>px ;
        padding-top: <?php echo esc_attr($smof_data['nav_padding_top']); ?>px ;
        padding-right: <?php echo esc_attr($smof_data['nav_padding_right']); ?>px ;
        padding-bottom: <?php echo esc_attr($smof_data['nav_padding_bottom']); ?>px ;
        margin:<?php echo esc_attr($smof_data['nav_margin']); ?>;
    }
    .cshero-header-cart .widget_cart_search_wrap .header {
        height: <?php echo esc_attr($smof_data['nav_height']); ?>;
    }
    .cshero-header-cart .widget_cart_search_wrap .header a {
        color: <?php echo esc_attr($smof_data['menu_first_color']);?>;
    }
    #cshero-header.header-fixed ul.cshero-dropdown > li > a,
    #cshero-header.header-fixed .menu-pages .menu > ul > li > a {
        line-height: <?php echo esc_attr($smof_data['sticky_header_height']); ?>;
    }
    #cshero-header.header-fixed .cshero-header-cart .widget_cart_search_wrap .header {
        height: <?php echo esc_attr($smof_data['sticky_header_height']); ?>;
    }
    .header-fixed.hidden-logo {
        height: <?php echo esc_attr($smof_data['sticky_header_height']); ?>;
    }
    #cshero-header.header-fixed .logo > a {
        line-height: <?php echo esc_attr($smof_data['sticky_header_height']); ?>;
    }
    #cshero-header.header-fixed .cshero-header-content-widget {
        height: <?php echo esc_attr($smof_data['sticky_header_height']); ?>;
    }
    body {
        margin-top: <?php echo esc_attr($smof_data['nav_height']); ?>;
    }
    body.fixed-margin-top {
        margin-top: <?php echo esc_attr($smof_data['sticky_header_height']); ?>;
    }
    .border-sticky-image {
        height: <?php echo esc_attr($smof_data['border_height_sticky']); ?>;
        bottom: -<?php echo esc_attr($smof_data['border_height_sticky']); ?>;
    }
    #cshero-header ul.cshero-dropdown > li > a:hover,
    #cshero-header .menu-pages .menu > ul > li > a:hover,
    #cshero-header ul.cshero-dropdown > li > a:focus,
    #cshero-header ul.cshero-dropdown > li:hover > a,
    #cshero-header ul.cshero-dropdown > li:focus > a,
    #cshero-header ul.cshero-dropdown > li:active > a{
        color:<?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
        background-color:<?php echo HexToRGB($smof_data['menu_bg_hover_color_first']['color'],$smof_data['menu_bg_hover_color_first']['alpha']);?>;
    }
    #cshero-header .cshero-header-menu-wrapper.home-shop .cshero-menu-dropdown ul.cshero-dropdown > li > a:hover {
        color: #fff !important;
    }
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li > a:hover,
    .csbody.home-minimal #cshero-header .menu-pages .menu > ul > li > a:hover,
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li > a:focus,
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li:hover > a,
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li:focus > a,
    .csbody.home-minimal #cshero-header ul.cshero-dropdown > li:active > a{
        color:<?php echo esc_attr($smof_data['primary_color_minimal']);?>;
    }
    #cshero-header .cshero-hidden-sidebar-btn a:hover,
    #cshero-header .cshero-hidden-sidebar-btn a:focus,
    #cshero-header .cshero-hidden-sidebar-btn a:active,
    #cshero-header .cshero-menu-mobile a:hover,
    #cshero-header .cshero-menu-mobile a:focus,
    #cshero-header .cshero-menu-mobile a:active {
        color:<?php echo esc_attr($smof_data['menu_hover_first_color']);?>;
    }
    #cshero-header ul.cshero-dropdown > li.current-menu-item > a,
    #cshero-header ul.cshero-dropdown > li.current-menu-ancestor > a,
    #cshero-header ul.cshero-dropdown > li > a.active,
    #cshero-header ul.cshero-dropdown > li > a:active{
        background-color:<?php echo HexToRGB($smof_data['menu_bg_actived_color_first']['color'],$smof_data['menu_bg_actived_color_first']['alpha']);?>;
    }
    /* Sub Level */
    @media (min-width: 992px) {
        #cshero-header ul.cshero-dropdown .sub-menu li {
            background-color:<?php echo esc_attr($smof_data['menu_sub_bg_color']);?>;
        }
        .cshero-dropdown > li > .multicolumn.sub-menu > li > ul.sub-menu:before {
            background-color: <?php echo esc_attr($smof_data['menu_sub_sep_color']);?>;
        }
        #cshero-header ul.cshero-dropdown ul > li > a{
            font-size:<?php echo esc_attr($smof_data['menu_fontsize_sub_level']);?>;
            color:<?php echo esc_attr($smof_data['menu_sub_color']);?>;
        }
        #cshero-header .header-left ul.cshero-dropdown ul > li {
            border: none
        }
        #cshero-header .header-left ul.cshero-dropdown ul > li a {
            border-top:1px solid <?php echo esc_attr($smof_data['menu_sub_sep_color']);?>;
        }
        /* End Sub Level */

        /* Hover state */
        #cshero-header ul.cshero-dropdown ul > li > a:hover,
        #cshero-header ul.cshero-dropdown ul > li > a:focus,
        #cshero-header ul.cshero-dropdown ul > li:not(.group):hover > a,
        #cshero-header ul.cshero-dropdown ul > li:not(.group):focus > a,
        #cshero-header ul.cshero-dropdown ul > li:not(.group):active > a,
        #cshero-header ul.cshero-dropdown ul > li:not(.group):visited > a{
            color:<?php echo esc_attr($smof_data['menu_sub_hover_color']);?>;
            background-color:<?php echo esc_attr($smof_data['menu_bg_hover_color']);?>;
        }
        /* Active state */
        #cshero-header ul.cshero-dropdown ul > li.current-menu-item > a,
        #cshero-header ul.cshero-dropdown ul > li.current-menu-ancestor > a,
        #cshero-header ul.cshero-dropdown ul > li > a:active,
        #cshero-header ul.cshero-dropdown ul > li > a.active{
            color:<?php echo esc_attr($smof_data['menu_sub_active_color']);?>;
            background-color:<?php echo esc_attr($smof_data['menu_bg_hover_color']);?>;
        }
        /* End Default Menu*/
    }
    /* Main header  sidebar icon */
    #cshero-header  ul.cs-hidden-sidebar > li > a{
        line-height: <?php echo esc_attr($smof_data['nav_height']); ?>;
        padding:<?php echo esc_attr($smof_data['default_hidden_sidebar_padding']); ?>;

    }
    #cshero-header  ul.cs-item-cart-search > li .header a{
        line-height: <?php echo esc_attr($smof_data['nav_height']); ?>;
        padding:<?php echo esc_attr($smof_data['default_search_padding']); ?>;
    }
    
/* Custom Menu Header */
.cs_custom_header_menu{}
    /* Fix Social Widget */
    .cs_custom_header_menu ul.cs-social li a,
    .cs_custom_header_menu li.cshero-hidden-sidebar a{
        padding:<?php echo esc_attr($smof_data['default_search_padding']); ?> !important;
        display:inline-block !important;
    }
    .cs_custom_header_menu ul.cs-social li a:hover,
    .cs_custom_header_menu ul.cs-social li a:focus,
    .cs_custom_header_menu ul.cs-social li a:active,
    .cs_custom_header_menu li.cshero-hidden-sidebar a:hover,
    .cs_custom_header_menu li.cshero-hidden-sidebar a:focus,
    .cs_custom_header_menu li.cshero-hidden-sidebar a:active{
        color: <?php echo esc_attr($smof_data['header_top_link_hover_color']); ?> !important;
    }
/* End Custom Menu Header */
/*** Mobile Menu ***/
@media (max-width: 992px) {
    #wrapper #cshero-header .cshero-dropdown.cshero-mobile-menu {
        background-color: <?php echo esc_attr($smof_data['mobile_menu_bg_color']); ?>;
    }
    #wrapper #cshero-header ul.cshero-dropdown > li > a, 
    #wrapper #cshero-header .menu-pages .menu > ul > li > a {
        color: <?php echo esc_attr($smof_data['mobile_menu_first_color']); ?>;
    }
    #wrapper #cshero-header ul.cshero-dropdown > li > a:hover, 
    #wrapper #cshero-header .menu-pages .menu > ul > li > a:hover {
        color: <?php echo esc_attr($smof_data['mobile_menu_hover_first_color']); ?> !important;
    }
    #wrapper #cshero-header ul.cshero-dropdown > li ul li a, 
    #wrapper #cshero-header .menu-pages .menu > ul > li ul li a {
        color: <?php echo esc_attr($smof_data['mobile_menu_sub_color']); ?>;
    }
    #wrapper #cshero-header ul.cshero-dropdown > li ul li a:hover, 
    #wrapper #cshero-header .menu-pages .menu > ul > li ul li a:hover {
        color: <?php echo esc_attr($smof_data['mobile_menu_sub_hover_color']); ?>;
    }
    .csbody #wrapper #cshero-header #cshero-main-menu-mobile ul.cshero-dropdown > li > a, 
    .csbody #wrapper #cshero-header #cshero-main-menu-mobile .menu-pages .menu > ul > li > a {
        border-color: <?php echo esc_attr($smof_data['mobile_menu_sub_sep_color']); ?>
    }
}
/*** End Mobile Menu ***/
#menu.menu-up .main-menu > li > ul,
#menu-left.menu-up .main-menu > li > ul,
#menu-right.menu-up .main-menu > li > ul {
    bottom: <?php echo esc_attr($smof_data['nav_height']); ?>; /* for menu fixed bottm */
}

/*** Page Title ***/
<?php if($smof_data['page_title_upper_portfolio'] == '1'): ?>
    .single-portfolio #cs-page-title-wrapper .title_bar .page-title {
        text-transform: uppercase;
    }
<?php endif; ?>

<?php if($smof_data['page_title_upper_team'] == '1'): ?>
    .single-team #cs-page-title-wrapper .title_bar .page-title {
        text-transform: uppercase;
    }
<?php endif; ?>
/* =========================================================        Start Primary    =========================================================*/
/* All Primary Color */
.comment-author .fn,
.tweets-container ul li .jtwt_tweet_text a {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.comment-form .form-submit .submit:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
blockquote > p {
    border-left: 2px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.single-portfolio .cs-portfolio-header .cs-portfolio-category a:hover,
.single-portfolio .cs-portfolio-header .social-details a:hover,
.single-portfolio .cs-portfolio-item.light .cs-portfolio-header .social-details a:hover,
.single-portfolio .cs-portfolio-item.light .cs-portfolio-header .cs-portfolio-category a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.single-portfolio .cs-portfolio-similar-item:hover:before {
    background-color: <?php echo HexToRGB($smof_data['primary_color'],0.8); ?>;
}
<?php if($smof_data['pt_testimonial_images_width']): ?>
    .csbody.single-portfolio .testimonial-layout2 .cshero-testimonial-image img {
        width: <?php echo esc_attr($smof_data['pt_testimonial_images_width']); ?>;
        height: <?php echo esc_attr($smof_data['pt_testimonial_images_height']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['pt_testimonial_desciption_fontsize']): ?>
    .csbody.single-portfolio .testimonial-layout2 .cshero-testimonial-text {
        font-size: <?php echo esc_attr($smof_data['pt_testimonial_desciption_fontsize']); ?>;
    }
<?php endif; ?>


/* Form Style */
<?php if($smof_data['form_bg_color']): ?>
    form {
        background-color: <?php echo esc_attr($smof_data['form_bg_color']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['form_field_bg_color']): ?>
    form input,
    form button,
    form select,
    form textarea {
        background-color: <?php echo esc_attr($smof_data['form_field_bg_color']); ?>;
    }
<?php else:?>
    form input,
    form button,
    form select,
    form textarea {
        background-color: transparent;
    }
<?php endif; ?>
<?php if($smof_data['form_field_bg_color_hover']): ?>
    form input:hover,
    form button:hover,
    form select:hover,
    form textarea:hover,
    form input:active,
    form button:active,
    form select:active,
    form textarea:active,
    form input:focus,
    form button:focus,
    form select:focus,
    form textarea:focus {
        background-color: <?php echo esc_attr($smof_data['form_field_bg_color_hover']); ?>;
    }
<?php else: ?>
    form input:hover,
    form button:hover,
    form select:hover,
    form textarea:hover,
    form input:active,
    form button:active,
    form select:active,
    form textarea:active,
    form input:focus,
    form button:focus,
    form select:focus,
    form textarea:focus {
        background-color: transparent;
    }
<?php endif; ?>
<?php if($smof_data['form_text_color']): ?>
    form,
    form label,
    form input,
    form button,
    form select,
    form textarea,
    input::-moz-placeholder, 
    textarea::-moz-placeholder {
        color: <?php echo esc_attr($smof_data['form_text_color']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['form_border_style']): ?>
    form input,
    form select,
    form textarea,
    form button {
        border-style:<?php echo esc_attr($smof_data['form_border_style']); ?>
    }
<?php endif; ?>
<?php if($smof_data['form_border_width']): ?>
    form input,
    form select,
    form textarea,
    form button {
        border-width: <?php echo esc_attr($smof_data['form_border_width']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['form_border_color']): ?>
    form input,
    form select,
    form textarea,
    form button {
        border-color: <?php echo esc_attr($smof_data['form_border_color']); ?> ;
    }
<?php endif; ?>
<?php if($smof_data['form_border_color_hover']): ?>
form input:hover,
form select:hover,
form textarea:hover,
form button:hover,
form input:active,
form select:active,
form textarea:active,
form button:active,
form input:focus,
form select:focus,
form textarea:focus,
form button:focus {
    border-color: <?php echo esc_attr($smof_data['form_border_color_hover']); ?>;
}
<?php endif; ?>
<?php if($smof_data['form_shadow']!=''): ?>
    form input,
    form select,
    form textarea,
    form button {
        box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
        -moz-box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
        -webkit-box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
        -ms-box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
        -o-box-shadow: <?php echo esc_attr($smof_data['form_shadow']); ?>;
    }
<?php else: ?>
    form input,
    form select,
    form textarea,
    form button {
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
    }
<?php endif;  ?>
<?php if($smof_data['form_shadow_hover']!=''): ?>
    form input:hover,
    form select:hover,
    form textarea:hover,
    form button:hover,
    form input:active,
    form select:active,
    form textarea:active,
    form button:active,
    form input:focus,
    form select:focus,
    form textarea:focus,
    form button:focus {
        box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
        -moz-box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
        -webkit-box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
        -ms-box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
        -o-box-shadow: <?php echo esc_attr($smof_data['form_shadow_hover']); ?>;
    }
<?php else: ?>
    form input:hover,
    form select:hover,
    form textarea:hover,
    form button:hover,
    form input:active,
    form select:active,
    form textarea:active,
    form button:active,
    form input:focus,
    form select:focus,
    form textarea:focus,
    form button:focus {
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
    }
<?php endif; ?>
<?php if($smof_data['form_border_radius']) :?>
    form input,
    form select,
    form textarea,
    form button{
        -webkit-border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
        -ms-border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
        -moz-border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
        -o-border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
        border-radius: <?php echo esc_attr($smof_data['form_border_radius']);?>;
    }
<?php endif;?>
/* Style for FORM in Parallax section
NOTE: you need add extra class name called parallax-form to row or column or shortcode setting
*/
.content-area .parallax-form input[type="text"]:hover,
.content-area .parallax-form input[type="password"]:hover,
.content-area .parallax-form input[type="datetime"]:hover,
.content-area .parallax-form input[type="datetime-local"]:hover,
.content-area .parallax-form input[type="date"]:hover,
.content-area .parallax-form input[type="month"]:hover,
.content-area .parallax-form input[type="time"]:hover,
.content-area .parallax-form input[type="week"]:hover,
.content-area .parallax-form input[type="number"]:hover,
.content-area .parallax-form input[type="email"]:hover,
.content-area .parallax-form input[type="url"]:hover,
.content-area .parallax-form input[type="search"]:hover,
.content-area .parallax-form input[type="tel"]:hover,
.content-area .parallax-form input[type="color"]:hover,
.content-area .parallax-form input[type="submit"]:hover,
.content-area .parallax-form textarea:hover,
.content-area .parallax-form label:hover,
.content-area .parallax-form select:hover{
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}

/* =========================================================        Start Sidebar    =========================================================*/
.widget_calendar td:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* =========================================================        Start Title and Module    =========================================================*/
.title-preset2 h3 {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.title-preset1 h3, .title-style-colorprimary-retro h3, .title-style-colorprimary-retro2 h3,
.title-style-colorprimary-retro2 h3 + p,.tagline  {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> ;
}
.title-construction .wpb_wrapper > h3 {
    border-bottom: 1px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.title-construction .wpb_wrapper > h3:before,
.title-construction.style2 .wpb_wrapper > h3:after,
.title-construction.style3 .wpb_wrapper > h3:after {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* =========================================================        Start Button Style    =========================================================*/

.csbody .btn, .csbody .btn-default, .csbody button, .csbody .button, .csbody input[type="submit"], .csbody input[type="button"], .csbody input#submit, .widget_shopping_cart_content a.button {
    font-size: <?php echo esc_attr($smof_data['button_font_size']); ?> ;
    <?php if($smof_data['button_uppercase'] == '1'): ?>
        text-transform: uppercase;
    <?php endif; ?>
    background-color: <?php echo HexToRGB($smof_data['button_gradient_top_color']['color'],$smof_data['button_gradient_top_color']['alpha']);?>;
    color: <?php echo esc_attr($smof_data['button_gradient_text_color']); ?>;
    border-style: <?php echo esc_attr($smof_data['button_border_style']); ?>;
    border-color: <?php echo esc_attr($smof_data['button_border_color']); ?>;
    border-width: <?php echo esc_attr($smof_data['button_border_width']); ?>;

    border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;
    -webkit-border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;
    -moz-border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;
    -ms-border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;
    -o-border-radius: <?php echo esc_attr($smof_data['button_border_radius']); ?>;

    <?php if($smof_data['button_border_top'] == '0'): ?>
        border-top-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_border_right'] == '0'): ?>
        border-right-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_border_bottom'] == '0'): ?>
        border-bottom-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_border_left'] == '0'): ?>
        border-left-width: 0;
    <?php endif; ?>
   
    padding-top: <?php echo esc_attr($smof_data['button_padding_top']); ?>;
    padding-right: <?php echo esc_attr($smof_data['button_padding_right']); ?>;
    padding-bottom: <?php echo esc_attr($smof_data['button_padding_bottom']); ?>;
    padding-left: <?php echo esc_attr($smof_data['button_padding_left']); ?>;

    margin: <?php echo esc_attr($smof_data['button_margin']); ?>;
}
.csbody .btn:hover,
.csbody .btn:focus,
.csbody .button:hover,
.csbody .button:focus,
.csbody  button:hover,
.csbody  button:focus,
.csbody  input[type="submit"]:hover,
.csbody  input[type="submit"]:focus,
.csbody  input#submit:hover,
.csbody  input#submit:focus,
.widget_shopping_cart_content a.button:hover,
.widget_shopping_cart_content a.button:focus {
    color: <?php echo esc_attr($smof_data['button_gradient_text_color_hover']); ?>;
    border-color: <?php echo esc_attr($smof_data['button_border_color_hover']); ?>;
}
.btn:before, .button:before, input[type="submit"]:before {
    background-color: <?php echo HexToRGB($smof_data['button_gradient_top_color_hover']['color'],$smof_data['button_gradient_top_color_hover']['alpha']);?>;
}
.csbody.home-minimal .btn:hover {
   background-color: <?php echo esc_attr($smof_data['primary_color_minimal']); ?> !important;
}
/* btn primary */
.csbody .btn-primary{
    
    font-size: <?php echo esc_attr($smof_data['button_primary_font_size']); ?>;
    <?php if($smof_data['button_uppercase'] == '1'): ?>
        text-transform: uppercase;
    <?php endif; ?>

    background-color: <?php echo HexToRGB($smof_data['button_primary_background_color']['color'],$smof_data['button_primary_background_color']['alpha']); ?>;
    color: <?php echo esc_attr($smof_data['button_primary_text_color']); ?>;

    border-style: <?php echo esc_attr($smof_data['button_primary_border_style']); ?>;
    border-color: <?php echo esc_attr($smof_data['button_primary_border_color']); ?>;
    border-width: <?php echo esc_attr($smof_data['button_primary_border_width']); ?>;
    <?php if($smof_data['button_primary_border_top'] == '0'): ?>
        border-top-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_primary_border_right'] == '0'): ?>
        border-right-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_primary_border_bottom'] == '0'): ?>
        border-bottom-width: 0;
    <?php endif; ?>
    <?php if($smof_data['button_primary_border_left'] == '0'): ?>
        border-left-width: 0;
    <?php endif; ?>
    
    border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;
    -webkit-border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;
    -moz-border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;
    -ms-border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;
    -o-border-radius: <?php echo esc_attr($smof_data['button_primary_border_radius']); ?>;

    margin: <?php echo esc_attr($smof_data['button_margin']); ?>;
}

.csbody .btn-primary:hover,
.csbody .btn-primary:active,
.csbody .btn-primary:focus {
    color: <?php echo esc_attr($smof_data['button_primary_text_color_hover']); ?>;
    border-color: <?php echo esc_attr($smof_data['button_primary_border_color_hover']); ?>;  
}
.csbody .btn-primary:hover:before,
.csbody .btn-primary:focus:before,
.csbody .btn-primary:active:before {
    background-color: <?php echo HexToRGB($smof_data['button_primary_background_color_hover']['color'],$smof_data['button_primary_background_color_hover']['alpha']); ?>;
}
.btn.btn-white:hover {
    background-color: <?php echo HexToRGB($smof_data['button_gradient_top_color_hover']['color'],$smof_data['button_gradient_top_color_hover']['alpha']);?> !important;
    color: <?php echo esc_attr($smof_data['button_gradient_text_color_hover']); ?> !important;
    border-color: <?php echo esc_attr($smof_data['button_border_color_hover']); ?> !important;
}
/* btn custom style */
.csbody .btn.btn-primary-style1 {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-primary-style1:hover {
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-default-overlay:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-default-color:hover:before {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-default-color:hover {
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-default-alt {
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-primary-border:hover,
.csbody .btn.btn-primary-border:focus {
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-primary-border:hover:before {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-primary-border:focus {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-primary-alt {
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.csbody .btn.btn-primary-alt:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* =========================================================
    End Button Style
=========================================================*/
/* =========================================================
    Start Short Code
=========================================================*/
/*** High light ***/
.cs-highlight-style-1 {
     background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*** Pricing ***/
/*---- Start Accordion ----*/

/*---- End Accordion ----*/
/*** Shortcode Tabs ***/
.wpb_tabs.style3 .wpb_tabs_nav li a:hover,
.wpb_tabs.style3 .wpb_tabs_nav li.ui-tabs-active a {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important; 
} 
.wpb_tabs.style4 ul.wpb_tabs_nav li.ui-state-active a,
.wpb_tabs.style4 ul.wpb_tabs_nav li.ui-state-active a:hover,
body .vc_tta-container .vc_tta-style-classic.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a, 
body .vc_tta-container .vc_tta-style-classic.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab:hover a {
    background: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
body .vc_tta-container .vc_tta-style-classic.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:before {
border-color: transparent transparent transparent <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* ==========================================================================
  Block Quotes
========================================================================== */
/*** ATL QUOTE ***/
.cs-quote-style-2-alt,
.cs-quote-style-1-alt {
    border-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}

.cs-quote-style-1-alt:before,
.cs-quote-style-3-alt:after {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
/*---- Begin post carousel ----*/
.postcarousel-default .cshero-post-carousel-item-wrap:first-child .cshero-carousel-image .overlay,
.magazine_posts-layout1 .magazine-post-featured .cs-blog-content {
    background-color: <?php echo HexToRGB($smof_data['primary_color'],0.8)?>;
}
.postcarousel-default .cshero-post-carousel-item-wrap:first-child .cshero-carousel-title a {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
/*---- End post carousel ----*/
/*---- Start fancybox ----*/
.fancybox-layout5 .cshero-read-more .read-more-link {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.fancybox-layout5 .cshero-read-more .read-more-link:hover {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.fancybox-layout8 .cshero-read-more a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*---- End fancybox ----*/
/* Start Testinomial */
    .cs-testimonial .fa{
		color: <?php echo esc_attr($smof_data['primary_color']); ?>;	
    }
/* End Testinomial */
/* Social */
.cs-social.style-1 > li > a,
.cs-social.style-2 > li > a,
.cs-social.style-3 > li > a{
    background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.cs-social.style-1 > li > a:hover,
.cs-social.style-2 > li > a:hover,
.cs-social.style-3 > li > a:hover{
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.cs-item-team.style-light.style2 .cs-social a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* End Social */
/* Start Highlight */
.cs-highlight-style-1 {
    background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.cs-highlight-style-2 {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* Portfolio */
    .portfolio-layout1 .cshero-portfolio-content-wrapper {
        background: <?php echo HexToRGB($smof_data['primary_color'],0.8)?>;
    }
/* End Portfolio */
/* Start Team Shortcode */
    /* Default */
    .team-default .cshero-team-title a:hover {
        color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
    }
    .team-layout5 .cshero-team-readmore a:hover,
    .team-layout6 .cshero-team-readmore a:hover {
        color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
    }
/* End Team Shortcode */
/* Start Course Shortcode */
.cs-carousel-course-style-1 .cs-course-content-inner{
    background: <?php echo HexToRGB($smof_data['primary_color'],0.8)?>;
}
.cs-carousel-course-style-1 .course-date{
    background: <?php echo HexToRGB($smof_data['secondary_color'],0.8)?>;
}
.cs-carousel-course-style-1 div.cs-morelink{
    background:<?php echo esc_attr($smof_data['secondary_color'])?>;
}
/* End Course Shortcode */
/* Start Event Carousel */
    /*Style 2*/
    .cs-carousel-event-style-2 .cs-carousel-item:hover .cs-carousel-container,
    .cs-carousel-event-style-2 .cs-carousel-item:active .cs-carousel-container,
    .cs-carousel-event-style-2 .cs-carousel-item:focus .cs-carousel-container{
        background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
        border-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
    }
    .cs-carousel-event-style-2 time:before{
        background-color: <?php echo esc_attr($smof_data['primary_color']);?>;
    }
    .cs-carousel-event-style-2 .cs-carousel-item:hover time:before,
    .cs-carousel-event-style-2 .cs-carousel-item:active time:before,
    .cs-carousel-event-style-2 .cs-carousel-item:focus time:before{
        background-color: #fff;
    }
    .cs-carousel-event-style-2 .cs-carousel-item .cs-carousel-footer,
    .cs-carousel-event-style-2 .cs-carousel-item .cs-carousel-footer,
    .cs-carousel-event-style-2 .cs-carousel-item .cs-carousel-footer{
        background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
    }
    .cs-carousel-event-style-2 .cs-carousel-item:hover .cs-carousel-footer,
    .cs-carousel-event-style-2 .cs-carousel-item:active .cs-carousel-footer,
    .cs-carousel-event-style-2 .cs-carousel-item:focus .cs-carousel-footer{
        background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
    }
/* End Event Carousel */
/* =========================================================
    End Short Code
=========================================================*/

/* ==========================================================================
   All Style Woocommorce
========================================================================== */
.woocommerce .cshere-woo-item-wrap .cshero-woo-meta .cshero-product-title h3 a:hover,
.woocommerce-pagination #woo-load-more:hover,
.woocommerce.single-product .comment-text .author,
#wp-exo-theme .add-whish-list:hover,
.cms-checkout-page .product-name a:hover,
#wp-exo-theme.woocommerce-cart .cms-checkout-page .button:hover,
#wp-exo-theme.woocommerce-checkout .button:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.woocommerce #wrapper span.onsale,
.cshere-woo-item-wrap .cshero-woo-meta .cshero-add-to-cart a,
body.woocommerce #cs-page-title-wrapper,
body.woocommerce-page #cs-page-title-wrapper,
.woocommerce #wrapper .widget_price_filter .ui-slider .ui-slider-range,
.cshero-product-meta ul li a:hover,
#wp-exo-theme.woocommerce-cart .cms-checkout-page .button,
#wp-exo-theme.woocommerce-checkout .button  {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.woocommerce #wrapper .widget_price_filter .ui-slider .ui-slider-handle {
    border: 3px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
#wp-exo-theme.woocommerce-cart .cms-checkout-page .button,
#wp-exo-theme.woocommerce-checkout .button {
    border: 1px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* ==========================================================================
   End All Style Woocommorce
========================================================================== */

/*Start All Style Widget WP*/
/* Default widget */
/* =========================================================
    Start Bottom
=========================================================*/
/* =========================================================
    Start Footer
=========================================================*/
#footer-top {
    color: <?php echo esc_attr($smof_data['footer_text_color']); ?>;
    <?php if($smof_data['footer_top_border_style']!='none'): ?>
        border-style:<?php echo esc_attr($smof_data['footer_top_border_style']);?>;
        border-color:<?php echo esc_attr($smof_data['footer_top_border_color']);?>;
        border-width:<?php echo esc_attr($smof_data['footer_top_border_width']);?>;
    <?php endif;?>
}
#footer-top form input:hover,
#footer-top form input:focus,
#footer-top form select:hover,
#footer-top form select:focus,
#footer-top form textarea:hover,
#footer-top form textarea:focus,
#footer-top form button:hover,
#footer-top form button:focus{
    color: <?php echo esc_attr($smof_data['footer_text_color']); ?>;
}
#footer-top h3.wg-title {
    color: <?php echo esc_attr($smof_data['footer_headings_color']); ?>;
    font-size: <?php echo esc_attr($smof_data['footer_top_heading_font_size']); ?>;
}

#footer-top h3.wg-title {
    <?php if($smof_data['footer_top_heading_uppercase']=='1') { ?>
        text-transform: uppercase;
    <?php } else { ?>
        text-transform: capitalize;
    <?php } ?>
}
#footer-top a {
    color: <?php echo esc_attr($smof_data['footer_link_color']); ?>;
}
#footer-top a:hover {
    color: <?php echo esc_attr($smof_data['footer_link_hover_color']); ?>;
}
#footer-top .cs-social a i {
    color:<?php echo esc_attr($smof_data['footer_social_color']); ?>;
}
#footer-top .cs-social a:hover i {
    color: <?php echo esc_attr($smof_data['footer_social_hover_color']); ?>;
}
#footer-top .cs-social.style-4 li a:hover i {
    border-color: <?php echo esc_attr($smof_data['footer_social_hover_color']); ?>;
}
#footer-bottom {
    background-color: <?php echo esc_attr($smof_data['footer_bottom_bg_color']); ?> ;
    color: <?php echo esc_attr($smof_data['footer_bottom_text_color']); ?>;
	margin: <?php echo esc_attr($smof_data['footer_bottom_margin']); ?>;
	<?php if($smof_data['footer_bottom_border_style']!='none'): ?>
		border-style:<?php echo esc_attr($smof_data['footer_bottom_border_style']);?>;
		border-color:<?php echo esc_attr($smof_data['footer_bottom_border_color']);?>;
		border-width:<?php echo esc_attr($smof_data['footer_bottom_border_width']);?>;
	<?php endif;?>
	<?php if($smof_data['footer_bottom_padding'] || $smof_data['footer_bottom_margin']) : ?>
		padding: <?php echo esc_attr($smof_data['footer_bottom_padding']); ?>;	
	<?php endif; ?>
}
#footer-bottom svg {
    fill: <?php echo esc_attr($smof_data['footer_bottom_bg_color']); ?> ;
}
#footer-bottom.footer-bottom-v2 {
    border-bottom: 9px solid <?php echo esc_attr($smof_data['primary_color']); ?>; 
}
#footer-bottom h3.wg-title {
    color: <?php echo esc_attr($smof_data['footer_bottom_headings_color']); ?>;
}
#footer-bottom a {
    color: <?php echo esc_attr($smof_data['footer_bottom_link_color']); ?>;
}
#footer-bottom a:hover {
    color: <?php echo esc_attr($smof_data['footer_bottom_link_hover_color']); ?>;
}
<?php if($smof_data['footer_top_padding'] || $smof_data['footer_top_padding']) : ?>
#footer-top {
    padding: <?php echo esc_attr($smof_data['footer_top_padding']); ?>;
    margin: <?php echo esc_attr($smof_data['footer_top_margin']); ?>;
}
<?php endif; ?>

#footer-top .widget_cs_social_widget.style2 ul li a{
	background-color:  <?php echo esc_attr($smof_data['footer_link_color']); ?>;
	color:<?php echo esc_attr($smof_data['footer_social_color']); ?>;
}
#footer-top .widget_cs_social_widget.style2 ul li a:hover{
	background-color:  <?php echo esc_attr($smof_data['footer_link_hover_color']); ?>;
	color:<?php echo esc_attr($smof_data['footer_social_hover_color']); ?>;
}
<?php if($smof_data['text_align_footer_bottom_widgets_1'] != 'none') : ?>
.footer-bottom-1{
    text-align: <?php echo esc_attr($smof_data['text_align_footer_bottom_widgets_1']); ?>;
}
<?php endif; ?>
<?php if($smof_data['text_align_footer_bottom_widgets_2'] != 'none') : ?>
.footer-bottom-2{
    text-align: <?php echo esc_attr($smof_data['text_align_footer_bottom_widgets_2']); ?>;
}
<?php endif; ?>

/* ==========================================================================
   Hidden Menu Sidebar
========================================================================== */
.meny-right .meny-sidebar .primary-hidden-sidebar {
    color: <?php echo esc_attr($smof_data['hidden_sidebar_font_color']); ?>;
}
.meny-right .meny-sidebar .cs_close i:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.meny-right .hidden-sidebar-text span i {
    font-size:<?php echo esc_attr($smof_data['menu_fontsize_first_level']);?> !important;
}
.meny-right .hidden-sidebar-text span:before {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
.cs-navigation .page-numbers:hover, 
.cs-navigation .page-numbers.current {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.cshero-nav ul li a:hover {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
    color: #fff;
}
.csbody.home-minimal .cshero-nav ul li a:hover {
    background: <?php echo esc_attr($smof_data['primary_color_minimal']); ?>;
}
/*** Hidden Sidebar Width ***/
<?php if($smof_data['hidden_sidebar_width']):
    $hidden_sidebar_width = (int)str_replace('px', '', $smof_data['hidden_sidebar_width']);
?>
    
    .csbody.meny-right .meny-sidebar {
        width: <?php echo esc_attr($smof_data['hidden_sidebar_width']); ?>;
        background: <?php echo esc_attr($smof_data['hidden_sidebar_background_color']); ?>;
        -webkit-transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
           -moz-transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
            -ms-transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
             -o-transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
                transform: matrix(1, 0, 0, 1, <?php echo esc_attr($hidden_sidebar_width); ?>, 0);
    }
<?php endif ?>
/*============================================                Start Post Blog Style    ============================================*/
.cs-blog .cs-blog-share i{
    background-color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.cs-blog .cs-blog-share i:hover,
.cs-blog .cs-blog-share i:active,
.cs-blog .cs-blog-share i:focus{
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.blog-multiple-columns-style2  .cs-blog .cs-blog-media .readmore{
    background: <?php echo HexToRGB($smof_data['primary_color'],0.8); ?>;
}
.blog-multiple-columns-style2  .cs-blog:hover .cs-blog-title a,
.blog-multiple-columns-style2  .cs-blog:active .cs-blog-title a,
.blog-multiple-columns-style2  .cs-blog:focus .cs-blog-title a{
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.cshero-blog-category-lists ul li.current a,
.cshero-blog-category-lists ul li a:hover,
.filter_outer ul li.active span,
.filter_outer ul li:hover span{
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.tagcloud a:hover:before,
#footer-top .tagcloud a:hover:before {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*** Blog Class Style 2 ***/
.cs-blogClass-style2 .cs-blogClass-info ul li a:hover,
.cs-blog .cs-blog-quote .author {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.cs-blog .cs-blog-quote .cs-content-text {
    border-left: 2px solid <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/* Style Post Audio */
.csbody .mejs-controls .mejs-time-rail .mejs-time-current,
.csbody .mejs-controls .mejs-time-rail .mejs-time-loaded, 
.csbody .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*** Style Post Page Style 1 ***/
.cs-blog-item-style1 .cs-blog-info ul li a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
/*============================================                Shortcode heading style    ============================================*/
.cs-header.overline .cs-title .line{
    border-bottom-color: <?php echo esc_attr($smof_data['primary_color']);?>;
}

/* End Shortcode heading style */


.portfoliocarousel-layout1 .cshero-portfolio-carousel-item .cshero-carousel-image-inner .overlay a:hover {
    background:<?php echo esc_attr($smof_data['primary_color']); ?> !important;   
}
.portfoliocarousel-layout1 .cshero-title a:hover {
    color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;    
}
/*======================================*/
/*        3rd Extensions                */
/*======================================*/
/*LearDash LMS*/
.lms-course-list .lms-course-item:hover .lms-course-content .readmore{
    background: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
/* custom css */
<?php echo esc_attr($smof_data["custom_css"]);?>
/*** Home Shop ***/
.widget_searchform_content form input[type='submit'],
.header-v5 .cshero-header-content-widget form input[type='submit'] {
    background-color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
    border-color: <?php echo esc_attr($smof_data['primary_color']); ?> !important;
}
.widget_searchform_content form input[type='submit']:hover,
.header-v5 .cshero-header-content-widget form input[type='submit']:hover {
    background-color: <?php echo esc_attr($smof_data['secondary_color']); ?> !important;
    border-color: <?php echo esc_attr($smof_data['secondary_color']); ?> !important;
}
.top-contact > li i {
    color: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.header-v3 .cshero-total.shop,
.header-v3 .cart_total_text.shop i {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.cshero-header-menu-wrapper.home-shop .cshero-menu-left-title {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}
.header-v3 .shopping_cart_dropdown .cart-list span.quantity {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.header-v3 #cshero-header .shopping_cart_dropdown .btn.btn-primary {
    background: <?php echo esc_attr($smof_data['secondary_color']); ?>;
    border: 1px solid <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.header-v3 #cshero-header .shopping_cart_dropdown .btn.btn-primary:hover {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.header-v3 #cshero-header .shopping_cart_dropdown span.total {
    color: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.csbody.woocommerce span.new-product {
    background: <?php echo esc_attr($smof_data['secondary_color']); ?>;
}
.csbody .tp-bullets.simplebullets .bullet.selected {
    background: <?php echo esc_attr($smof_data['primary_color']); ?>;
}