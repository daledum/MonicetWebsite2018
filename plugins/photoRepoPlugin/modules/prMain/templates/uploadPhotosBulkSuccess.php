<?php use_helper('I18N') ?>

<div id="sf_admin_container">
  <h1>A enviar imagens de cetáceos para reconhecimento</h1>
  
  <?php include_partial('prMain/flashes') ?>
  
  <div id="sf_admin_header"></div>
  <div id="sf_admin_content">
    <div class="sf_admin_form">
      
      <form method="post" action="<?php echo url_for('@pr_process_add_photos_bulk') ?>" enctype="multipart/form-data">
        <fieldset id="sf_fieldset_none">
          <?php if ($form->isCSRFProtected()) : ?>
            <?php echo $form['_csrf_token']->render(); ?>
          <?php endif; ?>
          <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_creditos errors">
            <?php echo $form['photo']->renderError() ?>
            <div>
              <?php echo $form['photo']->renderLabel() ?>
              <div class="content"><?php echo $form['photo']->render() ?></div>
              <div class="help"><?php echo $form['photo']->renderHelp() ?></div>
            </div>
          </div>
        </fieldset>

        <ul class="sf_admin_actions">
          <li class="sf_admin_action_back"><a href="<?php echo url_for('@recognition_of_cetaceans_app') ?>">Painel de controlo</a></li>
          <li class="sf_admin_action_save"><input type="submit" value="Enviar" /></li>
        </ul>
      </form>
    </div>
  </div>
</div>
