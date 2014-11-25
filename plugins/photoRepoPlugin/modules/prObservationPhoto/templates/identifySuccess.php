<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('A identificar a fotografia "%fotografia%"', array('%fotografia%' => $observationPhoto->getCode()), 'messages') ?></h1>
  <?php include_partial('prObservationPhoto/flashes') ?>
  
  <div id="identify_main_block" >
    
    <div id="individual_characterization">
      <?php if($observationPhoto->getIndividualId()): ?>
        <b><?php echo $observationPhoto->getIndividual()->getName() ?></b>
      <?php endif; ?>
      <?php if($observationPhoto->getLastEditedBy()): ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Última atualização por: <?php echo $observationPhoto->getsfGuardUserRelatedByLastEditedBy() ?> em <?php echo $observationPhoto->getUpdatedAt('Y-m-d'); ?> 
      <?php endif; ?>
    </div>
    
    
    <div id="identify_main_block_image1">
      <div id="identify_viewer_image1" class="identify_viewer_image1"></div>
    </div>
    
    <div id="identify_main_block_image2">
      <div id="identify_viewer_image2" class="identify_viewer_image2"></div>
    </div>
  </div>
  
  <div id="identify_results_block">
    <div id="identify_form_box" >
      <form id="identify_form">
        <div class="identify_row">
          <input name="identify_form[observation_photo_id]" type="hidden" value="<?php echo $observationPhoto->getId() ?>" id="identify_form_observation_photo">
          <input name="identify_form[choices][]" type="checkbox" value="best" id="identify_form_choices_best">
          <label for="identify_form_choices_best">Melhores fotografias</label>
        </div>

        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="same_body_part" id="identify_form_choices_same_body_part">
          <label for="identify_form_choices_same_body_part">Parte do corpo igual</label>
        </div>
        
        <?php if($observationPhoto->isCharacterizable()): ?>
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="same" id="identify_form_choices_same">
          <label for="identify_form_choices_same">Caracterização igual</label>
        </div>
 
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="smooth" id="identify_form_choices_smooth">
          <label for="identify_form_choices_smooth">Lisa</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="smooth_without" id="identify_form_choices_smooth_without">
          <label for="identify_form_choices_smooth_without">Sem Lisa</label>
        </div>
              
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="irregular" id="identify_form_choices_irregular">
          <label for="identify_form_choices_irregular">Irregular</label>
        </div>

        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="irregular_without" id="identify_form_choices_irregular_without">
          <label for="identify_form_choices_irregular_without">Sem Irregular</label>
        </div>
       
        <?php if( $isLeft || $isRight ): ?>
          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="cutted_point" id="identify_form_choices_cutted_point">
            <label for="identify_form_choices_cutted_point">Ponta cortada</label>
          </div>

          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="cutted_point_without" id="identify_form_choices_cutted_point_without">
            <label for="identify_form_choices_cutted_point_without">Sem Ponta cortada</label>
          </div>

        <?php elseif( $isTail ): ?>
          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="cutted_point_left" id="identify_form_choices_cutted_point_left">
            <label for="identify_form_choices_cutted_point_left">Ponta esquerda cortada</label>
          </div>
          
          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="cutted_point_left_without" id="identify_form_choices_cutted_point_left_without">
            <label for="identify_form_choices_cutted_point_left_without">Sem Ponta esquerda cortada</label>
          </div>

          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="cutted_point_right" id="identify_form_choices_cutted_point_right">
            <label for="identify_form_choices_cutted_point_right">Ponta direita cortada</label>
          </div>

          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="cutted_point_right_without" id="identify_form_choices_cutted_point_right_without">
            <label for="identify_form_choices_cutted_point_right_without">Sem Ponta direita cortada</label>
          </div>
        <?php endif; ?>
        
        <?php if( $isTail || $isLeft || $isRight): ?>
          <!--<div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="complete_marks" id="identify_form_choices_complete_marks">
            <label for="identify_form_choices_complete_marks">Marcas completas</label></li>
          </div>
        
          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="depth" id="identify_form_choices_depth">
            <label for="identify_form_choices_depth">Profundidade</label></li>
          </div>-->
            <?php
              if($isLeft) {
                $withNumberCells = PatternCellDorsalLeftPeer::getForSelect($observationPhoto->getSpecieId(), true, '');//Array with values -----, A1, A2, B1 etc
              }elseif ($isRight) {
                $withNumberCells = PatternCellDorsalRightPeer::getForSelect($observationPhoto->getSpecieId(), true, '');
              }elseif ($isTail) {
                $withNumberCells = PatternCellTailPeer::getForSelect($observationPhoto->getSpecieId(), true, '');
              }
                $cells = array();
                //taking the numbers out of A1, A2, B1 etc
                foreach($withNumberCells as $key => $withNumberCell){
                  if( !in_array( substr($withNumberCell, 0, 1), $cells )){
                    if(ctype_alpha( substr($withNumberCell, 0, 1) )){//Returns TRUE if every character in text is a letter, FALSE otherwise
                      $cells[$key] = substr($withNumberCell, 0, 1);
                    }
                    else{
                      $cells[$key] = $withNumberCell; //in order to keep the "-----" element untouched
                    }
                  }
                }
            ?>
              <div id="user_mark_row">
                <span>
                <label id="user_mark_label" for="user_mark_row">Estrito</label>
                <input id="identify_form_user_mark_strict_vertical" name="identify_form[user_mark_strict_vertical]" type="checkbox" value="user_mark_strict_vertical">
                  <select id="identify_form_user_mark_from_vertical" name="identify_form[user_mark_from_vertical]">
                    <?php foreach($cells as $key => $cell): ?>
                      <option value="<?php echo $key; ?>" > <?php echo $cell; ?> </option>
                    <?php endforeach; ?>
                  </select>
                  -
                  <select id="identify_form_user_mark_to_vertical" name="identify_form[user_mark_to_vertical]">
                    <?php foreach($cells as $key => $cell): ?>
                      <option value="<?php echo $key; ?>" > <?php echo $cell; ?> </option>
                    <?php endforeach; ?>
                  </select>
                </span>
              </div>

          <div class="identify_row" id="mark_row">
            <?php echo $identify_form['marks']->render() ?>
            <label id="mark_label" for="identify_form_marks">Marcas</label>
          </div>
        <?php endif; ?>
       <?php endif; ?>
      </form>
    </div>
    
    <div id="identify_result_box">
      <div id="identify_description">
        <b>Fotografia</b>: <?php echo $observationPhoto->completeToString($hiddenFields=true) ?>
          <?php if(isset($cells)): ?>
            + Escolha marcas
              <span>
                <select id="identify_form_user_mark_from_horizontal" name="identify_form[user_mark_from_horizontal]" form="identify_form">
                  <?php foreach($cells as $key => $cell): ?>
                    <option value="<?php echo $key; ?>" > <?php echo $cell; ?> </option>
                  <?php endforeach; ?>
                </select>
                -
                <select id="identify_form_user_mark_to_horizontal" name="identify_form[user_mark_to_horizontal]" form="identify_form">
                  <?php foreach($cells as $key => $cell): ?>
                    <option value="<?php echo $key; ?>" > <?php echo $cell; ?> </option>
                  <?php endforeach; ?>
                </select>
              </span>
          <?php endif; ?>
      </div>
      <div id="identify_results">
        <form>
          <div id="carousel_results" class="liquid carousel_div"></div>
        </form>
      </div>
    </div>
  </div>
  
  <ul class="sf_admin_actions">
    <li id="submit_identify_form"><input type="submit" value="Filtrar de acordo com suas escolhas" /></li>
    <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_pendent_photos_list') ?>">Fotografias por processar</a></li>
    <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo?do=clean') ?>">Fotografias por analisar</a></li>
    <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo_validated') ?>">Catálogo</a></li>
    <li class="sf_admin_action_action" id="associate_individual_li"><a id="associate_individual_link" href="">Associar fotografia a indivíduo</a></li>
    <li class="sf_admin_action_new">
      <?php
          if( $observationPhoto->haveToChooseBestPhotoAgain('ask') ){
            $choosing_best_photo_details = 'Esta foto é a melhor foto do indivíduo inicial (nome: '.$observationPhoto->getIndividual()->getName().', id: '.$observationPhoto->getIndividualId().') com esta parte do corpo ('.$observationPhoto->getBodyPart()->getDescription('pt').') - que tem mais de duas fotos. Uma deles será escolhida de forma aleatória como melhor foto. Você pode escolher uma nova melhor foto mais tarde.';
          }
          else{
            $choosing_best_photo_details = '';
          }
          echo link_to( 'Novo individuo', '@pr_new_individual_by_photo?id='.$observationPhoto->getId(), array('method' => 'post', 'confirm' => "$choosing_best_photo_details Tem a certeza que pretende criar um novo individuo?") );
      ?>
    </li>
    <?php $sessionUser = $sf_user->getGuardUser() ?> 
    <?php if(in_array($observationPhoto->getStatus(), array(ObservationPhoto::FA_SIGLA)) && $observationPhoto->getLastEditedBy() != $sessionUser->getId() ): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_validate?id='.$observationPhoto->getId()) ?>">Validar</a></li>
    <?php endif; ?>
    <?php if(  stripos($observationPhoto->getNotes(), "_doubt") === FALSE  ): ?>
      <li class="sf_admin_action_edit" id="doubt"><a onclick="doubt()">Tenho dúvidas</a></li>
    <?php else: ?>
      <li class="sf_admin_action_edit" id="undoubt"><a onclick="doubt()">Não tenho mais dúvidas</a></li>
    <?php endif; ?>
  </ul>

