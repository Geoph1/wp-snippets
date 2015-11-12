<?php
// Carcas for shortcodes
function name_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'par_1' => 'name_parametr',
        'par_2' => 'name_parametr'
    ), $atts));
    // html and other code for shortcode
    $output = '';
        $output .= do_shortcode($content);
    $output .= '';
    
    return $output;
}
add_shortcode ('text_shortcode', 'name_shortcode');

/*************************************************************/


/**
 * Columns, sections
 */
// Span Bootstrap Columns
function grid_column($atts, $content=null, $shortcodename ="")
{   
    extract(shortcode_atts(array(
        'class' => ''
    ), $atts));
    
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="'.$shortcodename.' '.$class.'">';
        $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('span1', 'grid_column');
add_shortcode('span2', 'grid_column');
add_shortcode('span3', 'grid_column');
add_shortcode('span4', 'grid_column');
add_shortcode('span5', 'grid_column');
add_shortcode('span6', 'grid_column');
add_shortcode('span7', 'grid_column');
add_shortcode('span8', 'grid_column');
add_shortcode('span9', 'grid_column');
add_shortcode('span10', 'grid_column');
add_shortcode('span11', 'grid_column');
add_shortcode('span12', 'grid_column');

// Section for page
function section_page_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'class' => '',
        'class2' => ''
    ), $atts));
    
    $output = '<section class="container '.$class.' '.$class2.'">';
        $output .= do_shortcode($content);
    $output .= '</section>';
    
    return $output;
}
add_shortcode ('section', 'section_page_shortcode');

//ROW Bootstrap
function row_bootstrap_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'class' => ''
    ), $atts));
    
    $output = '<div class="row '.$class.'">';
        $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}
add_shortcode ('row', 'row_bootstrap_shortcode');


/**
 * Boxes
 */
// Promo Box appic
function promo_box ($atts, $content=null) {
    extract(shortcode_atts(array(
        'link' => '#',
        'button' => 'Buy Template',
        'style' => 'info'
    ), $atts));
    
    $output .= '<div class="promobox-wrap'.$style.' button-wrap">';
        $output .= '<div class="promobox">';
            $output .= '<p class="pull-left">'.do_shortcode($content).'</p>';
            $output .= '<a href="'.$link.'" class="btn btn-'.$style.' btn-large-maxi pull-right">'.$button.'</a>';
        $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}
add_shortcode ('promo', 'promo_box');

// Action box
function action_box_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'title' => '',
        'button' => '',
        'link' => '#'
    ), $atts));
    // html and other code for shortcode
    $output = '<div class="grey-block-wrap">';
        $output .= '<div class="grey-block question-wrap text-center">';
            $output .= '<h4 class="font-style-20 bold upper">'.$title.'</h4>';
            $output .= '<p class="simple-text-12">'.do_shortcode($content).'</p>';
            $output .= '<a href="'.$link.'" class="btn btn-info btn-large-maxi">'.$button.'</a>';
        $output .= '</div>';
    $output .= '</div>';
    
    return $output;
}
add_shortcode ('action_box', 'action_box_shortcode');

/**
 * Alert boxes
 */
//Allert 1
function alert_window ($atts, $content=null) {
    $output = '<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode ('alert', 'alert_window');
//Allert 2
function alert_window2 ($atts, $content=null) {
    $output = '<div class="alert alert-notice fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode ('warning', 'alert_window2');
//Allert 3
function alert_window3 ($atts, $content=null) {
    $output = '<div class="alert alert-info fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode ('info', 'alert_window3');
//Allert 4
function alert_window4 ($atts, $content=null) {
    $output = '<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>';
    $output .= do_shortcode($content);
    $output .= '</div>';
    return $output;
}
add_shortcode ('success', 'alert_window4');


/**
 * Lists
 */
//List appic
function tick_list( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="camera_pag_ul">', do_shortcode($content));
	return $content; }
add_shortcode('list', 'tick_list');

// LIST Case Studies
function case_studies_shortcode ($atts, $content=null) {
    
    $output = '<div class="project-descript">';
        $output .= '<ul class="font-style-20 bold pink-text pink-list">';
            $output .= do_shortcode($content);
        $output .= '</ul>';
    $output .= '</div>';
    
    return $output;
}
add_shortcode ('case', 'case_studies_shortcode');
// ITEM Case Studies
function item_studies_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'title' => ''
    ), $atts));
    
    $output = '<li><span class="list-item-icon">&bull;</span>'.$title;
        $output .= '<p class="simple-text-14">';
            $output .= do_shortcode($content);
        $output .= '</p>';
    $output .= '</li>';
    
    return $output;
}
add_shortcode ('case_item', 'item_studies_shortcode');


