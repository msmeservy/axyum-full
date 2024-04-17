<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package axyum
 */

get_header();
?>

	<?php if(is_front_page()) { ?>	
<div class="main-wrap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<main id="primary" class="site-main">
				
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						/*if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;*/

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div>
		</div>
	</div>
	</div>
	<?php } else { ?>
	<div class="main-wrap">
	<div class="internal-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<header class="entry-header">
						<?php if( get_post_meta($post->ID, 'customtitle', true) ) { ?>

							<h1><?php echo get_post_meta($wp_query->post->ID,'customtitle',true); ?></h1>

						<?php } else { ?>

							<h1><?php the_title(); ?></h1>

						<?php } ?>
						<div class="main-line"></div>
					</header><!-- .entry-header -->
				</div>
			</div>
		</div>
	</div>
	<?php axyum_post_thumbnail(); ?>

	<div class="internal-main">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="entry-content">
						<?php
						the_content();

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'axyum' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->
					<?php if ( get_edit_post_link() ) : ?>
							<footer class="entry-footer">
								<?php
								edit_post_link(
									sprintf(
										wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
											__( 'Edit <span class="screen-reader-text">%s</span>', 'axyum' ),
											array(
												'span' => array(
													'class' => array(),
												),
											)
										),
										wp_kses_post( get_the_title() )
									),
									'<span class="edit-link">',
									'</span>'
								);
								?>
							</footer><!-- .entry-footer -->
						<?php endif; ?>
					
				
				</div>
				
			</div>
		
		</div>	
		
	</div>
		
	</div>
	<?php } ?>


<?php if(is_front_page()) { ?>	
<!--additional homepage sections here-->

<?php } ?>

<?php

get_footer();
