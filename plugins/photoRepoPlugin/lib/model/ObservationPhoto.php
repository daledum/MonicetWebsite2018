<?php


class ObservationPhoto extends BaseObservationPhoto {
  const NEW_SIGLA = 'new';
  const NEW_DESC  = 'Para caracterizar';
  const C_SIGLA   = 'characterized';
  const C_DESC    = 'Para identificar';
  const FA_SIGLA  = 'for_approval';
  const FA_DESC   = 'Para validar';
  const V_SIGLA   = 'validated';
  const V_DESC    = 'Validada';
  
  
    public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
        $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::NEW_SIGLA] = self::NEW_DESC;
    $resultados[self::C_SIGLA] = self::C_DESC;
    $resultados[self::FA_SIGLA] = self::FA_DESC;
    $resultados[self::V_SIGLA]  = self::V_DESC;

    return $resultados;
  }
  public static function getForSelectForFilter($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
        $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::NEW_SIGLA] = self::NEW_DESC;
    $resultados[self::C_SIGLA] = self::C_DESC;
    $resultados[self::FA_SIGLA] = self::FA_DESC;

    return $resultados;
  }
  
  public static function getValueForSiglaStatus( $sigla ) {
    $resultados[self::NEW_SIGLA] = self::NEW_DESC;
    $resultados[self::C_SIGLA] = self::C_DESC;
    $resultados[self::FA_SIGLA] = self::FA_DESC;
    $resultados[self::V_SIGLA]  = self::V_DESC;
    return (isset($resultados[$sigla]))? $resultados[$sigla]: '';
  }
  
  public function __toString() {
      return $this->getFileName();
  }
  
  public function getHtmlResume(){
    $html = '';
    $html .= $this->getCode().'\\n';
    $html .= $this->getPhotoDate('Y-m-d').' '.$this->getPhotoTime('H:i').'\\n';
//    if( $this->getSpecieId() ){
//      $specie = $this->getSpecie();
//      $html .= $specie->getCode().' - '. $specie->getName().' - '.$specie->getScientificName().'\\n';
//    }
//    if( $this->getBodyPartId() ){
//      $bodyPart = $this->getBodyPart();
//      $html .= $bodyPart->getCode().' - '. $bodyPart->getDescription('pt').'\\n';
//    }
    
//    $html .= $this->getGender().'\\n';
    
    if( $this->getLatitude() && $this->getLongitude() ) {
      $html .= $this->getLatitude().' | '.$this->getLongitude().'\\n';
    }
    
    if($this->getCompanyId()) {
      $company = $this->getCompany();
      $html .= $company->getRecCetCode().' - '. $company;  
    }
//    if($this->getVesselId()) {
//      $vessel = $this->getVessel();
//      $html .= $vessel->getRecCetCode().' - '. $vessel->getName().'\\n';  
//    }
//    if($this->getPhotographerId()) {
//      $photographer = $this->getPhotographer();
//      $html .= $photographer->getCode().' - '. $photographer->getName().'\\n';  
//    }
    
    return $html;
  }
  
  public function getMarks(){
    $marks = array();
    
    if( $this->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
      foreach($this->getObservationPhotoDorsalLefts() as $OBPhotoDorsalLeft) {
        foreach($OBPhotoDorsalLeft->getObservationPhotoDorsalLeftMarks() as $mark ){
          $marks[] = $mark;
        }
      }
    } elseif( $this->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
      foreach($this->getObservationPhotoDorsalRights() as $OBPhotoDorsalRight) {
        foreach($OBPhotoDorsalRight->getObservationPhotoDorsalRightMarks() as $mark ){
          $marks[] = $mark;
        }
      }
    }elseif( $this->getBodyPart() == body_part::F_SIGLA ){ // tail
      foreach($this->getObservationPhotoTails() as $OBPhotoTail) {
        foreach($OBPhotoTail->getObservationPhotoTailMarks() as $mark ){
          $marks[] = $mark;
        }
      }
    }
    
    return $marks;
  }
  
  public function completeToString($hiddenFields=false){
    $result = '';
    // for tail observation photos
    if( $this->getBodyPart()->getCode() == body_part::F_SIGLA ) {
      $result .= 'Barbatana caudal';
      foreach($this->getObservationPhotoTails() as $OBPhotoTail) {
        if( $OBPhotoTail->getIsSmooth()){
          $result .= ', Lisa';
        }
        if( $OBPhotoTail->getIsIrregular()){
          $result .= ', Irregular';
        }
        if( $OBPhotoTail->getIsCuttedPointLeft()){
          $result .= ', P.E. cortada';
        }
        if( $OBPhotoTail->getIsCuttedPointRight()){
          $result .= ', P.D. cortada';
        }
        $nMarks = $OBPhotoTail->countObservationPhotoTailMarks();
        $i = 1;
        if( $nMarks > 0) {
          $result .= ' [ ';
          foreach($OBPhotoTail->getObservationPhotoTailMarks() as $mark ){
            if( $hiddenFields ){
              $result .= '<span><div class="mark_id" hidden>'.$mark->getId().'</div><span style="cursor: hand; cursor: pointer;" class="mark_click_listener" id="to_string_'.$mark->getId().'" >';
            }
            if( $mark->getIsWide() ) $result .= 'Larga ';
            if( $mark->getIsDeep() ) $result .= 'Estreita ';
            if( $mark->getPatternCellTailId() ) $result .= $mark->getPatternCellTailRelatedByPatternCellTailId()->getName();
            if( $mark->getToCellId() ) $result .= '-'.$mark->getPatternCellTailRelatedByToCellId()->getName();
            if( $hiddenFields ){
              $result .= '</span></span>';
            }
            if( $i != $nMarks ) $result .= ', ';
            $i++;
          }
          $result .= ' ]';
        }
      }
    }
    //for dorsal left observation photos
    if( $this->getBodyPart()->getCode() == body_part::L_SIGLA ) {
      $result .= 'Dorsal lado esq';
      foreach($this->getObservationPhotoDorsalLefts() as $OBPhotoDorsalLeft) {
        if( $OBPhotoDorsalLeft->getIsSmooth()){
          $result .= ', Lisa';
        }
        if( $OBPhotoDorsalLeft->getIsIrregular()){
          $result .= ', Irregular';
        }
        if( $OBPhotoDorsalLeft->getIsCuttedPoint()){
          $result .= ', P. cortada';
        }
        $nMarks = $OBPhotoDorsalLeft->countObservationPhotoDorsalLeftMarks();
        $i = 1;
        if( $nMarks > 0) {
          $result .= ' [ ';
          foreach($OBPhotoDorsalLeft->getObservationPhotoDorsalLeftMarks() as $mark ){
            if( $hiddenFields ){
              $result .= '<span><div class="mark_id" hidden>'.$mark->getId().'</div><span style="cursor: hand; cursor: pointer;" class="mark_click_listener" id="to_string_'.$mark->getId().'" >';
            }
            if( $mark->getIsWide() ) $result .= 'Larga ';
            if( $mark->getIsDeep() ) $result .= 'Estreita ';
            if( $mark->getPatternCellDorsalLeftId() ) $result .= $mark->getPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId()->getName();
            if( $mark->getToCellId() ) $result .= '-'.$mark->getPatternCellDorsalLeftRelatedByToCellId()->getName();
            if( $hiddenFields ){
              $result .= '</span></span>';
            }
            if( $i != $nMarks ) $result .= ', ';
            $i++;
          }
          $result .= ' ]';
        }
      }
    }
    //for dorsal Right observation photos
    if( $this->getBodyPart()->getCode() == body_part::R_SIGLA ) {
      $result .= 'Dorsal lado dir';
      foreach($this->getObservationPhotoDorsalRights() as $OBPhotoDorsalRight) {
        if( $OBPhotoDorsalRight->getIsSmooth()){
          $result .= ', Lisa';
        }
        if( $OBPhotoDorsalRight->getIsIrregular()){
          $result .= ', Irregular';
        }
        if( $OBPhotoDorsalRight->getIsCuttedPoint()){
          $result .= ', P. cortada';
        }
        $nMarks = $OBPhotoDorsalRight->countObservationPhotoDorsalRightMarks();
        $i = 1;
        if( $nMarks > 0) {
          $result .= ' [ ';
          foreach($OBPhotoDorsalRight->getObservationPhotoDorsalRightMarks() as $mark ){
            if( $hiddenFields ){
              $result .= '<span><div class="mark_id" hidden>'.$mark->getId().'</div><span style="cursor: hand; cursor: pointer;" class="mark_click_listener" id="to_string_'.$mark->getId().'" >';
            }
            if( $mark->getIsWide() ) $result .= 'Larga ';
            if( $mark->getIsDeep() ) $result .= 'Estreita ';
            if( $mark->getPatternCellDorsalRightId() ) $result .= $mark->getPatternCellDorsalRightRelatedByPatternCellDorsalRightId()->getName();
            if( $mark->getToCellId() ) $result .= '-'.$mark->getPatternCellDorsalRightRelatedByToCellId()->getName();
            if( $hiddenFields ){
              $result .= '</span></span>';
            }
            if( $i != $nMarks ) $result .= ', ';
            $i++;
          }
          $result .= ' ]';
        }
      }
    }
    
    return $result;
  }
  
  
  
  public function isCharacterizable(){
    $specie = $this->getSpecie();
    $bodyPart = $this->getBodyPart();
    if( !$this->getSpecie() || !in_array($bodyPart, array(body_part::F_SIGLA, body_part::L_SIGLA, body_part::R_SIGLA)) ){
      return false;
    }
    
    $patternSpecie = PatternQuery::create()
          ->filterBySpecieId($this->getSpecieId())
          ->findOne();
    
    if( !$patternSpecie ){
      
      return false;
    }
    
    switch ($bodyPart){
      case body_part::F_SIGLA:
        return (strlen($patternSpecie->getImageTail()) > 0)? true: false;
        break;
      case body_part::L_SIGLA:
        return (strlen($patternSpecie->getImageDorsalLeft()) > 0)? true: false;
        break;
      case body_part::R_SIGLA:
        return (strlen($patternSpecie->getImageDorsalRight()) > 0)? true: false;
        break;
      default:
        return false;
        break;
    }
  }
  
  public function isIdentifyable(){
    if( in_array($this->getStatus(), array( ObservationPhoto::C_SIGLA, ObservationPhoto::FA_SIGLA, ObservationPhoto::V_SIGLA )) ) {
      return true;
    } elseif ( !$this->isCharacterizable() && $this->getStatus() == ObservationPhoto::NEW_SIGLA) {
      return true;
    }
    return false;
  }
  
  public function statusUpdate($action){
    if(in_array($action, array('edit', 'characterize', 'identify', 'validate', 'change_marks')) ){
      $sessionUser = sfContext::getInstance()->getUser()->getGuardUser();
      switch ( $this->getStatus() ){
        case self::NEW_SIGLA:
          $numPatterns = $this->getSpecie()->countPatterns();
          if( $action == 'characterize' && $numPatterns ){
            $this->setStatus(self::C_SIGLA);
            $this->save();
          }
          if( $action == 'identify' && !$numPatterns ){
            $this->setStatus(self::FA_SIGLA);
            $this->setLastEditedBy($sessionUser->getId());
            $this->save();
          }
          //the action is 'change_marks' which is called when characterizing a photo (an action which is run only when the photo is characterizable, see executeCharacterize())
          if( $action == 'change_marks' ){
            if($this->getIndividual()){
              $this->setStatus(self::FA_SIGLA);//if the photo already had an individual, change its status to 'para validar'
              $this->setLastEditedBy($sessionUser->getId());
              $this->save();
            }
            else{
              $this->setStatus(self::C_SIGLA);//else, change it to 'para identificar'
              $this->setLastEditedBy($sessionUser->getId());
              $this->save();
            }
          }
          break;
          
        case self::C_SIGLA:
          if( $action == 'identify'){
            $this->setStatus(self::FA_SIGLA);
            $this->setLastEditedBy($sessionUser->getId());
            $this->save();
          }
          //the action is 'change_marks' which is called when characterizing a photo (an action which is run only when the photo is characterizable, see executeCharacterize())
          if( $action == 'change_marks' ){
            if($this->getIndividual()){
              $this->setStatus(self::FA_SIGLA);//if the photo already had an individual, change its status to 'para validar'
              $this->setLastEditedBy($sessionUser->getId());
              $this->save();
            }
            else{
              $this->setLastEditedBy($sessionUser->getId());
              $this->save();
            }
          }
          break;
          
        case self::FA_SIGLA:
          if( $action == 'identify' || $action == 'edit' || $action == 'characterize' || $action == 'change_marks' ){
            $this->setLastEditedBy($sessionUser->getId());
            $this->save();
          }
          if( $action == 'validate' ){
            $this->setStatus(self::V_SIGLA);
            $this->setLastEditedBy($sessionUser->getId());
            $this->setValidatedBy($sessionUser->getId());
            $this->save();
          }
          break;
          
        case self::V_SIGLA:
          if( $action == 'identify' || $action == 'edit' || $action == 'characterize' || $action == 'change_marks' ){
            $this->setStatus(self::FA_SIGLA);
            $this->setLastEditedBy($sessionUser->getId());
            $this->save();
          }
          break;
      }
    }
  }
  
  public function is_validable_by($userId){
    if( $this->getStatus() == self::FA_SIGLA /* && $this->getLastEditedBy() != $userId*/ ){
      return true;
    } else {
      return false;
    }
  }
  
  public function getMarksForSelect(){
      $marks = $this->getMarks();
      return ObservationPhotoPeer::fromMarksToArray($marks);
  }

  public function haveToChooseBestPhotoAgain($caller = 'ask'){
  
  //call this function before deleting or re-associating (to a new or already existing individual) the photo
  //this function will tell you if you have to redirect to the individual's page in order to have the option of choosing a new best photo
  //'ask' for just asking if, in case this photo is deleted or re-associated, the user will be redirected to the individual's page
  //'ask and change' for asking and getting rid of the old individual (in case it's left without photos) or setting a new best photo or clearing the dominant body part code (if necessary)
      
    $individual = $this->getIndividual();
    
    if($this->getIsBest() && $individual){//the photo needs to be the best and be linked to an individual
      
      $photos = $individual->getObservationPhotos();
      
      if($individual->countObservationPhotos() >= 2){//the individual has at least 2 photos and will be left with at least 1
        $numberOfPhotosWithSameBodyPart = 0;
          
          foreach($photos as $photo){
            if($photo){
              if( $this->getId() != $photo->getId() && $this->getBodyPartId() == $photo->getBodyPartId() ){//the other photo(s) have the same body part

                  $numberOfPhotosWithSameBodyPart++;
                  if($numberOfPhotosWithSameBodyPart == 2){//found at least 2 OTHER photos with the same body part, therefore user needs to choose a new BEST photo
                    return 'The photograph you are deleting is the best photo of the individual with that body part ('.$this->getBodyPart()->getDescription('pt').') - which now has more than 2 photos. One of them will be randomly chosen as its best photo. You will be redirected to the page of the individual to choose a new best photo. ';
                  }
                  
                  if($caller == 'ask and change'){
                    $photo->setIsBest(true);//this will be called a maximum of one time
                    $photo->save();
                  }
              }
            }//end of if($photo)
          }//end of foreach()

          //here still in the case where the individual has at least 2 photos and will be left with at least 1
          //small sidenote: because of the return above, this will not be called if the individual has at least 2 OTHER photos with the same body part (in this case, we don't need to clear the body part code from the notes)
          if( $caller == 'ask and change' &&
              !$numberOfPhotosWithSameBodyPart && //it couldn't find any OTHER photos with the same body part
              $this->getBodyPart()->getCode() == $individual->getDominantBodyPartCode() //this photo is the only photo with the dominant body part of its associated individual (and it's on the verge of being deleted or re-associated)
            ){
              $individual->setDominantBodyPartCode(); //clear the user-set body part code of the individual
              $individual->save();
          }
      }
      else{//has 1 photo (the individual has at least one photo): the photo on which this function is being called - therefore (deleting or re-associating), the individual will be left with 0 photos, thus return NULL
              if($caller == 'ask and change'){
                $individual->delete();//delete individual if it's left without any photos (this will also set this photo's is_best to 0)
              }
      }
    }//else: is neither not best or is not linked to an individual so, go to next instruction
    return NULL;
  }
  
} // ObservationPhoto
