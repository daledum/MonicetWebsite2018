<?php


class ObservationPhotoQuery extends BaseObservationPhotoQuery {
  public static function getPossibleMatches($observationPhoto, $choices = array()) {
    $query = ObservationPhotoQuery::create();
    //print_r($choices);
    // Validated State State
    $query = $query->filterByStatus(ObservationPhoto::V_SIGLA);
    
    // Same specie
    $query = $query->filterBySpecieId($observationPhoto->getSpecieId());
    
    //same Body Part
    if( in_array('same_body_part', $choices) ){
      $query = $query->filterByBodyPartId($observationPhoto->getBodyPartId());
    }
    
    if( in_array('same', $choices) ){
      //filter same caracterization
      // to dont return nothin for while
      $query = self::_completeCharacterizationQuery($observationPhoto, $query);
    } else {
      //filter other choices
      if( in_array('smooth', $choices) ){
        $query = self::_get_smooth_filter($query, $observationPhoto);
      }
      if( in_array('irregular', $choices) ){
        $query = self::_get_irregular_filter($query, $observationPhoto);
      }
      if( in_array('cutted_point', $choices) ){
        $query = self::_get_cutted_point_filter($query, $observationPhoto);
      }
      if( in_array('cutted_point_left', $choices) ){
        $query = self::_get_cutted_point_left_filter($query, $observationPhoto);
      }
      if( in_array('cutted_point_right', $choices) ){
        $query = self::_get_cutted_point_right_filter($query, $observationPhoto);
      }
    }
    
    

//    // filter photos with same complete characterization
//    if( $complete ){
//      $query = self::_completeCharacterizationQuery($observationPhoto, $query);
//    }
//    
//    // filter photos with partial characterization
//    if( $partial ){
//      $query = self::_partialCharacterizationQuery($observationPhoto, $query);
//    }
//    // only photos marked as best
    if( in_array('best', $choices) ){
      $query = $query->filterByIsBest(true);
    }
    
    //$query = $query->orderByCode('desc');
    $query = $query->useIndividualQuery()
              ->orderByName('desc')
            ->endUse();
    $query = $query->orderByCode();
    
    return $query->find();
  }
  
  public static function _choose_class_by_body_part($query, $observationPhoto){
    if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
      $query = $query->useObservationPhotoDorsalLeftQuery();
    } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
      $query = $query->useObservationPhotoDorsalRightQuery();
    }elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
      $query = $query->useObservationPhotoTailQuery();
    }
    return $query;
  }

  public static function _get_smooth_filter($query, $observationPhoto){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsSmooth(true)->endUse();
    return $query;
  }
  
  public static function _get_irregular_filter($query, $observationPhoto){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsIrregular(true)->endUse();
    return $query;
  }
  
  public static function _get_cutted_point_filter($query, $observationPhoto){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsCuttedPoint(true)->endUse();
    return $query;
  }
  
  public static function _get_cutted_point_left_filter($query, $observationPhoto){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsCuttedPointLeft(true)->endUse();
    return $query;
  }
  
  public static function _get_cutted_point_right_filter($query, $observationPhoto){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsCuttedPointRight(true)->endUse();
    return $query;
  }
  
  // to retrieve observationPhotos with same complete charactization including same marks
  public static function _completeCharacterizationQuery($observationPhoto, $query){
    //$query = ObservationPhotoQuery::create();
    $marks = array();
    if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
      $OPDorsalLeft = ObservationPhotoDorsalLeftPeer::get_or_create($observationPhoto->getId());
      $marks = $OPDorsalLeft->getObservationPhotoDorsalLeftMarks();
      $query = $query->useObservationPhotoDorsalLeftQuery()
                ->filterByIsSmooth($OPDorsalLeft->getIsSmooth())
                ->filterByIsIrregular($OPDorsalLeft->getIsIrregular())
                ->filterByIsCuttedPoint($OPDorsalLeft->getIsCuttedPoint());
                if( count($marks) ) {
                  $query = $query->useObservationPhotoDorsalLeftMarkQuery();
                    foreach( $marks as $mark ){
                      // same mark identicaly
                      $query = $query->filterByPatternCellDorsalLeftId($mark->getPatternCellDorsalLeftId())
                              ->filterByIsWide($mark->getIsWide())
                              ->filterByIsDeep($mark->getIsDeep())
                              ->filterByToCellId($mark->getToCellId());
                    }
                  $query = $query->endUse();
                }
              $query = $query->endUse();
    } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
      $OPDorsalRight = ObservationPhotoDorsalRightPeer::get_or_create($observationPhoto->getId());
      $marks = $OPDorsalRight->getObservationPhotoDorsalRightMarks();
      $query = $query->useObservationPhotoDorsalRightQuery()
                ->filterByIsSmooth($OPDorsalRight->getIsSmooth())
                ->filterByIsIrregular($OPDorsalRight->getIsIrregular())
                ->filterByIsCuttedPoint($OPDorsalRight->getIsCuttedPoint());
                if( count($marks) ) {
                  $query = $query->useObservationPhotoDorsalRightMarkQuery();
                    foreach( $marks as $mark ){
                      // same mark identicaly
                      $query = $query->filterByPatternCellDorsalRightId($mark->getPatternCellDorsalRightId())
                              ->filterByIsWide($mark->getIsWide())
                              ->filterByIsDeep($mark->getIsDeep())
                              ->filterByToCellId($mark->getToCellId());
                    }
                  $query = $query->endUse();
                }
              $query = $query->endUse();
    } elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
      $OPTail = ObservationPhotoTailPeer::get_or_create($observationPhoto->getId());
      $marks = $OPTail->getObservationPhotoTailMarks();
      //same characterization on observationPhotoTail
      $query = $query->useObservationPhotoTailQuery()
                ->filterByIsSmooth($OPTail->getIsSmooth())
                ->filterByIsIrregular($OPTail->getIsIrregular())
                ->filterByIsCuttedPointLeft($OPTail->getIsCuttedPointLeft())
                ->filterByIsCuttedPointRight($OPTail->getIsCuttedPointRight());
                if( count($marks) ) {
                  $query = $query->useObservationPhotoTailMarkQuery();
                    foreach( $marks as $mark ){
                      // same mark identicaly
                      $query = $query->filterByPatternCellTailId($mark->getPatternCellTailId())
                              ->filterByIsWide($mark->getIsWide())
                              ->filterByIsDeep($mark->getIsDeep())
                              ->filterByToCellId($mark->getToCellId());
                    }
                  $query = $query->endUse();
                }
              $query = $query->endUse();
    }
    return $query;
  }
