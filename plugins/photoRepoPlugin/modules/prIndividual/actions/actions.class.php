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
    $criteria = new Criteria();

    return $criteria;
  }
}
