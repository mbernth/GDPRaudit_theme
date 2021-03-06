<?php


//* Flexible grids
// =====================================================================================================================

// check if the flexible content field has rows of data
add_action( 'genesis_after_entry', 'mono_flexible_grids', 15 );
function mono_flexible_grids() {
	
	if ( is_single() || is_page() ) {
	
	$loopCount = 0;
	
	
	
	if( have_rows('content_row') ):
	
		
	
		// loop through the rows of data
    	while ( have_rows('content_row') ) : the_row();
			$headline = 	get_sub_field('row_headline');
			$rowbutton = get_sub_field('row_button');
			$rowbuttonmanual = get_sub_field('row_button_manual_url');
			$rowtext = 	get_sub_field('row_button_clone');
			$coll = get_sub_field('columns_no');
			$ctaheadline = get_sub_field('call_to_action_headline');
			$ctaphone = get_sub_field('call_to_action_phone');
			$ctacontent = get_sub_field('call_to_action_content');
			$clip_path_element_array = get_sub_field( 'clip_path_element' );
			$call_out_element = get_sub_field( 'call_out_element' );

			if( get_row_layout() == 'call_to_action' ):
				$hide_cta_array = get_sub_field( 'hide_cta' );
				$clip_path_element_margins_array = get_sub_field( 'clip_path_element_margins' );

				if (get_sub_field(''.$hide_cta_array.'')){
				}else{
					echo '<article class="gridcontainer cta-area coll1';
					if ( $clip_path_element_margins_array ):
						foreach ( $clip_path_element_margins_array as $clip_path_element_margins_item ):
							echo ' ';
							echo $clip_path_element_margins_item;
						endforeach;
					endif;
					echo '">';
						echo '<div class="wrap">';
							echo '<section class="wysiwyg">';
								echo '<h2 class="row_headline">'. $ctaheadline .' <a href="tel:'.$ctaphone.'">'.$ctaphone.'</a></h2>';
								echo ''.$ctacontent.'';
							echo '</section>';
						echo '</div>';
					echo '</article>';
				}
			endif;

        	if( get_row_layout() == 'row_setup' ):
			
			// This will hide a whole row
			if (get_sub_field('hide_row')){
				
				}else{
				// Add background color and ID if needed
				echo '<article class="gridcontainer ';
						the_sub_field('background_colour');
						echo ' coll' . $coll . '';
						if ( $clip_path_element_array ):
							foreach ( $clip_path_element_array as $clip_path_element_item ):
								 echo ' ';
								 echo $clip_path_element_item;
							endforeach;
						endif;
						if ( $call_out_element ):
							foreach ( $call_out_element as $clip_path_element_item ):
								echo ' '; 
								echo $clip_path_element_item;
							endforeach;
						endif;
					if (get_sub_field('row_id')){
						echo '" id="';
					 	the_sub_field('row_id');
					}
				echo '" >';
				// Add row headline
				if ($headline){
					echo '<h2 class="row_headline">' . $headline . '</h2>';
				}
				
				
				echo '<div class="wrap">';
					$selected = get_sub_field('background_colour');
					$content = get_sub_field('content');
					
					
					while ( have_rows('column') ) : the_row();
							
							// Column fields
							if (get_sub_field('content')){
								$colbtn = get_sub_field('column_content_button');
								
								echo '<section class="wysiwyg">';
									
									if( ($selected == 'non dark' || $selected == 'non medium' || $selected == 'non light' || $selected == 'non')){
										if($headline){
										echo '<h2 class="entry-title">' . $headline . '</h2>';
										}
									}
									
									the_sub_field('content');
									// Column botton
									if ($colbtn['button_text']){
										if ($colbtn['page_link']){
										echo '<a class="button" href="' . $colbtn['page_link']. '"><span>';
										}else{
										echo '<a class="button" href="' . $colbtn['url_link']. '""><span>';
										}
										echo '' . $colbtn['button_text']. '';
										echo '</span></a>';
									}
								echo '</section>';
							}


							// Image fields
							if (get_sub_field('image_link')){
								// Image Array
								$image =  get_sub_field('image_link');
								$btn = get_sub_field ( 'image_button' );
								
								if( get_sub_field('content') && $selected == 'non' || $selected == 'non black' || $selected == 'non grey' || $selected == 'non') {
									// Full field images
									echo '<section class="backimage" style="background-image: url('.$image['url'].');"></section>';
									
									}else{
										
									echo '<section>';
										if ($btn['page_link']){
											echo '<a href="' . $btn['page_link']. '"><img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage" /></a>';
										}elseif($btn['url_link']){
											echo '<a href="' . $btn['url_link']. '" target="_blank""><img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage" /></a>';
										}else{
											echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage" />';
										}
									echo '</section>';
										
								}
							}
							
							
							// Video fields
							if (get_sub_field('video_embeding_code')){
							echo '<section>';
								the_sub_field('video_embeding_code');
							echo '</section>';
							}

							// Widget fields
							if (get_sub_field('widget_area')){
								echo '<section class="featured_widget">';
									the_sub_field('widget_area');
								echo '</section>';
							}
							
							
					endwhile;
				
				echo '</div>';
				
				// Row button field
				if ($rowtext['button_text']){
					if ($rowtext['page_link']){
						echo '<a class="button" href="' . $rowtext['page_link']. '"><span>';
						}else{
						echo '<a class="button" href="' . $rowtext['url_link']. '" target="_blank""><span>';
					}
						echo '' . $rowtext['button_text']. '';
						echo '</span></a>';
				}
				echo '</article>';
			
			}
			endif;
			$loopCount ++;
			
			
			
    	endwhile;
	
	else :

    // no layouts found

	endif;
	
	}

}