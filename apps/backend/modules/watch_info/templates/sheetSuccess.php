<script type="text/javascript">
    var url = window.location.href.split('/');
    
    function appendNewWatchSightingLine() {
        $.ajax({
            type: "POST",   
            url: url[0] + "//" + url[2] + "/" + url[3] + "/watch_sighting/line/", 
            async: false,
            data: {
                n_lines: $('#n-lines').val(),
                '_r': Math.random()*100
            },
            success: function(msg) {
                 $('.remove-line-div').remove();
                 $('div.sf_admin_list table tbody').append(msg);
                 $('#n-lines').val(parseInt($('#n-lines').val()) + 1);
                 $('a.remove-line').click(function() {
                     removeWatchSightingLine();
                     return false;
                 });
                 
             }
        });
    }
    
    function removeWatchSightingLine() {
        
        $('tr.watch_sighting_line_'+$('#n-lines').val()).remove();
        $('#n-lines').val(parseInt($('#n-lines').val()) - 1);
        $('tr.watch_sighting_line_'+$('#n-lines').val()+' td.remove').append('<div class="remove-line-div" style="margin-top: 10px;"><a href="#" class="remove-line"><img src="/images/backend/icons/garbage.png" width="20"></a></div>');
        $('a.remove-line').click(function() {
            removeWatchSightingLine();
            return false;
        });
    }
    
    
    function saveAllLines(){
        var success = false;
        var n_lines = $('#n-lines').val();
        var fim = false;
        $('#erros').empty();
        $("#progressbar").progressbar({value: 0});
        for(i = 1 ; i<=n_lines ; i++){
          if( !fim ){
            $.ajax({
                type: "POST",   
                url: url[0] + "//" + url[2] + "/" + url[3] + "/watch_sighting/guardarLinha", 
                data: {
                    "number_of_rows": n_lines, 
                    "watch_info_id": <?php echo $watch_info->getId();?>,
                    
                    "watch_sighting_id":                   $("tr.watch_sighting_line_" + i + " .watch_sighting_id").val(),
                    "watch_sighting[watch_code_id]":       $("tr.watch_sighting_line_" + i + " #watch_sighting_code_id_" + i + " option:selected").val(),
                    "watch_sighting[time]":                $("tr.watch_sighting_line_" + i + " #watch_sighting_time").val(),
                    "watch_sighting[watch_visibility_id]": $("tr.watch_sighting_line_" + i + " #watch_sighting_watch_visibility_id option:selected").val(),
                    "watch_sighting[specie_id]":           $("tr.watch_sighting_line_" + i + " #watch_sighting_specie_id option:selected").val(),
                    "watch_sighting[group]":               $("tr.watch_sighting_line_" + i + " #watch_sighting_group").val(),
                    "watch_sighting[total]":               $("tr.watch_sighting_line_" + i + " #watch_sighting_total").val(),
                    "watch_sighting[behaviour_id]":        $("tr.watch_sighting_line_" + i + " #watch_sighting_behaviour_id option:selected").val(),
                    "watch_sighting[direction_id]":        $("tr.watch_sighting_line_" + i + " #watch_sighting_direction_id option:selected").val(),
                    "watch_sighting[horizontal]":          $("tr.watch_sighting_line_" + i + " #watch_sighting_horizontal").val(),
                    "watch_sighting[vertical]":            $("tr.watch_sighting_line_" + i + " #watch_sighting_vertical").val(),
                    "watch_sighting[vessel_id]":           $("tr.watch_sighting_line_" + i + " #watch_sighting_vessel_id").val(),
                    "watch_sighting[comments]":            $("tr.watch_sighting_line_" + i + " #watch_sighting_comments").val(),
                    "watch_sighting[_csrf_token]":         $("tr.watch_sighting_line_" + i + " #watch_sighting__csrf_token").val(),
                    
                    "linha" : i,
                    "_r": Math.random()*100
                },
                async: false,
                success: function(msg) {
                  $('#erros').append(msg);
                }
            });
            //return success;
            $("#progressbar").progressbar({value: (i/n_lines)*100});
          }
          if( $("tr.watch_sighting_line_" + i + " #record_code_id_" + i + " option:selected").val() == 2) fim = true;
        }
        
        $.ajax({
            type: "POST",   
            url: url[0] + "//" + url[2] + "/" + url[3] + "/watch_info/validation", 
            data: {
                watch_info_id: <?php echo $watch_info->getId();?>,
                
                "valid":           $("#watch_info_valid").attr('checked'),
                "comments":        $("#watch_info_comments").val(),
                "watch_info_id": <?php echo $watch_info->getId() ?>,
                
                "_r": Math.random()*100
            },
            async: false,
            success: function(msg) {
              
            }
        });
        

        $('#erros').dialog('open');
    }
    
    
    

    $(function() {
    	if ($('div.sf_admin_list table tbody').find('tr').length == 0) {
    		appendNewWatchSightingLine();
    	}
    	
        $('a.add-new-line').click(function() {
            appendNewWatchSightingLine();
            return false;
        });
        
        $('a.remove-line').click(function() {
            removeWatchSightingLine();
            return false;
        });

        $('#help-icon').click(function() {
        	window.open(url[0] + "//" + url[2] + "/" + url[3] + "/watch_sighting/help/", "Ajuda", "status = 1, height = 600, width = 450, resizable = 0, scrollbars=yes");
          return false;
        }); 
    });
