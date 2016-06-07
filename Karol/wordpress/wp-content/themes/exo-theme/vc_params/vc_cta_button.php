<?php
/**
 * Add call to action params
 * 
 * @author Fox
 * @since 1.0.0
 */
/*
     * Call to Action Button ----------------------------------------------------------
     */
$target_arr = array (
        __ ( 'Same window', 'js_composer' ) => '_self',
        __ ( 'New window', 'js_composer' ) => "_blank"
);
$button_type = array (
        __ ( 'Button Default', 'js_composer' ) => 'btn btn-default',
        __ ( 'btn btn-default-color', 'js_composer' ) => 'btn btn-default-color',
        __ ( 'Button Default Border', 'js_composer' ) => 'btn btn-default',
        __ ( 'Button Default Alternate Color', 'js_composer' ) => 'btn btn-default-alt',
        __ ( 'Button Primary', 'js_composer' ) => 'btn btn-primary',
        __ ( 'Button Primary Color', 'js_composer' ) => 'btn btn-primary-color',
        __ ( 'Button Primary Border', 'js_composer' ) => 'btn btn-primary-border',
        __ ( 'Button Primary Alternate Color', 'js_composer' ) => 'btn btn-primary-alt'
);
$button_type_children = array (
        __ ( 'Button Default', 'js_composer' ) => 'btn btn-default',
        __ ( 'btn btn-default-color', 'js_composer' ) => 'btn btn-default-color',
        __ ( 'Button Default Border', 'js_composer' ) => 'btn btn-default',
        __ ( 'Button Default Alternate Color', 'js_composer' ) => 'btn btn-default-alt',
        __ ( 'Button Primary', 'js_composer' ) => 'btn btn-primary',
        __ ( 'Button Primary Color', 'js_composer' ) => 'btn btn-primary-color',
        __ ( 'Button Primary Border', 'js_composer' ) => 'btn btn-primary-border',
        __ ( 'Button Primary Alternate Color', 'js_composer' ) => 'btn btn-primary-alt'
);
$size_arr = array (
        __ ( 'Default', 'js_composer' ) => 'size-default',
        __ ( 'Large', 'js_composer' ) => 'btn-lg btn-large',
        __ ( 'Medium', 'js_composer' ) => 'btn-md btn-medium',
        __ ( 'Small', 'js_composer' ) => 'btn-sm btn-small',
        __ ( 'Mini', 'js_composer' ) => 'btn-xs btn-mini'
);
vc_map ( array (
    'name' => __ ( 'Call to Action Button', 'js_composer' ),
    'base' => 'vc_cta_button',
    'icon' => 'icon-wpb-call-to-action',
    'category' => __ ( 'Content', 'js_composer' ),
    'description' => __ ( 'Catch visitors attention with CTA block', 'js_composer' ),
    'params' => array (
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
                'type' => 'colorpicker',
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
                'heading' => __ ( 'Call Out Icon', 'js_composer' ),
                'param_name' => 'call_out_icon',
                'description' => __ ( 'Select icon website(http://fortawesome.github.io/Font-Awesome/icons - http://ionicons.com/', 'js_composer' )
        ),
        array (
                'type' => 'textfield',
                'heading' => __ ( 'Text on the button children', 'js_composer' ),
                'param_name' => 'title_children',
                'value' => __ ( '', 'js_composer' ),
                'description' => __ ( 'Text on the button children.', 'js_composer' )
        ),
        array (
                'type' => 'textfield',
                'heading' => __ ( 'URL (Link) Children', 'js_composer' ),
                'param_name' => 'href_children',
                'description' => __ ( 'Button link children.', 'js_composer' )
        ),
        array (
                'type' => 'dropdown',
                'heading' => __ ( 'Button Type Children', 'js_composer' ),
                'param_name' => 'button_type_children',
                'value' => $button_type_children,
                'description' => __ ( 'Button Type Children.', 'js_composer' ),
                'param_holder_class' => 'vc-button-type-dropdown'
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