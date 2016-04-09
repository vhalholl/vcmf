<?php

/******************
 * bootstrap.php  *
 *****************/

/*
 *  Initialize pseudo-random number generator
 */

mt_srand(round(microtime(true)*1024));

/*
 *  Define Paths
 */

define('ROOT',getcwd().DIRECTORY_SEPARATOR);

define('CORE_PATH', ROOT.'core'.DIRECTORY_SEPARATOR);
define('CONF_PATH', ROOT.'conf'.DIRECTORY_SEPARATOR);
define('LIBS_PATH', ROOT.'libs'.DIRECTORY_SEPARATOR);
define('MAIN_PATH', ROOT.'main'.DIRECTORY_SEPARATOR);
define('MODS_PATH', ROOT.'mods'.DIRECTORY_SEPARATOR);
define('CACHE_PATH', ROOT.'cache'.DIRECTORY_SEPARATOR);
define('CSS_PATH', ROOT.'css'.DIRECTORY_SEPARATOR);
define('IMG_PATH', ROOT.'img'.DIRECTORY_SEPARATOR);
define('JS_PATH', ROOT.'js'.DIRECTORY_SEPARATOR);

/*
 * Modules availlables
 */

$CORE['MODULES'] = serialize(array_diff(scandir(MODS_PATH), array('.','..','.htaccess')));

/*
 * Include main configuration
 */

include_once(CONF_PATH.'config.php');

if(FORCE_SSL && $_SERVER['SERVER_PORT'] != 443)
{
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  exit();
}

/*
 * Load core libraries
 */

$CORE['LIBRARIES'] = serialize(array_diff(scandir(LIBS_PATH), array('.','..','.htaccess','CAS')));

foreach(unserialize($CORE['LIBRARIES']) as $lib)
{
  require_once(LIBS_PATH.$lib);
}

/*
 * Setting app status and behavior
 */

switch (STATUS)
{
  case 'prod': {
    ini_set('display_errors','Off');
  }
  case 'dev':
  {
    $CORE['START_TIME'] = $_SERVER['REQUEST_TIME'];

    /*
     *  Callback function for set_error_handler
     */

    function error_handler($errno,$errstr,$errfile,$errline)
    {
      switch($errno)
      {
        case E_USER_ERROR : $errtype = 'Fatal :'."\n"; break;
        case E_USER_WARNING : $errtype = 'Erreur :'."\n"; break;
        case E_USER_NOTICE : $errtype = 'Warning :'."\n"; break;
        case E_ERROR : $errtype = 'FATAL :'."\n"; break;
        case E_WARNING : $errtype = 'ERREUR :'."\n"; break;
        case E_NOTICE : $errtype = 'WARNING :'."\n"; break;
        default: $errtype = 'UNKNOW :'."\n"; break;
      }
      print("\n<!-- CORE ".$errtype.' [ '."\n\t($errno)  $errstr\n\tLigne : $errline\n\tFichier : $errfile\n ]\n -->\n");

      print("<!-- CORE Backtrace :\n");

      foreach(debug_backtrace() as $k=>$v)
      {
        if($v['function'] == "include" || $v['function'] == "include_once" || $v['function'] == "require_once" || $v['function'] == "require")
        {
          print("\t#".$k." ".$v['function']."(".$v['args'][0].") called at [".$v['file'].":".$v['line']."]\n");
        } else {
          print("\t#".$k." ".$v['function']."() called at [".$v['file'].":".$v['line']."]\n");
        }
      }
      print("-->\n");
    }

    set_error_handler('error_handler');
  }
}
$CORE['STATUS'] = STATUS;

/*
 * Setting browser info
 */
//TODO: filtering browser_ip
foreach($_SERVER as $k => $v) {
  switch($k) {
  case 'HTTP_VIA': $CORE['browser_ip'] = $v; break;
  case 'HTTP_CLIENT_IP': $CORE['browser_ip'] = $v; break;
  case 'HTTP_FORWARDED_FOR': $CORE['browser_ip'] = $v; break;
  case 'HTTP_X_FORWARDED_FOR': $CORE['browser_ip'] = $v; break;
  case 'HTTP_PROXY_CONNECTION': $CORE['browser_ip'] = $v; break;
  case 'FORWARDED_FOR': $CORE['browser_ip'] = $v; break;
  case 'X_FORWARDED_FOR': $CORE['browser_ip'] = $v; break;
  case 'X_HTTP_FORWARDED_FOR': $CORE['browser_ip'] = $v; break;
  case 'FORWARDED_FOR': $CORE['browser_ip'] = $v; break;
  case 'HTTP_FORWARDED_FOR': $CORE['browser_ip'] = $v; break;
  case 'REMOTE_ADDR': $CORE['browser_ip'] = $v; break;
  }
}

