<script type="text/javascript">
    var url = window.location.href.split('/');
    
    function appendNewRecordLine() {
        
        if ($("#record_code_id_"+$('#n-lines').val()).val() != 2) {
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
                             $('.remove-line-div').remove();
                             $('div.sf_admin_list table tbody').append(msg);
                             $('#n-lines').val(parseInt($('#n-lines').val()) + 1);
                             //addCalendar($('tr.record_line_' + $('#n-lines').val() + ' input.date_field'));
                             //$('.hour input').mask("99:99");
                             $('a.remove-line').click(function() {
                                 removeRecordLine();
                                 return false;
                             });
                             
                         }
            });
        }
    }
    
    function removeRecordLine() {
        
        if( $('#n-lines').val() != 1 ){
        $('tr.record_line_'+$('#n-lines').val()).remove();
        $('#n-lines').val(parseInt($('#n-lines').val()) - 1);
        $('tr.record_line_'+$('#n-lines').val()+' td.remove').append('<div class="remove-line-div" style="margin-top: 10px;"><a href="#" class="remove-line"><img src="/images/backend/icons/garbage.png" width="20"></a></div>');
        }
        $('a.remove-line').click(function() {
            removeRecordLine();
            return false;
        });
    }
    
    

//    function saveRecordLine() {
//        var success = false;
//        var n_lines = $('#n-lines').val();
//        $.ajax({
//            type: "GET",   
//            url: url[0] + "//" + url[2] + "/" + url[3] + "/record/lineSubmit", 
//            data: {
//                number_of_rows: n_lines, 
//                general_info_id: <?php echo $general_info->getId();?>,
//                
//                "record[_csrf_token]": $("tr.record_line_" + n_lines + " #record__csrf_token").val(),
//                "record[code_id]": $("tr.record_line_" + n_lines + " #record_code_id option:selected").val(),
//                "record[time]": $("tr.record_line_" + n_lines + " #record_time").val(),
//                "record[latitude]": $("tr.record_line_" + n_lines + " #record_latitude").val(),
//                "record[longitude]": $("tr.record_line_" + n_lines + " #record_longitude").val(),
//                "record[sea_state_id]": $("tr.record_line_" + n_lines + " #record_sea_state_id option:selected").val(),
//                "record[visibility_id]": $("tr.record_line_" + n_lines + " #record_visibility_id option:selected").val(),
//                "sighting[specie_id]": $("tr.record_line_" + n_lines + " #sighting_specie_id option:selected").val(),
//                
//                "sighting[_csrf_token]": $("tr.record_line_" + n_lines + " #sighting__csrf_token").val(),
//                "sighting[total]": $("tr.record_line_" + n_lines + " #sighting_total").val(),
//                "sighting[adults]": $("tr.record_line_" + n_lines + " #sighting_adults").val(),
//                "sighting[juveniles]": $("tr.record_line_" + n_lines + " #sighting_juveniles").val(),
//                "sighting[calves]": $("tr.record_line_" + n_lines + " #sighting_calves").val(),
//                "sighting[behaviour_id]": $("tr.record_line_" + n_lines + " #sighting_behaviour_id option:selected").val(),
//                "sighting[association_id]": $("tr.record_line_" + n_lines + " #sighting_association_id option:selected").val(),
//                "record[num_vessels]": $("tr.record_line_" + n_lines + " #record_num_vessels").val(),
//                "sighting[comments]": $("tr.record_line_" + n_lines + " #sighting_comments").val(),
//                '_r': Math.random()*100
//            },
//            async: false,
//            success: function(msg) {
//                         $('#erros').html(msg);
//                         $('#erros').dialog();
//                     }
//        });
//        return success;
//    }
    
    
    function saveAllLines(){
        var success = false;
        var n_lines = $('#n-lines').val(); //n de linhas no formulário
        var fim = false;
        $('#erros').empty();
        $("#progressbar").progressbar({value: 0});
        
        //Validate form
        var codes = new Array();
        for(l=1; l<=n_lines; l++){
          codes.push($("tr.record_line_" + l + " #record_code_id_" + l + " option:selected").text());
        }
        var form_valid = false;
        $.ajax({
          type: "GET",
          url: url[0] + "//" + url[2] + "/" + url[3] + '/general-info/validate-sequence',
          data: {
            sequence: codes
          },
          async: false,
          success: function(msg) {
            if( msg == 'SUCCESS' ){
              form_valid = true
            }
          }
        });
        
        //alert(form_valid);
        
        if( form_valid ){

        <?php
        $user = sfContext::getInstance()->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
          
        if( $company ){
          $base = GeoLocation::fromDegrees( $company->getBaseLatitude(), $company->getBaseLongitude() );
          $coordinates = $base->boundingCoordinates(100, 'kilometers');
          $minimum_lat = $coordinates[0]->getLatitudeInDegrees();
          $maximum_lat = $coordinates[1]->getLatitudeInDegrees();
          $minimum_long = $coordinates[0]->getLongitudeInDegrees();
          $maximum_long = $coordinates[1]->getLongitudeInDegrees();
        }
        ?>
        company = '<?php echo $company; ?>';
 
        var errorMessage = '';      
        var time ='';
        var isTimeGood = false;

        for(i = 1 ; i<=n_lines ; i++){
        
         time = String($("tr.record_line_" + i + " #record_time").val());
         isTimeGood = time.match(/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/);

         if(!isTimeGood){
           errorMessage += '<br>' + 'Line ' + i +  ': the time format has to be hh:mm:ss ou hh:mm' + '<br>'; //was \n
         } 
        
        if(company != ''){

        var minimum_lat = parseFloat('<?php echo $minimum_lat; ?>');
        var maximum_lat = parseFloat('<?php echo $maximum_lat; ?>');
        var minimum_long = parseFloat('<?php echo $minimum_long; ?>');
        var maximum_long = parseFloat('<?php echo $maximum_long; ?>');

         if( $("tr.record_line_" + i + " #record_latitude").val()){
          if( !isNaN($("tr.record_line_" + i + " #record_latitude").val()) ){
           if( parseFloat($("tr.record_line_" + i + " #record_latitude").val()) < minimum_lat || parseFloat($("tr.record_line_" + i + " #record_latitude").val()) > maximum_lat ){
             errorMessage += '<br>' + 'Line ' + i + ': latitude can only take decimal degrees format (no degrees, minutes or seconds symbols, please) values between ' + minimum_lat + ' and ' + maximum_lat + '<br>';
           }
          }
          else{
            if( $("tr.record_line_" + i + " #record_latitude").val().toUpperCase() != 'BASE' ){
              errorMessage += '<br>' + 'Line ' + i + ': in case it is not BASE, longitude has to be a number in the decimal degrees format (no degrees, minutes or seconds symbols, please)' + '<br>';
            }
          }
         }

          if( $("tr.record_line_" + i + " #record_longitude").val()){
           if( !isNaN($("tr.record_line_" + i + " #record_longitude").val()) ){
            if( parseFloat($("tr.record_line_" + i + " #record_longitude").val()) < minimum_long || parseFloat($("tr.record_line_" + i + " #record_longitude").val()) > maximum_long ){
             errorMessage += '<br>' + 'Line ' + i + ': longitude can only take decimal degrees format (no degrees, minutes or seconds symbols, please) values between ' + minimum_long + ' and ' + maximum_long + '<br>';
            }
           }
           else{
             if( $("tr.record_line_" + i + " #record_longitude").val().toUpperCase() != 'BASE' ){
               errorMessage += '<br>' + 'Line ' + i + ': in case it is not BASE, longitude has to be a number in the decimal degrees format (no degrees, minutes or seconds symbols, please)' + '<br>';
             }
           }
          }
         }
        }


      if(errorMessage == ''){
        document.getElementById("generalInfoWasSaved").value = 1;
          //TODO: Remove all Record and Sightings associated to general_info
        $.ajax({
          type: 'POST',
          url: url[0] + "//" + url[2] + "/" + url[3] + "/general-info/<?php echo $general_info->getId();?>/delete-siblings",
          data: {},
          async: false,
          success: function(msg) {
            // do nothing
          }
        });
          //TODO: Add all Records and Sightings to general_info
          for(i = 1 ; i<=n_lines ; i++){ // para cada linha
            if( !fim ){
              $.ajax({
                  type: "POST",   
                  url: url[0] + "//" + url[2] + "/" + url[3] + "/record/guardarLinha", //envia o pedido para guardar uma linha
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
                      "sighting[calves]": $("tr.record_line_" + i + " #sighting_calves").val(),
                      "sighting[behaviour_id]": $("tr.record_line_" + i + " #sighting_behaviour_id option:selected").val(),
                      "sighting[association_id]": $("tr.record_line_" + i + " #sighting_association_id option:selected").val(),
                      "record[num_vessels]": $("tr.record_line_" + i + " #record_num_vessels").val(),
                      "sighting[comments]": $("tr.record_line_" + i + " #sighting_comments").val(),

                      "linha" : i,
                      "initial_n_lines" : $('#initial-n-lines').val(),
                      "_r": Math.random()*100
                  },
                  async: false,
                  success: function(msg) {
                    $('#erros').append(msg);
                  }
              });
              //return success;
              var barwidth = (i/n_lines)*100;
              $("#progressbar").progressbar("option", "value", barwidth);
            }
            if( $("tr.record_line_" + i + " #record_code_id_" + i + " option:selected").val() == 2) fim = true;
          }
          
          $.ajax({
              type: "POST",   
              url: url[0] + "//" + url[2] + "/" + url[3] + "/general_info/validation", 
              data: {
                  general_info_id: <?php echo $general_info->getId();?>,

                  "valid":           $("#general_info_valid").attr('checked'),
                  "comments":        $("#general_info_comments").val().substr(0, 140),
                  "general_info_id": <?php echo $general_info->getId() ?>,

                  "_r": Math.random()*100
              },
              async: false,
              success: function(msg) {
                if( $("#general_info_comments").val().substring(0, 6) == '_empty' ){
                  $("#general_info_comments").val($("#general_info_comments").val().substring(6));
                }
              }
          });
         }
          else{
            $('#erros').append(errorMessage);
          }
        } else {
          $('#erros').append('<div style="text-align: left;">');
          $('#erros').append('<span style="font-weight: bold; font-size: 14px; float: left;">Sequência de códigos incorrecta:&nbsp;</span>');
          $('#erros').append('</div>');
          $('#erros').append('<span style="color: red;font-size: 14px; float: left;">' + codes + '</span><hr style="clear:both;"/></div>');
          $('#erros').append('<div style="text-align: left;">');
          $('#erros').append('<span style="font-weight: bold; font-size: 14px; float: left;">Diagrama de estado:&nbsp;</span>');
          $('#erros').append('<img src="/images/backend/state_diagram.png" height="363" width="661">');
          $('#erros').append('</div>');
        }
        
        // mostra popup com mensagens de erro
        $('#erros').dialog('open');
    }
    
    
    

    $(function() {
    	if ($('div.sf_admin_list table tbody').find('tr').length == 0) {
    		appendNewRecordLine();
    	}
    	
        $('a.add-new-line').click(function() {
            appendNewRecordLine();
            return false;
        });
        
//        $('a.save-line').click(function() {
//            saveRecordLine();
//            return false;
//        });
        
        $('a.remove-line').click(function() {
            removeRecordLine();
            return false;
        });

        $('#help-icon').click(function() {
        	window.open(url[0] + "//" + url[2] + "/" + url[3] + "/record/help/", "Ajuda", "status = 1, height = 600, width = 450, resizable = 0, scrollbars=yes");
          return false;
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
<input id="generalInfoWasSaved" type="hidden" value="">
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
	        <th>Criado por</th>
	        <th>Actualizado por</th>
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
            <td><?php echo sfGuardUserPeer::retrieveByPk($general_info->getCreatedBy()) ?></td>
            <td><?php echo sfGuardUserPeer::retrieveByPk($general_info->getUpdatedBy()) ?></td>
        </tr>
      </tbody>    
  </table>
  
  <input id="n-lines" type="hidden" value="<?php echo $n_lines; ?>" />
  <input id="initial-n-lines" type="hidden" value="<?php echo $n_lines; ?>" />
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
            <th class="sf_admin_text" style="width: 4em;">Remover</th>
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
                      $linhas = array('2' => 'F', '3' => 'IA', '5' => 'R', '6' => 'RA');
                    }
                    elseif($records[$x-1]->getCodeId() == 3){
                      $linhas = array('4' => 'FA', '6' => 'RA');
                    }
                    elseif($records[$x-1]->getCodeId() == 4){
                      $linhas = array('2' => 'F', '3' => 'IA', '5' => 'R', '6' => 'RA');
                    }
                    elseif($records[$x-1]->getCodeId() == 5){
                      $linhas = array('2' => 'F', '3' => 'IA', '5' => 'R', '6' => 'RA');
                    }
                    elseif($records[$x-1]->getCodeId() == 6){
                      $linhas = array('2' => 'F', '3' => 'IA', '4' => 'FA', '5' => 'R', '6' => 'RA');
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
            <td class="sf_admin_text calves"><?php echo $sighting_form['calves']; ?></td>
            <td class="sf_admin_text behaviour"><?php echo $sighting_form['behaviour_id']; ?></td>
            <td class="sf_admin_text association"><?php echo $sighting_form['association_id']; ?></td>
            <td class="sf_admin_text num_vessels"><?php echo $record_form['num_vessels']; ?></td>
            <td class="sf_admin_text comments"><?php echo $sighting_form['comments']; ?></td>
            <td class="sf_admin_text remove"><?php if($records[$x]->getCodeId() == 2): ?><div class="remove-line-div" style="margin-top: 10px; width: 20px;"><a href="#" class="remove-line"><img src="/images/backend/icons/garbage.png" width="20"></a></div><?php endif; ?></td>
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
                    //if( $("#record_code_id_<?php echo $i ?>").val() != 2 ){
                      $("#record_code_id_<?php echo $i+1 ?>").append(html);
                    //}
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
      <li style="display:inline-block">
        <?php echo $gi_form['comments']->renderLabel().' '.$gi_form['comments'] ?><!-- renderLabel().'<br>'.'(140 characters maximum)'.' '.$gi_form['comments']-->
        <br>(140 characters maximum)<br>
      </li>
      <li id="convertFromDMStoDD" style="display:inline-block;float:right;width:500px;margin-right:10px;">

          <h2>Converting Degrees-Minutes-Seconds (DMS) To Decimal:<br/></h2>
          <p>If you remove the N, S, E or W from the end, please put a minus in front of the latitude value, if in the Southern Hemisphere and in front of the longitude value, if in the Western Hemisphere.<br/></p>

     <form name="convert" id="convert">
     <table class="note">
        <tr>
            <td>Latitude</td>
            <td>Longitude</td>
        </tr>
        <tr>
            <td><input type="text" name="latDMS" id="latDMS" value="52°12′17.0″N" class="note w8"></td>
            <td><input type="text" name="lonDMS" id="lonDMS" value="000°08′26.0″E" class="note w8"></td>
        </tr>
        <tr>
            <td><input type="text" name="latDec" id="latDec" value="52.20472" class="note w8"></td>
            <td><input type="text" name="lonDec" id="lonDec" value="0.14056" class="note w8"></td>
        </tr>
     </table>
     <input class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit" value="Convert" /><br><br><!--was submit-->
     </form>
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

<div id="erros" title="Relatório de actualização:" style="display: none;">
</div>


<script>
$(document).ready(function() {
    $("#erros").dialog({ autoOpen: false, height: 550, width: 750, buttons: {
        Fechar: function() {
          $(this).dialog("close");
        }
    }
  });

    $('#convert').submit(function () {
     $('#latDec').val(Geo.parseDMS($('#latDMS').val()).toFixed(5));
     $('#lonDec').val(Geo.parseDMS($('#lonDMS').val()).toFixed(5));
     $('#latDMS').val(Geo.toLat($('#latDec').val(),'dms',1));
     $('#lonDMS').val(Geo.toLon($('#lonDec').val(),'dms',1));
     return false;
    });

    window.onunload=function() {
     var saved = parseInt(document.getElementById("generalInfoWasSaved").value); 
     
     if( '<?php echo count($general_info->getRecords()); ?>' == 0){
       if( saved != 1 ){

            $.ajax({
                type: "POST",
                url: url[0] + "//" + url[2] + "/" + url[3] + "/general-info/delete-ajax",
                data: {
                  general_info_id: "<?php echo $general_info->getId();?>"
                },
                async: false,
                success: function(msg) {
                // do nothing
                }
            });
       }
     }
        return null;
    }

});
</script>

<div class="teste"></div>


