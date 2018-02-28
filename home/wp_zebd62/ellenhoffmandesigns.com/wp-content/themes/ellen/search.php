<?php
/**
 * Search results page
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
	
	<div id="page-inner" class='search-page-inner'>
  	
    <?php if ( have_posts() ): ?>
    <h3 class='search-result'>Search Results for '<?php echo get_search_query(); ?>'</h3>	
    
    <?php while ( have_posts() ) : the_post(); ?>
    	
    		<article class='search-result'>
      		
    			<?php
          	$post_type = get_post_type( $post );
          ?>
          	
    		 	<?php if($post_type === 'post') { ?>
      		 	
      		 	
      		 	<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      		 	<div class='excerpt-thumb'><?php the_post_thumbnail(); ?></div>
             <?php the_excerpt(); ?>
      		 	
      		<?php } else { ?>
    		 	
    		 	   <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            	<?php
            		/**
            		 * woocommerce_before_single_product_summary hook
            		 *
            		 * @hooked woocommerce_show_product_sale_flash - 10
            		 * @hooked woocommerce_show_product_images - 20
            		 */
            		 
            		//this is the image galleries
            		do_action( 'woocommerce_before_single_product_summary' );
            	?>
            
            	<div class="summary entry-summary">
            
            		<?php
            			/**
            			 * woocommerce_single_product_summary hook
            			 *
            			 * @hooked woocommerce_template_single_title - 5
            			 * @hooked woocommerce_template_single_rating - 10
            			 * @hooked woocommerce_template_single_price - 10
            			 * @hooked woocommerce_template_single_excerpt - 20
            			 * @hooked woocommerce_template_single_add_to_cart - 30
            			 * @hooked woocommerce_template_single_meta - 40
            			 * @hooked woocommerce_template_single_sharing - 50
            			 */
            			//this is the main stuff
            			do_action( 'woocommerce_single_product_summary' );
            		?>
            		
            		<?php
            		/**
            		 * woocommerce_after_single_product_summary hook
            		 *
            		 * @hooked woocommerce_output_product_data_tabs - 10
            		 * @hooked woocommerce_output_related_products - 20
            		 */
            		 
            		 //this removes related products and all the extra stuff
            		 do_action( 'woocommerce_after_single_product_summary' );
            	?>
            
            	</div><!-- .summary -->
            
              <meta itemprop="url" content="<?php the_permalink(); ?>" />
            
            </div>
            
          <?php } ?>
          
    		</article>
    		
    <?php endwhile; ?>
    
    
    <?php else: ?>
    <h2>No results found for '<?php echo get_search_query(); ?>'</h2>
    <?php endif; ?>
	</div>
	
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>