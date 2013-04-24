<?php


class ObservationPhotoQuery extends BaseObservationPhotoQuery {
  public static function getPossibleMatches($observationPhoto, $args) {
    $choices = $args['choices'];
    $formMarks = (isset($args['marks']))? $args['marks']: array();
    
    $query = ObservationPhotoQuery::create();
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
      $query = self::_filter_marks($query, $observationPhoto, $choices, $formMarks);
    }

    if( in_array('best', $choices) ){
      $query = $query->filterByIsBest(true);
    }
    
    $query = $query->useIndividualQuery()
              ->orderByName('desc')
            ->endUse();
    $query = $query->orderByCode();
    
    return $query->find();
  }
  
  public static function _filter_marks($query, $observationPhoto, $choices, $formMarks){
    
    $complete = (in_array('complete_marks', $choices))? True: False;
    $depth = (in_array('depth', $choices))? True: False;
    $cellCombinations = array();

    //get selected marks
    $marks = array();
    if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
      $marks = ObservationPhotoDorsalLeftMarkPeer::retrieveByPKs($formMarks);
    } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
      $marks = ObservationPhotoDorsalRightMarkPeer::retrieveByPKs($formMarks);
    } elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
      $marks = ObservationPhotoTailMarkPeer::retrieveByPKs($formMarks);
    }
    if (count($marks) == 0) {
      return $query;
    }

    foreach( $marks as $mark ){
      $cellCombinations = array_merge($cellCombinations, self::_getCellNamesCombinations($mark, $observationPhoto->getBodyPart(), $complete, $depth));  
    }

    if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
      $query = $query->useObservationPhotoDorsalLeftQuery();
        $query = $query->useObservationPhotoDorsalLeftMarkQuery();
          $ids = self::_getMarkIDsFromCombinations($observationPhoto->getBodyPart(), $cellCombinations, $depth);
          $query = $query->filterById($ids, Criteria::IN);
        $query = $query->endUse();
      $query = $query->endUse();
    } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
      $query = $query->useObservationPhotoDorsalRightQuery();
        $query = $query->useObservationPhotoDorsalRightMarkQuery();
          $ids = self::_getMarkIDsFromCombinations($observationPhoto->getBodyPart(), $cellCombinations, $depth);
          $query = $query->filterById($ids, Criteria::IN);
        $query = $query->endUse();
      $query = $query->endUse();
    } elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
      $query = $query->useObservationPhotoTailQuery();
        $query = $query->useObservationPhotoTailMarkQuery();
          $ids = self::_getMarkIDsFromCombinations($observationPhoto->getBodyPart(), $cellCombinations, $depth);
          $query = $query->filterById($ids, Criteria::IN);
        $query = $query->endUse();
      $query = $query->endUse();
    }

    //print_r($cellCombinations);

    return $query;
  }
  
  public static function _getMarkIDsFromCombinations($bodyPart, $combinations=array(), $depth=False){
    $nCombinations = count($combinations);
    if( $nCombinations == 0 ){
      return array();
    }
    
    if( $bodyPart == body_part::L_SIGLA ){ // dorsal left
      $query = ObservationPhotoDorsalLeftMarkQuery::create();
    } elseif( $bodyPart == body_part::R_SIGLA ){ // dorsal right
      $query = ObservationPhotoDorsalRightMarkQuery::create();
    } elseif( $bodyPart == body_part::F_SIGLA ){ // tail
      $query = ObservationPhotoTailMarkQuery::create();
    }
    
      $comb_counter = 1;
      $combinationConds = array();
      foreach( $combinations as $combination ){
        $fromId = null;
        if(isset($combination[0])){
          if( $bodyPart == body_part::L_SIGLA ){ // dorsal left
            $PCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByName($combination[0]);
            if($PCDorsalLeft){
              $fromId = $PCDorsalLeft->getId();
            }
          } elseif( $bodyPart == body_part::R_SIGLA ){ // dorsal right
            $PCDorsalRight = PatternCellDorsalRightPeer::retrieveByName($combination[0]);
            if($PCDorsalRight){
              $fromId = $PCDorsalRight->getId();
            }
          } elseif( $bodyPart == body_part::F_SIGLA ){ // tail
            $PCTail = PatternCellTailPeer::retrieveByName($combination[0]);
            if($PCTail){
              $fromId = $PCTail->getId();
            }
          }
        }
        
        $toId = null;
        if(isset($combination[1])){
          if( $bodyPart == body_part::L_SIGLA ){ // dorsal left
            $PCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByName($combination[1]);
            if($PCDorsalLeft){
              $toId = $PCDorsalLeft->getId();

              if( $nCombinations > 1 ) {
                $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoDorsalLeftMark.PatternCellDorsalLeftId = ?', $fromId);
                $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoDorsalLeftMark.ToCellId = ?', $toId);
                $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_AND, 'combination_'.$comb_counter);
              } else {
                $query = $query->filterByPatternCellDorsalLeftId($fromId)->filterByToCellId($toId);
              }
            }
          } elseif( $bodyPart == body_part::R_SIGLA ){ // dorsal right
            $PCDorsalRight = PatternCellDorsalRightPeer::retrieveByName($combination[1]);
            if($PCDorsalRight){
              $toId = $PCDorsalRight->getId();

              if( $nCombinations > 1 ) {
                $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoDorsalRightMark.PatternCellDorsalRightId = ?', $fromId);
                $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoDorsalRightMark.ToCellId = ?', $toId);
                $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_AND, 'combination_'.$comb_counter);
              } else {
                $query = $query->filterByPatternCellDorsalRightId($fromId)->filterByToCellId($toId);
              }
            }
          } elseif( $bodyPart == body_part::F_SIGLA ){ // tail
            $PCTail = PatternCellTailPeer::retrieveByName($combination[1]);
            if($PCTail){
              $toId = $PCTail->getId();

              if( $nCombinations > 1 ) {
                $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoTailMark.PatternCellTailId = ?', $fromId);
                $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoTailMark.ToCellId = ?', $toId);
                $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_AND, 'combination_'.$comb_counter);
              } else {
                $query = $query->filterByPatternCellTailId($fromId)->filterByToCellId($toId);
              }
            }
          }
        } else {
          if( $nCombinations > 1 ) {
            if( $bodyPart == body_part::L_SIGLA ){ // dorsal left
              $query = $query->condition('combination_'.$comb_counter, 'ObservationPhotoDorsalLeftMark.PatternCellDorsalLeftId = ?', $fromId);
            } elseif( $bodyPart == body_part::R_SIGLA ){ // dorsal right
              $query = $query->condition('combination_'.$comb_counter, 'ObservationPhotoDorsalRightMark.PatternCellDorsalRightId = ?', $fromId);
            } elseif( $bodyPart == body_part::F_SIGLA ){ // tail
              $query = $query->condition('combination_'.$comb_counter, 'ObservationPhotoTailMark.PatternCellTailId = ?', $fromId);
            }
          } else {
            if( $bodyPart == body_part::L_SIGLA ){ // dorsal left
              $query = $query->filterByPatternCellDorsalLeftId($fromId);
            } elseif( $bodyPart == body_part::R_SIGLA ){ // dorsal right
              $query = $query->filterByPatternCellDorsalRightId($fromId);
            } elseif( $bodyPart == body_part::F_SIGLA ){ // tail
              $query = $query->filterByPatternCellTailId($fromId);
            }
          }
        }
        
        $combinationConds[] = 'combination_'.$comb_counter;
        $comb_counter +=1 ;
      }
      if( $nCombinations > 1 ) {
        $query = $query->combine($combinationConds, Criteria::LOGICAL_OR);
      }
    
    $marks = $query->find();
    
    $ids = array();
    foreach ($marks as $mark ){
      if( !in_array($mark->getId(), $ids)){
        $ids[] = $mark->getId();
      }
    }
    return $ids;
  }
  
  public static function _getCellNamesCombinations($mark, $bodyPart, $complete=true, $depth=False){
    $subsets = array();
    
    if( $bodyPart == body_part::L_SIGLA ){ // dorsal left
      $beginCell = $mark->getPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId();
      $endCell = $mark->getPatternCellDorsalLeftRelatedByToCellId();
    } elseif( $bodyPart == body_part::R_SIGLA ){ // dorsal right
      $beginCell = $mark->getPatternCellDorsalRightRelatedByPatternCellDorsalRightId();
      $endCell = $mark->getPatternCellDorsalRightRelatedByToCellId();
    } elseif( $bodyPart == body_part::F_SIGLA ){ // tail
      $beginCell = $mark->getPatternCellTailRelatedByPatternCellTailId();
      $endCell = $mark->getPatternCellTailRelatedByToCellId();
    }
    
    $beginCellName = $beginCell->getName();
    $letterIntervalArray = array();
    if($depth){
      $firstLetter = substr($beginCellName, 0, 1);
      $letterIntervalArray[] = $firstLetter.'1';
      $letterIntervalArray[] = $firstLetter.'2';
    } else {
      $letterIntervalArray[] = $beginCellName;
    }
    
    if($endCell){
      $endCellName = $endCell->getName();
      if($depth){
        $firstLetter = substr($endCellName, 0, 1);
        $letterIntervalArray[] = $firstLetter.'1';
        $letterIntervalArray[] = $firstLetter.'2';
      } else {
        $letterIntervalArray[] = $endCellName;
      }
      
      if( !$complete ){
        $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $fromPosition = strpos($a_z, substr($beginCellName, 0, 1));
        $toPosition = strpos($a_z, substr($endCellName, 0, 1));
        $letterInterval = substr($a_z, $fromPosition, ($toPosition-$fromPosition+1));
        $letterIntervalArrayTMP = str_split($letterInterval);
        if(count($letterIntervalArrayTMP) > 2){
          unset($letterIntervalArrayTMP[count($letterIntervalArrayTMP)-1]);
          unset($letterIntervalArrayTMP[0]);
        }

        foreach($letterIntervalArrayTMP as $letter){
          $letterIntervalArray[] = $letter.'1';
          $letterIntervalArray[] = $letter.'2';
        }
        $subsets = mfUtils::powerSet($letterIntervalArray, 1, 2);
      } else {
        $subsets = array(array($beginCellName, $endCellName));
      }
    } else {
      $subsets = mfUtils::powerSet($letterIntervalArray, 1, 2);
    } 
    return $subsets;
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
} // ObservationPhotoQuery

