<?php
class mfValidatorFormulario extends sfValidatorRegex
{
  const REGEX_REGRA = '/^([a-z_]+)\[([a-z_]+(,[a-z_]+)*)\]$/i';

  /**
   * @see sfValidatorRegex
   */
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);

    $this->setOption('pattern', self::REGEX_REGRA);
  }
}