/**
 * Accordions
 */

// Accordion 1
function accordion_shortcode1($atts, $content = null) {

	$output = '<div class="accordion style-2" id="accordion1">';
        $output .= do_shortcode($content);
	$output .= '</div>';
    
    $output .= '<script>
        $(document).ready(function(){
            $(".accordion").on("show hide", function (n) {
            $(n.target).siblings(".accordion-heading").find(".accordion-toggle").toggleClass("accordion-minus accordion-plus"); 
            });
        });
    </script>';

	return $output;
}
add_shortcode('accordion1', 'accordion_shortcode1');


// Accordion Item 1
function panel1_shortcode($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'title' => 'Title goes here',
            'num' => '',
            'open' => 'n'
	 ), $atts));

	$output = '<div class="accordion-group"><div class="accordion-heading">';
		$output .= ' <a class="accordion-toggle accordion-'.($open == 'y' ? 'minus' :'plus').'" data-toggle="collapse" data-parent="#accordion1" href="#collapse1-'.$num.'">';
			$output .= $title;
		$output .= '</a>';
	$output .= '</div>';

	$output .= '<div id="collapse1-'.$num.'" class="accordion-body collapse '.($open == 'y' ? 'in' :'').'">';
		$output .= '<div class="accordion-inner">';
			$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div></div>';

	return $output;

}
add_shortcode('panel1', 'panel1_shortcode');


// Accordion 2
function accordion_shortcode2($atts, $content = null) {

	$output = '<div class="accordion" id="accordion2">';
        $output .= do_shortcode($content);
	$output .= '</div>';
    
    $output .= '<script>
        $(document).ready(function(){
            $(".accordion").on("show hide", function (n) {
            $(n.target).siblings(".accordion-heading").find(".accordion-toggle").toggleClass("accordion-minus accordion-plus"); 
            });
        });
    </script>';

	return $output;
}
add_shortcode('accordion2', 'accordion_shortcode2');

// Accordion Item 2
function panel2_shortcode($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'title' => 'Title goes here',
            'num' => '',
            'open' => 'n'
	 ), $atts));

	$output = '<div class="accordion-group"><div class="accordion-heading">';
		$output .= ' <a class="accordion-toggle accordion-'.($open == 'y' ? 'minus' :'plus').'" data-toggle="collapse" data-parent="#accordion2" href="#collapse2-'.$num.'">';
			$output .= $title;
		$output .= '</a>';
	$output .= '</div>';

	$output .= '<div id="collapse2-'.$num.'" class="accordion-body collapse '.($open == 'y' ? 'in' :'').'">';
		$output .= '<div class="accordion-inner">';
			$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div></div>';

	return $output;

}
add_shortcode('panel2', 'panel2_shortcode');


// Accordion 3
function accordion3_shortcode($atts, $content = null) {

	$output = '<div class="accordion style-3" id="accordion3">';
        $output .= do_shortcode($content);
	$output .= '</div>';
    
    $output .= '<script>
        $(document).ready(function(){
            $(".accordion").on("show hide", function (n) {
            $(n.target).siblings(".accordion-heading").find(".accordion-toggle").toggleClass("accordion-minus accordion-plus"); 
            });
        });
    </script>';

	return $output;
}
add_shortcode('accordion3', 'accordion3_shortcode');

// Accordion Item 3
function panel3_shortcode($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'title' => 'Title goes here',
            'num' => '',
            'open' => 'n'
	 ), $atts));

	$output = '<div class="accordion-group"><div class="accordion-heading">';
		$output .= ' <a class="accordion-toggle accordion-'.($open == 'y' ? 'minus' :'plus').'" data-toggle="collapse" data-parent="#accordion3" href="#collapse3-'.$num.'">';
			$output .= $title;
		$output .= '</a>';
	$output .= '</div>';

	$output .= '<div id="collapse3-'.$num.'" class="accordion-body collapse '.($open == 'y' ? 'in' :'').'">';
		$output .= '<div class="accordion-inner">';
			$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div></div>';

	return $output;

}
add_shortcode('panel3', 'panel3_shortcode');



