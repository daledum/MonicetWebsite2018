<?php

class ObservationPhotoForm extends BaseObservationPhotoForm
{
  public function configure(){
        
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    
    unset(
      $this['created_at'], $this['updated_at']
    );
    
    $request = sfContext::getInstance()->getRequest();
    $object = $this->getObject();
    
    if( $object->isNew()) {
      $this->widgetSchema['file_name'] = new sfWidgetFormInputHidden(array(), array('value' => $request->getParameter('file')));
    } else {
      $this->widgetSchema['file_name'] = new sfWidgetFormInputHidden();
    }
      
    $this->validatorSchema['file_name'] = new sfValidatorPass(); 
    
    
    
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
    $this->widgetSchema['body_part'] = new sfWidgetFormChoice(array(
        'choices' => $body_parts,
    ));
    $this->validatorSchema['body_part'] = new sfValidatorChoice(array(
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
    
    
    $photographers = PhotographerPeer::getForSelect(true, '');
    $this->widgetSchema['photographer_id'] = new sfWidgetFormChoice(array(
        'choices' => $photographers,
    ));
    $this->validatorSchema['photographer_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($photographers),
        'required' => false,
    ));
    
    $kind_of_photo = kind_of_photo::getForSelect(true, '');
    $this->widgetSchema['kind_of_photo'] = new sfWidgetFormChoice(array(
        'choices' => $kind_of_photo,
    ));
    $this->validatorSchema['kind_of_photo'] = new sfValidatorChoice(array(
        'choices' => array_keys($kind_of_photo),
        'required' => false,
    ));
    
    $photo_quality = photo_quality::getForSelect(true, '');
    $this->widgetSchema['photo_quality'] = new sfWidgetFormChoice(array(
        'choices' => $photo_quality,
    ));
    $this->validatorSchema['photo_quality'] = new sfValidatorChoice(array(
        'choices' => array_keys($photo_quality),
        'required' => false,
    ));
    
    if( $object->isNew() ){
        $file_address = $file_address = sfConfig::get('sf_upload_dir').'/pr_repo/'.$request->getParameter('file');
        $exif = exif_read_data($file_address, 0, true);
        $file = $exif['FILE']['FileName'];
        $file_parts = explode('.', $file);
        $this->widgetSchema['code']->setDefault($file_parts[0]);
        
        $filenameparts = explode('-', $file_parts[0]);
        $date = substr($filenameparts[0], 0, 4).'-'.substr($filenameparts[0], 4, 2).'-'.substr($filenameparts[0], 6, 2);
        $this->widgetSchema['photo_date']->setDefault($date);
        
        $dateTimeOriginal = $exif['EXIF']['DateTimeOriginal'];
        $dto_parts = explode(' ', $dateTimeOriginal);
        $this->widgetSchema['photo_time']->setDefault($dto_parts[1]);
        
        $this->widgetSchema['island']->setDefault($exif['IFD0']['Make']);
        
        
        $iptc = array();
        $size = getimagesize ( $file_address, $info);        
        if(is_array($info)) {    
            $iptc = iptcparse($info["APP13"]);
        }
        if( isset($iptc['2#090'][0]) ) {
            $this->widgetSchema['latitude']->setDefault( substr(trim($iptc['2#090'][0]), 0, -1) );
        }
        if( isset($iptc['2#095'][0]) ) {
            $this->widgetSchema['longitude']->setDefault( substr( trim($iptc['2#095'][0]), 0, -1) );    
        }
        
        $company_code = $exif['IFD0']['ImageDescription'];
        $company = CompanyQuery::create()->filterByAcronym($company_code)->findOne();
        if( $company ){
            $this->widgetSchema['company_id']->setDefault($company->getId());
        }
        $photographer = PhotographerQuery::create()->filterByCode($filenameparts[1])->findOne();
        if( $photographer ) {
            $this->widgetSchema['photographer_id']->setDefault($photographer->getId());
        } 
    }
    
  }
}
