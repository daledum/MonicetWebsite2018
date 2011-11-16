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
	
  public function executeSaveRecord(sfWebRequest $request) {
     executeLineSubmit($request); 
  }
  public function executeNew(sfWebRequest $request) {
  	
  	parent::executeNew($request);
  }
  
    public function executeTest(sfWebRequest $request) {
$this->getUser()->setFlash('notice', 'No job to delete.');

    $this->redirect('index');
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
    $this->latitude = $request->getParameter('latitude');
    $this->longitude = $request->getParameter('longitude');
  }

  /*
  We have to fill in the Record Form and the Sighting Form.
  */
  public function executeLineSubmit(sfWebRequest $request) {
  /*
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $Record = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $Record)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@general_info_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);
        $this->redirect('general_info');
        //$this->redirect('general_info/sheet?giid=' . $Record->getId());
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
    */
    
    $code = CodePeer::retrieveByPK($request->getParameter('code_id'));
    $visibility = VisibilityPeer::retrieveByPK($request->getParameter('visibility_id'));
    $sea_state = SeaStatePeer::retrieveByPK($request->getParameter('sea_state_id'));
    $general_info = GeneralInfoPeer::retrieveByPK($request->getParameter('general_info_id'));
    $time = $request->getParameter('time');
    $latitude = $request->getParameter('latitude');
    $longitude = $request->getParameter('longitude');
    $num_vessels = $request->getParameter('num_vessels');

    $form = new RecordForm();
   	$form->bind($request->getParameter('record'));
   	$form->setCodeId($code);
   	$form->setVisibility($visibility);
   	$form->setSeaState($sea_state);
   	$form->setGeneralInfo($general_info);
   	$form->setTime($time);
   	$form->setLatitude($latitude);
   	$form->setLongitude($longitude);
   	$form->setNumVessels($num_vessels);
   	
    if ($form->isValid())
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $Record = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $Record)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@general_info_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);
        $this->redirect('general_info');
        //$this->redirect('general_info/sheet?giid=' . $Record->getId());
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
    /*
    $number_of_rows = $request->getParameter('number_of_rows');
    $date = $request->getParameter('date');
    $vessel_id = VesselPeer::retrieveByPK($request->getParameter('vessel_id'));
    $guide_id = GuidePeer::retrieveByPK($request->getParameter('guide_id'));
    $specie_id = SpeciePeer::retrieveByPK($request->getParameter('specie_id'));
    $total = $request->getParameter('total');
    $adults = $request->getParameter('adults');
    $juveniles = $request->getParameter('juveniles');
    $calves = $request->getParameter('calves');
    $behaviour_id = BehaviourPeer::retrieveByPK($request->getParameter('behaviour_id'));
    $association_id = AssociationPeer::retrieveByPK($request->getParameter('association_id'));
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
    */

    
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

  public function executeGuardarLinha(sfWebRequest $request){
    $this->last_record = false;
    
    $this->registo = $request->getParameter('record');
    $code = $this->registo['code_id'];
    $visibility = $this->registo['visibility_id'];
    $sea_state = $this->registo['sea_state_id'];
    $general_info = $this->request->getParameter('general_info_id');
    $time = $this->registo['time'];
    $latitude = mfUtils::convertLatLong($this->registo['latitude']);
    $longitude = mfUtils::convertLatLong($this->registo['longitude']);
    $num_vessels = $this->registo['num_vessels'];
    $csrfR = $this->registo['_csrf_token'];
    
    $this->sight = $request->getParameter('sighting');
    $specie = $this->sight['specie_id'];
    $total = $this->sight['total'];
    $adults = $this->sight['adults'];
    $juveniles = $this->sight['juveniles'];
    $calves = $this->sight['calves'];
    $behaviour = $this->sight['behaviour_id'];
    $association = $this->sight['association_id'];
    $comments = $this->sight['comments'];
    $csrfS = $this->sight['_csrf_token'];
    
    $this->linha = $request->getParameter('linha');
    
    
    
    
    
    
    $this->recordForm = new RecordForm();
    $this->recordForm->bind(array_merge($this->registo,array('general_info_id' => $general_info)));
    
    $this->sightingForm = new SightingForm();
    //$this->sightingForm->bind(array_merge($this->sight,array('record_id' => $this->linha)));
    
    if($this->recordForm->isValid()){
      $this->erro = false;
      
      if(! $this->record = RecordPeer::retrieveByPk($request->getParameter('record_id'))){
        $this->record = new Record();
      }
      $this->record->setCodeId($code);
      $this->record->setVisibilityId($visibility);
      $this->record->setSeaStateId($sea_state);
      $this->record->setGeneralInfoId($general_info);
      $this->record->setTime($time);
      $gi = GeneralInfoPeer::retrieveByPk($general_info);
      if ($latitude == $gi->getBaseLatitude() && $longitude == $gi->getBaseLongitude() && ($code == 1 || $code == 2) ) {
        $this->record->setLatitude('BASE');
        $this->record->setLongitude('BASE');
      }
      else {
        $this->record->setLatitude($latitude);
        $this->record->setLongitude($longitude);
      }
      $this->record->setNumVessels($num_vessels);
      $this->record->save();
      
      $this->sightingForm->bind(array_merge($this->sight,array('record_id' => $this->record->getId())));
      $success = False;
      
      if($this->sightingForm->isValid()){
        $this->erro = false;
        if(! $this->sighting = SightingPeer::retrieveByPk($request->getParameter('sighting_id'))){
          $this->sighting = new Sighting();
        }
        $this->sighting->setRecordId($this->record->getId());
        $this->sighting->setSpecieId($specie);
        $this->sighting->setBehaviourId($behaviour);
        $this->sighting->setAssociationId($association);
        $this->sighting->setAdults($adults);
        $this->sighting->setJuveniles($juveniles);
        $this->sighting->setCalves($calves);
        $this->sighting->setTotal($total);
        //$this->sighting->setNumberVessels($num_vessels);
        $this->sighting->setComments($comments);
        $this->sighting->save();
        $success = True;
        $this->last_record = ($this->record->getCodeId() == 2);
      }
      else{
        $this->erro = true;
      }
      
      if (! $success) {
        $this->record->delete();
      }
      
    }else{
      $this->erro = true;
      $success = false;
    }
    
    if($success && $this->last_record){
      
      RecordPeer::deleteIgnoredRecordsSightings($this->record->getId(), $general_info);
      
      $gi = GeneralInfoPeer::retrieveByPk($general_info);
      
      $c = $gi->getComments();
      $gi->setComments($c.' ');
      $gi->save();
      $gi->setComments($c);
      $gi->save();
      
    }
    
    
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
  
  public function executeLineAjax(sfWebRequest $request){
    $this->valor = $request->getParameter('valor');
    $this->linha = $request->getParameter('n_lines');
    $this->selected = $request->getParameter('selected');
    $this->valores = array();
    if($this->valor == 1){
      $this->valores = array('2' => 'F', '3' => 'IA', '5' => 'R', '6' => 'RA');
    }
    elseif($this->valor == 3){
      $this->valores = array('4' => 'FA', '6' => 'RA');
    }
    elseif($this->valor == 4){
      $this->valores = array('2' => 'F', '3' => 'IA', '5' => 'R', '6' => 'RA');
    }
    elseif($this->valor == 5){
      $this->valores = array('2' => 'F', '3' => 'IA', '5' => 'R', '6' => 'RA');
    }
    elseif($this->valor == 6){
      $this->valores = array('2' => 'F', '3' => 'IA', '4' => 'FA', '5' => 'R', '6' => 'RA');
    }
    elseif($this->linha == 1){
      $this->valores = array('1' => 'I');
    }
  }
}
