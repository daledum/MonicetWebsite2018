<?php

require_once dirname(__FILE__).'/../lib/wi_listGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/wi_listGeneratorHelper.class.php';

/**
 * wi_list actions.
 *
 * @package    monicet
 * @subpackage wi_list
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class wi_listActions extends autoWi_listActions
{
	public function executeListShowMap(sfWebRequest $request) {
        $wiid = $request->getParameter('id');
        $this->redirect('@watchInfoPublicMap?watch_info_id=' . $wiid);
    }
	  
	public function executeListShowGrid(sfWebRequest $request) {
	    $wiid = $request->getParameter('id');
		$this->redirect('wi_list/sheet?wiid=' . $wiid);
	}
	
	public function executeSheet(sfWebRequest $request)
    {
        $this->watch_info = WatchInfoQuery::create()
                                ->filterById($request->getParameter("wiid"))
                                ->findOne();
        $this->sightings = $this->watch_info->getWatchSightings();
        $this->n_lines = count($this->sightings);
    }
}
