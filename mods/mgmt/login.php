<?php

include_once($MOD['VIEW'].'header.php');
include_once($MOD['VIEW'].'menu.php');

if($CORE['CAS'] == TRUE)
{

  phpCAS::forceAuthentication();
  $username = phpCAS::getUser();

  if(isset($username) && in_array($username, $MOD['CAS_USERS']))
  {
    $_SESSION['auth'] = TRUE;
    $_SESSION['user'] = $username;
    header("location: ".$MOD['LINKS']['index']);
  } else {
    header("Location: /");
  }

} else {
  if (isset($_POST['login'], $_POST['password']))
  {
    print_r($_POST);
    $login = htmlspecialchars($_POST['login']);
    $passwd = htmlspecialchars($_POST['password']);

    if(login($login, $pass, $mysqli) == true) {
      echo 'Success: You have been logged in!';
    } else {
      header('Location: ./login.php?error=1');
    }
    //header('location: /');
  } else {
      include_once($MOD['VIEW'].'form_login.php');
  }
}

include_once($MOD['VIEW'].'footer.php');

?>
