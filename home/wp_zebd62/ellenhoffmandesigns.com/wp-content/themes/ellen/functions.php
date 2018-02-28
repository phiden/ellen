<?php
	/**
	 * Starkers functions and definitions. Modified to support WooCommerce.
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================

	WooCommerce

	======================================================================================================================== */

	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

	add_action( 'after_setup_theme', 'ellen_setup' );

	function ellen_setup() {
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	function my_theme_wrapper_start() {
	  echo '<div id="page-inner">';
	}

	function my_theme_wrapper_end() {
	  echo '</div>';
	}

	//remove review capability. If you want to add it back in, remove this filter.
	add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
		function sb_woo_remove_reviews_tab($tabs) {

		 //unset( $tabs['description'] );      	// Remove the description tab
		 unset( $tabs['reviews'] ); 			// Remove the reviews tab
		 unset( $tabs['additional_information'] );  	// Remove the additional information tab
		 $tabs['description']['title'] = __( '' );

		 return $tabs;
	}



	//add category descriptions display, particularly for necklace pages
	add_action( 'woocommerce_after_subcategory_title', 'my_add_cat_description', 12);
		function my_add_cat_description ($category) {
		$cat_id=$category->term_id;
		$prod_term=get_term($cat_id,'product_cat');
		$description=$prod_term->description;
		echo '<div class="shop_cat_desc">'.$description.'</div>';
	}

	//declare WooCommerce theme support
	add_theme_support( 'woocommerce' );
	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================

	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

	======================================================================================================================== */

	add_theme_support('post-thumbnails');

	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================

	Actions and Filters

	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================

	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

	======================================================================================================================== */



	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}

	// fix prettybox
	/*wp_deregister_script('prettyPhoto');
  wp_register_script('prettyPhoto', 'wp-content/themes/ellen/prettyPhoto/jquery.prettyPhoto.min.js' , array( 'jquery' ), '3.1.6', true );
  wp_enqueue_script('prettyPhoto');*/

	/* ========================================================================================================================

	Comments

	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
