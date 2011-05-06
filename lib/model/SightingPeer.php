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
  
  public static function getBasicCriteriaWithFilters() {
    $c = new Criteria();
    $c->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, Criteria::JOIN);
    $c->addJoin(RecordPeer::GENERAL_INFO_ID, GeneralInfoPeer::ID, Criteria::JOIN);
    $c->addAnd(RecordPeer::CODE_ID, array(3, 6), Criteria::IN);
    $c->addAnd(SightingPeer::SPECIE_ID, null, Criteria::ISNOTNULL);
    $c->addAnd(SightingPeer::SPECIE_ID, 0, Criteria::NOT_EQUAL);
    return $c;  
  }
  
  public static function getCriteriaWithFilters($request) {
    $c = SightingPeer::getBasicCriteriaWithFilters();

    if($request->getParameter('company_id'))
    {
      $c->addAnd(GeneralInfoPeer::COMPANY_ID, $request->getParameter('company_id'));
    }
    if($request->getParameter('sea_state_id'))
    {
      $c->addAnd(RecordPeer::SEA_STATE_ID, $request->getParameter('sea_state_id'));
    }
    
    if($request->getParameter('visibility_id'))
    {
      $c->addAnd(RecordPeer::VISIBILITY_ID, $request->getParameter('visibility_id'));
    }
    
    if($request->getParameter('association_id'))
    {
      $c->addAnd(SightingPeer::ASSOCIATION_ID, $request->getParameter('association_id'));
    }
    
    if($request->getParameter('behaviour_id'))
    {
      $c->addAnd(SightingPeer::BEHAVIOUR_ID, $request->getParameter('behaviour_id'));
    }
    
    if($request->getParameter('environment'))
    {
      if(strcmp($request->getParameter('environment'),'frontend') == 0) 
      {
        $c->addAnd(GeneralInfoPeer::VALID, 1, Criteria::LIKE);
      }
    }
    
    $c->addAscendingOrderByColumn(SightingPeer::ID);
    
    return $c;
  }
  
  public static function getForMap($request) 
  {
    $date1 = $request->getParameter('year')."-";
    $date2 = $request->getParameter('year')."-";  
    if ($request->getParameter('month')) {
        $date1 .= $request->getParameter('month')."-1";
        $date2 .= $request->getParameter('month')."-" . idate('d', mktime(0, 0, 0, ($request->getParameter('month') + 1), 0, $request->getParameter('year'))); 
    } else {
        $date1 .= "1-1";
        $date2 .= "12-31";
    }
    
    $c = SightingPeer::getCriteriaWithFilters($request);
    $c->addAnd(SightingPeer::SPECIE_ID, $request->getParameter('specie_id'), Criteria::EQUAL);
    $c->addAnd(GeneralInfoPeer::DATE, $date1, Criteria::GREATER_EQUAL);
    $c->addAnd(GeneralInfoPeer::DATE, $date2, Criteria::LESS_EQUAL);
    return SightingPeer::doSelect($c);
  }
  
  public static function getForAPUETotals($request) 
  {
    $c = SightingPeer::getCriteriaWithFilters($request);
    return SightingPeer::doSelect($c);
  }
  
  public static function getChartsCriteria($type, $year, $month) {
    $date1 = $year."-";
    $date2 = $year."-";  
    if (($type == 1) && $month) {
        $date1 .= $month."-1";
        $date2 .= $month."-" . idate('d', mktime(0, 0, 0, ($month + 1), 0, $year)); 
    } else {
        $date1 .= "1-1";
        $date2 .= "12-31";
    }
    $c = SightingPeer::getBasicCriteriaWithFilters();
    $c->addAnd(GeneralInfoPeer::VALID, true, Criteria::EQUAL);
    $c->addAnd(GeneralInfoPeer::DATE, $date1, Criteria::GREATER_EQUAL);
    $c->addAnd(GeneralInfoPeer::DATE, $date2, Criteria::LESS_EQUAL);
    return $c;
  }
  
  public static function getAPUETotals($year, $month) {
    $c = SightingPeer::getChartsCriteria(1, $year, $month);
    $c->addGroupByColumn(SightingPeer::SPECIE_ID);
    $c->addSelectColumn('count(distinct '.GeneralInfoPeer::ID.') as total');
    $c->addSelectColumn(SightingPeer::SPECIE_ID);
    $c->addAscendingOrderByColumn('total');

    return BasePeer::doSelect($c);
  }

  public static function getAPUEVariations($year) {
    $c = SightingPeer::getChartsCriteria(2, $year, 0);
    $c->addGroupByColumn('month('.GeneralInfoPeer::DATE.')');
    $c->addGroupByColumn(SightingPeer::SPECIE_ID);
    $c->addSelectColumn('count(distinct '.GeneralInfoPeer::ID.') as total');
    $c->addSelectColumn('month('.GeneralInfoPeer::DATE.') as month');
    $c->addSelectColumn(SightingPeer::SPECIE_ID);

    return BasePeer::doSelect($c);
  }

} // SightingPeer
