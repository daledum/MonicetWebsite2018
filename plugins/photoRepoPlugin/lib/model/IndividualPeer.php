<?php

class IndividualPeer extends BaseIndividualPeer {
  public static function getFirstAvailableName($observationPhoto){
    $year = date('y');
    $specieCode = $observationPhoto->getSpecie()->getCode();
    
    $initialPosition = $position = 1;
    $lastIndividual = IndividualQuery::create()->filterByName(sprintf("DBUAC-%s-%s%%", strtoupper($specieCode), $year), Criteria::LIKE)->orderByName('desc')->findOne();
    if( $lastIndividual ) {
      $finalPosition = substr($lastIndividual->getName(), -3);
      for( $i = $initialPosition; $i <= $finalPosition+1; $i++ ) {
        $lastIndividual = IndividualQuery::create()->filterByName(sprintf("DBUAC-%s-%s%s", strtoupper($specieCode), $year, $i), Criteria::LIKE)->orderByName('desc')->findOne();
        if( !$lastIndividual ) {
          return sprintf("DBUAC-%s-%s%s", strtoupper($specieCode), $year, sprintf("%03d",$i));
        }
      }
    }
    
    return sprintf("DBUAC-%s-%s%s", strtoupper($specieCode), $year, sprintf("%03d",$position));
  }
} // IndividualPeer
