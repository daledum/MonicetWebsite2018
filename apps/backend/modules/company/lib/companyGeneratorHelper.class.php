<?php

/**
 * company module helper.
 *
 * @package    monicet
 * @subpackage company
 * @author     Your name here
 * @version    morfose 1.4
 */
class companyGeneratorHelper extends BaseCompanyGeneratorHelper
{
    public function linkToDeleteAndRecalculate($object, $params)
	{
	  if ($object->isNew())
	  {
	    return '';
	  }
	
	  return '<li class="sf_admin_action_delete">'.link_to(__($params['label'], array(), 'sf_admin'), 'delete_and_recalculate', $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
	}
}
