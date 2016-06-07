<?php
/**
 * @package cshero
 */
?>
<?php wp_enqueue_style( 'media-audio', get_template_directory_uri().'/css/media-audio.css',array(),'2.14.1');?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cs-blogClass-style2 clearfix">
	    <div class="cs-blogClass-left col-xs-12 col-sm-4 col-md-2 col-lg-2">
	        <div class="cs-blogClass-date">
	            <span><?php echo get_the_time('d'); ?></span>
	            <span><?php echo get_the_time('M Y'); ?></span>
	        </div>
	        <div class="cs-blogClass-info">
	            <?php echo cshero_blog_classic_detail(); ?>
	        </div>
	    </div>
		<div class="cs-blogClass-right col-xs-12 col-sm-8 col-md-10 col-lg-10">
			<div class="cs-blog <?php if(is_sticky()){ echo " post-sticky"; } ?>">
				<header class="cs-blog-header">
					<?php
					$audio_type = get_post_meta(get_the_ID(), 'cs_post_audio_type', true);
					$audio_url = get_post_meta(get_the_ID(), 'cs_post_audio_url', true);
					if($audio_type):
						?>
						<div class="cs-blog-media">
						<?php
						if ($audio_type == 'content'){
							$shortcode = cshero_get_shortcode_from_content('playlist');
							if(!$shortcode){
								$shortcode = cshero_get_shortcode_from_content('audio');
							}
							if($shortcode):
								echo do_shortcode($shortcode);
							endif;
						} elseif ($audio_type == 'ogg' || $audio_type == 'mp3' || $audio_type == 'wav'){
							if($audio_url){
								echo do_shortcode('[audio '.$audio_type.'="'.$audio_url.'" preload="metadata"][/audio]');
							}
						}
						?>
						</div>
					<?php elseif (has_post_thumbnail() && ! post_password_required() && ! is_attachment()): ?>
		    			<div class="cs-blog-thumbnail">
		    				<?php the_post_thumbnail(); ?>
		    			</div><!-- .entry-thumbnail -->
					<?php endif; ?>
					<div class="cs-blog-meta cs-itemBlog-meta">
						<?php echo cshero_title_render(); ?>
					</div>
				</header><!-- .entry-header -->
				<div class="cs-blog-content">
					<?php cshero_content_render(); ?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>
</article><!-- #post-## -->
