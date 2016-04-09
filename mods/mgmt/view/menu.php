<?php

$menu = $MOD['LINKS'];

if(isset($_SESSION['auth']))
{
  unset($menu['login']);
} else {
  unset($menu['logout']);
}

?>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/">mgmt</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
<?php

foreach($menu as $name => $links)
{
  if($name == $MOD['ACTION']) { $class = 'active'; } else { $class = 'inactive'; }
  print("              <li class=\"".$class."\"><a href=\"".$links."\">".$MOD['LINKS_ICON'][$name].$MOD['LINKS_DESC'][$name]."</a></li>\n");
}

?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
