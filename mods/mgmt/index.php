<?php

include_once($MOD['VIEW'].'header.php');
include_once($MOD['VIEW'].'menu.php');

if(isset($_SESSION['auth']))
{
  include_once($MOD['VIEW'].$MOD['ACTION'].'.php');
} else {
  include_once($MOD['VIEW'].'redirect.php');
}

include_once($MOD['VIEW'].'footer.php');

?>
