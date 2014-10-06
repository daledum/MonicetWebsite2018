<?php

/**
 * WatchPost form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class WatchPostForm extends BaseWatchPostForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_post');
    unset(
      $this['created_at'], $this['updated_at']
    );
    
    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());

    if ($company) {
        $this->setWidget('company_id', 
                         new sfWidgetFormChoice(array('choices' => array($company->getId() => $company->getName()))));

        $this->validatorSchema->setPostValidator(
        new sfValidatorCallback(array('callback' => array($this, 'validateCoordinates')))
        );
    }
  }

  public function validateCoordinates($validator, $values)
  {
    
    $company_obj = CompanyPeer::retrieveByPk($values['company_id']);

    if($company_obj && $values['latitude'] && $values['longitude']){

      $lat = trim($values['latitude'], " ");
      $long = trim($values['longitude'], " ");

      $base = GeoLocation::fromDegrees( $company_obj->getBaseLatitude(), $company_obj->getBaseLongitude() );
      $coordinates = $base->boundingCoordinates(100, 'kilometers');
      $maximum_long = $coordinates[1]->getLongitudeInDegrees();
      $minimum_long = $coordinates[0]->getLongitudeInDegrees();
      $maximum_lat = $coordinates[1]->getLatitudeInDegrees();
      $minimum_lat = $coordinates[0]->getLatitudeInDegrees();
      
      if( (!is_numeric($lat) || $lat < $minimum_lat || $lat > $maximum_lat) && (!is_numeric($long) || $long < $minimum_long || $long > $maximum_long) ){
        throw new sfValidatorErrorSchema($validator, array(
        'latitude' => new sfValidatorError($validator, 'Latitude can only take decimal degrees format (no degrees, minutes or seconds symbols, please) values between '.$minimum_lat.' and '.$maximum_lat),
        'longitude' => new sfValidatorError($validator, 'Longitude can only take decimal degrees format (no degrees, minutes or seconds symbols, please) values between '.$minimum_long.' and '.$maximum_long)
        ));
      }
      else{
            if( !is_numeric($lat) || $lat < $minimum_lat || $lat > $maximum_lat ){
                throw new sfValidatorErrorSchema($validator, array(
                'latitude' => new sfValidatorError($validator, 'Latitude can only take decimal degrees format (no degrees, minutes or seconds symbols, please) values between '.$minimum_lat.' and '.$maximum_lat)
              ));
            }
            else{
                  if( !is_numeric($long) || $long < $minimum_long || $long > $maximum_long ){
                      throw new sfValidatorErrorSchema($validator, array(
                      'longitude' => new sfValidatorError($validator, 'Longitude can only take decimal degrees format (no degrees, minutes or seconds symbols, please) values between '.$minimum_long.' and '.$maximum_long)
                  ));
                }
            }
          }
    }
    return $values;
  }

}