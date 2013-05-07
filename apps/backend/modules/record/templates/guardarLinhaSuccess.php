  <span style="font-weight: bold; font-size: 14px; float: left;">Linha <?php echo $linha ?>:&nbsp;</span>
  <?php if($erro): ?>
    
    <div style="text-align: left;">
      <?php foreach($recordForm as $field): ?>
        <?php if ($field->hasError()): ?>
          <br />
          <?php echo '--- '.strip_tags($field->renderLabel()).' --- ' ?> <span style="color: red;font-size: 12px;"><?php echo strip_tags($field->renderError()); ?></span>
        <?php endif; ?>
      <?php endforeach; ?>
      <?php foreach($sightingForm as $field): ?>
        <?php if ($field->hasError()): ?>
          <br />
          <?php echo '--- '.strip_tags($field->renderLabel()).' --- ' ?> <span style="color: red;font-size: 12px;"><?php echo strip_tags($field->renderError()); ?></span>
        <?php endif; ?>
      <?php endforeach; ?>
      <hr style="clear:both;"/>
    </div>
  <?php else: ?>
    <span style="color: green; font-weight: bold; font-size: 14px; float: left;">OK</span>
    <hr style="clear:both;"/>

    <?php if($last_record): ?>
      <h2 style="color: green; font-weight: bold; font-size: 16px; margin-top:10px;">Dados gravados com sucesso!</h2>
    <?php endif; ?>

    <script type="text/javascript">
      $(function() {
        $("tr.record_line_<?php echo $linha ?> td.line_id").html("<?php echo $linha ?><input type='hidden' class='record_id' value='<?php echo $record->getId() ?>' /> <input class='sighting_id' type='hidden' value='<?php echo $sighting->getId() ?>' />");
      });
    </script>

  <?php endif; ?>