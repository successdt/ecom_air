<?php 
/*
Plugin Name: EWP  ticket
Plugin URI: http://ecomwebpro.com
Description: manage tickets booking
Version: 1.0.0
Author: EWP company
Author URI: http://ecomwebpro.com
License: GPL2
*/
require_once('ewp-ticket_admin.php');

/**
 * install plugin
 */

global $ewp_db_version;
$ewp_db_version = '1.0.1';

function ewp_install() {
    global $wpdb;
    global $ewp_db_version;
    
    $table_name = $wpdb->prefix . "book_ticket";
    $contact_table = $wpdb->prefix . "ewp_contact";
    
    $sql = "CREATE TABLE $table_name (
    		id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        	name VARCHAR(100),
        	email VARCHAR(100),
        	phone VARCHAR(25),
        	from_city VARCHAR(100),
        	to_city VARCHAR(100),
        	go_date DATE,
        	comeback_date DATE,
        	adult_count INT(2),
        	kid_count INT(2),
        	infant_count INT(2),
            booking_date DATE,
            status VARCHAR(50)
        );
		CREATE TABLE $contact_table (
    		id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        	email VARCHAR(100)
        );
		";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option("ewp_db_version", $ewp_db_version);
    update_option("ewp_db_version", $ewp_db_version);
}
register_activation_hook( __FILE__, 'ewp_install' );

function ewp_update_db_check() {
    global $ewp_db_version;
    if (get_site_option( 'ewp_db_version' ) != $ewp_db_version) {
        ewp_install();
    }
}
add_action( 'plugins_loaded', 'ewp_update_db_check' );


add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );

/**
 * Enqueue plugin style-file
 */
