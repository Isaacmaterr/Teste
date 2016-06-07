<?php
/**
 * Title: auto render
 * Author: Fox
 */
/**
 * edit options from page
 */
global $page_id, $post;
cshero_re_render_options();
/* Border Body */
$border_body_width = get_post_meta(get_the_ID(), 'cs_border_body_width', true); 

$cs_footer_top_color = get_post_meta(get_the_ID(), 'cs_footer_top_color', true); 
$cs_footer_top_heading_color = get_post_meta(get_the_ID(), 'cs_footer_top_heading_color', true); 
$cs_footer_top_color_link = get_post_meta(get_the_ID(), 'cs_footer_top_color_link', true); 
$cs_footer_top_color_link_hover = get_post_meta(get_the_ID(), 'cs_footer_top_color_link_hover', true); 
$cs_footer_bottom_page_bg_color = get_post_meta(get_the_ID(), 'cs_footer_bottom_page_bg_color', true); 
$cs_footer_bottom_page_color = get_post_meta(get_the_ID(), 'cs_footer_bottom_page_color', true); 
$cs_footer_bottom_page_link_color = get_post_meta(get_the_ID(), 'cs_footer_bottom_page_link_color', true); 
$cs_footer_bottom_page_link_color_hover = get_post_meta(get_the_ID(), 'cs_footer_bottom_page_link_color_hover', true); 
$cs_header_fixed_sub_menu_bg_color = get_post_meta(get_the_ID(), 'cs_header_fixed_sub_menu_bg_color', true); 
$cs_header_fixed_sub_menu_bg_color_hover = get_post_meta(get_the_ID(), 'cs_header_fixed_sub_menu_bg_color_hover', true); 
$cs_header_fixed_sub_menu_font_color = get_post_meta(get_the_ID(), 'cs_header_fixed_sub_menu_font_color', true); 
$cs_header_fixed_sub_menu_font_color_hover = get_post_meta(get_the_ID(), 'cs_header_fixed_sub_menu_font_color_hover', true); 
$cs_header_fixed_sub_menu_border_color = get_post_meta(get_the_ID(), 'cs_header_fixed_sub_menu_border_color', true); 
$cs_header_border_bottom = get_post_meta(get_the_ID(), 'cs_header_border_bottom', true); 
$cs_header_border_bottom_style = get_post_meta(get_the_ID(), 'cs_header_border_bottom_style', true); 
$cs_header_border_bottom_height = get_post_meta(get_the_ID(), 'cs_header_border_bottom_height', true); 
$cs_header_border_bottom_color = get_post_meta(get_the_ID(), 'cs_header_border_bottom_color', true); 
$cs_sticky_header_bg_color = get_post_meta(get_the_ID(), 'cs_sticky_header_bg_color', true); 
$cs_sticky_header_border_bottom = get_post_meta(get_the_ID(), 'cs_sticky_header_border_bottom', true); 
$cs_sticky_header_border_bottom_style = get_post_meta(get_the_ID(), 'cs_sticky_header_border_bottom_style', true); 
$cs_sticky_header_border_bottom_height = get_post_meta(get_the_ID(), 'cs_sticky_header_border_bottom_height', true); 
$cs_sticky_header_border_bottom_color = get_post_meta(get_the_ID(), 'cs_sticky_header_border_bottom_color', true); 
$cs_show_border_image_sticky_header = get_post_meta(get_the_ID(), 'cs_show_border_image_sticky_header', true); 
$bg_header_sm = get_post_meta(get_the_ID(), 'cs_bg_header_sm', true);
$page_title_custom_subheader_size = get_post_meta(get_the_ID(), 'cs_page_title_custom_subheader_size', true); 
/* Menu Menu */
$cs_header_fixed_menu_color_hover = get_post_meta(get_the_ID(), 'cs_header_fixed_menu_color_hover', true); 
/* Sticky Menu Color */
$cs_sticky_menu_font_color_first_level = get_post_meta(get_the_ID(), 'cs_sticky_menu_font_color_first_level', true); 
$cs_sticky_menu_font_color_first_level_hover = get_post_meta(get_the_ID(), 'cs_sticky_menu_font_color_first_level_hover', true); 
$cs_sticky_menu_font_color_first_level_active = get_post_meta(get_the_ID(), 'cs_sticky_menu_font_color_first_level_active', true); 
$cs_header_sticky_logo_max_height = get_post_meta(get_the_ID(), 'cs_header_sticky_logo_max_height', true); 
/* Footer Top */
$cs_footer_top_padding_on_page = get_post_meta(get_the_ID(), 'cs_footer_top_padding_on_page', true); 
$cs_footer_top_margin_on_page = get_post_meta(get_the_ID(), 'cs_footer_top_margin_on_page', true); 
/* Arow Full Page */
$cs_row_navigation_color = get_post_meta(get_the_ID(), 'cs_row_navigation_color', true); 
$cs_row_navigation_color_hover = get_post_meta(get_the_ID(), 'cs_row_navigation_color_hover', true); 
/**
 * google fonts
 */
