<?php
class ObservationPhotoDorsalRightPeer extends BaseObservationPhotoDorsalRightPeer {
  public static function get_or_create( $photoId ) {
    if( !$photoId ) {
      throw new Exception('Missing photo_id');
    } else {
      $observationPhotoDorsalRight = ObservationPhotoDorsalRightQuery::create()
              ->filterById( $photoId )
              ->findOne();
      if( !$observationPhotoDorsalRight ){
        $observationPhotoDorsalRight = new ObservationPhotoDorsalRight();
        $observationPhotoDorsalRight->setPhotoId($photoId);
        $observationPhotoDorsalRight->save();
      }
      return $observationPhotoDorsalRight;
    }
  }
} // ObservationPhotoDorsalRightPeer
