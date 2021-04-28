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
 * @package blank
 */

get_header();
?>
	<section class="header9 cid-srgu19Ga1x" id="header9-a">
<div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(34, 165, 229);"></div>
<div class="text-center container">
<div class="row justify-content-center">
<div class="col-md-12 col-lg-9">
<div class="image-wrap mb-4">
<img src="http://localhost/wordpress/wp-content/uploads/2021/04/assets/images/shop.png" alt="Mobirise">
<h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong>APHA is the best&nbsp;</strong></h1>   
</div>
</div>
</div>
</div>
</section>
	<div class="mbr-text text-center container">
	<div class="mbr-section-title mbr-fonts-style mb-3 display-4" style="margin:2px;">
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
	</div>
	</div>

<?php
get_footer();
?>