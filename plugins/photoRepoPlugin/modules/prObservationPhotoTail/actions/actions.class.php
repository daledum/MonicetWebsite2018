<?php

require_once dirname(__FILE__).'/../lib/prObservationPhotoTailGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prObservationPhotoTailGeneratorHelper.class.php';

class prObservationPhotoTailActions extends autoPrObservationPhotoTailActions
{
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $ObservationPhotoTail = $form->save();
      $ObservationPhoto = $ObservationPhotoTail->getObservationPhoto();
      
      $sf_user = SfContext::getInstance()->getUser();
      $ObservationPhoto->setLastEditedBy($sf_user->getGuardUser()->getId());
      
      if( $ObservationPhoto->getStatus() == ObservationPhoto::NEW_SIGLA) {
        if($ObservationPhoto->getIndividual()){
          $ObservationPhoto->setStatus(ObservationPhoto::FA_SIGLA);
          $ObservationPhoto->save();
        }
        else{
          $ObservationPhoto->setStatus(ObservationPhoto::C_SIGLA);
          $ObservationPhoto->save();
        }
      }
      if( $ObservationPhoto->getStatus() == ObservationPhoto::V_SIGLA) {
        $ObservationPhoto->setStatus(ObservationPhoto::FA_SIGLA);
        $ObservationPhoto->save();
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhotoTail)));

      $this->getUser()->setFlash('notice', $notice);
      
      $this->redirect('@pr_observation_photo_characterize?id='.$ObservationPhotoTail->getPhotoId());
    } else {
      $this->getUser()->setFlash('error', 'Aconteceram erros na submissão do formulário. '.$form->getErrorSchema());
      $this->redirect('@pr_observation_photo_characterize?id='.$form->getObject()->getPhotoId());
    }
  }
}
