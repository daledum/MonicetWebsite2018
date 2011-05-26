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
            <option value="2011" selected="selected">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
          </select>
        </div>
      </div>
    </div>
    <ul class="sf_admin_actions">
      <li><input type="submit" value="Exportar" /></li>
    </ul>
  </form>
</div>