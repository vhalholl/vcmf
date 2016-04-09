<?php

include_once($MOD['VIEW'].'header.php');
include_once($MOD['VIEW'].'menu.php');

if(isset($_SESSION['auth']))
{
  if(isset($_GET['arg']) && $_GET['arg'] != '')
  {
    $arg = escapeshellarg($_GET['arg']);
    $script = 'script.sh';
    $scriptcontent = "#!/bin/bash\n/root/chPassword.sh $arg\n";

    file_put_contents($script, $scriptcontent);
    chmod($script, 0755);

    $proc = new process('/usr/bin/sudo "'.ROOT.$script.'"');
    $proc->start();
    while($proc->status() == 1 ) sleep(.1);
    $output = file($proc->getOutput());

    unlink($script);

    include_once($MOD['VIEW'].$MOD['ACTION'].'.php');

    unlink($proc->getOutput());
    $proc->stop();

  } else {
    include_once($MOD['VIEW'].'form_user.php');
  }

} else {
  include_once($MOD['VIEW'].'redirect.php');
}

include_once($MOD['VIEW'].'footer.php');

?>
