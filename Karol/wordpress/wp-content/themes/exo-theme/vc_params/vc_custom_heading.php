<?php
/**
 * Add custom headding params
 * 
 * @author Fox
 * @since 1.0.0
 */
if (shortcode_exists('vc_custom_heading')) {
    vc_add_param("vc_custom_heading", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Custom Heading Style", THEMENAME),
        "admin_label" => true,
        "param_name" => "cms_custom_headding",
        "value" => array(
            "Default" => "",
            "Style 1 - Title Line Left" => "cms-title-line-left",
            "Style 2 - Title Line Right" => "cms-title-line-right"
        )
    ));
    vc_add_param("vc_custom_heading", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Line Color", THEMENAME),
        "param_name" => "line_color",
        "value" => "",
        "description" => "",
        "dependency" => array(
            "element" => "cms_custom_headding",
            "value" => array(
                "cms-title-line-left", "cms-title-line-right"
            ),
            "not_empty" => true
        )
    ));
}