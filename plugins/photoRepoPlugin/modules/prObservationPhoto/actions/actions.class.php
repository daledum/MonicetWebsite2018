<?php

require_once dirname(__FILE__).'/../lib/prObservationPhotoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prObservationPhotoGeneratorHelper.class.php';

class prObservationPhotoActions extends autoPrObservationPhotoActions {
  
  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    $this->filters = $this->configuration->getFilterForm($this->getFilters());
    
    $template = $request->getParameter('template', 'index');

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());
      if( $template == 'catalog' ){
        $this->redirect('@pr_observation_photo?template=catalog');
      }
      $this->redirect('@pr_observation_photo');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    if( $template == 'catalog' ){
      $this->setTemplate('catalog');
    } else {
      $this->setTemplate('index');
    }
  }
  
  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $count = 0;
    foreach (ObservationPhotoPeer::retrieveByPks($ids) as $object) {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $object)));

      $object->delete();
      if ($object->isDeleted()){
        $count++;
      }
    }

    if ($count >= count($ids)) {
      $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    } else {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items.');
    }

    $this->redirect('@pr_observation_photo');
  }
  
  public function _get_positions($querySet){
    $results = array();
    $i=1;
    foreach($querySet->find() as $OBPhoto ){
      $results[$i] = $OBPhoto->getId();
      $i++;
    }
    return $results;
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }
    
    // pager
    if ($request->getParameter('page')) {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
    
//    print_r($this->pager->getNbResults());
//    foreach ($this->pager->getResults() as $i => $result){
//      echo $result;
//    }

    $this->template = $request->getParameter('template', 'index');
    if( !in_array($this->template, array('catalog', 'index') ) ) {
      $this->template = 'index';
    }
    
    $this->setTemplate($this->template);
  }
  
  public function executeNew(sfWebRequest $request){
    $this->forward404Unless($request->getParameter('file'));
    $file_address = sfConfig::get('sf_upload_dir').'/pr_repo/'.$request->getParameter('file');
    $this->forward404Unless(file_exists( $file_address ));
      
    $this->form = $this->configuration->getForm();
    $this->ObservationPhoto = $this->form->getObject();
    $this->exif = exif_read_data($file_address, 0, true);
    
    $this->iptc = array();
    $size = getimagesize ( $file_address, $info);        
    if(is_array($info)) {    
        $this->iptc = iptcparse($info["APP13"]);
    }          
  }
  
  public function executeEdit(sfWebRequest $request) {
    $this->ObservationPhoto = $this->getRoute()->getObject();
    $file_address = sfConfig::get('sf_upload_dir').'/pr_repo_final/'.$this->ObservationPhoto->getFileName();
    $this->forward404Unless(file_exists( $file_address ));
    
    $dataQS = ObservationPhotoQuery::create(null, $this->buildCriteria());
    $positionArray = $this->_get_positions($dataQS);
    
    //print_r($positionArray);
    $position = array_search($this->ObservationPhoto->getId(), $positionArray);
    if( $position ){
      if( isset($positionArray[$position-1]) ){
        $this->prevId = $positionArray[$position-1];
      }
      if( isset($positionArray[$position+1]) ){
        $this->nextId = $positionArray[$position+1];
      }
    }

    $this->form = $this->configuration->getForm($this->ObservationPhoto);
    
    $this->exif = exif_read_data($file_address, 0, true);
    
    $this->iptc = array();
    $size = getimagesize ( $file_address, $info);        
    if(is_array($info)) {    
        $this->iptc = iptcparse($info["APP13"]);
    }
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->getParameter('file'));
    $file_address = sfConfig::get('sf_upload_dir').'/pr_repo/'.$request->getParameter('file');
    $this->forward404Unless(file_exists( $file_address ));
      
    $this->form = $this->configuration->getForm();
    $this->ObservationPhoto = $this->form->getObject();
    $this->exif = exif_read_data($file_address, 0, true);
    
    $this->iptc = array();
    $size = getimagesize ( $file_address, $info);        
    if(is_array($info)) {    
        $this->iptc = iptcparse($info["APP13"]);
    }

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  
  public function executeUpdate(sfWebRequest $request) {
    $this->ObservationPhoto = $this->getRoute()->getObject();
    $file_address = sfConfig::get('sf_upload_dir').'/pr_repo_final/'.$this->ObservationPhoto->getFileName();
    $this->forward404Unless(file_exists( $file_address ));
    $this->form = $this->configuration->getForm($this->ObservationPhoto);

    $this->exif = exif_read_data($file_address, 0, true);
    
    $this->iptc = array();
    $size = getimagesize ( $file_address, $info);        
    if(is_array($info)) {    
        $this->iptc = iptcparse($info["APP13"]);
    }
    
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
    
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $isNew = $form->getObject()->isNew();
      $notice = $isNew ? 'The item was created successfully.' : 'The item was updated successfully.';
      if( $form->getObject()->isNew() ) {
        $fileAddress =  sfConfig::get('sf_upload_dir').'/pr_repo/'.$request->getParameter('file');
        $dateUpload = date("Y-m-d H:i:s", filemtime( $fileAddress));
        system('mv '.$fileAddress.' '.sfConfig::get('sf_upload_dir').'/pr_repo_final' );
      } 

      $ObservationPhoto = $form->save();
      if( $isNew ){
        $ObservationPhoto->setStatus(ObservationPhoto::NEW_SIGLA);
      } else {
        if( in_array($ObservationPhoto->getStatus(), array(ObservationPhoto::V_SIGLA) ) ) {
          $ObservationPhoto->setStatus(ObservationPhoto::FA_SIGLA);
          $ObservationPhoto->save();
        }
      }
      
      if(isset($fileAddress)) {
        $ObservationPhoto->setUploadedAt($dateUpload);
      }
      
      $sf_user = SfContext::getInstance()->getUser();
      $ObservationPhoto->setLastEditedBy($sf_user->getGuardUser()->getId());
      $ObservationPhoto->save();
      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhoto)));

      $this->getUser()->setFlash('notice', $notice);
