<?php
/**
 * Add tabs params
 * 
 * @author Fox
 * @since 1.0.0
 */
if (shortcode_exists('vc_tabs')) {
    vc_add_param("vc_tour", array(
        'type' => 'dropdown',
        'param_name' => 'tab_style',
        'heading' => __ ( 'Style', 'js_composer' ),
        'value' => array (
                "Style 1" => "style1",
                "Style 2" => "style2",
                "Style 3" => "style3"

        ),
        'std' => 'style1',
        'description' => __ ( '', 'js_composer' )
    ));
    vc_add_param("vc_tour", array(
        'type' => 'colorpicker',
        'heading' => __ ( 'Title Font Color', 'js_composer' ),
        'param_name' => 'title_font_color',
        'std' => '#333333',
        'description' => __ ( '', 'js_composer' )
    ));
    vc_add_param("vc_tour", array(
        'type' => 'colorpicker',
        'heading' => __ ( 'Title Font Color Hover & Active', 'js_composer' ),
        'param_name' => 'title_font_color_hover',
        'std' => '#333333',
        'description' => __ ( '', 'js_composer' )
    ));
    vc_add_param("vc_tour", array(
        'type' => 'colorpicker',
        'heading' => __ ( 'Tab Background Color Hover & Active', 'js_composer' ),
        'param_name' => 'tab_bg_color_hover',
        'std' => '',
        'description' => __ ( '', 'js_composer' ),
        'dependency' => array(
        "element"=>"tab_style",
        "value"=>array(
            "style2"
            )
        )
    ));
    vc_add_param("vc_tour", array(
        'type' => 'colorpicker',
        'heading' => __ ( 'Tab Border Color Hover & Active', 'js_composer' ),
        'param_name' => 'tab_border_color',
        'std' => '',
        'description' => __ ( '', 'js_composer' ),
        'dependency' => array(
            "element"=>"tab_style",
                "value"=>array(
                    "style3"
                )
            )
    ));
}