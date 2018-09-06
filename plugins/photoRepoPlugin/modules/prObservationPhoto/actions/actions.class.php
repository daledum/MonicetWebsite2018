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
  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $obPhoto = $this->getRoute()->getObject();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $obPhoto )));

    $status = $obPhoto->getStatus();
    
    //this is used for redirecting, for getting rid of the previous individual, setting a default best photo and clearing the dominant body part code from the individual's notes (if necessary)
    $choose_best_again = $obPhoto->haveToChooseBestPhotoAgain('ask and change');
    
    $id = $obPhoto->getIndividualId();
    
    //Deletes the 4 versions of the photo from the upload folder
    $locationBegin = sfConfig::get('sf_upload_dir').'/pr_repo_final/';
    $fileName = $obPhoto->getFileName();
    $fileAddresses = array(//Alex: deleting tiny versions, error here, x instead of _
          $locationBegin.'tn_130x120_'.$fileName,
          $locationBegin.'tn_165x150_'.$fileName,
          $locationBegin.'tn_200_'.$fileName,
          $locationBegin.$fileName
    );
    foreach( $fileAddresses as $fileAddress ) {
        if(file_exists($fileAddress) ) {
          system('rm '.$fileAddress);
        }
    }

    //Deletes the photo
    $obPhoto->delete();
    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    //redirecting
    if($choose_best_again){//photo above was best and individual is left (after deleting the photo above) with more than one photos with the same body part
       $this->redirect('@pr_individual_show?id='.$id);
    }
     else{
      if($status == ObservationPhoto::V_SIGLA){//ask if it's valid - to know where to redirect after the delete process
          $this->redirect('@pr_observation_photo?template=catalog');
      }
       else{
            $this->redirect('@pr_observation_photo');
       }
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

    
  }
  
  public function executeBatchMultiEdit( sfWebRequest $request) {
    $ids_encoded = urlencode(serialize($request->getParameter('ids')));
    $this->redirect('@pr_observation_photo_multi_edit?ids='.$ids_encoded);
  }
  
  protected function executeBatchMultiValidate(sfWebRequest $request) {
    $ids = $request->getParameter('ids');

    $count = 0;
    $error_message = "Não foi possível validar as seguintes fotografias: ";
    foreach (ObservationPhotoPeer::retrieveByPks($ids) as $object) {
      $sessionUser = sfContext::getInstance()->getUser()->getGuardUser();
      if( $object->is_validable_by($sessionUser->getId()) ){
        $object->statusUpdate('validate');
        $count++;
      } else {
        $error_message .= $object->getCode().', ';
      }
    }

    if ($count >= count($ids)) {
      $this->getUser()->setFlash('notice', 'As Fotografias de observações foram validadas com sucesso.');
    } else {
      $this->getUser()->setFlash('error', substr($error_message, 0, -2));
    }

  }
  
  public function executeMultiEdit( sfWebRequest $request ){
    //print_r($request->getParameter('ids'));
    //print_r(unserialize(urldecode($request->getParameter('ids'))));
    $this->form = new ObservationPhotoBatchUpdateForm();
  }
  
  public function executeMultiEditUpdate( sfWebRequest $request ) {
    $ids=unserialize(urldecode($request->getParameter('ids')));
    //print_r($ids);
    
    $OBPhoto = $request->getParameter('observation_photo', '');
    $island = $OBPhoto['island'];
    $company_id = $OBPhoto['company_id'];
    $photographer_id = $OBPhoto['photographer_id'];
    
    $objects = ObservationPhotoPeer::retrieveByPKs($ids);
    foreach($objects as $object){
      $changed = false;
      if(strlen($island)){
        $object->setIsland($island);
        $changed = true;
      }
      if(strlen($company_id)){
        $object->setCompanyId($company_id);
        $changed = true;
      }
      if(strlen($photographer_id)){
        $object->setPhotographerId($photographer_id);
        $changed = true;
      }
      if($changed){
        $object->save();
        $object->statusUpdate('edit');
      }
    }
    
    $this->getUser()->setFlash('notice', 'As fotografias seleccionadas foram editadas com sucesso.');
    $this->redirect('@pr_observation_photo');
//    $this->form = new ObservationPhotoBatchUpdateForm();
//    $this->setTemplate('multiEdit');
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
    $this->xmp_exif = xmp_exif::get_xmp_exif($file_address,$printout=0);
    
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

      if(!$isNew){
      $ObservationPhoto = ObservationPhotoPeer::retrieveByPK($form->getValue('id'));
      $photo_id = $ObservationPhoto->getId();
      $old_specie_id = $ObservationPhoto->getSpecieId();
      $old_body_part = $ObservationPhoto->getBodyPart();
      }
      $ObservationPhoto = $form->save();
      
      if( $isNew && !$ObservationPhoto->isCharacterizable() ){
        //sets the status to characterized, if the photo is new and non-characterizable
        $ObservationPhoto->setStatus(ObservationPhoto::C_SIGLA);
      }
      else{
            if( $isNew && $ObservationPhoto->isCharacterizable() ){
            //sets it to new if new and characterizable
            $ObservationPhoto->setStatus(ObservationPhoto::NEW_SIGLA);
            }
            else{//the photo is not new
                //firstly, un-assign individual linked to the photo if the specie was changed (keep it if the body part was changed, but force a re-characterization - see below)
                if( $old_specie_id != $ObservationPhoto->getSpecieId() && $ObservationPhoto->getIndividual() ){
                  //the photo might have been the last photo of the individual (and BEST at the same time, according to the rules for BEST)
                  //deal with that individual: delete it if this was its last photo - this will set the status to C_SIGLA + set a new BEST photo/dominant body part etc
                  $ObservationPhoto->haveToChooseBestPhotoAgain('ask and change');
                  $ObservationPhoto->setIndividual(null);
                  $ObservationPhoto->setIsBest(false);
                }
           
                //secondly, a) drop the observation_photo_dorsal_left/right, _tail and _marks table rows and b) update status, if required
                //do this only if specie and/or body part was changed - all other changes are considered minor and no further actions are taken
                if( $old_specie_id != $ObservationPhoto->getSpecieId() || $old_body_part != $ObservationPhoto->getBodyPart() ){

                      $dropRows = 1;
                      $old_patternSpecie = PatternQuery::create()->filterBySpecieId($old_specie_id)->findOne();
                      $patternSpecie = PatternQuery::create()->filterBySpecieId($ObservationPhoto->getSpecieId())->findOne();
                  
                  //the status (see status update section below) will be changed to para caracterizar, even when keeping the marks - to make sure it will be characterized properly
                  if($old_patternSpecie && $patternSpecie){//means: do this only for characterizable species (previous and current)
                      
                      //keep the rows if: 1) the unchanged body part is L... (an unchanged body part means that only the specie was changed)
                      if( $old_body_part == $ObservationPhoto->getBodyPart() && $old_body_part == body_part::L_SIGLA ){
                        //and if the specie was changed from one which had a characterizable L body part to a new one which has a characterizable L body part
                        if( strlen($old_patternSpecie->getImageDorsalLeft()) > 0 && strlen($patternSpecie->getImageDorsalLeft()) > 0 ){
                          $dropRows = 0;
                        }
                      }
                      //2) the unchanged body part is R...
                      if( $old_body_part == $ObservationPhoto->getBodyPart() && $old_body_part == body_part::R_SIGLA ){
                        //and if the specie was changed from one which had a characterizable R body part to a new one which has a characterizable R body part
                        if( strlen($old_patternSpecie->getImageDorsalRight()) > 0 && strlen($patternSpecie->getImageDorsalRight()) > 0 ){
                          $dropRows = 0;
                        }
                      }
                  }
                 
                       //drop the table rows in all other cases
                       if($dropRows){
                            //don't call get_or_create because it changes the status, disturbing the whole status change algorithm
                            if($old_body_part == body_part::L_SIGLA){
                              $c = new Criteria();
                              $c->add(ObservationPhotoDorsalLeftPeer::PHOTO_ID, $photo_id, Criteria::EQUAL);
                              $OBPhotoDorsalLeft = ObservationPhotoDorsalLeftPeer::doSelectOne($c);
                              if($OBPhotoDorsalLeft){
                              $OBPhotoDorsalLeft->delete();//this deletes the appropriate rows from the linked _marks table, as well
                              }
                            }

                            if($old_body_part == body_part::R_SIGLA){
                              $c = new Criteria();
                              $c->add(ObservationPhotoDorsalRightPeer::PHOTO_ID, $photo_id, Criteria::EQUAL);
                              $OBPhotoDorsalRight = ObservationPhotoDorsalRightPeer::doSelectOne($c);
                              if($OBPhotoDorsalRight){
                                $OBPhotoDorsalRight->delete();
                              }
                            }

                            if($old_body_part == body_part::F_SIGLA){
                              $c = new Criteria();
                              $c->add(ObservationPhotoTailPeer::PHOTO_ID, $photo_id, Criteria::EQUAL);
                              $OBPhotoTail = ObservationPhotoTailPeer::doSelectOne($c);
                              if($OBPhotoTail){
                                $OBPhotoTail->delete();
                              }
                            }
                       }

                           //update status, when the photo is not new and specie and/or body part were changed
                           //NEW_SIGLA (para caracterizar) changes to C_SIGLA, if the photo is not characterizable
                           //C_SIGLA (para identificar) changes to NEW_SIGLA, if the photo is characterizable
                           //FA_SIGLA (para validar) changes to NEW_SIGLA or to C_SIGLA, according to isCharacterizable()
                           //V_SIGLA (validated) changes to NEW_SIGLA or to C_SIGLA, according to isCharacterizable()
                           if($ObservationPhoto->isCharacterizable()){
                            if( in_array($ObservationPhoto->getStatus(), array(ObservationPhoto::C_SIGLA)) ||
                                in_array($ObservationPhoto->getStatus(), array(ObservationPhoto::FA_SIGLA)) ||
                                in_array($ObservationPhoto->getStatus(), array(ObservationPhoto::V_SIGLA)) ){

                              $ObservationPhoto->setStatus(ObservationPhoto::NEW_SIGLA);
                            }
                           }
                           else{
                                if( in_array($ObservationPhoto->getStatus(), array(ObservationPhoto::NEW_SIGLA)) ||
                                    in_array($ObservationPhoto->getStatus(), array(ObservationPhoto::FA_SIGLA)) ||
                                    in_array($ObservationPhoto->getStatus(), array(ObservationPhoto::V_SIGLA)) ){
                                    
                                    if($ObservationPhoto->getIndividual()){//it was edited and now the photo is uncharacterizable, but it kept it's individual, so no need to re-identify it
                                      $ObservationPhoto->setStatus(ObservationPhoto::FA_SIGLA);
                                    }
                                    else{
                                      $ObservationPhoto->setStatus(ObservationPhoto::C_SIGLA);
                                    }
                                }
                           }

                }//end of change of specie and/or body part condition
            
              //and finally, save photo
              $ObservationPhoto->save();
            }//end of else when the photo is not new
      }//end of else when the photo either: is not new or is characterizable or is not new and characterizable
      
      if(isset($fileAddress)) {
        $ObservationPhoto->setUploadedAt($dateUpload);
      }
      
      $sf_user = SfContext::getInstance()->getUser();
      $ObservationPhoto->setLastEditedBy($sf_user->getGuardUser()->getId());
      $ObservationPhoto->save();
      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhoto)));

      $this->getUser()->setFlash('notice', $notice);
      $this->redirect('@pr_observation_photo_edit?id='.$ObservationPhoto->getId());
    } else {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
  
  public function executeValidate( sfWebRequest $request ) {
      $this->forward404Unless($observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
      $userId = $this->getUser()->getGuardUSer()->getId();
      $individual = $observationPhoto->getIndividual();
      if($individual){//just making sure the photo was indeed linked to an individual
        if( /*$userId != $observationPhoto->getLastEditedBy() &&*/ $observationPhoto->getStatus() == ObservationPhoto::FA_SIGLA ) {
          $observationPhoto->setStatus(observationPhoto::V_SIGLA);
          $observationPhoto->setValidatedBy($userId);
          $observationPhoto->save();
          $this->getUser()->setFlash('notice', 'Fotografia validada com sucesso');
        } else {
          $this->getUser()->setFlash('error', 'Não tem autoridade para validar as informações desta fotografia.');
          }
        
          $this->redirect('@pr_individual_show?id='.$individual->getId());
      }
      else{
          $this->redirect('@pr_observation_photo_identify?id='.$observationPhoto->getId());
      }
  }
  
  public function executeAjaxGetSightingsForCompany( sfWebRequest $request ) {
    $this->sightings = SightingPeer::getSightingsForSelect($request->getParameter('date'), $request->getParameter('company_id'), $with_empty = true, $empty_msg = '', $empty_code = '');
  }
  
  public function executeAjaxGetSighting( sfWebRequest $request ) {
    $this->forward404Unless($this->sighting = SightingPeer::retrieveByPK($request->getParameter('id')));
    // Retrieve related record to use needed fields.
    $this->record = RecordPeer::retrieveByPK($this->sighting->getRecordId());
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
    //in case someone calls /characterize manually in the browser address tab
    $this->observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless( $this->observationPhoto && $this->observationPhoto->isCharacterizable() );

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
    
    $query_results = ObservationPhotoQuery::getPossibleMatches($this->observationPhoto, $args);
    $size = count($query_results);
    $keys = array();
    // The algorithm below is used to remove duplicate results because array_unique does not work on $query_results, which is of type PropelObjectCollection
    for ($i=0; $i < $size-1 ; $i++) {
      for ($j=$i+1; $j < $size ; $j++) {
        if($query_results[$i] === $query_results[$j]){
          if(!in_array($j, $keys)){
            $keys[] = $j;
          }
        }
      }
    }

    if($keys){
      foreach($keys as $key){
        $query_results->remove($key);
      }
    }

    $this->OBPhotos = $query_results;

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
     
    $this->relatedMarks = array();
    $photoId = $this->observationPhoto->getId();

    if($this->observationPhoto->isCharacterizable()) {

      $this->isTail = $this->observationPhoto->getBodyPart()->getCode() == body_part::F_SIGLA;
      if($this->isTail) {
        $this->observationPhotoPart = ObservationPhotoTailPeer::get_or_create($photoId);
        $this->relatedMarks = $this->observationPhotoPart->getObservationPhotoTailMarks();
      }

      $this->isLeft = $this->observationPhoto->getBodyPart()->getCode() == body_part::L_SIGLA;
      if($this->isLeft) {
        $this->observationPhotoPart = ObservationPhotoDorsalLeftPeer::get_or_create($photoId);
        $this->relatedMarks = $this->observationPhotoPart->getObservationPhotoDorsalLeftMarks();
      }

      $this->isRight = $this->observationPhoto->getBodyPart()->getCode() == body_part::R_SIGLA;
      if($this->isRight) {
        $this->observationPhotoPart = ObservationPhotoDorsalRightPeer::get_or_create($photoId);
        $this->relatedMarks = $this->observationPhotoPart->getObservationPhotoDorsalRightMarks();
      }

    } else {
     $this->isTail = $this->isLeft = $this->isRight = false;
     $this->pattern = NULL;
     //$this->tailForm = $this->dorsalLeftForm = $this->dorsalRightForm = false;
    }
  }
  
  protected function addSortCriteria($criteria)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }

    $column = ObservationPhotoPeer::translateFieldName($sort[0], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
    if ($sort[0] == 'individual_id'){
      $criteria->addJoin(ObservationPhotoPeer::INDIVIDUAL_ID, IndividualPeer::ID, Criteria::LEFT_JOIN);
      if ('asc' == $sort[1]) {
        $criteria->addAscendingOrderByColumn(IndividualPeer::NAME);
      } else {
        $criteria->addDescendingOrderByColumn(IndividualPeer::NAME);
      }
    } else {
      if ('asc' == $sort[1]) {
        $criteria->addAscendingOrderByColumn($column);
      } else {
        $criteria->addDescendingOrderByColumn($column);
      }
    }
  }
  
  protected function buildCriteria()
  {
    if (null === $this->filters) {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }
    $criteria = $this->filters->buildCriteria($this->getFilters());
    
    $criteria->remove(ObservationPhotoPeer::INDIVIDUAL_ID);
    $filter_array = $this->getUser()->getAttribute('prObservationPhoto.filters', array(), 'admin_module');
    if( isset($filter_array['individual_id']) && strlen($filter_array['individual_id']['text']) > 0 ){
      $criteria->addJoin(ObservationPhotoPeer::INDIVIDUAL_ID, IndividualPeer::ID, Criteria::LEFT_JOIN);
      $criteria->add(IndividualPeer::NAME, "%".$filter_array['individual_id']['text']."%", Criteria::LIKE);
    }
    
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
    
    //deal with the previous individual
    //will not use the return value to redirect, because the redirecting will always be done to the new individual
    $observationPhoto->haveToChooseBestPhotoAgain('ask and change');

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
    
    $id = $individual->getId();
    $old_individual = $observationPhoto->getIndividual();

    $old_id = ( $old_individual ) ? $old_individual->getId() : -1;//old_id will get, in case it existed the previous individual's id (if not: -1, all ids start from 1)
      if($old_id != $id){//this means either that the two individuals are different or just that the photo wasn't previously assigned to an individual

        //a) deal with previous individual
        $choose_best_again = $observationPhoto->haveToChooseBestPhotoAgain('ask and change');

        //b)newly assigned individual, get all the photos of the "new" individual before assigning the photo to it (it has at least one photo, displayed in the carousel on the identify page)
        $photos = $individual->getObservationPhotos();
        $hasBestPhotoWithThatBodyPart = FALSE;
        foreach($photos as $photo){
          if( $photo->getBodyPartId() == $observationPhoto->getBodyPartId() ){//check to see if the "new" individual already had photos with the same body part
            if($photo->getIsBest()){//this is just a back-up (normally one of them should definitely be BEST)
              $hasBestPhotoWithThatBodyPart = TRUE;
              break;
            }
          }
        }

        $sf_user = SfContext::getInstance()->getUser();
        $observationPhoto->setLastEditedBy($sf_user->getGuardUser()->getId());
        $observationPhoto->setIndividual($individual);
        $observationPhoto->setStatus(ObservationPhoto::FA_SIGLA);
        if($hasBestPhotoWithThatBodyPart){
          $observationPhoto->setIsBest(false);
        }
        else{
          $observationPhoto->setIsBest(true);
        }
        $observationPhoto->save();

        //the photo was already the best photo of an existing individual, which had initially more than 2 photos
        if($choose_best_again){
          $this->redirect('@pr_individual_show?id='.$old_id);//go pick a best photo for the old individual
        }
        else{
          $this->redirect('@pr_individual_edit?id='.$id);
        }
     }

  }
  
  public function executeDefineAsBest( sfWebRequest $request ) {
    $this->forward404Unless($observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
    $this->forward404Unless($observationPhoto->getIndividualId());
    
    $bodyPartId = $observationPhoto->getBodyPartId();
    $relatedPhotos = $observationPhoto->getIndividual()->getObservationPhotos();//it has at least one - the "clicked" one
    foreach( $relatedPhotos as $relatedPhoto ) {
      if( $relatedPhoto->getBodyPartId() == $bodyPartId ){//set all the photos (including the "clicked" one) with the same body part as the "clicked" one as non best
        $relatedPhoto->setIsBest(false);
        $relatedPhoto->save();
      }
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
  
  public function _free_memory_is_above($free_memory_limit){
    $limit = ini_get('memory_limit');
    $cur = memory_get_usage();
    $last = strtolower($limit[strlen($limit)-1]);
    switch($last) {
      // The 'G' modifier is available since PHP 5.1.0
      case 'g':
          $limit = substr($limit,0,(strlen($limit)-1));
          $limit *= 1024 * 1024 * 1024;
          break;
      case 'm':
          $limit = substr($limit,0,(strlen($limit)-1));
          $limit *= 1024 * 1024;
          break;
      case 'k':
          $limit = substr($limit,0,(strlen($limit)-1));
          $limit *= 1024;
    }
    $available = $limit - $cur;
    if( $available > $free_memory_limit ) {
      return true;
    } else {
      return false;
    }
  }
  
  public function _is_ok_execution_time($time, $margin){
    $max = ini_get('max_execution_time');
    if( ($time + $margin) > $max ) {
      return false;
    } else {
      return true;
    }
    
  }

  public function executeAjaxDoubt(sfWebRequest $request){
    $OBPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter("observation_photo_id"));

     if(stripos($OBPhoto->getNotes(), "_doubt") === FALSE){
        $OBPhoto->setNotes("_doubt".$OBPhoto->getNotes());//add "doubt" at the beginning
        $OBPhoto->save();
     }
     else{
        $OBPhoto->setNotes( str_ireplace("_doubt", "", $OBPhoto->getNotes()) );//remove "doubt"
        $OBPhoto->save();
     }
  }
  
  public function executeExport( sfWebRequest $request ){
    $start_time = time();
    $errors = '';
    $args = array();
    $from = null;
    $to = null;
    if( $request->hasParameter('export_catalog')){
      $lowest_id = ObservationPhotoQuery::create()->orderById(Criteria::ASC)->findOne();
      $highest_id = ObservationPhotoQuery::create()->orderById(Criteria::DESC)->findOne();
      $args = $request->getParameter('export_catalog');
      
      if(isset($args['from'])){
        $from = $args['from'];
        if(!ctype_digit($from)){
          $errors .= sprintf('"%s" não é um valor inteiro. ', $from);
        }
      } else {
        $from = $lowest_id->getId();
      }
      
      if(isset($args['to'])){
        $to = $args['to'];
        if(!ctype_digit($to)){
          $errors .= sprintf('"%s" não é um valor inteiro. ', $to);
        }
      } else {
        $to = $highest_id->getId();
      }
      
      if($from > $to){
        $errors .= sprintf('O valor de "De" deve ser >= ao valor de "a". ');
      }
    }
    
    if(strlen($errors) > 0) {
      $this->getUser()->setFlash('error', $errors, true);
      $this->redirect('@recognition_of_cetaceans_app?'.http_build_query($args));
    }
    
    $this->filename = sprintf("%s/export_%s.csv", sfConfig::get('sf_log_dir'), date('Ymd_His'));
    $obPhotosQS = ObservationPhotoQuery::create();
    if($from){
      $obPhotosQS = $obPhotosQS->filterById($from, Criteria::GREATER_EQUAL);
    }
    if($to){
      $obPhotosQS = $obPhotosQS->filterById($to, Criteria::LESS_EQUAL);
    }
    $obPhotos = $obPhotosQS->orderById(Criteria::ASC)->setFormatter(ModelCriteria::FORMAT_ON_DEMAND)->find();

    // create csv file
    $observations_file = fopen($this->filename, 'w');
    fwrite($observations_file, "id,filename,date,time,individual,specie,island,body_part,gender,age_group,behaviour,latitude,longitude,company,vessel,photographer,kind_of_photo,photo_quality,sighting_id,best,status,last_edited_by,validated_by\n");


    foreach($obPhotos as $op){
      if ($this->_free_memory_is_above(5000000)) {
        if( $this->_is_ok_execution_time(time() - $start_time, 5) ) {
          $format_string = "%s,\"%s\",%s,%s,\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"\n";
          $individual = $op->getIndividual()? $op->getIndividual()->getName(): '';
          $behaviour = $op->getBehaviourId()? $op->getBehaviour()->getCode(): ''; 
          $company = $op->getCompanyId()? $op->getCompany()->getAcronym(): '';
          $vessel = $op->getvesselId()? $op->getVessel()->getRecCetCode(): '';
          $photographer = $op->getPhotographerId()? $op->getphotographer()->getCode(): '';
          $best = $op->getIsBest()? 'Y': 'N';
          $last_edited_by = $op->getLastEditedBy()? $op->getsfGuardUserRelatedByLastEditedBy()->getUsername(): '';
          $validated_by = $op->getValidatedBy()? $op->getsfGuardUserRelatedByValidatedBy()->getUsername(): '';
          $line_args = array(
              $op->getId(), 
              $op->getFileName(),
              $op->getPhotoDate(),
              $op->getPhotoTime(),
              $individual,
              $op->getSpecie()->getCode(),
              $op->getIsland(),
              $op->getBodyPart()->getCode(),
              $op->getGender(),
              $op->getAgeGroup(),
              $behaviour,
              $op->getLatitude(),
              $op->getLongitude(),
              $company,
              $vessel,
              $photographer,
              $op->getKindOfPhoto(),
              $op->getPhotoQuality(),
              $op->getSightingId(),
              $best,
              $op->getStatus(),
              $last_edited_by,
              $validated_by
          );
          vfprintf($observations_file, $format_string, $line_args);
        } else {
          $this->getUser()->setFlash('error', 'Atingiu o limite de tempo disponível, por favor reduza a quantidade de registos a exportar.', true);
          $this->redirect('@recognition_of_cetaceans_app?'.http_build_query($args));
        }
      } else {
        $this->getUser()->setFlash('error', 'Atingiu o limite de memória disponível, por favor reduza a quantidade de registos a exportar.', true);
        $this->redirect('@recognition_of_cetaceans_app?'.http_build_query($args));
      }
    }
    fclose($observations_file);
    
    $this->forward404Unless(file_exists($this->filename));
  }
  
}
