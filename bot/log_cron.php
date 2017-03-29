<?php
date_default_timezone_set('Asia/Tokyo');
require_once(dirname(__FILE__) . '/wp_file_manager.php');
$file_maneger = new FileManager();
$message = $file_maneger->getText();
$option  = array(
  'channel'     => '#botsystem',
  'name'        => 'アクセスボット君',
  'message'     => $message
);
require_once(dirname(__FILE__) . '/slack_bot.php');
$slack = new Slack($option);
$slack->send_data();
?>
