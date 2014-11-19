<?php

class Individual extends BaseIndividual {
  public function __toString() {
    return $this->getName();
  }
  
  public function getBestObservationPhoto() {
    $query = ObservationPhotoQuery::create()
            ->filterByIsBest(true)
            ->filterByIndividualId($this->getId());
    return $query->findOne();
  }
  
  public function getValidObservationPhotos(){
    $query = ObservationPhotoQuery::create()
            ->filterByIndividualId($this->getId())
            ->filterByStatus(ObservationPhoto::V_SIGLA);
    return $query->find();
  }
  public function countValidObservationPhotos(){
    return count($this->getValidObservationPhotos());
  }
  
  public function getSightings($limit=null) {
    $sightingIds = array();
    foreach($this->getObservationPhotos() as $OPhoto) {
      if( $OPhoto->getSightingId() && $OPhoto->getStatus(ObservationPhoto::V_SIGLA) ) {
        if( !in_array($OPhoto->getSightingId(), $sightingIds)){
          $sightingIds[] = $OPhoto->getSightingId();
        }
      }
    }
    $query = SightingQuery::create()
            ->filterById($sightingIds, Criteria::IN)
            ->useRecordQuery()
              ->useGeneralInfoQuery()
                ->orderByDate(Criteria::DESC)
              ->endUse()
            ->endUse();
    
    if( $limit ) {
      $query = $query->limit($limit);
    }
    return $query->find();
  }
  
//  public function getObservationDates($limit = null) {
//    $sightings = $this->getSightings($limit);
//    $resultStr = '';
//    
//    foreach( $sightings as $sighting ){
//      $resultStr .= $sighting->getRecord()->getGeneralInfo()->getDate(', Y-m-d');
//    }
//    
//    if( !is_null($limit) ) {
//      if(count($sightings) == $limit ) {
//        $resultStr .= ', ...';
//      }
//    }
//    
//    return substr($resultStr, 2);
//  }
  
  public function getObservationDates($limit = null) {
    $query = ObservationPhotoQuery::create()
            ->filterByIndividualId($this->getId())
            ->orderByPhotoDate(Criteria::DESC);
    $OBPhotos = $query->find();
    //echo count($OBPhotos);
    
    $dates = array();
    foreach( $OBPhotos as $OBPhoto ){
      if( !array_key_exists($OBPhoto->getPhotoDate('Y-m-d'), $dates) ){
          $dates[$OBPhoto->getPhotoDate('Y-m-d')] = 1;
      } else {
        $dates[$OBPhoto->getPhotoDate('Y-m-d')] = $dates[$OBPhoto->getPhotoDate('Y-m-d')] + 1;
      }
    }
    krsort($dates);
    //print print_r($dates);
    //print '<br/>';
    $dates_final = array();
    foreach($dates as $date => $num_ob_photos){
      //echo sprintf("%s|%s<br/>", $date, $num_ob_photos);
      if( $num_ob_photos > 1 ){
        //test if photos are from same gi
        $OBPhotos = ObservationPhotoQuery::create()
                ->filterByIndividualId($this->getId())
                ->orderByPhotoDate(Criteria::DESC)
                ->filterByPhotoDate($date)->find();
        //echo count($OBPhotos);
        $gi_counter = array();
        foreach( $OBPhotos as $OBPhoto ){
          if( is_integer($OBPhoto->getSightingId()) ){
            //echo $OBPhoto->getSightingId();
            $gi_id = $OBPhoto->getSighting()->getRecord()->getGeneralInfoId();
            //echo $gi_id;
            if( !array_key_exists($gi_id, $gi_counter) ){
              $gi_counter[$gi_id] = 1;
            } else {
              $gi_counter[$gi_id] = $gi_counter[$gi_id] + 1;
            }
          } else {
            $dates_final[] = array('date' => $date, 'num_photos' => 1);
          }
        }
        //print_r($gi_counter);
        foreach( $gi_counter as $key => $counter ){
          $dates_final[] = array('date' => $date, 'num_photos' => $counter);
        }
      } else {
        $dates_final[] = array('date' => $date, 'num_photos' => 1);
      }
    }
    
    $num_dates = count($dates_final);
    
    if( $limit ){
      $dates_final = array_slice($dates_final, 0, $limit);
    }
    return $dates_final;
  }
  
