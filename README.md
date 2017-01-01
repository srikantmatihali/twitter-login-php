# twitter-login-php
Login with php using Twitter oauth library implementation. This file also does automatic tweeting.

For more informaion of TwitterOauth check here: https://github.com/abraham/twitteroauth

=========
Database
=========
sql - added in sql folder.


=======
SETUP
=======

- callback.php
 This is an important file. Its url has to be updated in Twitter api. test_twitter javascript function will be trigged.
- redirect.php
 used by twitterouth api.


=========
API KEY
=========

Create api key on twitter.com
https://apps.twitter.com/

Check twitter documentation for more details
https://dev.twitter.com/

After getting twitter key and secret key, please change the twitter api code at this location.
includes/settings.php

This also has a file which posts tweets on user's behalf
post_tweet.php


This file helps twitter login and does automatic tweet.
tweet2.php