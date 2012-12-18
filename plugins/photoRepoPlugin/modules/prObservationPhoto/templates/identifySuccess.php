<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('A identificar a fotografia "%fotografia%"', array('%fotografia%' => $observationPhoto->getCode()), 'messages') ?></h1>
  <?php include_partial('prObservationPhoto/flashes') ?>
  
  <div id="identify_main_block" >
    
    <div id="identify_main_block_image1">
      <div id="identify_viewer_image1" class="identify_viewer_image1"></div>
    </div>
    
    <div id="identify_main_block_image2">
      <div id="identify_viewer_image2" class="identify_viewer_image2"></div>
    </div>
  </div>
  
  <div id="identify_results_block">
    <div id="identify_form_box" >
      <form>
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="same" id="identify_form_choices_same">
          <label for="identify_form_choices_same">Caracterização igual</label>
        </div>
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="best" id="identify_form_choices_best">
          <label for="identify_form_choices_best">Melhores fotografias</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="smoth" id="identify_form_choices_smoth">
          <label for="identify_form_choices_smoth">Lisa</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="irregular" id="identify_form_choices_irregular">
          <label for="identify_form_choices_irregular">Irregular</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="cutted_point" id="identify_form_choices_cutted_point">
          <label for="identify_form_choices_cutted_point">Ponta cortada</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="cutted_point_left" id="identify_form_choices_cutted_point_left">
          <label for="identify_form_choices_cutted_point_left">Ponta esquerda cortada</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="cutted_point_right" id="identify_form_choices_cutted_point_right">
          <label for="identify_form_choices_cutted_point_right">Ponta direita cortada</label>
        </div>
        
        <div class="identify_row">
          <input name="identify_form[choices][]" type="checkbox" value="marks" id="identify_form_choices_marks">
          <label for="identify_form_choices_marks">Marcas</label></li>
        </div>
      </form>
    </div>
    
    <div id="identify_result_box">
      <div id="identify_description">
        <b>Fotografia</b>: <?php echo $observationPhoto->completeToString() ?>
      </div>
      <div id="identify_results">
        <form>
          <div id="carousel_results" class="liquid carousel_div" >
            <span class="previous"></span>
            <div class="wrapper" >
              <ul>
                <?php $Pcounter = 1 ?>
                <?php foreach( $priorityResults['priority_6'] as $OBPhoto ): ?>
                  <?php if( $Pcounter < 10 ): ?>
                    <li>
                      <img width="155" id="photo_<?php echo '6_'.$OBPhoto->getId() ?>" src="<?php echo url_for( '/uploads/pr_repo_final/tn_165x150_'.$OBPhoto->getFileName() ) ?>" alt="<?php echo $OBPhoto->getFileName() ?>" title="<?php echo $OBPhoto->completeToString() ?>"/>
                      <input class="checkbox_item" type="checkbox" id="checkbox_<?php echo '6_'.$OBPhoto->getId() ?>" name="<?php echo '6_'.$OBPhoto->getId() ?>"/>
                      <?php if($OBPhoto->getIndividualId()): ?>
                        <?php echo $OBPhoto->getIndividual()->getName() ?>
                      <?php endif; ?>
                        
                      <script>
                        $(document).ready(function(){

                          //alert($(this).attr('src'));
                          $(<?php echo sprintf("'#photo_%s_%s'", 6, $OBPhoto->getId()) ?>).click(function(){
                            //alert($(this)+'clicked');
                            $("#identify_viewer_image2 img").attr('src', '/uploads/pr_repo_final/<?php echo $OBPhoto->getFileName(); ?>');
                            $("#associate_individual_link").attr('href', '<?php echo url_for('@pr_associate_individual_by_photo?id='.$observationPhoto->getId().'&individual_id='.$OBPhoto->getIndividualId()) ?>');
                            $("#associate_individual_li").show();
                          });
                        });
                      </script>
                    </li>
                    <?php $Pcounter += 1; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>

            </div>
            <span class="next"></span>
          </div>
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
  </ul>
</div>


<script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function(){
      var iv1 = $("#identify_viewer_image1").iviewer({
        src: "<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>",
        onMouseMove: function(){
          $('#identify_viewer_image1 img').attr('title', '<?php echo $observationPhoto->getHtmlResume(); ?>');
        }
      });
      var iv2 = $("#identify_viewer_image2").iviewer({
        src: "<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>"
      });
      $("#associate_individual_li").hide();
    });
</script>