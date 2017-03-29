<?php

class Slack
{
	private $webhook_url = 'https://hooks.slack.com/services/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';
	private $channel     = '#general';
	private $name        = 'WordPress';
	private $icon        = ':bulb:';
	private $message     = 'Send Test';
	function __construct($option = null)
	{
		if(isset($option['channel']))
				$this->channel     = $option['channel'];
		if(isset($option['name']))
				$this->name        = $option['name'];
		if(isset($option['icon']))
				$this->icon        = $option['icon'];
		if(isset($option['url']))
				$this->webhook_url = $option['url'];
		if(isset($option['message']))
				$this->message     = $option['message'];

	}
	private function make_json(){
		$msg = array(
			'channel'			=> 	$this->channel,
			'username'		=> 	$this->name,
			'icon_emoji' 	=>	$this->icon,
			'text'  			=>	$this->message
		);
		$msg = json_encode($msg);
		$msg = 'payload=' . urlencode($msg);
		return $msg;
	}

	public function send_data(){
		$ch  = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->webhook_url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->make_json());
		$output = curl_exec($ch);
		curl_close($ch);
	}
}

?>
