$.when(new ldBar(".loading-bar", {
	'path': 'M59.528,32.801V17.535c5.591-0.975,9.357-2.777,9.357-4.844c0-3.102-8.455-5.617-18.884-5.617 s-18.884,2.515-18.884,5.617c0,2.067,3.765,3.869,9.357,4.844v15.266c-12.886,4.047-22.234,16.084-22.234,30.305 c0,17.541,14.22,31.761,31.761,31.761s31.761-14.22,31.761-31.761C81.761,48.885,72.414,36.849,59.528,32.801z',
	'fill': 'data:ldbar/res,bubble(#4fd2dd,#fff,50,1)'	
	}).set(1000)).done(function() {
	setTimeout(function() {
		$(document).ready(function() {
			var source = $('.nav.navbar-nav'),
				target = $('.navbar-responsive'),
				clone  = source.clone();

			// Clone desktop navbar to mobile navbar
			target
				.html(clone).find('.nav')
				.removeClass('navbar-nav navbar-right')
				.addClass('nav-pills nav-stacked');

			// Variable for instance
			$content          = $('.content');
			$navbarResponsive = $('.navbar-responsive');
			$triggerSidebar   = $('.trigger-sidebar');
			$triggerNavbar    = $('.trigger-navbar');

			// Prevent navbar & sidebar when content triggered
			$content.bind('click', function(e) {
				$sidebar.removeClass('active');
				$navbarResponsive.removeClass('active');
				$sidebarMenu.removeClass('active');
				$content.removeClass('active');

				if (window.innerWidth > 767 && window.innerWidth <= 1024) {
					$('.content').css('width', 'calc(100vw - 25px - 90px)');
				}
			});

			// Trigger sidebar at mobile
			$triggerSidebar.bind('click', function(e) {
				e.preventDefault();

				$sidebar.toggleClass('active');
				$sidebarMenu.toggleClass('active');
				$content.toggleClass('active');
			});

			// Trigger navbar at mobile
			$triggerNavbar.bind('click', function(e) {
				e.preventDefault();
			
				$navbarResponsive.toggleClass('active');
				$content.toggleClass('active');
			});
			
			$('body, .content').niceScroll({
				cursorwidth: '2px'
			});
			
			$(document).ready(function(){
				$('.postle').addClass("hideit").viewportChecker({
					classToAdd: 'showit animated bounceInLeft ', // Class to add to the elements when they are visible
					offset: 100    
				});   
				$('.postri').addClass("hideit").viewportChecker({
					classToAdd: 'showit animated bounceInRight ', // Class to add to the elements when they are visible
					offset: 100    
				});   
				$('.postb').addClass("hideit").viewportChecker({
					classToAdd: 'showit animated wobble ', // Class to add to the elements when they are visible
					offset: 100    
				});   
				$('.postup').addClass("hideit").viewportChecker({
					classToAdd: 'showit animated bounceInUp ', // Class to add to the elements when they are visible
					offset: 100    
				});   
				$('.postdw').addClass("hideit").viewportChecker({
					classToAdd: 'showit animated bounceInDown ', // Class to add to the elements when they are visible
					offset: 100    
				});  
			});

			// dynamicMenu();
			// preventCaching();
	});
		$('.content-loading').hide();
	}, 5000);
});

