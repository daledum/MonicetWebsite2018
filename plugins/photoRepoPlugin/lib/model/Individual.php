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
  
} // Individual
