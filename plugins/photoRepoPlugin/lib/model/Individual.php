<?php

class Individual extends BaseIndividual {
  public function __toString() {
    return $this->getName();
  }
  
  public function getBestObservationPhoto() {
  
      $dominant_body_part_code = $this->getDominantBodyPartCode();

      $query = ObservationPhotoQuery::create()
              ->filterByIsBest(true)
              ->filterByIndividualId($this->getId());
      $bestPhotos = $query->find();

      //return $query->findOne(); in conjuction with an extra (called as the 3rd filter) ->filterByBodyPartId( $dominant_body_part_id ) was tried, but did not work
      //$c = new Criteria();
      //$c->add(BodyPartPeer::CODE, $dominant_body_part_code);
      //$dominant_body_part = BodyPartPeer::doSelect($c);
      //$dominant_body_part_id = $dominant_body_part->getId();//this was giving an error, saying it can't call getId() on $dominant_body_part, although it was confirmed to be of the BodyPart type

      if($bestPhotos){
        foreach($bestPhotos as $bestPhoto){
          if( (string)$bestPhoto->getBodyPart() == $dominant_body_part_code ){//->getBodyPart returns a Body Part object whose __toString() returns ->getCode()
            return $bestPhoto;
            break;
          }
        }
        return $bestPhotos[0];//defence 1 (return the first encountered best photo): this means it has no photos with the dominant body part and with is_best == 1, not possible according to the way the code is written
      }
      else{//defence 2 (return the first photo of the individual): this means it has no photos with is_best == 1, again, not possible
        $OBPhotos = $this->getObservationPhotos();//returns a PropelCollection (never NULL)
        if( !$OBPhotos->isEmpty() ){
          return $OBPhotos[0];
        }
      }
      //defence 3: nothing here in the case the individual has 0 photos (again, not possible) - this will have ->getFileName() called on it, so, an object linked to a photo saying "HAS NO PHOTOS" would be nice
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
      $OBPhoto->setStatus(ObservationPhoto::C_SIGLA);
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

  public function setDominantBodyPartCode($v = null) {

    $specie = $this->getSpecie();
    $patternSpecie = PatternQuery::create()
            ->filterBySpecieId($specie->getId())
            ->findOne();

    if( $patternSpecie &&
        ( strlen($patternSpecie->getImageDorsalLeft()) > 0 || strlen($patternSpecie->getImageDorsalRight()) > 0 )
      ) {//if the specie id is 2,4,7 or 10
      if($v == body_part::L_SIGLA){//and the body part code is L
        $v = null;//clear the old body part code (if there is one)- see below and add nothing, as L is the default body part code
      }
    }
    else{//for all other species
      if($v == body_part::F_SIGLA){//and the body part code is F
        $v = null;//clear the old body part code (if there is one) and add nothing, as F is the default body part code
      }
    }
    
    parent::setDominantBodyPartCode($v);
  }

  public function getDominantBodyPartCode() {
    
    $OBPhotos = $this->getObservationPhotos();
    $body_part_code = parent::getDominantBodyPartCode();

    if($body_part_code){//there is a user-set body part code

        //check to see if there is at least one photo with that dominant body part
        if( !$OBPhotos->isEmpty() ){//the individual has at least one photo

          foreach($OBPhotos as $OBPhoto){
            if( $OBPhoto->getBodyPart()->getCode() == $body_part_code ){//photo with the same body part code as the one written in dominant_body_part_code field
                return $body_part_code;
            }
          }
          
          //because of the return above, code below will be run only if it couldn't find a photo with the dominant body part code written in the field
          $this->setDominantBodyPartCode();//get rid of that dominant body part
          $this->save();
          $this->getDominantBodyPartCode();//call it again, this time it won't have a body part there
        }
        else{//individual has no photos (normally not possible), writing this case as a back-up
            $this->setDominantBodyPartCode();
            $this->save();
            $this->getDominantBodyPartCode();
        }
    }
    else{
            $dorsal_right = $dorsal_left = $tail = 0;

            $specie = $this->getSpecie();
            $patternSpecie = PatternQuery::create()
                  ->filterBySpecieId($specie->getId())
                  ->findOne();
            
            if( $patternSpecie &&
                ( strlen($patternSpecie->getImageDorsalLeft()) > 0 || strlen($patternSpecie->getImageDorsalRight()) > 0 )
              ) {//this means that its specie has one of the following ids: 2, 4, 7, 10 and so, its default dominant body part is L first and R second (in case none of its photos has L as a body part)

                if( !$OBPhotos->isEmpty() ){//the individual has at least one photo
                    
                    foreach($OBPhotos as $OBPhoto){//only do one loop, not 3
                      if( $OBPhoto->getBodyPart()->getCode() == body_part::L_SIGLA ){
                        $dorsal_left++;
                        break;//found one with the dominant body part, no need to go further
                      }
                      elseif ( $OBPhoto->getBodyPart()->getCode() == body_part::R_SIGLA ) {
                        $dorsal_right++;
                      }
                      elseif ( $OBPhoto->getBodyPart()->getCode() == body_part::F_SIGLA ) {
                        $tail++;
                      }
                    }
                    
                    if($dorsal_left > 0){
                      $body_part_code = body_part::L_SIGLA;
                    }elseif ($dorsal_right > 0) {
                      $body_part_code = body_part::R_SIGLA;
                    }elseif ($tail > 0) {
                      $body_part_code = body_part::F_SIGLA;
                    }else{
                      $body_part_code = $OBPhotos[0]->getBodyPart()->getCode();
                    }

                }
                else{//the individual has no photos and nothing in its dominant body part code field, so its returned dominant body part is "L"
                    return body_part::L_SIGLA;
                }
            }
            else{//all other species have "F" as dominant body part; if no photo has an "F" body part, the dominant one will be the body part of the first photo (will apply the same for species 2,4,7,10)
                  if( !$OBPhotos->isEmpty() ){//the individual has at least one photo
                    
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
                  else{//the individual has no photos and no user-set body part code, so return its dominant body part code as "F"
                      return body_part::F_SIGLA;
                  }
            }
    }//end of else (there isn't a user-set dominant body part code)

    return $body_part_code;
  }
  
} // Individual
