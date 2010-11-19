<?php if($erro): ?>
  <p>Foram encontrados os seguintes erros na linha <?php echo $linha ?>:</p>
  <br />
  <div style="text-align: left;">
  <?php //echo '<br />Campos Record: <br />'; ?>
  <?php foreach($recordForm as $field): ?>
    <?php if ($field->hasError()): ?>
      <ul class="error_list" style="font-weight:bold;color:red; border-bottom:1px solid gray; padding-bottom: 20px;"><?php echo $field->renderLabel().':' ?>
        <?php echo $field->renderError(); ?>
      </ul>
      <br />
    <?php endif; ?>
  <?php endforeach; ?>
  <?php //echo '<br /> Campos Sighting: <br />'; ?>
  <?php foreach($sightingForm as $field): ?>
    <?php if ($field->hasError()): ?>
      <ul class="error_list">- <?php echo $field->renderLabel().':' ?>
        <?php echo $field->renderError(); ?>
      </ul>
      <br />
    <?php endif; ?>
  <?php endforeach; ?>
  </div>
<?php else: ?>
<?php if($last_record): ?>
  <h2 style="color: green; font-weight: bold; font-size: 16px; margin-top:50px;">Dados gravados com sucesso!</h2>
<?php endif; ?>

<script type="text/javascript">
  $(function() {
    $("tr.record_line_<?php echo $linha ?> td.line_id").html("<?php echo $linha ?><input type='hidden' class='record_id' value='<?php echo $record->getId() ?>' /> <input class='sighting_id' type='hidden' value='<?php echo $sighting->getId() ?>' />");
  });
</script>

<?php endif; ?>