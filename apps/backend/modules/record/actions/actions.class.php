<?php

require_once dirname(__FILE__).'/../lib/recordGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/recordGeneratorHelper.class.php';

/**
 * record actions.
 *
 * @package    monicet
 * @subpackage record
 * @author     Your name here
 * @version    morfose 1.4
 */
class recordActions extends autoRecordActions
{
  public function executeIndex(sfWebRequest $request) {
  	parent::executeIndex($request);
  }
	
  public function executeNew(sfWebRequest $request) {
  	
  	parent::executeNew($request);
  }

  public function executeShowRecords(sfWebRequest $request) {
  	$c = new Criteria();
    $records = RecordPeer::doSelect($c);
  }
  
  public function executeListSightings(sfWebRequest $request)
  {
    $this->redirect('sighting');
  }

}
