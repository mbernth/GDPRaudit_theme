<?php


//* Flexible page content
// =====================================================================================================================

// check if the flexible content field has rows of data
add_action( 'genesis_after_entry', 'mono_flexible_page_content', 15 );
function mono_flexible_page_content() {
	
	if ( is_single() || is_page() ) {

        if ( have_rows( 'page_content' ) ):
        while ( have_rows( 'page_content' ) ) : the_row();
            $hide = get_sub_field( 'hide' );
            $content_area_width = get_sub_field( 'content_area_width' );
            $content_background_color = get_sub_field( 'content_background_color' );
            if ($hide){

            }else{
            // Text elements
            if ( get_row_layout() == 'text_elements' ) :
                $headline_array = get_sub_field( 'headline' );
                echo '<article class="gridcontainer '.$content_area_width.' '.$content_background_color.'">';
                    echo '<div class="wrap">';
                    if ($headline_array){
                        echo '<h2 class="row_headline">'.$headline_array.'</h2>';
                    }
                if ( have_rows( 'text_area_element' ) ):
                    while ( have_rows( 'text_area_element' ) ) : the_row();
                    $text_area_size = get_sub_field( 'text_area_size' );
                    $hide_content_array = get_sub_field( 'hide_content' );
                    if ($hide_content_array){

                    }else{

                    // echo '<section class="'.$text_area_size.'">';
                    
                        if ( get_row_layout() == 'text_block' ) :
                            echo '<section class="'.$text_area_size.'">';
                            $lead_paragraph_array = get_sub_field( 'lead_paragraph' );
                            if ( $lead_paragraph_array ):
                                echo '<span class="';
                                foreach ( $lead_paragraph_array as $lead_paragraph_item ):
                                    echo ''.$lead_paragraph_item.' ';
                                endforeach;
                                echo '">';
                                else:
                                echo '<span>';
                            endif;
                            the_sub_field( 'text' );
                            the_sub_field( 'button' );
                            echo '</span>';
                            
                            $button_category = get_sub_field( 'button_category' );
                            $button_type = get_sub_field( 'button_type' );
                            $button_text = get_sub_field( 'button_text' );
                            $page_link = get_sub_field( 'page_link' );
                            $url_link = get_sub_field( 'url_link' );
                            if ( $button_text ){
                                if ($page_link){
                                    echo '<a class="button '.$button_category.'" href="' .$page_link. '">'.$button_text.'</a>';
                                }else{
                                    echo '<a class="button '.$button_category.'" href="' .$url_link. '">'.$button_text.'</a>';
                                }
                            }
                            echo '</section>';
                        endif;

                        if ( get_row_layout() == 'picture_block' ) :
                            $picture_area_width_array = get_sub_field( 'picture_area_width' );
                            $hide_image_array = get_sub_field( 'hide-image' );

                            echo '<section class="'.$picture_area_width_array.'">';
                            if ( $hide_image_array ){
                            }else{
                                $picture = get_sub_field( 'picture' );
                                if ( $picture ) {
                                    echo '<img src=" '.$picture[url].' " alt=" '.$picture['alt'].'" />';
                                }
                            }
                            $button_category = get_sub_field( 'button_category' );
                            $button_type = get_sub_field( 'button_type' );
                            $button_text = get_sub_field( 'button_text' );
                            $page_link = get_sub_field( 'page_link' );
                            $url_link = get_sub_field( 'url_link' );
                            if ( $button_text ){
                                if ($page_link){
                                    echo '<a class="button '.$button_category.'" href="' .$page_link. '">'.$button_text.'</a>';
                                }else{
                                    echo '<a class="button '.$button_category.'" href="' .$url_link. '">'.$button_text.'</a>';
                                }
                            }
                            echo '</section>';
                        endif;

                    // echo '</section>';
                    }
                    endwhile;
                
                echo '</div>';
                echo '</article>';
                else:
                    // no layouts found
                endif;
            endif;

            

            }
            // Picture elements
            if ( get_row_layout() == 'picture_elements' ) :
                // hide_image ( value )
                $hide_image_array = get_sub_field( 'hide_image' );
                $picture_area_width_array = get_sub_field( 'picture_area_width' );

                if ( $hide_image_array ){
                }else{
                
                echo '<article class="gridcontainer">';
                echo '<div class="wrap">';
                echo '<section class="'.$picture_area_width_array.'">';
                $picture = get_sub_field( 'picture' );
                if ( $picture ) {
                    echo '<img src=" '.$picture[url].' " alt=" '.$picture['alt'].'" />';
                }
                echo '</section>';
                echo '</div>';
                echo '</article>';
                
                }
            endif;

            // Simple text and picture element
            if ( get_row_layout() == 'simple_text_and_picture_element' ) :

                if ( have_rows( 'simple_text_and_picture' ) ) :

                echo '<article class="gridcontainer simple-text-picture-element">';
                while ( have_rows( 'simple_text_and_picture' ) ) : the_row();

			    // hide_simple ( value )
                $hide_simple_array = get_sub_field( 'hide_simple' );
                $picture_size_simple = get_sub_field( 'picture_size_simple' );
                $headline_simple = get_sub_field( 'headline_simple' );
			    if ( $hide_simple_array ){
                    }else{
                    
                    echo '<div class="wrap">';
                    echo '<section class="'.$picture_size_simple.'">';
                        $picture_simple = get_sub_field( 'picture_simple' );
                        if ( $picture_simple ) {
                            echo '<img src="'.$picture_simple[url].'" alt="'.$picture_simple[alt].'" />';
                        }
                    echo '</section>';
                    echo '<section class="simple-text-element">';
                        if ($headline_simple){
                            echo '<h2>'.$headline_simple.'</h2>';
                        }
			            the_sub_field( 'text_simple' );
			            $button_category = get_sub_field( 'button_category' );
                        $button_type = get_sub_field( 'button_type' );
                        $button_text = get_sub_field( 'button_text' );
                        $page_link = get_sub_field( 'page_link' );
                        $url_link = get_sub_field( 'url_link' );
                        if ( $button_text ){
                           if ($page_link){
                               echo '<a class="button '.$button_category.'" href="' .$page_link. '">'.$button_text.'</a>';
                            }else{
                                echo '<a class="button '.$button_category.'" href="' .$url_link. '">'.$button_text.'</a>';
                           }
                        }
                    echo '</section>';
                    echo '</div>';
                    
                }

                endwhile;
                echo '</article>';

                else :
                    // no rows found
                endif;

            endif;

        endwhile;
    else:
        // no layouts found
    endif;



    }
}