/**
 * Sliders
 */
// Carousel Raundabout Wrapper Appic
function roundabout_shortcode($atts, $content = null) {

	$output .= '<ul class="carousel" id="carousel">';
		$output .= do_shortcode($content);
	$output .= '</ul>';

	$output .= '<script>
	jQuery(document).ready(function() {
		jQuery("#carousel").roundabout({
		tilt: 0.4,
		minScale:0.5,
		minOpacity: 1,
		duration: 400,
		easing: "easeOutQuad",
		enableDrag: true,
		dropEasing: "easeOutBack", 
		dragFactor: 2,
		responsive:true,
		//focusBearing: 20
		});
	});';
	$output .= '</script>';

	return $output;
}
add_shortcode('roundaboute_carousel', 'roundabout_shortcode');
// Carousel Raundabout Item Appic
function roundabout_item_shortcode($atts, $content = null) {

	$output = '<li>';
	   $output .= do_shortcode($content);
	$output .= '</li>';

	return $output;
}
add_shortcode('item', 'roundabout_item_shortcode');
	

//BX Slider Wrapper
function bxslider_shortcode ($atts, $content=null) {
    
    $output = '<ul class="bxslider">';
        $output .= do_shortcode($content);
    $output .= '</ul>';
    
    	$output .= '<script>
	jQuery(document).ready(function($) {
		$(".bxslider").bxSlider({
          pager: false,
          minSlides: 2,
          maxSlides: 4,
          slideWidth: 270,
          slideMargin: 30
        });

        $(".bxslider").children().on("mouseenter",function(e) {	
           	$(".bxslider").children().removeClass("bxslider-active");		
        	$(".bxslider-description").children().removeClass("description-active");
            var number = parseInt( $(this).addClass("bxslider-active").data("order"));	
	        $(".bxslider-description").children().eq(--number).addClass("description-active");		
        });

	});';
	$output .= '</script>';
    
    return $output;
}
add_shortcode ('bxslider', 'bxslider_shortcode');
//BX Slider Item 
function bxslider_item_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'class_icon' => 'quick-support-icon',
        'num' => '1',
        'active' => ''
    ), $atts));
        
	$output = '<li class="'.$active.' text-center" data-order="'.$num.'">';
        $output .= '<div class="bxslider-li-wrap">';
           $output .= '<span class="'.$class_icon.'"></span>'; 
	       $output .= '<h3>'.do_shortcode($content).'</h3>';
        $output .= '</div>';
	$output .= '</li>';

	return $output;
}
add_shortcode('bx_item', 'bxslider_item_shortcode');
//BX Slider Wrapper Description
function bxdescription_shortcode ($atts, $content=null) {
    
    $output = '<ul class="bxslider-description">';
        $output .= do_shortcode($content);
    $output .= '</ul>';

    return $output;
}
add_shortcode ('bxdesc', 'bxdescription_shortcode');
//BX Slider Item Description 
function bxdescription_item_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'active' => ''
    ), $atts));
     
    $output = '<li class="'.$active.'"><p class="simple-text-14">';
        $output .= do_shortcode($content);
    $output .= '</p></li>';
    
    return $output;
}
add_shortcode ('item_desc', 'bxdescription_item_shortcode');

//BX Slider Item 2 (Case studies)
function bxslider_item_shortcode_2($atts, $content = null) {
    extract(shortcode_atts(array(
        'href' => '#'
    ), $atts));
        
	$output = '<li>';
        $output .= '<div class="view hover-effect-image">';
           $output .= do_shortcode($content); 
	       $output .= '<a href="'.$href.'" class="mask-no-border">';
                $output .= '<span class="mask-icon" title="Full Image">Full Image</span>';
           $output .= '</a>';
        $output .= '</div>';
	$output .= '</li>';

	return $output;
}
add_shortcode('bx_item2', 'bxslider_item_shortcode_2');

