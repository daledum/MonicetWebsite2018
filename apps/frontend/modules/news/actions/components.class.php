<?php

class newsComponents extends sfComponents
{
  public function executeRecentNews()
  {
    $c = new Criteria();
    $c->addDescendingOrderByColumn(NewsArticlePeer::UPDATED_AT);
    $c->addJoin(NewsArticleI18nPeer::ID, NewsArticlePeer::ID);
    $c->add(NewsArticleI18nPeer::CULTURE, 'en');
    $c->setLimit(4);
    
    $this->recent_articles = NewsArticlePeer::doSelect($c);
  }
}
