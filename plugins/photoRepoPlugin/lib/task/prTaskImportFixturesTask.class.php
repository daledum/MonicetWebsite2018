<?php

class prTaskImportFixturesTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'photoRepoPlugin';
    $this->name             = 'import-fixtures';
    $this->briefDescription = 'Imports or verifies inicial fixtures for plugin';
    $this->detailedDescription = <<<EOF
The [import-fixtures|INFO] task does things.
Call it with:

  [php symfony photoRepoPlugin:import-fixtures|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();
     
    
    // add your code here
    $photographers = array(
      array('code' => 'ACP', 'name' => 'Adam C. Parker', 'email' => 'adam.parker@myport.ac.uk', 'copyright' => '© Adam Parker/APID'),
      array('code' => 'ALP', 'name' => 'Afonso Costa Lucas Prestes', 'email' => '', 'copyright' => ''),
      array('code' => 'ANN', 'name' => 'Anne-Maria Naapuri ', 'email' => '', 'copyright' => ''),
      array('code' => 'ARC', 'name' => 'Arianna Cecchetti', 'email' => 'ariannacecchetti@gmail.com', 'copyright' => '© Arianna Cecchetti/APID'),
      array('code' => 'ANK', 'name' => 'Arne Kiis', 'email' => '', 'copyright' => '© Arne Kiis/APID'),
      array('code' => 'BRS', 'name' => 'Bruno Sampaio', 'email' => '', 'copyright' => '© Bruno Sampaio/APID'),
      array('code' => 'CRC', 'name' => 'Carla Coutinho', 'email' => 'geral@picosdeaventura.com', 'copyright' => '© Carla Coutinho/APID'),
      array('code' => 'CLS', 'name' => 'Clara Sardà Just', 'email' => 'clarasarda9@gmail.com', 'copyright' => '© Clara Sardà/APID'),
      array('code' => 'DHY', 'name' => 'Dick Hoyer', 'email' => 'dick.hoyer@gmail.com', 'copyright' => '© Dick Hoyer/APID'),
      array('code' => 'FLO', 'name' => 'Filipe Lourenço', 'email' => 'maildofilipelourenco@gmail.com', 'copyright' => '© Filipe Lourenço/APID'),
      array('code' => 'HAR', 'name' => 'Harkema', 'email' => '', 'copyright' => ''),
      array('code' => 'IRK', 'name' => 'Inge Rekveld', 'email' => 'inge.rekveld@wanadoo.nl', 'copyright' => ''),
      array('code' => 'JMB', 'name' => 'João Manuel Brum', 'email' => '', 'copyright' => '© João Quaresma/APID'),
      array('code' => 'JOQ', 'name' => 'João Quaresma', 'email' => '', 'copyright' => ''),
      array('code' => 'JNA', 'name' => 'José Manuel N. Azevedo', 'email' => '', 'copyright' => ''),
      array('code' => 'MLG', 'name' => 'Maggie L. Gamble', 'email' => 'Maggie.Gamble@bristol.ac.uk', 'copyright' => '© Maggie Gamble/APID'),
      array('code' => 'MRF', 'name' => 'Marc Fernandez', 'email' => 'marc.fern@gmail.com', 'copyright' => '© Marc Fernandez/APID'),
      array('code' => 'MJC', 'name' => 'Maria Joana Cruz', 'email' => '', 'copyright' => '© Maria Joana Cruz/APID'),
      array('code' => 'MRG', 'name' => 'Marie Guilpin', 'email' => '', 'copyright' => '© Marie Guilpin/APID'),
      array('code' => 'MRN', 'name' => 'Mario Nelson', 'email' => '', 'copyright' => '© Mario Nelson/APID'),
      array('code' => 'MAP', 'name' => 'Marta Aparici', 'email' => 'marako_84@hotmail.com', 'copyright' => '© Marta Aparici/APID'),
      array('code' => 'MRK', 'name' => 'Martin Kurtsson', 'email' => '', 'copyright' => '© Martin Kurtsson/APID'),
      array('code' => 'MRL', 'name' => 'Miranda van der Linde', 'email' => '', 'copyright' => '© Miranda van der Linde/APID'),
      array('code' => 'MSC', 'name' => 'Montserrat Casas', 'email' => 'monxe_@hotmail.com', 'copyright' => '© Montserrat Casas/APID'),
      array('code' => 'JNS', 'name' => 'Mr Jensen', 'email' => '', 'copyright' => '© Mario Nelson/APID'),
      array('code' => 'NCS', 'name' => 'Nélio Conceição Saldanha', 'email' => '', 'copyright' => '© Nélio Saldanha/APID'),
      array('code' => 'PAV', 'name' => 'Picos de Aventura', 'email' => 'geral@picosdeaventura.com', 'copyright' => ''),
      array('code' => 'PPA', 'name' => 'Paulo Pacheco', 'email' => '', 'copyright' => '© Pedro Madruga/APID'),
      array('code' => 'PDM', 'name' => 'Pedro Madruga', 'email' => '', 'copyright' => ''),
      array('code' => 'RCM', 'name' => 'Rafaela Correia Moniz', 'email' => '', 'copyright' => ''),
      array('code' => 'RSC', 'name' => 'Raquel Soley Calvet', 'email' => '', 'copyright' => '© Raquel Soley/APID'),
      array('code' => 'RPC', 'name' => 'Ricardo Jorge Paiva Cordeiro', 'email' => '', 'copyright' => ''),
      array('code' => 'RME', 'name' => 'Rickard Melkersson', 'email' => '', 'copyright' => '© Rickard Melkersson/APID'),
      array('code' => 'RRO', 'name' => 'Rui Rodrigues', 'email' => '', 'copyright' => '© Rui Rodrigues/APID'),
      array('code' => 'TAZ', 'name' => 'Terra Azul', 'email' => 'info@terraazul.com', 'copyright' => '© Terra Azul /APID'),
      array('code' => 'TMF', 'name' => 'Tim Farland Took', 'email' => '', 'copyright' => '© Tim Farland/APID'),
      array('code' => 'WFH', 'name' => 'Wolfgang Hantel', 'email' => 'whantel@googlemail.com', 'copyright' => '© Futurismo/APID'),
      array('code' => 'KRF', 'name' => 'Kris Fuerstenau', 'email' => 'info@terraazul.com', 'copyright' => '© Kris Fuerstenau/APID')
    );
    
    $bodyParts = array(
      array('code' => 'F', 'description_pt' => 'Barbatana caudal', 'description_en'  => 'Fluke'),
      array('code' => 'FR', 'description_pt' => 'Parte direita da barbatana caudal', 'description_en'  => 'Right half of the fluke'),
      array('code' => 'FL', 'description_pt' => 'Parte esquerda da barbatana caudal', 'description_en'  => 'Left half of the fluke'),
      array('code' => 'L', 'description_pt' => 'Lado esquerdo da barbatana dorsal', 'description_en'  => 'Left dorsal'),
      array('code' => 'R', 'description_pt' => 'Lado direito da barbatana dorsal', 'description_en'  => 'Right dorsal'),
      array('code' => 'TS', 'description_pt' => 'Corpo da cauda', 'description_en'  => 'Tailstock'),
      array('code' => 'G', 'description_pt' => 'Sexo', 'description_en'  => 'Gender'),
      array('code' => 'P', 'description_pt' => 'Barbatana peitoral', 'description_en'  => 'Pectoral fin'),
      array('code' => 'BY', 'description_pt' => 'Corpo', 'description_en'  => 'Body'),
      array('code' => 'H', 'description_pt' => 'Cabeça', 'description_en'  => 'Head'),
      array('code' => 'O', 'description_pt' => 'Outro', 'description_en'  => 'Other'),
      array('code' => 'S', 'description_pt' => 'Cicatriz invulgar', 'description_en'  => 'Unusual scar'),
      array('code' => 'B', 'description_pt' => 'Fotografia de  biópsia', 'description_en'  => 'Biopsy photo'),
    );
    printf("\nPhotographers -> ");
    foreach( $photographers as $ph ){
      $photographer = PhotographerQuery::create()->filterByCode($ph['code'])->findOne();
      if( !$photographer ) {
        $photographer = new Photographer();
        $photographer->setCode($ph['code']);
        $photographer->setName($ph['name']);
        $photographer->setEmail($ph['email']);
        $photographer->setCopyright($ph['copyright']);
        $photographer->save();
      }
      printf("#");
    }
    printf("\n");
    
    printf("\nBody Parts -> ");
    foreach($bodyParts as $bp){
      $bodyPart = BodyPartQuery::create()->filterByCode($bp['code'])->findOne();
      if( !$bodyPart ){
        $bodyPart = new BodyPart();
        $bodyPart->setCode($bp['code']);
        $bodyPart->setDescription($bp['description_pt'], 'pt');
        $bodyPart->setDescription($bp['description_en'], 'en');
        $bodyPart->save();
      }
      printf("#");
    }
    printf("\n");
  }
}
