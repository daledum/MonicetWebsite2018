<?php

/**
 * NewsArticleI18n filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseNewsArticleI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'headline' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'body'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'headline' => new sfValidatorPass(array('required' => false)),
      'body'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('news_article_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsArticleI18n';
  }

  public function getFields()
  {
    return array(
      'id'       => 'ForeignKey',
      'culture'  => 'Text',
      'headline' => 'Text',
      'body'     => 'Text',
    );
  }
}
