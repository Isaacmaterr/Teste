<?php
add_action('init', 'cshero_vc_extra_param');
/* add extra param for vc shortcodes */
function cshero_vc_extra_param()
{
    global $post;
    if (function_exists('vc_add_param')) {
            vc_add_param("vc_custom_heading", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Heading Letter Spacing", THEMENAME),
                "admin_label" => true,
                "param_name" => "letter_spacing",
                "value" => array(
                    '0' => '0em',
                    '0.01em' => '0.01em',
                    '0.02em' => '0.02em',
                    '0.03em' => '0.03em',
                    '0.04em' => '0.04em',
                    '0.05em' => '0.05em',
                    '0.06em' => '0.06em',
                    '0.07em' => '0.07em',
                    '0.08em' => '0.08em',
                    '0.09em' => '0.09em',
                    '0.1em' => '0.1em',
                    '0.2em' => '0.2em',
                    '0.3em' => '0.3em',
                    '0.4em' => '0.4em',
                    '0.5em' => '0.5em',
                    '0.6em' => '0.6em',
                    '0.7em' => '0.7em',
                    '0.8em' => '0.8em',
                    '0.9em' => '0.9em',
                ),
                'group' => 'CMS Customs'
            ));
            // Adding stripes to rows
            vc_remove_param('vc_row', 'parallax');
            vc_remove_param('vc_row', 'parallax_image');
            vc_remove_param('vc_row', 'el_id');
            vc_remove_param('vc_row', 'video_bg');
            vc_remove_param('vc_row', 'video_bg_url');
            vc_remove_param('vc_row', 'video_bg_parallax');
            vc_remove_param('vc_row', 'columns_placement');
            vc_remove_param('vc_row', 'equal_height');
            vc_remove_param('vc_row', 'full_height');
            vc_remove_param('vc_row', 'gap');
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => __('Responsive utilities', THEMENAME),
                "param_name" => "row_responsive_large",
                "value" => array(
                    __("Hidden (Large devices)", THEMENAME) => true
                ),
                "group" => "Responsive",
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "row_responsive_medium",
                "value" => array(
                    __("Hidden (Medium devices)", THEMENAME) => true
                ),
                "group" => "Responsive",
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "row_responsive_small",
                "value" => array(
                    __("Hidden (Small devices)", THEMENAME) => true
                ),
                "group" => "Responsive",
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "row_responsive_extra_small",
                "value" => array(
                    __("Hidden (Extra small devices)", THEMENAME) => true
                ),
                "group" => "Responsive",
                "description" => __("For faster mobile-friendly development, use these utility classes for showing and hiding content by device via media query.", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "heading" => __("ID Name for Navigation", THEMENAME),
                "param_name" => "dt_id",
                "group" => "One Page",
                "description" => __("If this row wraps the content of one of your sections, set an ID. You can then use it for navigation. Ex: work", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "heading" => __("Scroll Offset", THEMENAME),
                "param_name" => "dt_offset",
                "group" => "One Page",
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("SCROLL NEXT STEP", THEMENAME),
                "param_name" => "one_headding1",
                "value" => "",
                "group" => __("One Page", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Row Scroll", THEMENAME),
                "param_name" => "enable_row_sc",
                "value" => array(
                    "" => "false"
                ),
                "group" => __("One Page", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "heading" => __("ID Name Scroll Top", THEMENAME),
                "param_name" => "row_top_sc",
                "group" => __("One Page", THEMENAME),
                "description" => __("", THEMENAME),
                "description" => __("Please add ID scroll top. Ex: #row1", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "heading" => __("ID Name Scroll Bottom", THEMENAME),
                "param_name" => "row_bottom_sc",
                "group" => __("One Page", THEMENAME),
                "description" => __("", THEMENAME),
                "description" => __("Please add ID scroll bottom. Ex: #row2", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Arrow color", THEMENAME),
                "param_name" => "row_ar_color",
                "value" => "",
                "description" => __("Select color for arrow.", THEMENAME),
                "group" => __("One Page", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "heading" => __("Row style", THEMENAME),
                "admin_label" => true,
                "param_name" => "type",
                "value" => array(
                    "Default" => "",
                    "Custom" => "ww-custom",
                    "Background 2 Color" => "csrow-2color",
                    "Column No Padding" => "csrow-colno-padding ",
                    "Call To Action Custom" => "call-to-action-custom"
                ),
                "group" => "Style",
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Color Left", THEMENAME),
                "param_name" => "bg_color_left",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "csrow-2color"
                    ),
                    "not_empty" => true
                ),
                "group" => "Style",
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Color Right", THEMENAME),
                "param_name" => "bg_color_right",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "csrow-2color"
                    ),
                    "not_empty" => true
                ),
                "group" => "Style",
            ));
            vc_add_param('vc_row', array(
                'type' => 'dropdown',
                'heading' => "Full Width",
                'param_name' => 'full_width',
                'value' => array(
                    "No" => "false",
                    "Yes" => "true"
                ),
                'description' => "Only activated on main layout full width"
            ));
            vc_add_param('vc_row', array(
                'type' => 'dropdown',
                'heading' => "Arrow Slider",
                'param_name' => 'arrow_slider',
                'value' => array(
                    "No" => "false",
                    "Yes" => "true"
                ),
                'description' => "Only activated on main layout full width"
            ));
            vc_add_param('vc_row', array(
                'type' => 'dropdown',
                'heading' => "Column Same Height",
                'param_name' => 'exo_same_height',
                'value' => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Heading color", THEMENAME),
                "param_name" => "row_head_color",
                "value" => "",
                "description" => __("Select color for head.", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Link color", THEMENAME),
                "param_name" => "row_link_color",
                "value" => "",
                "description" => __("Select color for link.", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Link color hover", THEMENAME),
                "param_name" => "row_link_color_hover",
                "value" => "",
                "description" => __("Select color for link hover.", THEMENAME)
            ));

            vc_add_param("vc_row_inner", array(
                'type' => 'dropdown',
                'heading' => "Column Same Height",
                'param_name' => 'exo_same_height',
                'value' => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", THEMENAME),
                "admin_label" => true,
                "param_name" => "animation",
                "value" => array(
                    "None" => "none",
                    "FadeIn" => "rda_fadeIn",
                    "FadeInDown" => "rda_fadeInDown",
                    "FadeInUp" => "rda_fadeInUp",
                    "FadeInLeft" => "rda_fadeInLeft",
                    "FadeInRight" => "rda_fadeInRight",
                    "BounceIn" => "rda_bounceIn",
                    "BounceInDown" => "rda_bounceInDown",
                    "BounceInUp" => "rda_bounceInUp",
                    "BounceInLeft" => "rda_bounceInLeft",
                    "BounceInRight" => "rda_bounceInRight",
                    "ZoomIn" => "rda_zoomIn",
                    "FlipInX" => "rda_flipInX",
                    "FlipInY" => "rda_flipInY",
                    "Bounce" => "rda_bounce",
                    "Flash" => "rda_flash",
                    "Shake" => "rda_shake",
                    "Pulse" => "rda_pulse",
                    "Swing" => "rda_swing",
                    "RubberBand" => "rda_rubberBand",
                    "Wobble" => "rda_wobble",
                    "Tada" => "rda_tada"
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Angle", THEMENAME),
                "param_name" => "enable_row_engle",
                "value" => array(
                    "" => "false"
                ),
                "group" => "Angle",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Angle Position", THEMENAME),
                "admin_label" => true,
                "param_name" => "engle_position",
                "value" => array(
                    "None" => "",
                    "Top Left" => "engle-top-left",
                    "Top Right" => "engle-top-right",
                    "Bottom Right" => "engle-bottom-right",
                    "Bottom Left" => "engle-bottom-left"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Height", THEMENAME),
                "param_name" => "height_engle",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Color", THEMENAME),
                "param_name" => "engle_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Border Color", THEMENAME),
                "param_name" => "engle_border_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Border Width", THEMENAME),
                "param_name" => "engle_border_width",
                "value" => "0",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Angle Duplicated", THEMENAME),
                "param_name" => "enable_engle_duplicate",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Angle Position Duplicated", THEMENAME),
                "admin_label" => true,
                "param_name" => "engle_position_duplicate",
                "value" => array(
                    "None" => "",
                    "Top Left" => "engle-top-left",
                    "Top Right" => "engle-top-right",
                    "Bottom Right" => "engle-bottom-right",
                    "Bottom Left" => "engle-bottom-left"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Duplicated Height", THEMENAME),
                "param_name" => "engle_uplicated_height",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Duplicated Color", THEMENAME),
                "param_name" => "engle_duplicated_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Duplicated Border Color", THEMENAME),
                "param_name" => "engle_duplicated_border_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Duplicated Border Width", THEMENAME),
                "param_name" => "engle_duplicated_border_width",
                "value" => "0",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Angle Style 2", THEMENAME),
                "param_name" => "enable_engle_style2",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Angle Position Style 2", THEMENAME),
                "admin_label" => true,
                "param_name" => "engle_position_style2",
                "value" => array(
                    "None" => "",
                    "Top Style1" => "engle-top-style1",
                    "Top Style2" => "engle-top-style2",
                    "Bottom Style1" => "engle-bottom-style1",
                    "Bottom Style2" => "engle-bottom-style2"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Height Style 2", THEMENAME),
                "param_name" => "height_engle_style2",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Color Style 2", THEMENAME),
                "param_name" => "engle_color_style2",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Duplicated Angle Style 2", THEMENAME),
                "param_name" => "enable_engle_duplicated_style2",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Angle Duplicated Position Style 2", THEMENAME),
                "admin_label" => true,
                "param_name" => "engle_duplicated_position_style2",
                "value" => array(
                    "None" => "",
                    "Top Style1" => "engle-top-style1",
                    "Top Style2" => "engle-top-style2",
                    "Bottom Style1" => "engle-bottom-style1",
                    "Bottom Style2" => "engle-bottom-style2"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Angle Duplicated Height Style 2", THEMENAME),
                "param_name" => "engle_duplicated_height_style2",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Angle Duplicated Color Style 2", THEMENAME),
                "param_name" => "engle_duplicated_color_style2",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Curve - Top", THEMENAME),
                "param_name" => "enable_curve",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Curve Height - Top", THEMENAME),
                "param_name" => "curve_height",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Curve Color - Top", THEMENAME),
                "param_name" => "curve_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable Curve - Bottom", THEMENAME),
                "param_name" => "enable_curve2",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Curve Height - Bottom", THEMENAME),
                "param_name" => "curve_height2",
                "value" => "60px",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Curve Color - Bottom", THEMENAME),
                "param_name" => "curve_color2",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    ),
                    "not_empty" => true
                ),
                "group" => "Angle",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable parallax", THEMENAME),
                "param_name" => "enable_parallax",
                "value" => array(
                    "" => true
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Background ratio", THEMENAME),
                "param_name" => "parallax_speed",
                "value" => "0.8",
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Overlay Color", THEMENAME),
                "param_name" => "bg_video_color",
                "value" => "",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Overlay Opacity", THEMENAME),
                "param_name" => "bg_video_transparent",
                "value" => "0",
                "description" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Disable parallax mobile", THEMENAME),
                "param_name" => "disable_parallax_mobile",
                "value" => array(
                    "" => "false"
                ),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                ),
                "group" => "Style",
            ));

            vc_add_param ( "vc_row", array (
                    "type" => "attach_image",
                    "class" => "",
                    "heading" => __( "Video poster", THEMENAME ),
                    "param_name" => "poster",
                    "value" => "",
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Loop", THEMENAME ),
                    "param_name" => "loop",
                    "value" => array (
                            __( "Yes, please", THEMENAME )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Autoplay", THEMENAME ),
                    "param_name" => "autoplay",
                    "value" => array (
                            __( "Yes, please", THEMENAME )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Muted", THEMENAME ),
                    "param_name" => "muted",
                    "value" => array (
                            __( "Yes, please", THEMENAME )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Controls", THEMENAME ),
                    "param_name" => "controls",
                    "value" => array (
                            __( "Yes, please", THEMENAME )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param ( "vc_row", array (
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => __( "Show Button Play", THEMENAME ),
                    "param_name" => "show_btn",
                    "value" => array (
                            __( "Yes, please", THEMENAME )  => true,
                    ),
                    "dependency" => array(
                        "element" => "type",
                        "not_empty" => true
                    ),
                    "group" => "Style",
            ) );
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (mp4)", THEMENAME),
                "param_name" => "bg_video_src_mp4",
                "value" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (ogv)", THEMENAME),
                "param_name" => "bg_video_src_ogv",
                "value" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (webm)", THEMENAME),
                "param_name" => "bg_video_src_webm",
                "value" => "",
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                ),
                "group" => "Style",
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 1", THEMENAME),
                "param_name" => "lax_headding1",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 1", THEMENAME),
                "param_name" => "lax_layer1",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 1 Width', THEMENAME),
                'param_name' => 'lax_layer1_width',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 1 Height', THEMENAME),
                'param_name' => 'lax_layer1_height',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 1 Align", THEMENAME),
                "admin_label" => true,
                "param_name" => "lax_layer1_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 1 Position X', THEMENAME),
                'param_name' => 'lax_layer1_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 1 Position Y', THEMENAME),
                'param_name' => 'lax_layer1_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 1 Speed', THEMENAME),
                'param_name' => 'lax_layer1_speed',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Time move default 5s', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 1 Move', THEMENAME),
                'param_name' => 'lax_layer1_move',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 2", THEMENAME),
                "param_name" => "lax_headding2",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 2", THEMENAME),
                "param_name" => "lax_layer2",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 2 Width', THEMENAME),
                'param_name' => 'lax_layer2_width',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 2 Height', THEMENAME),
                'param_name' => 'lax_layer2_height',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 2 Align", THEMENAME),
                "admin_label" => true,
                "param_name" => "lax_layer2_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 2 Position X', THEMENAME),
                'param_name' => 'lax_layer2_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 2 Position Y', THEMENAME),
                'param_name' => 'lax_layer2_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 2 Speed', THEMENAME),
                'param_name' => 'lax_layer2_speed',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Time move default 5s', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 2 Move', THEMENAME),
                'param_name' => 'lax_layer2_move',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 3", THEMENAME),
                "param_name" => "lax_headding3",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 3", THEMENAME),
                "param_name" => "lax_layer3",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 3 Width', THEMENAME),
                'param_name' => 'lax_layer3_width',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 3 Height', THEMENAME),
                'param_name' => 'lax_layer3_height',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 3 Align", THEMENAME),
                "admin_label" => true,
                "param_name" => "lax_layer3_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 3 Position X', THEMENAME),
                'param_name' => 'lax_layer3_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 3 Position Y', THEMENAME),
                'param_name' => 'lax_layer3_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 3 Speed', THEMENAME),
                'param_name' => 'lax_layer3_speed',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Time move default 5s', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 3 Move', THEMENAME),
                'param_name' => 'lax_layer3_move',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 4", THEMENAME),
                "param_name" => "lax_headding4",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 4", THEMENAME),
                "param_name" => "lax_layer4",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 4 Width', THEMENAME),
                'param_name' => 'lax_layer4_width',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 4 Height', THEMENAME),
                'param_name' => 'lax_layer4_height',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 4 Align", THEMENAME),
                "admin_label" => true,
                "param_name" => "lax_layer4_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 4 Position X', THEMENAME),
                'param_name' => 'lax_layer4_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 4 Position Y', THEMENAME),
                'param_name' => 'lax_layer4_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 4 Speed', THEMENAME),
                'param_name' => 'lax_layer4_speed',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Time move default 5s', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 4 Move', THEMENAME),
                'param_name' => 'lax_layer4_move',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 5", THEMENAME),
                "param_name" => "lax_headding5",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 5", THEMENAME),
                "param_name" => "lax_layer5",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 5 Width', THEMENAME),
                'param_name' => 'lax_layer5_width',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 5 Height', THEMENAME),
                'param_name' => 'lax_layer5_height',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 5 Align", THEMENAME),
                "admin_label" => true,
                "param_name" => "lax_layer5_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 5 Position X', THEMENAME),
                'param_name' => 'lax_layer5_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 5 Position Y', THEMENAME),
                'param_name' => 'lax_layer5_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 5 Speed', THEMENAME),
                'param_name' => 'lax_layer5_speed',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Time move default 5s', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 5 Move', THEMENAME),
                'param_name' => 'lax_layer5_move',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 6", THEMENAME),
                "param_name" => "lax_headding6",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 6", THEMENAME),
                "param_name" => "lax_layer6",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 6 Width', THEMENAME),
                'param_name' => 'lax_layer6_width',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 6 Height', THEMENAME),
                'param_name' => 'lax_layer6_height',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 6 Align", THEMENAME),
                "admin_label" => true,
                "param_name" => "lax_layer6_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 6 Position X', THEMENAME),
                'param_name' => 'lax_layer6_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 6 Position Y', THEMENAME),
                'param_name' => 'lax_layer6_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 6 Speed', THEMENAME),
                'param_name' => 'lax_layer6_speed',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Time move default 5s', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 6 Move', THEMENAME),
                'param_name' => 'lax_layer6_move',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 7", THEMENAME),
                "param_name" => "lax_headding7",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 7", THEMENAME),
                "param_name" => "lax_layer7",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 7 Width', THEMENAME),
                'param_name' => 'lax_layer7_width',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 7 Height', THEMENAME),
                'param_name' => 'lax_layer7_height',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 7 Align", THEMENAME),
                "admin_label" => true,
                "param_name" => "lax_layer7_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 7 Position X', THEMENAME),
                'param_name' => 'lax_layer7_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 7 Position Y', THEMENAME),
                'param_name' => 'lax_layer7_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 7 Speed', THEMENAME),
                'param_name' => 'lax_layer7_speed',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Time move default 5s', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 7 Move', THEMENAME),
                'param_name' => 'lax_layer7_move',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "",
                "class" => "",
                "heading" => __("OPTION LAYER 8", THEMENAME),
                "param_name" => "lax_headding8",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Lax Layer 8", THEMENAME),
                "param_name" => "lax_layer8",
                "value" => "",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 8 Width', THEMENAME),
                'param_name' => 'lax_layer8_width',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 8 Height', THEMENAME),
                'param_name' => 'lax_layer8_height',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'px,em,...', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Lax Layer 8 Align", THEMENAME),
                "admin_label" => true,
                "param_name" => "lax_layer8_align",
                "value" => array(
                    "Left Top" => "lax_left_top",
                    "Center Top" => "lax_center_top",
                    "Right Top" => "lax_right_top",
                    "Left Middle" => "lax_left_middle",
                    "Center Middle" => "lax_center_middle",
                    "Right Middle" => "lax_right_middle",
                    "Left Bottom" => "lax_left_bottom",
                    "Center Bottom" => "lax_center_bottom",
                    "Right Bottom" => "lax_right_bottom"
                ),
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 8 Position X', THEMENAME),
                'param_name' => 'lax_layer8_position_x',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Lax Layer 8 Position Y', THEMENAME),
                'param_name' => 'lax_layer8_position_y',
                "description" => "Value: px, em - Apply when you choose: Left Top, Right Top, Left Bottom, Right Bottom",
                "group" => __("Lax", THEMENAME)
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 8 Speed', THEMENAME),
                'param_name' => 'lax_layer8_speed',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Time move default 5s', THEMENAME )
            ));
            vc_add_param("vc_row", array(
                'type' => 'textfield',
                'heading' => __('Layer 8 Move', THEMENAME),
                'param_name' => 'lax_layer8_move',
                "group" => __("Lax", THEMENAME),
                "description" => __ ( 'Default 40 lax move -40 to 40 px', THEMENAME )
            ));
            vc_add_param('vc_row', array(
                'type' => 'dropdown',
                'heading' => __("Row Arrow", THEMENAME),
                'param_name' => 'row_arrow',
                'value' => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                'group' => 'Style'
            ));
            vc_add_param('vc_row', array(
                'type' => 'dropdown',
                'heading' => __("Arrow Position", THEMENAME),
                'param_name' => 'arrow_position',
                'value' => array(
                    'Top' => 'top',
                    'Bottom' => 'bottom'
                ),
                'group' => 'Style',
                "dependency" => array(
                    "element" => "row_arrow",
                    "value" => array(
                        "yes"
                    )
                ),
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __('Arrow Color', THEMENAME),
                "param_name" => "arrow_color",
                'group' => 'Style',
                "dependency" => array(
                    "element" => "row_arrow",
                    "value" => array(
                        "yes"
                    )
                ),
                "description" => ''
            ));
        
        /* vc column */
        
            vc_add_param("vc_column", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __('Font Color', THEMENAME),
                "param_name" => "font_color",
                "description" => ''
            ));

            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => __('Responsive utilities', THEMENAME),
                "param_name" => "column_responsive_large",
                "value" => array(
                    __("Hidden (Large devices)", THEMENAME) => true
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "column_responsive_medium",
                "value" => array(
                    __("Hidden (Medium devices)", THEMENAME) => true
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "column_responsive_small",
                "value" => array(
                    __("Hidden (Small devices)", THEMENAME) => true
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "column_responsive_extra_small",
                "value" => array(
                    __("Hidden (Extra small devices)", THEMENAME) => true
                ),
                "description" => __("For faster mobile-friendly development, use these utility classes for showing and hiding content by device via media query.", THEMENAME)
            ));
            vc_add_param("vc_column", array(
                "type" => "checkbox",
                "heading" => 'Image Transition',
                "param_name" => "image_transition",
                "value" => array(
                    __("Yes", THEMENAME) => true
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", THEMENAME),
                "admin_label" => true,
                "param_name" => "animation",
                "value" => array(
                    "None" => "",
                    "FadeIn" => "rda_fadeIn",
                    "FadeInDown" => "rda_fadeInDown",
                    "FadeInUp" => "rda_fadeInUp",
                    "FadeInLeft" => "rda_fadeInLeft",
                    "FadeInRight" => "rda_fadeInRight",
                    "BounceIn" => "rda_bounceIn",
                    "BounceInDown" => "rda_bounceInDown",
                    "BounceInUp" => "rda_bounceInUp",
                    "BounceInLeft" => "rda_bounceInLeft",
                    "BounceInRight" => "rda_bounceInRight",
                    "ZoomIn" => "rda_zoomIn",
                    "FlipInX" => "rda_flipInX",
                    "FlipInY" => "rda_flipInY",
                    "Bounce" => "rda_bounce",
                    "Flash" => "rda_flash",
                    "Shake" => "rda_shake",
                    "Pulse" => "rda_pulse",
                    "Swing" => "rda_swing",
                    "RubberBand" => "rda_rubberBand",
                    "Wobble" => "rda_wobble",
                    "Tada" => "rda_tada"
                )
            ));
            vc_add_param("vc_column_inner", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __('Font Color', THEMENAME),
                "param_name" => "font_color",
                "description" => ''
            ));
            vc_add_param("vc_column_inner", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", THEMENAME),
                "admin_label" => true,
                "param_name" => "animation",
                "value" => array(
                    "None" => "",
                    "FadeIn" => "rda_fadeIn",
                    "FadeInDown" => "rda_fadeInDown",
                    "FadeInUp" => "rda_fadeInUp",
                    "FadeInLeft" => "rda_fadeInLeft",
                    "FadeInRight" => "rda_fadeInRight",
                    "BounceIn" => "rda_bounceIn",
                    "BounceInDown" => "rda_bounceInDown",
                    "BounceInUp" => "rda_bounceInUp",
                    "BounceInLeft" => "rda_bounceInLeft",
                    "BounceInRight" => "rda_bounceInRight",
                    "ZoomIn" => "rda_zoomIn",
                    "FlipInX" => "rda_flipInX",
                    "FlipInY" => "rda_flipInY",
                    "Bounce" => "rda_bounce",
                    "Flash" => "rda_flash",
                    "Shake" => "rda_shake",
                    "Pulse" => "rda_pulse",
                    "Swing" => "rda_swing",
                    "RubberBand" => "rda_rubberBand",
                    "Wobble" => "rda_wobble",
                    "Tada" => "rda_tada"
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Text Align", THEMENAME),
                "admin_label" => true,
                "param_name" => "text_align",
                "value" => array(
                    "None" => "",
                    "Inherit" => "inherit",
                    "Initial" => "initial",
                    "Justify" => "justify",
                    "Left" => "left",
                    "Right" => "right",
                    "Center" => "center",
                    "Start" => "start",
                    "End" => "end"
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Column Heading Style", THEMENAME),
                "admin_label" => true,
                "param_name" => "column_style",
                "value" => array(
                    "Default" => "default",
                    "Title Primary Color" => "title-preset1",
                    "Title Secondary Color" => "title-preset2",
                    "Title Feature Box" => "title-feature-box",
                    "Title and Subtitle" => "title-sub",
                    "Title Construction Style 1" => "title-construction style1",
                    "Title Construction Style 2 Line Bottom Fixed" => "title-construction style2",
                    "Title Construction Style 3 Line Bottom Mini" => "title-construction style3",
                    "Fixed Row Padding Mobile" => "cs-padding-mobile"
                ),
                "description" => __("Add some styles to column", THEMENAME)
            ));
            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("List Style", THEMENAME),
                "admin_label" => true,
                "param_name" => "list_style",
                "value" => array(
                    "No Style" => "no",
                    "Style Arrow Color" => "list-style-1",
                    "Style Square Dot" => "list-style-2",
                ),
                "description" => __("Add some styles to list", THEMENAME)
            ));
        
        // Pie chart
        
            vc_add_param("vc_pie", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Heading size", THEMENAME),
                "param_name" => "heading_size",
                "value" => array(
                    "Default" => "h4",
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 3" => "h3",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "description" => 'Select your heading size for title.'
            ));
            vc_add_param("vc_pie", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __('Title Color', THEMENAME),
                "param_name" => "title_color",
                "description" => ''
            ));
            vc_add_param("vc_pie", array(
                'type' => 'textfield',
                'heading' => __('Pie icon', THEMENAME),
                'param_name' => 'icon',
                'description' => __('', THEMENAME),
                'value' => '',
                'admin_label' => true
            ));
            vc_add_param("vc_pie", array(
                'type' => 'textfield',
                'heading' => __('Icon Size', THEMENAME),
                'param_name' => 'icon_size',
                'description' => __('Font size of icon', THEMENAME),
                'value' => '24',
                'admin_label' => true
            ));
            vc_add_param("vc_pie", array(
                'type' => 'colorpicker',
                'heading' => __('Icon Color', THEMENAME),
                'param_name' => 'icon_color',
                'description' => __('', THEMENAME),
                'value' => '#888',
                'admin_label' => true
            ));
            vc_remove_param("vc_pie", "color");
            vc_add_param("vc_pie", array(
                'type' => 'colorpicker',
                'heading' => __('Bar color', THEMENAME),
                'param_name' => 'color',
                'value' => '#00c3b6', // $pie_colors,
                'description' => __('Select pie chart color.', THEMENAME),
                'admin_label' => true,
                'param_holder_class' => 'vc-colored-dropdown'
            ));
            vc_add_param("vc_pie", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Bar Width", THEMENAME),
                "param_name" => "pie_width",
                "value" => "12",
                "description" => __('', THEMENAME)
            ));
            vc_add_param("vc_pie", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Description", THEMENAME),
                "param_name" => "desc",
                "value" => "",
                "description" => ""
            ));
            vc_add_param("vc_pie", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Style", THEMENAME),
                "param_name" => "style",
                "value" => array(
                    "Style 1" => "style1",
                    "Style 2" => "style2"
                ),
                "description" => __("Select style for pie.", THEMENAME)
            ));
            vc_add_param("vc_pie", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon", THEMENAME),
                "param_name" => "icon",
                "value" => "",
                "description" => __('You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart', THEMENAME)
            ));

        
        /*
         * Separator
         */
        
            vc_remove_param('vc_separator', 'el_class');
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Style Border Width", THEMENAME),
                "param_name" => "border_width",
                "value" => "1",
                "description" => "Defualt 1"
            ));
            vc_add_param("vc_separator", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Separator align", THEMENAME),
                "param_name" => "align",
                "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right"
                ),
                "description" => ""
            ));
            vc_remove_param('vc_separator', 'el_width');
            vc_add_param("vc_separator", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Element width", THEMENAME),
                "param_name" => "el_width",
                "value" => array(
                    "100%" => "100",
                    "90%" => "90",
                    "80%" => "80",
                    "70%" => "70",
                    "60%" => "60",
                    "50%" => "50",
                    "40%" => "40",
                    "30%" => "30",
                    "20%" => "20",
                    "10%" => "10",
                ),
                "description" => ""
            ));
            vc_add_param("vc_separator", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Show Arrow", THEMENAME),
                "param_name" => "separator_arrow",
                "value" => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
                "description" => ""
            ));
            vc_add_param("vc_separator", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Arrow Type", THEMENAME),
                "param_name" => "separator_arrow_type",
                "value" => array(
                    "Border" => "border",
                    "Image" => "image"
                ),
                "description" => ""
            ));
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Arrow Width", THEMENAME),
                "param_name" => "arrow_width",
                "value" => "12",
                "description" => "Set Width for Arrow (Default 12)"
            ));
            vc_add_param("vc_separator", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Arrow Color", THEMENAME),
                "param_name" => "arrow_color",
                "value" => "",
                "description" => ""
            ));
            vc_add_param("vc_separator", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Arrow Image", THEMENAME),
                "param_name" => "arrow_image",
                "value" => "",
                "description" => "",
                "admin_label" => "true"
            ));
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Custom Sparator Width", THEMENAME),
                "param_name" => "custom_sparator_width",
                "value" => "",
                "description" => "Set Width Sparator Important: px, %"
            ));
        
        /*
         * Separator with Text
         */
        
            
            vc_add_param("vc_text_separator", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Color Title", THEMENAME),
                "param_name" => "color_title",
                "description" => __('', THEMENAME)
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Style Border Width", THEMENAME),
                "param_name" => "border_width",
                "value" => "1",
                "description" => "Defualt 1"
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Style Border Width", THEMENAME),
                "param_name" => "border_width",
                "value" => "1",
                "description" => "Defualt 1"
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "dropdown",
                "heading" => __("Heading size", THEMENAME),
                "param_name" => "heading_size",
                "value" => array(
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 3" => "h3",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "description" => 'Select your heading size for text.'
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Text Transform", THEMENAME),
                "param_name" => "text_transform",
                "value" => array(
                    "None" => "",
                    "Lowercase" => "lowercase",
                    "Uppercase" => "uppercase"
                ),
                "description" => "Uppercase & Lowercase for Text"
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Style Border Width", THEMENAME),
                "param_name" => "border_width",
                "value" => "1",
                "description" => "Defualt 1"
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Description", THEMENAME),
                "param_name" => "desc",
                "value" => "",
                "description" => ""
            ));
        
        /* accordion */
       
            vc_add_param("vc_accordion", array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Select Style", THEMENAME),
            "param_name" => "vc_accordion_style",
            "value" => array(
                'Style 1' => 'style-1',
                'Style 2' => 'style-2'
                )
            ));
        
        /* accordion tab */
        
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Tab Color Hover", THEMENAME),
                "param_name" => "color_hover",
                "description" => __('', THEMENAME)
            ));
        
        
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Border Color Tab", THEMENAME),
                "param_name" => "border_color_tab",
                "description" => __('Select color border tab, only tab style 1.', THEMENAME)
            ));
        
        
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Color Tab", THEMENAME),
                "param_name" => "bg_color_tab",
                "description" => __('Select color background tab, only tab style 1.', THEMENAME)
            ));
        
        
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Color Tab", THEMENAME),
                "param_name" => "color_tab",
                "description" => __('Select color tab, only tab style 1.', THEMENAME)
            ));
        
        /* VC Button */
        
            vc_remove_param('vc_button', 'color');
            vc_remove_param('vc_button', 'icon');
            vc_remove_param('vc_button', 'size');
            vc_add_param("vc_button", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Button Type", THEMENAME),
                "param_name" => "type",
                "value" => array(
                    'Button Default' => 'btn btn-default',
                    'Button Primary' => 'btn btn-primary',
                    'Button Border' => 'btn btn-border',
                    'Button Default Alt' => 'btn btn-default btn-default-alt',
                    'Button Primary Alt' => 'btn btn-primary btn-primary-alt',
                    'Button Warning' => 'btn btn-warning',
                    'Button Danger' => 'btn btn-danger',
                    'Button Success' => 'btn btn-success',
                    'Button Info' => 'btn btn-info',
                    'Button Inverse' => 'btn btn-inverse'
                ),
                "description" => __('', THEMENAME)
            ));
            $size_arr = array(
                __('Default', THEMENAME) => '',
                __('Large', THEMENAME) => 'btn-lg btn-large',
                __('Medium', THEMENAME) => 'btn-md btn-medium',
                __('Small', THEMENAME) => 'btn-sm btn-small',
                __('Mini', THEMENAME) => "btn-xs btn-mini"
            );
            vc_add_param("vc_button", array(
                'type' => 'dropdown',
                'heading' => __('Size', THEMENAME),
                'param_name' => 'size',
                'value' => $size_arr,
                'description' => __('Button size.', THEMENAME)
            ));
            vc_add_param("vc_button", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Button Align", THEMENAME),
                "param_name" => "button_align",
                "value" => array(
                    'None' => '',
                    'Left' => 'left',
                    'Right' => 'right'
                ),
                "description" => __('', THEMENAME)
            ));
            vc_add_param("vc_button", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Button Block", THEMENAME),
                "param_name" => "button_block",
                "value" => array(
                    "" => "true"
                ),
                "description" => __("Yes, please.", THEMENAME)
            ));
            vc_add_param("vc_button", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Button icon", THEMENAME),
                "param_name" => "button_icon",
                "value" => '',
                "description" => __('Please get icon Font Awesome. Ex: fa-home', THEMENAME)
            ));
        
        
            vc_add_param("vc_tab", array(
                "type" => "textfield",
                "heading" => __("Tab Icon", THEMENAME),
                "param_name" => "cms_tab_icon"
            ));
        
        /*
         * Contact form-7
         */
        
            vc_add_param("contact-form-7", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Contact Style", THEMENAME),
                "param_name" => "html_class",
                "value" => array(
                    'Style Default 1' => 'contact-style-1',
                    'Style Default 2' => 'contact-style-2',
                    'Form Style Jiro' => 'form-jiro contact-style-3',
                    'Form Style Jiro - White' => 'form-jiro contact-style-3 form-white',
                    'Form Style Hoshi' => 'form-hoshi contact-style-3',
                    'Form Style Akira' => 'form-akira contact-style-3',
                    'Form Style Madoka - White' => 'form-madoka form-white contact-style-3',
                    'Form Style Kozakura' => 'form-kozakura contact-style-3',
                ),
                "description" => ""
            ));
        
    }
}