//Client Say Slider Wrapper
function client_say_slider_shortcode ($atts, $content=null) {
    
    $output = '<ul class="client-say-slider">';
        $output .= do_shortcode($content);
    $output .= '</ul>';
    
   	$output .= '<script>
	jQuery(document).ready(function($) {
		$(".client-say-slider").bxSlider({
          pager: false,
          minSlides: 1,
          maxSlides: 1,
          slideWidth: 1200
        });
	});';
	$output .= '</script>';
    
    return $output;
}
add_shortcode ('client_say', 'client_say_slider_shortcode');
// Client say item
function client_say_item_shortcode($atts, $content=null, $picture=null) {
    extract(shortcode_atts(array(
        'name' => 'Jhon Due',
        'text' => 'Put here text'
    ), $atts));
    
    $output = '<li>';
        $output .= '<div class="client-photo-wrap pull-left">';
            $output .= '<figure class="client-photo">';
                $output .= do_shortcode($content);
                $output .= '<figcaption>'.$name.'</figcaption>';
            $output .= '</figure>';
        $output .= '</div>';
        $output .= '<p class="simple-text-16"><em>'.$text.'</em></p>';
    $output .= '</li>';
    
    return $output;
}
add_shortcode ('client_item', 'client_say_item_shortcode');

//Team Slider Wrapper
function team_slider_shortcode ($atts, $content=null) {
    
    $output = '<ul class="appic-team">';
        $output .= do_shortcode($content);
    $output .= '</ul>';
    
   	$output .= '<script>
    	jQuery(document).ready(function($) {
    		$(".appic-team").bxSlider({
              pager: false,
              minSlides: 1,
              maxSlides: 4,
              slideWidth: 270,
              slideMargin: 30
            });
    	});';
	$output .= '</script>';
    
    return $output;
}
add_shortcode ('team', 'team_slider_shortcode');

//Team Item Slider Wrapper
function team_item_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'name' => 'John Due',
        'position' => 'CEO',
        'link_1' => '#',
        'link_2' => '#',
        'link_3' => '#',
        'link_4' => '#',
        'link_5' => '#',
        'link_6' => '#',
        'link_7' => '#',
        'text' => 'text'
    ), $atts));
    
    $output = '<li class="text-center">';
        $output .= '<div class="author-post-photo-wrap">';
            $output .= do_shortcode($content);
            $output .= '<a href="#" class="mask"></a>';
            $output .= '<div class="holder-author-photo"></div>';
        $output .= '</div>';
        $output .= '<div class="author-info border-triangle">';
            $output .= '<h4 class="simple-text-16 bold"><a href="#" class="link">'.$name.'</a></h4>';
            $output .= '<h5 class="simple-text-12 light-grey-text">'.$position.'</h5>';
            $output .= '<p class="simple-text-12">';
                $output .= $text;
            $output .= '</p>';
            $output .= '<ul class="social clearfix">';
                $output .= '<li><a href="'.$link_1.'" class="pinterest-icon"></a></li>';
                $output .= '<li><a href="'.$link_2.'" class="google-icon"></a></li>';
                $output .= '<li><a href="'.$link_3.'" class="linkedin-icon"></a></li>';
                $output .= '<li><a href="'.$link_4.'" class="twitter-icon"></a></li>';
                $output .= '<li><a href="'.$link_5.'" class="facebook-icon"></a></li>';
            $output .= '</ul>';
        $output .= '</div>';
    $output .= '</li>';
    
    return $output;
}
add_shortcode ('team_item', 'team_item_shortcode');

//Bootstrap slider
function carousel_shortcode ($atts, $content=null) {
    
    $output = '<div id="projectCarousel" class="carousel slide">';
        $output .= '<div class="carousel-inner image-border">';
            $output .= do_shortcode($content);
        $output .= '</div>';
        $output .= '<div class="carousel-control-holder text-center">';
            $output .= '<a class="left-control" href="#projectCarousel" data-slide="prev"></a>
                        <a class="right-control" href="#projectCarousel" data-slide="next"></a>';
        $output .= '</div>';
    $output .= '</div>';
    
    $output .= '<script>
	jQuery(document).ready(function($) {
		$(".carousel").carousel();
        $(".carousel img:first").addClass("active");
        $(".carousel img").addClass("item");
	});
    </script>';
    
    return $output;
}
add_shortcode ('carousel', 'carousel_shortcode');



/**
 * Shortcodes output posts
 */
 
