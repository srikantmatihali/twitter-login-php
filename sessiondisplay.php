<?php if(!isset($_SESSION)){ session_start();}

//echo $_SESSION['username'];

?>
SESSIONS
<pre><?php   print_r($_SESSION);?></pre>
<br/>
COOKIES
<pre><?php   print_r($_COOKIE);?></pre>
