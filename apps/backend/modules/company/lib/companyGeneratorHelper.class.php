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
  public function linkToTeste($object, $params)
  {
    return '<a href="http://www.morfose.net/?nome='.$object.'">'.$object.'</a>';
  }
}
