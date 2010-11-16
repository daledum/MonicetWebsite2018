<script type="text/javascript">
    var url = window.location.href.split('/');
    
    function appendNewRecordLine() {
        $.ajax({
            type: "GET",   
            url: url[0] + "//" + url[2] + "/" + url[3] + "/record/line/", 
            async: false,
            data: {n_lines: $('#n-lines').val()},
            success: function(msg) {
                         $('div.sf_admin_list table tbody').append(msg);
                         $('#n-lines').val(parseInt($('#n-lines').val()) + 1);
                         addCalendar($('tr.record_line_' + $('#n-lines').val() + ' input.date_field'));
                     }
        });
    }
    
    
    
    
    
    function mudar(n_linha){
      $("#record_code_id_"+(n_linha+1)).children().remove();
      $.ajax({
        type: "get",
        datatype: "html",
        url: url[0] + "//" + url[2] + "/" + url[3] + "/record/lineAjax",
        data: { valor: $("#record_code_id_"+n_linha).val() },
        success: function(html){
          $("#record_code_id_"+(n_linha+1)).append(html);
        },
        error: function(html, text, codigo){
          alert("erro");
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
                "sighting[comments]": $("tr.record_line_" + n_lines + " #sighting_comments").val()
            },
            async: false,
            success: function(msg) {
                         alert(msg);
                     }
        });
        return success;
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
  <input id="general_info_id" type="hidden" value="<?php echo $general_info_id; ?>" />
  
  <div class="sf_admin_list">
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
    <table style="margin-left:10px;border:1px solid #ccc;" border="1">
      <thead>
        <tr>
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
      </tbody>
    </table>
    <div class="table-actions"><a class="add-new-line" href="#">Adicionar Novo Registo</a></div>
  </div>
</div>
