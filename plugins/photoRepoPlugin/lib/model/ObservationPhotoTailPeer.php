<?php
class ObservationPhotoTailPeer extends BaseObservationPhotoTailPeer {
  public static function get_or_create( $photoId ) {
    if( !$photoId ) {
      throw new Exception('Missing photo_id');
    } else {
      $observationPhotoTail = ObservationPhotoTailQuery::create()
              ->filterById( $photoId )
              ->findOne();
      if( !$observationPhotoTail ){
        $observationPhotoTail = new ObservationPhotoTail();
        $observationPhotoTail->setPhotoId($photoId);
        $observationPhotoTail->save();
      }
      return $observationPhotoTail;
    }
  }
} // ObservationPhotoTailPeer
