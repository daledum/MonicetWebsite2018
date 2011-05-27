<div id="sf_admin_container">
  <h1>Exportar ficheiro</h1>
  <form method="post" action="<?php echo url_for('general_info/download') ?>" enctype="multipart/form-data">
    <b style="margin: 10px;" >Seleccione o ano que deseja exportar:</b>
    <br />
    <fieldset id="sf_fieldset_none"></fieldset>
    <div class="sf_admin_form_row">
      <div>
        <label for="year">Ano:</label>
        <div class="content">
          <select id="year" name="year">
            <option value="<?php echo $years[0] ?>" selected="selected"><?php echo $years[0] ?></option>
            <?php for($i = 1; $i < count($years); $i++): ?>
            <option value="<?php echo $years[$i] ?>"><?php echo $years[$i] ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
    </div>
    <ul class="sf_admin_actions">
      <li><input type="submit" value="Exportar" /></li>
    </ul>
  </form>
</div>