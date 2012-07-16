<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('A caracterizar fotografia', array(), 'messages') ?></h1>

  <?php include_partial('prObservationPhoto/flashes') ?>
  <?php if( $isTail ): ?>
    <div class="line_pattern">
      <div class="line_pattern_photo">
        <img src="<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>" />
      </div>
      <div class="line_pattern_pattern">
        <?php if($pattern): ?>
          <?php if($pattern->getImageTail()): ?>
            <img src="<?php echo url_for( '/uploads/pr_patterns/'.$pattern->getImageTail() ) ?>" />
            <?php else: ?>
              <p>Padrão indisponível.</p>
            <?php endif; ?>
        <?php else: ?>
          <p>Padrão indisponível.</p>
        <?php endif; ?>
      </div>
      <div class="line_pattern_form">
        form
      </div>
    <? endif; ?>
    <?php if( $isLeft ): ?>
    <div class="line_pattern">
      <div class="line_pattern_photo">
        <img src="<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>" />
      </div>
      <div class="line_pattern_pattern">
        <?php if($pattern): ?>
          <?php if($pattern->getImageDorsalLeft()): ?>
            <img src="<?php echo url_for( '/uploads/pr_patterns/'.$pattern->getImageDorsalLeft() ) ?>" />
            <?php else: ?>
              <p>Padrão indisponível.</p>
            <?php endif; ?>
        <?php else: ?>
          <p>Padrão indisponível.</p>
        <?php endif; ?>
      </div>
      <div class="line_pattern_form">
        form
      </div>
    <? endif; ?>
    <?php if( $isRight ): ?>
    <div class="line_pattern">
      <div class="line_pattern_photo">
        <img src="<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>" />
      </div>
      <div class="line_pattern_pattern">
        <?php if($pattern): ?>
          <?php if($pattern->getImageDorsalRight()): ?>
            <img src="<?php echo url_for( '/uploads/pr_patterns/'.$pattern->getImageDorsalRight() ) ?>" />
            <?php else: ?>
              <p>Padrão indisponível.</p>
            <?php endif; ?>
        <?php else: ?>
          <p>Padrão indisponível.</p>
        <?php endif; ?>
      </div>
      <div class="line_pattern_form">
        form
      </div>
    <? endif; ?>
  </div>
</div>
