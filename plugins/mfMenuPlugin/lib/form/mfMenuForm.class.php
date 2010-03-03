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
  	unset( 
  	  $this['created_at'], $this['updated_at'] 
  	);
  	$routes = array_keys(sfContext::getInstance()->getRouting()->getRoutes());
  	$routes = array_merge(array("" => ""), $routes);
  	sort($routes);
  	
  	$this->widgetSchema['rota'] = new sfWidgetFormChoice(array(
      'choices' => array_combine($routes, $routes)
    ));
  }
}
