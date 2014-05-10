<?php

// check for blank, redirect if so.
if(count($_SESSION['data']) < 2) 
{
	if($enrolmentForm->curPageName() == "step2.php" || $enrolmentForm->curPageName() == "step3.php") 
	{
	  header("Location: index.php");
	}
}


// check if there session has data in it
if(!isset($_SESSION['data']))
{
	$_SESSION['data'] = array('active'=>'1');
}


// check if post is not empty
if(sizeof($_POST) > 0)
{
	// loop through post data
	foreach($_POST as $key=>$value) {
	  if(!array_key_exists($key,$_SESSION['data'])) {
		// add new fields to end of array
	    $_SESSION['data'] = array_push_assoc($_SESSION['data'],$key,sanitise_input($key,$value));
	  }
	  else {
		// update values if found
	    $_SESSION['data'][$key] = sanitise_input($key,$value);
	  }
	}
}

?>