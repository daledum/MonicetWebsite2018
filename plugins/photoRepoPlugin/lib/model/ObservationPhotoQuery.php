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
      if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
        $query = self::_completeCharacterizationDorsalLeftQuery($observationPhoto, $query);
      } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
        $query = self::_completeCharacterizationDorsalRightQuery($observationPhoto, $query);
      }elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
        $query = self::_completeCharacterizationTailQuery($observationPhoto, $query);
      }
      
      //$query = self::_completeCharacterizationQuery($observationPhoto, $query);
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
//      if( in_array('all_complete_marks', $choices) || in_array('any_complete_marks', $choices) ){
//        
//        $all = ( in_array('all_complete_marks', $choices) )? true: false;
//        
//        //filter same caracterization
//        if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
//          $OPDorsalLeft = ObservationPhotoDorsalLeftPeer::get_or_create($observationPhoto->getId());
//          $query = self::_completeCharacterizationDorsalLeftMarkQuery($query, $OPDorsalLeft, $all);
//        } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
//          $OPDorsalRight = ObservationPhotoDorsalRightPeer::get_or_create($observationPhoto->getId());
//          $query = self::_completeCharacterizationDorsalRightMarkQuery($query, $OPDorsalRight, $all);
//        }elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
//          $OPTail = ObservationPhotoTailPeer::get_or_create($observationPhoto->getId());
//          $query = self::_completeCharacterizationTailMarkQuery($query, $OPTail, $all);
//        }
//      }
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

  public static function _get_smooth_filter($query, $observationPhoto, $value=true){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsSmooth($value)->endUse();
    return $query;
  }
  
  public static function _get_irregular_filter($query, $observationPhoto, $value=true){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsIrregular($value)->endUse();
    return $query;
  }
  
  public static function _get_cutted_point_filter($query, $observationPhoto, $value=true){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsCuttedPoint($value)->endUse();
    return $query;
  }
  
  public static function _get_cutted_point_left_filter($query, $observationPhoto, $value=true){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsCuttedPointLeft($value)->endUse();
    return $query;
  }
  
  public static function _get_cutted_point_right_filter($query, $observationPhoto, $value=true){
    $query = self::_choose_class_by_body_part($query, $observationPhoto);
    $query = $query->filterByIsCuttedPointRight($value)->endUse();
    return $query;
  }
  
  public static function _completeCharacterizationDorsalLeftQuery($observationPhoto, $query){
    $OPDorsalLeft = ObservationPhotoDorsalLeftPeer::get_or_create($observationPhoto->getId());
    $query = self::_get_smooth_filter($query, $observationPhoto, $OPDorsalLeft->getIsSmooth());
    $query = self::_get_irregular_filter($query, $observationPhoto, $OPDorsalLeft->getIsIrregular());
    $query = self::_get_cutted_point_filter($query, $observationPhoto, $OPDorsalLeft->getIsCuttedPoint());
    $query = self::_completeCharacterizationDorsalLeftMarkQuery($query, $OPDorsalLeft);
    return $query;
  }
  
  public static function _completeCharacterizationDorsalRightQuery($observationPhoto, $query){
    $OPDorsalRight = ObservationPhotoDorsalRightPeer::get_or_create($observationPhoto->getId());
    $query = self::_get_smooth_filter($query, $observationPhoto, $OPDorsalRight->getIsSmooth());
    $query = self::_get_irregular_filter($query, $observationPhoto, $OPDorsalRight->getIsIrregular());
    $query = self::_get_cutted_point_filter($query, $observationPhoto, $OPDorsalRight->getIsCuttedPoint());
    $query = self::_completeCharacterizationDorsalRightMarkQuery($query, $OPDorsalRight);
    return $query;
  }
  
  public static function _completeCharacterizationTailQuery($observationPhoto, $query){
    $OPTail = ObservationPhotoTailPeer::get_or_create($observationPhoto->getId());
    $query = self::_get_smooth_filter($query, $observationPhoto, $OPTail->getIsSmooth());
    $query = self::_get_irregular_filter($query, $observationPhoto, $OPTail->getIsIrregular());
    $query = self::_get_cutted_point_left_filter($query, $observationPhoto, $OPTail->getIsCuttedPointLeft());
    $query = self::_get_cutted_point_right_filter($query, $observationPhoto, $OPTail->getIsCuttedPointRight());
    $query = self::_completeCharacterizationTailMarkQuery($query, $OPTail);
    return $query;
  }
  
  public static function _completeCharacterizationTailMarkQuery($query, $OPTail, $all=true){
    $marks = $OPTail->getObservationPhotoTailMarks();
    //same characterization on observationPhotoTail
    if( count($marks) ) {
      $query = $query->useObservationPhotoTailQuery();
        $conditionNames = array();
        $query = $query->useObservationPhotoTailMarkQuery();
          $mark_counter = 1;
          foreach( $marks as $mark ){
            $conditions = array($mark_counter.'_1', $mark_counter.'_2', $mark_counter.'_3');
            $query = $query->condition($mark_counter.'_1', 'ObservationPhotoTailMark.PatternCellTailId = ?', $mark->getPatternCellTailId());
            $query = $query->condition($mark_counter.'_2', 'ObservationPhotoTailMark.IsWide = ?', $mark->getIsWide());
            $query = $query->condition($mark_counter.'_3', 'ObservationPhotoTailMark.IsDeep = ?', $mark->getIsDeep());
            if( $mark->getToCellId() ){
              $query = $query->condition($mark_counter.'_4', 'ObservationPhotoTailMark.ToCellId = ?', $mark->getToCellId());
              $conditions[] = $mark_counter.'_4';
            }
            $query = $query->combine($conditions, Criteria::LOGICAL_AND, 'cond_'.$mark_counter);
            $conditionNames[] = 'cond_'.$mark_counter;
            $mark_counter += 1;
          }
          $query = $query->combine($conditionNames, ($all)? Criteria::LOGICAL_AND: Criteria::LOGICAL_OR);
        $query = $query->endUse();
      $query = $query->endUse();
    } else {
      $observationPhotoIds = ObservationPhotoTailMarkPeer::getAllObservationPhotoIds();
      $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
    }
    return $query;
  }
  
  public static function _completeCharacterizationDorsalRightMarkQuery($query, $OPDorsalRight, $all=true){
    $marks = $OPDorsalRight->getObservationPhotoDorsalRightMarks();
    //same characterization on observationPhotoDorsalRight
    if( count($marks) ) {
      $query = $query->useObservationPhotoDorsalRightQuery();
        $conditionNames = array();
        $query = $query->useObservationPhotoDorsalRightMarkQuery();
          $mark_counter = 1;
          foreach( $marks as $mark ){
            $conditions = array($mark_counter.'_1', $mark_counter.'_2', $mark_counter.'_3');
            $query = $query->condition($mark_counter.'_1', 'ObservationPhotoDorsalRightMark.PatternCellTailId = ?', $mark->getPatternCellDorsalRightId());
            $query = $query->condition($mark_counter.'_2', 'ObservationPhotoDorsalRightMark.IsWide = ?', $mark->getIsWide());
            $query = $query->condition($mark_counter.'_3', 'ObservationPhotoDorsalRightMark.IsDeep = ?', $mark->getIsDeep());
            if( $mark->getToCellId() ){
              $query = $query->condition($mark_counter.'_4', 'ObservationPhotoDorsalRightMark.ToCellId = ?', $mark->getToCellId());
              $conditions[] = $mark_counter.'_4';
            }
            $query = $query->combine($conditions, Criteria::LOGICAL_AND, 'cond_'.$mark_counter);
            $conditionNames[] = 'cond_'.$mark_counter;
            $mark_counter += 1;
          }
          $query = $query->combine($conditionNames, ($all)? Criteria::LOGICAL_AND: Criteria::LOGICAL_OR);
        $query = $query->endUse();
      $query = $query->endUse();
    } else {
      $observationPhotoIds = ObservationPhotoDorsalRightMarkPeer::getAllObservationPhotoIds();
      $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
    }
    return $query;
  }
  
  public static function _completeCharacterizationDorsalLeftMarkQuery($query, $OPDorsalLeft, $all=true){
    $marks = $OPDorsalLeft->getObservationPhotoDorsalLeftMarks();
    //same characterization on observationPhotoDorsalLeft
    if( count($marks) ) {
      $query = $query->useObservationPhotoDorsalLeftQuery();
        $conditionNames = array();
        $query = $query->useObservationPhotoDorsalLeftMarkQuery();
          $mark_counter = 1;
          foreach( $marks as $mark ){
            $conditions = array($mark_counter.'_1', $mark_counter.'_2', $mark_counter.'_3');
            $query = $query->condition($mark_counter.'_1', 'ObservationPhotoDorsalLeftMark.PatternCellTailId = ?', $mark->getPatternCellDorsalLeftId());
            $query = $query->condition($mark_counter.'_2', 'ObservationPhotoDorsalLeftMark.IsWide = ?', $mark->getIsWide());
            $query = $query->condition($mark_counter.'_3', 'ObservationPhotoDorsalLeftMark.IsDeep = ?', $mark->getIsDeep());
            if( $mark->getToCellId() ){
              $query = $query->condition($mark_counter.'_4', 'ObservationPhotoDorsalLeftMark.ToCellId = ?', $mark->getToCellId());
              $conditions[] = $mark_counter.'_4';
            }
            $query = $query->combine($conditions, Criteria::LOGICAL_AND, 'cond_'.$mark_counter);
            $conditionNames[] = 'cond_'.$mark_counter;
            $mark_counter += 1;
          }
          $query = $query->combine($conditionNames, ($all)? Criteria::LOGICAL_AND: Criteria::LOGICAL_OR);
        $query = $query->endUse();
      $query = $query->endUse();
    } else {
      $observationPhotoIds = ObservationPhotoDorsalLeftMarkPeer::getAllObservationPhotoIds();
      $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
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
