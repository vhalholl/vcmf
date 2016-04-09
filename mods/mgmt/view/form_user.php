    <div class="container">
      <div class="page-header">
        <h2><?php print($MOD['LINKS_DESC'][$MOD['ACTION']])?></h2>
      </div>
      <div class="input-prepend input-append">
        <form method="get" action"<?php print($MOD['LINKS'][$MOD['ACTION']])?>">
          <span class="add-on">Nom d'utilisateur :</span>
          <input type="text" name="arg" value="web-user" onclick="this.value='';" />
          <!-- <input type="submit" value="Envoyer" /> -->
          <button class="btn btn-primary" type="submit">Envoyer <i class="icon-white icon-ok-sign"></i> </button>
        </form>
      </div>
      <p>Ou</p>
      <br>
        <form method="post" action="<?php print($MOD['LINKS'][$MOD['ACTION']])?>" enctype="multipart/form-data">
          <input type="file" name="file" id="file" style="display:none"/>
          <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
          <!-- <input type="submit" name="submit" value="Envoyer" /> -->
          <div class="input-prepend input-append">
            <span class="add-on">Liste d'utilisateurs (.txt | max. 1 Mo) :</span>
            <input type="text" id="fileb" name="fileb" class="input-large" value="/path/to/file.txt" />
            <a class="btn" onclick="$('input[id=file]').click();">Naviguez <i class="icon-upload"></i> </a>
            <script type="text/javascript">$('input[id=file]').change(function() { $('#fileb').val($(this).val()); });</script>
            <button class="btn btn-primary" type="submit">Envoyer <i class="icon-white icon-ok-sign"></i> </button>
          </div>
    </form>
    <!-- options :
      mod_rewrite ?[]
      webmaster mail ? [_____]
    -->
    </div>
