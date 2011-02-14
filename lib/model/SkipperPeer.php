<?php


class SkipperPeer extends BaseSkipperPeer {

    public static function doSelectListByCompany() {
        $user = sfContext::getInstance()->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
        $c = new Criteria();
        if ($company) {
            $c->add(SkipperPeer::COMPANY_ID, $company->getId(), Criteria::EQUAL);
        }
        return mfUtils::fromObjectsToArrayWithEmpty(self::doSelect($c));
    }

    public static function doSelectByCompany() {
        $user = sfContext::getInstance()->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
        if ($company) {
            $query = SkipperQuery::create()
                ->filterByCompanyId($company->getId())
                ->paginate();
        } else {
            $query = SkipperQuery::create()
                ->paginate();
        }
        return $query;
    }
    
    public static function getSkipperByNome($nome){
      $c = new Criteria();
      $c->add(SkipperPeer::NAME, $nome, Criteria::LIKE);
      $s = SkipperPeer::doSelect($c);
      if(count($s)){
        return $s[0];
      }
      else{
        return false;
      }
    }
    
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
      $user = sfContext::getInstance()->getUser()->getGuardUser();
      $company = CompanyPeer::doSelectUserCompany($user->getId());
      if ($company) {
          $criteria->addAnd(SkipperPeer::COMPANY_ID, $company->getId(), Criteria::EQUAL);
      }
      $criteria->addJoin(SkipperPeer::COMPANY_ID, CompanyPeer::ID, Criteria::LEFT_JOIN);
      
      $criteria->addAscendingOrderByColumn(CompanyPeer::NAME);
      $criteria->addAscendingOrderByColumn(SkipperPeer::NAME);
      return SkipperPeer::populateObjects(SkipperPeer::doSelectStmt($criteria, $con));
    }
    
    
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
      return count(SkipperPeer::doSelect($criteria));
    }
    
    
    
} // SkipperPeer