<div id="associate" title="Associar fotografia" style="display: none;"><p>Tem a certeza que pretende associar esta fotografia ao individuo seleccionado?</p></div>
<div id="associateIndividualSameBodyPartDate" title="Associar fotografia" style="display: none;"><p>Este indivíduo já tem uma foto da mesma parte do corpo tomada no mesmo dia. Tem a certeza que pretende associar esta fotografia ao individuo seleccionado?</p></div>
<div id="chooseNewBestPhotoForPreviousIndividual" title="Associar fotografia" style="display: none;"><p>Esta foto é a melhor foto do indivíduo inicial com esta parte do corpo - que tem mais de duas fotos. Uma deles será escolhida de forma aleatória como melhor foto. Você será redirecionado para a página do indivíduo, onde pode escolher uma nova melhor foto. Tem a certeza que pretende associar esta fotografia ao individuo seleccionado? <?php echo ' A parte do corpo é: '.$observationPhoto->getBodyPart()->getDescription('pt'); ?></p></div>
<div id="sameBodyPartDateAndChooseNewBestPhoto" title="Associar fotografia" style="display: none;"><p>Este indivíduo já tem uma foto da mesma parte do corpo tomada no mesmo dia. Em mais, esta foto é a melhor foto do indivíduo inicial com esta parte do corpo - que tem mais de duas fotos. Uma deles será escolhida de forma aleatória como melhor foto. Você será redirecionado para a página do indivíduo, onde pode escolher uma nova melhor foto. Tem a certeza que pretende associar esta fotografia ao individuo seleccionado? <?php echo ' A parte do corpo é: '.$observationPhoto->getBodyPart()->getDescription('pt'); ?></p></div>
<div id="loader"></div>

