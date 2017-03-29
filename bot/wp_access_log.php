<?php
date_default_timezone_set('Asia/Tokyo');
require_once(dirname(__FILE__) . '/wp_admin_check.php');
$checker   = new Checker();
$user_name = $checker->get_name();
$message   = $user_name . 'さんが[' . get_the_title() . "]にアクセスしました:\t".date('Y-m-d H:i:s');
$option  = array(
  'channel'     => '#wordpress_access_log',
  'name'        => 'アクセスボット君',
  'message'     => $message
);
require_once(dirname(__FILE__) . '/wp_file_manager.php');
$file_maneger = new FileManager();
$file_maneger->write($message);
require_once(dirname(__FILE__) . '/slack_bot.php');
$slack = new Slack($option);
$slack->send_data();
?>
