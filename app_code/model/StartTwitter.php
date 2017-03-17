<?php
	require_once('TwitterAPIExchange.php');

	function startConnection()
	{
		$settings = array(
		    'oauth_access_token' => "176826245-zMiqn6950svxlVso1p154gE5fz0kqyEJwDScsmyn",
		    'oauth_access_token_secret' => "YkunA72naCEQOcYdWDZJSXhalGk9b4YKOZnWiwCz4FASi",
		    'consumer_key' => "	MlG399ph8JnluMMCRbOBcLJVG",
		    'consumer_secret' => "HqRCr2W8OJwIjhUW6JACMksdJK9U76fAofiFE4v6Bm2RdKbJSB"
			);


		return new TwitterAPIExchange($settings);
	}
?>