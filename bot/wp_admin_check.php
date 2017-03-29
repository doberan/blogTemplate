<?php
	session_start();
class Checker
{
  private $id = 'member';
  function __construct($new_pass = null){
	  session_start();
	  if(isset($new_pass))
	    $this->id = $new_pass;
	  if(isset($_GET[$this->id])){
	    $_SESSION[$this->id] = $_GET[$this->id];
	  }
	}
	public function get_name(){
		$ip_add		 = $_SERVER["REMOTE_ADDR"] ;
		$user_name = $ip_add ;
		if( isset($_SESSION[$this->id]) )
		  $user_name = $_SESSION[$this->id];
		return $user_name;
	}
}
?>