vc_remove_element ( "vc_cta_button2" );
vc_remove_element ( "vc_button2" );
// intergrate VC
cs_integrateWithVC();
function cs_integrateWithVC() {
    $vc_is_wp_version_3_6_more = version_compare ( preg_replace ( '/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo ( 'version' ) ), '3.6' ) >= 0;
    /*
     * Tabs ----------------------------------------------------------
     */
    $tab_id_1 = time () . '-1-' . rand ( 0, 100 );
    $tab_id_2 = time () . '-2-' . rand ( 0, 100 );
    vc_map ( array (
            "name" => __ ( 'Tabs', 'js_composer' ),
            'base' => 'vc_tabs',
            'show_settings_on_create' => false,
            'is_container' => true,
            'icon' => 'icon-wpb-ui-tab-content',
            'category' => __ ( 'Content', 'js_composer' ),
            'description' => __ ( 'Tabbed content', 'js_composer' ),
            'params' => array (
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Widget title', 'js_composer' ),
                            'param_name' => 'title',
                            'description' => __ ( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Auto rotate tabs', 'js_composer' ),
                            'param_name' => 'interval',
                            'value' => array (
                                    __ ( 'Disable', 'js_composer' ) => 0,
                                    3,
                                    5,
                                    10,
                                    15
                            ),
                            'std' => 0,
                            'description' => __ ( 'Auto rotate tabs each X seconds.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Extra class name', 'js_composer' ),
                            'param_name' => 'el_class',
                            'description' => __ ( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
                    ),
                    array (
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
                    ),
                    array (
                            'type' => 'colorpicker',
                            'heading' => __ ( 'Title Font Color', 'js_composer' ),
                            'param_name' => 'title_font_color',
                            'std' => '#333333',
                            'description' => __ ( '', 'js_composer' )
                    ),
                    array (
                            'type' => 'colorpicker',
                            'heading' => __ ( 'Title Font Color Hover & Active', 'js_composer' ),
                            'param_name' => 'title_font_color_hover',
                            'std' => '#333333',
                            'description' => __ ( '', 'js_composer' )
                    ),
                    array (
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
                    ),
                    array (
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
                    )
            ),
            'custom_markup' => '
    <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
    <ul class="tabs_controls">
    </ul>
    %content%
    </div>',
            'default_content' => '
    [vc_tab title="' . __ ( 'Tab 1', 'js_composer' ) . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
    [vc_tab title="' . __ ( 'Tab 2', 'js_composer' ) . '" tab_id="' . $tab_id_2 . '"][/vc_tab]
    ',
            'js_view' => $vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35'
    ) );
    /*
     * Call to Action Button ----------------------------------------------------------
     */
    $target_arr = array (
            __ ( 'Same window', 'js_composer' ) => '_self',
            __ ( 'New window', 'js_composer' ) => "_blank"
    );
    $button_type = array (
            __ ( 'Button Default', 'js_composer' ) => 'btn-default',
            __ ( 'Button Primary', 'js_composer' ) => 'btn-primary',
            __ ( 'Button White', 'js_composer' ) => 'btn-primary btn-white'
    );
    $size_arr = array (
            __ ( 'Regular size', 'js_composer' ) => '',
            __ ( 'Large', 'js_composer' ) => 'btn-large',
            __ ( 'Small', 'js_composer' ) => 'btn-small',
            __ ( 'Mini', 'js_composer' ) => "btn-mini"
    );
    vc_map ( array (
            'name' => __ ( 'Call to Action Button', 'js_composer' ),
            'base' => 'vc_cta_button',
            'icon' => 'icon-wpb-call-to-action',
            'category' => __ ( 'Content', 'js_composer' ),
            'description' => __ ( 'Catch visitors attention with CTA block', 'js_composer' ),
            'params' => array (
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Icon', 'js_composer' ),
                            'param_name' => 'call_icon',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Font Awesome.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Icon size', 'js_composer' ),
                            'param_name' => 'call_icon_size',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Icon on font size px.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Icon color', 'js_composer' ),
                            'param_name' => 'call_icon_color',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Icon on color.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textarea',
                            'admin_label' => true,
                            'heading' => __ ( 'Text', 'js_composer' ),
                            'param_name' => 'call_text',
                            'value' => __ ( 'Click edit button to change this text.', 'js_composer' ),
                            'description' => __ ( 'Enter your content.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Text on the font size', 'js_composer' ),
                            'param_name' => 'call_text_font_size',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Text on font size px.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Text on the color', 'js_composer' ),
                            'param_name' => 'call_text_color',
                            'value' => __ ( '', 'js_composer' ),
                            'description' => __ ( 'Text on color.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Text on the button', 'js_composer' ),
                            'param_name' => 'title',
                            'value' => __ ( 'Text on the button', 'js_composer' ),
                            'description' => __ ( 'Text on the button.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'URL (Link)', 'js_composer' ),
                            'param_name' => 'href',
                            'description' => __ ( 'Button link.', 'js_composer' )
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Target', 'js_composer' ),
                            'param_name' => 'target',
                            'value' => $target_arr,
                            'dependency' => array (
                                    'element' => 'href',
                                    'not_empty' => true
                            )
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Button Type ', 'js_composer' ),
                            'param_name' => 'button_type',
                            'value' => $button_type,
                            'description' => __ ( 'Button Type.', 'js_composer' ),
                            'param_holder_class' => 'vc-button-type-dropdown'
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Button size', 'js_composer' ),
                            'param_name' => 'size',
                            'value' => $size_arr,
                            'description' => __ ( 'Button size.', 'js_composer' )
                    ),
                    array (
                            'type' => 'dropdown',
                            'heading' => __ ( 'Button align', 'js_composer' ),
                            'param_name' => 'position',
                            'value' => array (
                                    __ ( 'Align right', 'js_composer' ) => 'cs_align_right',
                                    __ ( 'Align left', 'js_composer' ) => 'cs_align_left'
                            ),
                            'description' => __ ( 'Select button alignment.', 'js_composer' )
                    ),
                    array (
                            'type' => 'textfield',
                            'heading' => __ ( 'Extra class name', 'js_composer' ),
                            'param_name' => 'el_class',
                            'description' => __ ( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
                    )
            ),
            'js_view' => 'VcCallToActionView'
    ) );
}