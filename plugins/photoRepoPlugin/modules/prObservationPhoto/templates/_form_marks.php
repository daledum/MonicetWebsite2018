<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_content characterize_photo_container">
  
  <div class="sf_admin_form">
    <?php echo form_tag_for($form, $formRouteDestination) ?>
    
      <div class="characterize_photo_pattern">
        <?php if($pattern): ?>
          <?php if($pattern->getImageTail()): ?>
            <img width="450" src="<?php echo url_for( '/uploads/pr_patterns/'.$patternImage ) ?>" />
            <?php else: ?>
              <p>Padrão indisponível.</p>
            <?php endif; ?>
        <?php else: ?>
          <p>Padrão indisponível.</p>
        <?php endif; ?>
      </div>
    
      <fieldset id="sf_fieldset_none">
        <h2><?php echo $fieldsetName ?></h2>
        <?php echo $form->renderHiddenFields(false) ?>

        <?php if ($form->hasGlobalErrors()): ?>
          <?php echo $form->renderGlobalErrors() ?>
        <?php endif; ?>

        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
          <?php echo $form['is_smooth']->renderError() ?>
          <div>
            <?php echo $form['is_smooth']->renderLabel() ?>
            <div class="content"><?php echo $form['is_smooth']->render() ?></div>
            <div class="help"><?php echo $form['is_smooth']->renderHelp() ?></div>
          </div>
        </div>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
          <?php echo $form['is_irregular']->renderError() ?>
          <div>
            <?php echo $form['is_irregular']->renderLabel() ?>
            <div class="content"><?php echo $form['is_irregular']->render() ?></div>
            <div class="help"><?php echo $form['is_irregular']->renderHelp() ?></div>
          </div>
        </div>

        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
          <?php echo $form['Marcas']->renderError() ?>
          <div>
            <?php echo $form['Marcas']->renderLabel() ?>
            <div class="content"><?php echo $form['Marcas']->render() ?></div>
            <div class="help"><?php echo $form['Marcas']->renderHelp() ?></div>
          </div>
        </div>

      </fieldset>

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

