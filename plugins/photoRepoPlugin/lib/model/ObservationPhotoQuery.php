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
      if( in_array('all_complete_marks', $choices) ){
        $query = self::_completeMarksQuery($observationPhoto, $query, $all=true);
      }
      if( in_array('any_complete_marks', $choices) ){
        $query = self::_completeMarksQuery($observationPhoto, $query, $all=false);
      }
      if( in_array('partial_marks', $choices) ){
        $query = $query->filterById(99999);
      }
    }

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
                
                if( !count($marks) ) {
                  $observationPhotoIds = ObservationPhotoDorsalLeftMarkPeer::getAllObservationPhotoIds();
                  $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
                }
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
                
                if( !count($marks) ) {
                  $observationPhotoIds = ObservationPhotoDorsalRightMarkPeer::getAllObservationPhotoIds();
                  $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
                }
                
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
                
                if( !count($marks) ) {
                  $observationPhotoIds = ObservationPhotoTailMarkPeer::getAllObservationPhotoIds();
                  $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
                }
    }
    return $query;
  }
  
  // to retrieve observationPhotos with same complete marks charactization
  public static function _completeMarksQuery($observationPhoto, $query, $all=true){
    //$query = ObservationPhotoQuery::create();
    $marks = array();
    if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
      $OPDorsalLeft = ObservationPhotoDorsalLeftPeer::get_or_create($observationPhoto->getId());
      $marks = $OPDorsalLeft->getObservationPhotoDorsalLeftMarks();
      $query = $query->useObservationPhotoDorsalLeftQuery();
        $conditionNames = array();
        if( count($marks) ) {
          $query = $query->useObservationPhotoDorsalLeftMarkQuery();
            $mark_counter = 1;
            foreach( $marks as $mark ){
              $query = $query->condition($mark_counter.'_1', ObservationPhotoDorsalLeftMarkPeer::PATTERN_CELL_TAIL_ID, $mark->getPatternCellTailId());
              $query = $query->condition($mark_counter.'_2', ObservationPhotoDorsalLeftMarkPeer::IS_WIDE, $mark->getIsWide());
              $query = $query->condition($mark_counter.'_3', ObservationPhotoDorsalLeftMarkPeer::IS_DEEP, $mark->getIsDeep());
              $query = $query->condition($mark_counter.'_4', ObservationPhotoDorsalLeftMarkPeer::TO_CELL_ID, $mark->getToCellId());
              $query = $query->combine(array($mark_counter.'_1', $mark_counter.'_2', $mark_counter.'_3', $mark_counter.'_4'), Criteria::LOGICAL_AND, 'cond_'.$mark_counter);
              $conditionNames[] = 'cond_'.$mark_counter;
              $mark_counter += 1;
            }
            $query = $query->combine($conditionNames, ($all)? Criteria::LOGICAL_AND: Criteria::LOGICAL_OR);
          $query = $query->endUse();
        }
      $query = $query->endUse();
    
    } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
      $OPDorsalRight = ObservationPhotoDorsalRightPeer::get_or_create($observationPhoto->getId());
      $marks = $OPDorsalRight->getObservationPhotoDorsalRightMarks();
      $query = $query->useObservationPhotoDorsalRightQuery();
        $conditionNames = array();
        if( count($marks) ) {
          $query = $query->useObservationPhotoDorsalRightMarkQuery();
            $mark_counter = 1;
            foreach( $marks as $mark ){
              $query = $query->condition($mark_counter.'_1', ObservationPhotoDorsalRightMarkPeer::PATTERN_CELL_TAIL_ID, $mark->getPatternCellTailId());
              $query = $query->condition($mark_counter.'_2', ObservationPhotoDorsalRightMarkPeer::IS_WIDE, $mark->getIsWide());
              $query = $query->condition($mark_counter.'_3', ObservationPhotoDorsalRightMarkPeer::IS_DEEP, $mark->getIsDeep());
              $query = $query->condition($mark_counter.'_4', ObservationPhotoDorsalRightMarkPeer::TO_CELL_ID, $mark->getToCellId());
              $query = $query->combine(array($mark_counter.'_1', $mark_counter.'_2', $mark_counter.'_3', $mark_counter.'_4'), Criteria::LOGICAL_AND, 'cond_'.$mark_counter);
              $conditionNames[] = 'cond_'.$mark_counter;
              $mark_counter += 1;
            }
            $query = $query->combine($conditionNames, ($all)? Criteria::LOGICAL_AND: Criteria::LOGICAL_OR);
          $query = $query->endUse();
        }
      $query = $query->endUse();
      
    } elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
      $OPTail = ObservationPhotoTailPeer::get_or_create($observationPhoto->getId());
      $marks = $OPTail->getObservationPhotoTailMarks();
      $query = $query->useObservationPhotoTailQuery();
        $conditionNames = array();
        //same characterization on observationPhotoTail
        if( count($marks) ) {
          $query = $query->useObservationPhotoTailMarkQuery();
            $mark_counter = 1;
            foreach( $marks as $mark ){
              $query = $query->condition($mark_counter.'_1', ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, $mark->getPatternCellTailId());
              $query = $query->condition($mark_counter.'_2', ObservationPhotoTailMarkPeer::IS_WIDE, $mark->getIsWide());
              $query = $query->condition($mark_counter.'_3', ObservationPhotoTailMarkPeer::IS_DEEP, $mark->getIsDeep());
              $query = $query->condition($mark_counter.'_4', ObservationPhotoTailMarkPeer::TO_CELL_ID, $mark->getToCellId());
              $query = $query->combine(array($mark_counter.'_1', $mark_counter.'_2', $mark_counter.'_3', $mark_counter.'_4'), Criteria::LOGICAL_AND, 'cond_'.$mark_counter);
              $conditionNames[] = 'cond_'.$mark_counter;
              $mark_counter += 1;
            }
            $query = $query->combine($conditionNames, ($all)? Criteria::LOGICAL_AND: Criteria::LOGICAL_OR);
          $query = $query->endUse();
        }
      $query = $query->endUse();
        
    }
    return $query;
  }
} // ObservationPhotoQuery