for ($i = 2; $i <= 12; $i ++) {
    if ($smof_data["typography_selector_$i"]) {
        echo cshero_typography_render($smof_data["typography_$i"], $smof_data["typography_selector_$i"]);
    } elseif ($i > 3) {
        break;
    }
}
/* Body */
if (!empty($border_body_width)) {
    echo ".csbody.border-body-fixed #cshero-header {
        top: ".$border_body_width.";
        -webkit-width: -webkit-calc(100% - ".$border_body_width." - ".$border_body_width.");
        -moz-width: -moz-calc(100% - ".$border_body_width." - ".$border_body_width.");
        width: calc(100% - ".$border_body_width." - ".$border_body_width.");
    }";
}
if (!empty($border_body_width)) {
    echo ".csbody.border-body-fixed.meny-right .meny-sidebar {
        top: ".$border_body_width.";
        right: ".$border_body_width.";
    }";
}
if (!empty($border_body_width)) {
    echo ".csbody.border-body-fixed .body-line.line-top,
          .csbody.border-body-fixed .body-line.line-bottom {
        height: ".$border_body_width.";
    }";
}
if (!empty($border_body_width)) {
    echo ".csbody.border-body-fixed .body-line.line-left,
          .csbody.border-body-fixed .body-line.line-right {
        width: ".$border_body_width.";
    }";
}
if (!empty($border_body_width)) {
    echo "html.border-html-fixed {
        margin-top: ".$border_body_width.";
    }";
}
if (!empty($border_body_width)) {
    echo ".csbody.border-body-fixed {
        margin-bottom: ".$border_body_width.";
        margin-left: ".$border_body_width.";
        margin-right: ".$border_body_width.";
    }";
}
/**
 * body background
 */
if ($smof_data['background-body']) {
    echo cshero_backgrounds_render($smof_data["background-body"], 'body');
}
/**
 * header background
 */
if ($smof_data['background-header']) {
    $smof_data["background-header"]['background-alpha'] = $smof_data["header_transparent"];
    echo cshero_backgrounds_render($smof_data["background-header"], 'body #cshero-header');
}
if ($smof_data['background-header']) {
    echo ".header-v4 #cshero-header .decor {
        fill: ".$smof_data["background-header"]["background-color"].";
    }";
}
if ($cs_header_border_bottom == '1') {
    echo "body #wrapper #cshero-header {
        border-bottom-style: ".$cs_header_border_bottom_style.";
        border-bottom-width: ".$cs_header_border_bottom_height.";
        border-bottom-color: ".$cs_header_border_bottom_color.";
    }";
}
if ($cs_sticky_header_border_bottom == '1') {
    echo "body #wrapper #cshero-header.header-fixed {
        border-bottom-style: ".$cs_sticky_header_border_bottom_style.";
        border-bottom-width: ".$cs_sticky_header_border_bottom_height.";
        border-bottom-color: ".$cs_sticky_header_border_bottom_color.";
    }";
}
if ($cs_show_border_image_sticky_header == '0') {
    echo "body .header-fixed .border-sticky-image {
        display: none;
    }";
}
/**
 * page title $ bc
 */
