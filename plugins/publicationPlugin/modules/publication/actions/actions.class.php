<?php

require_once dirname(__FILE__).'/../lib/publicationGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/publicationGeneratorHelper.class.php';

class publicationActions extends autoPublicationActions {
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $Publication = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $Publication)));

      $this->getUser()->setFlash('notice', $notice);

      $this->redirect(array('sf_route' => 'publication', 'sf_subject' => $Publication));
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
