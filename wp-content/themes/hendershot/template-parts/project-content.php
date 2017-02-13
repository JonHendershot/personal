<?php

	// Variables

		// General
		$project_title = get_the_title();
		$project_categories = get_the_category();
		$cat_number = count($project_categories);
		$cc = 1;
		$intro_body = get_field('introduction');
		$conclusion_body = get_field('conclusion');
		
		// Title Fix
		// The heading font face displays an odd space before the first letter, causing some spacing issues. Thus, we will define which letters have issues, detect if the title starts with one of those letters, and apply a css class to remedy the issue should it be present.
		$title_first = substr($project_title,0,1);
		$title_fix_array = array('J','T','V','W','X','Y'); // these are the letters that are ok
		
		if(! in_array($title_first, $title_fix_array)){
			$fix_class = "space-fix";
		}else {
			$fix_class = '';
		}
		
		
?>

<div class="project-section project-heading contained vh">
	<div class="heading-container">
		<a href="<?php echo home_url() . '/projects'; ?>" class="previous light" data-scheme="light">Return to Projects</a>
		<h1 class="<?php echo $fix_class; ?>"><?php echo $project_title; ?></h1>
		<p class="sub-title">
			<?php 
				foreach($project_categories as $category){
												
					echo "<span class='cat-name cat-$category->name'>$category->name</span>";
					if($cc < $cat_number){
						echo "<span class='cat-divider'>-</span>";
					}
					
					$cc++;
				}
			?>
		</p>
		<div class="scroll-hint">scroll down</div>
	</div>
</div>
<div class="project-section project-introduction contained">
	<h2>Introduction</h2>
	<div class="project-copy"><?php echo $intro_body; ?></div>
</div>

<?php
		// Sections
		for($ll = 1; $ll <= 4; $ll++){
		
			// Field Keys	
			$title_key = 'title_' . $ll;
			$copy_key = 'copy_' . $ll;
			$file_key = 'file_' . $ll;
			$file_display_key = 'file_display_' . $ll;

		
			
			// Create Content Variables
			${"part_{$ll}_title"} = get_field($title_key);
			${"part_{$ll}_copy"} = get_field($copy_key);
			${"part_{$ll}_file"} = get_field($file_key);
			${"part_{$ll}_file_display"} = get_field($file_display_key);
			
			// Logic Variables
			if(${"part_{$ll}_file"}){
				$file_display_strip = str_replace(' ', '', ${"part_{$ll}_file_display"});
				$file_display = explode('-',$file_display_strip);
				$file_width = strtolower($file_display[1]);
				$file_extension = explode('.',${"part_{$ll}_file"}['url']);
			}
			
			
			
			
			if(${"part_{$ll}_title"}){ // If iteration has content belonging to it, render that content
				
				
				// If this iteration has a file associated with it, and that file belongs above the written copy, render that content here
				if(${"part_{$ll}_file"} && $file_display[0] == 'Above'){ 
					
					echo 
						"<div class='project-section project-file-container section-$ll-file'>
							<div class='project-wrapper $file_width'>";
						
						
						// Decipher which type of file we're working with and render the appropriate content
						if($file_extension[1] !== 'mp4'){ 
							echo "<img src='". ${"part_{$ll}_file"}['url'] ."' class='project-image' />";
						}
							
							
					echo
							"</div>
						</div>";
					
				}
				
				// Project Copy
				echo 
					'<div class="contained project-cat project-section project-content '. strtolower(${"part_{$ll}_title"}) .'">
						<div class="title-wrapper">
							<h2>'. ${"part_{$ll}_title"} .'</h2>
						</div>
						<div class="project-copy">'. ${"part_{$ll}_copy"} .'</div>
					</div>';
			
				
				// If this iteration has a file associated with it, and that file belongs below the written copy, render that content here
				if(${"part_{$ll}_file"} && $file_display[0] == 'Below'){ 
					
					echo 
						"<div class='project-section project-file-container section-$ll-file'>
							<div class='project-wrapper $file_width'>";
						
						
						// Decipher which type of file we're working with and render the appropriate content
						if($file_extension[1] !== 'mp4'){ 
							echo "<img src='". ${"part_{$ll}_file"}['url'] ."' class='project-image' />";
						}
							
							
					echo
							"</div>
						</div>";
					
				}
			
			}
		
		}	
?>

<div class="project-conclusion project-section contained">
	<h2>Conclusion</h2>
	<div class="project-copy"><?php echo $conclusion_body; ?></div>
</div>
<div class="project-nav contained">
	<?php 
		
		// WP returns these values in a counter-intuitive manner, so we'll switch them on calling the post objects.
		
		$prev_post = get_next_post();
		$next_post = get_previous_post();
		
		
		
		if($prev_post){
			$prev_post_url = get_permalink($prev_post->ID);
			echo "<a href='$prev_post_url' class='previous light'>Previous Project</a>";
		}
		if($next_post){
			$next_post_url = get_permalink($next_post->ID);
			echo "<a href='$next_post_url' class='next light'>Next Project</a>";
		}
	?>
</div>