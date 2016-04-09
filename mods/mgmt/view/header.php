<?php #TODO: switch to *.min.{js,css} in production
header("Expires: " . date("D, d M Y ") . date("H:")+2 . date("i:s") ." GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html id="html-dosi" xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" version="XHTML 1.0 Transitional">
  <head>
    <title><?php print($MOD['NAME'].'::'.$MOD['ACTION']) ?></title>

    <!-- META -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Language" content="french">
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Sysadmin <mailto:sysadmin@vhalholl.info>" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <Link rel="stylesheet" type="text/css" href="css/dosi.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- JAVASCRIPT -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

  </head>
  <body>
    <noscript>
      <div id="nsbanner"><p><i class="icon-info-sign"></i> L'activation de Javascript est nécessaire pour le bon fonctionnement de ce service !</p></div>
    </noscript>
    <div class="main pagination-centered">

