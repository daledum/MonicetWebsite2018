<?php

require_once dirname(__FILE__).'/../lib/general_infoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/general_infoGeneratorHelper.class.php';


class general_infoActions extends autoGeneral_infoActions
{
  public function executeListShowGrid(sfWebRequest $request) {
    $giid = $request->getParameter('id');
    $this->redirect('general_info/sheet?giid=' . $giid);
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
    $this->records = $this->general_info->getRecords();
    $this->n_lines = count($this->records);
    
    $this->gi_form = new GeneralInfoForm($this->general_info);
  }
  
  public function executeCoordAjax(sfWebRequest $request){
    $companhia = CompanyPeer::retrieveByPk($request->getParameter('company_id'));
    $this->latitude = $companhia->getBaseLatitude();
    $this->longitude = $companhia->getBaseLongitude();
  }
  
  public function executeUpload(sfWebRequest $request){
      
    $this->form = new importXlsForm();
    
    if($request->isMethod('post')){
      
      $this->form->bind($request->getParameter('importXls'),$request->getFiles('importXls'));
      if($this->form->isValid()){
        
        $file = $this->form->getValue('ficheiro');
        
        
        $file->save(sfConfig::get('sf_upload_dir').'/import/import.xls');
        
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
            
            $empresa = CompanyPeer::getEmpresaByNome($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(16, $l)->getValue());
            if($empresa){
              $gi->setCompanyId($empresa->getId());
              $gi->setBaseLatitude($empresa->getBaseLatitude());
              $gi->setBaseLongitude($empresa->getBaseLongitude());
            } 
            
            $value = $objPHPExcel->getActiveSheet()->getCell('A'.$l)->getValue();
            $formatCode = $objPHPExcel->getActiveSheet()->getStyle('A'.$l)->getNumberFormat()->getFormatCode();
            $formattedString = PHPExcel_Style_NumberFormat::toFormattedString($value, $formatCode);
            $dia = substr($formattedString,3,2);
            $mes = substr($formattedString,0,2);
            $ano = substr($formattedString,6,2);
            
            $gi->setDate('20'.$ano.'-'.$mes.'-'.$dia);
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
          
          $sea = SeaStatePeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $l)->getValue());
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
          else{
            $latitude = mfUtils::convertLatLong($latitude);
          }
          $record->setLatitude($latitude);
          
          $longitude = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $l)->getValue();
          if(strcmp(strtoupper($longitude),'BASE') == 0){
            $longitude = $general_info->getBaseLongitude();
          }
          else{
            $longitude = mfUtils::convertLatLong($longitude);
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
      }
      