function display_latest_post($atts) {
     extract( shortcode_atts( array(
         'numberofpost' => '1', 
         'categoryid' => '', 
     ), $atts ) );
     
     $output = '';
     
     $querystring = 'posts_per_page='.$numberofpost;
     if(strlen($categoryid) > 0)
         $querystring .= '&cat='.$categoryid;
    
     $query = new WP_Query( $querystring );
     
     while ( $query->have_posts() ) : $query->the_post();
         
          $output .= '<article class="posts">';
             $output .= '<div class="image-wrap pull-left">';
                if (class_exists('MultiPostThumbnails')) : 
                    $output .= MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'secondary-featured-thumbnail');
                endif;
                $output .= '<a class="mask" href="'.get_permalink().'"></a>';
             $output .= '</div>';
             $output .= '<h3><a class="link" href="'.get_permalink().'">'.get_the_title().'</a></h3>';
             $output .= '<p class="date light-grey-text">'.get_the_time('F j, Y').'</p>';
             $output .= '<p class="light-grey-text">'.get_the_excerpt();
             $output .= '<a href="'.get_permalink().'" class="posts-arrow"></a>';
             $output .= '</p>';
         $output .= '</article>';
     endwhile;
  
     
     wp_reset_postdata();
  
     
     return $output;
}
add_shortcode( 'dlp', 'display_latest_post' );


//Features
function features_shortcode($atts, $content = null) {

		extract(shortcode_atts(array(
				'num' => '3',
				'thumb' => 'true'
		), $atts));

		$testi = get_posts('post_type=features&orderby=post_date&numberposts='.$num);

		$output = '<ul class="home-services">';
		
		global $post;
		global $optima_string_limit_words;

		foreach($testi as $post){
				setup_postdata($post);
				$excerpt = get_the_excerpt();
				$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $attachment_url['0'];
				$image = aq_resize($url, 220, 220, true);

				$output .= '<li>';
						if ($thumb == 'true') {
							if ( has_post_thumbnail($post->ID) ){
								$output .= '<figure class="img-holder">';
								$output .= '<a href="'.get_permalink($post->ID).'"><img src="'.$image.'" alt="'.get_the_title($post->ID).'"/></a>';
								$output .= '</figure>';
							}
						}
						$output .= '<h3><a href="'.get_permalink($post->ID).'">';
							$output .= get_the_title($post->ID);
						$output .= '</a></h3>';
						
						$output .= $excerpt;
						
				$output .= '</li>';

		}

		$output .= '</ul>';

		return $output;

}
add_shortcode('features', 'features_shortcode');

	
//Recent Posts
function shortcode_recent_posts($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'type' => 'post',											 
				'num' => '5',
				'thumb_width' => '160',
				'thumb_height' => '120'
		), $atts));

		$output = '<ul class="recent-posts">';

		global $post;
		global $optima_string_limit_words;
		
		$args = array(
			'post_type' => $type,
			'numberposts' => $num,
			'orderby' => 'post_date',
			'order' => 'DESC'
		);

		$latest = get_posts($args);
		
		foreach($latest as $post) {
				setup_postdata($post);
				$excerpt = get_the_excerpt();
				$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $attachment_url['0'];
				$image = aq_resize($url, $thumb_width, $thumb_height, true);

				$output .= '<li class="clearfix">';


				if ( has_post_thumbnail($post->ID) ){
					$output .= '<figure class="featured-thumbnail"><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
					$output .= '<img  src="'.$image.'"/>';
					$output .= '</a></figure>';
				}
				$output .= '<h5><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
						$output .= get_the_title($post->ID);
				$output .= '</a></h5>';

				$output .= '<span class="meta">';
						$output .= '<span class="post-date">';
							$output .= get_the_time( get_option( 'date_format' ) );
						$output .= '</span>';
						$output .= '<span class="post-comments fright">';
							$output .= '<a href="'.get_comments_link($post->ID).'">';
								$output .= get_comments_number($post->ID);
							$output .= '</a>';
						$output .= '</span>';
				$output .= '</span>';

				$output .= '<div class="excerpt">';
					$output .= optima_string_limit_words($excerpt,20);
				$output .= '</div>';

				$output .= '<a href="'.get_permalink($post->ID).'" class="button" title="'.get_the_title($post->ID).'">';
				$output .= 'Read More';
				$output .= '</a>';
				
			$output .= '</li>';
				
		}
				
		$output .= '</ul>';
		return $output;
		
}
add_shortcode('recent_posts', 'shortcode_recent_posts');

	
//Tag Cloud
function shortcode_tags($atts, $content = null) {

	extract(shortcode_atts(array(
		'color' => 'color1',
		'count' => '0'
   ), $atts));

	$output = '<ul class="inline tags-wrap">';
        $output .= '<li>';
        	$tags = wp_tag_cloud('smallest=8&largest=8&format=array&number='.$count);
        	foreach($tags as $tag){
        			$output .= $tag.' ';
        	}
        $output .= '<li>';
    $output .= '</ul>';
    
	return $output;
}
add_shortcode('tags', 'shortcode_tags');