  public function getLastTenObservationDates() {
    $limit = 10;
    return $this->getObservationDates($limit);
  }
  
//  public function getLastTenObservationPhotoDates() {
//    $limit = 10;
//    return $this->getObservationPhotoDates($limit);
//  }
  
  public function getLastValidObservationPhoto(){
    $query = ObservationPhotoQuery::create()
            ->filterByIndividualId($this->getId())
            ->filterByStatus(ObservationPhoto::V_SIGLA)
            ->orderByPhotoDate(Criteria::DESC);
    return $query->findOne();
  }
  
  public function getLastGeneralInfos($limit=null){
    $ids = array();
    $OBPhotos = $this->getValidObservationPhotos();
    echo count($OBPhotos);
    foreach( $OBPhotos as $OBPhoto ){
      if( is_integer($OBPhoto->getSightingId()) ){
        $gi_id = $OBPhoto->getSighting()->getRecord()->getGeneralInfoId();
        if( !in_array($gi_id, $ids) ){
          $ids[] = $gi_id;
        }
      }
    }
    $query = GeneralInfoQuery::create()
            ->filterById($ids, Criteria::IN)
            ->filterByValid(true)
            ->orderByDate(Criteria::DESC);
    if( $limit ){
      $query = $query->limit($limit);
    }
    return $query->find();
  }
  
  public function delete(PropelPDO $con = null){
    $OBPhotos = $this->getObservationPhotos();
    $sessionUser = sfContext::getInstance()->getUser()->getGuardUser();
    foreach( $OBPhotos as $OBPhoto ){
      $OBPhoto->setIndividual(null);
      $OBPhoto->setIsBest(false);
      $OBPhoto->setStatus(ObservationPhoto::FA_SIGLA);
      $OBPhoto->setLastEditedBy($sessionUser->getId());
      $OBPhoto->save();
    }
    parent::delete($con);
  }
  
  public function getGIDates($limit = null) {
    $gis = $this->getLastGeneralInfos($limit);
    //echo count($gis);
    
    $resultStr = '';
    foreach( $gis as $gi ){
      $resultStr .= $gi->getDate(', Y-m-d');
    }
    
    if( !is_null($limit) ) {
      if(count($gis) == $limit ) {
        $resultStr .= ', ...';
      }
    }
    
    return substr($resultStr, 2);
  }
  
  public function getLastTenGIDates() {
    $limit = 10;
    return $this->getGIDates($limit);
  }

  public function setDominantBodyPart($body_part_code) {


    //test this for newly created individuals
    //get all i18n individuals linked to this individual and add the dominant body part code at the end of each one's notes
    //this solution doesn't work - will use only the current i18n individual - prone to errors, when switching from "pt" to "en" backend
    /*
    $i18n_individuals = $this->getIndividualI18ns;
    foreach( $i18n_individuals as $i18n_individual){
        //get the notes of the i18nindividual
        $notes = $i18n_individual->getNotes();
        $position_of_underscore = stripos($notes, "__");
        
        //add the body part code at the end of the individual's notes (eg. add "__F")
        if($position_of_underscore === FALSE){//case a) it never had __BodyPart at the end, so add it
            $i18n_individual->setNotes( $notes."__".$body_part_code );//or just dominant_body_part
            $i18n_individual->save();
        }
        else{//case b) it already had _BodyPart, so, just replace the old one with the new one
            $i18n_individual->setNotes( substr($notes,0,$position_of_underscore)."__".$body_part_code );//remove "__F" and replace with "__L"
            $i18n_individual->save();
        }
    }
    //$this->save;//?
    */

    //get the notes of the individual
    $notes = $this->getNotes();//this could cause an error, it only returns notes for currentIndividuali18n, what happens when the language is changed?
    $position_of_underscore = stripos($notes, "__");
    
    //add the body part code at the end of the individual's notes (eg. add "_F")
    if($position_of_underscore === FALSE){//case a) it never had _BodyPart at the end, so add it
        $this->setNotes( $notes."__".$body_part_code );//or just dominant_body_part//was $dominant_body_part->getCode()
        $this->save();
    }
    else{//case b) it already had _BodyPart, so, just replace the old one with the new one
        $this->setNotes( substr($notes,0,$position_of_underscore)."__".$body_part_code );//remove "__F" and replace with "__L"
        $this->save();
    }
  }

