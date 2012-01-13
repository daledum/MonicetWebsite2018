<?php

class WatchSightingPeer extends BaseWatchSightingPeer {
	public static function deleteIgnoredSightings($watch_sighting_id, $wiid){
	    $c = new Criteria();
	    $c->add(WatchSightingPeer::WATCH_INFO_ID, $wiid);
	    $c->addAnd(WatchSightingPeer::ID, $watch_sighting_id, Criteria::GREATER_THAN);
	    $c->addAscendingOrderByColumn(WatchSightingPeer::ID);
	    $items = WatchSightingPeer::doSelect($c);
	    foreach ($items as $sighting) {
	        $sighting->delete();
	    }
	}
    
  public static function doSelectSightingsByWatchInfoId($wiid){
    $query = WatchSightingQuery::create()
            ->filterByWatchInfoId($wiid)
            ->orderById('asc')
            ->setFormatter(ModelCriteria::FORMAT_ON_DEMAND);
    return $query->find();
//        $c = new Criteria();
//        $c->add(WatchSightingPeer::WATCH_INFO_ID, $wiid);
//        $c->addAscendingOrderByColumn(WatchSightingPeer::ID);
//        return WatchSightingPeer::doSelect($c);

  }
} // WatchSightingPeer