      $this->redirect('@general_info');
      
    }
  }
  
  public function executeDownload(sfWebRequest $request){
    set_time_limit(600);
    // buscar os dados  
    //$dados = GeneralInfoPeer::doSelect($this->buildCriteria());
    $year = $request->getParameter('year');
    $c = new Criteria();
    $c->addAnd(GeneralInfoPeer::DATE, $year.'-1-1', Criteria::GREATER_EQUAL);
    $c->addAnd(GeneralInfoPeer::DATE, $year.'-12-31', Criteria::LESS_EQUAL);
    $dados = GeneralInfoPeer::doSelect($c);
      
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
    $headers[0][] = 'Dist. Precorrida';
    $cena->fromArray($headers,null,'B2');
    
    /*
    $cena->setCellValueByColumnAndRow(1,2, 'Cod.');
    $cena->setCellValueByColumnAndRow(2,2, 'Hora');
    $cena->setCellValueByColumnAndRow(3,2, 'Latitude');
    $cena->setCellValueByColumnAndRow(4,2, 'Longitude');
    $cena->setCellValueByColumnAndRow(5,2, 'Vis.');
    $cena->setCellValueByColumnAndRow(6,2, 'Est. Mar');
    $cena->setCellValueByColumnAndRow(7,2, 'Sp.');
    $cena->setCellValueByColumnAndRow(8,2, 'Total');
    $cena->setCellValueByColumnAndRow(9,2, 'A');
    $cena->setCellValueByColumnAndRow(10,2, 'J');
    $cena->setCellValueByColumnAndRow(11,2, 'C');
    $cena->setCellValueByColumnAndRow(12,2, 'Comp');
    $cena->setCellValueByColumnAndRow(13,2, 'Asso');
    $cena->setCellValueByColumnAndRow(14,2, 'Num. Emb.');
    $cena->setCellValueByColumnAndRow(15,2, 'Comentários');
    $cena->setCellValueByColumnAndRow(16,2, 'Empresa');
    $cena->setCellValueByColumnAndRow(17,2, 'Barco');
    $cena->setCellValueByColumnAndRow(18,2, 'Skipper');
    $cena->setCellValueByColumnAndRow(19,2, 'Biologist');
    $cena->setCellValueByColumnAndRow(20,2, 'Passg');
    $cena->setCellValueByColumnAndRow(21,2, 'Dist. Precorrida');*/
    
    $cena->getStyle('A1:V1')->getFont()->setBold(true);
    $cena->getStyle('A1:V1')->getFont()->setSize(12);
    $cena->getStyle('A2:V2')->getFont()->setBold(true);
    $cena->getStyle('A2:V2')->getFont()->setSize(12);
    
    
    
    $letras = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V');
    foreach($letras as $letra){
      $cena->getColumnDimension($letra)->setAutoSize(true);
    }
    
      // conteudo
    $l = 3;
    $l_arr = 0;
    $array = array();
    
    foreach($dados as $gi){
      
      $cena->setCellValueByColumnAndRow(0,$l, $gi->getDate());
      $records = RecordPeer::doSelectRecordsByGeneralInfoId($gi->getId());
      foreach($records as $record){
        // buscar sighting correspondente
        $sighting = SightingPeer::retrieveByRecordId($record->getId());
        
        // buscar especie
        $specie = '';
        if($sighting->getSpecieId()){
          $specie = $sighting->getSpecie()->getCode();
        }
        
        // buscar associacao
        $association = '';
        if($sighting->getAssociationId()){
          $association = $sighting->getAssociation()->getCode();
        }
        
        // escrever no ficheiro
        /*$cena->setCellValueByColumnAndRow(1,$l, $record->getCode()->getAcronym());
        $cena->setCellValueByColumnAndRow(2,$l, $record->getTime());
        $cena->setCellValueByColumnAndRow(3,$l, $record->getLatitude());
        $cena->setCellValueByColumnAndRow(4,$l, $record->getLongitude());
        if($record->getVisibility()) $cena->setCellValueByColumnAndRow(5,$l, $record->getVisibility()->getCode());
        if($record->getSeaState()) $cena->setCellValueByColumnAndRow(6,$l, $record->getSeaState()->getCode());
        $cena->setCellValueByColumnAndRow(7,$l, $specie);
        $cena->setCellValueByColumnAndRow(8,$l, $sighting->getTotal());
        $cena->setCellValueByColumnAndRow(9,$l, $sighting->getAdults());
        $cena->setCellValueByColumnAndRow(10,$l, $sighting->getJuveniles());
        $cena->setCellValueByColumnAndRow(11,$l, $sighting->getCalves());
        $cena->setCellValueByColumnAndRow(12,$l, $sighting->getBehaviourId());
        $cena->setCellValueByColumnAndRow(13,$l, $association);
        $cena->setCellValueByColumnAndRow(14,$l, $record->getNumVessels());
        $cena->setCellValueByColumnAndRow(15,$l, $sighting->getComments());
        if($gi->getCompany()) $cena->setCellValueByColumnAndRow(16,$l, $gi->getCompany()->getName());
        if($gi->getVessel()) $cena->setCellValueByColumnAndRow(17,$l, $gi->getVessel()->getName());
        if($gi->getSkipper()) $cena->setCellValueByColumnAndRow(18,$l, $gi->getSkipper()->getName());
        if($gi->getGuide()) $cena->setCellValueByColumnAndRow(19,$l, $gi->getGuide()->getName());*/
        
        
        $array[$l_arr] = array();
        $array[$l_arr][] = $record->getCode()->getAcronym();
        $array[$l_arr][] = $record->getTime();
        $array[$l_arr][] = $record->getLatitude();
        $array[$l_arr][] = $record->getLongitude();
        if($record->getVisibility()) $array[$l_arr][] = $record->getVisibility()->getCode(); else $array[$l_arr][] = null;
        if($record->getSeaState()) $array[$l_arr][] = $record->getSeaState()->getCode(); else $array[$l_arr][] = null;
        $array[$l_arr][] = $specie;
        $array[$l_arr][] = $sighting->getTotal();
        $array[$l_arr][] = $sighting->getAdults();
        $array[$l_arr][] = $sighting->getJuveniles();
        $array[$l_arr][] = $sighting->getCalves();
        $array[$l_arr][] = $sighting->getBehaviourId();
        $array[$l_arr][] = $association;
        $array[$l_arr][] = $record->getNumVessels();
        $array[$l_arr][] = $sighting->getComments();
        if($gi->getCompany()) $array[$l_arr][] = $gi->getCompany()->getName(); else $array[$l_arr][] = null;
        if($gi->getVessel()) $array[$l_arr][] = $gi->getVessel()->getName(); else $array[$l_arr][] = null;
        if($gi->getSkipper()) $array[$l_arr][] = $gi->getSkipper()->getName(); else $array[$l_arr][] = null;
        if($gi->getGuide()) $array[$l_arr][] = $gi->getGuide()->getName(); else $array[$l_arr][] = null;
        
        $l++;
        $l_arr++;
      }
      
    }

    $cena->fromArray($array,null,'B3');
    
    // download do ficheiro
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$year.' - Dados Exportados - '.date("Y-m-d H:i:s").'.xls"');
    header('Cache-Control: max-age=0');
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    
    return sfView::NONE;
  }



  public function executeIndex(sfWebRequest $request)
  {
    
    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());
    
    if(!$user->getIsSuperAdmin()){
      $this->setFilters(array( 'company_id' => $company->getId()));
    }
    
    
    
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
    
  }
  

  
}
