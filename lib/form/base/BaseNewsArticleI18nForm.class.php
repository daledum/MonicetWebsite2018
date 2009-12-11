<?php

/**
 * NewsArticleI18n form base class.
 *
 * @method NewsArticleI18n getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsArticleI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'culture'  => new sfWidgetFormInputHidden(),
      'headline' => new sfWidgetFormInputText(),
      'body'     => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'NewsArticle', 'column' => 'id', 'required' => false)),
      'culture'  => new sfValidatorPropelChoice(array('model' => 'NewsArticleI18n', 'column' => 'culture', 'required' => false)),
      'headline' => new sfValidatorString(array('max_length' => 255)),
      'body'     => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('news_article_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsArticleI18n';
  }


}
