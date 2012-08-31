<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>


<div id="sf_admin_container">
  <div class="characterize_block" >
      <h1><?php echo __('A caracterizar fotografia "%fotografia%"', array('%fotografia%' => $observationPhoto->getCode()), 'messages') ?></h1>
    <?php include_partial('prObservationPhoto/flashes') ?>
    
    <?php if( $isTail && $tailForm ): ?>
      <?php 
        $relatedMarks = $tailForm->getObject()->getObservationPhotoTailMarks();
        $markForm = new ObservationPhotoTailMarkForm();
        $markForm->setDefault('observation_photo_tail_id', $tailForm->getObject()->getId());
      ?>
      <?php include_partial('prObservationPhoto/form_marks', array(
          'form' => $tailForm,
          'pattern' => $pattern,
          'observationPhoto' => $observationPhoto,
          'helper' => $helper,
          'fieldsetName' => 'Cauda',
          'patternImage' => $pattern->getImageTail(),
          'formRouteDestination' => '@observation_photo_tail',
          'relatedMarks' => $relatedMarks,
          'routeDeleteMark' => 'observation_photo_tail_mark_delete',
          'markForm' => $markForm,
          'markFormRouteDestination' => '@observation_photo_tail_mark'
      )) ?>
    <?php endif; ?>
    
    <?php if( $isLeft && $dorsalLeftForm ): ?>
      <?php include_partial('prObservationPhoto/form_marks', array(
          'form' => $dorsalLeftForm,
          'pattern' => $pattern,
          'observationPhoto' => $observationPhoto,
          'helper' => $helper,
          'fieldsetName' => 'Dorsal esquerda',
          'patternImage' => $pattern->getImageDorsalLeft(),
          'formRouteDestination' => '@observation_photo_dorsal_left',
          'relatedMarks' => $dorsalLeftForm->getObject()->getObservationPhotoDorsalLeftMarks()
      )) ?>
    <?php endif; ?>
    
    <?php if( $isRight && $dorsalRightForm ): ?>
      <?php include_partial('prObservationPhoto/form_marks', array(
          'form' => $dorsalRightForm,
          'pattern' => $pattern,
          'observationPhoto' => $observationPhoto,
          'helper' => $helper,
          'fieldsetName' => 'Dorsal direita',
          'patternImage' => $pattern->getImageDorsalRight(),
          'formRouteDestination' => '@observation_photo_dorsal_right',
          'relatedMarks' => $dorsalRightForm->getObject()->getObservationPhotoDorsalRightMarks()
      )) ?>
    <?php endif; ?>
  </div>
    
</div>
