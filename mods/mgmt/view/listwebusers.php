    <div class="container">
    <div class="page-header">
      <h2><?php print($MOD['LINKS_DESC'][$MOD['ACTION']])?></h2>
    </div>
      <div class="input-prepend input-append">
<?php

foreach($output as $user)
{
  $user=rtrim($user);
  print("\t<pre><p><span style=\"font-weight:bold\" class=\"add-on\"><i class=\"icon-user\"></i> $user </span><a class=\"btn alert-success\" target=\"_blank\" href=\"http://".str_replace("admin", "",$user).".univ-amu.fr/\">Prévisualiser <i class=\"icon-search\"></i></a></p><p><a class=\"btn alert-error\" data-toggle=\"modal\" href=\"#remove-$user\"><i class=\"icon-remove\"></i> Suppression</a><a class=\"btn alert-info\" data-toggle=\"modal\" href=\"#change-$user\">Nouveau mot de passe <i class=\"icon-refresh\"></i></a></p></pre>

      <!-- Modal -->
      <div id=\"remove-$user\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"rm-$user\" aria-hidden=\"true\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
          <h3>Supression de l'utilisateur !</h3>
        </div>
        <div class=\"modal-body alert-error\">
        <h2>Utilisateur : $user</h2>
          <h1 style=\"color:black\" >Etes vous sûr ?</h1>
          <h3 style=\"color:red\" >Cette supression est définitive !</h3>
        </div>
        <div class=\"modal-footer\">
          <button class=\"btn btn-success\" data-dismiss=\"modal\" aria-hidden=\"true\">Annuler</button>
          <button class=\"btn btn-danger\"><a style=\"color:white\" href=\"".$MOD['LINKS']['removewebusers']."?arg=$user\">Supprimer <i class=\"icon-white icon-ok-sign\"></i></a></button>
        </div>
      </div>

      <div id=\"change-$user\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"ch-$user\" aria-hidden=\"true\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
          <h3>Modification du mot de passe !</h3>
        </div>
        <div class=\"modal-body alert-info\">
        <h2>Utilisateur : $user</h2>
        <h1 style=\"color:black\" >Etes vous sûr ?</h1>
          <h3 style=\"color:red\" >Cette modification est définitive !</h3>
        </div>
        <div class=\"modal-footer\">
          <button class=\"btn btn-success\" data-dismiss=\"modal\" aria-hidden=\"true\">Annuler</button>
          <button class=\"btn btn-danger\"><a style=\"color:white\" href=\"".$MOD['LINKS']['changewebusers']."?arg=$user\">Modifier <i class=\"icon-white icon-ok-sign\"></i></a></button>
        </div>
      </div>\n");
}
?>
      </div>
    </div>
