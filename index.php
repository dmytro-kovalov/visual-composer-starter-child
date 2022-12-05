<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pro-Tec
 */

get_header();

?>
<section class="container mb-xl-6 mb-sm-5 mb-4 pb-md-3 pb-1">
	<?php if ( have_posts() ) : ?>
		<?php if ( is_home() && ! is_front_page() ) : ?>
			<h1><?php single_post_title(); ?></h1>
		<?php endif; ?>
		<div class="row">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/post', 'tile' );
			endwhile;
			?>
		</div>
		<?php the_posts_pagination( [ 'type' => 'list', 'prev_next' => false, ] ); ?>
	<?php else : ?>
		<div class="text-center p-3">
			<p><?php esc_html_e( 'Nothing found', 'visual-composer-starter-child' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
			   class="btn btn-primary"><?php esc_html_e( 'Go to homepage', 'visual-composer-starter-child' ); ?></a>
		</div>
	<?php endif; ?>
</section>
<?php

get_footer();