<?php

class UploadedPhotoPeer extends BaseUploadedPhotoPeer {
  public static function countNotProcessed(){
    return UploadedPhotoQuery::create()->filterByProcessed(false)->count();
  }
} // UploadedPhotoPeer
