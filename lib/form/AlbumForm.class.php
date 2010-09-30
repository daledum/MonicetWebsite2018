<?php

/**
 * Album form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class AlbumForm extends BaseAlbumForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('album');
    unset(
      $this['created_at'], $this['updated_at'], $this['slug']
    );
    $this->widgetSchema['publish_date'] = new sfWidgetFormInput();
    $this->widgetSchema['publish_date']->setAttribute('class', 'date_field');
    $this->widgetSchema['publish_date']->setAttribute('readonly', 'readonly');
    $this->widgetSchema['publish_date']->setAttribute('value', date("Y-m-d"));
    $this->embedI18n(array('pt', 'en'));
  }
  
  protected function doSave( $con = null )
  {
  	$en = $this->getValue('en');
    $this->getObject()->setSlug(mfText::stripText($en['name']));
    return parent::doSave($con);
  } 
}
