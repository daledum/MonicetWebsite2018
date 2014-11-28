<?php

require_once dirname(__FILE__).'/../lib/prObservationPhotoDorsalLeftGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prObservationPhotoDorsalLeftGeneratorHelper.class.php';

class prObservationPhotoDorsalLeftActions extends autoPrObservationPhotoDorsalLeftActions
{
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $ObservationPhotoDorsalLeft = $form->save();
      $ObservationPhoto = $ObservationPhotoDorsalLeft->getObservationPhoto();
      if( $ObservationPhoto->getStatus() == ObservationPhoto::NEW_SIGLA) {
        if($ObservationPhoto->getIndividual()){//in case the photo was downgraded to NEW from a 'higher' status (when changing its body part, for example), but the photo was already associated to an indvidual
          $ObservationPhoto->setStatus(ObservationPhoto::FA_SIGLA);//no need to identify it again, so jump to 'para validar'
          $ObservationPhoto->save();
        }
        else{
          $ObservationPhoto->setStatus(ObservationPhoto::C_SIGLA);
          $ObservationPhoto->save();
        }
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhotoDorsalLeft)));

      $this->getUser()->setFlash('notice', $notice);
      
      $this->redirect('@pr_observation_photo_characterize?id='.$ObservationPhotoDorsalLeft->getPhotoId());
    } else {
      $this->getUser()->setFlash('error', 'Aconteceram erros na submissão do formulário. '.$form->getErrorSchema());
      $this->redirect('@pr_observation_photo_characterize?id='.$form->getObject()->getPhotoId());
    }
  }
}
