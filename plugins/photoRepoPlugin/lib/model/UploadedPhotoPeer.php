<?php

class UploadedPhotoPeer extends BaseUploadedPhotoPeer {
  public static function countNotProcessed(){
    return UploadedPhotoQuery::create()->filterByProcessed(0)->count();
  }
} // UploadedPhotoPeer
