<?php 
/*
Plugin Name: EWP  ticket
Plugin URI: http://ecomwebpro.com
Description: manage tickets booking
Version: 0.1.1
Author: EWP company
Author URI: http://ecomwebpro.com
License: GPL2
*/
function show_ticket_selector(){
	$string = '
		<div class="ticket-wrapper">
			<div class="ticket-selector">
				shit
			</div>
		</div>	
	
	';
	return $string;
}

function register_shortcode(){
	add_shortcode('chon-ve', 'show_ticket_selector');
}

add_action('init', 'register_shortcode');
?>
		<div class="ticket-wrapper">
			<div class="ticket-selector">
				shit
			</div>
		</div>