//  // to retrieve observationPhotos with partia charactization including marks
//  public static function _partialCharacterizationQuery($observationPhoto, $query){
//    //$query = ObservationPhotoQuery::create();
//    if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
//      $OPDorsalLeft = ObservationPhotoDorsalLeftPeer::get_or_create($observationPhoto->getId());
//      $marks = $OPDorsalLeft->getObservationPhotoDorsalLeftMarks();
//      $query = $query->useObservationPhotoDorsalLeftQuery()
//              ->endUse()
//              ->condition('cond1', ObservationPhotoDorsalLeftPeer::IS_SMOOTH, $OPDorsalLeft->getIsSmooth())
//              ->condition('cond2', ObservationPhotoDorsalLeftPeer::IS_IRREGULAR, $OPDorsalLeft->getIsIrregular())
//              ->condition('cond3', ObservationPhotoDorsalLeftPeer::IS_CUTTED_POINT, $OPDorsalLeft->getIsCuttedPoint())
//              ->combine(array('cond1', 'cond2', 'cond3'), Criteria::LOGICAL_OR);
//    } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
//      $OPDorsalRight = ObservationPhotoDorsalRightPeer::get_or_create($observationPhoto->getId());
//      $marks = $OPDorsalRight->getObservationPhotoDorsalRightMarks();
//      $query = $query->useObservationPhotoDorsalRightQuery()
//              ->endUse()
//              ->condition('cond1', ObservationPhotoDorsalRightPeer::IS_SMOOTH, $OPDorsalRight->getIsSmooth())
//              ->condition('cond2', ObservationPhotoDorsalRightPeer::IS_IRREGULAR, $OPDorsalRight->getIsIrregular())
//              ->condition('cond3', ObservationPhotoDorsalRightPeer::IS_CUTTED_POINT, $OPDorsalRight->getIsCuttedPoint())
//              ->combine(array('cond1', 'cond2', 'cond3'), Criteria::LOGICAL_OR);
//    } elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
//      $OPTail = ObservationPhotoTailPeer::get_or_create($observationPhoto->getId());
//      $marks = $OPTail->getObservationPhotoTailMarks();
//      $query = $query->useObservationPhotoTailQuery()
//              ->endUse()
//              ->condition('cond1', ObservationPhotoTailPeer::IS_SMOOTH, $OPTail->getIsSmooth())
//              ->condition('cond2', ObservationPhotoTailPeer::IS_IRREGULAR, $OPTail->getIsIrregular())
//              ->condition('cond3', ObservationPhotoTailPeer::IS_CUTTED_POINT_LEFT, $OPTail->getIsCuttedPointLeft())
//              ->condition('cond4', ObservationPhotoTailPeer::IS_CUTTED_POINT_RIGHT, $OPTail->getIsCuttedPointRight())
//              ->combine(array('cond1', 'cond2', 'cond3', 'cond4'), Criteria::LOGICAL_OR);
//    }
//    return $query;
//  }
} // ObservationPhotoQuery