//      if( $isNew ) {
//          $this->redirect(array('sf_route' => 'pr_pendent_photos_list'));
//      } else {
      $this->redirect('@pr_observation_photo_edit?id='.$ObservationPhoto->getId());
//      }
    } else {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
  
  public function executeValidate( sfWebRequest $request ) {
      $this->forward404Unless($observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
      $userId = $this->getUser()->getGuardUSer()->getId();
      if( /*$userId != $observationPhoto->getLastEditedBy() &&*/ $observationPhoto->getStatus() == ObservationPhoto::FA_SIGLA ) {
          $observationPhoto->setStatus(observationPhoto::V_SIGLA);
          $observationPhoto->setValidatedBy($userId);
          $observationPhoto->save();
          $this->getUser()->setFlash('notice', 'Fotografia validada com sucesso');
      } else {
          $this->getUser()->setFlash('error', 'Não tem autoridade para validar as informações desta fotografia.');
      }
      
      $this->redirect('@pr_observation_photo_edit?id='.$observationPhoto->getId());
  }
  
  public function executeAjaxGetSightingsForCompany( sfWebRequest $request ) {
    $this->sightings = SightingPeer::getSightingsForSelect($request->getParameter('date'), $request->getParameter('company_id'), $with_empty = true, $empty_msg = '', $empty_code = '');
  }
  
  public function executeAjaxGetSighting( sfWebRequest $request ) {
    $this->forward404Unless($this->sighting = SightingPeer::retrieveByPK($request->getParameter('id')));
  }
  
  public function executeGetSightingsOnDate( sfWebRequest $request ) {
      $gis = GeneralInfoQuery::create()
              ->filterByDate($request->getParameter('date'));
      if( $request->getParameter('company_id', null) ) {
          $gis = $gis->filterByCompanyId($request->getParameter('company_id', null));
      }
      $this->gis = $gis->find();
  }
  
  public function executeCharacterize( sfWebRequest $request ) {
    //$this->tailConfiguration = new prObservationPhotoTailGeneratorConfiguration();
    
    $this->forward404Unless($this->observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
    $this->pattern = PatternQuery::create()->filterBySpecieId($this->observationPhoto->getSpecieId())->findOne();
    if($this->observationPhoto->getBodyPart()) {
     $this->isTail = $this->observationPhoto->getBodyPart()->getCode() == body_part::F_SIGLA;
     if( $this->isTail ) {
       $this->observationPhotoTail = ObservationPhotoTailPeer::get_or_create($photoId = $this->observationPhoto->getId());
       $this->tailForm = new ObservationPhotoTailForm($this->observationPhotoTail);
     }
     
     $this->isLeft = $this->observationPhoto->getBodyPart()->getCode() == body_part::L_SIGLA;
     if( $this->isLeft ) {
       $this->observationPhotoDorsalLeft = ObservationPhotoDorsalLeftPeer::get_or_create($photoId = $this->observationPhoto->getId());
       $this->dorsalLeftForm = new ObservationPhotoDorsalLeftForm($this->observationPhotoDorsalLeft);
     }
     
     $this->isRight = $this->observationPhoto->getBodyPart()->getCode() == body_part::R_SIGLA;
     if( $this->isRight ) {
       $this->observationPhotoDorsalRight = ObservationPhotoDorsalRightPeer::get_or_create($photoId = $this->observationPhoto->getId());
       $this->dorsalRightForm = new ObservationPhotoDorsalRightForm($this->observationPhotoDorsalRight);
     }
      
    } else {
      $this->isTail = $this->isLeft = $this->isRight = false;
      $this->tailForm = $this->dorsalLeftForm = $this->dorsalRightForm = false;
    }
  }
  
  public function executeIdentify( sfWebRequest $request ) {
    
    $this->identify_form = new identifyForm();
    
    $this->forward404Unless($this->observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
    
    $this->isTail = $this->observationPhoto->getBodyPart()->getCode() == body_part::F_SIGLA;
    $this->isLeft = $this->observationPhoto->getBodyPart()->getCode() == body_part::L_SIGLA;
    $this->isRight = $this->observationPhoto->getBodyPart()->getCode() == body_part::R_SIGLA;
  }
  
  public function executeAjaxGetPossibleMatches( sfWebRequest $request ){
    
    $args = $request->getParameter('identify_form');
    //print_r($args);
    $this->forward404Unless($this->observationPhoto = ObservationPhotoPeer::retrieveByPK($args['observation_photo_id']));
    
    $this->OBPhotos = ObservationPhotoQuery::getPossibleMatches($this->observationPhoto, $args['choices']);
//    $priorityResults['priority_6'] = ObservationPhotoQuery::getPossibleMatches($this->observationPhoto, $sameBodyPart=false, $partial=null, $complete=null, $best=null);
//    
//    $this->priorityResults = $priorityResults;
  }
  
  public function executeShow( sfWebRequest $request ) {
    $this->forward404Unless($this->observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
    
    $file_address = sfConfig::get('sf_upload_dir').'/pr_repo_final/'.$this->observationPhoto->getFileName();
    $this->forward404Unless(file_exists( $file_address ));
    
    $this->exif = exif_read_data($file_address, 0, true);
    
    $this->iptc = array();
    $size = getimagesize ( $file_address, $info);        
    if(is_array($info)) {    
        $this->iptc = iptcparse($info["APP13"]);
    }
    
    $this->pattern = PatternQuery::create()->filterBySpecieId($this->observationPhoto->getSpecieId())->findOne();
    $this->patternImage = false;
    $this->relatedMarks = array();
    $photoId = $this->observationPhoto->getId();
    $bodyPart = $this->observationPhoto->getBodyPart();
    $allowedBodyParts = array(body_part::F_SIGLA, body_part::L_SIGLA, body_part::R_SIGLA);
    if($bodyPart && in_array($bodyPart, $allowedBodyParts)) {
      $this->isTail = $this->observationPhoto->getBodyPart()->getCode() == body_part::F_SIGLA;
      if( $this->isTail && $this->pattern ) {
        $this->patternImage = $this->pattern->getImageTail();
        $this->observationPhotoPart = ObservationPhotoTailPeer::get_or_create($photoId);
        $this->relatedMarks = $this->observationPhotoPart->getObservationPhotoTailMarks();
      }

      $this->isLeft = $this->observationPhoto->getBodyPart()->getCode() == body_part::L_SIGLA;
      if( $this->isLeft && $this->pattern ) {
        $this->patternImage = $this->pattern->getImageDorsalLeft();
        $this->observationPhotoPart = ObservationPhotoDorsalLeftPeer::get_or_create($photoId);
        $this->relatedMarks = $this->observationPhotoPart->getObservationPhotoDorsalLeftMarks();
      }

      $this->isRight = $this->observationPhoto->getBodyPart()->getCode() == body_part::R_SIGLA;
      if( $this->isRight && $this->pattern ) {
        $this->patternImage = $this->pattern->getImageDorsalRight();
        $this->observationPhotoPart = ObservationPhotoDorsalRightPeer::get_or_create($photoId);
        $this->relatedMarks = $this->observationPhotoPart->getObservationPhotoDorsalRightMarks();
      }

    } else {
     $this->isTail = $this->isLeft = $this->isRight = false;
     $this->pattern = NULL;
     //$this->tailForm = $this->dorsalLeftForm = $this->dorsalRightForm = false;
    }
  }
  
  
  protected function buildCriteria()
  {
    if (null === $this->filters) {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $criteria = $this->filters->buildCriteria($this->getFilters());
    $request = sfContext::getInstance()->getRequest();
    $template = $request->getParameter('template', 'index');
    $clean = ($request->getParameter('do', null) == 'clean')? true: false;
    if( $clean ) {
      $criteria = new Criteria();
      $this->getUser()->setAttribute('prObservationPhoto.filters', array(), 'admin_module');
    }
    if( $template == 'catalog' ){
      $criteria->add(ObservationPhotoPeer::STATUS, ObservationPhoto::V_SIGLA);
    } else {
      $c = $criteria->getNewCriterion(ObservationPhotoPeer::STATUS, ObservationPhoto::V_SIGLA, Criteria::NOT_EQUAL);
      $criteria->addAnd($c);
    }

    $this->addSortCriteria($criteria);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $criteria);
    $criteria = $event->getReturnValue();

    return $criteria;
  }
  
  public function executeCatalog(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page')) {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager($catalog=true);
    $this->sort = $this->getSort();
  }
  
  public function executeNewIndividualByPhoto( sfWebRequest $request ) {
    $this->forward404Unless($observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
    $individual = new Individual();
    $individual->setName(IndividualPeer::getFirstAvailableName($observationPhoto));
    $individual->setSpecie($observationPhoto->getSpecie());
    $individual->save();
    
    $sf_user = SfContext::getInstance()->getUser();
    $observationPhoto->setLastEditedBy($sf_user->getGuardUser()->getId());
    $observationPhoto->setIndividual($individual);
    $observationPhoto->setStatus(ObservationPhoto::FA_SIGLA);
    $observationPhoto->setIsBest(true);
    $observationPhoto->save();
    $this->redirect('@pr_individual_show?id='.$individual->getId());
  }
  
  public function executeAssociateIndividualByPhoto( sfWebRequest $request ) {
    $this->forward404Unless($observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
    $this->forward404Unless($individual = IndividualPeer::retrieveByPK($request->getParameter('individual_id')));
    $this->forward404Unless($observationPhoto->getSpecieId() == $individual->getSpecieId());
    
    $sf_user = SfContext::getInstance()->getUser();
    $observationPhoto->setLastEditedBy($sf_user->getGuardUser()->getId());
    $observationPhoto->setIndividual($individual);
    $observationPhoto->setStatus(ObservationPhoto::FA_SIGLA);
    $observationPhoto->save();
    $this->redirect('@pr_individual_edit?id='.$individual->getId());
  }
  
  public function executeDefineAsBest( sfWebRequest $request ) {
    $this->forward404Unless($observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
    $this->forward404Unless($observationPhoto->getIndividualId());
    
    $relatedPhotos = $observationPhoto->getIndividual()->getObservationPhotos();
    foreach( $relatedPhotos as $relatedPhoto ) {
      $relatedPhoto->setIsBest(false);
      $relatedPhoto->save();
    }
    $observationPhoto->setIsBest(true);
    $observationPhoto->save();
    $this->redirect('@pr_individual_show?id='.$observationPhoto->getIndividualId());
  }
  
  public function executeAjaxFilterSightings( sfWebRequest $request ) {
    $this->OBPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id'));
    $ob_date = $request->getParameter('ob_date', null);
    $specieId = $request->getParameter('specie_id', null);
    $companyId = $request->getParameter('company_id', null);
    $vesselId = $request->getParameter('vessel_id', null);
    $sightings = SightingPeer::getSightingsForSelectAjax($ob_date, $specieId, $companyId, $vesselId);
    $this->sightings = $sightings;
  }
}