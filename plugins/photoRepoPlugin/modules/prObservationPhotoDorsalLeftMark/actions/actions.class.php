<?php

require_once dirname(__FILE__).'/../lib/prObservationPhotoDorsalLeftMarkGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prObservationPhotoDorsalLeftMarkGeneratorHelper.class.php';

class prObservationPhotoDorsalLeftMarkActions extends autoPrObservationPhotoDorsalLeftMarkActions
{
  public function executeDelete(sfWebRequest $request){
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    
    $observationPhotoId = $this->getRoute()->getObject()->getObservationPhotoDorsalLeft()->getPhotoId();
    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@pr_observation_photo_characterize?id='.$observationPhotoId);
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $ObservationPhotoDorsalLeftMark = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhotoDorsalLeftMark)));

      $this->getUser()->setFlash('notice', $notice);
      
      $this->redirect('@pr_observation_photo_characterize?id='.$ObservationPhotoDorsalLeftMark->getObservationPhotoDorsalLeft()->getPhotoId());
    } else {
      $OPDorsalLeft = ObservationPhotoDorsalLeftPeer::retrieveByPK($this->form['observation_photo_dorsal_left_id']->getValue());
      $errors = $this->form->getGlobalErrors();
      $errorStr = '';
      foreach( $errors as $name => $error ) {
        $errorStr .= $error;
      }
      $this->getUser()->setFlash('mark_error', 'A marca não foi adicionada devido a erros.'.$errorStr);
      $this->redirect('@pr_observation_photo_characterize?id='.$OPDorsalLeft->getPhotoId());
    }
  }
}
