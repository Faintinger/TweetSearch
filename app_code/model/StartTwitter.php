<?php
	require_once('TwitterAPIExchange.php');

	function startConnection()
	{
		$settings = array(
		    'oauth_access_token' => "YOUR_OAUTH_ACCESS_TOKEN",
		    'oauth_access_token_secret' => "hkgrVMdRtfCw1NmsERIaVHA61yQ4PE4kcLuVJ7CgjFmznmXEEl",
		    'consumer_key' => "176826245-zMiqn6950svxlVso1p154gE5fz0kqyEJwDScsmyn",
		    'consumer_secret' => "YkunA72naCEQOcYdWDZJSXhalGk9b4YKOZnWiwCz4FASi"
			);


		return new TwitterAPIExchange($settings);
	}
?>