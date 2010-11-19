<?php
  if($n_lines == 1){
    $record_form->setDefault('latitude',$latitude);
    $record_form->setDefault('longitude',$longitude);
  }
?>

<tr class="sf_admin_row odd record_line_<?php echo $n_lines; ?>">
  <?php /*<td class="sf_admin_text record_code"><?php echo $record_form['code_id']; ?></td>*/ ?>
  <td class="sf_admin_text line_id"><?php echo $n_lines ?><input type="hidden" class="record_id" value="0" /><input type="hidden" class="sighting_id" value="0" /></td>
  <td class="sf_admin_text record_code">
    <select id="record_code_id_<?php echo $n_lines ?>" name="record[code_id]" class="change">
      <?php if($n_lines == 1): ?>
        <option>-----</option>
        <option value="1" selected="selected">I</option>
      <?php endif; ?>
    </select>
  </td>
  <td class="sf_admin_text hour"><?php echo $record_form['time']; ?></td>
  <td class="sf_admin_text latitude"><?php echo $record_form['latitude']; ?></td>
  <td class="sf_admin_text longitude"><?php echo $record_form['longitude']; ?></td>
  <td class="sf_admin_text sea_state"><?php echo $record_form['sea_state_id']; ?></td>
  <td class="sf_admin_text visibility"><?php echo $record_form['visibility_id']; ?></td>
  <td class="sf_admin_text specie"><?php echo $sighting_form['specie_id']; ?></td>
  <td class="sf_admin_text total"><?php echo $sighting_form['total']; ?></td>
  <td class="sf_admin_text adults"><?php echo $sighting_form['adults']; ?></td>
  <td class="sf_admin_text juveniles"><?php echo $sighting_form['juveniles']; ?></td>
  <td class="sf_admin_text cubs"><?php echo $sighting_form['cubs']; ?></td>
  <td class="sf_admin_text behaviour"><?php echo $sighting_form['behaviour_id']; ?></td>
  <td class="sf_admin_text association"><?php echo $sighting_form['association_id']; ?></td>
  <td class="sf_admin_text num_vessels"><?php echo $record_form['num_vessels']; ?></td>
  <td class="sf_admin_text comments"><?php echo $sighting_form['comments']; ?></td>
  <?php echo $record_form['_csrf_token']; ?>
  <?php echo $sighting_form['_csrf_token']; ?>
</tr>

<script type="text/javascript">
    
    
    $("#record_code_id_<?php echo $n_lines ?>").change(function(){
      for(i=<?php echo $n_lines+1 ?>; i<=$("#n-lines").val(); i++){
        $("#record_code_id_"+i).children().remove();
        $("#record_code_id_"+i).append('<option selected="selected">-----</option>');
      }

      $.ajax({
        type: "get",
        datatype: "html",
        url: url[0] + "//" + url[2] + "/" + url[3] + "/record/lineAjax",
        data: { valor: $("#record_code_id_<?php echo $n_lines ?>").val(), '_r': Math.random()*100 },
        success: function(html){
          if( $("#record_code_id_<?php echo $n_lines ?>").val() != 2 ){
            $("#record_code_id_<?php echo $n_lines+1 ?>").append(html);
          }
        },
        error: function(html, text, codigo){
          alert("erro");
        }
      });
    });
        
    $(document).ready(function() {
        
        if( <?php echo $n_lines-1 ?> > 0 ){
          $.ajax({
            type: "get",
            datatype: "html",
            url: url[0] + "//" + url[2] + "/" + url[3] + "/record/lineAjax",
            data: { valor: $("#record_code_id_<?php echo $n_lines-1 ?>").val(), '_r': Math.random()*100 },
            success: function(html){
              if( $("#record_code_id_<?php echo $n_lines-1 ?>").val() != 2 ){
                $("#record_code_id_<?php echo $n_lines ?>").children().remove();
                $("#record_code_id_<?php echo $n_lines ?>").append('<option selected="selected">-----</option>');
                $("#record_code_id_<?php echo $n_lines ?>").append(html);
              }
            },
            error: function(html, text, codigo){
              alert("erro");
            }
          });
        }
    
    });
    
    
</script>
