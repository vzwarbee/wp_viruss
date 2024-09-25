<?php
/**
 * Template name: Page - Left Sidebar
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>

<div  class="page-wrapper page-left-sidebar">
	<div class="row">
		<div id="content" class="large-12 right col content-right" role="main">
			<div class="page-inner">
				<header id="header" class="header <?php flatsome_header_classes(); ?>">
					<div class="header-wrapper stucks">
						<?php get_template_part( 'template-parts/header/header', 'wrapper' ); ?>
					</div>
				</header>
				<?php if(get_theme_mod('default_title', 0)){ ?>
					<div class="entry-header">
						<h1 class="entry-title mb uppercase"><?php the_title(); ?></h1>
					</div>
				<?php } ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

					<?php
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>

				<?php endwhile; // end of the loop. ?>
			</div>
		</div>

		<div class="large-3 col col-first navbar-left">
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>


<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
