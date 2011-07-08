<?php

require_once dirname(__FILE__).'/../lib/gi_listGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/gi_listGeneratorHelper.class.php';

/**
 * gi_list actions.
 *
 * @package    monicet
 * @subpackage gi_list
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class gi_listActions extends autoGi_listActions
{
	public function executeListShowMap(sfWebRequest $request) {
        $giid = $request->getParameter('id');
        $this->redirect('@generalInfoPublicMap?general_info_id=' . $giid);
    }
	  
	public function executeListShowGrid(sfWebRequest $request) {
	    $giid = $request->getParameter('id');
		$this->redirect('gi_list/sheet?giid=' . $giid);
	}
	
	public function executeSheet(sfWebRequest $request)
    {
        $this->general_info = GeneralInfoQuery::create()
                                ->filterById($request->getParameter("giid"))
                                ->findOne();
        $this->records = $this->general_info->getRecords();
        $this->n_lines = count($this->records);
    }
}
