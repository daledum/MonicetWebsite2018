<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
require_once dirname(__FILE__).'/../lib/vendor/wideimage/WideImage.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropel15Plugin', 'sfGuardPlugin');
    $this->enablePlugins('mfAdministracaoPlugin', 'mfLogPlugin', 'mfMenuPlugin', 'mfFormularioPlugin');
    $this->enablePlugins('sfFeed2Plugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('photoRepoPlugin');
    $this->enablePlugins('publicationPlugin');
  }
}
