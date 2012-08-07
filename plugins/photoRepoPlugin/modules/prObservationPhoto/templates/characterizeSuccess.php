<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>


<div id="sf_admin_container">
  <div class="characterize_block" >
    <h1><?php echo __('A caracterizar fotografia', array(), 'messages') ?></h1>
    <?php include_partial('prObservationPhoto/flashes') ?>
    
    <?php if( $isTail && $tailForm ): ?>
      <?php include_partial('prObservationPhoto/form_marks', array(
          'form' => $tailForm,
          'pattern' => $pattern,
          'observationPhoto' => $observationPhoto,
          'helper' => $helper,
          'fieldsetName' => 'Cauda',
          'patternImage' => $pattern->getImageTail(),
          'formRouteDestination' => '@observation_photo_tail'
      )) ?>
    <? endif; ?>
    
    <?php if( $isLeft && $dorsalLeftForm ): ?>
      <?php include_partial('prObservationPhoto/form_marks', array(
          'form' => $dorsalLeftForm,
          'pattern' => $pattern,
          'observationPhoto' => $observationPhoto,
          'helper' => $helper,
          'fieldsetName' => 'Dorsal esquerda',
          'patternImage' => $pattern->getImageDorsalLeft(),
          'formRouteDestination' => '@observation_photo_dorsal_left'
      )) ?>
    <? endif; ?>
    
    <?php if( $isRight && $dorsalRightForm ): ?>
      <?php include_partial('prObservationPhoto/form_marks', array(
          'form' => $dorsalRightForm,
          'pattern' => $pattern,
          'observationPhoto' => $observationPhoto,
          'helper' => $helper,
          'fieldsetName' => 'Dorsal direita',
          'patternImage' => $pattern->getImageDorsalRight(),
          'formRouteDestination' => '@observation_photo_dorsal_right'
      )) ?>
    <? endif; ?>
  </div>
    
</div>

      
<?php /* ?>

<?php */ ?>