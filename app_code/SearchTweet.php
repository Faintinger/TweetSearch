<?php
	require 'model/ConnectionTwitter.php';

	$twitter_con = startConnection();
	
	if(isset($_POST["myUser"]))
	{
		$userName = $_POST["myUser"];
		$time_line = $twitter_con -> get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);
		echo ($time_line);
	}

	//GET https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=twitterapi&count=2
	if(isset($_POST["user"]))
    {
    	$toSearch = $_POST["user"];
        $url    = 'https://api.twitter.com/1.1/search/tweets.json';
        $method = 'GET';
        $params = '?screen_name=' . $toSearch;
        $count = '&count=25';
        $data = $twitter_con -> request($url, $method, $params . $count);
        $info = (array)@json_decode($data, true);
        echo json_encode($info);
    }

	

	if(isset($_POST["hashtag"]))
    {
    	$toSearch = $_POST["hashtag"];
        $url    = 'https://api.twitter.com/1.1/search/tweets.json';
        $method = 'GET';
        $params = '?q=' . $toSearch;
        $data = $twitter_con -> request($url, $method, $params);
        $info = (array)@json_decode($data, true);
        echo json_encode($info);
    }

?>