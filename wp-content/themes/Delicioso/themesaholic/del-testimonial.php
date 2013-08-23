<?php 
require_once("../../../../wp-config.php");
require_once("../../../../wp-includes/wp-db.php");

$id = $_GET['deltestimonial'];
global $wpdb;
$table_name = $wpdb->prefix . THEME_NAME."_testimonials";
$wpdb->query("DELETE FROM ".$table_name." WHERE id = '$id'");


?>