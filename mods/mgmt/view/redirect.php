      <script language="javascript" type="text/javascript">
        var count=9;
        var bar=1;
        function countdown() { 
          document.getElementById("count").innerHTML = count; count--;
          $(".bar").css("width", (bar *  10 ) + "%"); bar++;
        }
        setInterval('countdown()',1000);
      </script>

      <div class="container-fluid">
        <div class="page-header">
          <h2>Redirection<h2>
        </div>
        <div>
          <i class="icon-large icon-lock"></i>
          <p><br></p>
          <p>Bonjour, vous n'êtes pas authentifié !</p>
          <p>Vous allez être redirigé vers la page de connexion dans <span id="count">10</span> secondes.</p>
          <br>
          <div style="margin-left:auto;margin-right:auto;width:30%" class="progress progress-info progress-striped">
            <div class="bar"></div>
          </div>
          <br>
          <p>Si cela ne fonctionne pas cliquez ici : <a href="<?php print($MOD['LINKS']['login']); ?>"><?php print($MOD['LINKS_DESC']['login']); ?></a>.</p>
        </div>
      </div>
<?php

//header("location: ".$MOD['LINKS']['login']);
header("Refresh: 10;".$MOD['LINKS']['login']);

?>

