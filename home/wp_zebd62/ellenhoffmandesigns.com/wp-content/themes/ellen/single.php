<?php
/**
 * The Template for displaying all single posts
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
		
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
		<div class='hidden' id='category'><?php foreach(get_the_category() as $category) {
			 echo $category->slug . ' ';}?>
			 
		</div>
		
		<article class='blog-article-single'>
			
			<h3><?php the_title(); ?></h3>
			<p><?php the_date(); ?></p> 			
			
			<?php the_content(); ?>	
			
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
  		
  		<?php the_tags( $before, ', ' , $after ); ?> 
  		
		</article>
		
		<?php endwhile; ?>
		<?php endif; ?>
		
		<?php comments_template( $file, $separate_comments ); ?>
	</div>
	
	
</div>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>