<?php


class DirectionPeer extends BaseDirectionPeer {
  public static function getByAcronym($acronym){
    return DirectionQuery::create()->filterByAcronym($acronym)->findOne();
  }
} // DirectionPeer
