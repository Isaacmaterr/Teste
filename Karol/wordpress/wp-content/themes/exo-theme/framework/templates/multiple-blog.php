<?php
/*
 * Title
 */
function cshero_title_render(){
	global $smof_data , $pagetitle;
	$post_style = $smof_data['post_style'];
    $title_heading = isset($smof_data['blog_title_heading'])?$smof_data['blog_title_heading']:'h3';
	$show_post_title = '1';
	if(is_single()){
	    if(get_post_meta(get_the_ID(), 'cs_post_custom_setting', true)){
	        $show_post_title = get_post_meta(get_the_ID(), 'cs_post_enable_title', true);
	    } else {
	        $show_post_title = $smof_data['show_post_title'];
	    }		
	} else {
		$show_post_title = (isset($smof_data['archive_posts_title']))?$smof_data['archive_posts_title']:'1';
	}
    $icon_sticky = '';
    if(is_sticky()){ 
        $icon_sticky = '<i class="fa fa-thumb-tack" style="padding-right: 12px;"></i>';
    }
	if($show_post_title == '1'){
		ob_start();
		?>
		<div class="cs-blog-title">
			<<?php echo ''.$title_heading;?> class="cs-hedding-title">
				<?php echo ''.$icon_sticky; ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</<?php echo ''.$title_heading;?>>
		</div>
		<?php
		return  ob_get_clean();
		break;
	}
}
/*
 * Info Bar
 */
