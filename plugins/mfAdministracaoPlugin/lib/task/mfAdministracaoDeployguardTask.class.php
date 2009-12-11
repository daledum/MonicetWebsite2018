<?php

class mfAdministracaoDeployguardTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'backend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'mfAdministracao';
    $this->name             = 'deploy-guard';
    $this->briefDescription = 'Customizes the sfGuardAuth module with morfose\'s layout';
    $this->detailedDescription = <<<EOF
The [mfAdministracao:deploy-guard|INFO] task does things.
Call it with:

  [php symfony mfAdministracao:deploy-guard|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    // $databaseManager = new sfDatabaseManager($this->configuration);
    // $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

    // copy layout in case it doesn't exist in the application
    $layout_file = sprintf("%s/templates/sfGuardLayout.php", sfConfig::get('sf_app_dir'));
    $layout_plugin = sprintf("%s/mfAdministracaoPlugin/data/extra/sfGuardLayout.php", sfConfig::get('sf_plugins_dir'));
    if ( ! file_exists($layout_file) && file_exists($layout_plugin) ){
      copy($layout_plugin, $layout_file);
    }
  }
}
