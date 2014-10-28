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
    
   if($observationPhoto->isCharacterizable()){ 
    if( in_array('same', $choices) ){
      //filter same caracterization by body parts
      if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
        $query = self::_completeCharacterizationDorsalLeftQuery($observationPhoto, $query);
      } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
        $query = self::_completeCharacterizationDorsalRightQuery($observationPhoto, $query);
      }elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
        $query = self::_completeCharacterizationTailQuery($observationPhoto, $query);
      }
    } else {
      // filter other choices
      // Smooth
      if( in_array('smooth', $choices) ){
        $query = self::_get_filter($query, 'smooth');
      }
      // Irregular
      if( in_array('irregular', $choices) ){
        $query = self::_get_filter($query, 'irregular');
      }
      //Cutted_point
      if( in_array('cutted_point', $choices) ){
        $query = self::_get_filter($query, 'cutted_point');
      }
      //Cutted point left
      if( in_array('cutted_point_left', $choices) ){
        $query = self::_get_filter($query, 'cutted_point_left');
      }
      //Cutted point right
      if( in_array('cutted_point_right', $choices) ){
        $query = self::_get_filter($query, 'cutted_point_right');
      }

      //Non-smooth
      if( in_array('smooth_without', $choices) ){
        $query = self::_get_filter($query, 'smooth', false);
      }
      //Non-irregular
      if( in_array('irregular_without', $choices) ){
        $query = self::_get_filter($query, 'irregular', false);
      }
      //Non-cutted_point
      if( in_array('cutted_point_without', $choices) ){
        $query = self::_get_filter($query, 'cutted_point', false);
      }
      //Non-cutted point left
      if( in_array('cutted_point_left_without', $choices) ){
        $query = self::_get_filter($query, 'cutted_point_left', false);
      }
      //Non-cutted point right
      if( in_array('cutted_point_right_without', $choices) ){
        $query = self::_get_filter($query, 'cutted_point_right', false);
      }
      $query = self::_filter_marks($query, $observationPhoto, $choices, $formMarks);
    }
   }
    // filter best pictures.
    if( in_array('best', $choices) ){
      $query = $query->filterByIsBest(true);
    }

    //filter out the individual of the photo, if it was already assigned to one
    if( $observationPhoto->getIndividual() ){
      $query = $query->filterByIndividualId($observationPhoto->getIndividual()->getId(), Criteria::NOT_EQUAL);
    }
    
    $query = $query->useIndividualQuery()
              ->orderByName('desc')
            ->endUse();
    $query = $query->orderByCode();
    
    return $query->find();
  }
  
  public static function _filter_marks($query, $observationPhoto, $choices, $formMarks){
    
    $complete = (in_array('complete_marks', $choices))? True: False;//client asked to remove "complete marks" and "depth" value from the form - we keep them in case they change their mind
    $depth = (in_array('depth', $choices))? True: False;//both are false, so they won't interfere with the code
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

    $ids = self::_getPhotoIDsFromCombinations($observationPhoto->getSpecieId(), $observationPhoto->getBodyPart(), $cellCombinations, $depth);
    //find all the photos with the same mark, irrespective of the body part (R or L, in the case of the species 2,4,7,10) - specie 8 only has one charact. body part (F)
    if( $observationPhoto->getBodyPart() == body_part::L_SIGLA) {
      $ids = array_merge($ids, self::_getPhotoIDsFromCombinations($observationPhoto->getSpecieId(), body_part::R_SIGLA, $cellCombinations, $depth));
    }
     elseif ($observationPhoto->getBodyPart() == body_part::R_SIGLA) {
      $ids = array_merge($ids, self::_getPhotoIDsFromCombinations($observationPhoto->getSpecieId(), body_part::L_SIGLA, $cellCombinations, $depth));
     }
    $query = $query->filterById($ids, Criteria::IN);

    //print_r($cellCombinations);
    return $query;
  }
  
  public static function _getPhotoIDsFromCombinations($specieId, $bodyPart, $combinations=array(), $depth=False){
    $nCombinations = count($combinations);
    if( $nCombinations == 0 ){
      return array();
    }
    
    //the names of marks are repeated 4 times in the table, so the code will choose the right id for the right specie (species with ids 2,4,7,8,10 have patterns with ids 6,4,5,1,7)
    $patternSpecie = PatternQuery::create()->filterBySpecieId($specieId)->findOne();
    $patternId = $patternSpecie->getId();

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
            $PCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByNameAndPatternId($combination[0], $patternId);
            if($PCDorsalLeft){
              $fromId = $PCDorsalLeft->getId();
            }
          } elseif( $bodyPart == body_part::R_SIGLA ){ // dorsal right
            $PCDorsalRight = PatternCellDorsalRightPeer::retrieveByNameAndPatternId($combination[0], $patternId);
            if($PCDorsalRight){
              $fromId = $PCDorsalRight->getId();
            }
          } elseif( $bodyPart == body_part::F_SIGLA ){ // tail
            $PCTail = PatternCellTailPeer::retrieveByNameAndPatternId($combination[0], $patternId);
            if($PCTail){
              $fromId = $PCTail->getId();
            }
          }
        }
        
        $toId = null;
        if(isset($combination[1])){
          if( $bodyPart == body_part::L_SIGLA ){ // dorsal left
            $PCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByNameAndPatternId($combination[1], $patternId);
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
            $PCDorsalRight = PatternCellDorsalRightPeer::retrieveByNameAndPatternId($combination[1], $patternId);
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
            $PCTail = PatternCellTailPeer::retrieveByNameAndPatternId($combination[1], $patternId);
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
        if( $bodyPart == body_part::L_SIGLA ){
              $OBPhotoDorsalLeft = ObservationPhotoDorsalLeftPeer::retrieveByPK($mark->getObservationPhotoDorsalLeftId());
              if($OBPhotoDorsalLeft){
                if( !in_array($OBPhotoDorsalLeft->getPhotoId(), $ids)){
                $ids[] = $OBPhotoDorsalLeft->getPhotoId();
                }
              }
        } elseif( $bodyPart == body_part::R_SIGLA ){
              $OBPhotoDorsalRight = ObservationPhotoDorsalRightPeer::retrieveByPK($mark->getObservationPhotoDorsalRightId());
              if($OBPhotoDorsalRight){
                if( !in_array($OBPhotoDorsalRight->getPhotoId(), $ids)){
                $ids[] = $OBPhotoDorsalRight->getPhotoId();
                }
              }
          } elseif( $bodyPart == body_part::F_SIGLA ){
              $OBPhotoTail = ObservationPhotoTailPeer::retrieveByPK($mark->getObservationPhotoTailId());
              if($OBPhotoTail){
                if( !in_array($OBPhotoTail->getPhotoId(), $ids)){
                $ids[] = $OBPhotoTail->getPhotoId();
                }
              }
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

    if($endCell){
      if($beginCell->getId() == $endCell->getId()){//here if we have the same string on both sides, eg A1-A1
          $endCell = NULL;
      }
      else{//I don't compare id's, as we might have new letters added at the end, what we care about are letters - for the algorithm used on line 290
          if(strcasecmp($beginCell->getName(), $endCell->getName()) > 0){//swap values, if we have beginCell = C2 and endCell = C1, for example
              $tmp = $endCell;
              $endCell = $beginCell;
              $beginCell = $tmp;
          }
      }
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
        if( $bodyPart == body_part::F_SIGLA ){ //the photo (and the table) used for characterizing the tail is missing "I"
        $a_z = "abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ";
        } else{
          $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }
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
  

  public static function _get_filter($query, $filterType, $value=true){

    $ids = array();
    $OBPhotos = $query->find();//this will return all valid photos from the same specie as the photo being validated, due to queries done at the beginning of getPossibleMatches()
    
    if($OBPhotos){
      foreach($OBPhotos as $OBPhoto){

        if($OBPhoto->isCharacterizable()){//avoiding errors caused by specie_id-body part combinations such as 2,4,7,10 with F or 8 with R or L
        //for restricting the results to the same body part as the photo being identified, an if($observationPhoto->getBodyPart() == $OBPhoto->getBodyPart()) can be added here (if you add $observationPhoto as a function argument)

          if( $OBPhoto->getBodyPart() == body_part::L_SIGLA ){

            $c = new Criteria();
            $c->add(ObservationPhotoDorsalLeftPeer::PHOTO_ID, $OBPhoto->getId(), Criteria::EQUAL);
            $OBPhotoDorsalLeft = ObservationPhotoDorsalLeftPeer::doSelectOne($c);

            if($OBPhotoDorsalLeft){
              if($filterType == 'smooth'){
              //$OBPhotoDorsalLeft->getIsSmooth() == $value would be incorrect because "Sem Lisa" (Non-smooth, where $value is false) wouldn't find a...
              //specie_id 2,4,7 or 10 with body part F (a photo with such a combination doesn't have 0 in isSmooth - it does not have such a table row linked to it, at all)
                    if($OBPhotoDorsalLeft->getIsSmooth()) {
                      $ids[] = $OBPhoto->getId();
                    }
              }
              elseif ($filterType == 'irregular') {
                    if($OBPhotoDorsalLeft->getIsIrregular()) {
                      $ids[] = $OBPhoto->getId();
                    }
              }
              elseif ($filterType == 'cutted_point') {
                    if($OBPhotoDorsalLeft->getIsCuttedPoint()) {
                      $ids[] = $OBPhoto->getId();
                    }
              }
              else {
                  if( $OBPhotoDorsalLeft->getIsSmooth()      == $filterType[0] &&
                      $OBPhotoDorsalLeft->getIsIrregular()   == $filterType[1] &&
                      $OBPhotoDorsalLeft->getIsCuttedPoint() == $filterType[2]
                    ) {
                        $ids[] = $OBPhoto->getId();
                  }
              }
            }
          } elseif( $OBPhoto->getBodyPart() == body_part::R_SIGLA ){

            $c = new Criteria();
            $c->add(ObservationPhotoDorsalRightPeer::PHOTO_ID, $OBPhoto->getId(), Criteria::EQUAL);
            $OBPhotoDorsalRight = ObservationPhotoDorsalRightPeer::doSelectOne($c);

            if($OBPhotoDorsalRight){
              if($filterType == 'smooth'){
                    if($OBPhotoDorsalRight->getIsSmooth()) {
                      $ids[] = $OBPhoto->getId();
                    }
              }
              elseif ($filterType == 'irregular') {
                    if($OBPhotoDorsalRight->getIsIrregular()) {
                      $ids[] = $OBPhoto->getId();
                    }
              }
              elseif ($filterType == 'cutted_point') {
                    if($OBPhotoDorsalRight->getIsCuttedPoint()) {
                      $ids[] = $OBPhoto->getId();
                    }
              }
              else {
                  if( $OBPhotoDorsalRight->getIsSmooth()      == $filterType[0] &&
                      $OBPhotoDorsalRight->getIsIrregular()   == $filterType[1] &&
                      $OBPhotoDorsalRight->getIsCuttedPoint() == $filterType[2]
                    ) {
                        $ids[] = $OBPhoto->getId();
                  }
              }
            }
          }elseif( $OBPhoto->getBodyPart() == body_part::F_SIGLA ){

            $c = new Criteria();
            $c->add(ObservationPhotoTailPeer::PHOTO_ID, $OBPhoto->getId(), Criteria::EQUAL);
            $OBPhotoTail = ObservationPhotoTailPeer::doSelectOne($c);

            if($OBPhotoTail){
              if($filterType == 'smooth'){
                    if($OBPhotoTail->getIsSmooth()) {
                      $ids[] = $OBPhoto->getId();
                }
              }
              elseif ($filterType == 'irregular') {
                    if($OBPhotoTail->getIsIrregular()) {
                      $ids[] = $OBPhoto->getId();
                    }
              }
              elseif ($filterType == 'cutted_point_right') {
                    if($OBPhotoTail->getIsCuttedPointRight()) {
                      $ids[] = $OBPhoto->getId();
                    }
              }
              elseif ($filterType == 'cutted_point_left') {
                    if($OBPhotoTail->getIsCuttedPointLeft()) {
                      $ids[] = $OBPhoto->getId();
                    }
              }
              else {
                  if( $OBPhotoTail->getIsSmooth()           == $filterType[0] &&
                      $OBPhotoTail->getIsIrregular()        == $filterType[1] &&
                      $OBPhotoTail->getIsCuttedPointRight() == $filterType[2] &&
                      $OBPhotoTail->getIsCuttedPointLeft()  == $filterType[3]
                    ) {//first CuttedPointRight, then CuttedPointLeft, see _completeCharacterizationTailQuery()
                        $ids[] = $OBPhoto->getId();
                  }
              }
            }
           }
        }//end of if(isCharacterizable())
      }//end of foreach($OBPhotos as $OBPhoto)
    }//end of if($OBPhotos)

    if($value){
      $query = $query->filterById($ids, Criteria::IN);
    }
    else{
      $query = $query->filterById($ids, Criteria::NOT_IN);
    }
    return $query;
  }
    

  
  public static function _completeCharacterizationDorsalLeftQuery($observationPhoto, $query){
    $OPDorsalLeft = ObservationPhotoDorsalLeftPeer::get_or_create($observationPhoto->getId());
    //filter all - send an array containing all the boolean values
    $query = self::_get_filter( $query, array($OPDorsalLeft->getIsSmooth(), $OPDorsalLeft->getIsIrregular(), $OPDorsalLeft->getIsCuttedPoint()) );
    
    $marks = $OPDorsalLeft->getObservationPhotoDorsalLeftMarks();
    if(count($marks)){
      foreach( $marks as $mark ){
          $observationPhotoIds = ObservationPhotoDorsalLeftMarkPeer::getObservationPhotoIds($mark);
          $query = $query->filterById($observationPhotoIds, Criteria::IN);
      }
    } else {
          $observationPhotoIds = ObservationPhotoDorsalLeftMarkPeer::getObservationPhotoIds();
          $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
    }
    return $query;
  }
  
  public static function _completeCharacterizationDorsalRightQuery($observationPhoto, $query){
    $OPDorsalRight = ObservationPhotoDorsalRightPeer::get_or_create($observationPhoto->getId());
    $query = self::_get_filter( $query, array($OPDorsalRight->getIsSmooth(), $OPDorsalRight->getIsIrregular(), $OPDorsalRight->getIsCuttedPoint()) );

    $marks = $OPDorsalRight->getObservationPhotoDorsalRightMarks();
    if(count($marks)){
      foreach( $marks as $mark ){
          $observationPhotoIds = ObservationPhotoDorsalRightMarkPeer::getObservationPhotoIds($mark);
          $query = $query->filterById($observationPhotoIds, Criteria::IN);
      }
    } else {
          $observationPhotoIds = ObservationPhotoDorsalRightMarkPeer::getObservationPhotoIds();
          $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
    }
    return $query;
  }
  
  public static function _completeCharacterizationTailQuery($observationPhoto, $query){
    $OPTail = ObservationPhotoTailPeer::get_or_create($observationPhoto->getId());
    //the order is important, first CuttedPointRight then CuttedPointLeft, see last part of _get_filter()
    $query = self::_get_filter( $query, array($OPTail->getIsSmooth(), $OPTail->getIsIrregular(), $OPTail->getIsCuttedPointRight(), $OPTail->getIsCuttedPointLeft()) );

    $marks = $OPTail->getObservationPhotoTailMarks();
    if(count($marks)){
      foreach( $marks as $mark ){
          $observationPhotoIds = ObservationPhotoTailMarkPeer::getObservationPhotoIds($mark);
          $query = $query->filterById($observationPhotoIds, Criteria::IN);
      }
    } else {
          $observationPhotoIds = ObservationPhotoTailMarkPeer::getObservationPhotoIds();
          $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
    }
    return $query;
  }
} // ObservationPhotoQuery

