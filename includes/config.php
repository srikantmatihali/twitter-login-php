<?php require_once('settings.php');
//ini_set('display_errors', 1);
//Twitter
define('CONSUMER_KEY', 'MC1tSnrQV3nNtBgI1GqqxcxWh');
define('CONSUMER_SECRET', 'N9S0sOwXymgwS60bSq8k6MDUJcmyGeP36igfX5t3ry1CTNIIdB');
define('OAUTH_CALLBACK', $siteurl.'callback.php');

define('BASEURL', $siteurl);

//Clean Data
if(!function_exists('clean_data')){ 
	function clean_data($input) {
		$input = trim( htmlentities( strip_tags( $input,"," )) );
		
		if( get_magic_quotes_gpc() )
			$input = stripslashes( $input );
		
		$input = mysql_real_escape_string( $input );
		return $input;
	}
}
?>