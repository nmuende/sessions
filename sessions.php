<?php
//sessions using positive if statement structure
/* 	
*	always put session_start() as the first line of code on 
*	any file that is part of a session
*/
session_start();
/*
*	Parts:
*	1: define() - defines a named constant
*	2: the constant being defined  (in this case it is THIS_PAGE)
*	3: basename() - returns a filename
*	4: $_SERVER[] is an array containing information like headers, paths, script locations 
*	
*	THIS_PAGE is the constant (variable) to assign the filename returned
*	by basename() from the $_SERVER array 
*
*	PHP_SELF is the filename of the currently executing script
*	so in this example THIS_PAGE is "sessions.php"
*/
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));	
/*
*	$password is the variable to store
*	the user's input on the form using $_POST['password']
*/
$password = $_POST['password'];
/*
*	$myPassword stores is the variable to store the correct password 
*	the user entered password must match
*/
$myPassword = "cats123";
/*
*	start of conditional statements
*
*	* IF (the session has NOT been set) {
*			IF (a password has NOT been entered) {
*				show the form
*				halt HTML;	
*			}
*			ELSE IF (the password IS set BUT NOT the right password) {
*				show the form with error message
*				die;
*			}
*	 		ELSE {
*				//this means the password IS entered AND right
*				set the session variable
			}
*	}
*	* Else(the session has been set)
*		fall through to page
*
*/

if(!isset($_SESSION['password'])) {
	if(!isset($_POST['password'])) {
		showForm();
		die;
	} elseif($_POST['password'] != $myPassword) {
		showForm();
		echo "Wrong password";
		die;
	} else {
		$_SESSION['password'] = $_POST['password'];
	}
}
/*
*	function to show form
*/
function showForm(){
	echo '<form action="' . THIS_PAGE . '" method="post"> </br> 
		<i>Enter your password to see the page:</i> <input name="password" type="text" id="password" /></br>
		<input style="<i>margin-left:20%; margin-top:10px" type="submit" name="submit" value="Click to enter the page">
	</form>';
}