(function projectNav($){
	
	// Nav Arrow Click
	$('.project-nav, .bubble').click(function(){
		var projectID = $(this).attr('data-id');
		
		nextProject(projectID);
		console.log('Call project: ' + projectID);
	});
	
}(jQuery));


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