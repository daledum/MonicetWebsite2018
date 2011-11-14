<tr class="sf_admin_row odd watch_sighting_line_<?php echo $n_lines; ?>">
    <td class="sf_admin_text line_id"><?php echo $n_lines ?><input type="hidden" class="sighting_id" value="0" />
    <td class="sf_admin_text watch_sighting_code">
        <select id="watch_sighting_code_id_<?php echo $n_lines ?>" name="watch_sighting[code_id]" class="change">
            <?php if($n_lines == 1): ?>
            <option>-----</option>
            <option value="1" selected="selected">I</option>
            <?php endif; ?>
        </select>
    </td>
    <td class="sf_admin_text hour"><?php echo $sighting_form['time']; ?></td>
	<td class="sf_admin_text visibility"><?php echo $sighting_form['watch_visibility_id']; ?></td>
	<td class="sf_admin_text specie"><?php echo $sighting_form['specie_id']; ?></td>
	<td class="sf_admin_text group"><?php echo $sighting_form['group']; ?></td>
	<td class="sf_admin_text total"><?php echo $sighting_form['total']; ?></td>
	<td class="sf_admin_text behaviour"><?php echo $sighting_form['behaviour_id']; ?></td>
	<td class="sf_admin_text direction"><?php echo $sighting_form['direction_id']; ?></td>
	<td class="sf_admin_text horizontal"><?php echo $sighting_form['horizontal']; ?></td>
	<td class="sf_admin_text vertical"><?php echo $sighting_form['vertical']; ?></td>
	<td class="sf_admin_text vessel"><?php echo $sighting_form['vessel_id']; ?></td>
	<td class="sf_admin_text comments"><?php echo $sighting_form['comments']; ?></td>
  <td class="sf_admin_text remove"><div class="remove-line-div" style="margin-top: 10px;"><a href="#" class="remove-line"><img src="/images/backend/icons/garbage.png" width="20"></a></div></td>
  <?php echo $sighting_form['_csrf_token']; ?>
</tr>

<script type="text/javascript">
    
    
    $("#watch_sighting_code_id_<?php echo $n_lines ?>").change(function(){
      for(i=<?php echo $n_lines+1 ?>; i<=$("#n-lines").val(); i++){
        $("#watch_sighting_code_id_"+i).children().remove();
        $("#watch_sighting_code_id_"+i).append('<option selected="selected">-----</option>');
      }

      $.ajax({
        type: "get",
        datatype: "html",
        url: url[0] + "//" + url[2] + "/" + url[3] + "/watch_sighting/lineAjax",
        data: { valor: $("#watch_sighting_code_id_<?php echo $n_lines ?>").val(), '_r': Math.random()*100 },
        success: function(html){
            $("#watch_sighting_code_id_<?php echo $n_lines+1 ?>").append(html);
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
            url: url[0] + "//" + url[2] + "/" + url[3] + "/watch_sighting/lineAjax",
            data: { valor: $("#watch_sighting_code_id_<?php echo $n_lines-1 ?>").val(), '_r': Math.random()*100 },
            success: function(html){
                $("#watch_sighting_code_id_<?php echo $n_lines ?>").children().remove();
                $("#watch_sighting_code_id_<?php echo $n_lines ?>").append('<option selected="selected">-----</option>');
                $("#watch_sighting_code_id_<?php echo $n_lines ?>").append(html);
            },
            error: function(html, text, codigo){
              alert("erro");
            }
          });
        }
    
    });
    
    
</script>
