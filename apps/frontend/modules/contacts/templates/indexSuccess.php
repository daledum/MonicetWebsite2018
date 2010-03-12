<p class="content"><?php echo __('...'); ?></p>
<p class="content"><?php echo $webmaster; ?></p>
<form action="<?php echo url_for('contacts/index') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" value="<?php echo _("Send"); ?>"><?php echo _("Send"); ?></button>&nbsp;&nbsp;&nbsp;
        <?php if ($sf_user->getFlash('success')): ?><span class="success"><?php echo __('Your message was successfully sent to Monicet'); ?></span><?php endif; ?>
      </td>
    </tr>
  </table>
  
</form>