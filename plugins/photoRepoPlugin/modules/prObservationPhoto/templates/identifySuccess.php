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
    <div id="identify_results_dropdown_block">
      Prioridade: 
      <select id="priority_selector">
        <?php foreach( $priorityKeyValues as $key => $priorityKeyValue ): ?>
          <option value="<?php echo $key ?>" class="carousel_selector"><?php echo $priorityKeyValue ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    
    <form>
      <?php //echo $pattern ?>
      <?php foreach( $priorityKeyValues as $key => $priorityKeyValue ): ?>
        <?php //echo $key ?>
        <?php //print_r($priorityResults[$key]->getData()) ?>
        <?php if( count($priorityResults[$key]) ): ?>
          <div id="<?php echo $key ?>" class="liquid" >
            <span class="previous"></span>
            <div class="wrapper">
              <ul>
                <?php foreach( $priorityResults[$key] as $OBPhoto ): ?>
                  <li>
                    <img width="165" height="150" id="photo_<?php echo $key.'_'.$OBPhoto->getId() ?>" src="<?php echo url_for( '/uploads/pr_repo_final/tn_165x150_'.$OBPhoto->getFileName() ) ?>" alt="<?php echo $OBPhoto->getFileName() ?>"/>
                    <input class="checkbox_item" type="checkbox" id="checkbox_<?php echo $key.'_'.$OBPhoto->getId() ?>" name="<?php echo $key.'_'.$OBPhoto->getId() ?>">
                    <?php echo $OBPhoto->getIndividual()->getName() ?>
                    <script>
                      $(document).ready(function(){
                        
                        //alert($(this).attr('src'));
                        $(<?php echo sprintf("'#photo_%s_%s'", $key, $OBPhoto->getId()) ?>).click(function(){
                          //alert($(this)+'clicked');
                          $("#identify_viewer_image2 img").attr('src', '/uploads/pr_repo_final/<?php echo $OBPhoto->getFileName(); ?>');
                          $("#associate_individual_link").attr('href', '<?php echo url_for('@pr_associate_individual_by_photo?id='.$observationPhoto->getId().'&individual_id=1') ?>');
                          $("#associate_individual_li").show();
                        });
                      });
                    </script>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <span class="next"></span>
          </div>
        <?php else: ?>
          <div id="empty_<?php echo $key ?>">
            Não foram encontrados individuos para esta prioridade.
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </form>
  </div>
  
  <ul class="sf_admin_actions">
    <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo'.(($observationPhoto->getStatus() == ObservationPhoto::V_SIGLA)? '_validated': '')) ?>">Regressar à listagem</a></li>
    <li class="sf_admin_action_action" id="associate_individual_li"><?php echo link_to('Associar fotografia a indivíduo', '@pr_associate_individual_by_photo?id='.$observationPhoto->getId().'&individual_id=9999999', array('method' => 'post', 'confirm' => 'Tem a certeza que pretende associar esta fotografia ao individuao XYZ?', 'id' => 'associate_individual_link')) ?></li>
    <li class="sf_admin_action_new"><?php echo link_to('Novo individuo', '@pr_new_individual_by_photo?id='.$observationPhoto->getId(), array('method' => 'post', 'confirm' => 'Tem a certeza que pretende criar um novo individuo?')) ?></li>
  </ul>
</div>


<script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function(){
      var iv1 = $("#identify_viewer_image1").iviewer({
        src: "<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>"
      });
      var iv2 = $("#identify_viewer_image2").iviewer({
        src: "<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>"
      });
      $("#associate_individual_li").hide();
    });
</script>