  public function getDominantBodyPart() {
    
    //the correct way would be do go through each i18n individual connected to this individual, read its notes and stop at the first "__F" encountered, otherwise conclude that no dominant body part was previously set by the user
    $notes = $this->getNotes();//this could cause an error, it only returns notes for currentIndividuali18n, what happens when the language is changed?
    $position_of_underscore = stripos($notes, "__");//this works even if $notes is NULL
    if($position_of_underscore !== FALSE){
        $body_part_code =  substr($notes,$position_of_underscore+2);//+2 because "__" is made up of two "_"
    }
    else{
            $OBPhotos = $this->getObservationPhotos();
            $dorsal_right = $dorsal_left = $tail = 0;

            $specie = $this->getSpecie();
            $patternSpecie = PatternQuery::create()
                  ->filterBySpecieId($specie->getId())
                  ->findOne();
            
            if( $patternSpecie &&
                ( strlen($patternSpecie->getImageDorsalLeft()) > 0 || strlen($patternSpecie->getImageDorsalRight()) > 0 )
              ) {//this means that its specie has one of the following ids: 2, 4, 7, 10 and so, its default dominant body part is R first and L second (in case none of its photos has R as a body part)

                if($OBPhotos){//the individual has at least one photo
                    
                    foreach($OBPhotos as $OBPhoto){//only do one loop, not 3
                      if( $OBPhoto->getBodyPart()->getCode() == body_part::R_SIGLA ){
                        $dorsal_right++;
                        break;//found one with the dominant body part, no need to go further
                      }
                      elseif ( $OBPhoto->getBodyPart()->getCode() == body_part::L_SIGLA ) {
                        $dorsal_left++;
                      }
                      elseif ( $OBPhoto->getBodyPart()->getCode() == body_part::F_SIGLA ) {
                        $tail++;
                      }
                    }
                    
                    if($dorsal_right > 0){
                      $body_part_code = body_part::R_SIGLA;
                    }elseif ($dorsal_left > 0) {
                      $body_part_code = body_part::L_SIGLA;
                    }elseif ($tail > 0) {
                      $body_part_code = body_part::F_SIGLA;
                    }else{
                      $body_part_code = $OBPhotos[0]->getBodyPart()->getCode();
                    }

                }
                else{//the individual has no photos and no "__RL" or "__whatever" in its notes, so set its dominant body part as "R"
                    return body_part::R_SIGLA;
                }
            }
            else{//all other species have "F" as dominant body part; if no photo has an "F" body part, the dominant one will be the body part of the first photo (will apply the same for species 2,4,7,10)
                  if($OBPhotos){//the individual has at least one photo
                    
                    foreach($OBPhotos as $OBPhoto){
                      if( $OBPhoto->getBodyPart()->getCode() == body_part::F_SIGLA ){
                        $tail++;
                        break;//found one with the dominant body part, no need to go further
                      }
                    }
                    
                    if($tail > 0){
                      $body_part_code = body_part::F_SIGLA;
                    }else{
                      $body_part_code = $OBPhotos[0]->getBodyPart()->getCode();
                    }

                  }
                  else{//the individual has no photos and no "__F" in its notes, so set its dominant body part as "R"
                      return body_part::F_SIGLA;
                  }
            }
    }//end of else ($position_of_underscore is FALSE)

    return $body_part_code;
  }
  
} // Individual
