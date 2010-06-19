<?php

require_once dirname(__FILE__).'/../lib/general_infoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/general_infoGeneratorHelper.class.php';

/**
 * general_info actions.
 *
 * @package    monicet
 * @subpackage general_info
 * @author     Your name here
 * @version    morfose 1.4
 */
class general_infoActions extends autoGeneral_infoActions
{	
  public function executeListRecords(sfWebRequest $request)
  {
    $this->redirect('@record?gi_id='.$request->getParameter('id'));
  }
  
  public function executeIdentifier(sfWebRequest $request)
  {
    return $this;
  }
}