if ($smof_data['background-page-title']) {
    echo cshero_backgrounds_render($smof_data["background-page-title"], '#cs-page-title-wrapper');
}
if ($smof_data['disnable_page_title_team'] == '1') {
    echo "body.single-team #cs-page-title-wrapper {
        display: none;
    }";
}
if ($smof_data['disnable_page_title_portfolio'] == '1') {
    echo "body.single-portfolio #cs-page-title-wrapper {
        display: none;
    }";
}
/**
 * footer background
 */
if ($smof_data['background-footer-top']) {
    echo cshero_backgrounds_render($smof_data["background-footer-top"], '#footer-top');
}
?>
.csbody #wrapper #cs-page-title-wrapper .title_bar .sub_header_text {
    font-size: <?php echo $page_title_custom_subheader_size; ?>;
}
/* Header - Header Sticky */
body #cshero-header.header-fixed {
    background-color: <?php echo $cs_sticky_header_bg_color; ?>;
}
.header-v4 #cshero-header.header-fixed .logo img {
    max-height: <?php echo $cs_header_sticky_logo_max_height; ?> !important;
}
/* End Header - Header Sticky */
/* Arow Full Page */
body .full-page-control i {
    color: <?php echo $cs_row_navigation_color; ?>;
}
body .full-page-control i:hover {
    color: <?php echo $cs_row_navigation_color_hover; ?>;
}
@media (min-width:993px){
    /* Menu First Level */
    #cshero-header ul.cshero-dropdown > li > a,
    #cshero-header .menu-pages .menu > ul > li > a,
    .cshero-hidden-sidebar .cshero-hidden-sidebar-btn a {
        color: <?php echo esc_attr($smof_data['menu_first_color']);?>;
    }
    .csbody #cshero-header ul.cshero-dropdown > li:hover > a,
    .csbody #cshero-header .menu-pages .menu > ul > li:hover > a,
    .csbody #cshero-header .menu-pages .menu > ul > li > a:active,
    .csbody #cshero-header .menu-pages .menu > ul > li > a:focus,
    .csbody .cshero-hidden-sidebar .cshero-hidden-sidebar-btn a:hover {
        color: <?php echo $cs_header_fixed_menu_color_hover; ?>;
    }
    #cshero-header.header-fixed ul.cshero-dropdown > li > a,
    #cshero-header.header-fixed .menu-pages .menu > ul > li > a,
    #cshero-header.header-fixed .cshero-hidden-sidebar .cshero-hidden-sidebar-btn a {
        color: <?php echo $cs_sticky_menu_font_color_first_level; ?>;
    }
    .csbody #cshero-header.header-fixed ul.cshero-dropdown > li:hover > a,
    .csbody #cshero-header.header-fixed .menu-pages .menu > ul > li:hover > a,
    .csbody #cshero-header.header-fixed .menu-pages .menu > ul > li > a:active,
    .csbody #cshero-header.header-fixed .menu-pages .menu > ul > li > a:focus,
    .csbody #cshero-header.header-fixed .cshero-hidden-sidebar .cshero-hidden-sidebar-btn a {
        color: <?php echo $cs_sticky_menu_font_color_first_level_hover; ?>;
    }
    #cshero-header ul.cshero-dropdown > li.current-menu-item > a,
    #cshero-header ul.cshero-dropdown > li.current-menu-ancestor > a,
    #cshero-header ul.cshero-dropdown > li > a.active,
    #cshero-header ul.cshero-dropdown > li > a:active{
        color:<?php echo esc_attr($smof_data['menu_active_first_color']);?>;
    }
    #cshero-header.header-fixed ul.cshero-dropdown > li.current-menu-item > a,
    #cshero-header.header-fixed ul.cshero-dropdown > li.current-menu-ancestor > a,
    #cshero-header.header-fixed ul.cshero-dropdown > li > a.active,
    #cshero-header.header-fixed ul.cshero-dropdown > li > a:active{
        color: <?php echo $cs_sticky_menu_font_color_first_level_active; ?>;
    }
    body.csbody #cshero-header .cshero-menu-dropdown .cshero-dropdown .multicolumn > li.group > a, 
    body.csbody #cshero-header .cshero-menu-dropdown .cshero-dropdown .multicolumn > li.group > a:hover {
        color: <?php echo $cs_header_fixed_sub_menu_font_color; ?> !important;
    }
    body.csbody #cshero-header .cshero-menu-dropdown .multicolumn,
    body.csbody #cshero-header .cshero-menu-dropdown .multicolumn, .cshero-menu-dropdown .multicolumn > li.group > a {
        background-color: <?php echo $cs_header_fixed_sub_menu_bg_color; ?> !important;
    }
    body.csbody #cshero-header ul.cshero-dropdown .sub-menu li {
        background-color: <?php echo $cs_header_fixed_sub_menu_bg_color; ?>
    }
    body.csbody #cshero-header ul.cshero-dropdown ul > li > a:hover,
    body.csbody #cshero-header ul.cshero-dropdown ul > li.current-menu-item > a, 
    body.csbody #cshero-header ul.cshero-dropdown ul > li.current-menu-ancestor > a,
    body.csbody #cshero-header ul.cshero-dropdown ul > li > a:active, 
    body.csbody #cshero-header ul.cshero-dropdown ul > li > a.active,
    #cshero-header ul.cshero-dropdown ul > li:not(.group):hover > a,
    #cshero-header ul.cshero-dropdown ul > li:not(.group):focus > a,
    #cshero-header ul.cshero-dropdown ul > li:not(.group):active > a,
    #cshero-header ul.cshero-dropdown ul > li:not(.group):visited > a {
        background-color: <?php echo $cs_header_fixed_sub_menu_bg_color_hover; ?>
    }
    body.csbody #cshero-header ul.cshero-dropdown ul > li > a {
        color: <?php echo $cs_header_fixed_sub_menu_font_color; ?>
    }
    body.csbody #cshero-header ul.cshero-dropdown ul > li > a:hover,
    body.csbody #cshero-header ul.cshero-dropdown ul > li.current-menu-item > a, 
    body.csbody #cshero-header ul.cshero-dropdown ul > li.current-menu-ancestor > a,
    body.csbody #cshero-header ul.cshero-dropdown ul > li > a:active, 
    body.csbody #cshero-header ul.cshero-dropdown ul > li > a.active {
        color: <?php echo $cs_header_fixed_sub_menu_font_color_hover; ?>
    }
    body.csbody .cshero-dropdown > li > .multicolumn.sub-menu > li > ul.sub-menu:before {
        background-color: <?php echo $cs_header_fixed_sub_menu_border_color; ?>
    }
}
@media (max-width:992px){
    /* Menu First Level */
    #cshero-header.transparentFixed .btn-navbar i:after,
    .csbody .cshero-menu-mobile a i:after {
        -webkit-box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
           -moz-box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
            -ms-box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
             -o-box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
                box-shadow: -8px 2px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, -12px 9px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>, 0 16px 0 2px <?php echo esc_attr($smof_data['menu_first_color']);?>;
    }
    /*** Hidden Sidebar and Menu Mobile ***/
    .cshero-hidden-sidebar .cshero-hidden-sidebar-btn a,
    .csbody .cshero-menu-mobile a {
        color:<?php echo esc_attr($smof_data['menu_first_color']);?>;
    }
    .bg-header-light #wrapper #cshero-header.transparentFixed  {
        background-color: #fff;
    }
    .bg-header-drak #wrapper #cshero-header.transparentFixed  {
        background-color: #13151c;
    }
    .csbody #wrapper #cshero-header.transparentFixed  {
        background-color: <?php echo $bg_header_sm; ?>
    }
}