function cshero_getCategories(){
    global $smof_data, $post;
    $post_type = get_post_type();
    $taxonomies = 'category';
    $arrTaxonomies = get_object_taxonomies(array('post_type' => $post_type), 'objects');
    foreach($arrTaxonomies as $key=>$objTax){
        if(is_taxonomy_hierarchical($objTax->name)){
            $taxonomies = $objTax->name;
            break;
        }
    }
    $categories = get_the_terms(0, $taxonomies);
    $separator = ', ';
    if(!empty($categories)):
        $k=0;
        foreach($categories as  $category) {
            if(is_object($category)){
                if($k>0){
                    echo ''.$separator;
                }
                $k++;
                return '<a href="'.get_term_link( $category->term_id, $taxonomies ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",THEMENAME), $category->name ) ) . '">'.$category->name.'</a>';
            }
        }
    endif;
}
function cshero_info_bar_render() {
	global $smof_data, $post;
	$post_type = get_post_type();

	$taxonomies = 'category';
	$arrTaxonomies = get_object_taxonomies(array('post_type' => $post_type), 'objects');
	foreach($arrTaxonomies as $key=>$objTax){
	    if(is_taxonomy_hierarchical($objTax->name)){
	        $taxonomies = $objTax->name;
	        break;
	    }
	}
	if($smof_data['detail_detail'] == '1'){
		ob_start();
		?>
		<div class="cs-blog-info">
            <ul class="unliststyle">
                <?php
                if($smof_data['detail_date'] == '1'):
                    $archive_date = get_the_date($smof_data['archive_date_format']);?>
            	    <li><a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d')); ?>" title="<?php echo __( "View all posts date ",THEMENAME).$archive_date; ?>"><?php echo ''.$archive_date; ?></a></li>
            	<?php endif; ?>
            	<?php if($smof_data['detail_author'] == '1'): ?>
            	<li><?php the_author_posts_link(); ?></li>
            	<?php endif; ?>
            	<?php
            	if($smof_data['detail_category'] == '1'):
                	$categories = get_the_terms(0, $taxonomies);
                	$separator = ', ';
                	$output = ''; ?>
                	<?php if(!empty($categories)): ?>
            	    <li>
            		<?php
					foreach($categories as $category) {
					    if(is_object($category)){
						   $output .= '<a href="'.get_term_link( $category->term_id, $taxonomies ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",THEMENAME), $category->name ) ) . '">'.$category->name.'</a>'.$separator;
					    }
			        }
					echo trim($output, $separator);
					?>
            	    </li>
            	    <?php endif; ?>
            	<?php endif; ?>
            	<?php if($smof_data['detail_tags']):
            	   $tags = get_the_tags($post->ID);
            	   $separator = ', ';
            	   $output = '';?>
            	   <?php if(!empty($tags)): ?>
            	   <li>
                   <?php
                   foreach($tags as $tag) {
                       if(is_object($tag)){
                           $output .= '<a href="'.get_tag_link( $tag->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in tag %s",THEMENAME), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
                       }
                   }
                   echo trim($output, $separator);
                   ?>
            	   </li>
            	   <?php endif; ?>
            	<?php endif; ?>
            	<?php if($smof_data['detail_comments'] == '1'): ?>
            	<li><a href="<?php echo get_the_permalink(); ?>" title="<?php _e('View all Comments', THEMENAME); ?>"><?php comments_number(__('0',THEMENAME),__('1',THEMENAME),__('%',THEMENAME)); ?></a></li>
            	<?php endif; ?>
            	<?php if($smof_data['detail_like'] == '1' && function_exists('post_favorite')): ?>
            	<li><?php post_favorite(); ?></li>
            	<?php endif; ?>
            	<?php if($smof_data['detail_social'] == '1' && function_exists('cshero_social_sharing_render')): ?>
            	<li><?php cshero_social_sharing_render('',true,false); ?></li>
            	<?php endif; ?>
            	<?php if(get_post_format() == 'link' && get_post_meta($post->ID, 'cs_post_link', true)): ?>
    			<li class="cs-blog-link">
    			    <a href="<?php echo get_post_meta(get_the_ID(), 'cs_post_link', true); ?>"><?php if(get_post_meta(get_the_ID(), 'cs_post_link_text', true)){ echo get_post_meta(get_the_ID(), 'cs_post_link_text', true);} else { echo get_post_meta(get_the_ID(), 'cs_post_link', true); } ?></a>
    			</li>
    			<?php endif; ?>
        	</ul>
		</div>
		<?php
		return  ob_get_clean();
		break;
	}
}
/**
 * blog classic info
 */
function cshero_blog_classic_detail() {
    ob_start();
    ?>
    <ul class="unliststyle">
    	<li><i class="fa fa-user"></i><?php _e(' BY ', THEMENAME); ?><?php the_author_posts_link(); ?></li>
    	<?php
    	$categories = get_the_terms(0, 'category');
    	$separator = ', ';
    	$output = ''; ?>
    	<?php if(!empty($categories)): ?>
	    <li><i class="fa fa-folder"></i><?php _e(' POSTED IN ', THEMENAME); ?>
		<?php
		foreach($categories as $category) {
		    if(is_object($category)){
			   $output .= '<a href="'.get_term_link( $category->term_id, 'category' ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",THEMENAME), $category->name ) ) . '">'.$category->name.'</a>'.$separator;
		    }
        }
		echo trim($output, $separator);
		endif;
		?>
	    </li>
    	<li><i class="fa fa-comment"></i><?php _e(' WITH ', THEMENAME); ?><a href="<?php echo get_the_permalink(); ?>" title="<?php _e('View all Comments', THEMENAME); ?>"><?php comments_number(__('0',THEMENAME),__('1',THEMENAME),__('%',THEMENAME)); ?><?php _e(' COMMENTS', THEMENAME); ?></a></li>
		<li class="single-permalink"><i class="fa fa-chain"></i><a href="<?php the_permalink(); ?>"><?php _e(' PERMALINK', THEMENAME); ?></a></li>
		<li>
		<?php $post_icon = cshero_get_post_format_icon(); ?>
		<i class="<?php echo esc_attr($post_icon['icon']); ?>"></i> <?php echo esc_attr($post_icon['text']); ?><?php _e(' POST TYPE', THEMENAME); ?>
		</li>
	</ul>
	<?php
	echo ob_get_clean();
}
/*
 * Content for blog
 */
function custom_excerpt_length( $length ) {
    global $smof_data;
    if($smof_data['blog_full_content']){
        return $smof_data['introtext_length'];
    }
}
//add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function cshero_content_render($readmore = true){
    global $smof_data;
    $content_type = cshero_posts_full_content();
    if($content_type == '1'){
        the_excerpt();
        if($readmore){
            echo cshero_read_more_render();
        }
    } elseif ($content_type == '2'){
        the_excerpt();
    } else {
        the_content();
        wp_link_pages( array(
        'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . __( 'Pages:',THEMENAME) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span class="page-numbers">',
        'link_after'  => '</span>',
        ) );
    }
}
/*
 * Read More
 */
 function cshero_read_more_render(){
	ob_start();
	?>
	<div class="readmore"><a href="<?php echo esc_url( get_permalink()); ?>" class="btn btn-primary btn-mini btn-xs"><?php echo __('READ MORE',THEMENAME); ?></a></div>
	<?php
	return  ob_get_clean();
}