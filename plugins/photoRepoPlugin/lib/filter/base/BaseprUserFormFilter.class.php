<?php

/**
 * prUser filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseprUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'role'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'role'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pr_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'prUser';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'user_id' => 'ForeignKey',
      'role'    => 'Text',
    );
  }
}
