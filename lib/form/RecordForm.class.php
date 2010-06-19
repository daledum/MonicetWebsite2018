<?php

/**
 * Record form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class RecordForm extends BaseRecordForm
{
  public function configure()
  {
  	$gi_id = sfContext::getInstance()->getRequest()->getParameter('gi_id');
  	
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('record');
    unset(
      $this['created_at'], $this['updated_at']
    );

    if($this->isNew()) {
        $this->setWidget('code_id', new sfWidgetFormChoice(array('choices' => CodePeer::doSelectForNewRecord($gi_id))));
    }
  }
}
