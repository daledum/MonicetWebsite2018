<?php


/**
 * Skeleton subclass for performing query and update operations on the 'sighting' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Fri Dec 18 17:25:56 2009
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class SightingPeer extends BaseSightingPeer {
  
  public static function getBySpecie($specie_id){
    $c = new Criteria();
    $c->add(SightingPeer::SPECIE_ID, $specie_id, Criteria::EQUAL);
    $c->addAscendingOrderByColumn(SightingPeer::ID);
    return SightingPeer::doSelect($c);
  }
  
  public static function retrieveByRecordId($id){
    $c = new Criteria();
    $c->add(SightingPeer::RECORD_ID, $id, Criteria::EQUAL);
    return SightingPeer::doSelectOne($c);
  } 
  
  public static function getForMap($request){
    $c = new Criteria();
    $c->add(SightingPeer::SPECIE_ID, $request->getParameter('specie_id'), Criteria::EQUAL);
    $c->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, Criteria::JOIN);
    $c->addJoin(RecordPeer::GENERAL_INFO_ID, GeneralInfoPeer::ID, Criteria::JOIN);
    
    if($request->getParameter('company_id') || $request->getParameter('sea_state_id') || $request->getParameter('visibility_id')){
      
      if($request->getParameter('company_id')){
        $c->addAnd(GeneralInfoPeer::COMPANY_ID, $request->getParameter('company_id'));
      }
      if($request->getParameter('sea_state_id')){
        $c->addAnd(RecordPeer::SEA_STATE_ID, $request->getParameter('sea_state_id'));
      }
      if($request->getParameter('visibility_id')){
        $c->addAnd(RecordPeer::VISIBILITY_ID, $request->getParameter('visibility_id'));
      }
    }
    
    if($request->getParameter('association_id')){
      $c->addAnd(SightingPeer::ASSOCIATION_ID, $request->getParameter('association_id'));
    }
    
    if($request->getParameter('behaviour_id')){
      $c->addAnd(SightingPeer::BEHAVIOUR_ID, $request->getParameter('behaviour_id'));
    }
    
    if($request->getParameter('environment')){
      if(strcmp($request->getParameter('environment'),'frontend') == 0){
        $c->addAnd(GeneralInfoPeer::VALID, 1, Criteria::LIKE);
      }
    }
    
    
    $c->addAscendingOrderByColumn(SightingPeer::ID);
    return SightingPeer::doSelect($c);
    
  }
  
  
  
  public static function getFromInterval($date1, $date2){
    $c = new Criteria();
    $c->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, Criteria::JOIN);
    $c->addJoin(RecordPeer::GENERAL_INFO_ID, GeneralInfoPeer::ID, Criteria::JOIN);
    $c->add(SightingPeer::SPECIE_ID, null, Criteria::ISNOTNULL);
    $c->addAnd(GeneralInfoPeer::DATE, $date1, Criteria::GREATER_EQUAL);
    $c->addAnd(GeneralInfoPeer::DATE, $date2, Criteria::LESS_EQUAL);
    return SightingPeer::doSelect($c);
  }
  
  
} // SightingPeer
