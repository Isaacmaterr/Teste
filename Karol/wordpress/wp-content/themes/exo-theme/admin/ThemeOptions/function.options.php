<?php

/* header custom */
$args = array('posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title', 'post_type' => 'header');
$header_layout = get_posts($args);
$custom_header = array();
foreach ($header_layout as $header) {
    $custom_header["cs-header-".$header->ID] = $header->post_title;
}
/* header from option */
global $header_layout;
$headers_default = array('' => 'Theme Option');
if(!empty($header_layout)){
    foreach ($header_layout as $key => $header){
        $headers_default[$key] = "Header {$key}";
    }
}
/* merge header custom + option */
$headers = array_merge($headers_default,$custom_header);

$border_style = array('none'=>'None','solid'=>'Solid','dotted'=>'Dotted','dashed'=>'Dashed','double'=>'Double','groove'=>'Groove','inset'=>'Inset','outset'=>'Outset','ridge'=>'Ridge');

$disable ='';

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$msg = '';
if (!class_exists('WPBakeryVisualComposerAbstract') or !class_exists('CSCORE_Base')){
    $disable = ' disabled ';
    $msg='You should be install visual composer and Cmssuperheroes plugins to import';
}
$this->sections[] = array(
    'icon' => 'el-icon-briefcase',
    'title' => __('Demo Content', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => '<input type=\'button\' name=\'sample\' id=\'sample\' '.$disable.' value=\'Import Now\' /><div class=\'cs_process\'><div  class=\'cs_process_width\'></div></div><span id=\'msg\'>'.$msg.'</span>',
            'id' => 'theme',
            'icon' => true,
            'default' => 'Exo_Theme',
            'options' => array(
                'Exo_Theme' => get_template_directory_uri().'/images/demo_content/exo-main.png',
            ),
            'type' => 'image_select',
            'title' => 'Select Theme'
        )
    )
);

