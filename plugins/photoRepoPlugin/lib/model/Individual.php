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
  
  public function getObservationDates($limit = null) {
    $sightings = $this->getSightings($limit);
    $resultStr = '';
    
    foreach( $sightings as $sighting ){
      $resultStr .= $sighting->getRecord()->getGeneralInfo()->getDate(', Y-m-d');
    }
    
    if( !is_null($limit) ) {
      if(count($sightings) == $limit ) {
        $resultStr .= ', ...';
      }
    }
    
    return substr($resultStr, 2);
  }
  
  public function getObservationPhotoDates($limit = null) {
    $query = ObservationPhotoQuery::create()
            ->filterByIndividualId($this->getId())
            ->orderByPhotoDate(Criteria::DESC)
            ->limit($limit);
    $OBPhotos = $query->find();
    
    $resultStr = '';
    foreach( $OBPhotos as $OBPhoto ){
      $resultStr .= $OBPhoto->getPhotoDate(', Y-m-d');
    }
    
    if( !is_null($limit) ) {
      if(count($OBPhotos) == $limit ) {
        $resultStr .= ', ...';
      }
    }
    
    return substr($resultStr, 2);
  }
  
  public function getLastTenObservationDates() {
    $limit = 10;
    return $this->getObservationDates($limit);
  }
  
  public function getLastTenObservationPhotoDates() {
    $limit = 10;
    return $this->getObservationPhotoDates($limit);
  }
  
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
  
  public function getGIDates($limit = null) {
    $gis = $this->getLastGeneralInfos($limit);
    
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
