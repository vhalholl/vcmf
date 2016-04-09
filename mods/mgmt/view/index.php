    <div class="container-fluid">
      <div class="page-header">
        <h2><?php print($MOD['LINKS_DESC'][$MOD['ACTION']]) ?></h2>
        <p style="font-weight:bold">Bonjour <em><?php print($_SESSION['user']) ?></em> et bienvenue sur la plateforme d'hébergement web mutualisé de la <abbr title="Direction Opérationelle des Systèmes d'Information">D.O.S.I</abbr></p>
        <p>Cette interface est en cours de <em>develloppement</em>, vous trouverez la documentation <a target="_blank" href="http://projets.univ-amu.fr/documents/390">ici</a>.</p>
      </div>

      <div class="input-append">
        <a style="width:250px" class="btn btn-info" href="<?php print($MOD['LINKS']['listwebusers']) ?>"><?php print($MOD['LINKS_ICON']['listwebusers'].$MOD['LINKS_DESC']['listwebusers']) ?></a><span style="width:400px" class="add-on">Listing des utilisateurs éxistants</span>
      </div>
      <p>Cette page vous permet de lister et efectuer des opérations sur les utilisateurs existants.</p>
      <div class="input-append"><a style="width:250px" class="btn btn-success" href="<?php print($MOD['LINKS']['createwebusers']) ?>"><?php print($MOD['LINKS_ICON']['createwebusers'].$MOD['LINKS_DESC']['createwebusers']) ?></a><span style="width:400px" class="add-on">Formulaire de création des utilisateurs</span>
      </div>
      <p>Cette page vous permet de créer ou de vérifier l'existance d'un ou plusieurs utilisateurs.</p>
      <div class="input-append"><a style="width:250px" class="btn btn-warning" href="<?php print($MOD['LINKS']['changewebusers']) ?>"><?php print($MOD['LINKS_ICON']['changewebusers'].$MOD['LINKS_DESC']['changewebusers']) ?></a><span style="width:400px" class="add-on">Formulaire de modification des mots de passe utilisateurs</span>
      </div>
      <p>Cette page vous permet de générer un nouveau mot de passe, pour un ou plusieurs utilisateurs .</p>
      <div class="input-append"><a style="width:250px" class="btn btn-danger" href="<?php print($MOD['LINKS']['removewebusers']) ?>"><?php print($MOD['LINKS_ICON']['removewebusers'].$MOD['LINKS_DESC']['removewebusers']) ?></a><span style="width:400px" class="add-on">Formulaire de suppression des utilisateurs</span>
      </div>
      <p>Cette page vous permet de supprimer ou de vériifier la non-existance d'un ou plusieurs utilisateurs.</p>

      <div class="input-append"><a style="width:250px" class="btn btn" href="<?php print($MOD['LINKS']['config']) ?>"><?php print($MOD['LINKS_ICON']['config'].$MOD['LINKS_DESC']['config'])?></a><span style="width:400px" class="add-on">Formulaire de configuration de l'application</span>
      </div>
      <p>Cette page n'est pas encore disponnible.</p>

    </div><!--/.container-fluid-->
