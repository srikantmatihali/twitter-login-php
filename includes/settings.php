<?php
//
$hostname = "localhost";//"kingfisherworld.com";
$nurl = $_SERVER['HTTP_HOST'];
$siteurl = "http://tanishqpalette.com/twitter/";
$siteurl = "http://tanishqpalette.com/"; 
if($nurl == "www.tanishqpalette.com/"){
	//$siteurl = "http://www.kingfisherworld.com/";
}
$dataurl = $siteurl."data/";
//Default Data
$meta_title = "Kingfisher";
$meta_description = "Kingfisher";
$meta_image = $siteurl."125x125.png";
$meta_keyword = "";

//Twitter
define('CONSUMER_KEY', '**********************');
define('CONSUMER_SECRET', '************************');

define('OAUTH_CALLBACK', $siteurl.'callback.php');
define('BASEURL', $siteurl);

