<?php use_helper('I18N') ?>

<div id="sf_admin_container">
  <h1>Actualização de fotografias em grupo.</h1>
  
  <?php include_partial('prObservationPhoto/flashes') ?>
  
  <div id="sf_admin_header"></div>
  <div id="sf_admin_content">
    <div class="sf_admin_form">
      
      <form method="post" action="<?php echo url_for('@pr_observation_photo_multi_edit_update?ids='.$sf_request->getParameter('ids')) ?>" enctype="multipart/form-data">
        <fieldset id="sf_fieldset_none">
          <?php if ($form->isCSRFProtected()) : ?>
            <?php echo $form['_csrf_token']->render(); ?>
          <?php endif; ?>
          
          <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_island">
            <?php echo $form['island']->renderError() ?>
            <div>
              <label for="observation_photo_island">Ilha</label>
              <div class="content"><?php echo $form['island']->render() ?></div>
              <div class="help"><?php echo $form['island']->renderHelp() ?></div>
            </div>
          </div>
          
          <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_company_id">
            <div>
              <label for="observation_photo_company_id">Companhia</label>
              <div class="content"><?php echo $form['company_id']->render() ?></div>
              <div class="help"><?php echo $form['company_id']->renderHelp() ?></div>
            </div>
          </div>
          
          <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_photographer_id">
            <div>
              <label for="observation_photo_photographer_id">Fotógrafo</label>
              <div class="content"><?php echo $form['photographer_id']->render() ?></div>
              <div class="help"><?php echo $form['photographer_id']->renderHelp() ?></div>
            </div>
          </div>
        
        </fieldset>

        <ul class="sf_admin_actions">
          <li class="sf_admin_action_back"><a href="<?php echo url_for('@pr_observation_photo') ?>">Cancelar</a></li>
          <li class="sf_admin_action_save"><input type="submit" value="Editar" /></li>
        </ul>
      </form>
    </div>
  </div>
</div>
