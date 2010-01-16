<?php

class newsComponents extends sfComponents
{
  public function executeRecentNews()
  {
    $criteria = new Criteria();
    
    $criteria->addJoin(NewsArticleI18nPeer::ID, NewsArticlePeer::ID);
    $criteria->addAnd(NewsArticlePeer::IS_PUBLISHED, true);
    $criteria->addAscendingOrderByColumn(NewsArticlePeer::UPDATED_AT);
    $criteria->add(NewsArticleI18nPeer::CULTURE, $this->getUser()->getCulture());

    $criteria->setLimit(4);
    
    $this->recent_articles = NewsArticlePeer::doSelect($criteria);
  }
}
