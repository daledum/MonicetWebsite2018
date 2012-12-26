<?php

require_once dirname(__FILE__).'/../lib/prObservationPhotoTailMarkGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prObservationPhotoTailMarkGeneratorHelper.class.php';


class prObservationPhotoTailMarkActions extends autoPrObservationPhotoTailMarkActions {
  
  public function executeDelete(sfWebRequest $request){
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    
    $observationPhotoId = $this->getRoute()->getObject()->getObservationPhotoTail()->getPhotoId();
    
    $ObservationPhoto = $this->getRoute()->getObject()->getObservationPhotoTail()->getObservationPhoto();
    $ObservationPhoto->statusUpdate($action='change_marks');
      
    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@pr_observation_photo_characterize?id='.$observationPhotoId);
    
  }
    
  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
    
      $ObservationPhotoTailMark = $form->save();
      
      $ObservationPhoto = $ObservationPhotoTailMark->getObservationPhotoTail()->getObservationPhoto();
      $ObservationPhoto->statusUpdate($action='change_marks');
      
      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhotoTailMark)));

      $this->getUser()->setFlash('mark_notice', $notice);
      
      $this->redirect('@pr_observation_photo_characterize?id='.$ObservationPhotoTailMark->getObservationPhotoTail()->getPhotoId());
    } else {
      $OPTail = ObservationPhotoTailPeer::retrieveByPK($this->form['observation_photo_tail_id']->getValue());
      $errors = $this->form->getGlobalErrors();
      $errorStr = '';
      foreach( $errors as $name => $error ) {
        $errorStr .= $error;
      }
      $this->getUser()->setFlash('mark_error', 'A marca não foi adicionada devido a erros.'.$this->form->getErrorSchema().$errorStr);
      $this->redirect('@pr_observation_photo_characterize?id='.$OPTail->getPhotoId());
    }
  }
}
