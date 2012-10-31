<?php

class IndividualPeer extends BaseIndividualPeer {
  public static function getFirstAvailableName($observationPhoto){
    $year = date('y');
    $specieCode = $observationPhoto->getSpecie()->getCode();
    
    $initialPosition = $position = $lastPosition = 1;
    $lastIndividual = IndividualQuery::create()->filterByName(sprintf("DBUAC-%s-%s%%", strtoupper($specieCode), $year), Criteria::LIKE)->orderByName('desc')->findOne();
    if( $lastIndividual ) {
      $finalPosition = substr($lastIndividual->getName(), -3);
    }
    for( $position = $initialPosition; $position <= $finalPosition+1; $position++ ) {
      $individual = IndividualQuery::create()->filterByName(sprintf("DBUAC-%s-%s%s", strtoupper($specieCode), $year, sprintf("%03d",$position)))->orderByName('desc')->findOne();
      if( !$individual ) {
        return sprintf("DBUAC-%s-%s%s", strtoupper($specieCode), $year, sprintf("%03d",$position));
      }
    }
    
    return sprintf("DBUAC-%s-%s%s", strtoupper($specieCode), $year, sprintf("%03d",$position));
  }
} // IndividualPeer
