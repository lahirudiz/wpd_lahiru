<?php
/**
 * Template Name: Home
 *
 * @package wpdeyepax
 * @author Lahiru Dissanayaka
 */
get_header();
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('template-home'); ?>>
	<!-- Section 01 -->
	<div class="section section-01">
		<div class="container-fluid g-0">
			<div class="row g-0">
				<div class="col-md-12">
					<div class="home-slider">
						<div id="homeSlider" class="owl-carousel owl-theme">
							<?php
								// The Query
								$the_query = new WP_Query( array( 'post_type' => 'attractions' ) );
								// The Loop
								if ( $the_query->have_posts() ) {
									
									while ( $the_query->have_posts() ) {
										$the_query->the_post(); ?>
										<div class="item section-fix-screen d-flex flex-column justify-content-center text-white" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>);">
											<h3 class="sub-title"><?php echo get_post_meta($post->ID, 'slider_sub_title', true); ?></h3>
											<h1 class="main-title"><?php echo get_post_meta($post->ID, 'slider_title', true); ?></h1>
											<p class="title"><?php echo get_the_title(); ?></p>
											<p class="description mb-4"><?php echo get_post_meta($post->ID, 'description', true); ?></p>
											<a class="btn btn-primary" href="<?php echo get_permalink(); ?>">Explore</a>
										</div>
									<?php
									}
								} else {
									// no posts found
									echo "Please add atlease one attraction";
								}
								/* Restore original Post Data */
								wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Section 01 -->

	<!-- Section 01 -->
	<div class="section section-02">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mb-5 mt-5">
						<h1>Page Content</h1>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Section 02 -->

</div><!-- #post-<?php the_ID(); ?> -->
<script>
	jQuery('#homeSlider').owlCarousel({
	    loop:true,
	    margin:0,
	    nav:false,
	    dots:true,
	    responsive:{
	        0:{
	            items:1
	        }
	    }
	})
</script>
<?php
get_footer();?>
