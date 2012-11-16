<?php

require_once dirname(__FILE__).'/../lib/prObservationPhotoTailMarkGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prObservationPhotoTailMarkGeneratorHelper.class.php';


class prObservationPhotoTailMarkActions extends autoPrObservationPhotoTailMarkActions {
  public function executeDelete(sfWebRequest $request){
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    
    $observationPhotoId = $this->getRoute()->getObject()->getObservationPhotoTail()->getPhotoId();
    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@pr_observation_photo_characterize?id='.$observationPhotoId);
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $ObservationPhotoTailMark = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhotoTailMark)));

      $this->getUser()->setFlash('notice', $notice);
      
      $this->redirect('@pr_observation_photo_characterize?id='.$ObservationPhotoTailMark->getObservationPhotoTail()->getPhotoId());
    } else {
      $OPTail = ObservationPhotoTailPeer::retrieveByPK($this->form['observation_photo_tail_id']->getValue());
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
      $this->redirect('@pr_observation_photo_characterize?id='.$OPTail->getPhotoId());
    }
  }
}
