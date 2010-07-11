<?php

/**
 * record module helper.
 *
 * @package    monicet
 * @subpackage record
 * @author     Your name here
 * @version    morfose 1.4
 */
class recordGeneratorHelper extends BaseRecordGeneratorHelper
{
  public function linkToTeste($object, $params)
  {
    return '<a href="http://www.morfose.net/?nome='.$object.'">'.$object.'</a>';
  }
}
