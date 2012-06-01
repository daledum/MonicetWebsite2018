<?php
class CompanyPeer extends BaseCompanyPeer {
  
  public static function getByAcronym($acronym){
    return CompanyQuery::create()->filterByAcronym($acronym)->findOne();
  }
  
  public static function doSelectUserCompany($user_id)
  {
    $criteria = new Criteria();
    $criteria->addJoin(CompanyUserPeer::COMPANY_ID, CompanyPeer::ID, Criteria::LEFT_JOIN);
    $criteria->add(CompanyUserPeer::USER_ID, $user_id, Criteria::EQUAL);
    $criteria->setLimit(1);
    
    return CompanyPeer::doSelectOne($criteria);
  }
  
  public static function doSelectByCompany() {
        $user = sfContext::getInstance()->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
        if ($company) {
            $query = CompanyQuery::create()
                ->filterById($company->getId())
                ->paginate();
        } else {
            $query = CompanyQuery::create()
                ->paginate();
        }
        return $query;
    }
  
  public static function getEmpresaByNome($nome){
    $c = new Criteria();
    $c->add(CompanyPeer::NAME, $nome, Criteria::LIKE);
    $e = CompanyPeer::doSelect($c);
    if(count($e)){
      return $e[0];
    }else{
      return false;
    }
    
  }
  
  public static function getForSelect($with_empty = false, $empty_msg = 'Todas', $empty_code = '' ) {
    $objectos = CompanyQuery::create()->orderByAcronym()->orderByName()->find();
    
    if($with_empty) {
      return self::fromObjectosToArray($objectos, $empty=true, $empty_msg, $empty_code);
    } 
    return self::fromObjectosToArray($objectos, $empty=false, $empty_msg, $empty_code);
  }
  
  public static function fromObjectosToArray( $objectos, $empty = false, $empty_msg = 'Todas', $empty_code = '' ) {
    $resultados = array();
    if( $empty ) {
      $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    foreach( $objectos as $objecto ) {
        $resultados[$objecto->getId()] = $objecto->getAcronym().' - '. $objecto->getName();
    }
    return $resultados;
  }
  
  
} // CompanyPeer
