$(document).ready(function(){
	$.ajax({
	type: "POST",
	url: "../TweetSearch/app_code/TweetCore.php",
	data: {
		myUser : 0,
	},
	dataType: "json",
	contentType: 'application/x-www-form-urlencoded',
	success: function(result) {
		for (var i = 0; i < result.length; i++) {
			alert(result);
			appendTweet(result[i]);
		}
	},
	error: function(result) {
		alert("Error occured during the search");
	}
	});
});

$("#search").click(function(){
	var busqueda = $("#campo").val();
	if(busqueda != "") {
		if(busqueda.charAt(0) == '#') {
			$("#post").empty();
			getTweets(busqueda.substring(1, busqueda.length));
		}
		else if(busqueda.charAt(0) == '@') {
			$("#post").empty();
			getTimeLine(busqueda.substring(1, busqueda.length));
		}
	}
});

function appendTweet(result)
{
	var tweet = jQuery.parseJSON(result);
	var space = $("#post");
	if(img == "") ImgV = "hidden"; else ImgV = "";
	if(vid == "") VidV = "hidden"; else VidV = "";
	space.prepend(

		'<div class="tweet">' +
		    '<a href="' + tweet.entities["urls"][0]["url"] + '" class="follow"><i class="fa fa-twitter"></i>Follow</a>' +
		    
		    '<div class="tweet--user">' +
		      '<img class="tweet--user-avatar" src="' + tweet.user["profile_image_url"] + '" alt="" />' +
		      '<div class="tweet--user-name">' + tweet.user["name"] + '<span>@' + tweet.user["screen_name"] + '</span></div>' +
		    '</div>' + 
		    
		    '<p class="tweet--body">' + tweet.text + '</p>' +
		    
		    ' <div class="tweet--time">' + tweet.created_at + '</div>' +
		    
		    '<div class="tweet--actions">' + 
		      '<i class="fa fa-ellipsis-h"></i>' +
		      '<i class="fa fa-heart"></i>' + 
		      '<i class="fa fa-retweet"></i>' + 
		      '<i class="fa fa-reply"></i>' + 
		      '<span>' + tweet.retweet_count + '</span>' +
		    '</div>' +
	  	'</div>'

	);
}

function getTimeLine(userId)
{
	$.ajax({
	type: "POST",
	url: "../TweetSearch/app_code/TweetCore.php",
	data: {
		user : userId,
	},
	dataType: "json",
	contentType: 'application/x-www-form-urlencoded',
	success: function(result) {
		for (var i = 0; i < result.length; i++) {
			appendTweet(result[i]);
		}
	},
	error: function(result) {
		alert("Error occured during the search");
	}
	});
}

function getTweets(tag)
{
	$.ajax({
	type: "POST",
	url: "../TweetSearch/app_code/TweetCore.php",
	data: {
		hashtag : tag,
	},
	dataType: "json",
	contentType: 'application/x-www-form-urlencoded',
	success: function(result) {
		for (var i = 0; i < result.length; i++) {
			appendTweet(result[i]);
		}
	},
	error: function(result) {
		alert("Error occured during the search");
	}
	});
}