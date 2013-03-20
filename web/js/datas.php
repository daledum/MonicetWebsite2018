<?php 
header('Content-type: text/javascript');
require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'prod', false);
$databaseManager = new sfDatabaseManager($configuration);

?>

<?php $actualYear = date("Y"); ?>

function handle_datas() {
  //datas em geral
  $('.data_geral').datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: '<?php echo sfConfig::get('app_jquery_date_format', 'yy-mm-dd') ?>',
    yearRange: '2000:<?php echo $actualYear+3 ?>'
  });
}

$(document).ready(handle_datas);

