<!-- this file duplicates parts > shared > header.php to accomodate Woocommerce -->

<head>
<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
		<title><?php wp_title( '|' ); ?></title>
		<meta charset="UTF-8" />
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="http://ellenhoffmandesigns.com/xmlrpc.php" />
		<link rel="shortcut icon" href="http://ellenhoffmandesigns.com/wp-content/themes/ellen/img/favicon.ico">
		
		<script src="//use.typekit.net/syo6knp.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>

		<?php wp_head(); ?>

</head>

<div id="global-container"> <!-- close in footer -->
<header>

	<a id="header-logo" href="<?php echo home_url(); ?>"><img id='desktop-logo' src="http://ellenhoffmandesigns.com/wp-content/themes/ellen/css/ui/retina-logo.svg"/><img id='mobile-logo' src="http://ellenhoffmandesigns.com/wp-content/themes/ellen/css/ui/mobile-logo.png"/></a>
	
	<ul id="header-social">
		
		<li><a href="https://www.facebook.com/pages/Ellen-Hoffman-Designs/1457363704534220"><img src="http://ellenhoffmandesigns.com/wp-content/themes/ellen/css/ui/facebook.png"/>Facebook</a></li>
		<li><a href="http://instagram.com/ellenhoffmandesigns"><img src="http://ellenhoffmandesigns.com/wp-content/themes/ellen/css/ui/instagram.png"/>Instagram</a></li>

	</ul>
	
	<div id="mobile-nav-trigger" class='hidden'><a href=#mobile-menu><img src='http://ellenhoffmandesigns.com/wp-content/themes/ellen/css/ui/mobile-menu-trigger.png'></a></div>
	
	<a id='mobile-header-logo' class='hidden' href='<?php echo home_url(); ?>'><img src='http://ellenhoffmandesigns.com/wp-content/themes/ellen/css/ui/mobile-logo.png'></a>
	
</header>

<div id="shop-page-wrapper">