<?php
//index.php
include 'sessions.php';

/*
*	this statement should not be visible unless
*	the session is set with the correct password
*	input by the user
*/
echo "You entered the right password";