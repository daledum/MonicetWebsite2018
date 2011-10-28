<?php

require_once dirname(__FILE__).'/../lib/watch_infoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/watch_infoGeneratorHelper.class.php';

/**
 * watch_info actions.
 *
 * @package    monicet
 * @subpackage watch_info
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class watch_infoActions extends autoWatch_infoActions
{
	public function executeListShowGrid(sfWebRequest $request) {
		$wiid = $request->getParameter('id');
		$this->redirect('watch_info/sheet?wiid=' . $wiid);
	}
		  
	public function executeListShowMap(sfWebRequest $request) {
		$wiid = $request->getParameter('id');
		$this->redirect('@watchInfoMap?watch_info_id=' . $wiid);
	}
	
	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
			$watchInfo = $form->save();
			$this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $watchInfo)));
			
			if ($request->hasParameter('_save_and_add')) {
				$this->getUser()->setFlash('notice', $notice.' You can add another one below.');
				$this->redirect('@watch_info_new');
			}
			else {
				$this->getUser()->setFlash('notice', $notice);
				$this->redirect('watch_info/sheet?giid=' . $watchInfo->getId());
			}
		}
		else {
			$this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
		}
	}
	
	public function executeListRecords(sfWebRequest $request)
	{
	
	}
	  
	public function executeIdentifier(sfWebRequest $request)
	{
	    return $this;
	}
	
	public function executeSheet(sfWebRequest $request)
	{
	    $this->watch_info = WatchInfoQuery::create()
	                            ->filterById($request->getParameter("wiid"))
	                            ->findOne();
	    
	    $user = $this->getUser()->getGuardUser();
	    $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
	    $this->forward404Unless( $user->getIsSuperAdmin() || $this->watch_info->getCompanyId() == $this->user_company->getId() );
	    
	    $this->records = $this->watch_info->getRecords();
	    $this->n_lines = count($this->records);
	    
	    $this->gi_form = new WatchInfoForm($this->watch_info);
	}
	
	public function executeCoordAjax(sfWebRequest $request){
	    $companhia = CompanyPeer::retrieveByPk($request->getParameter('company_id'));
	    $this->latitude = $companhia->getBaseLatitude();
	    $this->longitude = $companhia->getBaseLongitude();
	}
	
	
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
	
	public function executeValidation(sfWebRequest $request){ 
	    $this->valid = $request->getParameter('valid');
	    $this->comments = $request->getParameter('comments');
	    
	    $watch_info = WatchInfoQuery::create()
	                            ->filterById($request->getParameter('watch_info_id'))
	                            ->findOne();
	    if(strcmp($this->valid,'true') == 0){
	        $watch_info->setValid(1);
	    }else{
	        $watch_info->setValid(0);
	    }
	    $watch_info->setComments($this->comments);
	    $watch_info->save();
	    
	    return sfView::NONE;
	}
	
	
}
