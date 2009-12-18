<?php

/**
 * NewsArticle form base class.
 *
 * @method NewsArticle getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsArticleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'is_published' => new sfWidgetFormInputCheckbox(),
      'slug'         => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'NewsArticle', 'column' => 'id', 'required' => false)),
      'is_published' => new sfValidatorBoolean(),
      'slug'         => new sfValidatorString(array('max_length' => 255)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'NewsArticle', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('news_article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsArticle';
  }

  public function getI18nModelName()
  {
    return 'NewsArticleI18n';
  }

  public function getI18nFormClass()
  {
    return 'NewsArticleI18nForm';
  }

}
