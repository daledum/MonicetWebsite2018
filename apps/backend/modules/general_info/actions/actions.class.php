<?php

require_once dirname(__FILE__).'/../lib/general_infoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/general_infoGeneratorHelper.class.php';


class general_infoActions extends autoGeneral_infoActions
{
  public function executeListShowGrid(sfWebRequest $request) {
    $giid = $request->getParameter('id');
    $this->redirect('general_info/sheet?giid=' . $giid);
  }

  public function executeListShowMap(sfWebRequest $request) {
    $giid = $request->getParameter('id');
    $this->redirect('@generalInfoMap?general_info_id=' . $giid);
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $GeneralInfo = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $GeneralInfo)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@general_info_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect('general_info/sheet?giid=' . $GeneralInfo->getId());
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  public function executeListRecords(sfWebRequest $request)
  {

  }

  public function executeIdentifier(sfWebRequest $request)
  {
    return $this;
  }

  public function executeSheet(sfWebRequest $request)
  {
    $this->general_info = GeneralInfoQuery::create()
                            ->filterById($request->getParameter("giid"))
                            ->findOne();

    $user = $this->getUser()->getGuardUser();
    $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
    $this->forward404Unless( $user->getIsSuperAdmin() || $this->general_info->getCompanyId() == $this->user_company->getId() );

    $this->records = $this->general_info->getRecords();
    $this->n_lines = count($this->records);

    $this->gi_form = new GeneralInfoForm($this->general_info);
  }

  public function executeCoordAjax(sfWebRequest $request){
    $companhia = CompanyPeer::retrieveByPk($request->getParameter('company_id'));
    $this->latitude = $companhia->getBaseLatitude();
    $this->longitude = $companhia->getBaseLongitude();
  }

  public function executeUpload(sfWebRequest $request) {
    $this->form = new importXlsForm();
    if($request->isMethod('post')){

      $this->form->bind($request->getParameter('importXls'),$request->getFiles('importXls'));
      if($this->form->isValid()){

        $file = $this->form->getValue('ficheiro');
        $file->save(sfConfig::get('sf_upload_dir').'/import/import.xls');

        $this->getUser()->setFlash('notice', 'Upload - OK');
        $this->redirect('@general_info_show_import_file');
      }
    }
  }

  public function executeShowImportFile( sfWebRequest $request ){

    $this->filename = null;
    $this->current_dir = sfConfig::get('sf_upload_dir').'/import';
    $dir = opendir($this->current_dir);        // Open the sucker
    $file = readdir($dir);

    /*$parts = explode(".", $file);                    // pull apart the name and dissect by period
    if (is_array($parts) && count($parts) > 1) {    // does the dissected array have more than one part
      $extension = end($parts);        // set to we can see last file extension
      print 'extensão: '.$extension;
      print $file;
      if ($extension == "xls") {
        $this->filename = $file;
      }else {
        //$this->redirect('@general_info_collection?action=upload');
      }
    } else {
      //$this->redirect('@general_info_collection?action=upload');
    }*/

    $this->img_valida = '<img src="/mfAdministracaoPlugin/images/icons/tick.png" title="Válido" />';
    $this->img_invalida = '<img src="/mfAdministracaoPlugin/images/icons/delete.png" title="Inválido" />';

    $this->validation_log = $this->getValidationLog();

    $num_erros = count($this->validation_log);
    if( $num_erros == 0 ){
      $this->valido = true;
    } else {
      $this->valido = false;
      $this->getUser()->setFlash('error', 'O ficheiro carregado contém erros. Por favor rectifique-os e faça upload novamente do ficheiro.');
    }
  }

