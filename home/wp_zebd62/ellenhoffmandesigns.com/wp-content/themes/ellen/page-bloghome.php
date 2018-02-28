<?php
/**
 * Template Name: Blog Homepage
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div id="page-wrapper">

	<?php get_sidebar(); ?>
	
	<div id="page-inner">
		
		<div id='blog-header'>
			
			<img src='/bespoken.jpg'/>
			
		</div>
	
		<!--<?php query_posts('cat=blog'); ?>-->
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
			<article class='blog-article'>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				
				 <div class='excerpt-thumb'><?php the_post_thumbnail(); ?></div>
         <?php the_excerpt(); ?>
				
				<p><a href='<?php the_permalink();?>'>Read the full post &raquo;</a></p>
				
				<div id='social'>
			
         <!-- <div class="fb-share-button share" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button"></div>
          <div class='share'><a href="<?php the_permalink(); ?>" class="twitter-share-button" data-dnt="true">Tweet</a></div>
          <div class='share'><a href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php get_the_post_thumbnail(); ?>&description=<?php the_title();?>" data-pin-do="buttonPin" data-pin-config="beside" data-pin-color="red" data-pin-height="28"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_28.png" /></a></div>
          <div class='share'><script src="https://apis.google.com/js/platform.js" async defer></script>
  <g:plusone></g:plusone></div>-->
          <span class='st_facebook_hcount share' displayText='Facebook' st_url='<?php the_permalink(); ?>' st_title='<?php the_title(); ?> via Ellen Hoffman Designs'></span>
          <span class='st_twitter_hcount share' displayText='Tweet' st_url='<?php the_permalink(); ?>' st_title='<?php the_title(); ?> via Ellen Hoffman Designs'></span>
          <span class='st_pinterest_hcount share' displayText='Pinterest' st_url='<?php the_permalink(); ?>' st_title='<?php the_title(); ?> via Ellen Hoffman Designs'></span>
          <span class='st_googleplus_hcount share' displayText='Google +' st_url='<?php the_permalink(); ?>' st_title='<?php the_title(); ?> via Ellen Hoffman Designs'></span>
			
  		</div>
				
			</article>
			
		<?php endwhile; ?>
	
	</div>
	
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>