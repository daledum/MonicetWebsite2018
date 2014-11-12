<?php


class ObservationPhotoQuery extends BaseObservationPhotoQuery {
  public static function getPossibleMatches($observationPhoto, $args) {
    $choices = $args['choices'];
    $formMarks = (isset($args['marks']))? $args['marks']: array();
    
    $userMarkFromVertical = (isset($args['user_mark_from_vertical']))? $args['user_mark_from_vertical']: array();
    $userMarkVerticalStrict = (isset($args['user_mark_strict_vertical']))? "_strict": "_loose";
    $userMarkToVertical = (isset($args['user_mark_to_vertical']))? $args['user_mark_to_vertical']: array();

    $userMarkFromHorizontal = (isset($args['user_mark_from_horizontal']))? $args['user_mark_from_horizontal']: array();
    $userMarkToHorizontal = (isset($args['user_mark_to_horizontal']))? $args['user_mark_to_horizontal']: array();

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

      self::_processUserMarks($userMarkFromVertical, $userMarkToVertical);//changes the value of the arguments
      self::_processUserMarks($userMarkFromHorizontal, $userMarkToHorizontal);

      if($userMarkFromHorizontal){//attach them to $formMarks only if something was actually selected
        $formMarks[] = "horizontal";//[] = is much faster than array_push
        $formMarks[] = $userMarkFromHorizontal;
        $formMarks[] = $userMarkToHorizontal;
      }

      if($userMarkFromVertical){//the function below is called only if something was actually selected from the vertical user marks (left side of the page)
        $query = self::_filter_marks( $query, $observationPhoto, array("vertical".$userMarkVerticalStrict, $userMarkFromVertical, $userMarkToVertical) );
      }

      $query = self::_filter_marks($query, $observationPhoto, $formMarks);
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
  
  public static function _filter_marks($query, $observationPhoto, $formMarks){//arguments were initially: ($query, $observationPhoto, $choices, $formMarks), in case marcas completas and depth will be reinstated
    
    $bodyPart = $observationPhoto->getBodyPart();
    $complete = False;//$complete = (in_array('complete_marks', $choices))? True: False;//client asked to remove "complete marks" and "depth" value from the form...
    $depth = False;//$depth = (in_array('depth', $choices))? True: False;//keep them in case they change their mind
    $cellCombinations = array();

    if( in_array("vertical_strict", $formMarks) || in_array("vertical_loose", $formMarks) ){//this means this function is called when the user selected horizontal user marks (from the left hand side of the page)

      if( $bodyPart == body_part::L_SIGLA ){ // dorsal left
          $c = new Criteria();
          $c->add(PatternCellDorsalLeftPeer::ID, $formMarks[1], Criteria::EQUAL);//$userMarkFromVertical
          $beginCell = PatternCellDorsalLeftPeer::doSelectOne($c);

          if($formMarks[2]){//$userMarkToVertical
            $c = new Criteria();
            $c->add(PatternCellDorsalLeftPeer::ID, $formMarks[2], Criteria::EQUAL);
            $endCell = PatternCellDorsalLeftPeer::doSelectOne($c);
          }
          else{
            $endCell = NULL; 
          }
      } elseif( $bodyPart == body_part::R_SIGLA ){ // dorsal right
          $c = new Criteria();
          $c->add(PatternCellDorsalRightPeer::ID, $formMarks[1], Criteria::EQUAL);
          $beginCell = PatternCellDorsalRightPeer::doSelectOne($c);

          if($formMarks[2]){
            $c = new Criteria();
            $c->add(PatternCellDorsalRightPeer::ID, $formMarks[2], Criteria::EQUAL);
            $endCell = PatternCellDorsalRightPeer::doSelectOne($c);
          }
          else{
            $endCell = NULL;
          }
      } elseif( $bodyPart == body_part::F_SIGLA ){ // tail
          $c = new Criteria();
          $c->add(PatternCellTailPeer::ID, $formMarks[1], Criteria::EQUAL);
          $beginCell = PatternCellTailPeer::doSelectOne($c);

          if($formMarks[2]){
            $c = new Criteria();
            $c->add(PatternCellTailPeer::ID, $formMarks[2], Criteria::EQUAL);
            $endCell = PatternCellTailPeer::doSelectOne($c);
          }
          else{
            $endCell = NULL;
          }
      }

        if($endCell){
          self::_fixEqualOrReversed($beginCell, $endCell);
        }

        $beginCellName = $beginCell->getName();

        if( in_array("vertical_strict", $formMarks) ){
          if($endCell){
            $endCellName = $endCell->getName();

            //first pair of from-to
            $cellCombinations = array(array($beginCellName, $endCellName));//eg A1-B1
            //add the other 3 possible pairs - the first was assigned before this if (eg A1-B1), the remaining 3 are A1-B2, A2-B1 and A2-B2
            $cellCombinations = array_merge( $cellCombinations, array(array( $beginCellName, self::_getLetterWithOtherNumber($endCellName) )) );
            $cellCombinations = array_merge( $cellCombinations, array(array( self::_getLetterWithOtherNumber($beginCellName), $endCellName )) );
            $cellCombinations = array_merge( $cellCombinations, array(array( self::_getLetterWithOtherNumber($beginCellName), self::_getLetterWithOtherNumber($endCellName) )) );
          }
          else{
            $endCellName = NULL;

            $cellCombinations = array(array($beginCellName, '-1'));//eg A1 - -1 (-1 instead of NULL, in order to use the 3rd if statement at the beginning of _getPhotoIDsFromCombinations())
            $cellCombinations = array_merge( $cellCombinations, array(array( self::_getLetterWithOtherNumber($beginCellName), '-1' )) );//add A2 - -1
          }
        }
        else{//it's "loose", so now add the cells, for a mark A1-B1: add A1, B1, A2, B2 for later use in _getPhotoIDsFromCombinations() and get all photos with marks containing A1 or A2 or B1 or B2
            //add $beginCellName, eg A1
            $cellCombinations = array_merge( $cellCombinations, array(array($beginCellName)) );
            //add A2
            $cellCombinations = array_merge( $cellCombinations, array(array(self::_getLetterWithOtherNumber($beginCellName))) );

            if($endCell){
              $endCellName = $endCell->getName();
              //add $endCellName, eg B1
              $cellCombinations = array_merge( $cellCombinations, array(array($endCellName)) );
              //add B2
              $cellCombinations = array_merge( $cellCombinations, array(array(self::_getLetterWithOtherNumber($endCellName))) );
            }
            else{
              $endCellName = NULL;
            }
        }
    }
    else{
        $beginCellHorizontal = NULL;
        $marks = array();

        if( $bodyPart == body_part::L_SIGLA ){
          if(in_array("horizontal", $formMarks)){
              //get the beginCell from the horizontal user marks, which were added to $formMarks
              $c = new Criteria();
              $c->add(PatternCellDorsalLeftPeer::ID, $formMarks[count($formMarks)-2], Criteria::EQUAL);//$userMarkFromHorizontal
              $beginCellHorizontal = PatternCellDorsalLeftPeer::doSelectOne($c);

              //get the endCell from the horizontal user marks, which were added to $formMarks
              if($formMarks[count($formMarks)-1]){//$userMarkToHorizontal
                $c = new Criteria();
                $c->add(PatternCellDorsalLeftPeer::ID, $formMarks[count($formMarks)-1], Criteria::EQUAL);
                $endCellHorizontal = PatternCellDorsalLeftPeer::doSelectOne($c);
              }
              else{
                $endCellHorizontal = NULL;
              }
              //remove the 3 elements so that the retrieveByPKs below can work
              array_pop($formMarks);//$userMarkToHorizontal
              array_pop($formMarks);//$userMarkFromHorizontal
              array_pop($formMarks);//"horizontal"
            }
              //get selected marks
              $marks = ObservationPhotoDorsalLeftMarkPeer::retrieveByPKs($formMarks);

        } elseif( $bodyPart == body_part::R_SIGLA ){
            if(in_array("horizontal", $formMarks)){

              $c = new Criteria();
              $c->add(PatternCellDorsalRightPeer::ID, $formMarks[count($formMarks)-2], Criteria::EQUAL);
              $beginCellHorizontal = PatternCellDorsalRightPeer::doSelectOne($c);

              
              if($formMarks[count($formMarks)-1]){
                $c = new Criteria();
                $c->add(PatternCellDorsalRightPeer::ID, $formMarks[count($formMarks)-1], Criteria::EQUAL);
                $endCellHorizontal = PatternCellDorsalRightPeer::doSelectOne($c);
              }
              else{
                $endCellHorizontal = NULL;
              }

              array_pop($formMarks);
              array_pop($formMarks);
              array_pop($formMarks);
            }
              $marks = ObservationPhotoDorsalRightMarkPeer::retrieveByPKs($formMarks);

        } elseif( $bodyPart == body_part::F_SIGLA ){
            if(in_array("horizontal", $formMarks)){

              $c = new Criteria();
              $c->add(PatternCellTailPeer::ID, $formMarks[count($formMarks)-2], Criteria::EQUAL);
              $beginCellHorizontal = PatternCellTailPeer::doSelectOne($c);

              
              if($formMarks[count($formMarks)-1]){
                $c = new Criteria();
                $c->add(PatternCellTailPeer::ID, $formMarks[count($formMarks)-1], Criteria::EQUAL);
                $endCellHorizontal = PatternCellTailPeer::doSelectOne($c);
              }
              else{
                $endCellHorizontal = NULL;
              }

              array_pop($formMarks);
              array_pop($formMarks);
              array_pop($formMarks);
            }
              $marks = ObservationPhotoTailMarkPeer::retrieveByPKs($formMarks);
        }
        
        if (count($marks) == 0 && !$beginCellHorizontal) {//did not find any marks and no horizontal user marks were selected
          return $query;
        }

        foreach( $marks as $mark ){

          if( $bodyPart == body_part::L_SIGLA ){
            $beginCell = $mark->getPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId();
            $endCell = $mark->getPatternCellDorsalLeftRelatedByToCellId();
          } elseif( $bodyPart == body_part::R_SIGLA ){
            $beginCell = $mark->getPatternCellDorsalRightRelatedByPatternCellDorsalRightId();
            $endCell = $mark->getPatternCellDorsalRightRelatedByToCellId();
          } elseif( $bodyPart == body_part::F_SIGLA ){
            $beginCell = $mark->getPatternCellTailRelatedByPatternCellTailId();
            $endCell = $mark->getPatternCellTailRelatedByToCellId();
          }
          
          if($endCell){
            self::_fixEqualOrReversed($beginCell, $endCell);//if we have Larga C2-C2 or C2-B2 
          }

          $beginCellName = $beginCell->getName();
          //here add the cells, for an A1-B1 mark, add A1, B1, A2, B2 for later use in _getPhotoIDsFromCombinations() and get all photos with marks containing A1 or A2 or B1 or B2
          //add $beginCellName, eg A1
          $cellCombinations = array_merge( $cellCombinations, array(array($beginCellName)) );
          //add A2
          $cellCombinations = array_merge( $cellCombinations, array(array(self::_getLetterWithOtherNumber($beginCellName))) );

          if($endCell){
            $endCellName = $endCell->getName();
            //add $endCellName, eg B1
            $cellCombinations = array_merge( $cellCombinations, array(array($endCellName)) );
            //add B2
            $cellCombinations = array_merge( $cellCombinations, array(array(self::_getLetterWithOtherNumber($endCellName))) );
          }
          else{
            $endCellName = NULL;
          }
        }

        //process the horizontal user marks, in case any were selected
        if($beginCellHorizontal){

          if($endCellHorizontal){
            self::_fixEqualOrReversed($beginCellHorizontal, $endCellHorizontal);
          }

          $beginCellHorizontalName = $beginCellHorizontal->getName();
          //add the combinations to the already existing combinations array 
          $cellCombinations = array_merge( $cellCombinations, array(array($beginCellHorizontalName)) );
          $cellCombinations = array_merge( $cellCombinations, array(array(self::_getLetterWithOtherNumber($beginCellHorizontalName))) );

          if($endCellHorizontal){
            $endCellHorizontalName = $endCellHorizontal->getName();
            $cellCombinations = array_merge( $cellCombinations, array(array($endCellHorizontalName)) );
            $cellCombinations = array_merge( $cellCombinations, array(array(self::_getLetterWithOtherNumber($endCellHorizontalName))) );
          }
          else{
            $endCellHorizontalName = NULL;
          }
        }
    }

    $ids = self::_getPhotoIDsFromCombinations($observationPhoto->getSpecieId(), $bodyPart, $cellCombinations, $depth);
    //find all the photos with the same mark, irrespective of the body part (R or L, in the case of the species 2,4,7,10) - specie 8 only has one charact. body part (F)
    if($bodyPart == body_part::L_SIGLA) {
      $ids = array_merge($ids, self::_getPhotoIDsFromCombinations($observationPhoto->getSpecieId(), body_part::R_SIGLA, $cellCombinations, $depth));
    }
     elseif ($bodyPart == body_part::R_SIGLA) {
      $ids = array_merge($ids, self::_getPhotoIDsFromCombinations($observationPhoto->getSpecieId(), body_part::L_SIGLA, $cellCombinations, $depth));
     }
    $query = $query->filterById($ids, Criteria::IN);

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
      //from here - this is the old algorithm, which the client might want to use again in the future. This algorithm used to processes the chosen marks, returning these results:
      //1) if you only clicked on a (Larga - this is irrelevant) A1 mark: all the pictures which have a mark beginning with A1 (A1-H1, for example)
      //2) if you only clicked on an A2 mark: all the pictures which have a mark beginning with A2
      //3) if you clicked on A1-B1 (the same results are returned if you click on A1-B2 or A2-B1 or A2-B2): 
      //a) all the pictures which have a mark beginning with A1
      //PLUS b) all the pictures which have a mark beginning with A2
      //PLUS c) all the pictures which have a mark beginning with B1
      //PLUS d) all the pictures which have a mark beginning with B2
      //PLUS e) all the pictures which have any of these pairs of marks: A2-B2, A2-B1, A1-B2, A1-B1
      //4) if you clicked on A1-C1: 
      //a) all the pictures which have a mark beginning with A1
      //PLUS b) all the pictures which have a mark beginning with B1
      //PLUS c) all the pictures which have a mark beginning with B2
      //PLUS d) all the pictures which have a mark beginning with C1
      //PLUS e) all the pictures which have any of these pairs of marks: A1-B2, A1-B1, B2-C1, B1-C1, A1-C1
      //5) if you clicked on A1-D1 (if you want to extrapolate for A2-D1, for example, just replace the A1 with A2):
      //a) all the pictures which have a mark beginning with A1
      //PLUS b) all the pictures which have a mark beginning with B1
      //PLUS c) all the pictures which have a mark beginning with B2
      //PLUS d) all the pictures which have a mark beginning with C1
      //PLUS e) all the pictures which have a mark beginning with C2
      //PLUS f) all the pictures which have a mark beginning with D1
      //PLUS g) all the pictures which have any of these pairs of marks: A1-B1, A1-B2, A1-C1, A1-C2, A1-D1, B1-C1, B1-C2, B1-D1, B2-C1, B2-C2, B2-D1, C1-D1, C2-D1

      /*foreach( $combinations as $combination ){
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
      //up to here
      */
     //the new algorithm:
      foreach( $combinations as $combination ){

        $fromId = null;
        $toId = null;

        if(isset($combination[1])){//user has selected vertical user marks pairs of type A1-B1 (or A1 - ----) or A-B (or A - ----), with a minimum of 2 and a maximum of 4 pairs (in this case the marks are also known as the strict type of marks coming from the vertical user marks section)
          if( $bodyPart == body_part::L_SIGLA ){ // dorsal left
            //from
            $fromCellPCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByNameAndPatternId($combination[0], $patternId);
            if($fromCellPCDorsalLeft){
              $fromId = $fromCellPCDorsalLeft->getId();
            
              //to
              if( $combination[1] != '-1' ){//see beginning of _filter_marks() for explanation
                $toCellPCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByNameAndPatternId($combination[1], $patternId);
                if($toCellPCDorsalLeft){
                  $toId = $toCellPCDorsalLeft->getId();
                  //get the marks with the from cell id equal with fromId and to cell id equal with toId (eg A1-B1)
                  $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoDorsalLeftMark.PatternCellDorsalLeftId = ?', $fromId);
                  $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoDorsalLeftMark.ToCellId = ?', $toId);
                  $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_AND, 'combination_'.$comb_counter);
                }//no need for an else, this means it could not find $toCellPCDorsalLeft - in this case: do nothing
              }
              else{//this means the second selected cell name was -----, so get all marks of, for example type A1-NULL
                  $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoDorsalLeftMark.PatternCellDorsalLeftId = ?', $fromId);
                  $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoDorsalLeftMark.ToCellId IS NULL');
                  $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_AND, 'combination_'.$comb_counter);
              }
            }//no need for an else, this means it could not find $fromCellPCDorsalLeft - in this case: do nothing
          } elseif( $bodyPart == body_part::R_SIGLA ){ // dorsal right
            
            $fromCellPCDorsalRight = PatternCellDorsalRightPeer::retrieveByNameAndPatternId($combination[0], $patternId);
            if($fromCellPCDorsalRight){
              $fromId = $fromCellPCDorsalRight->getId();

              if( $combination[1] != '-1' ){
                $toCellPCDorsalRight = PatternCellDorsalRightPeer::retrieveByNameAndPatternId($combination[1], $patternId);
                if($toCellPCDorsalRight){
                  $toId = $toCellPCDorsalRight->getId();
                  
                  $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoDorsalRightMark.PatternCellDorsalRightId = ?', $fromId);
                  $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoDorsalRightMark.ToCellId = ?', $toId);
                  $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_AND, 'combination_'.$comb_counter);
                }
              }
              else{
                  $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoDorsalRightMark.PatternCellDorsalRightId = ?', $fromId);
                  $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoDorsalRightMark.ToCellId IS NULL');
                  $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_AND, 'combination_'.$comb_counter);
              }
            }
          } elseif( $bodyPart == body_part::F_SIGLA ){ // tail
            $fromCellPCTail = PatternCellTailPeer::retrieveByNameAndPatternId($combination[0], $patternId);
            if($fromCellPCTail){
              $fromId = $fromCellPCTail->getId();

              if( $combination[1] != '-1' ){
                $toCellPCTail = PatternCellTailPeer::retrieveByNameAndPatternId($combination[1], $patternId);
                if($toCellPCTail){
                  $toId = $toCellPCTail->getId();
                
                  $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoTailMark.PatternCellTailId = ?', $fromId);
                  $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoTailMark.ToCellId = ?', $toId);
                  $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_AND, 'combination_'.$comb_counter);
                }
              }
              else{
                  $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoTailMark.PatternCellTailId = ?', $fromId);
                  $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoTailMark.ToCellId IS NULL');
                  $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_AND, 'combination_'.$comb_counter);
              }
            }
          }
        }//end of if combination[1]
        else{//here analyse the other types of marks, each containing only one element
          if(isset($combination[0])){
            if( $bodyPart == body_part::L_SIGLA ){
              $PCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByNameAndPatternId($combination[0], $patternId);
              if($PCDorsalLeft){
                $cellId = $PCDorsalLeft->getId();
                //look for photos with marks which have the from cell id or the to cell id equal to the id of the name of each cell (one combination is one cell, eg A1) 
                $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoDorsalLeftMark.PatternCellDorsalLeftId = ?', $cellId);
                $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoDorsalLeftMark.ToCellId = ?', $cellId);
                $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_OR, 'combination_'.$comb_counter);
              }
            } elseif( $bodyPart == body_part::R_SIGLA ){
              $PCDorsalRight = PatternCellDorsalRightPeer::retrieveByNameAndPatternId($combination[0], $patternId);
              if($PCDorsalRight){
                $cellId = $PCDorsalRight->getId();
                          
                $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoDorsalRightMark.PatternCellDorsalRightId = ?', $cellId);
                $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoDorsalRightMark.ToCellId = ?', $cellId);
                $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_OR, 'combination_'.$comb_counter);
              }
            } elseif( $bodyPart == body_part::F_SIGLA ){
              $PCTail = PatternCellTailPeer::retrieveByNameAndPatternId($combination[0], $patternId);
              if($PCTail){
                $cellId = $PCTail->getId();
                
                $query = $query->condition('cond_'.$comb_counter.'_1', 'ObservationPhotoTailMark.PatternCellTailId = ?', $cellId);
                $query = $query->condition('cond_'.$comb_counter.'_2', 'ObservationPhotoTailMark.ToCellId = ?', $cellId);
                $query = $query->combine(array('cond_'.$comb_counter.'_1', 'cond_'.$comb_counter.'_2'), Criteria::LOGICAL_OR, 'combination_'.$comb_counter);
              }
            }
          }//end of if(isset($combination[0]))
        }//end of else

        $combinationConds[] = 'combination_'.$comb_counter;
        $comb_counter +=1 ;
      }//end of foreach combination
    $query = $query->combine($combinationConds, Criteria::LOGICAL_OR);
    
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
  
  /*public static function _getCellNamesCombinations($beginCellName, $endCellName, $complete=true, $depth=False){
    $subsets = array();
    
    $letterIntervalArray = array();
    if($depth){
      $firstLetter = substr($beginCellName, 0, 1);
      $letterIntervalArray[] = $firstLetter.'1';
      $letterIntervalArray[] = $firstLetter.'2';
    } else {
      $letterIntervalArray[] = $beginCellName;
    }
    
    if($endCellName){
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
  }*/
  

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
          $observationPhotoIds = ObservationPhotoDorsalLeftMarkPeer::getObservationPhotoIds( array($mark->getPatternCellDorsalLeftId(), $mark->getIsWide(), $mark->getIsDeep(), $mark->getToCellId()) );//was $observationPhotoIds = ObservationPhotoDorsalLeftMarkPeer::getObservationPhotoIds($mark);
          $convertedMarkValues = self::_getConvertedMarkValues($mark);
          if($convertedMarkValues){
            $mirroredBodyPartObservationPhotoIds = ObservationPhotoDorsalRightMarkPeer::getObservationPhotoIds($convertedMarkValues);
            $observationPhotoIds = array_merge($observationPhotoIds, $mirroredBodyPartObservationPhotoIds);
          }
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
          $observationPhotoIds = ObservationPhotoDorsalRightMarkPeer::getObservationPhotoIds( array($mark->getPatternCellDorsalRightId(), $mark->getIsWide(), $mark->getIsDeep(), $mark->getToCellId()) );
          $convertedMarkValues = self::_getConvertedMarkValues($mark);
          if($convertedMarkValues){
            $mirroredBodyPartObservationPhotoIds = ObservationPhotoDorsalLeftMarkPeer::getObservationPhotoIds($convertedMarkValues);
            $observationPhotoIds = array_merge($observationPhotoIds, $mirroredBodyPartObservationPhotoIds);
          }
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
          $observationPhotoIds = ObservationPhotoTailMarkPeer::getObservationPhotoIds( array($mark->getPatternCellTailId(), $mark->getIsWide(), $mark->getIsDeep(), $mark->getToCellId()) );
          $query = $query->filterById($observationPhotoIds, Criteria::IN);
      }
    } else {
          $observationPhotoIds = ObservationPhotoTailMarkPeer::getObservationPhotoIds();
          $query = $query->filterById($observationPhotoIds, Criteria::NOT_IN);
    }
    return $query;
  }

  public static function _getConvertedMarkValues($mark){
    if( stripos(get_class($mark), 'DorsalLeft') ) {//this is used in order to avoid passing an extra argument to the function
      //extract the PatternCellDorsalLeft object tied to the fromCell value of the mark
      $fromCellPCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByPK($mark->getPatternCellDorsalLeftId());
      
      //$fromCellPCDorsalLeft will definitely exist (so will $patternId and $fromCellName), so get its pattern id and its name
      $patternId = $fromCellPCDorsalLeft->getPatternId();
      $fromCellName = $fromCellPCDorsalLeft->getName();
      
      //find the equivalent PatternCellDorsalRight object using $patternId (common with toCellName) and $fromCellName
      $fromCellPCDorsalRight = PatternCellDorsalRightPeer::retrieveByNameAndPatternId($fromCellName, $patternId);

      if($fromCellPCDorsalRight){
        $fromCellId = $fromCellPCDorsalRight->getId();//equivalent fromCellId
      }
      else{//could not find an equivalent
        return NULL;
      }

      if($mark->getToCellId()){
        //extract the PatternCellDorsalLeft object tied to the toCell value of the mark - it can't be NULL, if $mark->getToCellId() is not NULL
        //only get its name, its pattern id should be the same as the one above
        $toCellPCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByPK($mark->getToCellId());
        $toCellName = $toCellPCDorsalLeft->getName();

        $toCellPCDorsalRight = PatternCellDorsalRightPeer::retrieveByNameAndPatternId($toCellName, $patternId);
        if($toCellPCDorsalRight){
          $toCellId = $toCellPCDorsalRight->getId();//equivalent toCellId
        }
        else{//could not find an equivalent
          return NULL;
        }
      }
      else{
        $toCellId = $mark->getToCellId();//NULL
      }
    }elseif ( stripos(get_class($mark), 'DorsalRight') ) {

      $fromCellPCDorsalRight = PatternCellDorsalRightPeer::retrieveByPK($mark->getPatternCellDorsalRightId());
      $patternId = $fromCellPCDorsalRight->getPatternId();
      $fromCellName = $fromCellPCDorsalRight->getName();
      
      $fromCellPCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByNameAndPatternId($fromCellName, $patternId);
      
      if($fromCellPCDorsalLeft){
        $fromCellId = $fromCellPCDorsalLeft->getId();
      }
      else{
        return NULL;
      }

      if($mark->getToCellId()){

        $toCellPCDorsalRight = PatternCellDorsalRightPeer::retrieveByPK($mark->getToCellId());
        $toCellName = $toCellPCDorsalRight->getName();

        $toCellPCDorsalLeft = PatternCellDorsalLeftPeer::retrieveByNameAndPatternId($toCellName, $patternId);
        if($toCellPCDorsalLeft){
          $toCellId = $toCellPCDorsalLeft->getId();
        }
        else{
          return NULL;
        }
      }
      else{
        $toCellId = $mark->getToCellId();
      }
    }
    return array( $fromCellId, $mark->getIsWide(), $mark->getIsDeep(), $toCellId );
  }

  public static function _processUserMarks(&$from, &$to){
          if( is_string($from) ){//it is an array only when 'user_mark_from_vertical' and 'user_mark_to_vertical' are disabled, otherwise it's a string
            if( strlen($from) ){//From is set (this means it is not "", which comes from the option "------")
              if( !strlen($to) ){//To is not set (it's "")
                $to = NULL;
              }
            }
            else{//From is not set
              if ( strlen($to) ) {//To is set, so swap From with To and make To NULL
                $from = $to;
                $to = NULL;
              }
              else{//This means both From and To are not set
                $from= NULL;
              }
            }
          }
  }

  public static function _fixEqualOrReversed(&$beginCell, &$endCell){

        if($beginCell->getId() == $endCell->getId()){//here if we have the same string on both sides, eg A1-A1
            $endCell = NULL;
        }
        else{//don't compare id's, as there might be new letters added at the end, what the algorithm cares about are the letters
            if(strcasecmp($beginCell->getName(), $endCell->getName()) > 0){//swap values, if beginCell = C2 and endCell = C1, for example
                $tmp = $endCell;
                $endCell = $beginCell;
                $beginCell = $tmp;
            }
        }
  }

public static function _getLetterWithOtherNumber($cellName){
    if( strpos($cellName, '1') != FALSE ){//$cellName is of type A1
      return substr($cellName, 0, 1).'2';//A2
    }
    else{//$cellName is of type A2
      return substr($cellName, 0, 1).'1';//A1
    }
    return NULL;
  }
} // ObservationPhotoQuery

