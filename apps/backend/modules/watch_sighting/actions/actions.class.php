<?php

require_once dirname(__FILE__).'/../lib/watch_sightingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/watch_sightingGeneratorHelper.class.php';

/**
 * watch_sighting actions.
 *
 * @package    monicet
 * @subpackage watch_sighting
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class watch_sightingActions extends autoWatch_sightingActions
{
	public function executeSaveRecord(sfWebRequest $request) {
	     executeLineSubmit($request); 
	}
	
	public function executeLine(sfWebRequest $request)
	{
	    $this->watch_info_form = new WatchInfoForm();
	    $this->sighting_form = new WatchSightingForm();
	    $this->n_lines = $request->getParameter('n_lines') + 1;
	}
	
	public function executeLineAjax(sfWebRequest $request){
	    $this->valor = $request->getParameter('valor');
	    $this->linha = $request->getParameter('n_lines');
	    $this->selected = $request->getParameter('selected');
	    $this->valores = array();
	    if($this->valor != 2){
	        $this->valores = array('2' => 'F', '3' => 'R', '4' => 'RA');
	    }
	}
	
	public function executeGuardarLinha(sfWebRequest $request){
	    $this->last_sighting = false;
		$success = true;
	    
	    $watch_info = $this->request->getParameter('watch_info_id');
	    $this->watch_sighting = $request->getParameter('watch_sighting');
	    $code = $this->watch_sighting['watch_code_id'];
		$time = $this->watch_sighting['time'];
	    $visibility = $this->watch_sighting['watch_visibility_id'];
		$specie = $this->watch_sighting['specie_id'];
		$group = $this->watch_sighting['group'];
		$total = $this->watch_sighting['total'];
		$behaviour = $this->watch_sighting['behaviour_id'];
		$direction = $this->watch_sighting['direction_id'];
		$horizontal = $this->watch_sighting['horizontal'];
		$vertical = $this->watch_sighting['vertical'];
	    $vessel = $this->watch_sighting['vessel_id'];
		$comments = $this->watch_sighting['comments'];
	    $csrfR = $this->watch_sighting['_csrf_token'];
		$this->last_sighting = ($this->watch_sighting['watch_code_id'] == 2);
	    
	    $this->linha = $request->getParameter('linha');
	    
	    $this->watch_sighting_form = new WatchSightingForm();
	    $this->watch_sighting_form->bind(array_merge($this->watch_sighting,array('watch_info_id' => $watch_info)));
	    
	    if($this->watch_sighting_form->isValid()){
	        $this->erro = false;
	      
	        if(! $this->sighting = WatchSightingPeer::retrieveByPk($request->getParameter('watch_sighting_id'))){
	            $this->sighting = new WatchSighting();
	        }
			$this->sighting->setWatchInfoId($watch_info);
	        $this->sighting->setWatchCodeId($code);
	        $this->sighting->setTime($time);
	        $this->sighting->setWatchVisibilityId($visibility);
			$this->sighting->setSpecieId($specie);
			$this->sighting->setGroup($group);
			$this->sighting->setTotal($total);
			$this->sighting->setBehaviourId($behaviour);
			$this->sighting->setDirectionId($direction);
			$this->sighting->setHorizontal($horizontal);
			$this->sighting->setVertical($vertical);
			$this->sighting->setVesselId($vessel);
			$this->sighting->setComments($comments);
	        $wi = WatchInfoPeer::retrieveByPk($watch_info);
	        $this->sighting->save();
	      	
	    }else{
	        $this->erro = true;
	        $success = false;
	    }
	    
	    if($success && $this->last_sighting){
	      
	        WatchSightingPeer::deleteIgnoredSightings($this->sighting->getId(), $watch_info);
	      	
	        $wi = WatchInfoPeer::retrieveByPk($watch_info);
	      	
	        $c = $wi->getComments();
	        $wi->setComments($c.' ');
	        $wi->save();
	        $wi->setComments($c);
	        $wi->save();
	      	
	    }
	    
	    
	}

    public function executeHelp(sfWebRequest $request)
    {
        $c = new Criteria();
        $this->codes = WatchCodePeer::doSelect($c);
        $this->visibilities = WatchVisibilityPeer::doSelect($c);
        $this->behaviours = BehaviourPeer::doSelect($c);
        
        $this->turtles = SpeciePeer::doSelect($c->add(SpeciePeer::SPECIE_GROUP_ID, 1));
        $this->odontocetis = SpeciePeer::doSelect($c->add(SpeciePeer::SPECIE_GROUP_ID, 2));
        $this->mysticetis = SpeciePeer::doSelect($c->add(SpeciePeer::SPECIE_GROUP_ID, 3));
    }
	
	
}
