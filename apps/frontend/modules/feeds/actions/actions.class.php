<?php

/**
 * feeds actions.
 *
 * @package    monicet
 * @subpackage feeds
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class feedsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeLatest(sfWebRequest $request)
  {
	  $feed = new sfAtom1Feed();
	
	  $feed->setTitle('Monicet');
	  $feed->setLink('http://www.monicet.net/');
	  $feed->setAuthorEmail(sfConfig::get('app_mail_webmaster'));
	  $feed->setAuthorName('Monicet');
	
	  $feedImage = new sfFeedImage();
	  $feedImage->setFavicon('http://www.monicet.net/images/favicon.ico');
	  $feed->setImage($feedImage);
	
	  $news = NewsArticlePeer::doSelectFeedRecentNews();
	
	  foreach ($news as $article)
	  {
	    $item = new sfFeedItem();
	    $item->setTitle($article->getHeadline());
	    $item->setLink('@news?slug=' . $article->getSlug());
	    $item->setPubdate($article->getPublishDate());
	    $item->setDescription($article->getBody());
    
	    $feed->addItem($item);
	  }
	
	  $this->feed = $feed;
  }
}
