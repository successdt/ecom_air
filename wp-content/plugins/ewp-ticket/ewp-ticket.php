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