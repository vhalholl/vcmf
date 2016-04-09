<?php

if($CORE['CAS'] == TRUE)
{
  $MOD['CAS_USERS'] = array(
    "user1",
    "user2",
    "user3"
  );
}

if($CORE['URL_RW'] == TRUE)
{
  $MOD['LINKS'] = array(
    'index' => '/mgmt.index.html',
    'listwebusers' => '/mgmt.listwebusers.html',
    'createwebusers' => '/mgmt.createwebusers.html',
    'changewebusers' => '/mgmt.changewebusers.html',
    'removewebusers' => '/mgmt.removewebusers.html',
    'config' => '/mgmt.config.html',
    'login' => '/mgmt.login.html',
    'logout' => '/mgmt.logout.html'
   );
} else {
  $MOD['LINKS'] = array(
    'index' => '/index.php?mgmt&do=index',
    'listwebusers' => '/index.php?mod=mgmt&do=listwebusers',
    'createwebusers' => '/index.php?mod=mgmt&do=createwebusers',
    'changewebusers' => '/index.php?mod=mgmt&do=changewebusers',
    'removewebusers' => '/index.php?mod=mgmt&do=removewebusers',
    'config' => '/index.php?mod=mgmt&do=config',
    'login' => '/index.php?mod=mgmt&do=login',
    'logout' => '/index.php?mod=mgmt&do=logout'
  );
}

//TODO
//switch($CORE['LOCALS'])
$MOD['LINKS_DESC'] = array(
    'index' => "Accueil",
    'listwebusers' => "Utilisateurs",
    'createwebusers' => "Création",
    'changewebusers' => "Modification",
    'removewebusers' => "Suppression",
    'config' => 'Configuration',
    'login' => "Se connecter",
    'logout' => "Se déconnecter"
 );

$MOD['LINKS_ICON'] = array(
    'index' => "<i class=\"icon-home\"></i> ",
    'listwebusers' => "<i class=\"icon-user\"></i> ",
    'createwebusers' => "<i class=\"icon-ok\"></i> ",
    'changewebusers' => "<i class=\"icon-refresh\"></i> ",
    'removewebusers' => "<i class=\"icon-remove\"></i> ",
    'config' => "<i class=\"icon-cog\"></i>",
    'login' => "<i class=\"icon-off\"></i> ",
    'logout' => "<i class=\"icon-off\"></i> "
 );

?>
