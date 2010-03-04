<?php

/**
 * mfMenu form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class mfMenuForm extends BasemfMenuForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('mf_menu');
  	unset( 
  	  $this['created_at'], $this['updated_at'] 
  	);
  	$routes = array_keys(sfContext::getInstance()->getRouting()->getRoutes());
  	$routes = array_merge(array("" => ""), $routes);
  	sort($routes);
  	
  	$this->widgetSchema['rota'] = new sfWidgetFormChoice(array(
      'choices' => array_combine($routes, $routes)
    ));
    
    $this->widgetSchema['menu_pai_id'] = new sfWidgetFormPropelChoice(array(
      'model' => 'mfMenu', 
      'add_empty' => true,
      'order_by' => array('Nome', 'ASC'),
      'multiple' => false,
      'expanded' => false
    ));
    $this->widgetSchema['permissao_id'] = new sfWidgetFormPropelChoice(array(
      'model' => 'sfGuardPermission', 
      'add_empty' => true,
      'order_by' => array('Name', 'ASC'),
      'multiple' => false,
      'expanded' => false
    ));
  }
}