</script>

<style type="text/css">
    table#watch-info-summary td, table#watch-info-summary th {
        padding: 0px 15px;
    }
    table td, table th {
        text-align:center !important;
    }
    table td {
        padding-top: 4px !important;
    }
    .sf_admin_list table {
        width: 98% !important;
        margin: 5px auto !important;
    }
</style>
<div id="sf_admin_container">
  <h1>Saída - <strong><?php if($watch_info) { echo $watch_info->getCode(); } ?></strong><span id="help-icon"></span></h1>
  <table id="watch-info-summary" style="margin-left:10px;border:1px solid #ccc;" border="1">
	  <thead>
	    <tr>
	        <th>Código</th>
	        <th>Data</th>
	        <th>Posto</th>
	        <th>Vigia</th>
	        <th>Latitude Base</th>
	        <th>Longitude Base</th>
	        <th>Criado por</th>
	        <th>Actualizado por</th>
	    </tr>
	  </thead>
      <tbody>
        <tr>
            <td><?php echo $watch_info->getCode();?></td>
            <td><?php echo $watch_info->getDate();?></td>
            <td><?php echo $watch_info->getWatchPost();?></td>
            <td><?php echo $watch_info->getWatchman();?></td>
            <td><?php echo $watch_info->getBaseLatitude();?></td>
            <td><?php echo $watch_info->getBaseLongitude();?></td>
            <td><?php echo sfGuardUserPeer::retrieveByPk($watch_info->getCreatedBy()) ?></td>
            <td><?php echo sfGuardUserPeer::retrieveByPk($watch_info->getUpdatedBy()) ?></td>
        </tr>
      </tbody>    
  </table>
  
  <input id="n-lines" type="hidden" value="<?php echo $n_lines; ?>" />
  <input id="general_info_id" type="hidden" value="<?php echo $watch_info->getId(); ?>" />
  
  <div class="sf_admin_list">
    <?php if($sf_user->isSuperAdmin()): ?>
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
    <?php elseif($watch_info->getValid() != 1): ?>
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
    <?php endif; ?>
    <table style="margin-left:10px;border:1px solid #ccc;" border="1">
      <thead>
        <tr>
            <th class="sf_admin_text">Linha</th>
            <th class="sf_admin_text">Código</th>
            <th class="sf_admin_text">Hora</th>
            <th class="sf_admin_text">Vis.</th>
            <th class="sf_admin_text">Espécie</th>
            <th class="sf_admin_text">Grupo</th>
            <th class="sf_admin_text">Total</th>
            <th class="sf_admin_text">Comp.</th>
            <th class="sf_admin_text">Dir.</th>
            <th class="sf_admin_text">Horizontal</th>
            <th class="sf_admin_text">Vertical</th>
            <th class="sf_admin_text">Embarcação</th>
            <th class="sf_admin_text">Comentários</th>
            <th class="sf_admin_text" style="width: 4em;">Remover</th>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach($sightings as $x => $sighting): ?>
          <?php $sighting_form = new WatchSightingForm($sighting); ?>
          
          
          
          <tr class="sf_admin_row odd watch_sighting_line_<?php echo $i; ?>">
            <td class="sf_admin_text line_id"><?php echo $i; ?><input type="hidden" class="sighting_id" value="<?php echo $sighting->getId() ?>" />
            <td class="sf_admin_text watch_sighting_code">
              <select id="watch_sighting_code_id_<?php echo $i ?>" name="watch_sighting[code_id]" class="change">
                <?php if($i == 1): ?>
                  <option>-----</option>
                  <option value="1" selected="selected">I</option>
                <?php else: ?>
                  <option>-----</option>
                  <?php
                    $linhas = array();
                    if($sightings[$x-1]->getWatchCodeId() != 2){
                      $linhas = array('2' => 'F', '3' => 'R', '4' => 'RA');
                    }
                  ?>
                  <?php foreach($linhas as $index => $linha): ?>
                    <option value="<?php echo $index ?>" <?php if($index == $sighting->getWatchCodeId()) echo 'selected="selected"'; ?> ><?php echo $linha ?></option>
                  <?php endforeach; ?>
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
            <td class="sf_admin_text remove"><?php if($sightings[$x]->getWatchCodeId() == 2): ?><div class="remove-line-div" style="margin-top: 10px;"><a href="#" class="remove-line"><img src="/images/backend/icons/garbage.png" width="20"></a></div><?php endif; ?></td>
            <?php echo $sighting_form['_csrf_token']; ?>
          </tr>
          
          
          
          
          <script type="text/javascript">
          function load_select_<?php echo $i-1 ?>() {
			            
            $("#watch_sighting_code_id_<?php echo $i ?>").change(function(){
                for(i=<?php echo $i+1 ?>; i<=$("#n-lines").val(); i++){
                  $("#watch_sighting_code_id_"+i).children().remove();
                  $("#watch_sighting_code_id_"+i).append('<option>-----</option>');
                }
                
                $.ajax({
                  type: "get",
                  datatype: "html",
                  url: url[0] + "//" + url[2] + "/" + url[3] + "/watch_sighting/lineAjax",
                  data: { valor: $("#watch_sighting_code_id_<?php echo $i ?>").val(), '_r': Math.random()*100 },
                  success: function(html){
                      $("#watch_sighting_code_id_<?php echo $i+1 ?>").append(html);
                  },
                  error: function(html, text, codigo){
                    alert("erro");
                  }
                });
              });
          }; 
              
          $(document).ready(function() { 
             load_select_<?php echo $i-1 ?>();
          });
            
        </script>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php if($sf_user->isSuperAdmin()): ?>
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
    <?php elseif($watch_info->getValid() != 1): ?>
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
    <?php endif; ?>
    <div id="progressbar" style="display:inline-block;width:300px;"></div>
    <br />
    <ul>
      <li>
        <?php echo $wi_form['valid']->renderLabel().' '.$wi_form['valid'] ?>
      </li>
    </ul>
    <ul>
      <li>
        <?php echo $wi_form['comments']->renderLabel().' '.$wi_form['comments'] ?>
      </li>
    </ul>
    
    <?php if($sf_user->isSuperAdmin()): ?>
    <ul class="sf_admin_actions">
      <li class="sf_admin_action_save">
        <input type="button" value="Gravar" onClick="saveAllLines();" />
      </li>
    </ul>
    <?php elseif($watch_info->getValid() != 1): ?>
    <ul class="sf_admin_actions">
      <li class="sf_admin_action_save">
        <input type="button" value="Gravar" onClick="saveAllLines();" />
      </li>
    </ul>
    <?php endif; ?>
  </div>
</div>

<div id="erros" title="Gravar dados" style="display: none;">

</div>


<script>
$(document).ready(function() {
    $("#erros").dialog({ autoOpen: false, maxHeight: 400, maxWidth: 400, buttons: {
        Fechar: function() {
          $(this).dialog("close");
        }
    }
  });
});
</script>

<div class="teste"></div>


