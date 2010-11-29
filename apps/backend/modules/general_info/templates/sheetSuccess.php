<script type="text/javascript">
    var url = window.location.href.split('/');
    
    function appendNewRecordLine() {
        $.ajax({
            type: "POST",   
            url: url[0] + "//" + url[2] + "/" + url[3] + "/record/line/", 
            async: false,
            data: {
                n_lines: $('#n-lines').val(), 
                latitude: "<?php echo $general_info->getBaseLatitude();?>",
                longitude: "<?php echo $general_info->getBaseLongitude();?>", 
                '_r': Math.random()*100
            },
            success: function(msg) {
                         $('div.sf_admin_list table tbody').append(msg);
                         $('#n-lines').val(parseInt($('#n-lines').val()) + 1);
                         //addCalendar($('tr.record_line_' + $('#n-lines').val() + ' input.date_field'));
                         //$('.hour input').mask("99:99"); 
                     }
        });
    }

    
    

    function saveRecordLine() {
        var success = false;
        var n_lines = $('#n-lines').val();
        $.ajax({
            type: "GET",   
            url: url[0] + "//" + url[2] + "/" + url[3] + "/record/lineSubmit", 
            data: {
                number_of_rows: n_lines, 
                general_info_id: <?php echo $general_info->getId();?>,
                
                "record[_csrf_token]": $("tr.record_line_" + n_lines + " #record__csrf_token").val(),
                "record[code_id]": $("tr.record_line_" + n_lines + " #record_code_id option:selected").val(),
                "record[time]": $("tr.record_line_" + n_lines + " #record_time").val(),
                "record[latitude]": $("tr.record_line_" + n_lines + " #record_latitude").val(),
                "record[longitude]": $("tr.record_line_" + n_lines + " #record_longitude").val(),
                "record[sea_state_id]": $("tr.record_line_" + n_lines + " #record_sea_state_id option:selected").val(),
                "record[visibility_id]": $("tr.record_line_" + n_lines + " #record_visibility_id option:selected").val(),
                "sighting[specie_id]": $("tr.record_line_" + n_lines + " #sighting_specie_id option:selected").val(),
                
                "sighting[_csrf_token]": $("tr.record_line_" + n_lines + " #sighting__csrf_token").val(),
                "sighting[total]": $("tr.record_line_" + n_lines + " #sighting_total").val(),
                "sighting[adults]": $("tr.record_line_" + n_lines + " #sighting_adults").val(),
                "sighting[juveniles]": $("tr.record_line_" + n_lines + " #sighting_juveniles").val(),
                "sighting[cubs]": $("tr.record_line_" + n_lines + " #sighting_cubs").val(),
                "sighting[behaviour_id]": $("tr.record_line_" + n_lines + " #sighting_behaviour_id option:selected").val(),
                "sighting[association_id]": $("tr.record_line_" + n_lines + " #sighting_association_id option:selected").val(),
                "record[num_vessels]": $("tr.record_line_" + n_lines + " #record_num_vessels").val(),
                "sighting[comments]": $("tr.record_line_" + n_lines + " #sighting_comments").val(),
                '_r': Math.random()*100
            },
            async: false,
            success: function(msg) {
                         $('#erros').html(msg);
                         $('#erros').dialog();
                     }
        });
        return success;
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
                url: url[0] + "//" + url[2] + "/" + url[3] + "/record/guardarLinha", 
                data: {
                    number_of_rows: n_lines, 
                    general_info_id: <?php echo $general_info->getId();?>,
                    
                    "record_id": $("tr.record_line_" + i + " .record_id").val(),
                    "record[_csrf_token]": $("tr.record_line_" + i + " #record__csrf_token").val(),
                    "record[code_id]": $("tr.record_line_" + i + " #record_code_id_" + i + " option:selected").val(),
                    "record[time]": $("tr.record_line_" + i + " #record_time").val(),
                    "record[latitude]": $("tr.record_line_" + i + " #record_latitude").val(),
                    "record[longitude]": $("tr.record_line_" + i + " #record_longitude").val(),
                    "record[sea_state_id]": $("tr.record_line_" + i + " #record_sea_state_id option:selected").val(),
                    "record[visibility_id]": $("tr.record_line_" + i + " #record_visibility_id option:selected").val(),
                    "sighting[specie_id]": $("tr.record_line_" + i + " #sighting_specie_id option:selected").val(),
                    
                    "sighting_id": $("tr.record_line_" + i + " .sighting_id").val(),
                    "sighting[_csrf_token]": $("tr.record_line_" + i + " #sighting__csrf_token").val(),
                    "sighting[total]": $("tr.record_line_" + i + " #sighting_total").val(),
                    "sighting[adults]": $("tr.record_line_" + i + " #sighting_adults").val(),
                    "sighting[juveniles]": $("tr.record_line_" + i + " #sighting_juveniles").val(),
                    "sighting[cubs]": $("tr.record_line_" + i + " #sighting_cubs").val(),
                    "sighting[behaviour_id]": $("tr.record_line_" + i + " #sighting_behaviour_id option:selected").val(),
                    "sighting[association_id]": $("tr.record_line_" + i + " #sighting_association_id option:selected").val(),
                    "record[num_vessels]": $("tr.record_line_" + i + " #record_num_vessels").val(),
                    "sighting[comments]": $("tr.record_line_" + i + " #sighting_comments").val(),
                    
                    
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
          if( $("tr.record_line_" + i + " #record_code_id_" + i + " option:selected").val() == 2) fim = true;
        }
        
        $.ajax({
            type: "POST",   
            url: url[0] + "//" + url[2] + "/" + url[3] + "/general_info/validation", 
            data: {
                general_info_id: <?php echo $general_info->getId();?>,
                
                "valid":           $("#general_info_valid").attr('checked'),
                "comments":        $("#general_info_comments").val(),
                "general_info_id": <?php echo $general_info->getId() ?>,
                
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
    		appendNewRecordLine();
    	}
    	
        $('a.add-new-line').click(function() {
            appendNewRecordLine();
        });
        
        $('a.save-line').click(function() {
            saveRecordLine();
        });

        $('#help-icon').click(function() {
        	window.open(url[0] + "//" + url[2] + "/" + url[3] + "/record/help/", "Ajuda", "status = 1, height = 600, width = 450, resizable = 0, scrollbars=yes");
        	            
        });
        //$('.hour input').mask("99:99");        
    });
</script>

<style type="text/css">
    table#general-info-summary td, table#general-info-summary th {
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
  <h1>Saída - <strong><?php if($general_info) { echo $general_info->getCode(); } ?></strong><span id="help-icon"></span></h1>
  <table id="general-info-summary" style="margin-left:10px;border:1px solid #ccc;" border="1">
	  <thead>
	    <tr>
	        <th>Código</th>
	        <th>Data</th>
	        <th>Barco</th>
	        <th>Skipper</th>
	        <th>Guia</th>
	        <th>Latitude Base</th>
	        <th>Longitude Base</th>
	    </tr>
	  </thead>
      <tbody>
        <tr>
            <td><?php echo $general_info->getCode();?></td>
            <td><?php echo $general_info->getDate();?></td>
            <td><?php echo $general_info->getVessel();?></td>
            <td><?php echo $general_info->getSkipper();?></td>
            <td><?php echo $general_info->getGuide();?></td>
            <td><?php echo $general_info->getBaseLatitude();?></td>
            <td><?php echo $general_info->getBaseLongitude();?></td>
        </tr>
      </tbody>    
  </table>
  
  <input id="n-lines" type="hidden" value="<?php echo $n_lines; ?>" />
  <input id="general_info_id" type="hidden" value="<?php echo $general_info->getId(); ?>" />
  
  <div class="sf_admin_list">
    <?php if($sf_user->isSuperAdmin()): ?>
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
    <?php elseif($general_info->getValid() != 1): ?>
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
    <?php endif; ?>
    <table style="margin-left:10px;border:1px solid #ccc;" border="1">
      <thead>
        <tr>
            <th class="sf_admin_text">Linha</th>
            <th class="sf_admin_text">Código</th>
            <th class="sf_admin_text">Hora</th>
            <th class="sf_admin_text">Latitude</th>
            <th class="sf_admin_text">Longitude</th>
            <th class="sf_admin_text">Est.Mar</th>
            <th class="sf_admin_text">Visib.</th>
            <th class="sf_admin_text">Espécie</th>
            <th class="sf_admin_text">Total</th>
            <th class="sf_admin_text">A</th>
            <th class="sf_admin_text">J</th>
            <th class="sf_admin_text">C</th>
            <th class="sf_admin_text">Comp.</th>
            <th class="sf_admin_text">Asso.</th>
            <th class="sf_admin_text">Nº Emb.</th>
            <th class="sf_admin_text">Comentários</th>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach($records as $x => $record): ?>
          <?php $sighting = $record->getSightings(); ?>
          <?php $sighting = $sighting[0]; ?>
          <?php $record_form = new RecordForm($record); ?>
          <?php $sighting_form = new SightingForm($sighting); ?>
          
          
          
          <tr class="sf_admin_row odd record_line_<?php echo $i; ?>">
            <td class="sf_admin_text line_id"><?php echo $i; ?><input type="hidden" class="record_id" value="<?php echo $record->getId() ?>" /><input type="hidden" class="sighting_id" value="<?php echo $sighting->getId() ?>" /></td>
            <td class="sf_admin_text record_code">
              <select id="record_code_id_<?php echo $i ?>" name="record[code_id]" class="change">
                <?php if($i == 1): ?>
                  <option>-----</option>
                  <option value="1" selected="selected">I</option>
                <?php else: ?>
                  <option>-----</option>
                  <?php
                    $linhas = array();
                    if($records[$x-1]->getCodeId() == 1){
                      $linhas = array('2' => 'F', '3' => 'IA', '5' => 'R');
                    }
                    elseif($records[$x-1]->getCodeId() == 3){
                      $linhas = array('4' => 'FA', '6' => 'RA');
                    }
                    elseif($records[$x-1]->getCodeId() == 4){
                      $linhas = array('2' => 'F', '5' => 'R');
                    }
                    elseif($records[$x-1]->getCodeId() == 5){
                      $linhas = array('2' => 'F', '3' => 'IA');
                    }
                    elseif($records[$x-1]->getCodeId() == 6){
                      $linhas = array('4' => 'FA', '6' => 'RA');
                    }
                  ?>
                  <?php foreach($linhas as $index => $linha): ?>
                    <option value="<?php echo $index ?>" <?php if($index == $record->getCodeId()) echo 'selected="selected"' ?> ><?php echo $linha ?></option>
                  <?php endforeach; ?>
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
          function load_select_<?php echo $i-1 ?>() {
            /*if( <?php echo $i-1 ?> > 0 ){
              //alert($("#record_code_id_<?php echo $i-1 ?>").val());
              $.ajax({
                type: "get",
                datatype: "html",
                url: url[0] + "//" + url[2] + "/" + url[3] + "/record/lineAjax",
                data: { valor: $("#record_code_id_<?php echo $i-1 ?>").val(), selected: <?php echo $record->getCodeId(); ?>, '_r': Math.random()*100 },
                success: function(html){
                  if( $("#record_code_id_<?php echo $i-1 ?>").val() != 2 ){
                    $("#record_code_id_<?php echo $i ?>").children().remove();
                    $("#record_code_id_<?php echo $i ?>").append('<option>-----</option>');
                    $("#record_code_id_<?php echo $i ?>").append(html);
                  }
                },
                error: function(html, text, codigo){
                  alert("erro");
                }
              });
            }*/
            
            
            
            
            
            
            $("#record_code_id_<?php echo $i ?>").change(function(){
                for(i=<?php echo $i+1 ?>; i<=$("#n-lines").val(); i++){
                  $("#record_code_id_"+i).children().remove();
                  $("#record_code_id_"+i).append('<option>-----</option>');
                }
                
                $.ajax({
                  type: "get",
                  datatype: "html",
                  url: url[0] + "//" + url[2] + "/" + url[3] + "/record/lineAjax",
                  data: { valor: $("#record_code_id_<?php echo $i ?>").val(), '_r': Math.random()*100 },
                  success: function(html){
                    if( $("#record_code_id_<?php echo $i ?>").val() != 2 ){
                      $("#record_code_id_<?php echo $i+1 ?>").append(html);
                    }
                  },
                  error: function(html, text, codigo){
                    alert("erro");
                  }
                });
              });
          }; 
              
          $(document).ready(function() {
             //setTimeout('load_select_<?php echo $i-1 ?>()', <?php echo $i*0.5 ?>*3000); 
             load_select_<?php echo $i-1 ?>();
          });
            
        </script>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php if($sf_user->isSuperAdmin()): ?>
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
    <?php elseif($general_info->getValid() != 1): ?>
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
    <?php endif; ?>
    <div id="progressbar" style="display:inline-block;width:300px;"></div>
    <br />
    <?php /*<table style="width: 200px !important; float: left; margin-left: 20px !important;">
      <tr>
        <th><?php echo $gi_form['valid']->renderLabel() ?></th>
        <th><?php echo $gi_form['comments']->renderLabel() ?></th>
      </tr>
      <tr>
        <td><?php echo $gi_form['valid'] ?></td>
        <td><?php echo $gi_form['comments'] ?></td>
      </tr>
    </table>*/ ?>
    <ul>
      <li>
        <?php echo $gi_form['valid']->renderLabel().' '.$gi_form['valid'] ?>
      </li>
    </ul>
    <ul>
      <li>
        <?php echo $gi_form['comments']->renderLabel().' '.$gi_form['comments'] ?>
      </li>
    </ul>
    
    <?php if($sf_user->isSuperAdmin()): ?>
    <ul class="sf_admin_actions">
      <li class="sf_admin_action_save">
        <input type="button" value="Gravar" onClick="saveAllLines();" />
      </li>
    </ul>
    <?php elseif($general_info->getValid() != 1): ?>
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


