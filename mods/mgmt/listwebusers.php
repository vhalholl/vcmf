<?php

include_once($MOD['VIEW'].'header.php');
include_once($MOD['VIEW'].'menu.php');

if(isset($_SESSION['auth']))
{
  $proc = new process('/usr/bin/sudo "/root/listWebUser.sh"');
  $proc->start();
  //echo "Status: ".$proc->status()."<br>";echo "Pid: ".$proc->getPid()."<br>";echo "OutputFile: ".$proc->getOutput()."<br>";
  while($proc->status() == 1 ) sleep(.1);
  $output = file($proc->getOutput());
  unlink($proc->getOutput());
  $proc->stop();

  include_once($MOD['VIEW'].$MOD['ACTION'].'.php');

} else {
  include_once($MOD['VIEW'].'redirect.php');
}

include_once($MOD['VIEW'].'footer.php');

?>
