<?php


/**
 * Base class that represents a query for the 'publication' table.
 *
 * 
 *
 * @method     PublicationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PublicationQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     PublicationQuery orderByOrder($order = Criteria::ASC) Order by the order column
 * @method     PublicationQuery orderByFileAddress($order = Criteria::ASC) Order by the file_address column
 * @method     PublicationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     PublicationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     PublicationQuery groupById() Group by the id column
 * @method     PublicationQuery groupByIsActive() Group by the is_active column
 * @method     PublicationQuery groupByOrder() Group by the order column
 * @method     PublicationQuery groupByFileAddress() Group by the file_address column
 * @method     PublicationQuery groupByCreatedAt() Group by the created_at column
 * @method     PublicationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     PublicationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PublicationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PublicationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PublicationQuery leftJoinPublicationI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the PublicationI18n relation
 * @method     PublicationQuery rightJoinPublicationI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PublicationI18n relation
 * @method     PublicationQuery innerJoinPublicationI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the PublicationI18n relation
 *
 * @method     Publication findOne(PropelPDO $con = null) Return the first Publication matching the query
 * @method     Publication findOneOrCreate(PropelPDO $con = null) Return the first Publication matching the query, or a new Publication object populated from the query conditions when no match is found
 *
 * @method     Publication findOneById(int $id) Return the first Publication filtered by the id column
 * @method     Publication findOneByIsActive(boolean $is_active) Return the first Publication filtered by the is_active column
 * @method     Publication findOneByOrder(int $order) Return the first Publication filtered by the order column
 * @method     Publication findOneByFileAddress(string $file_address) Return the first Publication filtered by the file_address column
 * @method     Publication findOneByCreatedAt(string $created_at) Return the first Publication filtered by the created_at column
 * @method     Publication findOneByUpdatedAt(string $updated_at) Return the first Publication filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Publication objects filtered by the id column
 * @method     array findByIsActive(boolean $is_active) Return Publication objects filtered by the is_active column
 * @method     array findByOrder(int $order) Return Publication objects filtered by the order column
 * @method     array findByFileAddress(string $file_address) Return Publication objects filtered by the file_address column
 * @method     array findByCreatedAt(string $created_at) Return Publication objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Publication objects filtered by the updated_at column
 *
 * @package    propel.generator.plugins.publicationPlugin.lib.model.om
 */
abstract class BasePublicationQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePublicationQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Publication', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PublicationQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PublicationQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PublicationQuery) {
			return $criteria;
		}
		$query = new PublicationQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
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
	 * @return    Publication|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PublicationPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
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
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PublicationPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PublicationPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PublicationPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the is_active column
	 * 
	 * @param     boolean|string $isActive The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function filterByIsActive($isActive = null, $comparison = null)
	{
		if (is_string($isActive)) {
			$is_active = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(PublicationPeer::IS_ACTIVE, $isActive, $comparison);
	}

	/**
	 * Filter the query on the order column
	 * 
	 * @param     int|array $order The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function filterByOrder($order = null, $comparison = null)
	{
		if (is_array($order)) {
			$useMinMax = false;
			if (isset($order['min'])) {
				$this->addUsingAlias(PublicationPeer::ORDER, $order['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($order['max'])) {
				$this->addUsingAlias(PublicationPeer::ORDER, $order['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PublicationPeer::ORDER, $order, $comparison);
	}

	/**
	 * Filter the query on the file_address column
	 * 
	 * @param     string $fileAddress The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function filterByFileAddress($fileAddress = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fileAddress)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fileAddress)) {
				$fileAddress = str_replace('*', '%', $fileAddress);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PublicationPeer::FILE_ADDRESS, $fileAddress, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(PublicationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(PublicationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PublicationPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(PublicationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(PublicationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PublicationPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related PublicationI18n object
	 *
	 * @param     PublicationI18n $publicationI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function filterByPublicationI18n($publicationI18n, $comparison = null)
	{
		return $this
			->addUsingAlias(PublicationPeer::ID, $publicationI18n->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PublicationI18n relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function joinPublicationI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PublicationI18n');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'PublicationI18n');
		}
		
		return $this;
	}

	/**
	 * Use the PublicationI18n relation PublicationI18n object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PublicationI18nQuery A secondary query class using the current class as primary query
	 */
	public function usePublicationI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPublicationI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PublicationI18n', 'PublicationI18nQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Publication $publication Object to remove from the list of results
	 *
	 * @return    PublicationQuery The current query, for fluid interface
	 */
	public function prune($publication = null)
	{
		if ($publication) {
			$this->addUsingAlias(PublicationPeer::ID, $publication->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePublicationQuery
