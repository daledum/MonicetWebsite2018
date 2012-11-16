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
  
  public function getSightings($limit = null) {
    $sightingIds = array();
    foreach($this->getObservationPhotos() as $OPhoto) {
      if( $OPhoto->getSightingId() && $OPhoto->getStatus(ObservationPhoto::V_SIGLA) ) {
        $sightingIds[] = $OPhoto->getSightingId();
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
  
  public function getLastTenObservationDates() {
    $limit = 10;
    $sightings = $this->getSightings($limit);
    $resultStr = '';
    
    foreach( $sightings as $sighting ){
      $resultStr .= $sighting->getRecord()->getGeneralInfo()->getDate(', Y-m-d');
    }
    
    if(count($sightings) == $limit ) {
      $resultStr .= ', ...';
    }
    
    return substr($resultStr, 2);
  }
} // Individual
