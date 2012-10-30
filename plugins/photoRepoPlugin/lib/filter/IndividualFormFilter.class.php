<?php

class IndividualFormFilter extends BaseIndividualFormFilter
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    
    $species = SpeciePeer::getForSelect(true, '');
    $this->widgetSchema['specie_id'] = new sfWidgetFormChoice(array(
        'choices' => $species,
    ));
    
    $this->widgetSchema->setLabel('specie_id', 'Espécie');
  }
}
