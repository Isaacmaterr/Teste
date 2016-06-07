<?php
/**
 * The Template for displaying all single portfolio.
 *
 * @package cshero
 */
global $breadcrumb, $pagetitle, $post;
$portfolio_layout_color = get_post_meta(get_the_ID(),'cs_portfolio_layout_color',true);
get_header();
?>
	<section id="primary" class="content-area<?php if($breadcrumb == '0'){ echo ' no_breadcrumb'; }; ?> <?php if(!$pagetitle){ echo ' no_page_title'; }; ?>">
        <div class="no-container">
			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="cs-team-wrap">
						<?php get_template_part( 'framework/templates/portfolio/single', $portfolio_layout_color); ?>
					</div>
				<?php endwhile; ?>
			</main><!-- #main -->
        </div>
	</section><!-- #primary -->
<?php get_footer(); ?>