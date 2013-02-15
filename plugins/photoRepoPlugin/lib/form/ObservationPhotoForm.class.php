<?php

class ObservationPhotoForm extends BaseObservationPhotoForm
{
  public function configure(){
        
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    
    $this->embedI18n(array('pt', 'en'));
    
    unset(
      $this['created_at'], $this['updated_at'], $this['status'], $this['individual_id'], $this['is_best']
    );
    
    $request = sfContext::getInstance()->getRequest();
    $object = $this->getObject();
    
    $exif = $iptc =array();
    
    if( $object->isNew()) {
      // EXIF reading
      $file_address = sfConfig::get('sf_upload_dir').'/pr_repo/'.$request->getParameter('file');
      $exif = exif_read_data($file_address, 0, true);
      
      //IPTC reading
      $size = getimagesize ( $file_address, $info);
      if(is_array($info)) {    
          $iptc = iptcparse($info["APP13"]);
      }
      $file = $request->getParameter('file');
      $date = substr($file, 0, 4).'-'.substr($file, 4, 2).'-'.substr($file, 6, 2);
        
      $this->widgetSchema['file_name'] = new sfWidgetFormInputHidden(array(), array('value' => $request->getParameter('file')));
    } else {
      $date = $this->getObject()->getPhotoDate('Y-m-d');
      $this->widgetSchema['file_name'] = new sfWidgetFormInputHidden();
    }
      
    $this->validatorSchema['file_name'] = new sfValidatorPass(); 
    
    $years = range(date("Y")+1, date("Y")-20);
    $this->widgetSchema['photo_date'] = new sfWidgetFormDate(
      array('years' => array_combine($years, $years))
    );
    
    
    
    $species = SpeciePeer::getForSelect(true, '');
    $this->widgetSchema['specie_id'] = new sfWidgetFormChoice(array(
        'choices' => $species,
    ));
    $this->validatorSchema['specie_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($species),
    ));
    
    $islands = island::getForSelect(true, '');
    $this->widgetSchema['island'] = new sfWidgetFormChoice(array(
        'choices' => $islands,
    ));
    $this->validatorSchema['island'] = new sfValidatorChoice(array(
        'choices' => array_keys($islands),
    ));
    
