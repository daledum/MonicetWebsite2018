<?php

require_once dirname(__FILE__).'/../lib/prObservationPhotoDorsalRightGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prObservationPhotoDorsalRightGeneratorHelper.class.php';

class prObservationPhotoDorsalRightActions extends autoPrObservationPhotoDorsalRightActions
{
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $ObservationPhotoDorsalRight = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ObservationPhotoDorsalRight)));

      $this->getUser()->setFlash('notice', $notice);
      
      $this->redirect('@pr_observation_photo_characterize?id='.$ObservationPhotoDorsalRight->getPhotoId());
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
