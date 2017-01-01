<?php 
	//ini_set('display_errors', 1);
	session_start();
	require_once('includes/global.php');
	require_once('twitteroauth/twitteroauth.php');
	//require_once('includes/config.php');
	

	if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
		$_SESSION['status'] = 'expired';
		//header('Location: clearsessions.php?rbtb='.uniqid());
	?>
		<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
			window.close();
			window.opener.test_twitter();
		</script>
	<?php
	}

	$connection = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
	$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

	$_SESSION['access_token'] = $access_token;

	unset($_SESSION['oauth_token']);
	unset($_SESSION['oauth_token_secret']);

	if($connection->http_code == 200) {
		$_SESSION['status'] = 'verified';
		if( empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
			//header('Location: clearsessions.php?rbtb='.uniqid());
		?>
			<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script type="text/javascript">
				window.close();
                window.opener.test_twitter();
            </script>
		<?php
		}
		$access_token = $_SESSION['access_token'];
		$twitteroauth = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
		$user_info = $twitteroauth->get('account/verify_credentials');
		/* For Testing
		$tweet_text = 'hello world';
			 $statues = $twitteroauth->post("statuses/update", array("status" => $tweet_text));  
		*/	 
			 
		if (isset($user_info->error)) {
	        // Something's wrong, go back to square 1  
	        //header('Location: clearsessions.php?rbtb='. uniqid());
		?>
			<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script type="text/javascript">
				window.close();
                window.opener.test_twitter();
            </script>
		<?php 
	    } else {
			// No Email, So Twitter Username
			$email=$user_info->screen_name;
	        $uid = $user_info->id;
	        $username = $user_info->name;
			$location = mysql_real_escape_string($user_info->location);
	        //$user = new User();
	        //$userdata = $user->checkUser($uid, 'twitter', $username, $email);
	       // if(!empty($userdata)) {
	            $_SESSION['id'] = 1;//$userdata['id'];
				$_SESSION['oauth_id'] = $uid;
	            $_SESSION['username'] = 's';//$userdata['username'];
				
			
	            //$_SESSION['oauth_provider'] = //$userdata['oauth_provider'];
		?>	
			<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script type="text/javascript">
				window.close();
                window.opener.test_twitter();
				//window.opener.test_twitter(<?php //echo json_encode($_SESSION['id']); ?>);
            </script> 
		<?php
	            //header("Location: index.php?t=". uniqid());
	       // }
	    }
	} else {
		//header('Location: clearsessions.php?rbtb='.uniqid());
	?>
		<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
			window.close();
			window.opener.test_twitter();
		</script>
	<?php
	}