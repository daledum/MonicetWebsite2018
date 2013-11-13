<?php if( $sf_user->hasModuleCredential( $sf_context->getModuleName(), 'filter' )): ?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div id="pesquisa" class="jqmWindow" style="display: none;" >
<div class="sf_admin_filter">
  <h2><?php echo __('Search', array(), 'sf_admin') ?></h2>
  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>
  
  <?php if($sf_request->getParameter('template', 'index') == 'catalog'): ?>
    <form action="<?php echo url_for('pr_observation_photo_collection', array('action' => 'filter', 'template' => 'catalog')) ?>" method="post">
  <?php else: ?>
    <form action="<?php echo url_for('pr_observation_photo_collection', array('action' => 'filter')) ?>" method="post">
  <?php endif; ?>
    <table cellspacing="0">
      <tfoot>
        <tr>
          <td colspan="2">
            <?php echo $form->renderHiddenFields() ?>
            <input type="submit" value="<?php echo __('Filter', array(), 'sf_admin') ?>" />
          </td>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
        <?php 
          $field_type = $field->getType();
          if( $name == 'individual_id'){
            $field_type = 'Text';
          }
        ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
          <?php include_partial('prObservationPhoto/filters_field', array(
            'name'       => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label'      => $field->getConfig('label'),
            'help'       => $field->getConfig('help'),
            'form'       => $form,
            'field'      => $field,
            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field_type).' sf_admin_filter_field_'.$name,
          )) ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </form>
</div>
</div>
<?php endif; ?>