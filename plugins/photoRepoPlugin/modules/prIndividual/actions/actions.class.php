<?php

require_once dirname(__FILE__).'/../lib/prIndividualGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prIndividualGeneratorHelper.class.php';

class prIndividualActions extends autoPrIndividualActions {
  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }
  
  protected function buildCriteria()
  {
    
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $criteria = $this->filters->buildCriteria($this->getFilters());

    $this->addSortCriteria($criteria);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $criteria);
    $criteria = $event->getReturnValue();

    return $criteria;
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $Individual = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $Individual)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@pr_individual_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'pr_individual_show', 'sf_subject' => $Individual));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
  
  public function executeShow( sfWebRequest $request ) {
    $this->individual = $this->getRoute()->getObject();
    $this->fotografias = $this->individual->getObservationPhotos();
    $this->numFotografias = count($this->fotografias);
  }

  public function executeAjaxChangeDominantBodyPart(sfWebRequest $request){
    $individual = IndividualPeer::retrieveByPK( $request->getParameter("individual_id") );
    $individual->setDominantBodyPartCode( $request->getParameter("body_part_code") );
  }

}
