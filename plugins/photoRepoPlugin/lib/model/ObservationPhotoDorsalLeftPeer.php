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
        $photo = $observationPhotoDorsalLeft->getObservationPhoto();
        $photo->setStatus(ObservationPhoto::NEW_SIGLA);
        $photo->save();
      }
      return $observationPhotoDorsalLeft;
    }
  }
} // ObservationPhotoDorsalLeftPeer
