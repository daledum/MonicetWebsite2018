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
  
  public static function getByAcronym($code){
    $c = new Criteria();
    $c->add(CodePeer::ACRONYM, $code);
    $b = CodePeer::doSelect($c);
    return $b[0];
  }
  
  public static function getNextCodeList($code_acronym) {
    $acronyms = array();
    switch ($code_acronym) {
      case 'I':
        $acronyms = array('F', 'R', 'IA', 'RA');
        break;
      case 'IA':
        $acronyms = array('RA', 'FA');
        break;
      case 'R':
        $acronyms = array('F', 'R', 'IA', 'RA');
        break;
      case 'F':
        $acronyms = array();
        break;
      case 'FA':
        $acronyms = array('F', 'R', 'IA', 'RA');
        break;
      case 'RA':
        $acronyms = array('RA', 'FA', 'IA', 'R', 'F');
        break;
    }
    return $acronyms;
  }
  
  public static function validateSequence($sequence = array()){
    $valid = true;
    $nParts = count($sequence);
    // pelo menos I->F 
    if( $nParts < 2 ){ return false; }
    // começar com I
    if( $sequence[0] != 'I' ){ return false; }
    // terminar comF
    if( $sequence[$nParts-1] != 'F' ){ return false; }
    
    // testar se o resto da sequencia obedece ao diagrama de estados
    for( $i=0; $i < $nParts-1; $i++){
      //print $sequence[$i];
      $nextCodeList = self::getNextCodeList($sequence[$i]);
      if( !in_array($sequence[$i+1], $nextCodeList)){
        return false;
      }
    }
    return $valid;
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
