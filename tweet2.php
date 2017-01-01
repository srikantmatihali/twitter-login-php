<?php include('includes/global.php'); ?>
<!Doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="description" content="<?php echo $fbdescription;?>"/>
<meta property="og:description" content="<?php echo $fbdescription;?>" /> 
<style>
.enter-but{
	cursor:pointer;
}
#tweetDiv{
	display:none;
}
</style>
</head>

<body>
<a class="tw_login" data="1"  >ring1</a>
<a class="tw_login" data="2"  >ring2</a>
<a class="tw_login" data="3"  >ring3</a>
<a class="tw_login" data="4"  >ring4</a>
<a class="tw_login" data="5"  >ring5</a>
<a class="tw_login" data="6"  >ring6</a>
<a class="tw_login" data="7"  >ring7</a>
<a class="tw_login" data="8"  >ring8</a>
<a class="tw_login" data="9"  >ring9</a>
<!--<a class="tw_login">Login using Twitter</a>-->  

<div id="tweetDiv" >
	<div id="errMsg" ></div>
	<select id="tweetSelect" >
		<option value="1" >1</option>
		<option value="2" >2</option>
		<option value="3" >3</option>
		<option value="4" >4</option>
		<option value="5" >5</option>
		<option value="6" >6</option>
		<option value="7" >7</option>
		<option value="8" >8</option>		
		<option value="9" >9</option>	
	</select>
	<textarea id="tweet_text" ></textarea>	
	<a id="tweetBut" >Tweet</a>
</div>


<?php //if($_GET['page']){ ?>
	
<?php //}?>


<!-- latest jQuery direct from google's CDN -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	var base_url = '<?php echo $siteurl;?>';	
	var tweet_notset = true;
	
	$(document).on("click", "#tweetBut", function(ex7) {
		ex7.preventDefault();
		alert(1);
		var tweet_text = $('#tweet_text').val();
		dataString = 'tweet_text='+tweet_text;
		//ajax call to publish tweet.
		$.ajax({
			type: 'POST',
			url: 'post_tweet.php',
			data: dataString,
			dataType: 'json',
			success: function(html) {
				$("#errMsg").html(html['message']);				
			}
		});//end of ajax call.
		return false;
	});
	
	
	$(document).on("click", ".tw_login", function(ex7) {
		ex7.preventDefault();
		var data = $(this).attr('data');		
		$('#tweetSelect option[value="'+data+'"]').attr("selected", "selected");
		changeText(data);
		if(tweet_notset===true){
			var link = '<?php echo BASEURL . 'redirect.php?rbtb='.uniqid(); ?>';
			var win =  window.open(link, '', 'width=600,height=400,resizable=yes,scrollbars=yes');
		}		
		return false;
	});
	
	$(document).on("change", "#tweetSelect", function(ex) {
		ex.preventDefault();
		var data = $(this).val();
		changeText(data);
		return false;
	});
	function changeText(data){
		$('#tweet_text').val('#ring'+data+' testing'); 
	}
	//mathew twitter code
	function test_twitter() {   //console.log(data);		
		$('#tweetDiv').css('display','block');
		tweet_notset = false;
		/*if(selID != "" && selID != null && typeof selID !== 'undefined') {
			$('#submitForm').submit();
		} else {
			window.location.href = baseurl + "index.php?rbtb=<?php echo uniqid(); ?>";
		}
		//window.location.href = baseurl + "index.php?rbtb=<?php echo uniqid(); ?>";*/		
	}	
</script>
</body>
</html>