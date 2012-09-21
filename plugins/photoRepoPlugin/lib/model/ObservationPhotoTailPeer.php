<?php
class ObservationPhotoTailPeer extends BaseObservationPhotoTailPeer {
  public static function get_or_create( $photoId ) {
    if( !$photoId ) {
      throw new Exception('Missing photo_id');
    } else {
      $observationPhotoTail = ObservationPhotoTailQuery::create()
              ->filterByPhotoId( $photoId )
              ->findOne();
      if( !$observationPhotoTail ){
        $observationPhotoTail = new ObservationPhotoTail();
        $observationPhotoTail->setPhotoId($photoId);
        $observationPhotoTail->save();
        $photo = $observationPhotoTail->getObservationPhoto();
        $photo->setStatus(ObservationPhoto::C_SIGLA);
        $photo->save();
      }
      return $observationPhotoTail;
    }
  }
} // ObservationPhotoTailPeer
