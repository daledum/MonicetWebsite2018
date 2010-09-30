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
} // SkipperPeer
