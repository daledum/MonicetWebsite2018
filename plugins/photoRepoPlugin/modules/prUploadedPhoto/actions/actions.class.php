<?php

require_once dirname(__FILE__).'/../lib/prUploadedPhotoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prUploadedPhotoGeneratorHelper.class.php';

class prUploadedPhotoActions extends autoPrUploadedPhotoActions{
  public function executeDelete(sfWebRequest $request) {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    
    $uploadedPhoto = $this->getRoute()->getObject();
    $photoName = $uploadedPhoto->getPhoto();
    
    $this->getRoute()->getObject()->delete();
  
    $photoFile = sfConfig::get('sf_upload_dir').'/pr_public/'.$photoName;
    if( file_exists($photoFile) ) {
      unlink($photoFile);
    }
    
    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@pr_uploaded_photo');
  }
  
  protected function executeBatchDelete(sfWebRequest $request) {
    $ids = $request->getParameter('ids');

    $count = 0;
    foreach (UploadedPhotoPeer::retrieveByPks($ids) as $object) {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $object)));
      
      $photoName = $object->getPhoto();
      
      $object->delete();
      if ($object->isDeleted()) {
        $count++;
      }
      
      $photoFile = sfConfig::get('sf_upload_dir').'/pr_public/'.$photoName;
      if( file_exists($photoFile) ) {
        unlink($photoFile);
      }
      
    }

    if ($count >= count($ids)) {
      $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    } else {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items.');
    }

    $this->redirect('@pr_uploaded_photo');
  }
}
