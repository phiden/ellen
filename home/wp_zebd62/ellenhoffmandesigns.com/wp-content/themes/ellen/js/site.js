
	jQuery(document).ready(function($) {
	
		//clean up ridic woocommerce defaults that I can't seem to override.
		$('.woocommerce').removeClass('woocommerce');

		// deal with the mobile navigation
		function checkForMobile() {
		
			//console.log('checking for mobile: ' , $(window).width());
			
			if($(window).width() <= 600) {
				
				$('#global-nav').clone().attr('id', 'mobile-nav').appendTo($('#mobile-header-logo'));
				$('#global-nav').addClass('hidden');
				//$('#header-logo').addClass('hidden');
				$('#mobile-nav-trigger').removeClass('hidden');
				//$('#mobile-header-logo').removeClass('hidden');
				
				$('#mobile-nav').mmenu();
				$("#mobile-nav-trigger a").click(function() {
				
					//console.log('mobile trigger clicked', $('#mobile-nav'));
			         $("#mobile-nav").trigger("open.mm");
			    });
			    
			    $('.main-nav a').click(function() {
				    
				    $('#mobile-nav').trigger('close.mm');
			    })
			    
			    	
			    			
			} else {
				
				$('#mobile-nav').remove();
				$('#global-nav').removeClass('hidden');
				$('#mobile-nav-trigger').addClass('hidden');
		
			}
		}
		
		//handle people resizing the window, but only call checkForMobile when the resize is done
		$(window).resize(function(){
			
			clearTimeout(this.id);
			this.id = setTimeout(checkForMobile, 500);
		})
		
		//call the mobile check right away
		checkForMobile();
		
		//get window size. we need this to control the metaslider display.
		windowSize = $(document).width();
		windowSizeString = 'max-width:' + windowSize;
		
		//console.log(windowSizeString);
		//$('.metaslider').addClass('hidden');
		$('.metaslider').attr('style', windowSizeString);


		//handle woocommerce stuff. If JS is disabled, WooCommerce will display default breadcrumbs.
		
		//unnecessary with the sidebar menu
		$('.woocommerce-breadcrumb').addClass('hidden');
		
		//get the page slug
		function getPath() {
			
			//clear blog nav
			$('.blog').addClass("hidden");
			
			var url = window.location.href;
			var path = url.split("/");
		    var slug = path[path.length - 2];
		    //console.log(slug, " !");
		    return slug;
			
		}
		
		//getPath()
		
		/* new nav vars */
		// product-category/ancient-necklaces/
		// product-category/ancient-bracelets/
		// product-category/ancient-earrings/
		// product-category/ancient-rings-pendants/
		// product-category/precious-semi-precious-bracelets/
		// product-category/precious-semi-precious-earrings/
		// product-category/precious-semi-precious-necklaces/
		// product-category/precious-semi-precious-rings-pendants/
		// product-category/vintage-antique-bracelets/
		// product-category/vintage-antique-earring/
		// product-category/vintage-antique-necklace/
		// product-category/vintage-antique-rings-pendants/
		
				
		//set up navigation vars, because man these strings are long.
		
		var catNav = "<ul><li><a id='necklaces-parent' href='http://ellenhoffmandesigns.com/product-category/necklaces/'>Necklaces</a></li><li><a id='bracelets-parent' href='http://ellenhoffmandesigns.com/product-category/bracelets/'>Bracelets</a></li><li><a id='earrings-parent' href='http://ellenhoffmandesigns.com/product-category/earrings/'>Earrings</a></li><li><a id='rings-parent' href='http://ellenhoffmandesigns.com/product-category/rings-pendants/'>Rings &amp; Pendants</a></li><li><a id='mens-parents' href='http://www.ellenhoffmandesigns.com/product-category/mens-accessories/'>Men's Accessories</a></li></ul>";
		
		var colNav = "<ul><li><a id='psp-parent' href='http://ellenhoffmandesigns.com/product-category/precious-semi-precious/'>Gemstones</a></li><li><a id='aa-parent' href='http://ellenhoffmandesigns.com/product-category/ancient/'>Ancient</a></li><li><a id='vintage-antique-parent' href='http://ellenhoffmandesigns.com/product-category/vintage-antique/'>Vintage &amp; Antique</a></li><li><a id='mens-parents-2' href='http://www.ellenhoffmandesigns.com/product-category/mens-accessories/'>Men's Accessories</a></li></ul>";
		   
		//handle the navigation in the sidebar (as opposed to breadcrumbs), and also active states.
		switch (getPath()) {
		
		 	case 'shop-collections': 
			
				//console.log('you are shopping collections.');
				$('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
		        break;
		        
		    case 'ancient':
		        
		    //console.log('you are shopping ancient');
				$('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#aa-parent').addClass('active');
		        break;
		        
		    case 'vintage-antique': 
		    
		    	$('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#vintage-antique-parent').addClass('active');
		        break;
		    
		    case 'precious-semi-precious': 
		    
		    	$('#shop-col').append(colNav);
          $('#shop-col .top-nav').addClass('active');
          $('#psp-parent').addClass('active');
		      break;
		        
		    case 'shop-categories': 
		    
		    	$('#shop-cat').append(catNav);
          $('#shop-cat .top-nav').addClass('active');
		      break;
		      
		    case 'necklaces': 
		    
		    	$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#necklaces-parent').addClass('active');
		        break;
		    
		    case 'bracelets':
		        
		        $('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#bracelets-parent').addClass('active');
		        break;
		            
		    case 'earrings':
		        
		        $('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#earrings-parent').addClass('active');
		        break;
		        
		        
		    case 'rings-pendants':
		    
		        $('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#rings-parent').addClass('active');
		        break;
		        
		    case 'mens-accessories':
		      $('#shop-cat').append(catNav);
          $('#shop-cat .top-nav').addClass('active');
          $('#mens-parents').addClass('active');
          $('#mens-parents-2').addClass('active');
		      break;
		        
		    case 'art':
		    
		    	$('#blog a').addClass('active');
		    	$('#blog-art a').addClass('active');
				displayBlogNav();
				break;
				
			case 'design':
		    
		    	$('#blog a').addClass('active');
		    	$('#blog-design a').addClass('active');
				displayBlogNav();
				break;
		        
		    case 'ellens-collections':
		    
		    	$('#blog a').addClass('active');
		    	$('#blog-ellen a').addClass('active');
				displayBlogNav();
				break;
				
			case 'travel':
		    
		    	$('#blog a').addClass('active');
		    	$('#blog-travel a').addClass('active');
				displayBlogNav();
				break;
				
		    //global nav
		    case 'events':
				
				$('#events a').addClass('active');
				break;
				
			case 'about':
				
				$('#about a').addClass('active');
				break;
				
			case 'contact':
				
				$('#contact a').addClass('active');
				break;
				
			case 'cart-2':
				
				$('#cart a').addClass('active');
				break;
				
			case 'bespoke':
				
				$('#bespoke a').addClass('active');
				break;
				
			case 'blog':
				$('#blog a').addClass('active');
				displayBlogNav();
				break;
		        
		   
		}
		
		//because things can never be simple, now we have to handle individual products' active states in the global nav
		
		switch (findCategory()) {
		
			/*
			
			ancient-necklace
			ancient-bracelet
			ancient-earrings
			ancient-rings-pendants
			vintage-antique-necklace
			vintage-antique-bracelet
			vintage-antique-earrings
			vintage-antique-rings-pendants
			precious-semi-precious-necklace
			precious-semi-precious-bracelet
			precious-semi-precious-earrings
			precious-semi-precious-rings-pendants
			*/
			
			case 'ancient-necklace':
		        
		    //console.log('you are shopping ancient & necklaces');
				$('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#necklaces-parent').addClass('active');
				$('#aa-parent').addClass('active');
		    break;
		    
		  case 'ancient-bracelet':
		        
				$('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#bracelets-parent').addClass('active');
				$('#aa-parent').addClass('active');
		        break;
		            
		  case 'ancient-earrings':
		        
		    $('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#earrings-parent').addClass('active');
				$('#aa-parent').addClass('active');
		    break;
		        
		  case 'ancient-rings-pendants':
		        
		    $('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#rings-parent').addClass('active');
				$('#aa-parent').addClass('active');
		        break;
		        
		  case 'vintage-antique-necklace':
		        
		    //console.log('you are shopping ancient & necklaces');
				$('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#necklaces-parent').addClass('active');
				$('#vintage-antique-parent').addClass('active');
		    break;
		    
		  case 'vintage-antique-bracelet':
		        
				$('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#bracelets-parent').addClass('active');
				$('#vintage-antique-parent').addClass('active');
	       break;
	            
	    case 'vintage-antique-earrings':
		        
		    $('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#earrings-parent').addClass('active');
				$('#vintage-antique-parent').addClass('active');
		    break;
		        
		  case 'vintage-antique-rings-pendants':
		        
		    $('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#rings-parent').addClass('active');
				$('#vintage-antique-parent').addClass('active');
		    break;
		  	//      
		        
		  case 'precious-semi-precious-necklace':
		        
		    $('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#necklaces-parent').addClass('active');
				$('#psp-parent').addClass('active');
		    break;
		    
		  case 'precious-semi-precious-bracelet':
		        
				$('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#bracelets-parent').addClass('active');
				$('#psp-parent').addClass('active');
		    break;
		            
		  case 'precious-semi-precious-earrings':
		        
	      $('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#earrings-parent').addClass('active');
				$('#psp-parent').addClass('active');
	      break;
		        
	    case 'precious-semi-precious-rings-pendants':
	        
		    $('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#rings-parent').addClass('active');
				$('#psp-parent').addClass('active');
	      break;
		    
	    case 'mens-accessories':
	      $('#shop-col').append(colNav);
				$('#shop-col .top-nav').addClass('active');
				$('#shop-cat').append(catNav);
				$('#shop-cat .top-nav').addClass('active');
				$('#mens-parents').addClass('active');
				$('#mens-parents-2').addClass('active');
				$('#psp-parent').addClass('active');
	      break;
		    		        
		}
		     
		/*
		product-cat-ancient product-cat-necklaces
		product-cat-vintage-antique product-cat-bracelets
		product-cat-precious-semi-precious product-cat-earrings
		product-cat-rings-pendants
		*/
						
		function findCategory() {
  		
  		//console.log('find category:', $('div.product').class);
			
			var category;
			
			if($('div.product').hasClass('product-cat-ancient-necklaces')) {
				
				category = 'ancient-necklace';
				//console.log('it works');	
			}
			
			if($('div.product').hasClass('product-cat-ancient-bracelets')) {
				
				category = 'ancient-bracelet';
				
			}
			
			if($('div.product').hasClass('product-cat-ancient-earrings')) {
				
				category = 'ancient-earrings';
				
			}
			
			if($('div.product').hasClass('product-cat-ancient-rings-pendants')) {
				
				category = 'ancient-rings-pendants';
				
			}
			
			//
			if($('div.product').hasClass('product-cat-vintage-antique-necklaces')) {
				
				category = 'vintage-antique-necklace';
				
			}
			
			if($('div.product').hasClass('product-cat-vintage-antique-bracelets')) {
				
				category = 'vintage-antique-bracelet';
				
			}
			
			if($('div.product').hasClass('product-cat-vintage-antique-earrings')) {
				
				category = 'vintage-antique-earrings';
				
			}
			
			if($('div.product').hasClass('product-cat-vintage-antique-rings-pendants')) {
				
				category = 'vintage-antique-rings-pendants';
				
			}
			//
			
			if($('div.product').hasClass('product-cat-precious-semi-precious-necklaces')) {
				
				category = 'precious-semi-precious-necklace';
				
			}
			
			if($('div.product').hasClass('product-cat-precious-semi-precious-bracelets')) {
				
				category = 'precious-semi-precious-bracelet';
				
			}
			
			if($('div.product').hasClass('product-cat-precious-semi-precious-earrings')) {
				
				category = 'precious-semi-precious-earrings';
				//console.log('earring');
				
			}
			
			if($('div.product').hasClass('product-cat-precious-semi-precious-rings-pendants')) {
				
				category = 'precious-semi-precious-rings-pendants';
				
			}
			
			if($('div.product').hasClass('product_cat-mens-accessories')) {
  			
  			category = 'mens-accessories';
  			
			}
		
			return category;
		}	
		
		//messy, messy repetitive
		function displayBlogNavSingle() {
			
			if($('body').hasClass('single-post')) {
				
				//console.log('has single post');
				//console.log($('#category').text().split(' '));
				var ary = $('#category').text().split(' ');
				
				for(var i = 0; i < ary.length; i++) {
					
					switcher(ary[i]);
				}
			}
			
		}
		
		//so messy
		function switcher(i) {
			
			//active nav on single posts
			switch(i) {
				
				case 'art':
		    
		    	$('#blog a').addClass('active');
		    	$('#blog-art a').addClass('active');
				displayBlogNav();
				break;
				
			case 'design':
		    
		    	$('#blog a').addClass('active');
		    	$('#blog-design a').addClass('active');
				displayBlogNav();
				break;
		        
		    case 'ellens-collections':
		    
		    	$('#blog a').addClass('active');
		    	$('#blog-ellen a').addClass('active');
				displayBlogNav();
				break;
				
			case 'travel':
		    
		    	$('#blog a').addClass('active');
		    	$('#blog-travel a').addClass('active');
				displayBlogNav();
				break;
			}
		}
		
		displayBlogNavSingle();
		
		function displayBlogNav() {
			
			$('.blog').removeClass("hidden");
			
			
		}
		
	});

