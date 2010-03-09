<?php use_helper('I18N', 'Date') ?>
<?php include_partial($sf_context->getModuleName().'/assets') ?>

<div id="sf_admin_container">
  <h1>A mostrar o log</h1>

  <?php include_partial($sf_context->getModuleName().'/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial($sf_context->getModuleName().'/list_header', array()) ?>
  </div>
  
  <div id="sf_admin_content">
    <table cellspacing="0" class="show">
      <tbody>
        <?php foreach( $sf_data->getRaw('configuration')->getFieldsList() as $name => $options ): ?>
        <tr>
          <th><?php echo __($name, null, 'mf_log')?></th>
          <td><?php echo call_user_func(array($object, 'get'.mfLogPeer::translateFieldName($name, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME))) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial($sf_context->getModuleName().'/list_footer', array()) ?>
  </div>
</div>