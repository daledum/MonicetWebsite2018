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
    $type = $request->getParameter('type');
    $sightings = SightingPeer::getForPeriod(
                                    $type,
                                    $request->getParameter('year'),
                                    $request->getParameter('month'),
                                    $request->getParameter('association'), 
                                    $request->getParameter('behaviour'), 
                                    $request->getParameter('sea_state'), 
                                    $request->getParameter('visibility'));
    if($type == '1') {
        $species = array();
        $data = array();
        $pos = array();
        foreach($sightings as $sighting) {
          if($sighting->getSpecieId()){
            if(array_key_exists($sighting->getSpecie()->getCode(), $data)) {
              $data[$sighting->getSpecie()->getCode()] += 1;
            } else {
              $data[$sighting->getSpecie()->getCode()] = 0;
              $species[$sighting->getSpecie()->getCode()] = $sighting->getSpecie();
            }
          }
        }
        asort($data);
        $i = 1;
        foreach($data as $c => $d) {
            if ($d == 0) {
                 unset($data[$c]); 
            } else {
                $pos[$c] = $i;
                $i += 1;
            }
        }
        $ndata = count($data);
    
        foreach($data as $c => $d) {
            $categories[] = $c;
        }
        foreach($data as $c => $d) {
            $a = array_fill(1, $ndata, 0);
            $a[$pos[$c]] = $d;
            $series[$species[$c]->formattedString()] = $a;
        }
        
    } else {
        foreach($sightings as $sighting){
          if($sighting->getSpecieId()){
            if(array_key_exists($sighting->getSpecie()->formattedString(), $series)) {
              $ex_date = explode('-', $sighting->getRecord()->getGeneralInfo()->getDate());
              $series[$sighting->getSpecie()->formattedString()][(int)$ex_date[1]] += 1;
            } else {
              $series[$sighting->getSpecie()->formattedString()] = array_fill(1, 12, 0);
            }
          }
        }
        
        foreach(range(1, 12) as $monthNumber) {
            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
        }
    }
    $this->series = $series;
    $this->categories = $categories;
  }
}
