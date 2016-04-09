    <div class="container">
      <div class="page-header">
        <h2><?php print($MOD['LINKS_DESC'][$MOD['ACTION']]." :") ?></h2>
      </div>
      <pre>
      <?php foreach($output as $line){ print("<p>".$line."</p>"); } ?>
      </pre>
      <br>
      <button class="btn btn-primary"><a style="color:white" href="javascript:history.back()"><i class="icon-white icon-chevron-left"></i> Retour</a></button>
    </div>
