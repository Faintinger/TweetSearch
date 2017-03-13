<?php
	require 'model/StartTwitter.php';

	$twitter_con = startConnection();
	
	if(isset($_POST["myUser"]))
	{
        $url    = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $method = 'GET';
        $params = '?screen_name=' . $toSearch;
        $count = '&count=25';
        $data = $twitter_con -> setGetfield($params . $count)
                -> buildOauth($url, $method)
                -> performRequest();
        $info = json_decode($data);
        echo json_encode($info);
	}

	//GET https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=twitterapi&count=2
	if(isset($_POST["user"]))
    {
    	$toSearch = $_POST["user"];
        $url    = 'https://api.twitter.com/1.1/search/tweets.json';
        $method = 'GET';
        $params = '?screen_name=' . $toSearch;
        $count = '&count=25';
        $data = $twitter_con -> setGetfield($params . $count)
                -> buildOauth($url, $method)
                -> performRequest();
        $info = json_decode($data);
        echo json_encode($info);
    }

	

	if(isset($_POST["hashtag"]))
    {
    	$toSearch = $_POST["hashtag"];
        $url    = 'https://api.twitter.com/1.1/search/tweets.json';
        $method = 'GET';
        $params = '?q=' . $toSearch;
        $data = $twitter_con -> setGetfield($params . $count)
                -> buildOauth($url, $method)
                -> performRequest();
        $info = json_decode($data);
        echo json_encode($info);
    }

?>