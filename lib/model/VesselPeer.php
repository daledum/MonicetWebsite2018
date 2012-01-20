<?php

class VesselPeer extends BaseVesselPeer {

  public static function doSelectListByCompany() {
  	$user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());
  	$c = new Criteria();
    if ($company) {
        $c->add(VesselPeer::COMPANY_ID, $company->getId(), Criteria::EQUAL);
    }
    return mfUtils::fromObjectsToArrayWithEmpty(self::doSelect($c));
  }
  
  public static function doSelectByCompany() {
        $user = sfContext::getInstance()->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
        if ($company) {
            $query = VesselQuery::create()
                ->filterByCompanyId($company->getId())
                ->paginate();
        } else {
        	$query = VesselQuery::create()
                ->paginate();
        }
        return $query;
    }
  
  public static function getBarcoByNome($nome){
    $c = new Criteria();
    $c->add(VesselPeer::NAME, $nome, Criteria::LIKE);
    $b = VesselPeer::doSelect($c);
    return $b[0];
  }
  
  public static function getByNameAndCompanyAcronym($vessel_name, $company_acronym){
    return VesselQuery::create()
            ->filterByName($vessel_name)
            ->useCompanyQuery()
              ->filterByAcronym($company_acronym)
            ->endUse()
            ->findOne();
  }
  
  public static function doSelect(Criteria $criteria, PropelPDO $con = null)
  {
   	if (sfContext::getInstance()->getUser()->isAuthenticated()) {
   		$user = sfContext::getInstance()->getUser()->getGuardUser();
	    $company = CompanyPeer::doSelectUserCompany($user->getId());
	    if ($company) {
	        $criteria->addAnd(VesselPeer::COMPANY_ID, $company->getId(), Criteria::EQUAL);
	    }
	    $criteria->addJoin(VesselPeer::COMPANY_ID, CompanyPeer::ID, Criteria::LEFT_JOIN);
	    $criteria->addAscendingOrderByColumn(CompanyPeer::NAME);
   	}
    
    return VesselPeer::populateObjects(VesselPeer::doSelectStmt($criteria, $con));
  }
  
  
  public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
  {
  	if (sfContext::getInstance()->getUser()->isAuthenticated()) {
   		$user = sfContext::getInstance()->getUser()->getGuardUser();
	    $company = CompanyPeer::doSelectUserCompany($user->getId());
	    if ($company) {
	        $criteria->addAnd(VesselPeer::COMPANY_ID, $company->getId(), Criteria::EQUAL);
	    }
	    $criteria->addJoin(VesselPeer::COMPANY_ID, CompanyPeer::ID, Criteria::LEFT_JOIN);
	    $criteria->addAscendingOrderByColumn(CompanyPeer::NAME);
   	}
	
    return count(VesselPeer::doSelect($criteria));
  }
  
  
} // VesselPeer
