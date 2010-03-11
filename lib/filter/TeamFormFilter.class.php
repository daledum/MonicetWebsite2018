<?php

/**
 * Team filter form.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
class TeamFormFilter extends BaseTeamFormFilter
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('team');
    unset(
      $this['created_at'], $this['updated_at'], $this['photo'], $this['slug']
    );
    
    $this->widgetSchema['type'] = new sfWidgetFormSelect(array(
      'choices' => array_combine(TeamForm::$type, TeamForm::$type),
    ));
  }
}