</div>


<script type="text/javascript">

      function doubt(){
        <?php
         if(stripos($observationPhoto->getNotes(), "_doubt") === FALSE){
          $posDoubt = -1;
        }else{
          $posDoubt = stripos($observationPhoto->getNotes(), "_doubt");
        }
        ?>
        positionOfDoubt = '<?php echo $posDoubt; ?>';
        
            $.ajax({
                type: "POST",
                url: window.location.protocol + '//' + window.location.host+'/admin.php/ajax/observation-photo/doubt',
                data: {
                  observation_photo_id: "<?php echo $observationPhoto->getId();?>"
                },
                async: false,
                success: function(msg) {
                  if(positionOfDoubt == '-1'){//it did not have "doubt" and "doubt" was added to the notes
                    alert("A foto foi marcada com dúvidas em suas notas");
                    $("#doubt").hide();
                  }
                  else{//it already had "doubt" and "doubt" was removed from the notes
                    alert("A foto não tem mais dúvidas.");
                    $("#undoubt").hide();
                  }   
                }
            });
      }

    var carouselImageClicked=false;

    var $ = jQuery;
    $(document).ready(function(){
      <?php
        $filename = $observationPhoto->getFileName();
        $resume = $observationPhoto->getHtmlResume();
        if( $observationPhoto->getIndividualId()){
          $best = $observationPhoto->getIndividual()->getBestObservationPhoto();
          if($best){
          $filename = $best->getFileName();
          $resume = $best->getHtmlResume();
         }
        }
      ?>

      var iv1 = $("#identify_viewer_image1").iviewer({
        src: "<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>", 
        onMouseMove: function(){
          $('#identify_viewer_image1 img').attr('title', '<?php echo $observationPhoto->getHtmlResume(); ?>');
        }
      });
      
      var iv2 = $("#identify_viewer_image2").iviewer({
        src: "<?php echo url_for( '/uploads/pr_repo_final/'.$filename ); ?>",
        onMouseMove: function(){
          if(carouselImageClicked==false){
            $('#identify_viewer_image2 img').attr('title', '<?php echo $resume; ?>');
          }
        }
      });
      $("#associate_individual_li").hide();
    });
</script>
