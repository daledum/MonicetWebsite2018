<?php

/**
 * NewsArticle form base class.
 *
 * @method NewsArticle getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseNewsArticleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'is_published' => new sfWidgetFormInputCheckbox(),
      'slug'         => new sfWidgetFormInputText(),
      'enter_date'   => new sfWidgetFormDate(),
      'exit_date'    => new sfWidgetFormDate(),
      'publish_date' => new sfWidgetFormDate(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'NewsArticle', 'column' => 'id', 'required' => false)),
      'is_published' => new sfValidatorBoolean(),
      'slug'         => new sfValidatorString(array('max_length' => 255)),
      'enter_date'   => new sfValidatorDate(array('required' => false)),
      'exit_date'    => new sfValidatorDate(array('required' => false)),
      'publish_date' => new sfValidatorDate(),
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
