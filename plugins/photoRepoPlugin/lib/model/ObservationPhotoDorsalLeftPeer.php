<?php
class ObservationPhotoDorsalLeftPeer extends BaseObservationPhotoDorsalLeftPeer {
  public static function get_or_create( $photoId ) {
    if( !$photoId ) {
      throw new Exception('Missing photo_id');
    } else {
      $observationPhotoDorsalLeft = ObservationPhotoDorsalLeftQuery::create()
              ->filterByPhotoId( $photoId )
              ->findOne();
      if( !$observationPhotoDorsalLeft ){
        $observationPhotoDorsalLeft = new ObservationPhotoDorsalLeft();
        $observationPhotoDorsalLeft->setPhotoId($photoId);
        $observationPhotoDorsalLeft->save();
      }
      return $observationPhotoDorsalLeft;
    }
  }
} // ObservationPhotoDorsalLeftPeer
