<div id="sf_admin_container">
  <h1>Exportar ficheiro</h1>
  <form method="post" action="<?php echo url_for('general_info/download') ?>" enctype="multipart/form-data">
    <b style="margin: 10px;" >Seleccione o ano que deseja exportar:</b>
    <br />
    <fieldset id="sf_fieldset_none"></fieldset>
    <div class="sf_admin_form_row">
      <div>
        <label for="year">Data:</label>
        <div class="content">
          <select id="year" name="year">
            <option value="<?php echo $years[0] ?>" selected="selected"><?php echo $years[0] ?></option>
            <?php for($i = 1; $i < count($years); $i++): ?>
            <option value="<?php echo $years[$i] ?>"><?php echo $years[$i] ?></option>
            <?php endfor; ?>
          </select>
          <select id="month" name="month">
            <option value="0" selected="selected">(Todos os meses)</option>
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
          </select>
        </div>
      </div>
    </div>
    <ul class="sf_admin_actions">
      <li><input type="submit" value="Exportar" /></li>
    </ul>
  </form>
</div>