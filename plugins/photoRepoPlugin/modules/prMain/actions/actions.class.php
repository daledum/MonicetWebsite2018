<?php

class prMainActions extends sfActions {
  public function executeControlPanel(sfWebRequest $request) {
    $this->uploadPhotos = UploadedPhotoPeer::countNotProcessed();
    $this->notProcessedPhotos = $this->countNotProcessedPhotos();
    $this->processedPhotos = $this->countProcessedPhotos();
    $this->individuals = IndividualQuery::create()->count();
    $this->species = SpecieQuery::create()->count();
  }
  
  public function executeUploadPhotosBulk( sfWebRequest $request ){
    $this->form = new addPhotosForm();
  }
  
  public function executeProcessUploadPhotosBulk( sfWebRequest $request ){
    
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new addPhotosForm();
    $this->form->bind($request->getParameter('add_photos'), $request->getFiles('add_photos'));
    if($this->form->isValid()) {
      $values = $this->form->getValues();
      
      $file = $this->form->getValue('photo');
      $destinyFolder = 'pr_repo_temp';
      if( $values['photo']->getOriginalExtension() == '.jpg'){
        $destinyFolder = 'pr_repo';
      }
      $fileAddress = sfConfig::get('sf_upload_dir').'/'.$destinyFolder.'/'.$values['photo']->getOriginalName();
      $file->save( $fileAddress );
      
      $finalFileAddress = sfConfig::get('sf_upload_dir').'/pr_repo';
      if( $values['photo']->getOriginalExtension() == '.zip'){
        system('unzip '.$fileAddress.' -d '.$finalFileAddress);
        system('rm '.$fileAddress);
      }
      
      $this->getUser()->setFlash('notice', 'As fotografias foram carregadas com sucesso.');
      $this->redirect('@recognition_of_cetaceans_app');
    }
    $this->setTemplate('uploadPhotosBulk');
  }
  
  public function executePendentPhotoList( sfWebRequest $request ){
    $this->form = new findPendentPhotosForm();
    
    if( $request->isMethod('post') ){
      //$this->form->bind($request->getParameter('pesquisa_planos'));
      $args = $request->getParameter('find_pendent_photos');
      //fazer pesquisa
      $this->argumentos = $args;
      $this->resultados = $this->findPendentPhotos($args);/*mfPlanoPeer::pesquisaAlunosComPlanos($args);*/
    }
    
    $this->invalidPhotos = $this->findInvalidNamePhotos();
  }
  
  public function executeDeleteInvalidPendentPhoto( sfWebRequest $request ){
    
    $this->forward404Unless($request->isMethod('post'));
    
    $invalidPhotos = $this->findInvalidNamePhotos();
    
    foreach( $invalidPhotos as $invalidPhoto) {
      $filename = sfConfig::get('sf_upload_dir').'/pr_repo/'.$invalidPhoto;
      if( file_exists( $filename ) ){
        unlink($filename);
      }
    }
    
    $this->getUser()->setFlash('notice', 'As fotografias foram apagadas com sucesso.');
    $this->redirect('@pr_pendent_photos_list');
  }
  
  
  /**
   *
   *  Accessory methods
   * 
   */
  function countNotProcessedPhotos(){
    $current_dir = sfConfig::get('sf_upload_dir').'/pr_repo';
    $dir = opendir($current_dir);        // Open the sucker
    $counter = 0;
    while ($file = readdir($dir)) {
      $parts = explode(".", $file);
      if (is_array($parts) && count($parts) == 2 && in_array($parts[1], array('png', 'jpg', 'PNG', 'JPG'))){
        $counter++;
      }
    }
    return $counter;
  }
  
  function countProcessedPhotos(){
    $current_dir = sfConfig::get('sf_web_dir').'/images/pr';
    $dir = opendir($current_dir);        // Open the sucker
    $counter = 0;
    while ($file = readdir($dir)) {
      $parts = explode(".", $file);
      if (is_array($parts) && count($parts) == 2 && in_array($parts[1], array('png', 'jpg', 'PNG', 'JPG'))){
        $counter++;
      }
    }
    return $counter;
  }
  
  function findPendentPhotos( $args = array() ){
    $results = array();
    $current_dir = sfConfig::get('sf_upload_dir').'/pr_repo';
    $dir = opendir($current_dir);        // Open the sucker
    $counter = 0;
    while ($file = readdir($dir)) {
      $parts = explode("-", $file);
      if (is_array($parts) && count($parts) == 3 ){
        $valid = true;
        $dateFile = substr($parts[0], 0, 4).'-'.substr($parts[0], 4, 2).'-'.substr($parts[0], 6, 2);
        
        //Date filter
        if(strlen($args['date_from']) && !mfData::isPosteriorEqual($dateFile, $args['date_from'])){
          $valid = false;
        }
        if(strlen($args['date_to']) && !mfData::isAnteriorEqual($dateFile, $args['date_to'])){
          $valid = false;
        }
        
        //Photographer filter
        if( strlen($args['photographer']) && $args['photographer'] != $parts[1]){
          $valid = false;
        }
        
        if( $valid ){
          $results[] = $file;
        }
      }
    }
    sort($results);
    return $results;
  }
  
  function findInvalidNamePhotos(){
    $results = array();
    $current_dir = sfConfig::get('sf_upload_dir').'/pr_repo';
    $dir = opendir($current_dir);        // Open the sucker
    $counter = 0;
    while ($file = readdir($dir)) {
      if($file != '.' && $file != '..'){
        $parts = explode(".", $file);
        if( !is_array($parts) || count($parts) != 2 || $parts[1] != 'jpg' ){
          $results[] = $file;
        } else {
          $nameParts = explode('-', $parts[0]);
          if( !is_array($nameParts) || count($nameParts) != 3 ){
            $results[] = $file;
          }
        }
      }
    }
    sort($results);
    return $results;
  }
}