if($_SERVER['QUERY_STRING'] == "" ) {
  $CORE['browser_qw']= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);
} else {
  $CORE['browser_qw']= htmlentities($_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'], ENT_QUOTES);

}

if(isset($_SERVER['HTTP_REFERER'])) {
  $CORE['browser_ref'] = htmlentities($_SERVER['HTTP_REFERER'], ENT_QUOTES);
} else {
  $CORE['browser_ref'] = 'no referer';
}

if(isset($_SERVER['HTTP_USER_AGENT'])) {
  $CORE['browser_ua'] = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES);
  // if(preg_match('/2010021508/i', $CORE['browser_ua'])) { define('DBG', true); } else { define('DBG', false); }
} else {
  $CORE['browser_ua'] = 'no user agent';
}

if(isset($_SERVER['REQUEST_METHOD'])) {
  $CORE['browser_method'] = htmlentities($_SERVER['REQUEST_METHOD'], ENT_QUOTES);
} else {
  $CORE['browser_method'] = 'no request';
}

if(isset($_COOKIE)) {
  $CORE['browser_cookie'] = $_COOKIE;
} elseif(isset($HTTP_COOKIE_VARS)) {
  $CORE['browser_cookie'] = htmlentities($HTTP_COOKIE_VARS, ENT_QUOTES);
} else {
  $CORE['browser_cookie'] = 'no cookie';
}
if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
  $CORE['browser_language'] = strtoupper(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2));
} else {
  $CORE['browser_language'] = 'no language';
}

/*
 * Filtering inputs
 */
//Todo:
/*
foreach ($_COOKIE as &$cookie) {
  $cookie = trim(strip_tags(@mysqli_real_escape_string($mySQL, $cookie)));
}

foreach ($_POST as &$post)
{
  if (is_array($post))
  {
    foreach ($post as &$_post) {
      $_post = trim(strip_tags(@mysqli_real_escape_string($mySQL, $_post)));
    }
  } else {
    $post = trim(strip_tags(@mysqli_real_escape_string($mySQL, $post)));
  }
}
*/

/*
 * Setting Date timezone
 */

date_default_timezone_set(TIMEZONE);

// sql date datetime NOT NULL default '0000-00-00 00:00:00'
$CORE['DATE'] = date('Y-m-d H:i:s',time());

/*
 * Setting Locales
 */

//TODO: Get browser locales
switch (LOCALE)
{
  case 'FR_fr':
   $jours = date('d-m-Y',time());
   $heure = date('H:i',time());
   $index = date('n',time());
   $an = date('Y',time());
   $mois = array(
     'Janvier','F&ecute;vrier','Mars','Avril','Mai','Juin','Juillet',
     'A&ocirc;ut','Septembre','Octobre','Novembre','D&ecute;cembre'
   );
  break;

  case 'EN_us': 
    $jours = date('Y-m-d',time());
    $heure = date('H:i',time());
    $index = date('n',time());
    $an = date('Y',time());
    $mois = array(
      'January','Febrary','March','April','May','Jun',
      'July','August','September','October','November','December'
    );
  break;
}
$CORE['LOCALES'] = LOCALE;

if(URL_REWRITE) $CORE['URL_RW'] = 1; else $CORE['URL_RW'] = 0;

if(CACHE) $CORE['CACHE'] = 1; else $CORE['CACHE'] = 0;

if(CAS_AUTH) $CORE['CAS'] = 1; else $CORE['CAS'] = 0;

/*
 * Check if client support gzip encoding
 * else starting output buffering whithout gzip compression  
 */

if(COMPRESION_HANDLER)
{
  if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'],'gzip'))
  {
    ob_start('ob_gzhandler'); $CORE['GZIP'] = 1;
  } else {
    ob_start(); $CORE['GZIP'] = 0;
  }
} else { ob_start(); $CORE['GZIP'] = 0; }

/*
 * Process Queries
 */

require_once(CORE_PATH.'core.php');

?>
