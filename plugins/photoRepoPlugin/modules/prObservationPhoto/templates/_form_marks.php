<div class="sf_admin_content characterize_photo_container">
  
  <div class="characterize_photo_pattern">
    <?php if($pattern): ?>

      <?php if($patternImage ): ?>
        <img id="pattern-image" width="450" src="<?php echo url_for( '/uploads/pr_patterns/'.$patternImage ) ?>" />
      <?php else: ?>
        <p>Padrão indisponível.</p>
      <?php endif; ?>

    <?php else: ?>
      <p>Padrão indisponível.</p>
    <?php endif; ?>
  </div>
  
  <div class="sf_admin_form">
    <?php echo form_tag_for($markForm, $markFormRouteDestination); ?>
      <div id="form_characterization_box">
        <fieldset id="sf_fieldset_none">
          <h2>Nova marca</h2>
          <?php echo $markForm->renderHiddenFields(true) ?>

          <?php foreach( $markForm as $cont => $markFormElement): ?>
            <?php if( !in_array($cont, array('id', 'observation_photo_tail_id', 'observation_photo_dorsal_left_id', 'observation_photo_dorsal_right_id', '_csrf_token'))): ?>
              <div class="sf_admin_form_row sf_admin_text">
                <?php echo $markFormElement->renderError() ?>
                <div class="form_line_characterization">
                  <?php echo $markFormElement->renderLabel() ?>
                  <div class="content"><?php echo $markFormElement->render() ?></div>
                  <div class="help"><?php echo $markFormElement->renderHelp() ?></div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </fieldset>
      </div>
      <ul class="sf_admin_actions">
          <?php echo $helper->linkToSave($markForm->getObject(), array( 'params' => array(  ), 'class_suffix' => 'save', 'label' => 'Adicionar marca',)) ?>
        
      </ul>
    </form>
  </div>
  <br/>
  
  <div class="sf_admin_form">
    <?php echo form_tag_for($form, $formRouteDestination) ?>
      <div id="form_characterization_box">
        <fieldset id="sf_fieldset_none">
          <h2><?php echo $fieldsetName ?></h2>
          <?php echo $form->renderHiddenFields(false) ?>

          <?php if ($form->hasGlobalErrors()): ?>
            <?php echo $form->renderGlobalErrors() ?>
          <?php endif; ?>

          <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
            <?php echo $form['is_smooth']->renderError() ?>
            <div class="form_line_characterization">
              <?php echo $form['is_smooth']->renderLabel() ?>
              <div class="content"><?php echo $form['is_smooth']->render() ?></div>
              <div class="help"><?php echo $form['is_smooth']->renderHelp() ?></div>
            </div>
          </div>
          <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
            <?php echo $form['is_irregular']->renderError() ?>
            <div class="form_line_characterization">
              <?php echo $form['is_irregular']->renderLabel() ?>
              <div class="content"><?php echo $form['is_irregular']->render() ?></div>
              <div class="help"><?php echo $form['is_irregular']->renderHelp() ?></div>
            </div>
          </div>

          <?php if(isset($form['is_cutted_point_left'])): ?>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
              <?php echo $form['is_cutted_point_left']->renderError() ?>
              <div class="form_line_characterization">
                <?php echo $form['is_cutted_point_left']->renderLabel() ?>
                <div class="content"><?php echo $form['is_cutted_point_left']->render() ?></div>
                <div class="help"><?php echo $form['is_cutted_point_left']->renderHelp() ?></div>
              </div>
            </div>
          <?php endif; ?>

          <?php if(isset($form['is_cutted_point_right'])): ?>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
              <?php echo $form['is_cutted_point_right']->renderError() ?>
              <div class="form_line_characterization">
                <?php echo $form['is_cutted_point_right']->renderLabel() ?>
                <div class="content"><?php echo $form['is_cutted_point_right']->render() ?></div>
                <div class="help"><?php echo $form['is_cutted_point_right']->renderHelp() ?></div>
              </div>
            </div>
          <?php endif; ?>

          <?php if(isset($form['is_cutted_point'])): ?>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
              <?php echo $form['is_cutted_point']->renderError() ?>
              <div class="form_line_characterization">
                <?php echo $form['is_cutted_point']->renderLabel() ?>
                <div class="content"><?php echo $form['is_cutted_point']->render() ?></div>
                <div class="help"><?php echo $form['is_cutted_point']->renderHelp() ?></div>
              </div>
            </div>
          <?php endif; ?>

          <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
            <div class="form_line_characterization">
              <label>Marcas</label>
              <div class="content" id="mark_content">
                <?php foreach( $relatedMarks as $mark ): ?>
                  <?php echo $mark ?> &nbsp;&nbsp;&nbsp;<?php echo link_to('Apagar', $routeDeleteMark, array('id' => $mark->getId()), array( 'method' => 'delete', 'confirm' => 'Tem a certeza que pretende apagar esta marca?')) ?><br/>
                <?php endforeach; ?>
                <?php if( !count($relatedMarks)): ?>
                  Sem marcas adicionadas
                <?php endif; ?>
              </div>
            </div>
          </div>
    
        </fieldset>
      </div>
      <ul class="sf_admin_actions">
        <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Voltar',)) ?>
        <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
        <li class="sf_admin_action_pesquisa"><a href="<?php echo url_for('@recognition_of_cetaceans_app') ?>">Identificar</a></li>
      </ul>
    </form>
  </div>
</div>

<div class="characterize_photo_image wrapper">
    <div id="viewer2" class="viewer"></div>
</div>

<script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function(){
          var iv2 = $("#viewer2").iviewer(
          {
              src: "<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>"
          });
    });
</script>