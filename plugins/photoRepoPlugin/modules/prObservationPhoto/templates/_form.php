<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php if( !$sf_request->hasParameter('file')): ?>
    <?php echo form_tag_for($form, '@pr_observation_photo') ?>
  <?php else: ?>
    <form action="<?php echo url_for('@pr_observation_photo_'.( ($form->getObject()->isNew())? 'create': 'update' ).'?file='.$sf_request->getParameter('file'), $form->getObject()) ?>" method="post">
  <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('prObservationPhoto/form_fieldset', array('ObservationPhoto' => $ObservationPhoto, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>

    <?php include_partial('prObservationPhoto/form_actions', array('ObservationPhoto' => $ObservationPhoto, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
