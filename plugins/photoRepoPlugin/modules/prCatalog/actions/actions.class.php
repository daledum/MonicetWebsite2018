<?php

class prCatalogActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    $this->pr_frontend_filter = new frontendFilterForm();
    $this->formSubmitedValues = $request->getParameter('catalog_filter');
    if( !isset($this->formSubmitedValues['specie_id']) ){
      // set Pm has default specie
      $this->formSubmitedValues['specie_id'] = 8;
    }
    if($this->formSubmitedValues){
      $this->pr_frontend_filter->bind($this->formSubmitedValues);
    }
    
    $this->pager = IndividualPeer::filter($this->formSubmitedValues);
    $this->filter_stats = IndividualPeer::get_filter_stats($this->formSubmitedValues);

    $this->userPhotoForm = new frontendUserPhotoForm();
  }

  public function executeProcessUserPhoto(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new frontendUserPhotoForm();
    $this->form->bind($request->getParameter('user_photo_form'), $request->getFiles('user_photo_form'));
    if($this->form->isValid()) {

      $values = $this->form->getValues();
      $file = $this->form->getValue('photo');

        if( in_array($values['photo']->getOriginalExtension(), array('.jpg', '.JPG'))){

             $photo_counter = 0;
             $delete_keys = array();


             //find all other user photos (which have USER in the code) - the code of a user photo is of type YYYYMMDD-USER-IMG_n, where n is a number and YYYYMMDD is today's date
             $c = new Criteria();
             $c->add(ObservationPhotoPeer::CODE, '%USER%', Criteria::LIKE);
             $userPhotos = ObservationPhotoPeer::doSelect($c);

             foreach ($userPhotos as $key => $userPhoto) {
               
               //calculate the daily counter for those photos that have the same date as today's date in the code in order to add it at the end of the file name
               if( $userPhoto->getPhotoDate() == date("Y-m-d") ){//or strpos( $userPhoto->getCode, date("Ymd") ) !== FALSE
                
                //get the largest number after IMG_
                if( (int)substr($userPhoto->getCode(), 18) > $photo_counter ){
                  $photo_counter = (int)substr($userPhoto->getCode(), 18);
                }

                //for pictures from the same day, but older than aprox 2 hours - get rid of them (NB this isn't optimum, time varies across the Globe )
                if( (int)date("H") - (int)strstr($userPhoto->getPhotoTime(), ':', TRUE) >= 2  ){//uploaded_at and created_at can be used too
                  $delete_keys[] = $key;
                }
               }
               else{//the other photos with a previous date - get rid of them
                  $delete_keys[] = $key;
               }
             }

             //delete the old user photos
             foreach ($delete_keys as $delete_key) {

                //a) deletes the file from the upload folder
                $locationBegin = sfConfig::get('sf_upload_dir').'/pr_repo_final/';
                $deletedFileName = $userPhotos[$delete_key]->getFileName();
                $deletedFileAddress = $locationBegin.$deletedFileName;
                
                    if( file_exists($deletedFileAddress) ) {
                      system('rm '.$deletedFileAddress);
                    }
                
                //b) deletes it from the database
                $userPhotos[$delete_key]->delete();
             }
             
            $photo_counter = $photo_counter + 1;
            $code = date("Ymd").'-USER-'.'IMG_'.$photo_counter;

            $fileAddress = sfConfig::get('sf_upload_dir').'/pr_repo_final/'.$code.'.jpg';
            $file->save($fileAddress);

            $dateUpload = date("Y-m-d H:i:s", filemtime($fileAddress));

            //create the line in the observation_photo table
            $ObservationPhoto = new ObservationPhoto();
            //set its code
            $ObservationPhoto->setCode($code);
            //set its file name
            $ObservationPhoto->setFileName($code.'.jpg');
            //set the date
            $ObservationPhoto->setPhotoDate( date("Y-m-d", filemtime($fileAddress)) );
            //set the time
            $ObservationPhoto->setPhotoTime( date("H:i:s", filemtime($fileAddress)) );
            //set the specie id
            $ObservationPhoto->setSpecieId($values["specie_id"]);
            //set the body part id
            $ObservationPhoto->setBodyPartId($values["body_part_id"]);
            //set an extra marker in its notes: _user for visibility
            $ObservationPhoto->setNotes('_user');
            //set uploaded at
            $ObservationPhoto->setUploadedAt($dateUpload);
            //set its status, save and redirect to characterize or identify page
            if( $ObservationPhoto->isCharacterizable() ){
              $ObservationPhoto->setStatus(ObservationPhoto::NEW_SIGLA);//sets it to new if characterizable
              $ObservationPhoto->save();
              $this->redirect('@pr_observation_photo_characterize?id='.$ObservationPhoto->getId());//redirect to characterize
            }
            else{
              $ObservationPhoto->setStatus(ObservationPhoto::C_SIGLA);//sets it to characterized, if non-characterizable
              $ObservationPhoto->save();
              $this->redirect('@pr_observation_photo_identify?id='.$ObservationPhoto->getId());//redirect to identify
            }
        } else {
          $this->getUser()->setFlash('error', 'A fotografia enviada contém uma extensão inválida.');
        }
    }
    else{//form is not throwing any error messages... why? PLUS, it only likes files <2MB even if max size is not set in the form widget validator
      $this->redirect('@pr_catalog');
    }
    $this->setTemplate('processUserPhoto'); //Sets an alternate template for this sfAction - is this really necessary?
  }

  public function executeIndividual(sfWebRequest $request)
  {
    $this->pr_frontend_filter = new frontendFilterForm();
    $this->formSubmitedValues = $request->getParameter('catalog_filter');
    if($this->formSubmitedValues){
      $this->pr_frontend_filter->bind($this->formSubmitedValues);
    }
       
    $this->forward404Unless($this->individual = IndividualPeer::retrieveByPK($request->getParameter('id')));
    $this->filter_stats = IndividualPeer::get_filter_stats($this->formSubmitedValues);
  }
  
  public function executeExportIndividual( sfWebRequest $request ) {
    $this->forward404Unless($individual = IndividualPeer::retrieveByName($request->getParameter('name')));
    //process zip file
    $this->_createFile($individual);
    // redirect for download
    $this->redirect('@pr_catalog_download_individual?name='.$individual->getName());
  }
  
  public function executeDownloadIndividual( sfWebRequest $request ) {
    $this->forward404Unless($this->individual = IndividualPeer::retrieveByName($request->getParameter('name')));
    $filename = sfConfig::get('sf_plugins_dir').'/photoRepoPlugin/web/export_individual/'.$this->individual->getName().'.zip';
    $this->forward404Unless(file_exists($filename));
    //$this->redirect('http://'.$request->getHost().'/photoRepoPlugin/export_individual/teste.zip');
    $this->redirect('http://'.$request->getHost().'/photoRepoPlugin/export_individual/'.$this->individual->getName().'.zip');
  }
  
  protected function _createFile($individual) {
    $tmpFolder = sfConfig::get('sf_plugins_dir').'/photoRepoPlugin/web/export_individual_tmp';
    $finalFolder = sfConfig::get('sf_plugins_dir').'/photoRepoPlugin/web/export_individual';
    $skeletonFolder = $finalFolder.'_skeleton';
    $individualFolder = $tmpFolder.'/'.$individual->getName();
    $repoFolder = sfConfig::get('sf_upload_dir').'/pr_repo_final';
    // build structure
    system('mkdir '.$individualFolder);
    system('mkdir '.$individualFolder.'/css');
    system('cp '.$skeletonFolder.'/style.css '.$individualFolder.'/css');
    system('mkdir '.$individualFolder.'/images');
    system('cp '.$skeletonFolder.'/favicon.ico '.$individualFolder.'/images');
    system('cp '.$skeletonFolder.'/logo_monicet.png '.$individualFolder.'/images');
    system('mkdir '.$individualFolder.'/individual_photos');
    system('mkdir '.$individualFolder.'/ob_photo_page');
    // index file
    $index = fopen( $individualFolder.'/index.html', 'w');
    
    $this->_makeHtmlHeadHeader($index);
          
    fwrite($index, '<div class="content">' );
      fwrite($index, '<h1>'.$individual->getName().'</h1>' );
      fwrite($index, '<h2>'.mfText::translate('Biographic data', 'export_individual').'</h2>' );
      fwrite($index, '<div class="individual-data-container">' );
        fwrite($index, '<div class="photo-image">' );
          $bestPhoto = $individual->getBestObservationPhoto();
          fwrite($index, '<a href="individual_photos/'.$bestPhoto->getFileName().'">');
            fwrite($index, '<img width="460" title="'.$bestPhoto->getFilename().'" alt="'.$bestPhoto->getFilename().'" src="individual_photos/'.$bestPhoto->getFilename().'">');
          fwrite($index, '</a>');
        fwrite($index, '</div>' );
  
        fwrite($index, '<div class="photo-data">' );
          fwrite($index, '<table width="100%">' );
            $specie = $individual->getSpecie();
            fwrite($index, '<tr class="odd"><th width="100">'.mfText::translate('Name', 'export_individual').':</th><td>'.$individual->getName().'</td></tr>' );
            fwrite($index, '<tr class="odd"><th>'.mfText::translate('Specie', 'export_individual').':</th><td>'.( (!is_null($specie))? $specie->getCode().' - '. $specie->getName().' - '.$specie->getScientificName() : '').'</td></tr>' );
            fwrite($index, '<tr class="odd"><th>'.mfText::translate('Gender', 'export_individual').':</th><td>'.mfText::translate($bestPhoto->getGender(), 'export_individual').'</td></tr>' );
            $lastObservationPhoto = $individual->getLastValidObservationPhoto();
            fwrite($index, '<tr class="odd"><th>'.mfText::translate('Age group', 'export_individual').':</th><td>'.mfText::translate(age_group::getValueForSigla($lastObservationPhoto->getAgeGroup()), 'export_individual').'</td></tr>' );
            $observationDates = $individual->getObservationDates();
            $num_dates = count($observationDates);
            //$dates = $individual->getGIDates();
            //$dates_part = explode(', ', $observationDates);
            fwrite($index, '<tr class="odd"><th>'.mfText::translate('Sightings', 'export_individual').' ('.$num_dates.'):</th><td>' );
            foreach( $observationDates as $cont => $ob_date ){
              fwrite($index, ( ($cont!=0)? ', ': '' ).$ob_date['date']);
              if( $ob_date['num_photos'] > 1 ){
                fwrite($index, ' <b>('.$ob_date['num_photos'].')</b>');
              }
            }
            fwrite($index, '</td></tr>');
            fwrite($index, '<tr class="odd"><th>'.mfText::translate('Notes', 'export_individual').':</th><td>'.$individual->getNotes().'</td></tr>' );
          fwrite($index, '</table>' );
        fwrite($index, '</div>' );
        
      fwrite($index, '</div>' );
      fwrite($index, '<h2>'.mfText::translate('Observation photos', 'export_individual').'</h2>' );

      fwrite($index, '<div>' );
      foreach( $individual->getObservationPhotos() as $OBPhoto ) {
        if( $OBPhoto->getStatus(ObservationPhoto::V_SIGLA)) {
          $this->_makeOBPhotoPage($OBPhoto, $repoFolder, $individualFolder);
          fwrite($index, '<a href="ob_photo_page/'.$OBPhoto->getId().'.html">');
            fwrite($index, '<img class="index-thumbnail" height="120" width="130" title="'.$OBPhoto->getFilename().'" alt="'.$OBPhoto->getFilename().'" src="individual_photos/tn_130x120_'.$OBPhoto->getFilename().'">');
          fwrite($index, '</a>');
        }
      }
      fwrite($index, '</div>' );

    fwrite($index, '</div>' );
          
    $this->_makeHtmlFooter($index);
    fclose($index);
    // process zip fie
    chdir($finalFolder);
    system('rm -Rf '.$individual->getName().'.zip');
    chdir($tmpFolder);
    system('zip -9 -y -r -q '.$individual->getName().'.zip *');
    system('mv '.$individual->getName().'.zip '.$finalFolder);
    system('rm -Rf '.$tmpFolder.'/*');
    }
  
  protected function _makeHtmlHeadHeader($htmlFile, $level = ''){
    fwrite($htmlFile, '<!DOCTYPE html>' );
      fwrite($htmlFile, '<html>' );
        fwrite($htmlFile, '<head>' );
          fwrite($htmlFile, '<title>monicet.net</title>' );
          fwrite($htmlFile, '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' );
          fwrite($htmlFile, '<link rel="stylesheet" type="text/css" media="screen" href="'.$level.'css/style.css" />' );
          fwrite($htmlFile, '<link rel="shortcut icon" href="'.$level.'images/favicon.ico" />' );
        fwrite($htmlFile, '</head>' );
        fwrite($htmlFile, '<body>' );
        
          fwrite($htmlFile, '<div class="header">' );
            fwrite($htmlFile, '<table>' );
              fwrite($htmlFile, '<tr>' );
                fwrite($htmlFile, '<td id="col-1">' );
                fwrite($htmlFile, '</td>' );
                fwrite($htmlFile, '<td id="col-2">' );
                fwrite($htmlFile, '<a href="http://monicet.net"><img height="100" title="monicet" alt="monicet" src="'.$level.'images/logo_monicet.png"></a><br />');
                fwrite($htmlFile, '</td>' );
                fwrite($htmlFile, '<td id="col-3">' );
                fwrite($htmlFile, '</td>' );
              fwrite($htmlFile, '</tr>' );
            fwrite($htmlFile, '</table>' );
          fwrite($htmlFile, '</div>' );
    return $htmlFile;
  }
  
  protected function _makeHtmlFooter( $htmlFile ) {
        fwrite($htmlFile, '<div class="footer">' );
          fwrite($htmlFile, '<a href="http://monicet.net">monicet</a><br />'.mfText::translate('Exported at', 'export_individual').date(' Y-m-d H:i') );
        fwrite($htmlFile, '</div>' );

      fwrite($htmlFile, '</body>' );
    fwrite($htmlFile, '</html>' );
    return $htmlFile;
  }
  
  protected function _makeOBPhotoPage($OBPhoto, $repoFolder, $individualFolder) {
    
    $OBPhotoindex = fopen( $individualFolder.'/ob_photo_page/'.$OBPhoto->getId().'.html', 'w');
    
    $this->_makeHtmlHeadHeader($OBPhotoindex, $level = "../");
    system('cp '.$repoFolder.'/'.$OBPhoto->getFilename().' '.$individualFolder.'/individual_photos');
    system('cp '.$repoFolder.'/tn_130x120_'.$OBPhoto->getFilename().' '.$individualFolder.'/individual_photos');
    fwrite($OBPhotoindex, '<div class="content">' );
      fwrite($OBPhotoindex, '<a href="../index.html">'.mfText::translate('Back', 'export_individual').'</a>');
      fwrite($OBPhotoindex, '<h3>'.$OBPhoto->getCode().'</h3>' );
      fwrite($OBPhotoindex, '<div class="photo-container">' );
        fwrite($OBPhotoindex, '<div class="photo-image">' );
          fwrite($OBPhotoindex, '<a href="../individual_photos/'.$OBPhoto->getFilename().'">');
            fwrite($OBPhotoindex, '<img width="460" title="'.$OBPhoto->getCode().'" alt="'.$OBPhoto->getCode().'" src="../individual_photos/'.$OBPhoto->getFilename().'">');
          fwrite($OBPhotoindex, '</a>');
        fwrite($OBPhotoindex, '</div>' );
        fwrite($OBPhotoindex, '<div class="photo-data">' );
          fwrite($OBPhotoindex, '<table width="100%">' );
            fwrite($OBPhotoindex, '<tr class="odd"><th width="100">'.mfText::translate('Code', 'export_individual').':</th><td>'.$OBPhoto->getCode().'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Date', 'export_individual').':</th><td>'.$OBPhoto->getPhotoDate('Y-m-d').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Time', 'export_individual').':</th><td>'.$OBPhoto->getPhotoTime('H:i').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Island', 'export_individual').':</th><td>'.island::getDescriptionBySigla($OBPhoto->getIsland()).'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Body part', 'export_individual').':</th><td>'.(($OBPhoto->getBodyPartId())? $OBPhoto->getBodyPart()->getDescription(): '').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Gender', 'export_individual').':</th><td>'.mfText::translate($OBPhoto->getGender(), 'export_individual').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Age group', 'export_individual').':</th><td>'.mfText::translate(age_group::getValueForSigla($OBPhoto->getAgeGroup()), 'export_individual').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Behaviour', 'export_individual').':</th><td>'.((!is_null($OBPhoto->getBehaviourId()))? $OBPhoto->getBehaviour()->getDescription() : '').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Latitude', 'export_individual').':</th><td>'.$OBPhoto->getLatitude().'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Longitude', 'export_individual').':</th><td>'.$OBPhoto->getLongitude().'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Company', 'export_individual').':</th><td>'.(($OBPhoto->getCompany())? $OBPhoto->getCompany() : '').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Vessel', 'export_individual').':</th><td>'.(($OBPhoto->getVessel())? $OBPhoto->getVessel(): '').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Photographer', 'export_individual').':</th><td>'.(($OBPhoto->getPhotographerId())? $OBPhoto->getPhotographer()->getName().'<br/>'.$OBPhoto->getPhotographer()->getEmail() : '').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Kind of photo', 'export_individual').':</th><td>'.mfText::translate(kind_of_photo::getValueForSigla($OBPhoto->getKindOfPhoto()), 'export_individual').'</td></tr>' );
            fwrite($OBPhotoindex, '<tr class="odd"><th>'.mfText::translate('Photo quality', 'export_individual').':</th><td>'.mfText::translate(photo_quality::getValueForSigla($OBPhoto->getPhotoQuality()), 'export_individual').'</td></tr>' );
          fwrite($OBPhotoindex, '</table>' );
        fwrite($OBPhotoindex, '</div>' );
        fwrite($OBPhotoindex, '<div class="clear"></div>');
        fwrite($OBPhotoindex, '<div class="photo-container">' );

        //EXIF
        $exif = exif_read_data($repoFolder.'/'.$OBPhoto->getFilename(), 0, true);
        if($exif!==false) {
            fwrite($OBPhotoindex, '<div class="photo-exif">' );
              fwrite($OBPhotoindex, '<b>EXIF</b><br/>' );
              fwrite($OBPhotoindex, '<ul>' );
                foreach ($exif as $key => $section) {
                  foreach ($section as $name => $val) {
                    fwrite($OBPhotoindex, '<li><b>'.$key.'.'.$name.'</b>: ' );
                    if (is_array($val)){
                      fwrite($OBPhotoindex, print_r($val) );
                    } else {
                      fwrite($OBPhotoindex, $val );
                    }
                    fwrite($OBPhotoindex, '</li>' );
                  }
                }
              fwrite($OBPhotoindex, '</ul>' );
            fwrite($OBPhotoindex, '</div>' );
        }

          //IPTC
          $iptc = array();
          $size = getimagesize ( $repoFolder.'/'.$OBPhoto->getFilename(), $info);
          if( is_array($info) && isset($info['APP13']) ) {
            $iptc = iptcparse($info["APP13"]);

            fwrite($OBPhotoindex, '<div class="photo-iptc">' );
              fwrite($OBPhotoindex, '<b>IPTC</b><br/>' );
              fwrite($OBPhotoindex, '<ul>' );
                foreach($iptc as $key => $value ) {
                  fwrite($OBPhotoindex, '<li><b>'.$key.'</b>:'.$value[0].'</li>' );
                }
              fwrite($OBPhotoindex, '</ul>' );
            fwrite($OBPhotoindex, '</div>' );
          }

        fwrite($OBPhotoindex, '</div>' );
      fwrite($OBPhotoindex, '</div>' );
    fwrite($OBPhotoindex, '</div>' );

    $this->_makeHtmlFooter($OBPhotoindex);
    
    fclose($OBPhotoindex);
  }
}
