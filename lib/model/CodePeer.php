<?php

class CodePeer extends BaseCodePeer {

//  public static function doSelectForNewRecord($general_info)
//  {
//  	$criteria = new Criteria();
//    $criteria->add(RecordPeer::GENERAL_INFO_ID, $general_info, Criteria::EQUAL);
//    $criteria->addDescendingOrderByColumn(RecordPeer::UPDATED_AT);
//    $criteria->setLimit(2);
//    
//    $codes = array();
//    $records = RecordPeer::doSelect($criteria);
//    
//    if (count($records) > 0) {
//    	$last_code = CodePeer::retrieveByPK($records[0]->getCodeId());
//        $codes = CodePeer::doSelectByAcronyms(CodePeer::getNextCodeAcronyms($last_code->getAcronym()));
//    } else {
//    	$codes = CodePeer::doSelectByAcronyms(array('I'));
//    }
//    
//    return mfUtils::fromObjectsToArrayWithEmpty($codes);
//  }
//  
  public static function doSelectAll()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(CodePeer::ACRONYM);
    return self::doSelect($c);
  }
  
  public static function doSelectByAcronyms($acronyms)
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(CodePeer::ACRONYM);
    foreach($acronyms as $acronym) {
    	$c->addOr(CodePeer::ACRONYM, $acronym, Criteria::EQUAL);
    }
    return self::doSelect($c);
  }
  
  public static function doSelectListAll()
  {
    return mfUtils::fromObjectsToArrayWithEmpty(self::doSelectAll());
  }
  
//  public static function getNextCodeAcronyms($code_acronym) {
//  	$acronyms = array();
//    switch ($code_acronym) {
//      case 'I':
//        $acronyms = array('F', 'R', 'IA');
//        break;
//      case 'IA':
//        $acronyms = array('RA', 'IFA');
//        break;
//      case 'R':
//        $acronyms = array('F', 'IA');
//        break;
//      case 'F':
//        $acronyms = array();
//        break;
//      case 'FA':
//        $acronyms = array('F', 'R', 'IA');
//        break;
//      case 'RA':
//        $acronyms = array('RA', 'FA', 'IA');
//        break;
//    }
//    return $acronyms;
//  }
} // CodePeer
