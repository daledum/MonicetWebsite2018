<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_content characterize_photo_container">
  
  <div class="sf_admin_form">
    <?php echo form_tag_for($form, $formRouteDestination) ?>
    
      <div class="characterize_photo_pattern">
        <?php if($pattern): ?>
        
          <?php if($patternImage ): ?>
            <img width="450" src="<?php echo url_for( '/uploads/pr_patterns/'.$patternImage ) ?>" />
          <?php else: ?>
            <p>Padrão indisponível.</p>
          <?php endif; ?>
            
        <?php else: ?>
          <p>Padrão indisponível.</p>
        <?php endif; ?>
      </div>
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
                <?php echo $form['is_cutted_point']->renderHelp() ?></div>
              </div>
            </div>
          <?php endif; ?>
          
          <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
            <div class="form_line_characterization">
              <?php echo $form['Marcas']->renderLabel() ?>
              <div class="content">
                <?php foreach( $relatedMarks as $mark ): ?>
                  <?php echo $mark ?> &nbsp;&nbsp;&nbsp;<?php echo link_to('Apagar', '@recognition_of_cetaceans_app', 'confirm=Tem a certezaque pretende apagar esta marca??') ?><br/>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
            <div class="form_line_characterization">
              Nova marca
              <div class="content"><?php echo $form['Marcas']->render() ?></div>
            </div>
          </div>

        </fieldset>
      </div>
      <ul class="sf_admin_actions">
        <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
        <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
      </ul>
    </form>
  </div>
</div>

<div class="characterize_photo_image">
  <img width="770" src="<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>" />
</div>

