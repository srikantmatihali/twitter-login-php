<?php  header('Content-type: application/json');
if(!isset($_SESSION)){ session_start();}
error_reporting(E_ALL); //ini_set('display_errors',1);
require_once('includes/global.php');
require_once('twitteroauth/twitteroauth.php');

/* test tweet.
$tweet_text = 'hey there its me!';
$connection = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['access_token']['oauth_token'], $_SESSION['access_token']['oauth_token_secret']);
print_r($connection->post("statuses/update", array("status" => $tweet_text)));
*/

$response_message = 'error';
$response_status = 0;
$resultdata = '"tid":"","uid":"","cid":"","screen_name":""';

if($_POST){
	
	if(($_SESSION['access_token']['oauth_token'])&&($_SESSION['access_token']['oauth_token_secret'])){
		echo 1;
		$tweet_text = escape_data($_POST['tweet_text']);				
		$connection = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['access_token']['oauth_token'], $_SESSION['access_token']['oauth_token_secret']);		
		$statues = $connection->post("statuses/update", array("status" => $tweet_text));  
		die;
		/*$url = 'https://api.twitter.com/1.1/statuses/update.json';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, "status=".$tweet_text);
		//curl_setopt($ch, CURLOPT_USERPWD, "$cap_username:$cap_password");
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$out = curl_exec($ch);
		curl_close($ch);die;		*/
	}	
	
	/*$city = '';
	$cityid = '';
	if($_POST['city']){
		$city = strtolower(escape_data($_POST['city']));
	}	
		
	if(!empty($_POST['message'])){ 
		$reply = $cb->statuses_update('status='.$_POST['message']);
		//echo '<pre>'; print_r($reply); echo '</pre>';
		//echo $reply->httpstatus;
		
		if($reply->httpstatus=='200'){

			//echo 'https://twitter.com/'.$reply->user->screen_name.'/status/'.$reply->id_str;//echo $reply->user->screen_name;						
			//save data to database.
			if(isset($_SESSION['usid'])){				
				//enter comments
				$tweettable = "tweets";		
				$tweetstatus = 1;	
				$tweetinfo = array("tid" => $_SESSION['tid'],"usid" => $_SESSION['usid'],"cityname"=>$city,"post_id" =>$reply->id_str,"profile_image_url"=>$reply->user->profile_image_url,"screen_name" => $reply->user->screen_name,"message" =>$_POST['message'],"created_on" => "".date("Y-m-d H:i:s")."","status"=>$tweetstatus);
				$tweet_id = insert($tweetinfo, $tweettable);
				$response_message = 'data inserted';
				$response_status = 200;
				$resultdata = '"tid":"'.$_SESSION['tid'].'","uid":"'.$_SESSION['usid'].'","cityname":"'.$city.'","screen_name":"'.$reply->user->screen_name.'"';

				
           			//$updatesql = "update city set tweet_count = tweet_count +1 where name = '".$city."'";
					
				$table='city ';
				$data='tweet_count = tweet_count +1';
				$where=" where name = '".$city."' AND status=1";
				$updateid=update_simple($table,$data,$where);					
							
			}
		}else if($reply->httpstatus=='403'){		
			$response_message = 'Duplicate Tweet';
			$response_status = 403;
	
		}
	}else{
		$response_message = 'empty twitter message';
		$response_status = 403;
	}*/
}else{
		$response_message = 'no post data';
		$response_status = 401;
}

echo '{"status":"'.$response_status.'","msg":"'.$response_message.'",'.$resultdata.'}';
?>
