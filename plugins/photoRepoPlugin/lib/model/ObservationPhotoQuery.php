<?php


class ObservationPhotoQuery extends BaseObservationPhotoQuery {
  public static function getPossibleMatches($observationPhoto, $partial=null, $complete=null, $best=null) {
    $query = ObservationPhotoQuery::create();
    
    // Validated State State
    $query = $query->filterByStatus(ObservationPhoto::V_SIGLA);
    
    // Same specie
    $query = $query->filterBySpecieId($observationPhoto->getSpecieId());
    
    // filter photos with same complete characterization
    if( $complete ){
      $query = self::_completeCharacterizationQuery($observationPhoto, $query);
    }
    
    // filter photos with partial characterization
    if( $partial ){
      $query = self::_partialCharacterizationQuery($observationPhoto, $query);
    }
    // only photos marked as best
    if( $best ){
      $query = $query->filterByIsBest(true);
    }
    
    $query = $query->orderByPhotoDate('desc');
    
    return $query->find();
  }
  
  public static function _completeCharacterizationQuery($observationPhoto, $query){
    //$query = ObservationPhotoQuery::create();
    $marks = array();
    if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
      $OPDorsalLeft = ObservationPhotoDorsalLeftPeer::get_or_create($observationPhoto->getId());
      $marks = $OPDorsalLeft->getObservationPhotoDorsalLeftMarks();
      $query = $query->useObservationPhotoDorsalLeftQuery()
                ->filterByIsSmooth($OPDorsalLeft->getIsSmooth())
                ->filterByIsIrregular($OPDorsalLeft->getIsIrregular())
                ->filterByIsCuttedPoint($OPDorsalLeft->getIsCuttedPoint())
              ->endUse(); 
    } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
      $OPDorsalRight = ObservationPhotoDorsalRightPeer::get_or_create($observationPhoto->getId());
      $marks = $OPDorsalRight->getObservationPhotoDorsalRightMarks();
      $query = $query->useObservationPhotoDorsalRightQuery()
                ->filterByIsSmooth($OPDorsalRight->getIsSmooth())
                ->filterByIsIrregular($OPDorsalRight->getIsIrregular())
                ->filterByIsCuttedPoint($OPDorsalRight->getIsCuttedPoint())
              ->endUse();
    } elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
      $OPTail = ObservationPhotoTailPeer::get_or_create($observationPhoto->getId());
      $marks = $OPTail->getObservationPhotoTailMarks();
      $query = $query->useObservationPhotoTailQuery()
                ->filterByIsSmooth($OPTail->getIsSmooth())
                ->filterByIsIrregular($OPTail->getIsIrregular())
                ->filterByIsCuttedPointLeft($OPTail->getIsCuttedPointLeft())
                ->filterByIsCuttedPointRight($OPTail->getIsCuttedPointRight())
              ->endUse();
    }
    return $query;
  }
  
  public static function _partialCharacterizationQuery($observationPhoto, $query){
    //$query = ObservationPhotoQuery::create();
    if( $observationPhoto->getBodyPart() == body_part::L_SIGLA ){ // dorsal left
      $OPDorsalLeft = ObservationPhotoDorsalLeftPeer::get_or_create($observationPhoto->getId());
      $marks = $OPDorsalLeft->getObservationPhotoDorsalLeftMarks();
      $query = $query->useObservationPhotoDorsalLeftQuery()
              ->endUse()
              ->condition('cond1', ObservationPhotoDorsalLeftPeer::IS_SMOOTH, $OPDorsalLeft->getIsSmooth())
              ->condition('cond2', ObservationPhotoDorsalLeftPeer::IS_IRREGULAR, $OPDorsalLeft->getIsIrregular())
              ->condition('cond3', ObservationPhotoDorsalLeftPeer::IS_CUTTED_POINT, $OPDorsalLeft->getIsCuttedPoint())
              ->combine(array('cond1', 'cond2', 'cond3'), Criteria::LOGICAL_OR);
    } elseif( $observationPhoto->getBodyPart() == body_part::R_SIGLA ){ // dorsal right
      $OPDorsalRight = ObservationPhotoDorsalRightPeer::get_or_create($observationPhoto->getId());
      $marks = $OPDorsalRight->getObservationPhotoDorsalRightMarks();
      $query = $query->useObservationPhotoDorsalRightQuery()
              ->endUse()
              ->condition('cond1', ObservationPhotoDorsalRightPeer::IS_SMOOTH, $OPDorsalRight->getIsSmooth())
              ->condition('cond2', ObservationPhotoDorsalRightPeer::IS_IRREGULAR, $OPDorsalRight->getIsIrregular())
              ->condition('cond3', ObservationPhotoDorsalRightPeer::IS_CUTTED_POINT, $OPDorsalRight->getIsCuttedPoint())
              ->combine(array('cond1', 'cond2', 'cond3'), Criteria::LOGICAL_OR);
    } elseif( $observationPhoto->getBodyPart() == body_part::F_SIGLA ){ // tail
      $OPTail = ObservationPhotoTailPeer::get_or_create($observationPhoto->getId());
      $marks = $OPTail->getObservationPhotoTailMarks();
      $query = $query->useObservationPhotoTailQuery()
              ->endUse()
              ->condition('cond1', ObservationPhotoTailPeer::IS_SMOOTH, $OPTail->getIsSmooth())
              ->condition('cond2', ObservationPhotoTailPeer::IS_IRREGULAR, $OPTail->getIsIrregular())
              ->condition('cond3', ObservationPhotoTailPeer::IS_CUTTED_POINT_LEFT, $OPTail->getIsCuttedPointLeft())
              ->condition('cond4', ObservationPhotoTailPeer::IS_CUTTED_POINT_RIGHT, $OPTail->getIsCuttedPointRight())
              ->combine(array('cond1', 'cond2', 'cond3', 'cond4'), Criteria::LOGICAL_OR);
    }
    return $query;
  }
} // ObservationPhotoQuery
