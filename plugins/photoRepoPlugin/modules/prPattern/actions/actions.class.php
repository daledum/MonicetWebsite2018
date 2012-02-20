<?php

require_once dirname(__FILE__).'/../lib/prPatternGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prPatternGeneratorHelper.class.php';

class prPatternActions extends autoPrPatternActions
{
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    
    $pattern = $this->getRoute()->getObject();
    
    $fileTail = sfConfig::get('sf_upload_dir').'/pr_patterns/'.$pattern->getImageTail();
    if( file_exists($fileTail) ) {
      unlink($fileTail);
    }
    $fileDorsalLeft = sfConfig::get('sf_upload_dir').'/pr_patterns/'.$pattern->getImageDorsalLeft();
    if( file_exists($fileDorsalLeft) ) {
      unlink($fileDorsalLeft);
    }
    $fileDorsalRight = sfConfig::get('sf_upload_dir').'/pr_patterns/'.$pattern->getImageDorsalRight();
    if( file_exists($fileDorsalRight) ) {
      unlink($fileDorsalRight);
    }
    $pattern->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@pr_pattern');
  }
}
