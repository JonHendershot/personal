(function fader($){
	$(window).load(function(){ // display body once everything is loaded
		$('body#off').removeAttr('id').removeClass('anim');
		if($('.project-wrapper.matrix').length){
			$('.project-wrapper.matrix').removeClass('matrix');
		}
		
		// Animate Home page content
		if($('body.page-template-home').length){
			// Load in the content after the page fades on
			setTimeout(function(){
				$('.page-content.pre, .page-content .pre').removeClass('pre');
			},800);
			
			// Animate menu on after page content 
			setTimeout(function(){
				$('#menu-main-menu li').addClass('set');
			},2000);
		}
	});
	
	$('a').click(function(){
		var target = $(this).attr('target');
		
		if( ! $(this).hasClass('project-link') && target !== '_blank' ){
			event.preventDefault(); // don't send to the link yet
		
			var clicked = $(this),
				newLocation = this.href,
				colorSchemes = {
					"light" : "#12171a",
					"dark" : "#ffffff"
				};
			
			$('body').attr('id','off');
	
			if(this.hasAttribute('data-scheme')){
							
				setTimeout(function(){
					if(clicked.hasClass('view-project')){
						var bgColor = colorSchemes['dark'];
					}else {
						var scheme = clicked.data('scheme'),
							bgColor = colorSchemes[scheme];
					}
					
						
					$('body').css({'background-color':bgColor});
					
				},600);
				
				setTimeout(function(){
					window.location = newLocation;
				},1200);
				
			}else {
				setTimeout(function(){
					window.location = newLocation;
				},1000);
			}

		}		
	});
}(jQuery));
(function projectNav($){
	
	// Nav Arrow Click
	$('.project-nav, .bubble').click(function(){
		var projectID = $(this).attr('data-id');
		
		nextProject(projectID);
		console.log('Call project: ' + projectID);
	});
	
}(jQuery));
(function mobileMenu($){
	$('.mobile-menu-trigger').click(function(){
		var menuSelect = $(this).attr('data-menu'),
			menu = $('.' + menuSelect);
			
			console.log(menuSelect);
		
		if( ! menu.hasClass('open') ){
			menu.addClass('open');
			$('.mobile-menu-trigger').addClass('open');
			$('.mobile-menu-trigger.close').attr('data-menu',menuSelect);
		}else {
			menu.removeClass('open');
			$('.mobile-menu-trigger').removeClass('open');
		}
	});
}(jQuery));
(function vhFix($){
	var vhItem = $('.vh');
	
	vhItem.each(function(){
		var height = vhItem.height();
		console.log(height);
		
		$(this).css({'height' : height});
	});
}(jQuery));
// (function homeSlider($){
// 	if($('.creative-titles').length){
		
// 		setTimeout(function(){
	
// 			// Set Variables inside of setTimeout so that we don't drop slides in the second setTimeout for nextSlide
// 			var slider = $('.creative-titles'),
// 			activeSlide = $('.creative-titles .sub-title.visible'),
// 			activeID = parseInt(activeSlide.data('id')),
// 			pNextID = activeID + 1;
			
// 			// Handle Next Slides
// 			if($('.sub-title.slide-' + pNextID).length){
// 				var nextID = pNextID;
// 			}else {
// 				var nextID = 1;
// 			}
			
// 			// Remove Current slide
// 			activeSlide.removeClass('visible');
			
// 			// Add next Slide
// 			setTimeout(function(){
// 				$('.sub-title.slide-' + nextID).addClass('visible');
				
// 			}, 1100);
			
// 			// Call function Loop
// 			homeSlider($);
			
// 		}, 4750);
		
// 	}		
// }(jQuery));
function nextProject(postID){
	var $ = jQuery,
		nextPostID = parseInt(postID) + 1,
		prevPostID = parseInt(postID) - 1,
		projectCount = $('.projects > .container').attr('data-count');
	
	// Project Transition
		$('.project-wrapper.active').removeClass('active');
		
		setTimeout(function(){
			$('.project-wrapper.project-' + postID).addClass('active');
		},600);
		
	// Update Nav Buttons
		// Next Button
		if($('.project-wrapper.project-' + nextPostID).length){
			// The next project extists, so add its id to the data-id attr
			$('.project-nav.next').attr('data-id',nextPostID);
		}else {
			// The next project does not exist, so make the first project the data-id attr
			$('.project-nav.next').attr('data-id',1);			
		}
		
		// Prev Button
		if($('.project-wrapper.project-' + prevPostID).length){
			// The previous project extists, so add its id to the data-id attr
			$('.project-nav.previous').attr('data-id',prevPostID);
		}else {
			// The previous project does not exist, so make the last project the data-id attr
			$('.project-nav.previous').attr('data-id',projectCount);	
		}
	
	// Update Bubbles 
		$('.bubble.active').removeClass('active');
		$('.bubble.post-' + postID).addClass('active');
}