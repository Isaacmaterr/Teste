<?php
/**
 * add options
 */
add_action('portfolio_metabox_general_after', 'cshero_portfolio_metabox_general');
function cshero_portfolio_metabox_general(){
    cs_options(array(
        'id' => 'portfolio_text_intro',
        'label' => __('Intro Text',CSCORE_NAME),
        'type' => 'textarea',
    ));
    cs_options(array(
        'id' => 'portfolio_about_project',
        'label' => __('About Project',CSCORE_NAME),
        'type' => 'textarea',
    ));
    if(function_exists('get_categories_assoc')){      
        $portfolio_options = get_categories_assoc('portfolio_category');
        cs_options(array(
            'id' => 'portfolio_category',
            'label' => __('Similar Projects',CSCORE_NAME),
            'type' => 'multiple',
            'options' => $portfolio_options
        ));
        $testimonial_options = get_categories_assoc('testimonial_category');
        cs_options(array(
            'id' => 'testimonial_category',
            'label' => __('Testimonial',CSCORE_NAME),
            'type' => 'multiple',
            'options' => $testimonial_options
        ));
        cs_options(array(
            'id' => 'portfolio_layout_color',
            'label' => __('Portfolio Style',CSCORE_NAME),
            'type' => 'select',
            'options' => array(
                'style1'=>'Portfolio Style Drak',
                'style2'=>'Portfolio Style Light',
            )
        ));     
    }
}
/**
 * create Tab
 */
add_action('portfolio_metabox_tab_title_after', 'cshero_portfolio_metabox_tab_title');
function cshero_portfolio_metabox_tab_title() {
    ?>
    <li class='cs-tab'><a href="#tabs-gallery"><i class="dashicons dashicons-images-alt2"></i> <?php echo _e('GALLERY', THEMENAME);?></a></li>
    <li class='cs-tab'><a href="#tabs-conclusion"><i class="dashicons-before dashicons-admin-post"></i> <?php echo _e('CONCLUSION', THEMENAME);?></a></li>
    <?php
}
add_action('portfolio_metabox_tab_content_after', 'cshero_portfolio_metabox_tab_content');
function cshero_portfolio_metabox_tab_content() {
    ?>
    <div class='cs-tabs-panel clearfix'>
 		<div id="tabs-gallery">
 		<?php
 		cs_options(array(
     		'id' => 'portfolio_gallery',
     		'type' => 'editor',
 		));
 		?>
 		</div>
	</div>
    <div class='cs-tabs-panel clearfix'>
        <div id="tabs-conclusion">
        <?php
        cs_options(array(
            'id' => 'portfolio_conclusion_image',
            'label' => __('Select image conclusion',CSCORE_NAME),
            'type' => 'images',
            'field' => 'single'
        ));
        cs_options(array(
            'id' => 'portfolio_conclusion',
            'type' => 'textarea',
        ));
        ?>
        </div>
    </div>
    <?php
}