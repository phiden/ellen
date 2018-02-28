<?php
/**
 * The template used to display Tag Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div id="page-wrapper">

	<?php get_sidebar(); ?>
	
	<div id="blog-page-inner">
		
		<div id='blog-header'>
			
			<img src='/bespoken.jpg'/>
			
		</div>
	
		<h4>Tag Archive: <?php echo single_tag_title( '', false ); ?></h4>
		<!--<?php query_posts('cat=blog'); ?>-->
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
			<article class='blog-article'>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php the_content(); ?>
				<div id='social'>
			
					<div class="fb-share-button share" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button"></div>
					
					<div class='share'><a href="<?php the_permalink(); ?>" class="twitter-share-button" data-dnt="true">Tweet</a></div>
					
		  
					<div class='share'><a href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php get_the_post_thumbnail(); ?>&description=<?php the_title();?>" data-pin-do="buttonPin" data-pin-config="beside" data-pin-color="red" data-pin-height="28"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_28.png" /></a></div>
		  
					<div class='share'><script src="https://apis.google.com/js/platform.js" async defer></script>
		  <g:plusone></g:plusone></div>

			
				</div>
			</article>
			
		<?php endwhile; ?>
	
	</div>
	
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>