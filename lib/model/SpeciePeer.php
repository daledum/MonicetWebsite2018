<?php


/**
 * Skeleton subclass for performing query and update operations on the 'specie' table.
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
class SpeciePeer extends BaseSpeciePeer {
  public static function getByCode($code){
    $c = new Criteria();
    $c->add(SpeciePeer::CODE, $code);
    $s = SpeciePeer::doSelect($c);
    if (count($s)){
      return $s[0];
    }
    else{
      return false;
    }
    
  }
  
  public static function getAllOrdered(){
    $c = new Criteria();
    $c->addAscendingOrderByColumn(SpeciePeer::CODE);
    return SpeciePeer::doSelect($c);
  }
  
  
  /*public static function getSpecieQuery($word){
    
    $c = new Criteria();
    $c->add(SpeciePeer::NAME, '%'.$word.'%', Criteria::LIKE);
    $c->addOr(SpeciePeer::CODE, '%'.$word.'%', Criteria::LIKE);
    $c->setDistinct();
    return SpeciePeer::doSelect($c);
  }*/
  
  public static function getSpecieQuery($id){
    
    $c = new Criteria();
    $c->add(SpeciePeer::ID, $id, Criteria::EQUAL);
    return SpeciePeer::doSelectOne($c);
  }
  
  
  
  
} // SpeciePeer
