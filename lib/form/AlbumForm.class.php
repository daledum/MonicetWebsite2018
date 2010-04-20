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
    $this->widgetSchema['publish_date']->setOption('format', '%year%-%month%-%day%');
    $this->embedI18n(array('pt', 'en'));
  }
  
  protected function doSave( $con = null )
  {
  	$en = $this->getValue('en');
    $this->getObject()->setSlug(mfText::stripText($en['name']));
    return parent::doSave($con);
  } 
}
