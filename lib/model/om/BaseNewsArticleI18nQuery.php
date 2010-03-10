<?php


/**
 * Base class that represents a query for the 'news_article_i18n' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Wed Mar 10 15:35:14 2010
 *
 * @method     NewsArticleI18nQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NewsArticleI18nQuery orderByCulture($order = Criteria::ASC) Order by the culture column
 * @method     NewsArticleI18nQuery orderByHeadline($order = Criteria::ASC) Order by the headline column
 * @method     NewsArticleI18nQuery orderByBody($order = Criteria::ASC) Order by the body column
 *
 * @method     NewsArticleI18nQuery groupById() Group by the id column
 * @method     NewsArticleI18nQuery groupByCulture() Group by the culture column
 * @method     NewsArticleI18nQuery groupByHeadline() Group by the headline column
 * @method     NewsArticleI18nQuery groupByBody() Group by the body column
 *
 * @method     NewsArticleI18n findOne(PropelPDO $con = null) Return the first NewsArticleI18n matching the query
 * @method     NewsArticleI18n findOneById(int $id) Return the first NewsArticleI18n filtered by the id column
 * @method     NewsArticleI18n findOneByCulture(string $culture) Return the first NewsArticleI18n filtered by the culture column
 * @method     NewsArticleI18n findOneByHeadline(string $headline) Return the first NewsArticleI18n filtered by the headline column
 * @method     NewsArticleI18n findOneByBody(string $body) Return the first NewsArticleI18n filtered by the body column
 *
 * @method     array findById(int $id) Return NewsArticleI18n objects filtered by the id column
 * @method     array findByCulture(string $culture) Return NewsArticleI18n objects filtered by the culture column
 * @method     array findByHeadline(string $headline) Return NewsArticleI18n objects filtered by the headline column
 * @method     array findByBody(string $body) Return NewsArticleI18n objects filtered by the body column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseNewsArticleI18nQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseNewsArticleI18nQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'NewsArticleI18n', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Find object by primary key
	 * <code>
	 * $obj = $c->findPk(array(34, 634), $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = NewsArticleI18nPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1])))))) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			return $this
				->filterByPrimaryKey($key)
				->findOne($con);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    NewsArticleI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(NewsArticleI18nPeer::ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(NewsArticleI18nPeer::CULTURE, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NewsArticleI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(NewsArticleI18nPeer::ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(NewsArticleI18nPeer::CULTURE, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    NewsArticleI18nQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(NewsArticleI18nPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(NewsArticleI18nPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the culture column
	 * 
	 * @param     string $culture The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    NewsArticleI18nQuery The current query, for fluid interface
	 */
	public function filterByCulture($culture = null)
	{
		if(preg_match('/[\%\*]/', $culture)) {
			return $this->addUsingAlias(NewsArticleI18nPeer::CULTURE, str_replace('*', '%', $culture), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(NewsArticleI18nPeer::CULTURE, $culture, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the headline column
	 * 
	 * @param     string $headline The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    NewsArticleI18nQuery The current query, for fluid interface
	 */
	public function filterByHeadline($headline = null)
	{
		if(preg_match('/[\%\*]/', $headline)) {
			return $this->addUsingAlias(NewsArticleI18nPeer::HEADLINE, str_replace('*', '%', $headline), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(NewsArticleI18nPeer::HEADLINE, $headline, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the body column
	 * 
	 * @param     string $body The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    NewsArticleI18nQuery The current query, for fluid interface
	 */
	public function filterByBody($body = null)
	{
		if(preg_match('/[\%\*]/', $body)) {
			return $this->addUsingAlias(NewsArticleI18nPeer::BODY, str_replace('*', '%', $body), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(NewsArticleI18nPeer::BODY, $body, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related NewsArticle object
	 *
	 * @param     NewsArticle $newsArticle  the related object to use as filter
	 *
	 * @return    NewsArticleI18nQuery The current query, for fluid interface
	 */
	public function filterByNewsArticle($newsArticle)
	{
		return $this
			->addUsingAlias(NewsArticleI18nPeer::ID, $newsArticle->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the NewsArticle relation NewsArticle object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsArticleQuery A secondary query class using the current class as primary query
	 */
	public function useNewsArticleQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('NewsArticle' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NewsArticle', 'NewsArticleQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     NewsArticleI18n $newsArticleI18n Object to remove from the list of results
	 *
	 * @return    NewsArticleI18nQuery The current query, for fluid interface
	 */
	public function prune($newsArticleI18n = null)
	{
		if ($newsArticleI18n) {
			$this->addCond('pruneCond0', $this->getAliasedColName(NewsArticleI18nPeer::ID), $newsArticleI18n->getId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(NewsArticleI18nPeer::CULTURE), $newsArticleI18n->getCulture(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

	/**
	 * Code to execute before every SELECT statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreSelect(PropelPDO $con)
	{
		return $this->preSelect($con);
	}

	/**
	 * Code to execute before every DELETE statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreDelete(PropelPDO $con)
	{
		return $this->preDelete($con);
	}

	/**
	 * Code to execute before every UPDATE statement
	 * 
	 * @param     array $values The associatiove array of columns and values for the update
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreUpdate(&$values, PropelPDO $con)
	{
		return $this->preUpdate($values, $con);
	}

} // BaseNewsArticleI18nQuery
