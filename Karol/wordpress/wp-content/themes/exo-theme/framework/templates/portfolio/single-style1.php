<?php
$portfolio_gallery = get_post_meta(get_the_ID(),'cs_portfolio_gallery',true);
$portfolio_conclusion = get_post_meta(get_the_ID(),'cs_portfolio_conclusion',true);
$portfolio_conclusion_image = get_post_meta(get_the_ID(),'cs_portfolio_conclusion_image',true);
$portfolio_category = get_post_meta(get_the_ID(),'cs_portfolio_category',true);
$testimonial_category = get_post_meta(get_the_ID(),'cs_testimonial_category',true);
$portfolio_text_intro = get_post_meta(get_the_ID(),'cs_portfolio_text_intro',true);
?>
<article id="cs_post_<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="main" class="cs-portfolio-item drak">
		<div class="row">
			<div class="cs-portfolio-header exo-same-height clearfix">
				<div class="cs-portfolio-media w50 wpb_column">
					<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
						<div class="cs-portfolio-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="cs-portfolio-details w50 wpb_column">
					<h3 class="cs-portfolio-title"><?php the_title(); ?></h3>
					<div class="cs-portfolio-category">
						<?php the_terms( get_the_ID(), 'portfolio_category', '', ', ', '' ); ?>
					</div>
					<div class="cs-portfolio-intro"><?php echo ''.$portfolio_text_intro; ?></div>
					<div class="social-details">
						<a
							href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
							target="_blank"><i class="fa fa-facebook"></i></a> <a
							href="https://twitter.com/home?status=<?php the_permalink(); ?>"
							target="_blank"><i class="fa fa-twitter"></i></a> <a
							href="https://plus.google.com/share?url=<?php the_permalink(); ?>"
							target="_blank"><i class="fa fa-google-plus"></i></a> <a
							href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=&summary=&source="
							target="_blank"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>
			<div class="cs-portfolio-content">
				<div class="container">
					<?php the_content(); ?>
				</div>
			</div>
			<?php if($portfolio_gallery): ?>
				<div class="cs-portfolio-gallery clearfix">
				    <?php
				        echo do_shortcode($portfolio_gallery);
				    ?>
				</div>
			<?php endif; ?>
			<?php if(!empty($testimonial_category)): ?>
				<div class="cs-portfolio-testimonial">
				    <?php
				    	echo do_shortcode('[cshero-testimonial posts_per_page="12" orderby="none" order="none" layout="testimonial.layout3" type="slide" carousel_mode="fade" rows="1" auto_scroll="0" speed_scroll="1000" show_nav="0" show_pager="0" show_image="0" crop_image="1" show_title="1" item_title_heading="h5" show_category="1" show_description="1" excerpt_length="300" excerpt_length_font_size="18px" show_readmore="0" read_more="Read more" heading_size="h4" heading_align="text-center" heading_text_style="none" nav_align="1" nav_arrow_style="default" nav_left_icon="fa fa-angle-left" nav_right_icon="fa fa-angle-right" nav_icon_offset="0" pager_align="pager-center text-center" pager_style="bullet-o white" content_align="text-center" image_align="center" quotation_type="none" quotation_icon_size="48px" heading_color="#13151c" category="'.$testimonial_category.'" content_color="#13151c" min_slide="1" max_slide="1" width_item="" width_image="90" height_image="90" quotation_color="rgba(255,255,255,0.4)" icon_fontawesome="fa fa-quote-left" icon_color="#e0e0e0"]');
				    ?>
				</div>
			<?php endif; ?>
			<div class="cs-portfolio-conclusion">
				<img class="feature" src="<?php echo wp_get_attachment_url($portfolio_conclusion_image); ?>" alt="" />
				<div class="container">
					<?php echo $portfolio_conclusion; ?>
				</div>
			</div>
			<?php if(!empty($portfolio_category)): ?>
				<div class="cs-portfolio-similar-rojects">
					<div class="cs-portfolio-similar-title">
						<div class="container"><h3><?php _e('Similar Projects', THEMENAME); ?></h3></div>
					</div>
					<?php
				    	echo do_shortcode('[cshero-portfolio heading_align="text-left" heading_text_style="none" items_display="6" posts_per_page="2" orderby="none" order="none" type="grid" layout="portfolio.layout1" columns="2" filter="0" filter_align="text-center" filter_btn="btn btn-default" filter_btn_size="btn btn-default" filter_margin="0 0 50px 0" pagination="0" pagination_type="number" item_content_align="text-center" item_bg_color="rgba(0,0,0,0.8)" crop_image="1" show_title="1" title_color="#ffffff" show_category="1" show_description="0" excerpt_length="100" description_color="#ffffff" link_type="button" read_more="1" read_more_text="More" read_more_icon="fa fa-link" zoom="1" zoom_text="Zoom" zoom_icon="fa fa-search" view_all_button_type="btn btn-default" item_link_color="#ffffff" item_link_hover_color="#ffffff" show_link="1" link_text="Launch Project" link_icon="fa fa-external-link" category="'.$portfolio_category.'" item_margin="0" width_image="650" height_image="450" category_color="#ffffff"]');
				    ?>
				</div>
		    <?php endif; ?>
		</div>
	</div>
</article>