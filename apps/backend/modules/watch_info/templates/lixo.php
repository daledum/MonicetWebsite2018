
<?php
public function generateExportExcelObject($year, $month = null) {
      
      // buscar os dados
      $c = new Criteria();
      
      if(!is_null($month)){
        if($month < 10) $month = '0'.$month;
        $c->add(WatchInfoPeer::DATE, $year.'-'.$month.'-%', Criteria::LIKE);
        
      } else {
        $c->addAnd(WatchInfoPeer::DATE, $year.'-1-1', Criteria::GREATER_EQUAL);
        $c->addAnd(WatchInfoPeer::DATE, $year.'-12-31', Criteria::LESS_EQUAL);
      }
      
      $dados = WatchInfoPeer::doSelect($c);
        
      $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_discISAM;
      PHPExcel_Settings::setCacheStorageMethod($cacheMethod);
        
      // criação do ficheiro Excel (.xls)
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->getProperties()
      ->setCreator("Monicet")
      ->setLastModifiedBy("Monicet")
      ->setTitle("Mapa de Vigias")
      ->setSubject("Mapa de Vigias")
      ->setDescription("Exportação de vigias do Monicet")
      ->setKeywords("Mapa Vigias")
      ->setCategory("Vigias");
      $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
      $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
      $objPHPExcel->getDefaultStyle()->getFont()->setColor(new PHPExcel_Style_Color('33333333')); 
      
      // edição do conteúdo do ficheiro
        // headers
      
      $cena = $objPHPExcel->getActiveSheet();
      
      $cena->getRowDimension(2)->setRowHeight(30);
      $cena->getStyle('A2:V2')
          ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
      
      $headers = array();
      $headers[0] = array();
      
      $cena->setCellValueByColumnAndRow(0,2, 'Data');
        
      $headers[0][] = 'Cod.';
      $headers[0][] = 'Hora';
      $headers[0][] = 'Vis.';
      $headers[0][] = 'Espécie';
      $headers[0][] = 'Grupo';
      $headers[0][] = 'Total';
      $headers[0][] = 'Comp.';
      $headers[0][] = 'Dir.';
      $headers[0][] = 'Horizontal';
      $headers[0][] = 'Vertical';
      $headers[0][] = 'Embarcação';
      $headers[0][] = 'Comentários';
      $cena->fromArray($headers,null,'B2');
      
      $cena->getStyle('A1:V1')->getFont()->setBold(true);
      $cena->getStyle('A1:V1')->getFont()->setSize(12);
      $cena->getStyle('A2:V2')->getFont()->setBold(true);
      $cena->getStyle('A2:V2')->getFont()->setSize(12);
      
      
      
      $letras = array('A','B','C','D','E','F','G','H','I','J','K','L','M');
      foreach($letras as $letra){
        $cena->getColumnDimension($letra)->setAutoSize(true);
      }
      
        // conteudo
      $l = 3;
      $l_arr = 0;
      $array = array();
      
      foreach($dados as $wi){
        
        $cena->setCellValueByColumnAndRow(0,$l, $wi->getDate());
        $sightings = WatchSightingPeer::doSelectSightingsByWatchInfoId($wi->getId());
        foreach($sightings as $sighting){
          
          // criar o array para escrever no ficheiro
          $array[$l_arr] = array();
          $array[$l_arr][] = $sighting->getwatchCode()->getAcronym();
          $array[$l_arr][] = $sighting->getTime();
          if($sighting->getWatchVisibilityId()) $array[$l_arr][] = $sighting->getWatchVisibility()->getCode(); else $array[$l_arr][] = null;
          if($sighting->getSpecieId()) $array[$l_arr][] = $sighting->getSpecie()->getCode(); else $array[$l_arr][] = null;
          $array[$l_arr][] = $sighting->getGroup();
          $array[$l_arr][] = $sighting->getTotal();
          $array[$l_arr][] = $sighting->getBehaviourId();
          if($sighting->getDirectionId()) $array[$l_arr][] = $sighting->getDirection()->getCode(); else $array[$l_arr][] = null;
          $array[$l_arr][] = $sighting->getHorizontal();
          $array[$l_arr][] = $sighting->getVertical();
          if($sighting->getVesselId()) $array[$l_arr][] = $sighting->getVessel()->getName(); else $array[$l_arr][] = null;
          $array[$l_arr][] = $sighting->getComments();
          
          $l++;
          $l_arr++;
        }
        
      }
      
      // escrever o array no ficheiro
      $cena->fromArray($array,null,'B3');
      
      return $objPHPExcel;
    }