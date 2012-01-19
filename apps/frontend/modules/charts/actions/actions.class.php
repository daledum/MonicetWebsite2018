<?php

/**
 * charts actions.
 *
 * @package    monicet
 * @subpackage charts
 * @author     Francisco Cardoso
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class chartsActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->active = 'charts';
    
    $this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(GeneralInfoPeer::DATE);
    $firstGI = GeneralInfoPeer::doSelectOne($c);
    $c = new Criteria();
    $c->addDescendingOrderByColumn(GeneralInfoPeer::DATE);
    $lastGI = GeneralInfoPeer::doSelectOne($c);
    
    $explodedLastDate = explode('-', $lastGI->getDate());
    $explodedFirstDate = explode('-', $firstGI->getDate());
    $this->firstYear = $explodedFirstDate[0];
    $this->lastYear = $explodedLastDate[0];
    
    $months = array();
    
    foreach(range(1, 12) as $monthNumber) {
        $months[$monthNumber] = date("F", mktime(0, 0, 0, $monthNumber, 1, 2000));
    }
    
    $this->months = $months;
  }
  
  public function executeGet_results(sfWebRequest $request)
  {
    $categories = array();
    $series = array();
//    $species = array();
//    $species_ref = array();
    $type = $request->getParameter('type');

    if($type == '1') {
        $gi_total = GeneralInfoPeer::getTotalForPeriod($type, $request->getParameter('year'), $request->getParameter('month'));
        $sightings = SightingPeer::getAPUETotals($request->getParameter('year'),
                                                 $request->getParameter('month'));
        $data = array();
        foreach ( $sightings as $sighting ) {
          $specieId = $sighting->getSpecieId();
          if( !isset($data[$specieId]) ){
            $data[$specieId]['counter'] = 1;
            $data[$specieId]['specie'] = $sighting->getSpecie()->formattedString();
            $data[$specieId]['code'] = $sighting->getSpecie()->getCode();
          } else {
            $data[$specieId]['counter'] += 1;
          }
        }
        $k=1;
        foreach($data as $specie_data) {
          //echo $k."-";
          $categories[] = $specie_data['code'];
          $a = array_fill(1, count($data), 0);
          $a[$k] = round(($specie_data['counter'] / $gi_total) * 100, 0);
          $series[$specie_data['specie']] = $a;
          $k++;
        }
//        $i = 1;
//        foreach($sightings as $s) {
//            $species[$s[1]] = $s[0];
//            $species_ref[$s[1]] = SpeciePeer::retrieveByPK($s[1]);
//        }
//        $ndata = count($species);
//        $i = 1;
//        foreach($species as $k => $v) { 
//            $pos[$k] = $i;
//            $i += 1;
//        }
//        foreach($species_ref as $v) {
//            $categories[] = $v->getCode();
//        }
//        foreach($species as $k => $v) {
//            $a = array_fill(1, $ndata, 0);
//            $a[$pos[$k]] = round(($v / $gi_total) * 100, 0);
//            $series[$species_ref[$k]->formattedString()] = $a;
//        }
    } else {
        $sightings = SightingPeer::getAPUEVariations($request->getParameter('year'));
        
        $data = array();
        foreach ( $sightings as $sighting ) {
          $month = $sighting->getRecord()->getGeneralInfo()->getDate('m');
          $specieId = $sighting->getSpecieId();
          if( !isset($data[$specieId]) ){
            $data[$specieId]['specie'] = $sighting->getSpecie()->formattedString();
            $data[$specieId]['code'] = $sighting->getSpecie()->getCode();
            $data[$specieId]['total'] = 1;
          } else {
            $data[$specieId]['total'] += 1;
          }
          if( !isset($data[$specieId][$month]) ){
            $data[$specieId][$month]['counter'] = 1;
          } else {
            $data[$specieId][$month]['counter'] += 1;
          }
        }
        
        $k=1;
        foreach($data as $specie_data) {
          $series[$specie_data['specie']] = array_fill(1, 12, 0);
          for( $i=1; $i<=12; $i++) {
            $index = sprintf("%02d", $i);
            if( isset($specie_data[$index]) ) {
              $series[$specie_data['specie']][$i] = round(($specie_data[$index]['counter'] / $specie_data['total']) * 100, 0);
            } else {
              $series[$specie_data['specie']][$i] = round((0 / $specie_data['total']) * 100, 0);
            }
          }
          $k++;
        }
        foreach(range(1, 12) as $monthNumber) {
            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
        }
        
//        foreach($sightings as $s) {
//          $species[] = array(0 => $s[0], 1 => $s[1], 2 => $s[2]);
//          $species_ref[$s[2]] = SpeciePeer::retrieveByPK($s[2]);
//          $series[$species_ref[$s[2]]->formattedString()] = array_fill(1, 12, 0);
//        }
//        foreach($species as $v) {
//            $gi_total = GeneralInfoPeer::getTotalForPeriod(2, $request->getParameter('year'), $v[1]);
//            $series[$species_ref[$v[2]]->formattedString()][$v[1]] = round(($v[0] / $gi_total) * 100, 0);
//        }
//        foreach(range(1, 12) as $monthNumber) {
//            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
//        }
    }
    $this->series = $series;
    $this->categories = $categories;
  }
}
