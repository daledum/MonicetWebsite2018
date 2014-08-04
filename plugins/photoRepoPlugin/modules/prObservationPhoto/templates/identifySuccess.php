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
          <input name="identify_form[choices][]" type="checkbox" value="same" id="identify_form_choices_same">
          <label for="identify_form_choices_same">Caracterização igual</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="best" id="identify_form_choices_best">
          <label for="identify_form_choices_best">Melhores fotografias</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="same_body_part" id="identify_form_choices_same_body_part">
          <label for="identify_form_choices_same_body_part">Parte do corpo igual</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="smooth" id="identify_form_choices_smooth">
          <label for="identify_form_choices_smooth">Lisa</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="irregular" id="identify_form_choices_irregular">
          <label for="identify_form_choices_irregular">Irregular</label>
        </div>
        
        <?php if( $isLeft || $isRight ): ?>
          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="cutted_point" id="identify_form_choices_cutted_point">
            <label for="identify_form_choices_cutted_point">Ponta cortada</label>
          </div>
        <?php elseif( $isTail ): ?>
          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="cutted_point_left" id="identify_form_choices_cutted_point_left">
            <label for="identify_form_choices_cutted_point_left">Ponta esquerda cortada</label>
          </div>

          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="cutted_point_right" id="identify_form_choices_cutted_point_right">
            <label for="identify_form_choices_cutted_point_right">Ponta direita cortada</label>
          </div>
        <?php endif; ?>
        
        <?php if( $isTail || $isLeft || $isRight): ?>
          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="complete_marks" id="identify_form_choices_complete_marks">
            <label for="identify_form_choices_complete_marks">Marcas completas</label></li>
          </div>
        
          <div class="identify_row">
            <input name="identify_form[choices][]" type="checkbox" value="depth" id="identify_form_choices_depth">
            <label for="identify_form_choices_depth">Profundidade</label></li>
          </div>

          <div class="identify_row" id="mark_row">
            <?php echo $identify_form['marks']->render() ?>
            <label id="mark_label" for="identify_form_marks">Marcas</label>
          </div>
        <?php endif; ?>
      </form>
    </div>
    
    <div id="identify_result_box">
      <div id="identify_description">
        <b>Fotografia</b>: <?php echo $observationPhoto->completeToString($hiddenFields=true) ?>
      </div>
      <div id="identify_results">
        <form>
          <div id="carousel_results" class="liquid carousel_div"></div>
        </form>
      </div>
    </div>
  </div>
  
  <ul class="sf_admin_actions">
    <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_pendent_photos_list') ?>">Fotografias por processar</a></li>
    <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo') ?>">Fotografias por analisar</a></li>
    <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo_validated') ?>">Catálogo</a></li>
    <li class="sf_admin_action_action" id="associate_individual_li"><?php echo link_to('Associar fotografia a indivíduo', '@pr_associate_individual_by_photo?id='.$observationPhoto->getId().'&individual_id=9999999', array('method' => 'post', 'confirm' => 'Tem a certeza que pretende associar esta fotografia ao individuo seleccionado?', 'id' => 'associate_individual_link')) ?></li>
    <li class="sf_admin_action_new"><?php echo link_to('Novo individuo', '@pr_new_individual_by_photo?id='.$observationPhoto->getId(), array('method' => 'post', 'confirm' => 'Tem a certeza que pretende criar um novo individuo?')) ?></li>
    <?php $sessionUser = $sf_user->getGuardUser() ?> 
    <?php if(in_array($observationPhoto->getStatus(), array(ObservationPhoto::FA_SIGLA)) && $observationPhoto->getLastEditedBy() != $sessionUser->getId() ): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_validate?id='.$observationPhoto->getId()) ?>">Validar</a></li>
    <?php endif; ?>
  </ul>
</div>


<script type="text/javascript">

    var carouselImageClicked=false;

    var $ = jQuery;
    $(document).ready(function(){
      <?php
        $filename = $observationPhoto->getFileName();
        $resume = $observationPhoto->getHtmlResume();
        if( $observationPhoto->getIndividualId()){
          $best = $observationPhoto->getIndividual()->getBestObservationPhoto();
          $filename = $best->getFileName();
          $resume = $best->getHtmlResume();
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