/**
 *
 * HTML Shortcodes
 *
 */

// Quotes
function quote_shortcode($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'author' => ''
	 ), $atts));

		$output = '<blockquote class="text-right">';
		
		$output .= '<p class="simple-text-14 bold dark-grey-text">'.$author.'</p>';
			$output .= '<p class="simple-text-14 dark-grey-text"><em>';
				$output .= do_shortcode($content);
			$output .= '</em></p>';
        
        $output .= '</blockquote>';

	return $output;
}
add_shortcode('quote', 'quote_shortcode');

// Clear
function shortcode_clear() {
	return '<div class="clear"></div>';
}
add_shortcode('clear', 'shortcode_clear');


// Tabs
function tabs_shortcode($atts, $content = null) {
    extract (shortcode_atts (
        array(
            'class' => ''
    ), $atts));
	
	$output = '<ul class="nav nav-tabs" id="myTab">';

    	//Create unique ID for this tab set
    	//$id = rand();
    
    	//Build tab menu
    	$numTabs = count($atts);
    
    	for($i = 1; $i <= $numTabs; $i++){
    	  $output .= '<li><a href="#tab'.$i.'" data-toggle="tab">'.$atts['tab'.$i].'</a></li>';
    	}

	$output .= '</ul>';
	
	$output .= '<div class="tab-content">';

    	//Build content of tabs
    	$i = 1;
    	$tabContent = do_shortcode($content);
    	$find = array();
    	$replace = array();
    	foreach($atts as $key => $value){
    	  $find[] = '['.$key.']';
    	  $find[] = '[/'.$key.']';
    	  $replace[] = '<div id="tab'.$i.'" class="tab-pane">';
    	  $replace[] = '</div><!-- .tab (end) -->';
    			$i++;
    	}
    
    	$tabContent = str_replace($find, $replace, $tabContent);
    
    	$output .= $tabContent;

	$output .= '</div><!-- .tab-content (end) -->';
    
    $output .= '<script>
    
        $(document).ready(function() {

        $(".span6").each(function(){
            $(this).find("#myTab li:first").addClass("active");
            $(this).find(".tab-pane:first").addClass("active");
        });
          
        });
    </script>';

	return $output;

}
add_shortcode('tabs', 'tabs_shortcode');

// Tabs 2
function tabs2_shortcode($atts, $content = null) {
    extract (shortcode_atts (
        array(
            'class' => ''
    ), $atts));
	
	$output = '<div class="tabbable tabs-left">';
    $output .= '<ul class="nav nav-tabs" id="myTab-left">';

    	//Create unique ID for this tab set
    	$id = rand();
    
    	//Build tab menu
    	$numTabs = count($atts);
    
    	for($i = 1; $i <= $numTabs; $i++){
    	  $output .= '<li><a href="#tab-'.$id.'-'.$i.'-left" data-toggle="tab">'.$atts['tab'.$i].'</a></li>';
    	}

	$output .= '</ul>';
	
	$output .= '<div class="tab-content">';

    	//Build content of tabs
    	$i = 1;
    	$tabContent = do_shortcode($content);
    	$find = array();
    	$replace = array();
    	foreach($atts as $key => $value){
    	  $find[] = '['.$key.']';
    	  $find[] = '[/'.$key.']';
    	  $replace[] = '<div id="tab-'.$id.'-'.$i.'-left" class="tab-pane '.$class.'">';
    	  $replace[] = '</div><!-- .tab (end) -->';
    			$i++;
    	}
    
    	$tabContent = str_replace($find, $replace, $tabContent);
    
    	$output .= $tabContent;

	$output .= '</div><!-- .tab-content (end) -->';
    $output .= '</div>';
    
    $output .= '<script>
    
        $(document).ready(function() {
            
        $(".span6").each(function(){
            $(this).find("#myTab-left li:first").addClass("active");
            $(this).find(".tab-pane:first").addClass("active");
        });    
        
        $("#myTab-left a").click(function (e) {
            e.preventDefault();
            $(this).tab("show");
        })
        
        });
    </script>';

	return $output;

}
add_shortcode('tabs2', 'tabs2_shortcode');


