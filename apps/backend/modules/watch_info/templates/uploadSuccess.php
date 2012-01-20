<div id="sf_admin_container">
  <h1>Importar ficheiro</h1>
  <form method="post" action="<?php echo url_for('watch_info/upload') ?>" enctype="multipart/form-data">
    <b style="margin: 10px;" >Seleccione o ficheiro a importar (.xls):</b>
    <br />
    <table>
      <?php echo $form ?>
    </table>
    <ul class="sf_admin_actions">
      <li><input type="submit" value="importar" /></li>
    </ul>
  </form>
</div>