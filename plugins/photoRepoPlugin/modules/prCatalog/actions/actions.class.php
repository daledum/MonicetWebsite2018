<?php

class prCatalogActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    $this->pr_frontend_filter = new frontendFilterForm();
    $this->formSubmitedValues = $request->getParameter('catalog_filter');
    if($this->formSubmitedValues){
      $this->pr_frontend_filter->bind($this->formSubmitedValues);
    }
    
    $this->pager = IndividualPeer::filter($this->formSubmitedValues);
  }

  public function executeIndividual(sfWebRequest $request)
  {
    $this->pr_frontend_filter = new frontendFilterForm();
    $this->formSubmitedValues = $request->getParameter('catalog_filter');
    if($this->formSubmitedValues){
      $this->pr_frontend_filter->bind($this->formSubmitedValues);
    }
    
    $this->forward404Unless($this->individual = IndividualPeer::retrieveByPK($request->getParameter('id')));
  }
}
