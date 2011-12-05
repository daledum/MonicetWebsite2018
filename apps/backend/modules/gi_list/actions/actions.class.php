<?php

require_once dirname(__FILE__).'/../lib/gi_listGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/gi_listGeneratorHelper.class.php';

/**
 * gi_list actions.
 *
 * @package    monicet
 * @subpackage gi_list
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class gi_listActions extends autoGi_listActions
{
	public function executeListShowMap(sfWebRequest $request) {
        $giid = $request->getParameter('id');
        $this->redirect('@generalInfoPublicMap?general_info_id=' . $giid);
    }
	  
	public function executeListShowGrid(sfWebRequest $request) {
	    $giid = $request->getParameter('id');
		$this->redirect('gi_list/sheet?giid=' . $giid);
	}
	
	public function executeSheet(sfWebRequest $request)
    {
        $this->general_info = GeneralInfoQuery::create()
                                ->filterById($request->getParameter("giid"))
                                ->findOne();
        $this->records = $this->general_info->getRecords();
        $this->n_lines = count($this->records);
    }
    
    public function executeDownload(sfWebRequest $request){
    
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
          if(!file_exists(sfConfig::get('sf_upload_dir').'/export_gi_list/'.$request->getParameter('year').'.xls')) {
            set_time_limit(600);
            
            $year = $request->getParameter('year');
            
            // criar o ficheiro excel
            $objPHPExcel = $this->generateExportExcelObject($year);
            
            $this->filename = $year;
            
            // guardar e fazer download do ficheiro
            $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
            $objWriter->save(sfConfig::get('sf_upload_dir').'/export_gi_list/'.$this->filename.'.xls');
            chmod(sfConfig::get('sf_upload_dir').'/export_gi_list/'.$this->filename.'.xls', 0777);
            $this->filedir = '/uploads/export_gi_list/'.$this->filename.'.xls';
            
          } else {
            
            // se o ficheiro existe, envia o ficheiro existente
            $this->filename = $request->getParameter('year');
            $this->filedir = '/uploads/export_gi_list/'.$this->filename.'.xls';
          }
        }
        
      }

    public function generateExportExcelObject($year, $month = null) {
      
      // buscar os dados
      $c = new Criteria();
      
      if(!is_null($month)){
        if($month < 10) $month = '0'.$month;
        $c->add(GeneralInfoPeer::DATE, $year.'-'.$month.'-%', Criteria::LIKE);
        
      } else {
        $c->addAnd(GeneralInfoPeer::DATE, $year.'-1-1', Criteria::GREATER_EQUAL);
        $c->addAnd(GeneralInfoPeer::DATE, $year.'-12-31', Criteria::LESS_EQUAL);
      }
      
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
          
          // criar o array para escrever no ficheiro
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
          
          $l++;
          $l_arr++;
        }
        
      }
      
      // escrever o array no ficheiro
      $cena->fromArray($array,null,'B3');
      
      return $objPHPExcel;
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
    
}
