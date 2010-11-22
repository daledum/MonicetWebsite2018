<?php

/**
 * Photo form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class PhotoForm extends BasePhotoForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('photo');
    unset(
      $this['created_at'], $this['updated_at'], $this['slug']
    );

    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
      'is_image' => true,
      'file_src' => '/uploads/photoalbums/'.$this->getObject()->getImage(),
      'edit_mode' => ! $this->getObject()->isNew()
    ));
    
    $this->validatorSchema['image'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/photoalbums',
      'mime_categories' => 'web_images',
      'mime_type_guessers' => array(
        array($this->getValue('image') ? $this->getValue('image') : new sfValidatorFile(), 'guessFromFileinfo'),
        array($this->getValue('image') ? $this->getValue('image') : new sfValidatorFile(), 'guessFromMimeContentType'),
        array($this->getValue('image') ? $this->getValue('image') : new sfValidatorFile(), 'guessFromFileBinary'),
      )
    ));
    $this->validatorSchema['image_delete'] = new sfValidatorPass();
    $this->embedI18n(array('pt', 'en'));
  }
  
  protected function doSave( $con = null )
  {
  	$en = $this->getValue('en');
    $this->getObject()->setSlug(mfText::stripText($en['caption']));
    
    parent::doSave($con);
    
    $imagem = $this->getObject()->getImage();
    if ( $imagem ){
        $dir = sfConfig::get('sf_upload_dir').'/photoalbums';
        copy($dir.'/'.$imagem, $dir.'/'.$imagem);
        WideImage::load($dir.'/'.$imagem)->resize(900, null, 'inside')->saveToFile($dir.'/'.$imagem);
    }
    
  }
}
