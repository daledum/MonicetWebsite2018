<p class="content"><?php echo __('The easiest way to reach us is by e-mail. Just write to %1%.', array('%1%' => '<a href="mailto:'.$to.'">'.$to.'</a>')); ?></p>
<br />
<p class="content"><?php echo __('More formal communication can be made to:'); ?></p>
<div class="content">
  <?php echo html_entity_decode($content->getDescription()) ?>
</div>