  // Construção de log de validação do ficheiro de importação
  public function getValidationLog(){
    $log = array();
    $objReader = new PHPExcel_Reader_Excel5();
    $objPHPExcel = $objReader->load(sfConfig::get('sf_upload_dir').'/import/import.xls');
    $activeSheet = $objPHPExcel->getActiveSheet();

    $next_codes = array('I' => array('IA', 'R', 'RA', 'F'), 'R' => array('R', 'IA', 'RA', 'F'), 'IA' => array('RA', 'FA'), 'RA' => array('FA', 'IA', 'R', 'RA', 'F'), 'FA' => array('IA', 'RA', 'R', 'F'), 'F' => array('I'));
    $prev_code = 'F';

    $last_date = null;

    $vis_cache = array();
    $specie_cache = array();
    $behav_cache = array();
    $dir_cache = array();
    $comp_cache = array();
    $watchman_cache = array();
    $post_cache = array();
    $vessel_cache = array();

    //para todas as linhas que tem código preencchido
    for($l=3 ; strcmp($activeSheet->getCellByColumnAndRow(2, $l)->getValue(),'') != 0 ; $l++){
      // colunas
      $date = trim($activeSheet->getCellByColumnAndRow(0, $l)->getValue());

      $value = trim($activeSheet->getCellByColumnAndRow(0, $l)->getValue());
      $formatCode = $activeSheet->getStyle('A'.$l)->getNumberFormat()->getFormatCode();
      $date = PHPExcel_Style_NumberFormat::toFormattedString($value, $formatCode);

      $code = trim($activeSheet->getCellByColumnAndRow(1, $l)->getValue());
      $time = trim($activeSheet->getCellByColumnAndRow(2, $l)->getValue());
      $formatTime = $objPHPExcel->getActiveSheet()->getStyle('C'.$l)->getNumberFormat()->getFormatCode();
      $time = PHPExcel_Style_NumberFormat::toFormattedString($time, $formatTime);
      $visibility = trim($activeSheet->getCellByColumnAndRow(5, $l)->getValue());
      $specie = trim($activeSheet->getCellByColumnAndRow(7, $l)->getValue());
      //$group = trim($activeSheet->getCellByColumnAndRow(5, $l)->getValue());
      $total = trim($activeSheet->getCellByColumnAndRow(8, $l)->getValue());
      $behaviour = trim($activeSheet->getCellByColumnAndRow(12, $l)->getValue());
      //$direction = trim($activeSheet->getCellByColumnAndRow(8, $l)->getValue());
      //$horizontal = trim($activeSheet->getCellByColumnAndRow(9, $l)->getValue());
      //$vertical = trim($activeSheet->getCellByColumnAndRow(10, $l)->getValue());
      //$comment = trim($activeSheet->getCellByColumnAndRow(11, $l)->getValue());
      $company_acronym = trim($activeSheet->getCellByColumnAndRow(16, $l)->getValue());
      //$watchman = trim($activeSheet->getCellByColumnAndRow(13, $l)->getValue());
      $post = trim($activeSheet->getCellByColumnAndRow(14, $l)->getValue());
      $latitude = trim($activeSheet->getCellByColumnAndRow(3, $l)->getValue());
      $longitude = trim($activeSheet->getCellByColumnAndRow(4, $l)->getValue());
      $vessel = trim($activeSheet->getCellByColumnAndRow(17, $l)->getValue());

      // testar campos individualmente
      // date
      if( !strlen($date) && isset($last_date) ){
        $log[] = array( 'line' => $l, 'column' => 'A', 'error' => 'A data é um campo obrigatório');
      }
      if( strlen($date) ){
        if( !preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) ){
          $log[] = array( 'line' => $l, 'column' => 'A', 'error' => 'A data "'.$date.'" tem um formato inválido. o formato correto é: yyyy-mm-dd');
        }
      }
      // code
      if( !strlen($code) ) {
        $log[] = array( 'line' => $l, 'column' => 'B', 'error' => 'O código é um campo obrigatório');
      } else {
        if( $code == 'I' && !strlen($date)){
          $log[] = array( 'line' => $l, 'column' => 'A', 'error' => 'A data é um campo obrigatório');
        }
        if( !array_key_exists($code, $next_codes) ) {
          $log[] = array( 'line' => $l, 'column' => 'B', 'error' => 'O código "'.$code.'" não existe. os códigos permitidos são: I, R, RA, F.');
        } else {
          if( !in_array($code, $next_codes[$prev_code]) ) {
            $log[] = array( 'line' => $l, 'column' => 'B', 'error' => 'O código "'.$code.'" não pode ser usado após "'.$prev_code.'". os códigos permitidos são: '.implode(', ', $next_codes[$prev_code]).'.');
          }
          $prev_code = $code;
        }
      }
      //Time
      if( strlen($time) ){
        if( !preg_match("/^(\d{2}:\d{2}:\d{2}|\d{2}:\d{2})$/", $time) ){
          $log[] = array( 'line' => $l, 'column' => 'C', 'error' => 'A hora "'.$time.'" tem um formato inválido. O formato correto é: hh:mm:ss ou hh:mm.');
        }
      } else {
        $log[] = array( 'line' => $l, 'column' => 'C', 'error' => 'A hora é um campo obrigatório');
      }
      //visibility
      if( strlen($visibility) ){
        if( !isset($vis_cache[$visibility]) ) {
          $vis = VisibilityPeer::getByCode($visibility);
          if( !is_object($vis) ){
            $log[] = array( 'line' => $l, 'column' => 'D', 'error' => 'Não existe o código "'.$visibility.'" para a visibilidade.');
          } else {
            $vis_cache[$visibility] = $vis->getDescription('pt');
          }
        }
      }
      //specie
      if( strlen($specie) ){
        if( !isset($specie_cache[$specie]) ) {
          $sp = SpeciePeer::getByCode2($specie);
          if( !is_object($sp) ){
            $log[] = array( 'line' => $l, 'column' => 'E', 'error' => 'Não existe o código "'.$specie.'" para a espécie.');
          } else {
            $specie_cache[$specie] = $sp->getCode();
          }
        }
      }
      //total
      if( strlen($total) ){
        if( !preg_match("/^(\d{1}|\d{2}|\d{3}|\d{4})$/", $total) ){
          $log[] = array( 'line' => $l, 'column' => 'G', 'error' => 'O total de indivíduos "'.$total.'" tem que ser um número inteiro.');
        }
      }
      //behaviour
      if( strlen($behaviour) ){
        if( !isset($behav_cache[$behaviour]) ) {
          $behav = BehaviourPeer::getByCode2($behaviour);
          if( !is_object($behav) ){
            $log[] = array( 'line' => $l, 'column' => 'H', 'error' => 'Não existe o código "'.$behaviour.'" para o comportamento.');
          } else {
            $behav_cache[$behaviour] = $behav->getCode();
          }
        }
      }

      // A seguinte informação só é lida quando o campo de data é preenchido,
      // e o campo de data respectivamente fica só no primeiro registo,
      // assim os seguintes são implicitamente parte do watch_info actual
      if ( strlen($date) ) {
        // Company
        if( strlen($company_acronym) ){
          if( !isset($comp_cache[$company_acronym]) ) {
            $comp = CompanyPeer::getByAcronym($company_acronym);
            if( !is_object($comp) ){
              $log[] = array( 'line' => $l, 'column' => 'M', 'error' => 'Não existe o acrónimo "'.$company_acronym.'" para a empresa.');
            } else {
              $comp_cache[$company_acronym] = $comp->getAcronym();
            }
          }
        } else {
          $log[] = array( 'line' => $l, 'column' => 'M', 'error' => 'A empresa é um campo obrigatório');
        }
      }

      //Latitude not validated on import

      //Longitude not validated on import

      //Vessel
      if( strlen($vessel) ){
        if( !isset($vessel_cache[$company_acronym.$vessel]) ) {
          $vess = VesselPeer::getByNameAndCompanyAcronym($vessel, $company_acronym);
          if( !is_object($vess) ){
            $log[] = array( 'line' => $l, 'column' => 'R', 'error' => 'Não existe o nenhum barco com o nome "'.$vessel.'" da empresa "'.$company_acronym.'".');
          } else {
            $vessel_cache[$company_acronym.$vessel] = $vess->getName();
          }
        }
      }

    }
    return $log;
  }

  public function executeLoadImportFile(sfWebRequest $request){

    $objReader = new PHPExcel_Reader_Excel5();
    $objPHPExcel = $objReader->load(sfConfig::get('sf_upload_dir').'/import/import.xls');

    //$l = 3;
    //$c = 0;
    //$objPHPExcel->getActiveSheet()->getCellByColumnAndRow($c, $l)->getValue();

    $giid = 0;
    $record = null;
    $sighting = null;
    $general_info = null;

    //percorrer as linhas
    for($l=3 ; strcmp($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $l)->getValue(),'') != 0 ; $l++){
      $code = trim($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $l)->getValue());

      // criar nova general info caso registo seja 'I'
      if(strcmp(strtoupper($code),'I') == 0){
        $gi = new GeneralInfo();
        $barco = VesselPeer::getBarcoByNome($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(17, $l)->getValue());
        if ($barco) $gi->setVesselId($barco->getId());

        $skipper = SkipperPeer::getSkipperByNome($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(18, $l)->getValue());
        if($skipper) $gi->setSkipperId($skipper->getId());

        $guia = GuidePeer::getGuiaByNome($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(19, $l)->getValue());
        if($guia) $gi->setGuideId($guia->getId());

        $empresa = CompanyPeer::getByAcronym($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(16, $l)->getValue());
        if($empresa){
          $gi->setCompanyId($empresa->getId());
          $gi->setBaseLatitude($empresa->getBaseLatitude());
          $gi->setBaseLongitude($empresa->getBaseLongitude());
        }

        $value = $objPHPExcel->getActiveSheet()->getCell('A'.$l)->getValue();
        $formatCode = $objPHPExcel->getActiveSheet()->getStyle('A'.$l)->getNumberFormat()->getFormatCode();
        $formattedString = PHPExcel_Style_NumberFormat::toFormattedString($value, $formatCode);
        $dia = substr($formattedString,8,2);
        $mes = substr($formattedString,5,2);
        $ano = substr($formattedString,0,4);

        $gi->setDate($ano.'-'.$mes.'-'.$dia);
        //echo $formattedString;
        if($barco && $empresa){
          $gi->setCode(mfUtils::gerarCodigoGi($empresa->getId(), $gi->getDate()));
        }
        $gi->save();
        $general_info = $gi;
      }

      $record = new Record();
      $sighting = new Sighting();

      $record->setGeneralInfoId($general_info->getId());

      // inserir registos
      $codigo = CodePeer::getByAcronym(strtoupper($code));

      if($codigo) $record->setCodeId($codigo->getId());

      $vis = VisibilityPeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5, $l)->getValue());
      if($vis) $record->setVisibilityId($vis->getId());
      
      $seaCode = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $l)->getValue();
      $sea = SeaStatePeer::getByCode($seaCode);
      
      if($sea) $record->setSeaStateId($sea->getId());

      $value = $objPHPExcel->getActiveSheet()->getCell('C'.$l)->getValue();
      $formatCode = $objPHPExcel->getActiveSheet()->getStyle('C'.$l)->getNumberFormat()->getFormatCode();
      $formattedString = PHPExcel_Style_NumberFormat::toFormattedString($value, $formatCode);

      //echo $formattedString;
      $record->setTime($formattedString);

      $latitude = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $l)->getValue();
      if(strcmp(strtoupper($latitude),'BASE') == 0){
        $latitude = $general_info->getBaseLatitude();
      }
      $record->setLatitude($latitude);

      $longitude = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $l)->getValue();
      if(strcmp(strtoupper($longitude),'BASE') == 0){
        $longitude = $general_info->getBaseLongitude();
      }
      $record->setLongitude($longitude);

      $record->setNumVessels($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(14, $l)->getValue());

      $record->save();

      // inserir sightings
      $sighting->setRecordId($record->getId());

      $esp = SpeciePeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7, $l)->getValue());
      if($esp) $sighting->setSpecieId($esp->getId());

      $beh = BehaviourPeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12, $l)->getValue());
      if($beh) $sighting->setBehaviourId($beh->getId());

      $asso = AssociationPeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(13, $l)->getValue());
      if($asso) $sighting->setAssociationId($asso->getId());

      $sighting->setAdults($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(9, $l)->getValue());
      $sighting->setJuveniles($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(10, $l)->getValue());
      $sighting->setCalves($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(11, $l)->getValue());
      $sighting->setTotal($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8, $l)->getValue());
      $sighting->setComments($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(15, $l)->getValue());

      $sighting->save();
    }

    $this->redirect('general_info/sheet?giid='.$general_info->getId());
  }

  public function executeDownload(sfWebRequest $request){
    $this->forward404Unless( $request->isMethod(sfRequest::POST) );

//    $year = $request->getParameter('year');
//
//    if($request->getParameter('month') && $request->getParameter('month') != 0) {
//      $month = $request->getParameter('month');
//      // criar o ficheiro excel
//      $objPHPExcel = $this->generateExportExcelObject($year, $month);
//      $filename = $year.'_'.$month;
//    }else {
//      // criar o ficheiro excel
//      $objPHPExcel = $this->generateExportExcelObject($year);
//      $filename = $year;
//    }
//
//    // download do ficheiro sem o guardar
//    header('Content-Type: application/vnd.ms-excel');
//    header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
//    header('Cache-Control: max-age=0');
//    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//    $objWriter->save('php://output');
//    return sfView::NONE;

    if($request->getParameter('month') && $request->getParameter('month') != 0) {

        $year = $request->getParameter('year');
        $month = $request->getParameter('month');

        // criar o ficheiro excel
        $objPHPExcel = $this->generateExportExcelObject($year, $month);

        $this->filename = $year;

        // download do ficheiro sem o guardar
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$this->filename.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        return sfView::NONE;

    }else {
      if(!file_exists(sfConfig::get('sf_upload_dir').'/export/'.$request->getParameter('year').'.xls')) {
        //set_time_limit(600);

        $year = $request->getParameter('year');

        // criar o ficheiro excel
        $objPHPExcel = $this->generateExportExcelObject($year);

        $this->filename = $year;

        // guardar e fazer download do ficheiro
        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter->save(sfConfig::get('sf_upload_dir').'/export/'.$this->filename.'.xls');
        chmod(sfConfig::get('sf_upload_dir').'/export/'.$this->filename.'.xls', 0777);
        $this->filedir = '/uploads/export/'.$this->filename.'.xls';

      } else {

        // se o ficheiro existe, envia o ficheiro existente
        $this->filename = $request->getParameter('year');
        $this->filedir = '/uploads/export/'.$this->filename.'.xls';
      }
    }

  }


  public function generateExportExcelObject($year, $month = null) {

      //ini_set("memory_limit","300M");

      // buscar os dados
//      $c = new Criteria();
//
//      if(!is_null($month)){
//        if($month < 10) $month = '0'.$month;
//        $c->add(GeneralInfoPeer::DATE, $year.'-'.$month.'-%', Criteria::LIKE);
//
//      } else {
//        $c->addAnd(GeneralInfoPeer::DATE, $year.'-1-1', Criteria::GREATER_EQUAL);
//        $c->addAnd(GeneralInfoPeer::DATE, $year.'-12-31', Criteria::LESS_EQUAL);
//      }
//
//      $dados = GeneralInfoPeer::doSelect($c);
      $query = GeneralInfoQuery::create();
      if(!is_null($month)){
        if( $month < 12 ) {
          $query = $query->filterByDate($year.'-'.$month.'-1', Criteria::GREATER_EQUAL)->filterByDate( $year.'-'.($month+1).'-1', Criteria::LESS_THAN );
        } else {
          $query = $query->filterByDate($year.'-12-1', Criteria::GREATER_EQUAL)->filterByDate( $year.'-12-31', Criteria::LESS_EQUAL );
        }
      } else {
        $query = $query->filterByDate($year.'-1-1', Criteria::GREATER_EQUAL)->filterByDate( ($year+1).'-1-1', Criteria::LESS_THAN );
        //$query = $query->where('GeneralInfo.Date >= ?', $year.'-1-1')->where('GeneralInfo.Date < ?', ($year+1).'-1-1');
      }
      $dados = $query->setFormatter(ModelCriteria::FORMAT_ON_DEMAND)->find();

      $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_discISAM;
      PHPExcel_Settings::setCacheStorageMethod($cacheMethod);

      // criação do ficheiro Excel (.xls)
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->getProperties()
      ->setCreator("Monicet")
      ->setLastModifiedBy("Monicet")
      ->setTitle("Mapa de Saidas")
      ->setSubject("Mapa de Saidas")
      ->setDescription("Exportação de saidas do Monicet")
      ->setKeywords("Mapa Saidas")
      ->setCategory("Saidas");
      $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
      $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
      $objPHPExcel->getDefaultStyle()->getFont()->setColor(new PHPExcel_Style_Color('33333333'));

      // edição do conteúdo do ficheiro
        // headers

      $cena = $objPHPExcel->getActiveSheet();


      $cena->setCellValueByColumnAndRow(3,1, 'Position /EFF');
      $cena->setCellValueByColumnAndRow(12,1, 'Sighting');
      $cena->setCellValueByColumnAndRow(19,1, 'Inf. Geral');

      $cena->getRowDimension(2)->setRowHeight(30);
      $cena->getStyle('A2:V2')
          ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


      $cena->getStyle('A1')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000ff');

      //$objPHPExcel->getActiveSheet()->mergeCells('B1:E1');
      $cena->getStyle('C1:E1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
      $cena->getStyle('B1:E1')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('ffff99');

      //$objPHPExcel->getActiveSheet()->mergeCells('F1:G1');
      $cena->getStyle('G1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
      $cena->getStyle('F1:G1')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000ff');

      //$objPHPExcel->getActiveSheet()->mergeCells('H1:P1');
      $cena->getStyle('I1:P1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
      $cena->getStyle('H1:P1')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('ff9900');

      //$objPHPExcel->getActiveSheet()->mergeCells('Q1:V1');
      $cena->getStyle('R1:V1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
      $cena->getStyle('Q1:V1')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000ff');


      $cena->getStyle('A2:V2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);

      $headers = array();
      $headers[0] = array();

      $cena->setCellValueByColumnAndRow(0,2, 'Data');
      $cena->getStyle('A2')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('33cccc');

      $headers[0][] = 'Cod.';
      $headers[0][] = 'Hora';
      $headers[0][] = 'Latitude';
      $headers[0][] = 'Longitude';
      $headers[0][] = 'Vis.';
      $headers[0][] = 'Est. Mar';
      $headers[0][] = 'Sp.';
      $headers[0][] = 'Total';
      $headers[0][] = 'A';
      $headers[0][] = 'J';
      $headers[0][] = 'C';
      $headers[0][] = 'Comp';
      $headers[0][] = 'Asso';
      $headers[0][] = 'Num. Emb.';
      $headers[0][] = 'Comentários';
      $headers[0][] = 'Empresa';
      $headers[0][] = 'Barco';
      $headers[0][] = 'Skipper';
      $headers[0][] = 'Biologist';
      $headers[0][] = 'Passg';
      $headers[0][] = 'Dist. Percorrida';
      $cena->fromArray($headers,null,'B2');

      $cena->getStyle('A1:V1')->getFont()->setBold(true);
      $cena->getStyle('A1:V1')->getFont()->setSize(12);
      $cena->getStyle('A2:V2')->getFont()->setBold(true);
      $cena->getStyle('A2:V2')->getFont()->setSize(12);



      $letras = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V');
      foreach($letras as $letra){
        $cena->getColumnDimension($letra)->setAutoSize(true);
      }
      unset($letras);

      // conteudo
      $l = 3;
      //$l_arr = 0;
      $code_cache = array();
      $array = array();
      $vis_cache = array();
      $sea_state_cache = array();
      $company_cache = array();
      $vessel_cache = array();
      $skipper_cache = array();
      $guide_cache = array();
      $specie_cache = array();
      $association_cache = array();

      foreach($dados as $gi){

        $cena->setCellValueByColumnAndRow(0,$l, $gi->getDate());
        $records = RecordPeer::doSelectRecordsByGeneralInfoId($gi->getId());
        foreach($records as $record){
          // buscar sighting correspondente
          $sighting = SightingPeer::retrieveByRecordId($record->getId());

          // buscar especie
          $specie = '';
          if($sighting->getSpecieId()){
            if( !isset( $specie_cache[$sighting->getSpecieId()] ) ){
              $specie_cache[$sighting->getSpecieId()] = $sighting->getSpecie()->getCode();
            }
            $specie = $specie_cache[$sighting->getSpecieId()];
          }

          // buscar associacao
          $association = '';
          if($sighting->getAssociationId()){
            if( !isset( $association_cache[$sighting->getAssociationId()] ) ) {
              $association_cache[$sighting->getAssociationId()] = $sighting->getAssociation()->getCode();
            }
            $association = $association_cache[$sighting->getAssociationId()];
          }

          // criar o array para escrever no ficheiro
          $array[0] = array();
          if( !isset( $code_cache[$record->getCodeId()] ) ){
            $code_cache[$record->getCodeId()] = $record->getCode()->getAcronym();
          }
          $array[0][] = $code_cache[$record->getCodeId()];
          $array[0][] = $record->getTime();
          $array[0][] = $record->getLatitude();
          $array[0][] = $record->getLongitude();

          if($record->getVisibilityId()){
            if( !isset($vis_cache[$record->getVisibilityId()])) {
              $vis_cache[$record->getVisibilityId()] = $record->getVisibility()->getCode();
            }
            $array[0][] = $vis_cache[$record->getVisibilityId()];
          } else {
            $array[0][] = null;
          }

          if($record->getSeaStateId()){
            if( !isset( $sea_state_cache[$record->getSeaStateId()] ) ){
              $sea_state_cache[$record->getSeaStateId()] = $record->getSeaState()->getCode();
            }
            $array[0][] = $sea_state_cache[$record->getSeaStateId()];
          } else {
            $array[0][] = null;
          }

          $array[0][] = $specie;
          $array[0][] = $sighting->getTotal();
          $array[0][] = $sighting->getAdults();
          $array[0][] = $sighting->getJuveniles();
          $array[0][] = $sighting->getCalves();
          $array[0][] = $sighting->getBehaviourId();
          $array[0][] = $association;
          $array[0][] = $record->getNumVessels();
          $array[0][] = $sighting->getComments();

          if($gi->getCompanyId()){
            if( !isset( $company_cache[$gi->getCompanyId()] ) ){
              $company_cache[$gi->getCompanyId()] = $gi->getCompany()->getName();
            }
            $array[0][] = $company_cache[$gi->getCompanyId()];
          } else {
            $array[0][] = null;
          }

          if($gi->getVesselId()){
            if( !isset( $vessel_cache[$gi->getVesselId()] ) ){
              $vessel_cache[$gi->getVesselId()] = $gi->getVessel()->getName();
            }
            $array[0][] = $vessel_cache[$gi->getVesselId()];
          } else {
            $array[0][] = null;
          }

          if($gi->getSkipperId()){
            if( !isset( $skipper_cache[$gi->getSkipperId()] ) ){
              $skiper_cache[$gi->getSkipperId()] = $gi->getSkipper()->getName();
            }
            $array[0][] = $skiper_cache[$gi->getSkipperId()];
          } else {
            $array[0][] = null;
          }

          if($gi->getGuideId()){
            if( !isset( $guide_cache[$gi->getGuideId()] ) ){
              $guide_cache[$gi->getGuideId()] = $gi->getGuide()->getName();
            }
            $array[0][] = $guide_cache[$gi->getGuideId()];
          } else {
            $array[0][] = null;
          }

          //if($gi->getCompanyId()) $array[0][] = $gi->getCompany()->getName(); else $array[0][] = null;
          //if($gi->getVesselId()) $array[0][] = $gi->getVessel()->getName(); else $array[0][] = null;
          //if($gi->getSkipperId()) $array[0][] = $gi->getSkipper()->getName(); else $array[0][] = null;
          //if($gi->getGuideId()) $array[0][] = $gi->getGuide()->getName(); else $array[0][] = null;

          unset($sighting);
          unset($specie);
          unset($association);
          $cena->fromArray($array, null, 'B'.$l);
          $l++;
        }

      }

      // escrever o array no ficheiro


      return $objPHPExcel;
  }



  public function executeIndex(sfWebRequest $request)
  {


    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeValidation(sfWebRequest $request){
    $this->valid = $request->getParameter('valid');
    $this->comments = $request->getParameter('comments');

    $general_info = GeneralInfoQuery::create()
                            ->filterById($request->getParameter('general_info_id'))
                            ->findOne();
    if(strcmp($this->valid,'true') == 0){
      $general_info->setValid(1);
    }else{
      $general_info->setValid(0);
    }
    $general_info->setComments($this->comments);
    $general_info->save();

    return sfView::NONE;
  }

  public function executeExport(sfWebRequest $request) {
    $c = new Criteria();
    $c->addDescendingOrderByColumn(GeneralInfoPeer::DATE);
    $gis = GeneralInfoPeer::doSelect($c);

    $temp = substr($gis[0]->getDate(),0,4);
    $this->years = array();
    $this->years[] = $temp;
    foreach($gis as $gi) {
      if(substr($gi->getDate(),0,4) != $temp) {
        $temp = substr($gi->getDate(),0,4);
        $this->years[] = $temp;
      }
    }
  }


  public function executeCreate(sfWebRequest $request)
  {
      $this->form = $this->configuration->getForm();
      $this->GeneralInfo = $this->form->getObject();

      // eliminar ficheiro com o mesmo ano
      if(file_exists(sfConfig::get('sf_upload_dir').'/export/'.substr($this->GeneralInfo->getDate(),0,4).'.xls')) {
        unlink(sfConfig::get('sf_upload_dir').'/export/'.substr($this->GeneralInfo->getDate(),0,4).'.xls');
      }

      $this->processForm($request, $this->form);
      $this->setTemplate('new');
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->GeneralInfo = $this->getRoute()->getObject();

      // eliminar ficheiro com o mesmo ano
      if(file_exists(sfConfig::get('sf_upload_dir').'/export/'.substr($this->GeneralInfo->getDate(),0,4).'.xls')) {
        unlink(sfConfig::get('sf_upload_dir').'/export/'.substr($this->GeneralInfo->getDate(),0,4).'.xls');
      }

      $this->form = $this->configuration->getForm($this->GeneralInfo);
      $this->processForm($request, $this->form);
      $this->setTemplate('edit');
  }
  public function executeDelete(sfWebRequest $request)
  {
      $request->checkCSRFProtection();
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
      $this->GeneralInfo = $this->getRoute()->getObject();

      // eliminar ficheiro com o mesmo ano
      if(file_exists(sfConfig::get('sf_upload_dir').'/export/'.substr($this->GeneralInfo->getDate(),0,4).'.xls')) {
        unlink(sfConfig::get('sf_upload_dir').'/export/'.substr($this->GeneralInfo->getDate(),0,4).'.xls');
      }

      $this->getRoute()->getObject()->delete();
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
      $this->redirect('@general_info');
  }

}
