<?php

class newsComponents extends sfComponents
{
  public function executeRecentNews()
  {
    $this->recent_articles = NewsArticlePeer::doSelectRecentNews();
  }
}