/**** Start Page Title ****/
#cs-page-title-wrapper{
    padding: <?php echo esc_attr($smof_data['page_title_padding']); ?>;
    margin: <?php echo esc_attr($smof_data['page_title_margin']); ?>;
    <?php if($smof_data['page_title_border_top'] == '1'): ?>
        border-top: 1px solid <?php echo esc_attr($smof_data['page_title_border_color']); ?>;
    <?php endif; ?>
    <?php if($smof_data['page_title_border_bottom'] == '1'): ?>
        border-bottom: 1px solid <?php echo esc_attr($smof_data['page_title_border_color']); ?>;
    <?php endif; ?>
}
#cs-page-title-wrapper .title_bar .page-title{
    color: <?php echo esc_attr($smof_data['page_title_color']); ?>;
    font-size: <?php echo esc_attr($smof_data['title_bar_size']); ?>;
    line-height: <?php echo esc_attr($smof_data['title_bar_size']); ?>;

}
#cs-page-title-wrapper .title_bar, #cs-page-title-wrapper .title_bar .sub_header_text{
    text-align: <?php echo esc_attr($smof_data['page_title_bar_align']); ?>;
    color: <?php echo esc_attr($smof_data['page_subtitle_color']); ?>; 
}
/**** End Page Title ****/
/**** Start Breadcrumb ****/
#cs-breadcrumb-wrapper{
    text-align: <?php echo esc_attr($smof_data['breadcrumb_text_align']); ?>;
}
#cs-breadcrumb-wrapper, #cs-breadcrumb-wrapper span, #cs-breadcrumb-wrapper a,
#cs-breadcrumb-wrapper .cs-breadcrumbs a:after {
    color: <?php echo esc_attr($smof_data['breadcrumbs_text_color']) ?>;
}
<?php if($smof_data['breadcrumbs_item_padding']): ?>
    .csbody #cs-breadcrumb-wrapper .cs-breadcrumbs a,
    .csbody #cs-breadcrumb-wrapper .cs-breadcrumbs span {
        padding: <?php echo esc_attr($smof_data['breadcrumbs_item_padding']); ?>;
    }
