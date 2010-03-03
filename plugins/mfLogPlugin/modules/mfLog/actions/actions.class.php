<?php

require_once dirname(__FILE__).'/../lib/mfLogGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/mfLogGeneratorHelper.class.php';

/**
 * mf_log actions.
 *
 * @package    morfosof
 * @subpackage mf_log
 * @author     Your name here
 * @version    morfose 1.4
 */
class mfLogActions extends autoMfLogActions
{
	public function executeShow(sfWebRequest $request)
	{
		$this->object = mfLogPeer::retrieveByPk($request->getParameter('id')); 
		$this->forward404Unless($this->object);
	}
}
