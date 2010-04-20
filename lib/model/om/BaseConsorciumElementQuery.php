<?php


/**
 * Base class that represents a query for the 'consorcium_element' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Tue Apr 20 15:16:56 2010
 *
 * @method     ConsorciumElementQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ConsorciumElementQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ConsorciumElementQuery orderByLogotype($order = Criteria::ASC) Order by the logotype column
 * @method     ConsorciumElementQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ConsorciumElementQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method     ConsorciumElementQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ConsorciumElementQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ConsorciumElementQuery groupById() Group by the id column
 * @method     ConsorciumElementQuery groupByName() Group by the name column
 * @method     ConsorciumElementQuery groupByLogotype() Group by the logotype column
 * @method     ConsorciumElementQuery groupByLink() Group by the link column
 * @method     ConsorciumElementQuery groupBySlug() Group by the slug column
 * @method     ConsorciumElementQuery groupByCreatedAt() Group by the created_at column
 * @method     ConsorciumElementQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ConsorciumElement findOne(PropelPDO $con = null) Return the first ConsorciumElement matching the query
 * @method     ConsorciumElement findOneById(int $id) Return the first ConsorciumElement filtered by the id column
 * @method     ConsorciumElement findOneByName(string $name) Return the first ConsorciumElement filtered by the name column
 * @method     ConsorciumElement findOneByLogotype(string $logotype) Return the first ConsorciumElement filtered by the logotype column
 * @method     ConsorciumElement findOneByLink(string $link) Return the first ConsorciumElement filtered by the link column
 * @method     ConsorciumElement findOneBySlug(string $slug) Return the first ConsorciumElement filtered by the slug column
 * @method     ConsorciumElement findOneByCreatedAt(string $created_at) Return the first ConsorciumElement filtered by the created_at column
 * @method     ConsorciumElement findOneByUpdatedAt(string $updated_at) Return the first ConsorciumElement filtered by the updated_at column
 *
 * @method     array findById(int $id) Return ConsorciumElement objects filtered by the id column
 * @method     array findByName(string $name) Return ConsorciumElement objects filtered by the name column
 * @method     array findByLogotype(string $logotype) Return ConsorciumElement objects filtered by the logotype column
 * @method     array findByLink(string $link) Return ConsorciumElement objects filtered by the link column
 * @method     array findBySlug(string $slug) Return ConsorciumElement objects filtered by the slug column
 * @method     array findByCreatedAt(string $created_at) Return ConsorciumElement objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ConsorciumElement objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseConsorciumElementQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseConsorciumElementQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ConsorciumElement', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = ConsorciumElementPeer::getInstanceFromPool((string) $key)))) {
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
	 * $objs = $c->findPks(array(12, 56, 832), $con);
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
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ConsorciumElementPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ConsorciumElementPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(ConsorciumElementPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(ConsorciumElementPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterByName($name = null)
	{
		if(preg_match('/[\%\*]/', $name)) {
			return $this->addUsingAlias(ConsorciumElementPeer::NAME, str_replace('*', '%', $name), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(ConsorciumElementPeer::NAME, $name, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the logotype column
	 * 
	 * @param     string $logotype The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterByLogotype($logotype = null)
	{
		if(preg_match('/[\%\*]/', $logotype)) {
			return $this->addUsingAlias(ConsorciumElementPeer::LOGOTYPE, str_replace('*', '%', $logotype), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(ConsorciumElementPeer::LOGOTYPE, $logotype, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the link column
	 * 
	 * @param     string $link The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterByLink($link = null)
	{
		if(preg_match('/[\%\*]/', $link)) {
			return $this->addUsingAlias(ConsorciumElementPeer::LINK, str_replace('*', '%', $link), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(ConsorciumElementPeer::LINK, $link, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug = null)
	{
		if(preg_match('/[\%\*]/', $slug)) {
			return $this->addUsingAlias(ConsorciumElementPeer::SLUG, str_replace('*', '%', $slug), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(ConsorciumElementPeer::SLUG, $slug, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(ConsorciumElementPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(ConsorciumElementPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(ConsorciumElementPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(ConsorciumElementPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updated_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null)
	{
		if (is_array($updatedAt)) {
			if (array_values($updatedAt) === $updatedAt) {
				return $this->addUsingAlias(ConsorciumElementPeer::UPDATED_AT, $updatedAt, Criteria::IN);
			} else {
				if (isset($updatedAt['min'])) {
					$this->addUsingAlias(ConsorciumElementPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($updatedAt['max'])) {
					$this->addUsingAlias(ConsorciumElementPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(ConsorciumElementPeer::UPDATED_AT, $updatedAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related ConsorciumElementI18n object
	 *
	 * @param     ConsorciumElementI18n $consorciumElementI18n  the related object to use as filter
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function filterByConsorciumElementI18n($consorciumElementI18n)
	{
		return $this
			->addUsingAlias(ConsorciumElementPeer::ID, $consorciumElementI18n->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the ConsorciumElementI18n relation ConsorciumElementI18n object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ConsorciumElementI18nQuery A secondary query class using the current class as primary query
	 */
	public function useConsorciumElementI18nQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('ConsorciumElementI18n' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ConsorciumElementI18n', 'ConsorciumElementI18nQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ConsorciumElement $consorciumElement Object to remove from the list of results
	 *
	 * @return    ConsorciumElementQuery The current query, for fluid interface
	 */
	public function prune($consorciumElement = null)
	{
		if ($consorciumElement) {
			$this->addUsingAlias(ConsorciumElementPeer::ID, $consorciumElement->getId(), Criteria::NOT_EQUAL);
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

} // BaseConsorciumElementQuery