$this->sections[] = array(
    'icon' => 'el-icon-laptop',
    'title' => __('Home Settings', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Enable Page Loading Animations',
            'id' => 'page_loader',
            'type' => 'switch',
            'title' => 'Page Loading',
            'default' => false
        ),
        array(
            'subtitle' => 'Choose how the page loading animation work',
            'id' => 'page_loader_style',
            'title' => 'Style Page Loading Animations',
            'type' => 'select',
            'options' => array(
                'simple' => 'Simple',
                'jump' => 'Jump',
                'flipbox' => 'Flip Box',
                'creeper' => 'Creeper',
                'squashbox' => 'Squash Box',
                'veggie' => 'Veggie',
                'infinity' => 'Infinity',
                'goo' => 'Goo'
            ),
            'default' => 'simple',
            'required' => array(
                0 => 'page_loader',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Choose background color for page loading.',
            'id' => 'page_loader_bg',
            'type' => 'color_rgba',
            'title' => 'Page loading background color',
            'default'  => array( 'color' => '#ffffff', 'alpha' => '1.0' ),
            'required' => array(
                0 => 'page_loader',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Choose color for icon loading.',
            'id' => 'page_loader_color',
            'type' => 'color_rgba',
            'title' => 'Page loading Icon color',
            'default'  => array( 'color' => '#59d7c5', 'alpha' => '1.0' ),
            'required' => array(
                0 => 'page_loader',
                1 => '=',
                2 =>  1
            )
        ),
        array(
            'subtitle' => 'Choose color for icon loading.',
            'id' => 'page_loader_color2',
            'type' => 'color_rgba',
            'title' => 'Page loading Icon color (2)',
            'default'  => array( 'color' => '#59d7c5', 'alpha' => '1.0' ),
            'required' => array(
                0 => 'page_loader',
                1 => '=',
                2 =>  1
            )
        ),
        array(
            'subtitle' => 'Select an image file for your page loading.',
            'id' => 'logo_page_loading',
            'type' => 'media',
            'title' => 'Page Loading Logo',
            'default' => array(
                'url'=>get_template_directory_uri().'/images/logo/logo.png'
            ),
            'url' => true
        ),
        array(
            'subtitle' => 'Enable Smooth Scroll Animations',
            'id' => 'smooth_scroll',
            'type' => 'switch',
            'title' => 'Smooth Scroll',
            'default' => false
        ),
        array(
            'subtitle' => 'Auto Generate Dynamic Css (not recommended)',
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => 'Dev Mode',
            'default' => false
        ),
        array(
            'subtitle' => 'Favicon for your website (16px x 16px).',
            'id' => 'favicon',
            'type' => 'media',
            'title' => 'Favicon',
            'url' => true,
            'default' => array(
                'url' => ''
            ),
        ),
        array(
            'subtitle' => 'Add code before the head tag.',
            'id' => 'space_head',
            'type' => 'textarea',
            'title' => 'Space before Head',
            'default' => ''
        ),
        array(
            'subtitle' => 'Add code before the body tag.',
            'id' => 'space_body',
            'type' => 'textarea',
            'title' => 'Space before Body',
            'default' => ''
        ),
    )
);

$this->sections[] = array(
    'icon' => 'el-icon-screen',
    'title' => __('Body', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Set layout boxed default(Wide).',
            'id' => 'layout',
            'type' => 'switch',
            'title' => 'Boxed Layout',
            'default' => false
        ),
        array(
            'subtitle' => 'Set content width',
            'id' => 'layout_width',
            'type' => 'text',
            'title' => 'Boxed Width',
            'default' => '',
            'required' => array(
                0 => 'layout',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the text color of the content boxed color.',
            'id' => 'content_boxed_color',
            'type' => 'color',
            'title' => 'Content Boxed Color',
            'default' => '#fff',
            'required' => array(
                0 => 'layout',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'id'       => 'background-body',
            'type'     => 'background',
            'title'    => __( 'Background', THEMENAME ),
            'subtitle' => __( 'Body background with image, color, etc.', THEMENAME ),
            'default'   => array(
                'background-color'=>'#FFFFFF',
                'background-image'=>'',
                'background-repeat'=>'',
                'background-size'=>'',
                'background-attachment'=>'',
                'background-position'=>''
            ),
        )
    )
);
/**
 * Logo
 */
$this->sections[] = array(
    'title' => __('Logo', THEMENAME),
    'icon' => 'el-icon-globe',
    'fields' => array(
        array(
            'subtitle' => 'Select an image file for your logo.',
            'id' => 'logo',
            'type' => 'media',
            'title' => 'Logo',
            'default' => array(
                'url'=>get_template_directory_uri().'/images/logo/logo.png'
            ),
            'url' => true
        ),
        array(
            'subtitle' => 'Enter logo height, In pixels, ex: 40px',
            'id' => 'logo_width',
            'type' => 'text',
            'title' => 'Logo Height',
            'default' => '39px'
        ),
        array(
            'subtitle' => 'Controls the height of the sticky header logo. In pixels, ex: 40px',
            'id' => 'header_sticky_logo_max_height',
            'type' => 'text',
            'title' => 'Sticky Header Logo Height',
            'default' => '29px'
        ),
        array(
            'subtitle' => 'In pixels, top right bottom left, ex: 10px 10px 10px 10px',
            'id' => 'margin_logo',
            'type' => 'text',
            'title' => 'Logo Margin',
            'default' => ''
        ),
        array(
            'subtitle' => 'In pixels, top right bottom left, ex: 10px 10px 10px 10px',
            'id' => 'padding_logo',
            'type' => 'text',
            'title' => 'Logo Padding',
            'default' => '0px 0px 0px 10px'
        )
    )
);
/**
 * Header
 */
$this->sections[] = array(
    'title' => __('Header', THEMENAME),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'type' => 'image_select',
            'options' => array(
                'v1' => get_template_directory_uri().'/images/header/header1.jpg',
                'v2' => get_template_directory_uri().'/images/header/header2.jpg',
                'v4' => get_template_directory_uri().'/images/header/header4.jpg',
                'custom' => get_template_directory_uri().'/images/header/custom.jpg'
            ),
            'title' => 'Select a Header Layout',
            'default' => 'v1'
        ),
        array(
            'id' => 'cs-header-id',
            'type' => 'select',
            'title' => 'Select Custom Header',
            'options'=>$headers,
            'required' => array( 0 => 'header_layout', 1 => '=', 2 => 'custom' ),
        ),
        array(
            'subtitle' => 'Enable Header Full Width.',
            'id' => 'header_full_width',
            'type' => 'switch',
            'title' => 'Header Full Width',
            'default' => true
        ),
        array(
            'subtitle' => 'Enable a fixed header.',
            'id' => 'header_fixed_top',
            'type' => 'switch',
            'title' => 'Enable Header Fixed',
            'default' => false
        ),
        array(
            'subtitle' => 'Select Position for menu',
            'id' => 'menu_position',
            'type' => 'select',
            'options' => array(
                'left' => 'left',
                'right' => 'right'
            ),
            'title' => 'Menu Position',
            'default' => 'right'
        ),
        array(
            'id'       => 'background-header',
            'type'     => 'background',
            'title'    => __( 'Background', THEMENAME ),
            'subtitle' => __( 'Header background with image, color, etc.', THEMENAME ),
            'default'   => array(
                'background-color'=>'#13151c',
                'background-image'=>'',
                'background-repeat'=>'',
                'background-size'=>'',
                'background-attachment'=>'',
                'background-position'=>''
            ),
        ),
        array(
            'subtitle' => 'Transparent Header.<br /> Min: 0, max: 100, step: 1, default value: 45',
            'id' => 'header_transparent',
            'min'           => 0,
            'step'          => .1,
            'max'           => 1,
            'resolution'    => 0.1,
            'type' => 'slider',
            'title' => 'Transparent Header',
            'default' => '1'
        ),
        array(
            'subtitle' => 'Enable parallax background image when scrolling.',
            'id' => 'header_bg_parallax',
            'type' => 'switch',
            'title' => 'Parallax Background Image',
            'default' => false
        ),
        array(
            'subtitle' => 'Select border style.',
            'id' => 'header_border_style',
            'type' => 'select',
            'options' => array(
                'none' => 'none',
                'solid' => 'solid',
                'dotted' => 'dotted',
                'double' => 'double',
                'dashed' => 'dashed',
                'groove' => 'groove'
            ),
            'title' => 'Header Border Style',
            'default' => ''
        ),
        array(
            'subtitle' => 'Header Border Color.',
            'id' => 'header_border_color',
            'type' => 'color',
            'title' => 'Header Border Color',
            'default' => ''
        ),
        array(
            'subtitle' => 'In pixels/em..., top left botton right, ex: 1px 1px 1px 1px',
            'id' => 'header_border_width',
            'type' => 'text',
            'title' => 'Header Border Width',
            'default' => ''
        ),
        array(
            'subtitle' => 'Header Margin, In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'header_margin',
            'type' => 'text',
            'title' => 'Header Margin',
            'default' => ''
        ),
        array(
            'subtitle' => 'Header Padding, In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'header_padding',
            'type' => 'text',
            'title' => 'Header Padding',
            'default' => ''
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-minus',
    'title' => __('Header Top', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Display header top widgets.',
            'id' => 'header_top_widgets',
            'type' => 'switch',
            'title' => 'Header Top Widgets',
            'default' => false
        ),
        array(
            'subtitle' => 'Select the number of columns to display in the header top.',
            'id' => 'header_top_widgets_columns',
            'options' => array(
                1 => '1',
                2 => '2',
                3 => '3'
            ),
            'type' => 'select',
            'title' => 'Number of Header Top Columns',
            'default' => '3',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Class follow the Bootstrap 3',
            'id' => 'header_top_widgets_1',
            'type' => 'text',
            'title' => 'Class Header Top Widget 1',
            'default' => 'col-xs-12 col-sm-6 col-md-4 col-lg-4',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Class follow the Bootstrap 3',
            'id' => 'header_top_widgets_2',
            'type' => 'text',
            'title' => 'Class Header Top Widget 2',
            'default' => 'col-xs-12 col-sm-6 col-md-4 col-lg-4',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Class follow the Bootstrap 3',
            'id' => 'header_top_widgets_3',
            'type' => 'text',
            'title' => 'Class Header Top Widget 3',
            'default' => 'col-xs-12 col-sm-6 col-md-4 col-lg-4',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the background color of the top header.',
            'id' => 'header_top_bg_color',
            'type' => 'color_rgba',
            'title' => 'Header Top Background Color',
            'default'  => array( 'color' => '#000', 'alpha' => '1' ),
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the text color of the header heading font.',
            'id' => 'header_top_headings_color',
            'type' => 'color',
            'title' => 'Header Top Headings Color',
            'default' => '',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the text color of the header font.',
            'id' => 'header_top_text_color',
            'type' => 'color',
            'title' => 'Header Top Font Color',
            'default' => '',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the text color of the header link font.',
            'id' => 'header_top_link_color',
            'type' => 'color',
            'title' => 'Header Top Link Color',
            'default' => '',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Header Link Hover Color.',
            'id' => 'header_top_link_hover_color',
            'type' => 'color',
            'title' => 'Header Link Hover Color',
            'default' => '',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Header Top Padding, In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'header_top_padding',
            'type' => 'text',
            'title' => 'Header Top Padding',
            'default' => '',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Default search menu icon Padding, In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'default_search_padding',
            'type' => 'text',
            'title' => 'Default search menu icon padding',
            'default' => '0px 10px 0px 10px',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Default hidden sidebar icon Padding, In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'default_hidden_sidebar_padding',
            'type' => 'text',
            'title' => 'Default hidden sidebar icon padding',
            'default' => '0 5px 0 25px',
            'required' => array(
                0 => 'header_top_widgets',
                1 => '=',
                2 => 1
            )
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-resize-vertical',
    'title' => __('Sticky Header', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Enable a fixed header when scrolling.',
            'id' => 'header_sticky',
            'type' => 'switch',
            'title' => 'Enable Sticky Header',
            'default' => false
        ),
        array(
            'subtitle' => 'Sticky Height',
            'id' => 'sticky_header_height',
            'type' => 'text',
            'title' => 'Sticky Height',
            'default' => '60px',
            'required' => array( 0 => 'header_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => 'Enable Sticky Border Image.',
            'id' => 'sticky_border_bottom_image',
            'type' => 'switch',
            'title' => 'Sticky Border Bottom Image',
            'default' => true,
            'required' => array( 0 => 'header_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => 'Select an image file for your border bottom.',
            'id' => 'border_bottom_image',
            'type' => 'media',
            'title' => 'Select Image',
            'default' => array(
                'url'=>get_template_directory_uri().'/images/border-bottom-sticky.jpg'
            ),
            'required' => array( 0 => 'sticky_border_bottom_image', 1 => '=', 2 => 1 ),
            'url' => true
        ),
        array(
            'subtitle' => 'Use a number with \'px\', ex: 10px',
            'id' => 'border_height_sticky',
            'type' => 'text',
            'title' => 'Border Height',
            'default' => '3px',
            'required' => array( 0 => 'sticky_border_bottom_image', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => 'Enable a fixed header when scrolling on tablets.',
            'id' => 'header_sticky_tablet',
            'type' => 'switch',
            'title' => 'Enable Sticky Header on Tablets',
            'default' => false,
            'required' => array( 0 => 'header_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => 'Enable a fixed header when scrolling on mobiles.',
            'id' => 'header_sticky_mobile',
            'type' => 'switch',
            'title' => 'Enable Sticky Header on Mobiles',
            'default' => false,
            'required' => array( 0 => 'header_sticky', 1 => '=', 2 => 1 )
        ),
    )
);
/**
 * Main Menu
 */
$this->sections[] = array(
    'title' => __('Main Menu', THEMENAME),
    'icon' => 'el-icon-th-list',
    'fields' => array(
        array(
            'subtitle' => 'Use a number with \'px\', ex: 100px',
            'id' => 'nav_height',
            'type' => 'text',
            'title' => 'Main Nav Height',
            'default' => '100px'
        ),
        
        array(
            'subtitle' => 'Menu first level text uppercase.',
            'id' => 'menu_first_level_text_uppecase',
            'type' => 'switch',
            'title' => 'Menu First Level Text Uppercase',
            'default' => true
        ),
        array(
            'subtitle' => 'Controls the border color of first level menu items.',
            'id' => 'menu_border_color',
            'type' => 'color',
            'title' => 'Main Menu border Color - First Level',
            'default' => '#494c54'
        ),
        array(
            'id' => 'typography_11',
            'type' => 'typography',
            'title' => __('Select Main Menu Font', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'output'  => array('.cshero-dropdown > li > a, .menu-pages .menu > ul > li > a'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_12',
            'type' => 'typography',
            'title' => __('Select Sticky Menu Font', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'output'  => array('.header-fixed .cshero-dropdown > li > a'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
                'text-align' => ''
            )
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-magic',
    'title' => __('Default Menu', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Controls the background color of the menu.',
            'id' => 'menu_bg_color',
            'type' => 'color',
            'title' => 'Main Menu Background Color',
            'default' => 'transparent'
        ),
        array(
            'subtitle' => 'Use a number with \'px\', ex: 14px',
            'id' => 'menu_fontsize_first_level',
            'type' => 'text',
            'title' => 'Menu Font Size - First Level',
            'default' => '13px'
        ),
        
        array(
            'subtitle' => 'Controls the text color of first level menu items.',
            'id' => 'menu_first_color',
            'type' => 'color',
            'title' => 'Main Menu Font Color - First Level',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Controls the main menu hover, hover border & dropdown border color.',
            'id' => 'menu_hover_first_color',
            'type' => 'color',
            'title' => 'Main Menu Font Hover Color - First Level',
            'default' => '#00acc8'
        ),
        array(
            'subtitle' => 'Controls the main menu active, active border.',
            'id' => 'menu_active_first_color',
            'type' => 'color',
            'title' => 'Main Menu Font Active Color - First Level',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Controls the hover color of the menu first level background.',
            'id' => 'menu_bg_hover_color_first',
            'type' => 'color_rgba',
            'title' => 'Main Menu Background Hover Color - First Levels',
            'default'  => array( 'color' => '', 'alpha' => '1.0' )
        ),
        array(
            'subtitle' => 'Controls the actived color of the menu first level background.',
            'id' => 'menu_bg_actived_color_first',
            'type' => 'color_rgba',
            'title' => 'Main Menu actived Background  Color - First Levels',
            'default'  => array( 'color' => '', 'alpha' => '1' )
        ),

        array(
            'subtitle' => 'Just use a number, ex:10. Default unit is Pixel',
            'id' => 'nav_padding_left',
            'type' => 'text',
            'title' => 'Menu Item Padding Left',
            'default' => '12'
        ),
        array(
            'subtitle' => 'Just use a number, ex:10. Default unit is Pixel',
            'id' => 'nav_padding_top',
            'type' => 'text',
            'title' => 'Menu Item Padding Top',
            'default' => '0'
        ),
        array(
            'subtitle' => 'Just use a number, ex:10. Default unit is Pixel',
            'id' => 'nav_padding_right',
            'type' => 'text',
            'title' => 'Menu Item Padding Right',
            'default' => '12'
        ),
        array(
            'subtitle' => 'Just use a number, ex:10. Default unit is Pixel',
            'id' => 'nav_padding_bottom',
            'type' => 'text',
            'title' => 'Menu Item Padding Bottom',
            'default' => '0'
        ),
        array(
            'subtitle' => 'Use a number with \'px\', ex: 10px 10px',
            'id' => 'nav_margin',
            'type' => 'text',
            'title' => 'Menu Item Margin',
            'default' => '0px'
        ),

        array(
            'subtitle' => 'Controls the color of the menu sublevel background.',
            'id' => 'menu_sub_bg_color',
            'type' => 'color',
            'title' => 'Main Menu Background Color - Sublevels',
            'default' => '#13151c'
        ),
        array(
            'subtitle' => 'Use a number with \'px\', ex: 12px',
            'id' => 'menu_fontsize_sub_level',
            'type' => 'text',
            'title' => 'Menu Font Size First Sublevel',
            'default' => '13px'
        ),
        array(
            'subtitle' => 'Controls the color of the menu font sublevels.',
            'id' => 'menu_sub_color',
            'type' => 'color',
            'title' => 'Main Menu Font Color - Sublevels',
            'default' => '#ffffff'
        ),
        
        array(
            'subtitle' => 'Controls the hover color of the menu sublevel background.',
            'id' => 'menu_bg_hover_color',
            'type' => 'color',
            'title' => 'Main Menu Item Background Hover & Active Color - Sublevels',
            'default' => '#00acc8'
        ),

        array(
            'subtitle' => 'Controls the hover color of the menu font sublevels.',
            'id' => 'menu_sub_hover_color',
            'type' => 'color',
            'title' => 'Main Menu Font Hover Color - Sublevels',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Controls the active color of the menu font sublevels.',
            'id' => 'menu_sub_active_color',
            'type' => 'color',
            'title' => 'Main Menu Font Active Color - Sublevels',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Controls the color of the menu border separator sublevels.',
            'id' => 'menu_sub_sep_color',
            'type' => 'color',
            'title' => 'Main Menu border separator - Sublevels',
            'default' => '#494c54'
        )
    )
);

$this->sections[] = array(
    'icon' => 'el-icon-website-alt',
    'title' => __('Mobile Colors', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Controls the background color of the mobile menu.',
            'id' => 'mobile_menu_bg_color',
            'type' => 'color',
            'title' => 'Mobile Menu Background Color',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Controls the text color of first level menu items.',
            'id' => 'mobile_menu_first_color',
            'type' => 'color',
            'title' => 'Mobile Menu Font Color - First Level',
            'default' => '#666666'
        ),
        array(
            'subtitle' => 'Controls the main menu hover.',
            'id' => 'mobile_menu_hover_first_color',
            'type' => 'color',
            'title' => 'Mobile Menu Font Hover Color - First Level',
            'default' => '#00acc8'
        ),
        array(
            'subtitle' => 'Controls the color of the menu font sublevels.',
            'id' => 'mobile_menu_sub_color',
            'type' => 'color',
            'title' => 'Mobile Menu Font Color - Sublevels',
            'default' => '#666666'
        ),
        array(
            'subtitle' => 'Controls the color hover of the menu font sublevels.',
            'id' => 'mobile_menu_sub_hover_color',
            'type' => 'color',
            'title' => 'Mobile Menu Font Hover Color - Sublevels',
            'default' => '#00acc8'
        ),
        array(
            'subtitle' => 'Controls the color of the menu separator sublevels.',
            'id' => 'mobile_menu_sub_sep_color',
            'type' => 'color',
            'title' => 'Mobile Menu Separator - Sublevels',
            'default' => '#dddddd'
        )
    )
);

/**
 * Hidden Sidebar
 */
$this->sections[] = array(
    'title' => __('Hidden Sidebar', THEMENAME),
    'icon' => 'el-icon-eye-open',
    'fields' => array(
        array(
            'id' => 'enable_hidden_sidebar',
            'type' => 'switch',
            'title' => 'Enable Hidden Sidebar',
            'default' => false
        ),
        array(
            'subtitle' => 'Use a number with \'px\', ex: 200px',
            'id' => 'hidden_sidebar_width',
            'type' => 'text',
            'title' => 'Hidden Sidebar Width',
            'default' => '330px',
            'required' => array(
                0 => 'enable_hidden_sidebar',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Select icon Font Awesome, Default is fa fa-sign-out . <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Click here</a> for get AweSome icon.',
            'id' => 'hidden_sidebar_icon',
            'type' => 'text',
            'title' => 'Hidden Sidebar Icon',
            'default' => 'fa fa-sign-out',
            'required' => array(
                0 => 'enable_hidden_sidebar',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'If you choose it will be replaced hidden sidebar icon.',
            'id' => 'hidden_sidebar_text',
            'type' => 'text',
            'title' => 'Hidden Sidebar Text',
            'default' => '',
            'required' => array(
                0 => 'enable_hidden_sidebar',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the color background of the hidden sidebar.',
            'id' => 'hidden_sidebar_background_color',
            'type' => 'color',
            'title' => 'Hidden Sidebar Background Color',
            'default' => '#ef634c',
            'required' => array(
                0 => 'enable_hidden_sidebar',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the font color of the hidden sidebar.',
            'id' => 'hidden_sidebar_font_color',
            'type' => 'color',
            'title' => 'Hidden Sidebar Font Color',
            'default' => '#fff',
            'required' => array(
                0 => 'enable_hidden_sidebar',
                1 => '=',
                2 => 1
            )
        )
    )
);
/**
 * Footer
 */
$this->sections[] = array(
    'title' => __('Footer', THEMENAME),
    'icon' => 'el-icon-minus',
    'fields' => array(
        array(
            'id' => 'footer_layout',
            'type' => 'image_select',
            'options' => array(
                'f1' => get_template_directory_uri().'/images/footer/footer1.jpg'
            ),
            'title' => 'Select a Footer Layout',
            'default' => 'f1'
        ),
        array(
            'subtitle' => 'Enable Footer Full Width.',
            'id' => 'footer_full_width',

            'type' => 'switch',
            'title' => 'Full Width',
            'default' => false
        ),
        array(
            'subtitle' => 'Enable back to top.',
            'id' => 'footer_to_top',

            'type' => 'switch',
            'title' => 'Back To Top',
            'default' => true
        ),
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-chevron-up',
    'title' => __('Top', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Display footer top widgets.',
            'id' => 'footer_top_widgets',

            'type' => 'switch',
            'title' => 'Footer Top Widgets',
            'default' => true
        ),
        array(
            'subtitle' => 'Select the number of columns to display in the footer top.',
            'id' => 'footer_top_widgets_columns',
            'options' => array(
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4'
            ),
            'type' => 'select',
            'title' => 'Number of Footer Top Columns',
            'default' => '4',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Class follow the Bootstrap 3',
            'id' => 'footer_top_widgets_1',
            'type' => 'text',
            'title' => 'Class Footer Widget 1',
            'default' => 'col-xs-12 col-sm-6 col-md-3 col-lg-3',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Class follow the Bootstrap 3',
            'id' => 'footer_top_widgets_2',
            'type' => 'text',
            'title' => 'Class Footer Widget 2',
            'default' => 'col-xs-12 col-sm-6 col-md-3 col-lg-3',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Class follow the Bootstrap 3',
            'id' => 'footer_top_widgets_3',
            'type' => 'text',
            'title' => 'Class Footer Widget 3',
            'default' => 'col-xs-12 col-sm-6 col-md-3 col-lg-3',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Class follow the Bootstrap 3',
            'id' => 'footer_top_widgets_4',
            'type' => 'text',
            'title' => 'Class Footer Widget 4',
            'default' => 'col-xs-12 col-sm-6 col-md-3 col-lg-3',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the text color of the footer top heading font.',
            'id' => 'footer_headings_color',
            'type' => 'color',
            'title' => 'Footer Top Headings Color',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Insert the number of words you want to show in the footer heading size',
            'id' => 'footer_top_heading_font_size',
            'type' => 'text',
            'title' => 'Footer Top Headings Font Size',
            'default' => '20px',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Display footer top headings uppercase.',
            'id' => 'footer_top_heading_uppercase',

            'type' => 'switch',
            'title' => 'Footer Top Headings Uppercase',
            'default' => true
        ),
        array(
            'subtitle' => 'Controls the text color of the footer top font.',
            'id' => 'footer_text_color',
            'type' => 'color',
            'title' => 'Footer Top Font Color',
            'default' => '#fff',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the text color of the footer top link font.',
            'id' => 'footer_link_color',
            'type' => 'color',
            'title' => 'Footer Top Link Color',
            'default' => '#fff',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Footer Top Link Hover Color.',
            'id' => 'footer_link_hover_color',
            'type' => 'color',
            'title' => 'Footer Top Link Hover Color',
            'default' => '#36ccb2'
        ),
        array(
            'subtitle' => 'Footer Top social Color.',
            'id' => 'footer_social_color',
            'type' => 'color',
            'title' => 'Footer Top social Color',
            'default' => '#fff',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Footer Top social hover Color.',
            'id' => 'footer_social_hover_color',
            'type' => 'color',
            'title' => 'Footer Top social Hover Color',
            'default' => '#36ccb2',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Select border style.',
            'id' => 'footer_top_border_style',
            'type' => 'select',
            'options' => array(
                'none' => 'none',
                'solid' => 'solid',
                'dotted' => 'dotted',
                'double' => 'double',
                'dashed' => 'dashed',
                'groove' => 'groove'
            ),
            'title' => 'Border Style',
            'default' => 'none',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Footer Top Border Color.',
            'id' => 'footer_top_border_color',
            'type' => 'color',
            'title' => 'Border Color',
            'default' => '',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'In pixels/em..., top left botton right, ex: 1px 1px 1px 1px',
            'id' => 'footer_top_border_width',
            'type' => 'text',
            'title' => 'Footer Top Border Width',
            'default' => '',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'id'       => 'background-footer-top',
            'type'     => 'background',
            'title'    => __( 'Background', THEMENAME ),
            'subtitle' => __( 'Footer Top background with image, color, etc.', THEMENAME ),
            'default'   => array(
                'background-color'=>'#13151c',
                'background-image'=>'',
                'background-repeat'=>'',
                'background-size'=>'',
                'background-attachment'=>'',
                'background-position'=>''
            ),
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Enable parallax background image when scrolling.',
            'id' => 'footer_top_bg_parallax',

            'type' => 'switch',
            'title' => 'Background Parallax',
            'default' => false,
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'footer_top_padding',
            'type' => 'text',
            'title' => 'Footer Top Padding',
            'default' => '90px 0 70px 0',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'footer_top_margin',
            'type' => 'text',
            'title' => 'Footer Top Margin',
            'default' => '0px',
            'required' => array(
                0 => 'footer_top_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Enable Footer Border Top Image.',
            'id' => 'footer_border_img',
            'type' => 'switch',
            'title' => 'Footer Border Top Image',
            'default' => true
        ),
        array(
            'subtitle' => 'Select an image file for your border bottom.',
            'id' => 'footer_border_img_select',
            'type' => 'media',
            'title' => 'Select Image',
            'default' => array(
                'url'=>get_template_directory_uri().'/images/bg-line-footer.png'
            ),
            'required' => array( 0 => 'footer_border_img', 1 => '=', 2 => 1 ),
            'url' => true
        ),
        array(
            'subtitle' => 'Use a number with \'px\', ex: 10px',
            'id' => 'footer_border_img_height',
            'type' => 'text',
            'title' => 'Border Height',
            'default' => '5px',
            'required' => array( 0 => 'footer_border_img', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => 'Color Arrow',
            'id' => 'footer_border_color_arrow',
            'type' => 'color',
            'title' => 'Color Arrow',
            'default' => '#ffffff',
            'required' => array( 0 => 'footer_border_img', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => 'Enable curve',
            'id' => 'enable_curve_footer',

            'type' => 'switch',
            'title' => 'Enable Curve Top',
            'default' => false
        ),
        array(
            'subtitle' => 'Curve color',
            'id' => 'curve_footer_color',
            'type' => 'color',
            'title' => 'Curve Color',
            'default' => '#fff',
            'required' => array(
                0 => 'enable_curve_footer',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Curve height',
            'id' => 'curve_footer_height',
            'type' => 'text',
            'title' => 'Curve Heihgt',
            'default' => '25px',
            'required' => array(
                0 => 'enable_curve_footer',
                1 => '=',
                2 => 1
            )
        ),
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-chevron-down',
    'title' => __('Bottom', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Check the box to display footer bottom widgets.',
            'id' => 'footer_bottom_widgets',
            'type' => 'switch',
            'title' => 'Footer Bottom Widgets',
            'default' => true
        ),
        array(
            'subtitle' => 'Select the number of columns to display in the footer bottom.',
            'id' => 'footer_bottom_widgets_columns',
            'options' => array(
                1 => '1',
                2 => '2'
            ),
            'type' => 'select',
            'title' => 'Number of Footer Bottom Columns',
            'default' => '2',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Class follow the Bootstrap 3',
            'id' => 'footer_bottom_widgets_1',
            'type' => 'text',
            'title' => 'Class Footer Bottom Widget 1',
            'default' => 'col-xs-12 col-sm-6 col-md-6 col-lg-6',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Class follow the Bootstrap 3',
            'id' => 'footer_bottom_widgets_2',
            'type' => 'text',
            'title' => 'Class Footer Bottom Widget 2',
            'default' => 'col-xs-12 col-sm-6 col-md-6 col-lg-6',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Text Align For Footer Bottom Widget 1.',
            'id' => 'text_align_footer_bottom_widgets_1',
            'options' => array(
                'none' => 'none',
                'left' => 'left',
                'center' => 'center',
                'right' => 'right'
            ),
            'type' => 'select',
            'title' => 'Text Align For Footer Bottom Widget 1',
            'default' => 'left',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Text Align For Footer Bottom Widget 2.',
            'id' => 'text_align_footer_bottom_widgets_2',
            'options' => array(
                'none' => 'none',
                'left' => 'left',
                'center' => 'center',
                'right' => 'right'
            ),
            'type' => 'select',
            'title' => 'Text Align For Footer Bottom Widget 2',
            'default' => 'right',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Footer Bottom Background Color.',
            'id' => 'footer_bottom_bg_color',
            'type' => 'color',
            'title' => 'Footer Bottom Background Color',
            'default' => '#1e2129',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the text color of the footer bottom heading font.',
            'id' => 'footer_bottom_headings_color',
            'type' => 'color',
            'title' => 'Footer Bottom Headings Color',
            'default' => '#fff',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the text color of the footer bottom font.',
            'id' => 'footer_bottom_text_color',
            'type' => 'color',
            'title' => 'Footer Bottom Font Color',
            'default' => '#62666f',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Controls the text color of the footer bottom link font.',
            'id' => 'footer_bottom_link_color',
            'type' => 'color',
            'title' => 'Footer Bottom Link Color',
            'default' => '#62666f',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Footer Bottom Link Hover Color.',
            'id' => 'footer_bottom_link_hover_color',
            'type' => 'color',
            'title' => 'Footer Bottom Link Hover Color',
            'default' => '#fff',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Select border style.',
            'id' => 'footer_bottom_border_style',
            'type' => 'select',
            'options' => array(
                'none' => 'none',
                'solid' => 'solid',
                'dotted' => 'dotted',
                'double' => 'double',
                'dashed' => 'dashed',
                'groove' => 'groove'
            ),
            'title' => 'Footer Bottom Border Style',
            'default' => 'none',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Footer Bottom Border Color.',
            'id' => 'footer_bottom_border_color',
            'type' => 'color',
            'title' => 'Footer Bottom Border Color',
            'default' => '',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'In pixels/em..., top left botton right, ex: 1px 1px 1px 1px',
            'id' => 'footer_bottom_border_width',
            'type' => 'text',
            'title' => 'Footer Bottom Border Width',
            'default' => '',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'footer_bottom_padding',
            'type' => 'text',
            'title' => 'Footer Bottom Padding',
            'default' => '40px 0',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'footer_bottom_margin',
            'type' => 'text',
            'title' => 'Footer Bottom Margin',
            'default' => '',
            'required' => array(
                0 => 'footer_bottom_widgets',
                1 => '=',
                2 => 1
            )
        )
    )
);
/**
 * Button Options
 */
$this->sections[] = array(
    'title' => __('Button Options', THEMENAME),
    'icon' => 'el-icon-play',
    'fields' => array(

        array(
            'subtitle' => 'Make the text in button is uppercase or not',
            'id' => 'button_uppercase',
            'type' => 'switch',
            'title' => 'Button Text Uppercase',
            'default' => true
        ),
        array(
            'subtitle' => 'In pixels, top, ex: 10px',
            'id' => 'button_padding_top',
            'type' => 'text',
            'title' => 'Button Padding Top',
            'default' => '8px'
        ),
        array(
            'subtitle' => 'In pixels, right, ex: 10px',
            'id' => 'button_padding_right',
            'type' => 'text',
            'title' => 'Button Padding Right',
            'default' => '8px'
        ),
        array(
            'subtitle' => 'In pixels, botton, ex: 10px',
            'id' => 'button_padding_bottom',
            'type' => 'text',
            'title' => 'Button Padding Bottom',
            'default' => '8px'
        ),
        array(
            'subtitle' => 'In pixels,left, ex: 10px',
            'id' => 'button_padding_left',
            'type' => 'text',
            'title' => 'Button Padding Left',
            'default' => '8px'
        ),
        array(
            'subtitle' => 'In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'button_margin',
            'type' => 'text',
            'title' => 'Button Margin',
            'default' => '20px 0px'
        )
    )
);
/* Default Button */
$this->sections[] = array(
    'title' => __('Default Button', THEMENAME),
    'icon' => 'el-icon-forward-alt',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Default is 14px',
            'id' => 'button_font_size',
            'type' => 'text',
            'title' => 'Font Size',
            'default' => '14px'
        ),
        array(
            'subtitle' => 'Button Border Style.',
            'id' => 'button_border_style',
            'type' => 'select',
            'options' => array(
                'solid' => 'solid',
                'dotted' => 'dotted',
                'dashed' => 'dashed',
                'none' => 'none',
                'hidden' => 'hidden',
                'double' => 'double',
                'groove' => 'groove',
                'ridge' => 'ridge',
                'inset' => 'inset',
                'outset' => 'outset',
                'initial' => 'initial',
                'inherit' => 'inherit'
            ),
            'title' => 'Border Style',
            'default' => 'solid'
        ),
        array(
            'subtitle' => 'Controls the border color of the buttons.',
            'id' => 'button_border_color',
            'type' => 'color',
            'title' => 'Border Color',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Controls the border color hover of the buttons.',
            'id' => 'button_border_color_hover',
            'type' => 'color',
            'title' => 'Border Color Hover',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Button Border Width for: Top, Right, Bottom, Left',
            'id' => 'button_border_width',
            'type' => 'text',
            'title' => 'Border Width',
            'default' => '1px 1px 1px 1px'
        ),
        array(
            'subtitle' => '',
            'id' => 'button_border_top',
            'type' => 'switch',
            'title' => 'Show/Hide Border Top',
            'default' => true
        ),
        
        array(
            'subtitle' => '',
            'id' => 'button_border_right',

            'type' => 'switch',
            'title' => 'Show/Hide Border Right',
            'default' => true
        ),
        array(
            'subtitle' => '',
            'id' => 'button_border_bottom',

            'type' => 'switch',
            'title' => 'Show/Hide Border Bottom',
            'default' => true
        ),
        array(
            'subtitle' => '',
            'id' => 'button_border_left',

            'type' => 'switch',
            'title' => 'Show/Hide Border Left',
            'default' => true
        ),
        array(
            'subtitle' => 'Border Radius. In pixels ex: 3px',
            'id' => 'button_border_radius',
            'type' => 'text',
            'title' => 'Border Radius',
            'default' => ''
        ),
        array(
            'subtitle' => 'Controls the text color of buttons.',
            'id' => 'button_gradient_text_color',
            'type' => 'color',
            'title' => 'Default Text Color',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Controls the text color hover of buttons.',
            'id' => 'button_gradient_text_color_hover',
            'type' => 'color',
            'title' => 'Default Text Color Hover',
            'default' => '#13151c'
        ),
        array(
            'subtitle' => 'Controls the button background color.',
            'id' => 'button_gradient_top_color',
            'type' => 'color_rgba',
            'title' => 'Default Background Color',
            'default'  => array( 'color' => '', 'alpha' => '1' )
        ),
        array(
            'subtitle' => 'Controls the button background color hover.',
            'id' => 'button_gradient_top_color_hover',
            'type' => 'color_rgba',
            'title' => 'Default Background Hover Color',
            'default'  => array( 'color' => '#ffffff', 'alpha' => '1' )
        )
    )
);
/**
 * Button Primary
 */
$this->sections[] = array(
    'icon' => 'el-icon-forward-alt',
    'title' => __('Primary Button', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => ' Font Size. Default is: 14px',
            'id' => 'button_primary_font_size',
            'type' => 'text',
            'title' => 'Button Font Size',
            'default' => '16px'
        ),
        
        array(
            'subtitle' => 'Border Style.',
            'id' => 'button_primary_border_style',
            'type' => 'select',
            'options' => array(
                'solid' => 'solid',
                'dotted' => 'dotted',
                'dashed' => 'dashed',
                'none' => 'none',
                'hidden' => 'hidden',
                'double' => 'double',
                'groove' => 'groove',
                'ridge' => 'ridge',
                'inset' => 'inset',
                'outset' => 'outset',
                'initial' => 'initial',
                'inherit' => 'inherit'
            ),
            'title' => 'Border Style',
            'default' => 'solid'
        ),
        array(
            'subtitle' => 'Controls the border color of the buttons.',
            'id' => 'button_primary_border_color',
            'type' => 'color',
            'title' => 'Border Color',
            'default' => '#222222'
        ),
        array(
            'subtitle' => 'Controls the border color hover of the buttons.',
            'id' => 'button_primary_border_color_hover',
            'type' => 'color',
            'title' => 'Border Color Hover',
            'default' => '#00accb'
        ),
        array(
            'subtitle' => 'Button Primary Border Width for : Top, Right, Bottom, Left',
            'id' => 'button_primary_border_width',
            'type' => 'text',
            'title' => 'Border Width',
            'default' => '1px 1px 1px 1px',
        ),

        array(
            'subtitle' => '',
            'id' => 'button_primary_border_top',
            'type' => 'switch',
            'title' => 'Show/Hide Border Top',
            'default' => true
        ),
        array(
            'subtitle' => '',
            'id' => 'button_primary_border_right',
            'type' => 'switch',
            'title' => 'Show/Hide Border Right',
            'default' => true
        ),
        array(
            'subtitle' => '',
            'id' => 'button_primary_border_bottom',

            'type' => 'switch',
            'title' => 'Show/Hide Border Bottom',
            'default' => true
        ),
        
        array(
            'subtitle' => '',
            'id' => 'button_primary_border_left',
            'type' => 'switch',
            'title' => 'Show/Hide Border Left',
            'default' => true
        ),
        array(
            'subtitle' => 'Ex: 3px',
            'id' => 'button_primary_border_radius',
            'type' => 'text',
            'title' => 'Border Radius',
            'default' => '3px'
        ),
        array(
            'subtitle' => 'Controls the text color of buttons.',
            'id' => 'button_primary_text_color',
            'type' => 'color',
            'title' => 'Text Color',
            'default' => '#222'
        ),
        array(
            'subtitle' => 'Controls the text color hover of buttons.',
            'id' => 'button_primary_text_color_hover',
            'type' => 'color',
            'title' => 'Text Color Hover',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Controls the button background color.',
            'id' => 'button_primary_background_color',
            'type' => 'color_rgba',
            'title' => 'Background Color',
            'default'  => array( 'color' => '#fff', 'alpha' => '0' )
        ),
        array(
            'subtitle' => 'Controls the button background color hover.',
            'id' => 'button_primary_background_color_hover',
            'type' => 'color_rgba',
            'title' => 'Background Color Hover',
            'default'  => array( 'color' => '#00accb', 'alpha' => '1' )
        )    
    )
);
/**
 * Page Title Bar
 */
$this->sections[] = array(
    'title' => __('Page Title Bar', THEMENAME),
    'icon' => 'el-icon-folder-open',
    'fields' => array(
        array(
            'subtitle' => 'Text align for title bar',
            'id' => 'page_title_bar_align',
            'options' => array(
                'left' => 'left',
                'center' => 'center',
                'right' => 'right'
            ),
            'type' => 'select',
            'title' => 'Title Align',
            'default' => 'left'
        ),
        array(
            'subtitle' => 'Insert the number of words you want to show in the page title bar.',
            'id' => 'title_bar_length',
            'type' => 'text',
            'title' => 'Title Bar Length',
            'default' => '20'
        ),
        array(
            'subtitle' => 'Insert the number of size you want to show in the page title bar.',
            'id' => 'title_bar_size',
            'type' => 'text',
            'title' => 'Title Size',
            'default' => '28px'
        ),
        array(
            'subtitle' => 'Controls the text color of the page title font.',
            'id' => 'page_title_color',
            'type' => 'color',
            'title' => 'Page Title Font Color',
            'default' => '#222222'
        ),
        array(
            'subtitle' => 'Controls the text color of the subtitle font.',
            'id' => 'page_subtitle_color',
            'type' => 'color',
            'title' => 'Subtitle Font Color',
            'default' => '#222222'
        ),
        array(
            'subtitle' => 'Select a color for the page title bar borders.',
            'id' => 'page_title_border_color',
            'type' => 'color',
            'title' => 'Page Title Bar Borders Color',
            'default' => '#f1f1f1'
        ),
        array(
            'subtitle' => 'Page Title Bar Borders Top.',
            'id' => 'page_title_border_top',

            'type' => 'switch',
            'title' => 'Page Title Bar Borders Top',
            'default' => false
        ),
        array(
            'subtitle' => 'Page Title Bar Borders Top.',
            'id' => 'page_title_border_bottom',

            'type' => 'switch',
            'title' => 'Page Title Bar Borders Bottom',
            'default' => false
        ),
        array(
            'id'       => 'background-page-title',
            'type'     => 'background',
            'title'    => __( 'Background', THEMENAME ),
            'subtitle' => __( 'Page Title background with image, color, etc.', THEMENAME ),
            'default'   => array(
                'background-color'=>'#f5f5f5',
                'background-image'=>'',
                'background-repeat'=>'',
                'background-size'=>'',
                'background-attachment'=>'',
                'background-position'=>''
            ),
        ),
        array(
            'subtitle' => 'Enable parallax background image when scrolling.',
            'id' => 'page_title_bg_parallax',

            'type' => 'switch',
            'title' => 'Parallax Background Image',
            'default' => false
        ),
        array(
            'subtitle' => 'In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'page_title_padding',
            'type' => 'text',
            'title' => 'Page Title Bar Padding',
            'default' => '60px 0'
        ),
        array(
            'subtitle' => 'In pixels, top left botton right, ex: 10px 10px 10px 10px',
            'id' => 'page_title_margin',
            'type' => 'text',
            'title' => 'Page Title Bar Margin',
            'default' => '0 0 80px 0'
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-bookmark',
    'title' => __('Breadcrumb', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Show breadcrumbs.',
            'id' => 'breadcrumb_show',

            'type' => 'switch',
            'title' => 'Show Breadcrumb',
            'default' => true
        ),
        array(
            'subtitle' => 'Display breadcrumbs on mobile devices.',
            'id' => 'breadcrumb_mobile',

            'type' => 'switch',
            'title' => 'Breadcrumb on Mobile Devices',
            'default' => true
        ),
        array(
            'subtitle' => 'Select style for Page Title',
            'id' => 'breadcrumb_text_align',
            'options' => array(
                'left' => 'left',
                'center' => 'center',
                'right' => 'right'
            ),
            'type' => 'select',
            'title' => 'Breadcrumb Text Align',
            'default' => 'right'
        ),
        array(
            'subtitle' => 'The text before the breadcrumb home.',
            'id' => 'breacrumb_home_prefix',
            'type' => 'text',
            'title' => 'Breadcrumb Home Prefix',
            'default' => 'You are here:  Home'
        ),
        array(
            'subtitle' => 'Controls the text color of the breadcrumb font.',
            'id' => 'breadcrumbs_text_color',
            'type' => 'color',
            'title' => 'Breadcrumbs Text Color',
            'default' => '#222222'
        ),
        array(
            'subtitle' => 'Controls the space between each breadcrumbs item.',
            'id' => 'breadcrumbs_item_padding',
            'type' => 'text',
            'title' => 'Breadcrumbs item space',
            'default' => '0 10px 0 0'
        ),
        array(
            'subtitle' => 'Controls the separator style between each item, example / or a AweSome icon, Default is f0da for arrow-right icon. <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Click here</a> for get AweSome icon.',
            'id' => 'breadcrumbs_separator',
            'type' => 'text',
            'title' => 'Breadcrumbs separator',
            'default' => 'f105'
        )
    )
);
/**
 * Styling Options
 */
$this->sections[] = array(
    'title' => __('Styling Options', THEMENAME),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => 'Controls several items, ex: link hovers, highlights, and more.',
            'id' => 'primary_color',
            'type' => 'color',
            'title' => 'Primary Color',
            'default' => '#01abce'
        ),
        array(
            'subtitle' => 'Controls several items, ex: link hovers, highlights, and more.',
            'id' => 'primary_color_minimal',
            'type' => 'color',
            'title' => 'Primary Color Home Minimal',
            'default' => '#01abce'
        ),
        array(
            'subtitle' => 'Secondary color.',
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => 'Secondary Color',
            'default' => '#9ddd7c'
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-check',
    'title' => __('Form Styles', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Controls the background color of form fields.',
            'id' => 'form_bg_color',
            'type' => 'color',
            'title' => 'Form Background Color',
            'default' => 'transparent'
        ),
        array(
            'subtitle' => 'Controls the text color for forms.',
            'id' => 'form_text_color',
            'type' => 'color',
            'title' => 'Form Text Color',
            'default' => '#888888'
        ),
        array(
            'subtitle' => 'Controls the background color for each field. Default is #ffffff',
            'id' => 'form_field_bg_color',
            'type' => 'color',
            'title' => 'Form Fields background color',
            'default' => '#f5f5f5'
        ),
        array(
            'subtitle' => 'Controls the background color hover, focus, active state for each field. Default is #eeeeee',
            'id' => 'form_field_bg_color_hover',
            'type' => 'color',
            'title' => 'Form Fields background hover color',
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => 'Controls the border style of form fields. Default is Solid',
            'id' => 'form_border_style',
            'type' => 'select',
            'options' => array(
                'solid' => 'solid',
                'dotted' => 'dotted',
                'double' => 'double',
                'dashed' => 'dashed',
                'none' => 'none'
            ),
            'title' => 'Form Fields Border style',
            'default' => 'solid'
        ),
        array(
            'subtitle' => 'Controls the border width of form fields. Top, Left, Bottom, Right. Ex: 1px 1px 1px 1px. Default is 1px',
            'id' => 'form_border_width',
            'type' => 'text',
            'title' => 'Form Fields Border Width',
            'default' => '1px'
        ),
        array(
            'subtitle' => 'Controls the border color of form fields. Default is #dddddd',
            'id' => 'form_border_color',
            'type' => 'color',
            'title' => 'Form Fields Border Color',
            'default' => '#e9e9e9'
        ),
        array(
            'subtitle' => 'Controls the border color hover, active, focus state of form fields. Default is #cccccc',
            'id' => 'form_border_color_hover',
            'type' => 'color',
            'title' => 'Form Fields Border Color Hover',
            'default' => '#e9e9e9'
        ),
        array(
            'subtitle' => 'Controls the shadow of form fields. Ex: 0px 0px 10px 4px rgba(119, 119, 119, 0.75).  <a href="http://www.webestools.com/css3-box-shadow-generator-css-property-easy-shadows-div-html5-drop-shadow-moz-webkit-shadow-maker.html#generatorForm" target="_blank">Click here</a> to make your shadow style!',
            'id' => 'form_shadow',
            'type' => 'text',
            'title' => 'Form Fields Shadow style',
            'default' => ''
        ),
        array(
            'subtitle' => 'Controls the shadow of form fields in hover, active, focus state. Ex: 0px 0px 10px 4px rgba(119, 119, 119, 0.75).    <a href="http://www.webestools.com/css3-box-shadow-generator-css-property-easy-shadows-div-html5-drop-shadow-moz-webkit-shadow-maker.html#generatorForm" target="_blank">Click here</a> to make your shadow style!',
            'id' => 'form_shadow_hover',
            'type' => 'text',
            'title' => 'Form Fields Shadow Hover style',
            'default' => ''
        ),
        array(
            'subtitle' => 'Controls the border radius style for form fields.Top, Right, Bottom, Left Ex: 5px 5px 5px 5px for rounded style or 50% for circle style. Default is 0',
            'id' => 'form_border_radius',
            'type' => 'text',
            'title' => 'Form Fields Border Radius Style',
            'default' => ''
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-fontsize',
    'title' => __('Content Area', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Controls the background color of the main content area.',
            'id' => 'content_bg_color',
            'type' => 'color',
            'title' => 'Content Background Color',
            'default' => ''
        ),
        array(
            'subtitle' => 'Select an image or insert an image url to use for the Content backgroud.',
            'id' => 'bg_content_image',
            'type' => 'media',
            'title' => 'Content Background Image',
            'url' => true,
            'default' => array(
                'url' => ''
            ),
        ),
        array(
            'subtitle' => 'The Content background image display at 100% in width and height and scale according to the browser size.',
            'id' => 'bg_content_full',

            'type' => 'switch',
            'title' => 'cover and fixed Content Background Image',
            'default' => true
        ),
        array(
            'subtitle' => 'Select how the Content background image repeats.',
            'id' => 'bg_content_repeat',
            'type' => 'select',
            'options' => array(
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y',
                'no-repeat' => 'no-repeat'
            ),
            'title' => 'Content Background Repeat',
            'default' => 'repeat'
        ),
        array(
            'subtitle' => '(In pixels, top left botton right, ex: 10px 10px 10px 10px)',
            'id' => 'main_content_padding',
            'type' => 'text',
            'title' => 'Page Content Padding',
            'default' => ''
        ),
        array(
            'subtitle' => '(In pixels, top left botton right, ex: 10px)',
            'id' => 'main_content_margin_top',
            'type' => 'text',
            'title' => 'Page Content Margin Top',
            'default' => ''
        ),
        array(
            'subtitle' => '(In pixels, top left botton right, ex: 10px)',
            'id' => 'main_content_margin_bottom',
            'type' => 'text',
            'title' => 'Page Content Margin Bottom',
            'default' => ''
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-font',
    'title' => __('Font Colors', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Controls the color of all text links.',
            'id' => 'link_color',
            'type' => 'color',
            'title' => 'Link Color',
            'default' => '#13151c'
        ),
        array(
            'subtitle' => 'Link Color Hover.',
            'id' => 'link_color_hover',
            'type' => 'color',
            'title' => 'Link Color Hover',
            'default' => '#01abce'
        )
    )
);
/**
 * Typography
 */
$this->sections[] = array(
    'title' => __('Typography', THEMENAME),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'typography_0',
            'type' => 'typography',
            'title' => __('Body Font', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'default' => array(
                'color' => '#13151c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '16px',
                'line-height' => '28px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_2',
            'type' => 'typography',
            'title' => __('Other Font', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'default' => array(
                'color' => '',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_selector_2',
            'type' => 'textarea',
            'title' => __('Other Font Selector', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '.btn',
        )
    )
);
$this->sections[] = array(
    'title' => __('Heading', THEMENAME),
    'icon' => 'el-icon-font',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'typography_h1',
            'type' => 'typography',
            'title' => __('H1', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h1'),
            'units' => 'px',
            'subtitle' => __('Typography option with H1.', THEMENAME),
            'default' => array(
                'color' => '#13151c',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '56px',
                'line-height' => '62px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_h2',
            'type' => 'typography',
            'title' => __('H2', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h2'),
            'units' => 'px',
            'subtitle' => __('Typography option with H2.', THEMENAME),
            'default' => array(
                'color' => '#13151c',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '38px',
                'line-height' => '65px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_h3',
            'type' => 'typography',
            'title' => __('H3', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h3'),
            'units' => 'px',
            'subtitle' => __('Typography option with H3.', THEMENAME),
            'default' => array(
                'color' => '#13151c',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '28px',
                'line-height' => '32px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_h4',
            'type' => 'typography',
            'title' => __('H4', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h4'),
            'units' => 'px',
            'subtitle' => __('Typography option with H4.', THEMENAME),
            'default' => array(
                'color' => '#13151c',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '20px',
                'line-height' => '22px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_h5',
            'type' => 'typography',
            'title' => __('H5', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h5'),
            'units' => 'px',
            'subtitle' => __('Typography option with H5.', THEMENAME),
            'default' => array(
                'color' => '#13151c',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '18px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_h6',
            'type' => 'typography',
            'title' => __('H6', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h6'),
            'units' => 'px',
            'subtitle' => __('Typography option with H6.', THEMENAME),
            'default' => array(
                'color' => '#13151c',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '12px',
                'line-height' => '16px',
                'text-align' => ''
            )
        )
    )
);
$this->sections[] = array(
    'title' => __('Extra', THEMENAME),
    'icon' => 'el-icon-puzzle',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'typography_3',
            'type' => 'typography',
            'title' => __('Other Font 1', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '16',
                'line-height' => '18',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_selector_3',
            'type' => 'textarea',
            'title' => __('Other Font Selector 1', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '#cs-page-title-wrapper .title_bar, #cs-page-title-wrapper .title_bar .sub_header_text',
        ),
        array(
            'id' => 'typography_4',
            'type' => 'typography',
            'title' => __('Other Font 2', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '700',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'typography_selector_4',
            'type' => 'textarea',
            'title' => __('Other Font Selector 2', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '.tagcloud a',
        ),
        array(
            'id' => 'typography_5',
            'type' => 'typography',
            'title' => __('Other Font 3', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo')
        ),
        array(
            'id' => 'typography_selector_5',
            'type' => 'textarea',
            'title' => __('Other Font Selector 3', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'typography_6',
            'type' => 'typography',
            'title' => __('Other Font 4', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo')
        ),
        array(
            'id' => 'typography_selector_6',
            'type' => 'textarea',
            'title' => __('Other Font Selector 4', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'typography_7',
            'type' => 'typography',
            'title' => __('Other Font 5', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo')
        ),
        array(
            'id' => 'typography_selector_7',
            'type' => 'textarea',
            'title' => __('Other Font Selector 5', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'typography_8',
            'type' => 'typography',
            'title' => __('Other Font 6', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo')
        ),
        array(
            'id' => 'typography_selector_8',
            'type' => 'textarea',
            'title' => __('Other Font Selector 6', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'typography_9',
            'type' => 'typography',
            'title' => __('Other Font 7', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo')
        ),
        array(
            'id' => 'typography_selector_9',
            'type' => 'textarea',
            'title' => __('Other Font Selector 7', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'typography_10',
            'type' => 'typography',
            'title' => __('Other Font 8', THEMENAME),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'redux-framework-demo')
        ),
        array(
            'id' => 'typography_selector_10',
            'type' => 'textarea',
            'title' => __('Other Font Selector 8', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '',
        )
    )
);
// Local Fonts
$fonts = array();
$of_options_custom_fonts = array();
$of_options_custom_fonts[''] = 'Select Font';
$font_path = get_template_directory() . "/fonts";
if (!$handle = opendir($font_path)) {
    $fonts = array();
} else {
    while (false !== ($file = readdir($handle))) {
        if (strpos($file, ".ttf") !== false ||
            strpos($file, ".eot") !== false ||
            strpos($file, ".svg") !== false ||
            strpos($file, ".woff") !== false
        ) {
            $fonts[] = $file;
        }
    }
}
closedir($handle);

foreach ($fonts as $font) {
    $font_name = str_replace(array('.ttf', '.eot', '.svg', '.woff'), '', $font);
    $of_options_custom_fonts[$font_name] = $font_name;
}
$this->sections[] = array(
    'title' => __('Local Fonts', THEMENAME),
    'icon' => 'el-icon-folder',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Select a local font',
            'id' => 'typography_local_1',
            'type' => 'select',
            'options' => $of_options_custom_fonts,
            'title' => 'Local Font 1',
            'default' => ''
        ),
        array(
            'id' => 'typography_local_selector_1',
            'type' => 'textarea',
            'title' => __('Local Selector 1', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'subtitle' => 'Select a local font',
            'id' => 'typography_local_2',
            'type' => 'select',
            'options' => $of_options_custom_fonts,
            'title' => 'Local Font 2',
            'default' => ''
        ),
        array(
            'id' => 'typography_local_selector_2',
            'type' => 'textarea',
            'title' => __('Local Selector 2', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'subtitle' => 'Select a local font',
            'id' => 'typography_local_3',
            'type' => 'select',
            'options' => $of_options_custom_fonts,
            'title' => 'Local Font 3',
            'default' => ''
        ),
        array(
            'id' => 'typography_local_selector_3',
            'type' => 'textarea',
            'title' => __('Local Selector 3', THEMENAME),
            'subtitle' => __('Add tag html ID or class (body,a,.class,#id)', THEMENAME),
            'validate' => 'no_html',
            'default' => '',
        ),
    )
);
/**
 * Blog
 */
$this->sections[] = array(
    'title' => __('Blog', THEMENAME),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'subtitle' => 'Select main content and sidebar alignment.',
            'id' => 'blog_layout',
            'type' => 'image_select',
            'options' => array(
                'full-fixed' => ADMIN_DIR.'assets/images/1col.png',
                'right-fixed' => ADMIN_DIR.'assets/images/2cr.png',
                'left-fixed' => ADMIN_DIR.'assets/images/2cl.png'
            ),
            'title' => 'Blog Layout',
            'default' => 'right-fixed'
        ),
        array(
            'subtitle' => 'Select heading of title',
            'id' => 'blog_title_heading',
            'type' => 'select',
            'options' => array(
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6'
            ),
            'title' => 'Title Heading',
            'default' => 'h2'
        ),
        array(
            'subtitle' => 'Show read more in posts (Default show Full Content).',
            'id' => 'blog_full_content',

            'type' => 'switch',
            'title' => 'Read More',
            'default' => true
        ),
        array(
            'subtitle' => 'Introtext Length',
            'id' => 'introtext_length',
            'type' => 'text',
            'title' => 'Limit Words',
            'default' => '60',
            'required' => array(
                0 => 'blog_full_content',
                1 => '=',
                2 => 1
            )
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-search',
    'title' => __('Search', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Show Heading For Search',
            'id' => 'search_heading',

            'type' => 'switch',
            'title' => 'Show Heading',
            'default' => false
        ),
        array(
            'subtitle' => 'Show page title on Search',
            'id' => 'search_page_title',

            'type' => 'switch',
            'title' => 'Show Page Title',
            'default' => true
        ),
        array(
            'subtitle' => 'Fade out page title on scroll',
            'id' => 'search_page_title_animation',

            'type' => 'switch',
            'title' => 'Page Title Animation',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Breadcrumbs on Search',
            'id' => 'search_breadcrumbs',

            'type' => 'switch',
            'title' => 'Show Breadcrumbs',
            'default' => false
        ),
        array(
            'subtitle' => 'Select view type for Search Results.',
            'id' => 'search_view',
            'type' => 'select',
            'options' => array(
                'Excerpt' => 'No',
                'Read More' => 'Yes'
            ),
            'title' => 'Show Readmore Button',
            'default' => 'Excerpt'
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-th-list',
    'title' => __('Archive', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Show Heading For Archive',
            'id' => 'archive_heading',

            'type' => 'switch',
            'title' => 'Show Heading',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Page Title On Archive',
            'id' => 'archive_page_title',

            'type' => 'switch',
            'title' => 'Show Page Title',
            'default' => true
        ),
        array(
            'subtitle' => 'Fade out page title on scroll',
            'id' => 'archive_page_title_animation',

            'type' => 'switch',
            'title' => 'Page Title Animation',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Archive Breadcrumbs',
            'id' => 'archive_breadcrumbs',

            'type' => 'switch',
            'title' => 'Show Breadcrumbs',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Posts Title',
            'id' => 'archive_posts_title',

            'type' => 'switch',
            'title' => 'Show Posts Title',
            'default' => true
        ),
        array(
            'subtitle' => 'Show read more in posts (Defualt show Full Content).',
            'id' => 'show_full_content',

            'type' => 'switch',
            'title' => 'Read More',
            'default' => true
        ),
        array(
            'subtitle' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
            'id' => 'archive_date_format',
            'type' => 'text',
            'title' => 'Blog Date Format',
            'default' => 'F dS ,Y'
        ),
        array(
            'subtitle' => 'Select Style for Archive list post',
            'id' => 'archive_post',
            'type' => 'select',
            'options' => array(
                'base' => 'base',
                'blog-3-columns' => 'Blog 3 column',
                'blog-2-columns' => 'Blog 2 column'
            ),
            'title' => 'Archive Style',
            'default' => 'base'
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-livejournal',
    'title' => __('Post', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Show Page Title On Post',
            'id' => 'post_page_title',
            'type' => 'switch',
            'title' => 'Show Page Title',
            'default' => true
        ),
        array(
            'subtitle' => 'set color for page title',
            'id' => 'post_page_title_color',
            'type' => 'color',
            'title' => 'Title Color',
            'default' => '#222',
            'required' => array(
                0 => 'post_page_title',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'set color for page subtitle',
            'id' => 'post_page_subtitle_color',
            'type' => 'color',
            'title' => 'Subtitle Color',
            'default' => '#222',
            'required' => array(
                0 => 'post_page_title',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Fade out page title on scroll',
            'id' => 'post_page_title_animation',
            'type' => 'switch',
            'title' => 'Page Title Animation',
            'default' => true
        ),
        array(
            'subtitle' => 'Show post Breadcrumbs',
            'id' => 'post_breadcrumbs',
            'type' => 'switch',
            'title' => 'Show Breadcrumbs',
            'default' => true
        ),
        array(
            'subtitle' => 'set color for breadcrumbs',
            'id' => 'post_breadcrumbs_color',
            'type' => 'color',
            'title' => 'Breadcrumbs Color',
            'default' => '#222',
            'required' => array(
                0 => 'post_breadcrumbs',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'subtitle' => 'Show Post Title',
            'id' => 'show_post_title',
            'type' => 'switch',
            'title' => 'Show Post Title',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Post Thumbnail',
            'id' => 'show_post_thumbnail',
            'type' => 'switch',
            'title' => 'Show Post Thumbnail',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Comments Post',
            'id' => 'show_comments_post',
            'type' => 'switch',
            'title' => 'Show Comments Post',
            'default' => true
        ),
        array(
            'subtitle' => 'Show Tags Post',
            'id' => 'show_tags_post',
            'type' => 'switch',
            'title' => 'Show Tags',
            'default' => true
        ),
        array(
            'subtitle' => 'Show Socials Icon at bottom of single post',
            'id' => 'show_social_post',
            'type' => 'switch',
            'title' => 'Show Socials Icon',
            'default' => true
        ),
        array(
            'subtitle' => 'Previous/Next Pagination',
            'id' => 'show_navigation_post',
            'type' => 'switch',
            'title' => 'Previous/Next Pagination',
            'default' => true
        ),
        array(
            'subtitle' => 'Select main content and sidebar alignment.',
            'id' => 'post_layout',
            'type' => 'image_select',
            'options' => array(
                'full-fixed' => ADMIN_DIR.'assets/images/1col.png',
                'right-fixed' => ADMIN_DIR.'assets/images/2cr.png',
                'left-fixed' => ADMIN_DIR.'assets/images/2cl.png'
            ),
            'title' => 'Post Layout',
            'default' => 'right-fixed'
        ),
        array(
            'subtitle' => 'Select Style for Post Items',
            'id' => 'post_style',
            'type' => 'select',
            'options' => array(
                'base' => 'base',
                'corporate' => 'corporate'
            ),
            'title' => 'Post Style',
            'default' => 'base'
        ),
        array(
            'subtitle' => 'Display featured images on archive port.',
            'id' => 'post_featured_images',

            'type' => 'switch',
            'title' => 'Featured Image On Archive Post',
            'default' => true
        ),
        array(
            'subtitle' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
            'id' => 'post_date_format',
            'type' => 'text',
            'title' => 'Post Date Format',
            'default' => 'm.d.Y'
        )
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-edit',
    'title' => __('Page', THEMENAME),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Show page heading',
            'id' => 'page_heading',

            'type' => 'switch',
            'title' => 'Show Heading',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Page Title On Page',
            'id' => 'page_page_title',

            'type' => 'switch',
            'title' => 'Show Page Title',
            'default' => true
        ),
        array(
            'subtitle' => 'Fade out page title on scroll',
            'id' => 'page_page_title_animation',

            'type' => 'switch',
            'title' => 'Page Title Animation',
            'default' => false
        ),
        array(
            'subtitle' => 'Show page breadcrumbs',
            'id' => 'page_breadcrumbs',

            'type' => 'switch',
            'title' => 'Show Breadcrumbs',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Comments Page',
            'id' => 'show_comments_page',

            'type' => 'switch',
            'title' => 'Show Comments Page',
            'default' => true
        ),
        array(
            'subtitle' => 'Select main content and sidebar alignment.',
            'id' => 'page_layout',
            'type' => 'image_select',
            'options' => array(
                'full-fixed' => ADMIN_DIR.'assets/images/1col.png',
                'right-fixed' => ADMIN_DIR.'assets/images/2cr.png',
                'left-fixed' => ADMIN_DIR.'assets/images/2cl.png'
            ),
            'title' => 'Page Layout',
            'default' => 'full-fixed'
        ),
        array(
            'subtitle' => 'Display featured images on archive page.',
            'id' => 'page_featured_images',

            'type' => 'switch',
            'title' => 'Featured Image On Archive Page',
            'default' => true
        )
    )
);
/**
 * Custom Posts
 */
$this->sections[] = array(
    'title' => __('Custom Posts', THEMENAME),
    'icon' => 'el-icon-comment-alt'
);
/**
 * Teams
 */
$this->sections[] = array(
    'title' => __('Teams', THEMENAME),
    'icon' => 'el-icon-group',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Off page title',
            'id' => 'disnable_page_title_team',
            'type' => 'switch',
            'title' => 'Disnable Page Title',
            'default' => true
        ),
        array(
            'subtitle' => 'Enable Breadcrumb',
            'id' => 'team_breadcrumb',
            'type' => 'switch',
            'title' => 'Breadcrumb',
            'default' => false
        ),
        array(
            'subtitle' => 'On/Off Text transform uppercase page title',
            'id' => 'page_title_upper_team',

            'type' => 'switch',
            'title' => 'Page Title Text Transform Uppercase',
            'default' => true
        )
    )
);
/**
 * Portfolio
 */
$this->sections[] = array(
    'title' => __('Portfolio', THEMENAME),
    'icon' => 'el-icon-th-large',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Disnable Page Title',
            'id' => 'disnable_page_title_portfolio',
            'type' => 'switch',
            'title' => 'Disnable Page Title',
            'default' => true
        ),
        array(
            'subtitle' => 'On/Off Text transform uppercase page title',
            'id' => 'page_title_upper_portfolio',
            'type' => 'switch',
            'title' => 'Page Title Text Transform Uppercase',
            'default' => true
        ),
        array(
            'subtitle' => 'Enter images width, In pixels, ex: 60px',
            'id' => 'pt_testimonial_images_width',
            'type' => 'text',
            'title' => 'Testimonial images width',
            'default' => ''
        ),
        array(
            'subtitle' => 'Enter images height, In pixels, ex: 60px',
            'id' => 'pt_testimonial_images_height',
            'type' => 'text',
            'title' => 'Testimonial images height',
            'default' => ''
        ),
        array(
            'subtitle' => 'Enter testimonial title font size, In pixels, ex: 20px',
            'id' => 'pt_testimonial_desciption_fontsize',
            'type' => 'text',
            'title' => 'Testimonial Description Font Size',
            'default' => ''
        )
    )
);
/**
 * Portfolio
 */
$this->sections[] = array(
    'title' => __('Woocommerce', THEMENAME),
    'icon' => 'el-icon-shopping-cart',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Controls the text color hover of breadcrumbs.',
            'id' => 'woo_breadcrumbs_color_hover',
            'type' => 'color',
            'title' => 'Breadcrumbs Color Hover',
            'default' => ''
        )
    )
);

/**
 * Library
 */
$this->sections[] = array(
    'title' => __('Library', THEMENAME),
    'icon' => 'el-icon-adjust-alt',
    'fields' => array(
        array(
            'subtitle' => 'Use Font Awesome.',
            'id' => 'use_font_awesome',

            'type' => 'switch',
            'title' => 'Use Font Awesome',
            'default' => true
        ),
        array(
            'subtitle' => 'Use Font Ionicons.',
            'id' => 'use_font_ionicons',

            'type' => 'switch',
            'title' => 'Use Font Ionicons',
            'default' => true
        )
    )
);
/**
 * 404 Page
 */
$this->sections[] = array(
    'title' => __('404 Page', THEMENAME),
    'icon' => 'el-icon-error-alt',
    'fields' => array(
        array(
            'subtitle' => 'Show heading for 404',
            'id' => '404_heading',

            'type' => 'switch',
            'title' => 'Show Heading',
            'default' => false
        ),
        array(
            'subtitle' => 'Show page title on page 404',
            'id' => '404_page_title',

            'type' => 'switch',
            'title' => 'Show Page Title',
            'default' => true
        ),
        array(
            'subtitle' => 'Fade out page title on scroll',
            'id' => '404_page_title_animation',

            'type' => 'switch',
            'title' => 'Page Title Animation',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Breadcrumbs on page 404',
            'id' => '404_breadcrumbs',

            'type' => 'switch',
            'title' => 'Show Breadcrumbs',
            'default' => true
        ),
        array(
            'id' => '404_type',
            'type' => 'select',
            'options' => array(
                'Default' => 'Default',
                'From Page' => 'From Page',
                'Redirect Home' => 'Redirect Home'
            ),
            'title' => '404 Page',
            'default' => 'Default'
        ),
        array(
            'subtitle' => 'Select an image file for your 404 (for default 404).',
            'id' => '404_image',
            'type' => 'media',
            'title' => '404 Image',
            'default' => array(
                'url' => get_template_directory_uri().'/images/404/spman.jpg'
            ),
            'url' => true
        ),
        array(
            'subtitle' => 'Insert page 404 id (for 404 from page).',
            'id' => '404_page_id',
            'type' => 'text',
            'title' => 'Page ID',
            'default' => ''
        )
    )
);
/**
 * Custom CSS
 */
$this->sections[] = array(
    'title' => __('Custom CSS', THEMENAME),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('CSS Code', THEMENAME),
            'subtitle' => __('Paste your CSS code here.', THEMENAME),
            'mode' => 'css',
            'theme' => 'monokai',
            'default' => ''
        )
    )
);