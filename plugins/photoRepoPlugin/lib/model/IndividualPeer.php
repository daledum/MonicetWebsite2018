<?php

class IndividualPeer extends BaseIndividualPeer {
  public static function retrieveByName($name){
    $query = IndividualQuery::create()->filterByName($name);
    return $query->findOne(); 
  }


  public static function getFirstAvailableName($observationPhoto){
    $year = $observationPhoto->getPhotoDate('y');
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
  
  public static function filter($args) {
    $request = sfContext::getInstance()->getRequest();
    
    $query = IndividualQuery::create();
    
    if( isset( $args['specie_id'] ) && $args['specie_id'] != '' ) {
      $query = $query->filterBySpecieId($args['specie_id']);
    }
      
    $query = $query->useObservationPhotoQuery();
      
      $query = $query->filterByStatus('validated');
      
      //var_dump($args);
      if( isset( $args['island'] ) && $args['island'] != '' ) {
        $query = $query->filterByIsland($args['island']);
      }
      
      if( isset( $args['photographer_id'] ) && $args['photographer_id'] != '' ) {
        $query = $query->filterByPhotographerId($args['photographer_id']);
      }
      
      if( isset( $args['company_id'] ) && $args['company_id'] != '' ) {
        $query = $query->filterByCompanyId($args['company_id']);
      }
      
      if( (isset( $args['photo_date']['from'] ) && $args['photo_date']['from'] != '' ) || (isset( $args['photo_date']['to'] ) && $args['photo_date']['to'] != '' ))  {
        $query = $query->useSightingQuery()->useRecordQuery()->useGeneralInfoQuery();
          if( isset( $args['photo_date']['from'] ) && $args['photo_date']['from'] != '' ) {
            $query = $query->filterByDate($args['photo_date']['from'], Criteria::GREATER_EQUAL);
          }
        $query = $query->endUse()->endUse()->endUse();
      }
      
    $query = $query->endUse();
    
    $query = $query->orderByName(Criteria::DESC);
    
    //$query = $query->orderByCreatedAt(Criteria::DESC);
    
    $query = $query->setDistinct();
    
    return $query->paginate($request->getParameter('page', 1), 16);
  }
} // IndividualPeer