// Pricing Tables
function pricing_tables_shortcode($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'cols' => '5'
	 ), $atts));

	if($cols=='5') {
		$cols = 'five-cols';
	} elseif ($cols=='4') {
		$cols = 'four-cols';
	} else{
		$cols = 'three-cols';
	}

	$output = '<section class="pricing-tables clearfix text-center '.$cols.'">';
	$output .= do_shortcode($content);
	$output .= '</section>';

	return $output;
}
add_shortcode('pricing_tables', 'pricing_tables_shortcode');

// Pricing Column
function pricing_col_shortcode($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'price' => '$ 0',
			'name' => '',
			'field_1' => '',
			'field_2' => '',
			'field_3' => '',
			'field_4' => '',
			'field_5' => '',
			'field_6' => '',
			'field_7' => '',
			'field_8' => '',
			'field_9' => '',
			'field_10' => '',
			'field_11' => '',
			'field_12' => '',
			'link_txt' => '',
			'link_url' => '', 
            'add_class' => '',
            'head_text' => '',
            'body_text' => '',
            'btn_style' => ''
            
	), $atts));

	$output = '<div class="pricing-column pull-left text-center '.$add_class.'">';
		
			$output .= '<header class="pr-head">';
                $output .= '<h3 class="font-style-24 '.$head_text.' ">'.$name.'</h3>';
				$output .= '<h4 class="price">'.$price.'</h4>';
			$output .= '</header>';

			$output .= '<div class="pr-body">';
				$output .= '<ul class="pr-features '.$body_text.'">';
					if($field_1) {
						$output .= '<li>'.$field_1.'</li>';
					}
					if($field_2) {
						$output .= '<li>'.$field_2.'</li>';
					}
					if($field_3) {
						$output .= '<li>'.$field_3.'</li>';
					}
					if($field_4) {
						$output .= '<li>'.$field_4.'</li>';
					}
					if($field_5) {
						$output .= '<li>'.$field_5.'</li>';
					}
					if($field_6) {
						$output .= '<li>'.$field_6.'</li>';
					}
					if($field_7) {
						$output .= '<li>'.$field_7.'</li>';
					}
					if($field_8) {
						$output .= '<li>'.$field_8.'</li>';
					}
					if($field_9) {
						$output .= '<li>'.$field_9.'</li>';
					}
					if($field_10) {
						$output .= '<li>'.$field_10.'</li>';
					}
					if($field_11) {
						$output .= '<li>'.$field_11.'</li>';
					}
					if($field_12) {
						$output .= '<li>'.$field_12.'</li>';
					}
				$output .= '</ul>';
                $output .= '<a href="'.$link_url.'" class="btn btn-large '.$btn_style.'">';
					$output .= $link_txt;
				$output .= '</a>';
			$output .= '</div>';

	$output .= '</div>';

	return $output;

}
add_shortcode('pricing_col', 'pricing_col_shortcode');


// Button
function button_shortcode($atts, $content = null) {
	extract(shortcode_atts(
		array(
			'style' => 'info',
            'link' => '#',
		    'text' => 'Button',
			'size' => 'large',
			'target' => '_self'
   ), $atts));
    
	$output =  '<a href="'.$link.'" class="btn btn-'.$size.' btn-'.$style.'" target="'.$target.'">';
	   $output .= $text;
	$output .= '</a>';

   return $output;

}
add_shortcode('button', 'button_shortcode');


// Dropcaps
function dropcap_shortcode($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'style' => '1'
	), $atts));

	$output = '<p class="dropcaps'.$style.' small-grey-text">';
	   $output .= do_shortcode($content);
	$output .= '</p>';

	return $output;
}
add_shortcode('dropcap', 'dropcap_shortcode');


