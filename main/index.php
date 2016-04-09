
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html id="html-dosi" xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" version="XHTML 1.0 Transitional">
  <head>
    <title>SRV 01</title>
    <!-- META -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/">SRV 01</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
<?php

foreach(unserialize($CORE['MODULES']) as $project)
{
  if($CORE['URL_RW'] == TRUE)
  {
    $index = "/$project.index.html";
  } else {
    $index = "/index.php?mod=$project&do=index";
  }
  print("\t\t<li class=\"inactive\"><a href=\"$index\"><i class=\"icon-white icon-folder-open\"></i> $project</a></li>\n");
}
?>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class ="page-header">
          <h1>DOSI-HB01</h1>
        </div>
        <h3>Applications disponibles</h3>
        <p>Voici la liste des applications disponnibles :</p>

        <div class="pagination" style="margin-left:auto;margin-right:auto;width:30%;" id="Apps">
          <div class="accordion-group">
<?php
foreach(unserialize($CORE['MODULES']) as $project)
{
  if($CORE['URL_RW'] == TRUE)
  {
    $index = "/$project.index.html";
  } else {
    $index = "/index.php?mod=$project&do=index";
  }
  print("
            <button class=\"btn btn-primary accordion-heading\" data-toggle=\"collapse\" data-parent=\"#Apps\" data-target=\"#item-$project\"><i class=\"icon-white icon-folder-open\"></i> $project</button>
            <div id=\"item-$project\" class=\"collapse accordion-group in\">
              <div class=\"accordion-inner\"><a href=\"$index\">$project</a> ".$MOD['MODULES_DESCRIPTION'][$project]." </div>
            </div>\n");
}
?>
            <button class="btn btn-primary accordion-heading" data-toggle="collapse" data-parent="#Apps" data-target="#item-stat"><i class="icon-white icon-folder-open"></i> AStats </button>
            <div id="item-stat" class="collapse accordion-group in">
              <div class="accordion-inner"><a href="/server-status">Statistiques Apache</a></div>
            </div>

          </div>
        </div>
      </div><!-- container-fluid -->
    </div>
  </body>
</html>
