<?php


if($CORE['CAS'] == TRUE) 
{
  session_unset();
  session_destroy();
  phpCAS::logout();
}

$session->stop(); 
header('Refresh: 3; /');

?>
