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
    
  }
  
  public function executeDownload(sfWebRequest $request){
      
    // buscar os dados  
    $dados = GeneralInfoPeer::doSelectByCompany();
      
      
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
    foreach($dados as $linha){
      //foreach()
      
    }
    
    //$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,1, 'Some value');
    
    
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
    if($this->valid){
      $general_info->setValid(1);
    }else{
      $general_info->setValid(0);
    }
    $general_info->setValid($this->valid);
    $general_info->setComments($this->comments);
    $general_info->save();
    
    return sfView::NONE;
  }
  

  
}
