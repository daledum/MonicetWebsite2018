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
      <div id="identify_viewer_image2" class="identify_viewer_image1"></div>
    </div>
    <?php /* ?>
    <div class="identify_actions">
      <b>Acções</b><br/><br/>
      <ul>
        
      </ul>
    </div>
    <?php */ ?>
  </div>
  
  <div id="identify_results_block">
    <div id="identify_results_dropdown_block">
      <select>
        <option value="">Prioridade 1</option>
        <option value="">Prioridade 2</option>
        <option value="">Prioridade 3</option>
        <option value="">Prioridade n</option>
      </select>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#" id="ui-carousel-prev">Anterior</a> | 
      <a href="#" id="ui-carousel-next">Seguinte</a> | <span id="selected_checkboxes"></span>
    </div>
    <div id="identify_results">
      <form>
        <div id="carousel">
          <?php for($i=1; $i<=10; $i++): ?>
            <div>
              <img width="165" height="150" src="<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>" alt="<?php echo $i ?>"/>
              <input class="checkbox_item" type="checkbox" id="<?php echo $i.'xyz' ?>" name="<?php echo $i ?>">
            </div>
          <?php endfor; ?>
        </div>
      </form>
      
    </div>
  </div>
  
  <ul class="sf_admin_actions">
    <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo'.(($observationPhoto->getStatus() == ObservationPhoto::V_SIGLA)? '_validated': '')) ?>">Regressar à listagem</a></li>
    <li class="sf_admin_action_action"><?php echo link_to('Link 1', '@homepage') ?></li>
    <li class="sf_admin_action_list"><?php echo link_to('Link 2', '@homepage') ?></li>
    <li class="sf_admin_action_new"><?php echo link_to('Link 3', '@homepage') ?></li>
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
    });
</script>