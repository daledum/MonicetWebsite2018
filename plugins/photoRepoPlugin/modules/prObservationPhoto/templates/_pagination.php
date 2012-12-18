<div class="sf_admin_pagination">
  <?php if($sf_request->getParameter('template')): ?>
    <?php $urlApendStr = '&template=catalog' ?>
  <?php else: ?>
    <?php $urlApendStr = '' ?>
  <?php endif; ?>
  <?php if( $pager->getPage() != 1 ): ?>
  <a href="<?php echo url_for('@pr_observation_photo') ?>?page=1<?php echo $urlApendStr ?>">
    <?php echo image_tag('/mfAdministracaoPlugin/images/icons/first.png', array('alt' => __('First page', array(), 'sf_admin'), 'title' => __('First page', array(), 'sf_admin'))) ?>
  </a>

  <a href="<?php echo url_for('@pr_observation_photo') ?>?page=<?php echo $pager->getPreviousPage().$urlApendStr ?>">
    <?php echo image_tag('/mfAdministracaoPlugin/images/icons/previous.png', array('alt' => __('Previous page', array(), 'sf_admin'), 'title' => __('Previous page', array(), 'sf_admin'))) ?>
  </a>
  <?php endif; ?>

  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <?php echo $page ?>
    <?php else: ?>
      <a href="<?php echo url_for('@pr_observation_photo') ?>?page=<?php echo $page.$urlApendStr ?>" class="sf_admin_pagination_text"><?php echo $page ?></a>
    <?php endif; ?>
  <?php endforeach; ?>


  <?php if( $pager->getPage() != $pager->getLastPage() ): ?>
  <a href="<?php echo url_for('@pr_observation_photo') ?>?page=<?php echo $pager->getNextPage().$urlApendStr ?>">
    <?php echo image_tag('/mfAdministracaoPlugin/images/icons/next.png', array('alt' => __('Next page', array(), 'sf_admin'), 'title' => __('Next page', array(), 'sf_admin'))) ?>
  </a>

  <a href="<?php echo url_for('@pr_observation_photo') ?>?page=<?php echo $pager->getLastPage().$urlApendStr ?>">
    <?php echo image_tag('/mfAdministracaoPlugin/images/icons/last.png', array('alt' => __('Last page', array(), 'sf_admin'), 'title' => __('Last page', array(), 'sf_admin'))) ?>
  </a>
  <?php endif; ?>
</div>