    $body_parts = BodyPartPeer::getForSelect(true, '');
    $this->widgetSchema['body_part_id'] = new sfWidgetFormChoice(array(
        'choices' => $body_parts,
    ));
    $this->validatorSchema['body_part_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($body_parts),
    ));
    
    $gender = gender::getForSelect(true, '');
    $this->widgetSchema['gender'] = new sfWidgetFormChoice(array(
        'choices' => $gender,
    ));
    $this->validatorSchema['gender'] = new sfValidatorChoice(array(
        'choices' => array_keys($gender),
        'required' => false,    
    ));
    
    $age_group = age_group::getForSelect(true, '');
    $this->widgetSchema['age_group'] = new sfWidgetFormChoice(array(
        'choices' => $age_group,
    ));
    $this->validatorSchema['age_group'] = new sfValidatorChoice(array(
        'choices' => array_keys($age_group),
        'required' => false,
    ));
    
    $behaviour = BehaviourPeer::getForSelect(true, '');
    $this->widgetSchema['behaviour_id'] = new sfWidgetFormChoice(array(
        'choices' => $behaviour,
    ));
    $this->validatorSchema['behaviour_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($behaviour),
        'required' => false,
    ));
    
    $companies = CompanyPeer::getForSelect(true, '');
    $this->widgetSchema['company_id'] = new sfWidgetFormChoice(array(
        'choices' => $companies,
    ));
    $this->validatorSchema['company_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($companies),
        'required' => false,
    ));
    
    $vessels = VesselPeer::getForSelect(true, '');
    $this->widgetSchema['vessel_id'] = new sfWidgetFormChoice(array(
        'choices' => $vessels,
    ));
    $this->validatorSchema['vessel_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($vessels),
        'required' => false,
    ));
    
    $sightings = SightingPeer::getSightingsForSelect($date, $companyId = null, $with_empty = true, $empty_msg = '', $empty_code = '');
    $this->widgetSchema['sighting_id'] = new sfWidgetFormChoice(array(
        'choices' => $sightings,
    ));
    $this->validatorSchema['sighting_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($sightings),
        'required' => false,
    ));
    sfApplicationConfiguration::getActive()->loadHelpers(array('Url', 'Tag'));
    $this->widgetSchema->setHelp('sighting_id', link_to( 'Lista de avistamentos', '@get_sightings_by_date?date='.$date, array( 'id' => 'link_to_sighting_list', 'popup' => true)));
    
    
    $photographers = PhotographerPeer::getForSelect(true, '');
    $this->widgetSchema['photographer_id'] = new sfWidgetFormChoice(array(
        'choices' => $photographers,
    ));
    $this->validatorSchema['photographer_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($photographers),
        'required' => true,
    ));
    
    $kind_of_photo = kind_of_photo::getForSelect(true, '');
    $this->widgetSchema['kind_of_photo'] = new sfWidgetFormChoice(array(
        'choices' => $kind_of_photo,
        'default' => kind_of_photo::NORMAL_SIGLA
    ));
    $this->validatorSchema['kind_of_photo'] = new sfValidatorChoice(array(
        'choices' => array_keys($kind_of_photo),
        'required' => false,
    ));
    
    $photo_quality = photo_quality::getForSelect(true, '');
    $this->widgetSchema['photo_quality'] = new sfWidgetFormChoice(array(
        'choices' => $photo_quality,
        'default' => photo_quality::NORMAL_SIGLA
    ));
    $this->validatorSchema['photo_quality'] = new sfValidatorChoice(array(
        'choices' => array_keys($photo_quality),
        'required' => false,
    ));
    
    if( $object->isNew() ){
        
        $file = $exif['FILE']['FileName'];
        $file_parts = explode('.', $file);
        $this->widgetSchema['code']->setDefault($file_parts[0]);
        
        $filenameparts = explode('-', $file_parts[0]);
        $date = substr($filenameparts[0], 0, 4).'-'.substr($filenameparts[0], 4, 2).'-'.substr($filenameparts[0], 6, 2);
        $this->widgetSchema['photo_date']->setDefault($date);
        
        $dateTimeOriginal = $exif['EXIF']['DateTimeOriginal'];
        $dto_parts = explode(' ', $dateTimeOriginal);
        if(isset($dto_parts[1]) ) {
          $this->widgetSchema['photo_time']->setDefault($dto_parts[1]);
        }
        
        // specie
        if(isset($exif['IFD0']['Software'])){
          $specieStr = $exif['IFD0']['Software'];
        } elseif( isset($iptc['2#015'][0])){
          $specieStr = $iptc['2#015'][0];
        }
        if( isset($specieStr) && preg_match('!\S!u', $specieStr) ){ // and test if utf8
          $specieStr = ucfirst(strtolower($specieStr));
          $specie = SpecieQuery::create()->filterByRecCetCode($specieStr)->findOne();
          if( $specie ){
            $this->widgetSchema['specie_id']->setDefault($specie->getId());
          }
        }
        
        $this->widgetSchema['island']->setDefault($exif['IFD0']['Make']);
        
        // body part
        if( isset($iptc['2#005'][0]) ){
          $bodyPartStr = $iptc['2#005'][0];
        } elseif( isset($iptc['2#020'][0]) ){
          $bodyPartStr = $iptc['2#020'][0];
        }
        if( isset($bodyPartStr) ){
          $bodyPart = BodyPartQuery::create()->filterByCode(trim($bodyPartStr))->findOne();
          if( $bodyPart ) {
            $this->widgetSchema['body_part_id']->setDefault($bodyPart->getId());
          }
        }
        
        if( isset($exif['GPS']['GPSLatitude']) && isset($exif['GPS']['GPSLatitudeRef']) ){
          $lat = mfUtils::getGps($exif['GPS']['GPSLatitude'], $exif['GPS']['GPSLatitudeRef']);
          $this->widgetSchema['latitude']->setDefault( $lat );
          
        } elseif( isset($iptc['2#090'][0]) ) {
          $lat = explode(',', $iptc['2#090'][0]);
          $this->widgetSchema['latitude']->setDefault( $lat[0] );
        }
        
        if( isset($exif['GPS']['GPSLongitude']) && isset($exif['GPS']['GPSLongitudeRef']) ){
          $lat = mfUtils::getGps($exif['GPS']['GPSLongitude'], $exif['GPS']['GPSLongitudeRef']);
          $this->widgetSchema['longitude']->setDefault( $lat );
          
        } elseif ( isset($iptc['2#095'][0]) ) {
          $long = explode(',', $iptc['2#095'][0]);
          $this->widgetSchema['longitude']->setDefault( $long[0] );    
        }
        
        if( isset($iptc['2#120'][0]) ) {
          $company_code = $iptc['2#120'][0];
          $company = CompanyQuery::create()->filterByRecCetCode($company_code)->findOne();
          if( $company ){
              $this->widgetSchema['company_id']->setDefault($company->getId());
          }
        }
          
        $photographer = PhotographerQuery::create()->filterByCode($filenameparts[1])->findOne();
        if( $photographer ) {
            $this->widgetSchema['photographer_id']->setDefault($photographer->getId());
        } 
    }
    
  }
  
  protected function doSave( $con = null ){
    parent::doSave($con);
    if ( $filename = $this->getObject()->getFileName() ){
      $file_address = sfConfig::get('sf_upload_dir').'/pr_repo_final';
      WideImage::load($file_address.'/'.$filename)->resize(165, 150, 'outside')->crop('center', 'center', 165, 150)->saveToFile($file_address.'/tn_165x150_'.$filename);
      WideImage::load($file_address.'/'.$filename)->resize(130, 120, 'outside')->crop('center', 'center', 130, 120)->saveToFile($file_address.'/tn_130x120_'.$filename);
      WideImage::load($file_address.'/'.$filename)->resize(200, 200, 'outside')->crop('center', 'center', 200, 200)->saveToFile($file_address.'/tn_200_'.$filename);
    }
    
  }
}
