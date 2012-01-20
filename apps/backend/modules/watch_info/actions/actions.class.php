<?php

require_once dirname(__FILE__).'/../lib/watch_infoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/watch_infoGeneratorHelper.class.php';

/**
 * watch_info actions.
 *
 * @package    monicet
 * @subpackage watch_info
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class watch_infoActions extends autoWatch_infoActions
{
	public function executeListShowGrid(sfWebRequest $request) {
		$wiid = $request->getParameter('id');
		$this->redirect('watch_info/sheet?wiid=' . $wiid);
	}
	
	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
			$watchInfo = $form->save();
			$this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $watchInfo)));
			
			if ($request->hasParameter('_save_and_add')) {
				$this->getUser()->setFlash('notice', $notice.' You can add another one below.');
				$this->redirect('@watch_info_new');
			}
			else {
				$this->getUser()->setFlash('notice', $notice);
				$this->redirect('watch_info/sheet?wiid=' . $watchInfo->getId());
			}
		}
		else {
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
	    $this->watch_info = WatchInfoQuery::create()
	                            ->filterById($request->getParameter("wiid"))
	                            ->findOne();
	    
	    $user = $this->getUser()->getGuardUser();
	    $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
	    $this->forward404Unless( $user->getIsSuperAdmin() || $this->watch_info->getCompanyId() == $this->user_company->getId() );
	    
	    $this->sightings = $this->watch_info->getWatchSightings();
	    $this->n_lines = count($this->sightings);
	    
	    $this->wi_form = new WatchInfoForm($this->watch_info);
	}
	
	public function executeCoordAjax(sfWebRequest $request){
	    $companhia = CompanyPeer::retrieveByPk($request->getParameter('company_id'));
	    $this->latitude = $companhia->getBaseLatitude();
	    $this->longitude = $companhia->getBaseLongitude();
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
	    
	    $watch_info = WatchInfoQuery::create()
	                            ->filterById($request->getParameter('watch_info_id'))
	                            ->findOne();
	    if(strcmp($this->valid,'true') == 0){
	        $watch_info->setValid(1);
	    }else{
	        $watch_info->setValid(0);
	    }
	    $watch_info->setComments($this->comments);
	    $watch_info->save();
	    
	    return sfView::NONE;
	}
    
    public function executeDeleteLineAjax(sfWebRequest $request) {
        $sighting_id = $request->getParameter('sighting_id');
        
        // TODO -> não me parece correcto (Vilarinho)
        if ($sighting = WatchSightingPeer::retrieveByPK($sighting_id)) {
            $sighting->delete();
        }
        
        
        return sfView::NONE;
    }
	
    
    public function executeDownload(sfWebRequest $request){
      $this->forward404Unless( $request->isMethod(sfRequest::POST) );
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
        if(!file_exists(sfConfig::get('sf_upload_dir').'/export_watch_info/'.$request->getParameter('year').'.xls')) {
          set_time_limit(600);

          $year = $request->getParameter('year');

          // criar o ficheiro excel
          $objPHPExcel = $this->generateExportExcelObject($year);

          $this->filename = $year;

          // guardar e fazer download do ficheiro
          $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
          $objWriter->save(sfConfig::get('sf_upload_dir').'/export_watch_info/'.$this->filename.'.xls');
          chmod(sfConfig::get('sf_upload_dir').'/export_watch_info/'.$this->filename.'.xls', 0777);
          $this->filedir = '/uploads/export_watch_info/'.$this->filename.'.xls';

        } else {

          // se o ficheiro existe, envia o ficheiro existente
          $this->filename = $request->getParameter('year');
          $this->filedir = '/uploads/export_watch_info/'.$this->filename.'.xls';
        }
      }
        
    }
    
    
    public function generateExportExcelObject($year, $month = null) {
      
      // buscar os dados
      $query = WatchInfoQuery::create();
      if(!is_null($month)){
        if( $month < 12 ) {
          $query = $query->filterByDate($year.'-'.$month.'-1', Criteria::GREATER_EQUAL)->filterByDate( $year.'-'.($month+1).'-1', Criteria::LESS_THAN );
        } else {
          $query = $query->filterByDate($year.'-12-1', Criteria::GREATER_EQUAL)->filterByDate( $year.'-12-31', Criteria::LESS_EQUAL );
        }
      } else {
        $query = $query->filterByDate($year.'-1-1', Criteria::GREATER_EQUAL)->filterByDate( ($year+1).'-1-1', Criteria::LESS_THAN );
      }
      $dados = $query->setFormatter(ModelCriteria::FORMAT_ON_DEMAND)->find();
      
        
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
        
      $headers[0][] = 'Cod. observação';
      $headers[0][] = 'Data';
      $headers[0][] = 'Empresa';
      $headers[0][] = 'Posto';
      $headers[0][] = 'Vigia';
      $headers[0][] = 'Cod. avistamento';
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
      
      
      
      $letras = array('A','B','C','D','E','F','G','H','I','J','K','L','M', 'N', 'O', 'P', 'Q', 'R');
      foreach($letras as $letra){
        $cena->getColumnDimension($letra)->setAutoSize(true);
      }
      
        // conteudo
      $l = 3;
      $array = array();
      $watch_code_cache = array();
      $watch_post_cache = array();
      $watch_man_cache = array();
      $watch_vis_cache = array();
      $direction_cache = array();
      $company_cache = array();
      $vessel_cache = array();
      $specie_cache = array();
      
      foreach($dados as $wi){
        $cena->setCellValueByColumnAndRow(0,$l, $wi->getDate());
        $sightings = WatchSightingPeer::doSelectSightingsByWatchInfoId($wi->getId());
        foreach($sightings as $sighting){
          
          // criar o array para escrever no ficheiro
          $array[0] = array();
          $array[0][] = $wi->getCode();
          $array[0][] = $wi->getDate();
          
          if( !isset( $company_cache[$wi->getCompanyId()] ) ){
            $company_cache[$wi->getCompanyId()] = $wi->getCompany()->getAcronym();
          }
          $array[0][] = $company_cache[$wi->getCompanyId()];
          
          if($wi->getWatchPostId()){
            if( !isset($watch_post_cache[$wi->getWatchPostId()]) ) {
              $watch_post_cache[$wi->getWatchPostId()] = $wi->getWatchPost()->getName();
            }
            $array[0][] = $watch_post_cache[$wi->getWatchPostId()];
          } else {
            $array[0][] = null;
          }
          
          if($wi->getWatchManId()){
            if( !isset($watch_man_cache[$wi->getWatchManId()]) ) {
              $watch_man_cache[$wi->getWatchManId()] = $wi->getWatchMan()->getName();
            }
            $array[0][] = $watch_man_cache[$wi->getWatchManId()];
          } else {
            $array[0][] = null;
          }
          
          if( !isset( $watch_code_cache[$sighting->getWatchCodeId()] ) ){
            $watch_code_cache[$sighting->getWatchCodeId()] = $sighting->getWatchCode()->getAcronym();
          }
          $array[0][] = $watch_code_cache[$sighting->getWatchCodeId()];
          
          $array[0][] = $sighting->getTime();
          
          if($sighting->getWatchVisibilityId()){
            if( !isset($watch_vis_cache[$sighting->getWatchVisibilityId()]) ) {
              $watch_vis_cache[$sighting->getWatchVisibilityId()] = $sighting->getWatchVisibility()->getCode();
            }
            $array[0][] = $watch_vis_cache[$sighting->getWatchVisibilityId()];
          } else {
            $array[0][] = null;
          }
          
          if($sighting->getSpecieId()){
            if( !isset($specie_cache[$sighting->getSpecieId()]) ) {
              $specie_cache[$sighting->getSpecieId()] = $sighting->getSpecie()->getCode();
            }
            $array[0][] = $specie_cache[$sighting->getWatchVisibilityId()];
          } else {
            $array[0][] = null;
          }
          
          $array[0][] = $sighting->getGroup();
          $array[0][] = $sighting->getTotal();
          $array[0][] = $sighting->getBehaviourId();
          
          if($sighting->getDirectionId()){
            if( !isset($direction_cache[$sighting->getDirectionId()]) ) {
              $direction_cache[$sighting->getDirectionId()] = $sighting->getDirection()->getCode();
            }
            $array[0][] = $direction_cache[$sighting->getDirectionId()];
          } else {
            $array[0][] = null;
          }
          $array[0][] = $sighting->getHorizontal();
          $array[0][] = $sighting->getVertical();
          
          if($sighting->getVesselId()){
            if( !isset($vessel_cache[$sighting->getVesselId()]) ) {
              $vessel_cache[$sighting->getVesselId()] = $sighting->getVessel()->getName();
            }
            $array[0][] = $vessel_cache[$sighting->getVesselId()];
          } else {
            $array[0][] = null;
          }
          $array[0][] = $sighting->getComments();
          
          // escrever o array no ficheiro
          $cena->fromArray($array, null, 'B'.$l);
          $l++;
        }
        
      }
      return $objPHPExcel;
    }
    
    
  public function executeExport(sfWebRequest $request) {
    $c = new Criteria();
    $c->addDescendingOrderByColumn(WatchInfoPeer::DATE);    
    $wis = WatchInfoPeer::doSelect($c);

    $temp = substr($wis[0]->getDate(),0,4);
    $this->years = array();
    $this->years[] = $temp;
    foreach($wis as $wi) {
      if(substr($wi->getDate(),0,4) != $temp) {
        $temp = substr($wi->getDate(),0,4);
        $this->years[] = $temp;
      }
    }
  }
	
  public function executeUpload(sfWebRequest $request){
    $this->form = new importXlsForm();
        
    if($request->isMethod('post')){
          
      $this->form->bind($request->getParameter('importXls'),$request->getFiles('importXls'));
      if($this->form->isValid()){
                  
        $file = $this->form->getValue('ficheiro');
        $file->save(sfConfig::get('sf_upload_dir').'/import_watch_info/import.xls');

        $this->getUser()->setFlash('notice', 'Upload - OK');
        $this->redirect('@watch_info_show_import_file');
      } 
    }
  }  
  
  public function executeShowImportFile( sfWebRequest $request ){
    
    $this->filename = null;
    $this->current_dir = sfConfig::get('sf_upload_dir').'/import_watch_info';
    $dir = opendir($this->current_dir);        // Open the sucker
    $file = readdir($dir);
    
    $parts = explode(".", $file);                    // pull apart the name and dissect by period
    if (is_array($parts) && count($parts) > 1) {    // does the dissected array have more than one part
      $extension = end($parts);        // set to we can see last file extension
      if ($extension == "xls") {
        $this->filename = $file;
      }else {
        $this->redirect('@watch_info_collection?action=upload');
      }
    } else {
      $this->redirect('@watch_info_collection?action=upload');
    }
    
    $this->img_valida = '<img src="/mfAdministracaoPlugin/images/icons/tick.png" title="Válido" />';
    $this->img_invalida = '<img src="/mfAdministracaoPlugin/images/icons/delete.png" title="Inválido" />';
    
    $this->validation_log = $this->getValidationLog();
    
    $num_erros = count($this->validation_log);
    if( $num_erros != 0 ){
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
    $objPHPExcel = $objReader->load(sfConfig::get('sf_upload_dir').'/import_watch_info/import.xls');
    $activeSheet = $objPHPExcel->getActiveSheet();
    
    $next_codes = array('I' => array('R', 'RA'), 'R' => array('R', 'RA', 'F'), 'RA' => array('R', 'RA', 'F'), 'F' => array('I'));
    $prev_code = 'F'; 
    
    $last_date = null;
    
    $vis_cache = array();
    $specie_cache = array();
    $behav_cache = array();
    $dir_cache = array();
    $comp_cache = array();
    $watchman_cache = array();
    $post_cache = array();
    
    //para todas as linhas que tem código preencchido
    for($l=3 ; strcmp($activeSheet->getCellByColumnAndRow(2, $l)->getValue(),'') != 0 ; $l++){
      // colunas 
      $date = trim($activeSheet->getCellByColumnAndRow(0, $l)->getValue());
      $code = trim($activeSheet->getCellByColumnAndRow(1, $l)->getValue());
      $time = trim($activeSheet->getCellByColumnAndRow(2, $l)->getValue());
      $visibility = trim($activeSheet->getCellByColumnAndRow(3, $l)->getValue());
      $specie = trim($activeSheet->getCellByColumnAndRow(4, $l)->getValue());
      //$group = trim($activeSheet->getCellByColumnAndRow(5, $l)->getValue());
      $total = trim($activeSheet->getCellByColumnAndRow(6, $l)->getValue());
      $behaviour = trim($activeSheet->getCellByColumnAndRow(7, $l)->getValue());
      $direction = trim($activeSheet->getCellByColumnAndRow(8, $l)->getValue());
      $horizontal = trim($activeSheet->getCellByColumnAndRow(9, $l)->getValue());
      $vertical = trim($activeSheet->getCellByColumnAndRow(10, $l)->getValue());
      $comment = trim($activeSheet->getCellByColumnAndRow(11, $l)->getValue());
      $company_acronym = trim($activeSheet->getCellByColumnAndRow(12, $l)->getValue());
      $watchman = trim($activeSheet->getCellByColumnAndRow(13, $l)->getValue());
      $post = trim($activeSheet->getCellByColumnAndRow(14, $l)->getValue());
      $latitude = trim($activeSheet->getCellByColumnAndRow(15, $l)->getValue());
      $longitude = trim($activeSheet->getCellByColumnAndRow(16, $l)->getValue());
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
      } else {
        $log[] = array( 'line' => $l, 'column' => 'E', 'error' => 'A espécie é um campo obrigatório');
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
      //Direction
      if( strlen($direction) ){
        if( !isset($dir_cache[$direction]) ) {
          $dir = DirectionPeer::getByAcronym($direction);
          if( !is_object($dir) ){
            $log[] = array( 'line' => $l, 'column' => 'I', 'error' => 'Não existe o acrónimo "'.$direction.'" para a direção.');
          } else {
            $dir_cache[$direction] = $dir->getAcronym();
          }
        }
      }
      //horizontal
      
      //Vertical
      
      //Company
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
      //watchman
      if( strlen($watchman) ){
        if( !isset($watchman_cache[$company_acronym.$watchman]) ) {
          $wm = WatchmanPeer::getByNameAndCompanyAcronym($watchman, $company_acronym);
          if( !is_object($wm) ){
            $log[] = array( 'line' => $l, 'column' => 'N', 'error' => 'Não existe o nenhum vigia com o nome "'.$watchman.'" na empresa "'.$company_acronym.'".');
          } else {
            $watchman_cache[$company_acronym.$watchman] = $wm->getNome();
          }
        }
      }
      //Watchpost
      if( strlen($post) ){
        if( !isset($post_cache[$company_acronym.$post]) ) {
          $wp = WatchPostPeer::getByNameAndCompanyAcronym($watchman, $company_acronym);
          if( !is_object($wp) ){
            $log[] = array( 'line' => $l, 'column' => 'O', 'error' => 'Não existe o nenhum posto de vigia com o nome "'.$post.'" da empresa "'.$company_acronym.'".');
          } else {
            $post_cache[$company_acronym.$post] = $wp->getNome();
          }
        }
      }
      
    }
    return $log;
  }
  
  
  public function executeLoadImportFile( sfWebRequest $request ){
    
  }
  
}

       

//        $objReader = new PHPExcel_Reader_Excel5();
//        $objPHPExcel = $objReader->load(sfConfig::get('sf_upload_dir').'/import_watch_info/import.xls');
//
//        //$l = 3;
//        //$c = 0;
//        //$objPHPExcel->getActiveSheet()->getCellByColumnAndRow($c, $l)->getValue();
//
//        $giid = 0;
//        $record = null;
//        $sighting = null;
//        $general_info = null;
//
//        //percorrer as linhas
//        for($l=3 ; strcmp($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $l)->getValue(),'') != 0 ; $l++){
//          $code = trim($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $l)->getValue());
//
//          // criar nova watch info caso registo seja 'I'
//          if(strcmp(strtoupper($code),'I') == 0){
//              $wi = new WatchInfo();
//              /*$barco = VesselPeer::getBarcoByNome($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(17, $l)->getValue());
//              if ($barco) $wi->setVesselId($barco->getId());
//
//              $skipper = SkipperPeer::getSkipperByNome($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(18, $l)->getValue());
//              if($skipper) $gi->setSkipperId($skipper->getId());
//
//              $guia = GuidePeer::getGuiaByNome($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(19, $l)->getValue());
//              if($guia) $gi->setGuideId($guia->getId());
//
//              $empresa = CompanyPeer::getEmpresaByNome($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(16, $l)->getValue());
//              if($empresa){
//                  $gi->setCompanyId($empresa->getId());
//                  $gi->setBaseLatitude($empresa->getBaseLatitude());
//                  $gi->setBaseLongitude($empresa->getBaseLongitude());
//              }*/
//
//              $value = $objPHPExcel->getActiveSheet()->getCell('A'.$l)->getValue();
//              $formatCode = $objPHPExcel->getActiveSheet()->getStyle('A'.$l)->getNumberFormat()->getFormatCode();
//              $formattedString = PHPExcel_Style_NumberFormat::toFormattedString($value, $formatCode);
//              $dia = substr($formattedString,3,2);
//              $mes = substr($formattedString,0,2);
//              $ano = substr($formattedString,6,2);
//
//              $wi->setDate('20'.$ano.'-'.$mes.'-'.$dia);
//              //echo $formattedString;
//              /*if($barco && $empresa){
//                  $gi->setCode(mfUtils::gerarCodigoGi($empresa->getId(), $gi->getDate()));
//              }*/
//              $gi->save();
//              $general_info = $gi;
//          }
//
//          $sighting = new WatchSighting();
//
//          $sighting->setWatchInfoId($general_info->getId());
//
//          // inserir registos
//          $codigo = WatchCodePeer::getByAcronym(strtoupper($code));
//
//          if($codigo) $sighting->setWatchCodeId($codigo->getId());
//
//          $vis = VisibilityPeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5, $l)->getValue());
//          if($vis) $record->setVisibilityId($vis->getId());
//
//          $sea = SeaStatePeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $l)->getValue());
//          if($sea) $record->setSeaStateId($sea->getId());
//
//          $value = $objPHPExcel->getActiveSheet()->getCell('C'.$l)->getValue();
//          $formatCode = $objPHPExcel->getActiveSheet()->getStyle('C'.$l)->getNumberFormat()->getFormatCode();
//          $formattedString = PHPExcel_Style_NumberFormat::toFormattedString($value, $formatCode);
//
//          //echo $formattedString;
//          $record->setTime($formattedString);
//
//          $latitude = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $l)->getValue();
//          if(strcmp(strtoupper($latitude),'BASE') == 0){
//              $latitude = $general_info->getBaseLatitude();
//          }
//          else{
//              $latitude = mfUtils::convertLatLong($latitude);
//          }
//          $record->setLatitude($latitude);
//
//          $longitude = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $l)->getValue();
//          if(strcmp(strtoupper($longitude),'BASE') == 0){
//              $longitude = $general_info->getBaseLongitude();
//          }
//          else{
//              $longitude = mfUtils::convertLatLong($longitude);
//          }
//          $record->setLongitude($longitude);
//
//          $record->setNumVessels($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(14, $l)->getValue());
//
//          $record->save();
//
//          // inserir sightings
//          $sighting->setRecordId($record->getId());
//
//          $esp = SpeciePeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7, $l)->getValue());
//          if($esp) $sighting->setSpecieId($esp->getId());
//
//          $beh = BehaviourPeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12, $l)->getValue());
//          if($beh) $sighting->setBehaviourId($beh->getId());
//
//          $asso = AssociationPeer::getByCode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(13, $l)->getValue());
//          if($asso) $sighting->setAssociationId($asso->getId());
//
//          $sighting->setAdults($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(9, $l)->getValue());
//          $sighting->setJuveniles($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(10, $l)->getValue());
//          $sighting->setCalves($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(11, $l)->getValue());
//          $sighting->setTotal($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8, $l)->getValue());
//          $sighting->setComments($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(15, $l)->getValue());
//
//          $sighting->save();
//        }