function prefix_add_my_stylesheet() {
	//add script
	wp_enqueue_script('ewp', plugins_url('js/ewp.js', __FILE__), array('jquery'));
	wp_enqueue_script('ewp', plugins_url('fancybox/jquery.fancybox-1.3.4.pack.js', __FILE__), array('jquery'));
	
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('css/style.css', __FILE__) );
    wp_register_style( 'prefix-style', plugins_url('fancybox/jquery.fancybox-1.3.4.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}

function show_ticket_selector(){
	$string = '
		<input type="hidden" id="ajax-url" value="' . admin_url('admin-ajax.php') .'">
		<div class="ticket-wrapper">
			<div class="ticket-title">
				<h1>Đặt vé máy bay</h1>
			</div>
			<div class="from-popup ticket-popup">
				<div class="popup-title">Lựa chọn thành phố hoặc sân bay xuất phát</div>
				<div class="popup-content">
					' . prepare_airport() . '
				</div>
			</div>
			<div class="to-popup ticket-popup">
				<div class="popup-title">Lựa chọn thành phố hoặc sân bay đến</div>
				<div class="popup-content">
					' . prepare_airport() . '
				</div>
			</div>
			<div class="ticket-content">
				<div class="one-second">
					<div class="start-title">Điểm đi</div>
					<div class="start-value">Hà Nội</div>
					<input name="from" type="hidden" id="from" value="Hà Nội">
					<div>Ngày đi</div>
					<div>
						<select name="start-date">
							' . prepare_date() . '
						</select>
						<select name="start-month">
							' . prepare_month() . '
						</select>						
					</div>
				</div>
				<div class="one-second">
					<div class="start-title">Điểm đến</div>
					<div class="finish-value">Hồ Chí Minh</div>
					<input name="to" type="hidden" id="to" value="Hồ Chí Minh">
					<div>Ngày về</div>
					<div>
						<select name="comeback-date">
							<option value=""></option>
							' . prepare_date() . '
						</select>
						<select name="comeback-month">
							<option value=""></option>
							' . prepare_month() . '
						</select>
					</div>
				</div>
			</div>
			<div class="ticket-content">
				<table>
					<tr>
						<td>Người lớn</td>
						<td>
							<select name="adult-count">
							' . prepare_ranger(1, 99) . '
							</select>
						</td>
						<td class="select-desc">
							(Từ 12 tuổi trở lên)
						</td>
					</tr>
					<tr>
						<td>Trẻ em</td>
						<td>
							<select name="kid-count">
							' . prepare_ranger(0, 99) . '
							</select>
						</td>
						<td class="select-desc">
							(Từ 2 đến 11 tuổi)
						</td>
					</tr>
					<tr>
						<td>Em bé</td>
						<td>
							<select name="infant-count">
							' . prepare_ranger(0, 4) . '
							</select>
						</td>
						<td class="select-desc">
							(Dưới 2 tuổi)
						</td>
					</tr>
				</table>
			</div>
			<div class="ticket-submit">
				<a href="#info-form" id="show-form">Đặt vé</a>
				<div style="display:none">
					<div id="info-form">
						<img src="' . get_bloginfo('url') . '/wp-content/uploads/2013/08/call_to_book.png" alt="hot-line"/>
						<h6>Hãy điền thông tin của bạn để chúng tôi có thể liên hệ:</h6>
						<table>
							<tr>
								<td>Tên của bạn <span class="required">*</span></td>
								<td><input name="name" /></td>
							</tr>
							<tr>
								<td>Địa chỉ email </td>
								<td><input name="email" /></td>
							</tr>
							<tr>
								<td>Số điện thoại <span class="required">*</span></td>
								<td><input name="phone" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="ticket-submit">
									<button>
                                        <span>Đặt vé</span>
                                        <img src="' . plugins_url('ewp-ticket/images/loading.gif') .'" style="display:none;"/>
                                    </button>
								</td>
							</tr>
						</table>
					</div>				
				</div>

			</div>
		</div>
	
	';
	return $string;
}

function show_home_banner($atts){
	extract(shortcode_atts(array(
		'src' => '',
		'alt' => '',
		'url' => '' 
	), $atts));
	if($src){
		$str = '<div class="home-banner">';
		if($url){
			$str .= 
				'<a href="' . $url . '">
					<img src="' . $src . '" alt="' . $alt . '" />
			</a>';
			} else {
				$str .= '<img src="' . $src . '" alt="' . $alt .'" />';
			}
		$str .= '</div>';		
	}
	return $str;
}

function show_hotline($atts){
	extract(shortcode_atts(array(
		'hotline1' => '',
		'hotline2' => ''
	), $atts));
	$str = 
		'<div class="info-hotline home-block">
			<div id="info-reg">
				<div class="title">
					Đăng ký nhận bản tin khuyến mãi
				</div>
				<div class="form">
					<input name="receive-email" class="receive-email" />
					<button class="btn-blue">Đăng ký</button>
				</div>
			</div>
			<div class="hotline">
				<div class="col">
					<img src="' . get_bloginfo('url') . '/wp-content/uploads/2013/08/hotline1.png" />
				</div>
				<div class="col">
					<img alt="01288888618" src="' . get_bloginfo('url') . '/wp-content/uploads/2013/08/hotline_no.png" />
			';
	/*
	if($hotline1){
		$str .= '<span class="hotline-number">' . $hotline1 . '</span>';
	}
	if($hotline2){
		$str .= '<span class="hotline-number">' . $hotline2 . '</span>';
	}
	*/
	$str .= '
	
				</div>
			</div>
		</div>';
	return $str;
}
function booking_hint($atts, $content = null){
	$str = 
		'<div class="booking-hint home-cell">
			<h5>Hướng dẫn đặt vé</h5>
			<div class="text">' . $content . '</div>
		</div>';
	return $str;
}
function promo_news(){
	$str = 
		'<div class="promo-news home-cell">
			<h5>Tin khuyến mại</h5>';
	if(function_exists('get_vsrp')){
		$str .= get_vsrp();
	}
	$str .= 
		'</div>';
	return $str;	
}
function home_address($atts, $content = null){
	extract(shortcode_atts(array(
		'latitude' => '',
		'longitude' => ''
	), $atts));
	$str = 
		'<div class="home-cell home-address">
		';	
	if($content){
		$str .= '<div class="text">' . $content . '</div>';
	}
	if($latitude && $longitude){
		$str .= '<input type="hidden" id="lat" value="' . $latitude . '">';
		$str .= '<input type="hidden" id="lat" value="' . $longitude . '">';
		$str .= 
			'<div class="map">
				<iframe width="272" height="272" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=vi&amp;geocode=&amp;q=21.0301444,105.7845998&amp;aq=&amp;sll=15.984434,108.273697&amp;sspn=0.215192,0.407181&amp;ie=UTF8&amp;t=m&amp;ll=21.030113,105.784607&amp;spn=0.021791,0.02326&amp;z=14&amp;output=embed"></iframe>
			</div>';
	}
	$str .= '</div>';
	return $str;
}
function facebook_page($atts){
	extract(shortcode_atts(array(
		'url' => ''
	), $atts));
	$str .= '<div class="facebook-page home-cell">';
	if($url){
		$str .= '<iframe src="' . $url . '" scrolling="no" frameborder="0" style="border: none; overflow: hidden; width: 468px; height: 275px;" allowtransparency="true"></iframe>';	
	}
	$str .= '</div>';
	return $str;
}
function register_shortcode(){
	add_shortcode('chon-ve', 'show_ticket_selector');
	add_shortcode('home-banner', 'show_home_banner');
	add_shortcode('hotline', 'show_hotline');
	add_shortcode('booking-hint', 'booking_hint');
	add_shortcode('promo-news', 'promo_news');
	add_shortcode('home-address', 'home_address');
	add_shortcode('facebook-page', 'facebook_page');
}

add_action('init', 'register_shortcode');

function prepare_date(){
	$str = '';
	for($i = 1; $i < 32; $i++){
		$str .= '<option value="' . $i . '">' . $i . '</option>';
	}
	return $str;
}
function prepare_month(){
	$str = '';
	for($i = 0; $i < 12; $i++){
		$month = date('m/Y', strtotime('+' . $i . ' months', time()));
		//var_dump(date('Y/m/d', time()));
		$str .= '<option value="' . $month . '">Tháng ' . $month . '</option>';
	}
	return $str;
}
function prepare_ranger($start, $end){
	$str = '';
	for($i = $start; $i <= $end; $i++){
		$str .= '<option value="' . $i . '">' . $i . '</option>';
	}
	return $str;	
}
function get_list_airport(){
	$cities = array(
		'vietnam' => array(
			'Hà Nội',
			'Hải Phòng',
			'Điện Biên',
			'Thanh Hóa',
			'Vinh',
			'Huế',
			'Đồng Hới',
			'Đà Nẵng',
			'Pleiku',
			'Tuy Hòa',
			'Hồ Chí Minh',
			'Nha Trang',
			'Đà Lạt',
			'Phú Quốc',
			'Tam Kỳ',
			'Qui Nhơn',
			'Côn Đảo',
			'Ban Mê Thuột',
			'Rạch Giá',
			'Cà Mau'
		),
		'australia' => array(
			'Adelaide',
			'Ayers Rock(Uluru)',
			'Ballina Byron',
			'Brisbane',
			'Cairns',
			'Darwin',
			'Gold Coast',
			'Hamitton island',
			'Hayman island',
			'Hobart',
			'Launceston',
			'Mackay',
			'Melbourne',
			'Newscastle',
			'Perth',
			'Sunshine Coast',
			'Sydney',
			'Townsville',
			'Witsunday Coast'
			
		),
		'cambodia' => array(
			'Phnom Penh',
			'Siem Reap'
		),
		'china' => array(
			'Beijing',
			'Guangzhou',
			'Haikou',
			'Hangzhou',
			'Shantou'
		),
	);
	return $cities;
}

function prepare_airport(){
	$countries = get_list_airport();
	$str = '
		<table>
			<tr>
				<td>
	';
	$listAirport = array();
	$i = 0;
	foreach($countries as $country => $cities){
		$i++;
		if(!($i % 13)){
			$str .= '</td><td>';
		}
		$str .= '<span class="header"><h6>' . $country .'</h6></span>';
		
		foreach($cities as $city){
			$i++;
			if(!($i % 13)){
				$str .= '</td><td>';
			}
			$str .= '<span><a href="javascript:void(0)">' . $city . '</a></span>';
		}
	}
	$str .= '
				</td>
			</tr>
		</table>	
	';
	return $str;
}
/**
 * save info to db and send mail
 * @author duythanhdao@live.com
 */
function book_ticket(){
    $to = get_settings('admin_email');
    $subject = 'Đặt vé của ' . $_POST['name'] . ($_POST['email'] ? '<' . $_POST['email'] . '>' : '') ;
    $message .= 'Tên khách hàng: ' . $_POST['name'] . "\n";
    $message .= 'Điện thoại: ' . $_POST['phone'] . "\n";
    $message .= 'Email: ' . $_POST['email'] . "\n";
    $message .= 'Ngày đi: ' . $_POST['go_date'] . '/' . $_POST['go_month'] . "\n";
    if(isset($_POST['comeback_date']) && isset($_POST['comeback_month']) && $_POST['comeback_date'] && $_POST['comeback_month']) {
         $message .= 'Ngày về: ' . $_POST['go_date'] . '/' . $_POST['go_month'] . "\n";
    }
    $message .= 'Điểm đi: ' . $_POST['from'] . "\n";
    $message .= 'Điểm tới: ' . $_POST['to'] . "\n";
    $message .= 'Người lớn:' . $_POST['adult_count'] . " người \n";
    $message .= 'Trẻ em: ' . $_POST['kid_count'] . " người \n";
    $message .= 'Em bé: ' . $_POST['infant_count'] . " người \n";
    reg_email();
    try{
        $result = wp_mail($to,$subject,$message);
    }
    catch(phpmailerException $e){
        
        $exceptionmsg = $e->errorMessage();
        exit('Có lỗi xảy ra, quý khách vui lòng thử lại');
    }
    if(saveBooking()) {

        exit('Thông tin đã được gửi, cảm ơn qúy khách!');
    }

    exit('Có lỗi xảy ra, quý khách vui lòng thử lại');
}
add_action( 'wp_ajax_book_ticket', 'book_ticket');
add_action( 'wp_ajax_nopriv_book_ticket', 'book_ticket');

/**
 * save booking to database
 * @author duythanhdao@live.com
 */

function saveBooking(){
    global $wpdb;
    $table_name = $wpdb->prefix . "book_ticket";
    $data = array();
    $fields = array(
        'name', 'email', 'phone', 'from', 'to', 'adult_count', 'kid_count', 'infant_count'
    );
    foreach($fields as $field){
        if(isset($_POST[$field])) {
            $data[] = "'" . $_POST[$field] . "'";
        }
    }
    $goDate = $_POST['go_date'] . '/' . $_POST['go_month'];
    $data[] = "'" . date('Y-m-d', strtotime($goDate)) . "'";
    if(isset($_POST['comeback_date']) && isset($_POST['comeback_month']) && $_POST['comeback_date'] && $_POST['comeback_month']) {
         $comebackDate = $_POST['comeback_date'] . '/' . $_POST['comeback_month'];
         $data[] = "'" . date('Y-m-d', strtotime($comebackDate)) . "'";
    } else {
    	$data[] = "''";
    }
    $data[] = "'" . date('Y-m-d', time()) . "'";
    $data[] = "'" . 'waitting' . "'";
    
    $query = "INSERT INTO $table_name (name, email, phone, from_city, to_city, adult_count, kid_count, infant_count, go_date, comeback_date, booking_date, status) VALUES ";
    $query .= "(" . implode(',', $data) . ")";
  
    return $wpdb->query($query);
}

function reg_email(){
	if(isset($_POST['email'])){
		saveContact($_POST['email']);
	}	
}

add_action( 'wp_ajax_reg_email', 'reg_email');
add_action( 'wp_ajax_nopriv_reg_email', 'reg_email');

/**
 * save contact to database
 * @author duythanhdao@live.com
 */

function saveContact($email = null){
    global $wpdb;
    $table_name = $wpdb->prefix . "ewp_contact";
    
  		$query = "DELETE FROM $table_name WHERE email LIKE '$email'";
  		$wpdb->query($query);
	    $query = "INSERT INTO $table_name (email) VALUES ";
	    $query .= "('" . $email . "')";  
	if($email) {
		if($wpdb->query($query))
			exit("Thông tin đã được lưu lại, xin cảm ơn!");
		exit("Có lỗi xảy ra, vui lòng thử lại!");  	
    }
}

/*********Amin area*******/

?>

