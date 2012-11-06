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
  
  public function getSightings() {
    $sightingIds = array();
    foreach($this->getObservationPhotos() as $OPhoto) {
      if( $OPhoto->getSightingId() ) {
        $sightingIds[] = $OPhoto->getSightingId();
      }
    }
    $sightings = SightingPeer::retrieveByPKs($sightingIds);
    return $sightings;
  }
} // Individual
