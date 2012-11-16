<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>


<div id="sf_admin_container">
  <div class="characterize_block" >
    <h1><?php echo __('A caracterizar fotografia "%fotografia%"', array('%fotografia%' => $observationPhoto->getCode()), 'messages') ?></h1>
    
    <?php if ($sf_user->hasFlash('notice')): ?>
      <div class="notice"><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></div>
    <?php endif; ?>

    <?php if ($sf_user->hasFlash('error')): ?>
      <div class="error"><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></div>
    <?php endif; ?>
    
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
      <?php 
        $relatedMarks = $dorsalLeftForm->getObject()->getObservationPhotoDorsalLeftMarks();
        $markForm = new ObservationPhotoDorsalLeftMarkForm();
        $markForm->setDefault('observation_photo_dorsal_left_id', $dorsalLeftForm->getObject()->getId());
      ?>
      <?php include_partial('prObservationPhoto/form_marks', array(
          'form' => $dorsalLeftForm,
          'pattern' => $pattern,
          'observationPhoto' => $observationPhoto,
          'helper' => $helper,
          'fieldsetName' => 'Dorsal esquerda',
          'patternImage' => $pattern->getImageDorsalLeft(),
          'formRouteDestination' => '@observation_photo_dorsal_left',
          'relatedMarks' => $relatedMarks,
          'routeDeleteMark' => 'observation_photo_dorsal_left_mark_delete',
          'markForm' => $markForm,
          'markFormRouteDestination' => '@observation_photo_dorsal_left_mark'
      )) ?>
    <?php endif; ?>
    
    <?php if( $isRight && $dorsalRightForm ): ?>
      <?php 
        $relatedMarks = $dorsalRightForm->getObject()->getObservationPhotoDorsalRightMarks();
        $markForm = new ObservationPhotoDorsalRightMarkForm();
        $markForm->setDefault('observation_photo_dorsal_right_id', $dorsalRightForm->getObject()->getId());
      ?>
      <?php include_partial('prObservationPhoto/form_marks', array(
          'form' => $dorsalRightForm,
          'pattern' => $pattern,
          'observationPhoto' => $observationPhoto,
          'helper' => $helper,
          'fieldsetName' => 'Dorsal direita',
          'patternImage' => $pattern->getImageDorsalRight(),
          'formRouteDestination' => '@observation_photo_dorsal_right',
          'relatedMarks' => $relatedMarks,
          'routeDeleteMark' => 'observation_photo_dorsal_right_mark_delete',
          'markForm' => $markForm,
          'markFormRouteDestination' => '@observation_photo_dorsal_right_mark'
      )) ?>
    <?php endif; ?>
  </div>
    
</div>
