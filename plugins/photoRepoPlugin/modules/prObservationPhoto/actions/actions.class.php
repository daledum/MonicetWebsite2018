<?php

require_once dirname(__FILE__).'/../lib/prObservationPhotoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prObservationPhotoGeneratorHelper.class.php';

class prObservationPhotoActions extends autoPrObservationPhotoActions {
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
      $sf_user = SfContext::getInstance()->getUser();
      $ObservationPhoto->setStatus('for_approval');
      $ObservationPhoto->setLastEditedBy($sf_user->getGuardUser()->getId());
      $ObservationPhoto->save();
      
      if(isset($fileAddress)) {
        $ObservationPhoto->setUploadedAt($dateUpload);
        $ObservationPhoto->save();
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhoto)));

      $this->getUser()->setFlash('notice', $notice);
      if( $isNew ) {
          $this->redirect(array('sf_route' => 'pr_pendent_photos_list'));
      } else {
          $this->redirect('@pr_observation_photo_edit?id='.$ObservationPhoto->getId());
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
  
  public function executeValidate( sfWebRequest $request ) {
      $this->forward404Unless($observationPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id')));
      $userId = $this->getUser()->getGuardUSer()->getId();
      if( $userId != $observationPhoto->getLastEditedBy()) {
          $observationPhoto->setStatus(observationPhoto::A_SIGLA);
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

  public function executeGetSightingsOnDate( sfWebRequest $request ) {
      $gis = GeneralInfoQuery::create()
              ->filterByDate($request->getParameter('date'));
      if( $request->getParameter('company_id', null) ) {
          $gis = $gis->filterByCompanyId($request->getParameter('company_id', null));
      }
      $this->gis = $gis->find();
  }
}
