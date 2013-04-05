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
  
  public function completeToString(){
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
            if( $mark->getIsWide() ) $result .= 'Larga ';
            if( $mark->getIsDeep() ) $result .= 'Estreita ';
            if( $mark->getPatternCellTailId() ) $result .= $mark->getPatternCellTailRelatedByPatternCellTailId()->getName();
            if( $mark->getToCellId() ) $result .= '-'.$mark->getPatternCellTailRelatedByToCellId()->getName();
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
            if( $mark->getIsWide() ) $result .= 'Larga ';
            if( $mark->getIsDeep() ) $result .= 'Estreita ';
            if( $mark->getPatternCellDorsalLeftId() ) $result .= $mark->getPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId()->getName();
            if( $mark->getToCellId() ) $result .= '-'.$mark->getPatternCellDorsalLeftRelatedByToCellId()->getName();
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
            if( $mark->getIsWide() ) $result .= 'Larga ';
            if( $mark->getIsDeep() ) $result .= 'Estreita ';
            if( $mark->getPatternCellDorsalRightId() ) $result .= $mark->getPatternCellDorsalRightRelatedByPatternCellDorsalRightId()->getName();
            if( $mark->getToCellId() ) $result .= '-'.$mark->getPatternCellDorsalRightRelatedByToCellId()->getName();
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
  
  public function delete(PropelPDO $con = null) {
    if( $this->getStatus() != ObservationPhoto::V_SIGLA ) {
      $locationBegin = sfConfig::get('sf_upload_dir').'/pr_repo_final/';
      $fileAddresses = array(
          $locationBegin.'tn_130_120_'.$this->getFileName(),
          $locationBegin.'tn_165_150_'.$this->getFileName(),
          $locationBegin.'tn_200_'.$this->getFileName(),
          $locationBegin.$this->getFileName()
      ); 
      foreach( $fileAddresses as $fileAddress ) {
        if(file_exists($fileAddress) ) {
          system('rm '.$fileAddress);
        }
      }
      parent::delete();
    }
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
          break;
          
        case self::C_SIGLA:
          if( $action == 'identify'){
            $this->setStatus(self::FA_SIGLA);
            $this->setLastEditedBy($sessionUser->getId());
            $this->save();
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
} // ObservationPhoto
