<p class="content"><?php echo __('The easiest way to reach us is by e-mail. Just write to %1% or use the form below', array('%1%' => $webmaster)); ?></p>
<br />
<?php if (! $sf_user->getFlash('success')): ?>
<form action="<?php echo url_for('contacts/index') ?>" method="post">
  <table>
    <?php echo $form ?>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" value="<?php echo __("Send"); ?>"><?php echo __("Send"); ?></button>&nbsp;&nbsp;&nbsp;
      </td>
    </tr>
  </table>
</form>
<?php else: ?>
<span class="success"><?php echo __('Your message was successfully sent to Monicet'); ?></span>
<?php endif; ?>
<br />
<p class="content"><?php echo __('More formal communication can be made to:'); ?></p>
<?php /*<ul class="content">
    <li><?php echo __('MONICET project'); ?></li>
    <li><?php echo __('c/o'); ?> Prof. Ana Isabel Neto</li>  
</ul>
<ul class="content">
    <li>CIRN, Universidade dos Açores</li>
    <li>R. Mãe de Deus, 13A</li>
    <li>9501-801 Ponta Delgada</li>
    <li><?php echo __('Azores'); ?>, Portugal</li>
</ul>
<ul class="content">
    <li><?php echo __('Phone'); ?>: + 351 296 650 102</li>
    <li>Fax: + 351 296 650 100</li>
</ul>*/ ?>
<div class="content">
  <?php echo html_entity_decode($content->getDescription()) ?>
</div>