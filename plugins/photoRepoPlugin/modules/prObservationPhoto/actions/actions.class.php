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
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      if( $form->getObject()->isNew() ) {
        system('mv '.sfConfig::get('sf_upload_dir').'/pr_repo/'.$request->getParameter('file').' '.sfConfig::get('sf_upload_dir').'/pr_repo_final' );
      } 

      $ObservationPhoto = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhoto)));

      $this->getUser()->setFlash('notice', $notice);

      $this->redirect(array('sf_route' => 'pr_pendent_photos_list'));
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
