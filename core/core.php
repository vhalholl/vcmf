<?php

if($CORE['CAS'] == TRUE)
{
  session_start();
  if($CORE['STATUS'] == 'dev') phpCAS::setDebug();
  phpCAS::client(CAS_VERSION_2_0,'cas.domain.tld',443,'/cas');
  phpCAS::setNoCasServerValidation(); //TODO: Unsecure way...
  $CORE['CAS_VERSION'] = phpCAS::getVersion();
} else {
  $session = new session();
  $session->start();
}

/*
 *  First debug output
 */

if($CORE['STATUS'] == 'dev')
{
  print("<!-- CORE Status : ".$CORE['STATUS']." -->\n");
  print("<!-- CORE URL Rewriting : ".$CORE['URL_RW']." -->\n");
  print("<!-- CORE GZIP Compression Handler : ".$CORE['GZIP']." -->\n");
  print("<!-- CORE Output Cache : ".$CORE['CACHE']." -->\n");
  print("<!-- CORE Libraries : ".$CORE['LIBRARIES']." -->\n");
  print("<!-- CORE Locale : ".$CORE['LOCALES']." -->\n");
  print("<!-- CORE Modules : ".$CORE['MODULES']." -->\n");
  print("<!-- CORE CAS : ".$CORE['CAS']." -->\n");
  if($CORE['CAS'] == TRUE) print("<!-- CORE CAS_VERSION : ".$CORE['CAS_VERSION']." -->\n");
  print("<!-- CORE Query : ".$CORE['browser_qw']." -->");
}

/*
 * Process query
 */

if (isset($_GET['mod']) && in_array($_GET['mod'], unserialize($CORE['MODULES'])))
{
  $MOD['NAME'] = $_GET['mod'];
  $module = MODS_PATH.$_GET['mod'].'/';

  $MOD['ACTIONS'] = serialize(array_diff(scandir($module), array('.','..','.htaccess','config.php','view','css','img')));
  $action = (isset($_GET['do']) && !empty($_GET['do'])) ? $_GET['do'].'.php' : 'index.php';

  $MOD['QUERY'] = $module.$action;
  $MOD['PATH'] = $module;
  $MOD['VIEW'] = $MOD['PATH'].'view/';

  if(is_file($MOD['PATH'].'config.php')) include_once($MOD['PATH'].'config.php');

  if (in_array($action, unserialize($MOD['ACTIONS'])) && is_file($MOD['QUERY']))
  {
    $MOD['ACTION'] = $_GET['do'];
    include_once($MOD['QUERY']);
  } else {
    $MOD['ACTION'] = 'index';
    include_once($module.'index.php');
  }

} else {
  $MOD['ACTIONS'] = 'Default';
  $MOD['QUERY'] = 'Default';
  $MOD['NAME'] = 'main';
  $MOD['ACTION'] = 'default';

  include_once(MAIN_PATH.'index.php');
}

/*
 * Last debug output
 */

if ($CORE['STATUS'] == 'dev')
{
  print("<!-- MOD Query : ".htmlspecialchars($MOD['QUERY'])." -->");
  print("\n<!-- MOD Actions : ".$MOD['ACTIONS']." -->");
  print("\n<!-- MOD Name : ".htmlspecialchars($MOD['NAME'])." -->");
  print("\n<!-- MOD Action : ".htmlspecialchars($MOD['ACTION'])." -->");
  printf(
    "\n<!-- CORE Bench : ~ %s Bytes in ~ %s seconds (~ %s MB/s) -->",
    $obsize = ob_get_length(),
    $obtime = (microtime(true) - $CORE['START_TIME']),
    (($obsize/($obtime))/1024)
  );
}

/*
 *  Return output buffer and stop buffering.
 */

if($CORE['CACHE'])
{
  $gentime = time();
  if ($CORE['URL_RW'] && $CORE['GZIP']){
    $cachemode = '-UC.';
  } elseif ($CORE['URL_RW']){
    $cachemode = '-U.';
  } elseif ($CORE['GZIP']){
    $cachemode = '-C.';
  } else {
    $cachemode = '.';
  }

  $cached = CACHE_PATH.$MOD['NAME'].'-'.$MOD['ACTION'].$cachemode.md5($_SERVER['HTTP_USER_AGENT'].'SaLt');
  $timeout = ($gentime + CACHE_TIME);

  if (file_exists($cached))
  {
    //TODO: diff file w/ output before.
    clearstatcache();
    $filetime = filemtime($cached);

    if ($filetime < $timeout)
    {
      ob_end_clean();
      return readfile($cached);

    } elseif($filetime > $timeout ) unlink($cached);

  } else {
    if ($CORE['STATUS'] == 'dev')
    {
      printf(
        "<!-- CORE Cache : cache%s.html : Generated : %s Timeout : %s -->",
        $cachemode.md5($_SERVER['HTTP_USER_AGENT'].'SaLt'),date('d/m/Y h:m:s', $gentime),date('d/m/Y h:m:s', $timeout)
      );
    }

    if($CORE['GZIP'] && substr_count($_SERVER['HTTP_ACCEPT_ENCODING'],'gzip'))
    {
      $buffer = gzencode(ob_get_contents(),9);
    } else {
      $buffer = ob_get_contents();
    }

    file_put_contents($cached, $buffer);
    return ob_get_contents();
  }

} else {
     return ob_get_contents();
}
