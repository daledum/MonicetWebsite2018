<?php
class ObservationPhotoDorsalRightPeer extends BaseObservationPhotoDorsalRightPeer {
  public static function get_or_create( $photoId ) {
    if( !$photoId ) {
      throw new Exception('Missing photo_id');
    } else {
      $observationPhotoDorsalRight = ObservationPhotoDorsalRightQuery::create()
              ->filterByPhotoId( $photoId )
              ->findOne();
      if( !$observationPhotoDorsalRight ){
        $observationPhotoDorsalRight = new ObservationPhotoDorsalRight();
        $observationPhotoDorsalRight->setPhotoId($photoId);
        $observationPhotoDorsalRight->save();
        $photo = $observationPhotoDorsalRight->getObservationPhoto();
        $photo->setStatus(ObservationPhoto::C_SIGLA);
        $photo->save();
      }
      return $observationPhotoDorsalRight;
    }
  }
} // ObservationPhotoDorsalRightPeer
