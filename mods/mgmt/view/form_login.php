    <div class="container-fluid">
      <div class="page-header">
        <h2><?php print($MOD['LINKS_DESC'][$MOD['ACTION']])?></h2>
      </div>
      <p>Vous devez vous authentifier pour utiliser ce service.</p>
      <br>
      <form method="post" action="<?php print($MOD['LINKS'][$MOD['ACTION']])?>">
        <label for="username">Nom d'utilisateur </label>
        <div class="div_text">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span><input name="login" type="text" id="log inputIcon" value="" class="username span2">
          </div>
        </div>
        <label for="password">Mot de passe </label>
        <div class="div_text">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span><input name="password" type="password" id="pwd inputIcon" class="password span2">
          </div>
        </div>
        <input name="a" type="hidden" value="login">
        <div class="button_div">
          <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Se souvenir de moi ? <button class="btn btn-primary" type="submit">Se connecter <i class="icon-white icon-ok-sign"></i> </button>
        </div>
        <br>
        <div>Forgot password? <a href="">Click here to reset</a></div>
        <div>New User? <a href="">Click here to register</a></div>
      </form>
    </div>
