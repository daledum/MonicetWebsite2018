<?php

/**
 * Project form base class.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormBaseTemplate.php 9304 2008-05-27 03:49:32Z dwhittle $
 */
abstract class BaseFormPropel extends sfFormPropel
{
  public function setup()
  {
  }
  public function unsetAllFieldsExcept($fields = array()) { 
    $unsetFields = array_diff(array_keys($this->getWidgetSchema()->getFields()), $fields); 
    foreach($unsetFields as $value){
      // só deixa fazer apagar os campos que não estejam escondidos, devido aos ids
      if ( ! $this->widgetSchema[$value]->isHidden() ){
        unset($this[$value]);
      }
    }
  }
  public function unsetAllFields($fields = array()) {  
    foreach($fields as $value){
      // só deixa fazer apagar os campos que não estejam escondidos, devido aos ids
      if ( ! $this->widgetSchema[$value]->isHidden() ){
        unset($this[$value]);
      }
    }
  }
}
