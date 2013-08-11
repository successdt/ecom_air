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

add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );

/**
 * Enqueue plugin style-file
 */
function prefix_add_my_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}

function show_ticket_selector(){
	$string = '
		<div class="ticket-wrapper">
			<div class="ticket-title">
				<h1>Đặt vé máy bay</h1>
			</div>
			<div class="ticket-content">
				<div class="one-second">
					<span class="start-title">Điểm đi</span>
					<span class="start-value"></span>
					<span>Ngày đi</span>
					<span>
						
					</span>
				</div>
				<div class="one-second">
					<span class="start-title">Điểm đi</span>
						<span class="start-value"></span>
						<span>Ngày đi</span>
						<span>
						
					</span>
				</div>
			</div>
			<div class="ticket-content">
				<table>
					<tr>
						<td>Người lớn</td>
						<td>
							
						</td>
						<td class="select-desc">
							(Từ 12 tuổi trở lên)
						</td>
					</tr>
					<tr>
						<td>Trẻ em</td>
						<td>
							
						</td>
						<td class="select-desc">
							(Từ 2 đến 11 tuổi)
						</td>
					</tr>
					<tr>
						<td>Em bé</td>
						<td>
							
						</td>
						<td class="select-desc">
							(Dưới 2 tuổi)
						</td>
					</tr>
				</table>
			</div>
			<div class="ticket-submit">
				<button>Tìm chuyến bay</button>
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