<?php
$output = $title = $color_hover = $border_color_tab = $bg_color_tab = $color_tab = '';

extract(shortcode_atts(array(
    'title' => __("Section", "js_composer"),
    'color_hover' => '',
    'border_color_tab' => '',
    'bg_color_tab' => '',
    'color_tab' => '',
), $atts));
$uqid = uniqid();
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_accordion-'.$uqid.' wpb_accordion_section group', $this->settings['base'], $atts );
$output .= "\n\t\t\t" . '<div class="'.$css_class.'">';
	echo "<style type='text/css'>
		.style-1 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section .wpb_accordion_header {
			color: ".$color_tab.";
			background-color: ".$bg_color_tab." !important;
		}
		.style-1 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section .wpb_accordion_content {
			color: ".$color_tab.";
		}
		.style-1 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section .wpb_accordion_content {
			background-color: ".$bg_color_tab." !important;
		}
		.style-1 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section {
			border-color: ".$border_color_tab.";
		}
		.style-1 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section:hover,
		.style-1 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section.parent-active {
			border-color: ".$color_hover.";
		}
		body #wrapper .style-2 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section:hover .wpb_accordion_header,
		body #wrapper .style-2 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section .wpb_accordion_header.ui-state-active,
		body #wrapper .style-2 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section .wpb_accordion_header .ui-accordion-header-icon,
		body #wrapper .style-2 .wpb_accordion_wrapper .wpb_accordion-".$uqid.".wpb_accordion_section .wpb_accordion_content {
			background-color: ".$color_hover." !important;
		}
	</style>";
    $output .= "\n\t\t\t\t" . '<h3 class="wpb_accordion_header ui-accordion-header"></i>'.$title.'</a></h3>';
    $output .= "\n\t\t\t\t" . '<div class="wpb_accordion_content ui-accordion-content vc_clearfix">';
        $output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
        $output .= "\n\t\t\t\t" . '</div>';
    $output .= "\n\t\t\t" . '</div> ' . $this->endBlockComment('.wpb_accordion_section') . "\n";

echo $output;