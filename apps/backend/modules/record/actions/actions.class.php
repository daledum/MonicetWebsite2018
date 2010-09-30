<?php

require_once dirname(__FILE__).'/../lib/recordGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/recordGeneratorHelper.class.php';

/**
 * record actions.
 *
 * @package    monicet
 * @subpackage record
 * @author     Your name here
 * @version    morfose 1.4
 */
class recordActions extends autoRecordActions
{
  public function executeIndex(sfWebRequest $request) {
  	parent::executeIndex($request);
  }
	
  public function executeNew(sfWebRequest $request) {
  	
  	parent::executeNew($request);
  }

  public function executeShowRecords(sfWebRequest $request) {
  	$c = new Criteria();
    $records = RecordPeer::doSelect($c);
  }
  
  public function executeListSightings(sfWebRequest $request)
  {
    $this->redirect('sighting');
  }

  public function executeLine(sfWebRequest $request)
  {
    //$user = sfContext::getInstance()->getUser()->getGuardUser();
    //$company = CompanyPeer::doSelectUserCompany($user->getId());
    $this->general_info_form = new GeneralInfoForm();
    $this->record_form = new RecordForm();
    $this->sighting_form = new SightingForm();
    $this->n_lines = $request->getParameter('n_lines') + 1;
  }

  public function executeLineSubmit(sfWebRequest $request) {
    $number_of_rows = $request->getParameter('number_of_rows');
    $general_info_id = $request->getParameter('general_info_id');
    $date = $request->getParameter('date');
    $vessel_id = VesselPeer::retrieveByPK($request->getParameter('vessel_id'));
    $guide_id = GuidePeer::retrieveByPK($request->getParameter('guide_id'));
    $code_id = CodePeer::retrieveByPK($request->getParameter('code_id'));
    $time = $request->getParameter('time');
    $latitude = $request->getParameter('latitude');
    $longitude = $request->getParameter('longitude');
    $sea_state_id = SeaStatePeer::retrieveByPK($request->getParameter('sea_state_id'));
    $visibility_id = VisibilityPeer::retrieveByPK($request->getParameter('visibility_id'));
    $specie_id = SpeciePeer::retrieveByPK($request->getParameter('specie_id'));
    $total = $request->getParameter('total');
    $adults = $request->getParameter('adults');
    $juveniles = $request->getParameter('juveniles');
    $cubs = $request->getParameter('cubs');
    $behaviour_id = BehaviourPeer::retrieveByPK($request->getParameter('behaviour_id'));
    $association_id = AssociationPeer::retrieveByPK($request->getParameter('association_id'));
    $num_vessels = $request->getParameter('num_vessels');
    $comments = $request->getParameter('comments');

    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());
    
    //if ($general_info_id == "") {
    $general_info_form = new GeneralInfoForm();
   	$general_info_form->bind($request->getParameter('general_info'));
   	
   	echo "###";
  	
    $this->form = $general_info_form;
   	
   	if ($general_info_form->isValid())
    {
    	echo "---1";
        $general_info_form->save();
    }
    else {
    	echo "---2";
    }
//    	$general_info->setVessel($vessel);
//    	$general_info->setSkipper($skipper);
//    	$general_info->setGuide($guide);
//        $general_info->setCompany($company);
//    	$general_info->setDate($date);
//    	$general_info->save()
    

    
  	/*
    $this->form = new mfAulaSemDataHoraForm($this->mfAula);
    $this->form->bind($request->getParameter('mf_aula'));
    if ($this->form->isValid())
    {
      $mfAula = $this->form->save();
      $utilizador = sfContext::getInstance()->getUser()->getGuardUser();
      $historicoStr = sprintf("Sumário alterado por %s em %s\n%s", $utilizador->getNomeCompleto(), date('Y-m-d H:i'), $mfAula->getHistorico());
      $mfAula->setHistorico($historicoStr);
      $mfAula->save();
      $dados_do_form = $request->getParameter('mf_aula');
      //echo $dados_do_form['sumario'];
      $mfAula->updateFaltasAlunos( (isset($dados_do_form['mf_falta_list']))? $dados_do_form['mf_falta_list']: array());
      $this->successfull = true;
    }
    $this->setTemplate('editarSumario');
    */
  }
  
  public function executeHelp(sfWebRequest $request)
  {
  	$c = new Criteria();
  	$this->sea_states = SeaStatePeer::doSelect($c);
  	$this->codes = CodePeer::doSelect($c);
  	$this->visibilities = VisibilityPeer::doSelect($c);
  	$this->behaviours = BehaviourPeer::doSelect($c);
  	$this->associations = AssociationPeer::doSelect($c);
  	
  	$this->turtles = SpeciePeer::doSelect($c->add(SpeciePeer::SPECIE_GROUP_ID, 1));
  	$this->odontocetis = SpeciePeer::doSelect($c->add(SpeciePeer::SPECIE_GROUP_ID, 2));
  	$this->mysticetis = SpeciePeer::doSelect($c->add(SpeciePeer::SPECIE_GROUP_ID, 3));
  }
}
