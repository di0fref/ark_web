<?php

//Add layout pieces
add_action('wp_head', 'cpotheme_section_layout', 9);
function cpotheme_section_layout($data){ 
	add_action('cpotheme_top', 'cpotheme_top_menu');
	add_action('cpotheme_header', 'cpotheme_logo');
	add_action('cpotheme_header', 'cpotheme_menu_toggle');
	add_action('cpotheme_header', 'cpotheme_menu');
	add_action('cpotheme_title', 'cpotheme_page_title');
	add_action('cpotheme_title', 'cpotheme_breadcrumb');
	add_action('cpotheme_subfooter', 'cpotheme_subfooter');
	add_action('cpotheme_footer', 'cpotheme_footer_menu');
	add_action('cpotheme_footer', 'cpotheme_footer');
	
	//Add homepage sections
	$order = apply_filters('cpotheme_homepage_order', cpotheme_get_option('home_order'));
	$array = explode(',', $order);
	$count = 100;
	$hook = 'cpotheme_before_main';
	foreach($array as $current_value){
		if(trim($current_value)){
			if($current_value == 'content'){
				$hook = 'cpotheme_after_main';
				$count = 100;
			}elseif(function_exists('cpotheme_section_'.$current_value)){
				add_action($hook, 'cpotheme_section_'.$current_value, $count);
			}
			$count += 100;
		}
	}
}


//Displays the homepage slider
if(!function_exists('cpotheme_section_slider')){
	function cpotheme_section_slider(){
		if(defined('CPOTHEME_USE_SLIDES') && CPOTHEME_USE_SLIDES == true){
			if(is_front_page()){
				get_template_part('template-parts/homepage', 'slider');
			}
		}
	}
}


//Displays the homepage features
if(!function_exists('cpotheme_section_features')){
	function cpotheme_section_features(){
		if(defined('CPOTHEME_USE_FEATURES') && CPOTHEME_USE_FEATURES == true){
			if(is_front_page()){
				get_template_part('template-parts/homepage', 'features');
			}
		}
	}
}


//Displays the homepage featured posts and pages
if(!function_exists('cpotheme_section_featured')){
	function cpotheme_section_featured(){
		if(defined('CPOTHEME_USE_PAGES') && CPOTHEME_USE_PAGES == true){
			if(is_front_page()){
				get_template_part('template-parts/homepage', 'featured');
			}
		}
	}
}


//Displays the homepage tagline
if(!function_exists('cpotheme_section_tagline')){
	function cpotheme_section_tagline(){
		if(is_front_page()){
			get_template_part('template-parts/homepage', 'tagline');
		}
	}
}


//Displays the homepage portfolio
if(!function_exists('cpotheme_section_portfolio')){
	function cpotheme_section_portfolio(){
		if(defined('CPOTHEME_USE_PORTFOLIO') && CPOTHEME_USE_PORTFOLIO == true){
			if(is_front_page()){
				get_template_part('template-parts/homepage', 'portfolio');
			}
		}
	}
}


//Displays the homepage products from WC or EDD
if(!function_exists('cpotheme_section_products')){
	function cpotheme_section_products(){
		if(defined('CPOTHEME_USE_PRODUCTS') && CPOTHEME_USE_PRODUCTS == true){
			if(is_front_page()){
				get_template_part('template-parts/homepage', 'products');
			}
		}
	}
}


//Displays the homepage services
if(!function_exists('cpotheme_section_services')){
	function cpotheme_section_services(){
		if(defined('CPOTHEME_USE_SERVICES') && CPOTHEME_USE_SERVICES == true){
			if(is_front_page()){
				get_template_part('template-parts/homepage', 'services');
			}
		}
	}
}


//Displays the homepage team
if(!function_exists('cpotheme_section_team')){
	function cpotheme_section_team(){
		if(defined('CPOTHEME_USE_TEAM') && CPOTHEME_USE_TEAM == true){
			if(is_front_page()){
				get_template_part('template-parts/homepage', 'team');
			}
		}
	}
}


//Displays the homepage testimonials
if(!function_exists('cpotheme_section_testimonials')){
	function cpotheme_section_testimonials(){
		if(defined('CPOTHEME_USE_TESTIMONIALS') && CPOTHEME_USE_TESTIMONIALS == true){
			if(is_front_page()){
				get_template_part('template-parts/homepage', 'testimonials');
			}
		}
	}
}


//Displays the homepage clients
if(!function_exists('cpotheme_section_clients')){
	function cpotheme_section_clients(){
		if(defined('CPOTHEME_USE_CLIENTS') && CPOTHEME_USE_CLIENTS == true){
			if(is_front_page()){
				get_template_part('template-parts/homepage', 'clients');
			}
		}
	}
}