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
/*define('CONSUMER_KEY', 'MC1tSnrQV3nNtBgI1GqqxcxWh');
define('CONSUMER_SECRET', 'N9S0sOwXymgwS60bSq8k6MDUJcmyGeP36igfX5t3ry1CTNIIdB');
*/
define('CONSUMER_KEY', 'DT9gS8ZQ4zKqci6AwpG2RwcRf');
define('CONSUMER_SECRET', '5nrEQT35r0Qh5f8dPGTTxYFiKVRbMqCBMRHTmsdxDM6dk1tKtY');

define('OAUTH_CALLBACK', $siteurl.'callback.php');
define('BASEURL', $siteurl);

