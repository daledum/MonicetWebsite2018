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
      
    // buscar os dados  
    $dados = GeneralInfoPeer::doSelect($this->buildCriteria());
      
      
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
    
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,1, 'Position /EFF');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,1, 'Sighting');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(19,1, 'Inf. Geral');
    
    $objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(30);
    $objPHPExcel->getActiveSheet()->getStyle('A2:V2')
        ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    
    
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()
      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      ->getStartColor()->setRGB('0000ff');
    
    //$objPHPExcel->getActiveSheet()->mergeCells('B1:E1');
    $objPHPExcel->getActiveSheet()->getStyle('C1:E1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
    $objPHPExcel->getActiveSheet()->getStyle('B1:E1')->getFill()
      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      ->getStartColor()->setRGB('ffff99');
    
    //$objPHPExcel->getActiveSheet()->mergeCells('F1:G1');
    $objPHPExcel->getActiveSheet()->getStyle('G1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
    $objPHPExcel->getActiveSheet()->getStyle('F1:G1')->getFill()
      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      ->getStartColor()->setRGB('0000ff');
    
    //$objPHPExcel->getActiveSheet()->mergeCells('H1:P1');
    $objPHPExcel->getActiveSheet()->getStyle('I1:P1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
    $objPHPExcel->getActiveSheet()->getStyle('H1:P1')->getFill()
      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      ->getStartColor()->setRGB('ff9900');
    
    //$objPHPExcel->getActiveSheet()->mergeCells('Q1:V1');
    $objPHPExcel->getActiveSheet()->getStyle('R1:V1')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
    $objPHPExcel->getActiveSheet()->getStyle('Q1:V1')->getFill()
      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      ->getStartColor()->setRGB('0000ff');
      
    
    $objPHPExcel->getActiveSheet()->getStyle('A2:V2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
    
      
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,2, 'Data');
    $objPHPExcel->getActiveSheet()->getStyle('A2')->getFill()
      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      ->getStartColor()->setRGB('33cccc');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,2, 'Cod.');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,2, 'Hora');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,2, 'Latitude');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,2, 'Longitude');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,2, 'Vis.');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,2, 'Est. Mar');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,2, 'Sp.');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,2, 'Total');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,2, 'A');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,2, 'J');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,2, 'C');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,2, 'Comp');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(13,2, 'Asso');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(14,2, 'Num. Emb.');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(15,2, 'Comentários');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(16,2, 'Empresa');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(17,2, 'Barco');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(18,2, 'Skipper');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(19,2, 'Biologist');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(20,2, 'Passg');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(21,2, 'Dist. Precorrida');
    $objPHPExcel->getActiveSheet()->getStyle('A1:V1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('A1:V1')->getFont()->setSize(12);
    $objPHPExcel->getActiveSheet()->getStyle('A2:V2')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('A2:V2')->getFont()->setSize(12);
    $letras = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V');
    foreach($letras as $letra){
      $objPHPExcel->getActiveSheet()->getColumnDimension($letra)->setAutoSize(true);
    }
    
      // conteudo
    $l = 3;
    foreach($dados as $gi){
      $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$l, $gi->getDate());
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$l, $record->getCode()->getAcronym());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$l, $record->getTime());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$l, $record->getLatitude());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$l, $record->getLongitude());
        if($record->getVisibility()) $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$l, $record->getVisibility()->getCode());
        if($record->getSeaState()) $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$l, $record->getSeaState()->getCode());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$l, $specie);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$l, $sighting->getTotal());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$l, $sighting->getAdults());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,$l, $sighting->getJuveniles());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,$l, $sighting->getCalves());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,$l, $sighting->getBehaviourId());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(13,$l, $association);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(14,$l, $record->getNumVessels());
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(15,$l, $sighting->getComments());
        if($gi->getCompany()) $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(16,$l, $gi->getCompany()->getName());
        if($gi->getVessel()) $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(17,$l, $gi->getVessel()->getName());
        if($gi->getSkipper()) $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(18,$l, $gi->getSkipper()->getName());
        if($gi->getGuide()) $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(19,$l, $gi->getGuide()->getName());
        $l++;
      }
    }
    
    // download do ficheiro
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Dados Exportados - '.date("Y-m-d H:i:s").'.xls"');
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
  

  
}