// Tooltip
function tooltip_shortcode($atts, $content = null) {

	extract(shortcode_atts(
		array(
			'color' => '',
			'title' => 'Tooltip'
	), $atts));

	$output = '<a href="#" class="custom-tooltip '.$color.'-tooltip pull-left" title="'.$title.'">';
		$output .= do_shortcode($content);
	$output .= '</a>';

	return $output;
}
add_shortcode('tooltip', 'tooltip_shortcode');


// Image for posts
function image_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'order' => 'left',
        'width' => '260',
        'height' => '260'
    ), $atts));
    // get url path for image into post ???
    $thumb = do_shortcode($content);
    // $img_url = get_attachment_link($thumb); //get img URL
    // $image = aq_resize( $img_url, $width, $height, true ); //resize & crop img
    
    //$output = '<img src="'.$image.'" class="pull-'.$order.' image-border" width="'.$width.'" height="'.$height.'">';
    $output = '<div class="pull-'.$order.' image-border">';
        $output .= $thumb;
    $output .= '</div>';
    return $output;
}
add_shortcode ('image', 'image_shortcode');


/**
 * Timeline
 */
 
function timeline_shortcode ($atts, $content=null) {
    
    $output = '<div class="timeline"><div class="dateline">';
        $output .= do_shortcode($content);
    $output .= '</div></div>';
    
    $output .= '<script>
                $(document).ready(function() {
                
                $( ".timeline" ).timeLineG({
                	maxdis:280,
                	mindis:100,
                	wraperClass:"timeline-wrap"
                });
                
                });
            </script>';
    
    return $output;
}
add_shortcode ('timeline', 'timeline_shortcode');

function year_timeline_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'x' => '2013'
    ), $atts));
    
    $output = '<div class="year"><span class="sircle"></span>'.$x.'</div>';
    
    return $output;
}
add_shortcode ('year', 'year_timeline_shortcode');

// Item timeline
function time_item_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'date' => '',
        'position' => 'bottom',
        'month' => ''
    ), $atts));
        
        $output = '<div data-date="'.$date.'" class="event '.$position.'"><div class="block-e"><h5 class="simple-text-16 bold">'.$month.'</h5><p class="simple-text-12"><em>';
            $output .= do_shortcode($content);
        $output .= '</em></p></div><span class="sircle"></span> <span class="line"></span></div>';
        
    return $output;
}
add_shortcode ('time_item', 'time_item_shortcode');

/**
 * Masonry gallery
 */
// Container gallery masonry
function random_gallery_shortcode ($atts, $content=null) {
   
    $output = '<div id="container" class="random-style">';
        $output .= do_shortcode($content);
    $output .= '</div>';
    
    $output .= '
    <script>
    $(document).ready(function() {
        var $container = $("#container");
        $container.masonry({
        	columnWidth: container.querySelector(".grid1"),
        	itemSelector: ".item-gallery",
        	gutter: 12			
        });
        
        //Colorbox for gallery
        $(".item-gallery a").colorbox({"data-rel":"colorbox1"});
    
    });
    </script>';
    
    return $output;
}
add_shortcode ('random', 'random_gallery_shortcode');

// Item gallery masonry
function random_item_shortcode ($atts, $content=null) {
    extract(shortcode_atts(array(
        'text' => 'description',
        'border_color' => 'grey',
        'number_width' => '',
        'number_height' => '',
        'position_text' => '',
        'link' => ''
    ), $atts));
        
    $output = '<div class="item-gallery grid'.$number_width.' grid'.$number_height.'-h">';
        if ($number_width == 1) {
            $output .= '<a href="'.$link.'" data-rel="colorbox1" class="'.$border_color.'-img view hover-effect-image">';
            $output .= do_shortcode($content);
            $output .= '<div class="mask-no-border hidden-phone">';
                $output .= '<span class="mask-icon" title="Full Image">Full Image</span>';
            $output .= '</div>';
        $output .= '</a>';
            }
        else {
        $output .= '<a href="'.$link.'" data-rel="colorbox1" class="'.$border_color.'-img position-'.$position_text.'">';
            $output .= do_shortcode($content);
            $output .= '<p class="hidden-phone">'.$text.'</p>';
            $output .= '<div class="arrow-link-wrap text-center hidden-phone"><span class="arrow-link"></span></div>';
        $output .= '</a>';
        }
    $output .= '</div>';
    
    return $output;
}
add_shortcode ('image_item', 'random_item_shortcode');

?>