<?php endif; ?>
<?php if($smof_data['breadcrumbs_separator']): ?>
    .csbody #cs-breadcrumb-wrapper .cs-breadcrumbs a:after {
        content: "\<?php echo esc_attr($smof_data['breadcrumbs_separator']); ?>";
    }
<?php endif; ?>
/**** End Breadcrumb ****/

/* Footer Top */
body #footer-top {
    color: <?php echo $cs_footer_top_color; ?>;
    padding: <?php echo $cs_footer_top_padding_on_page; ?>;
    margin: <?php echo $cs_footer_top_margin_on_page; ?>;
}
body #footer-top h3.wg-title {
    color: <?php echo $cs_footer_top_heading_color; ?>
}
body #footer-top a {
    color: <?php echo $cs_footer_top_color_link; ?>
}
body #footer-top a:hover {
    color: <?php echo $cs_footer_top_color_link_hover; ?>
}
/* End Footer Top */

/* Footer Bottom */
body #footer-bottom {
    color: <?php echo $cs_footer_bottom_page_color; ?>
}
body #footer-bottom {
    background-color: <?php echo $cs_footer_bottom_page_bg_color; ?>
}
body #footer-bottom a {
    color: <?php echo $cs_footer_bottom_page_link_color; ?>
}
body #footer-bottom a:hover {
    color: <?php echo $cs_footer_bottom_page_link_color_hover; ?>
}
/* End Footer Bottom */
