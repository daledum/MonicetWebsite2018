<?php

class IndividualFormFilter extends BaseIndividualFormFilter
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    $this->widgetSchema->setLabel('specie_id', 'Espécie');
  }
}
