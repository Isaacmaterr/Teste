<?php

class CsheroTemplateMetaboxes
{

    public function __construct()
    {
        add_action('add_meta_boxes', array(
            $this,
            'add_meta_boxes'
        ));
        add_action('admin_enqueue_scripts', array(
            $this,
            'admin_script_loader'
        ));
    }

    function admin_script_loader()
    {
        global $pagenow;
        if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {}
    }

    public function add_meta_boxes()
    {
        $this->add_meta_box('template_post_options', __('Setting', THEMENAME), 'post');
    }

    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
    {
        add_meta_box('cs_' . $id, $label, array(
            $this,
            $id
        ), $post_type, $context, $priority);
    }
    /**
     * post options
     */
    function template_post_options() { 
        ?>
        <div id="cs-blog-metabox" class='cs_metabox'>
        <?php
        cs_options(array(
            'id' => 'post_custom_setting',
            'label' => __('Setting',THEMENAME),
            'type' => 'switch',
            'options' => array('on'=>'1','off'=>'0'),
            'follow' => array('1'=>array('#post_title_enable'))
        ));
        ?>
        <div id="post_title_enable">
        <?php
        cs_options(array(
            'id' => 'post_enable_title',
            'label' => __('Show Post Title',THEMENAME),
            'type' => 'switch',
            'options' => array('on'=>'1','off'=>'0')
        ));
        cs_options(array(
            'id' => 'post_enable_thumbnail',
            'label' => __('Show Post Thumbnail',THEMENAME),
            'type' => 'switch',
            'options' => array('on'=>'1','off'=>'0')
        ));
        ?>
        </div>
        <?php
        cs_options(array(
            'id' => 'post_page_title_custom',
            'label' => __('Custom Page Title',THEMENAME),
            'type' => 'switch',
            'options' => array('on'=>'1','off'=>'0'),
            'follow' => array('1'=>array('#post_page_title_enable'))
        ));
        ?>
        <div id="post_page_title_enable">
        <?php
        cs_options(array(
            'id' => 'post_page_title',
            'label' => __('Enable Page Title',THEMENAME),
            'type' => 'switch',
            'options' => array('on'=>'1','off'=>'0'),
            'follow' => array('1'=>array('#post_page_title_options'))
        ));
        ?>
        <div id="post_page_title_options">
        <?php
        cs_options(array(
            'id' => 'post_title_padding',
            'label' => __('Page Title Padding',CSCORE_NAME),
            'type' => 'text',
        ));
        cs_options(array(
            'id' => 'post_title_bg_color',
            'label' => __('Background Color',CSCORE_NAME),
            'type' => 'color',
            'rgba' => true,
        ));
        cs_options(array(
            'id' => 'post_title_bg_image',
            'label' => __('Background Image',CSCORE_NAME),
            'type' => 'images',
            'field' => 'single'
        ));
        cs_options(array(
            'id' => 'page_title_bg_overlay',
            'label' => __('Overlay Color',CSCORE_NAME),
            'type' => 'color',
            'rgba' => true,
        ));
        cs_options(array(
            'id' => 'post_title_color',
            'label' => __('Title Color',THEMENAME),
            'type' => 'color',
            'rgba' => false,
        ));
        cs_options(array(
            'id' => 'post_subtitle_color',
            'label' => __('Subtitle Color',THEMENAME),
            'type' => 'color',
            'rgba' => false,
        ));
        cs_options(array(
            'id' => 'post_breadcrumb_color',
            'label' => __('Breadcrumb Color',THEMENAME),
            'type' => 'color',
            'rgba' => false,
        ));
        ?>
        </div>
        </div>
        </div>
        <?php
    }
}
new CsheroTemplateMetaboxes();
/**
 * Add options page title background.
 */
add_action('page_title_background_bg_metabox_after', 'cshero_page_background_bg_metabox');
function cshero_page_background_bg_metabox() {
    cs_options(array(
        'id' => 'page_title_bg_overlay',
        'label' => __('Overlay Color',THEMENAME),
        'type' => 'color',
        'rgba' => true,
    ));
}
/**
 * Add options general after.
 */
add_action('page_metabox_tabs_general_after', 'cshero_page_tabs_general_after_metabox');
function cshero_page_tabs_general_after_metabox() {
    cs_options(array(
        'id' => 'row_navigation',
        'label' => __('Rows Navigation',THEMENAME),
        'type' => 'switch',
        'options' => array('on'=>'1','off'=>'0'),
        'follow' => array('1'=> array('#row_navigation_control'))
    ));
    ?>
    <div id="row_navigation_control">
    <?php
    cs_options(array(
        'id' => 'row_navigation_top',
        'label' => __('Navigation Top',THEMENAME),
        'type' => 'switch',
        'value' => '1',
        'options' => array('on'=>'1','off'=>'0'),
    ));
    cs_options(array(
        'id' => 'row_navigation_bottom',
        'label' => __('Navigation Bottom',THEMENAME),
        'type' => 'switch',
        'value' => '1',
        'options' => array('on'=>'1','off'=>'0'),
    ));
    cs_options(array(
        'id' => 'row_navigation_color',
        'label' => __('Arrow Color',CSCORE_NAME),
        'type' => 'color',
        'rgba' => true,
    ));
    cs_options(array(
        'id' => 'row_navigation_color_hover',
        'label' => __('Arrow Color Hover',CSCORE_NAME),
        'type' => 'color',
        'rgba' => true,
    ));
    ?>
    </div>
    <?php
}
/**
 * Create Tab Enable
 */
add_action('page_metabox_add_title_tab_after', 'cshero_angle_metabox_tab_title');
function cshero_angle_metabox_tab_title() {
    ?>
    <li class='cs-tab'><a href="#tabs-angle"><i class="dashicons dashicons-sort"></i> <?php echo _e('ANGLE', THEMENAME);?></a></li>
    <?php
}
add_action('page_metabox_add_tab_content_after', 'cshero_angle_metabox_tab_content');
function cshero_angle_metabox_tab_content() {
    ?>
    <div class='cs-tabs-panel clearfix'>
 		<div id="tabs-angle">
            <div id="cs-blog-metabox" class='cs_metabox'>
            <?php
            cs_options(array(
                'id' => 'page_title_engle',
                'label' => __('Enable Angle Page Title',THEMENAME),
                'type' => 'switch',
                'value' => '0',
                'options' => array('on'=>'1','off'=>'0'),
                'follow' => array('1'=>array('#page_title_engle_options'))
            ));
            ?>
            <div id="page_title_engle_options">
            <?php
            cs_options(array(
                'id' => 'page_title_engle_style',
                'label' => __('Angle Page Title Style',THEMENAME),
                'type' => 'select',
                'options' => array('1'=>'Style 1','2'=>'Style 2','3'=>'Style 3')
            ));
            cs_options(array(
                'id' => 'page_title_engle_height',
                'label' => __('Angle Page Title Height',THEMENAME),
                'type' => 'text',
                'placeholder' => '20px'
            ));
            cs_options(array(
                'id' => 'page_title_engle_color',
                'label' => __('Angle Page Title Color',THEMENAME),
                'type' => 'color',
                'rgba' => false,
            ));
            ?>
            </div>
            </div>
 		</div>
	</div>
    <?php
}