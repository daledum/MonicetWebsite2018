<?php

class PatternCellTailForm extends BasePatternCellTailForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('pattern');
    $this->widgetSchema->setHelp('points', 'X1,Y1,X2,Y2,...,XnYn');
    $this->validatorSchema['points'] = new sfValidatorRegex(array(
        'pattern' => '/^[1-9][0-9]*,[1-9][0-9]*(,[1-9][0-9]*,[1-9][0-9]*)*$/'
      ));
  }
}
