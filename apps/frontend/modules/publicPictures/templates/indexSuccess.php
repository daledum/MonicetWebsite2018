
<p class="content">
    <?php echo __('You can send your photos of sightings of cetaceans.'); ?>&nbsp;
    <?php echo __('To do this, you can use the form below.'); ?><br/>
    <?php echo __('We appreciate your cooperation.'); ?>
</p>

<?php if (! $sf_user->getFlash('success')): ?>
<form action="<?php echo url_for('publicPictures/index') ?>" method="post" enctype="multipart/form-data">
  <table>
    <?php echo $form ?>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" value="<?php echo __("Send photo"); ?>"><?php echo __("Send photo"); ?></button>&nbsp;&nbsp;&nbsp;
      </td>
    </tr>
  </table>
</form>
<?php else: ?>
<span class="success"><?php echo __('Your photo was successfully sent to Monicet'); ?></span>
<?php endif; ?>
