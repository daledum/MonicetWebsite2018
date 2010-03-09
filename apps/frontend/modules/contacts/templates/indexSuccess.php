<p class="content"><?php echo __('...'); ?></p>
<p class="content"><?php echo $webmaster; ?></p>
<form action="<?php echo url_for('contacts/submit') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" value="<?php echo _("Send"); ?>"><?php echo _("Send"); ?></button>
      </td>
    </tr>
  </table>
</form>