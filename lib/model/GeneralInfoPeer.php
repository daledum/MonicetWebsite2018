<?php


/**
 * Skeleton subclass for performing query and update operations on the 'general_info' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Fri Dec 18 17:25:55 2009
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class GeneralInfoPeer extends BaseGeneralInfoPeer {
    public static function doSelectByCompany() {
        $user = sfContext::getInstance()->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
        if ($company) {
            $query = GeneralInfoQuery::create()
                ->filterByCompanyId($company->getId())
                ->paginate();
        } else {
            $query = GeneralInfoQuery::create()
                ->paginate();
        }
        return $query;
    }

} // GeneralInfoPeer
