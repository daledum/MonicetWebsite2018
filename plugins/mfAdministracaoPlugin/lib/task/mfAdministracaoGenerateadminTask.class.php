<?php

class mfAdministracaoGenerateadminTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    $this->addArguments(array(
       new sfCommandArgument('model', sfCommandArgument::REQUIRED, 'The model'),
    ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'backend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
      new sfCommandOption('module', null, sfCommandOption::PARAMETER_REQUIRED, 'The module'),
    ));

    $this->namespace        = 'mfAdministracao';
    $this->name             = 'generate-admin';
    $this->briefDescription = 'Generates an admin module with the morfose\'s layout';
    $this->detailedDescription = <<<EOF
The [mfAdministracao:generate-admin|INFO] task does things.
Call it with:

  [php symfony mfAdministracao:generate-admin|INFO] 
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    // $databaseManager = new sfDatabaseManager($this->configuration);
    // $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();
    
    // copy layout in case it doesn't exist in the application
    $layout_file = sprintf("%s/templates/mfAdminLayout.php", sfConfig::get('sf_app_dir'));
    $layout_plugin = sprintf("%s/mfAdministracaoPlugin/data/extra/mfAdminLayout.php", sfConfig::get('sf_plugins_dir'));
    if ( ! file_exists($layout_file) && file_exists($layout_plugin) ){
    	copy($layout_plugin, $layout_file);
    }
    
    // execute the propel:generate-admin task
    $task = new sfPropelGenerateAdminTask($this->dispatcher, $this->formatter);
    $task->setConfiguration($this->configuration);
    $task->run(array(
      'application' => $options['application'],
      'model' => $arguments['model'],
    ), array(
      'module' => $options['module'] ? $options['module'] : '',
      'theme' => 'mfAdmin'
    ));
  }
}