// Case introduction
add_action( 'genesis_after_entry', 'mono_case_introduction', 15 );
function mono_case_introduction() {

    if ( is_single() || is_page() ) {

        if ( have_rows( 'case_fields' ) ) :
        
        echo '<article class="gridcontainer case-introduction-element">';
        while ( have_rows( 'case_fields' ) ) : the_row();
            $hide_array = get_sub_field( 'hide' );
            $client_name = get_sub_field( 'client_name' );
            $qoute = get_sub_field( 'qoute' );
            $citation = get_sub_field( 'citation' );
            $button_type = get_sub_field( 'button_type' );
            $button_text = get_sub_field( 'button_text' );
            $page_link = get_sub_field( 'page_link' );
            $url_link = get_sub_field( 'url_link' );
            $image = get_sub_field( 'image' );

            // hide ( value )
            if ( $hide_array ){
            }else{
            echo '<div class="wrap">';
            echo '<section class="case-introduction-image">';
                if ( $image ) {
                    echo '<img src="'.$image[url].'" alt="'.$image[alt].'" />';
                }
            echo '</section>';
            echo '<section class="case-introduction-text">';
                echo '<div class="case-quoute-element">';
                if ($client_name){
                echo '<h1>'.$client_name.'</h1>';
                }
                if ($qoute){
                echo '<blockquote>'.$qoute.'</blockquote>';
                }
                if ($citation){
                    echo '<cite>'.$citation.'</cite>';
                }
                if ( $button_text ){
                    if ($page_link){
                    echo '<a class="button '.$button_category.'" href="' .$page_link. '">'.$button_text.'</a>';
                     }else{
                    echo '<a class="button '.$button_category.'" href="' .$url_link. '">'.$button_text.'</a>';
                    }
                 }
                 echo '</div>';
            echo '</section>';
            echo '</div>';
            /*
            the_sub_field( 'client_name' );
            the_sub_field( 'qoute' );
            the_sub_field( 'citation' );
            the_sub_field( 'button_type' );
            the_sub_field( 'button_text' );
            the_sub_field( 'page_link' );
            the_sub_field( 'url_link' );
            */
            

            }
        endwhile;
        echo '</article>';
    else :
        // no rows found
    endif;

    }
}

// Page introduction
add_action( 'genesis_after_entry', 'mono_page_introduction', 15 );
function mono_page_introduction() {

    if ( is_single() || is_page() ) {

        if ( have_rows( 'page_fields' ) ) :
        
        echo '<article class="gridcontainer page-introduction-element">';
        while ( have_rows( 'page_fields' ) ) : the_row();
            $hide_array = get_sub_field( 'hide' );
            $headline = get_sub_field( 'headline' );
            $text = get_sub_field( 'text' );
            $button_type = get_sub_field( 'button_type' );
            $button_text = get_sub_field( 'button_text' );
            $page_link = get_sub_field( 'page_link' );
            $url_link = get_sub_field( 'url_link' );
            $image = get_sub_field( 'image' );

            // hide ( value )
            if ( $hide_array ){
            }else{
            echo '<div class="wrap">';
            echo '<section class="page-introduction-image">';
                if ( $image ) {
                    echo '<img src="'.$image[url].'" alt="'.$image[alt].'" />';
                }
            echo '</section>';
            echo '<section class="page-introduction-text">';
                echo '<div class="page-quoute-element">';
                if ($headline){
                echo '<h1>'.$headline.'</h1>';
                }
                if ($text){
                    the_sub_field( 'text' );
                }
                if ( $button_text ){
                    if ($page_link){
                    echo '<a class="button '.$button_category.'" href="' .$page_link. '">'.$button_text.'</a>';
                     }else{
                    echo '<a class="button '.$button_category.'" href="' .$url_link. '">'.$button_text.'</a>';
                    }
                 }
                 echo '</div>';
            echo '</section>';
            echo '</div>';
            

            }
        endwhile;
        echo '</article>';
    else :
        // no rows found
    endif;

    }
}