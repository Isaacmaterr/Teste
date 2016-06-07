<?php
global $smof_data;
$output = $title = $interval = $el_class = $cms_tab_icon = '';
extract( shortcode_atts( array(
	'title' => '',
    'interval' => 0,
    'tab_style' => 'style1',
    'tab_border_color' => '',
    'tab_bg_color_hover' => '',
    'title_font_color' => '',
    'title_font_color_hover' => '',
    'cms_tab_icon' => '',
    'el_class' => ''
), $atts ) );

$uqid = uniqid();
$tabs_id = 'cms_'.$uqid;
$cs_title_font_color = isset( $atts['title_font_color'] ) ? $atts['title_font_color'] : '';
$cs_title_font_color_hover = isset( $atts['title_font_color_hover'] ) ? $atts['title_font_color_hover'] : '';
$cs_tab_border_color = isset( $atts['tab_border_color'] ) ? $atts['tab_border_color'] : '';
$cs_tab_bg_color_hover = isset( $atts['tab_bg_color_hover'] ) ? $atts['tab_bg_color_hover'] : '';

wp_enqueue_script( 'jquery-ui-tabs' );
$el_class = $this->getExtraClass( $el_class );
$element = 'wpb_tabs';
if ( 'vc_tour' == $this->shortcode ) $element = 'wpb_tour';

// Extract tab titles
preg_match_all( '/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
/**
 * vc_tabs
 *
 */
if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}
	$tabs_nav = '';
	$tabs_nav .= '<ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix">';
?>
<style type="text/css" scoped>
	#<?php echo $tabs_id; ?> .wpb_tabs_nav li a {
		color: <?php echo ''.$cs_title_font_color; ?>;
	}
	#<?php echo $tabs_id; ?> .wpb_tabs_nav li a:hover, 
	#<?php echo $tabs_id; ?> .wpb_tabs_nav li.ui-tabs-active a {
		color: <?php echo ''.$cs_title_font_color_hover; ?>;
		background-color: <?php echo ''.$cs_tab_bg_color_hover; ?>;
	}
	#<?php echo $tabs_id; ?> .wpb_tabs_nav li a:hover:after, 
	#<?php echo $tabs_id; ?> .wpb_tabs_nav li.ui-tabs-active a:after {
		border-bottom-color: <?php echo ''.$cs_tab_border_color; ?>;
	}
	#<?php echo $tabs_id; ?>.wpb_tour.wpb_content_element .wpb_tabs_nav li a:before {
		border-color: transparent transparent transparent <?php echo ''.$cs_tab_bg_color_hover; ?>;
	}
</style>
<?php
foreach ( $tab_titles as $tab ) {
	preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
    $tab_atts = shortcode_parse_atts($tab[0]);
    if(isset($tab_atts['title'])) {
    	$cms_tab_icon = !empty($tab_atts['cms_tab_icon']) ? $tab_atts['cms_tab_icon'] : '';
        $tabs_nav .= '<li><a href="#tab-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'"><i class="'.$cms_tab_icon.'"></i>' . $tab_matches[1][0] . '</a></li>';

    }
}
$tabs_nav .= '</ul>' . "\n";

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' cms-tabs wpb_content_element ' . $el_class ), $this->settings['base'], $atts );

$output .= "\n\t" . '<div id="'.$tabs_id.'" class="' . $css_class . '" data-interval="' . $interval . '">';

$output .= "\n\t\t" . '<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix '.$tab_style.'">';
$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => $element . '_heading' ) );
$output .= "\n\t\t\t" . $tabs_nav;
$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
if ( 'vc_tour' == $this->shortcode ) {
	$output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav vc_clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="' . __( 'Previous tab', 'js_composer' ) . '">' . __( 'Previous tab', 'js_composer' ) . '</a></span> <span class="wpb_next_slide"><a href="#next" title="' . __( 'Next tab', 'js_composer' ) . '">' . __( 'Next tab', 'js_composer' ) . '</a></span></div>';
}
$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
$output .= "\n\t" . '</div> ' . $this->endBlockComment( $element );

echo $output;