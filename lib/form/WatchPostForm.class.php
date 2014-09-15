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

      $base = GeoLocation::fromDegrees( $company->getBaseLatitude(), $company->getBaseLongitude() );
      $coordinates = $base->boundingCoordinates(100, 'kilometers');

      $maximum_lat = $coordinates[1]->getLatitudeInDegrees();
      $minimum_lat = $coordinates[0]->getLatitudeInDegrees();
      $this->validatorSchema['latitude'] = new sfValidatorNumber(
        array( 'max' => $maximum_lat,
               'min' => $minimum_lat
        ),
        array( 'max' => 'Latitude can only take values between '. $minimum_lat. ' and '. $maximum_lat,
               'min' => 'Latitude can only take values between '. $minimum_lat. ' and '. $maximum_lat
        )
      );
    
      $maximum_long = $coordinates[1]->getLongitudeInDegrees();
      $minimum_long = $coordinates[0]->getLongitudeInDegrees();
      $this->validatorSchema['longitude'] = new sfValidatorNumber(
        array( 'max' => $maximum_long,
               'min' => $minimum_long
        ),
        array( 'max' => 'Longitude can only take values between '. $minimum_long. ' and '. $maximum_long,
               'min' => 'Longitude can only take values between '. $minimum_long. ' and '. $maximum_long
        )
      );

    }
  }
}