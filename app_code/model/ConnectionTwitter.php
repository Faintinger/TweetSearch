<?php

/*
	Oauth Config 
	Script that authenticates with twitter
*/

	//Twitter Library
	require 'twitter-api/twitteroauth/autoload.php';
	use Abraham\TwitterOAuth\TwitterOAuth;

	//Keys
	$consumerKey = '2MlA80qob8N3N44KOKncS3iQT';
	$consumerSecret = 'hkgrVMdRtfCw1NmsERIaVHA61yQ4PE4kcLuVJ7CgjFmznmXEEl';
	$accessToken = '176826245-zMiqn6950svxlVso1p154gE5fz0kqyEJwDScsmyn';
	$accessTokenSecret = 'YkunA72naCEQOcYdWDZJSXhalGk9b4YKOZnWiwCz4FASi';

	//Start Connection to the API
	function startConnection()
	{
		$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
		$content = $connection->get("account/verify_credentials");
		return $connection;	
	}
	
?>