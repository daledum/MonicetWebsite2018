<?php


/**
 * Base class that represents a query for the 'watch_post' table.
 *
 * 
 *
 * @method     WatchPostQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     WatchPostQuery orderByCompanyId($order = Criteria::ASC) Order by the company_id column
 * @method     WatchPostQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     WatchPostQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method     WatchPostQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 * @method     WatchPostQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     WatchPostQuery orderByObservations($order = Criteria::ASC) Order by the observations column
 * @method     WatchPostQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     WatchPostQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     WatchPostQuery groupById() Group by the id column
 * @method     WatchPostQuery groupByCompanyId() Group by the company_id column
 * @method     WatchPostQuery groupByName() Group by the name column
 * @method     WatchPostQuery groupByLatitude() Group by the latitude column
 * @method     WatchPostQuery groupByLongitude() Group by the longitude column
 * @method     WatchPostQuery groupByHeight() Group by the height column
 * @method     WatchPostQuery groupByObservations() Group by the observations column
 * @method     WatchPostQuery groupByCreatedAt() Group by the created_at column
 * @method     WatchPostQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     WatchPostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     WatchPostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     WatchPostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     WatchPostQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method     WatchPostQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method     WatchPostQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method     WatchPostQuery leftJoinWatchInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the WatchInfo relation
 * @method     WatchPostQuery rightJoinWatchInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WatchInfo relation
 * @method     WatchPostQuery innerJoinWatchInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the WatchInfo relation
 *
 * @method     WatchPost findOne(PropelPDO $con = null) Return the first WatchPost matching the query
 * @method     WatchPost findOneOrCreate(PropelPDO $con = null) Return the first WatchPost matching the query, or a new WatchPost object populated from the query conditions when no match is found
 *
 * @method     WatchPost findOneById(int $id) Return the first WatchPost filtered by the id column
 * @method     WatchPost findOneByCompanyId(int $company_id) Return the first WatchPost filtered by the company_id column
 * @method     WatchPost findOneByName(string $name) Return the first WatchPost filtered by the name column
 * @method     WatchPost findOneByLatitude(string $latitude) Return the first WatchPost filtered by the latitude column
 * @method     WatchPost findOneByLongitude(string $longitude) Return the first WatchPost filtered by the longitude column
 * @method     WatchPost findOneByHeight(double $height) Return the first WatchPost filtered by the height column
 * @method     WatchPost findOneByObservations(string $observations) Return the first WatchPost filtered by the observations column
 * @method     WatchPost findOneByCreatedAt(string $created_at) Return the first WatchPost filtered by the created_at column
 * @method     WatchPost findOneByUpdatedAt(string $updated_at) Return the first WatchPost filtered by the updated_at column
 *
 * @method     array findById(int $id) Return WatchPost objects filtered by the id column
 * @method     array findByCompanyId(int $company_id) Return WatchPost objects filtered by the company_id column
 * @method     array findByName(string $name) Return WatchPost objects filtered by the name column
 * @method     array findByLatitude(string $latitude) Return WatchPost objects filtered by the latitude column
 * @method     array findByLongitude(string $longitude) Return WatchPost objects filtered by the longitude column
 * @method     array findByHeight(double $height) Return WatchPost objects filtered by the height column
 * @method     array findByObservations(string $observations) Return WatchPost objects filtered by the observations column
 * @method     array findByCreatedAt(string $created_at) Return WatchPost objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return WatchPost objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseWatchPostQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseWatchPostQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'WatchPost', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new WatchPostQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    WatchPostQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof WatchPostQuery) {
			return $criteria;
		}
		$query = new WatchPostQuery();
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
	 * @return    WatchPost|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = WatchPostPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(WatchPostPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(WatchPostPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(WatchPostPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the company_id column
	 * 
	 * @param     int|array $companyId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByCompanyId($companyId = null, $comparison = null)
	{
		if (is_array($companyId)) {
			$useMinMax = false;
			if (isset($companyId['min'])) {
				$this->addUsingAlias(WatchPostPeer::COMPANY_ID, $companyId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($companyId['max'])) {
				$this->addUsingAlias(WatchPostPeer::COMPANY_ID, $companyId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchPostPeer::COMPANY_ID, $companyId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WatchPostPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the latitude column
	 * 
	 * @param     string $latitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByLatitude($latitude = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($latitude)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $latitude)) {
				$latitude = str_replace('*', '%', $latitude);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WatchPostPeer::LATITUDE, $latitude, $comparison);
	}

	/**
	 * Filter the query on the longitude column
	 * 
	 * @param     string $longitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByLongitude($longitude = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($longitude)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $longitude)) {
				$longitude = str_replace('*', '%', $longitude);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WatchPostPeer::LONGITUDE, $longitude, $comparison);
	}

	/**
	 * Filter the query on the height column
	 * 
	 * @param     double|array $height The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByHeight($height = null, $comparison = null)
	{
		if (is_array($height)) {
			$useMinMax = false;
			if (isset($height['min'])) {
				$this->addUsingAlias(WatchPostPeer::HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($height['max'])) {
				$this->addUsingAlias(WatchPostPeer::HEIGHT, $height['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchPostPeer::HEIGHT, $height, $comparison);
	}

	/**
	 * Filter the query on the observations column
	 * 
	 * @param     string $observations The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByObservations($observations = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($observations)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $observations)) {
				$observations = str_replace('*', '%', $observations);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WatchPostPeer::OBSERVATIONS, $observations, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(WatchPostPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(WatchPostPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchPostPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(WatchPostPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(WatchPostPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchPostPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Company object
	 *
	 * @param     Company $company  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByCompany($company, $comparison = null)
	{
		return $this
			->addUsingAlias(WatchPostPeer::COMPANY_ID, $company->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Company relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function joinCompany($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Company');
		
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
			$this->addJoinObject($join, 'Company');
		}
		
		return $this;
	}

	/**
	 * Use the Company relation Company object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery A secondary query class using the current class as primary query
	 */
	public function useCompanyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCompany($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Company', 'CompanyQuery');
	}

	/**
	 * Filter the query by a related WatchInfo object
	 *
	 * @param     WatchInfo $watchInfo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function filterByWatchInfo($watchInfo, $comparison = null)
	{
		return $this
			->addUsingAlias(WatchPostPeer::ID, $watchInfo->getWatchPostId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WatchInfo relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function joinWatchInfo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WatchInfo');
		
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
			$this->addJoinObject($join, 'WatchInfo');
		}
		
		return $this;
	}

	/**
	 * Use the WatchInfo relation WatchInfo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchInfoQuery A secondary query class using the current class as primary query
	 */
	public function useWatchInfoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWatchInfo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WatchInfo', 'WatchInfoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     WatchPost $watchPost Object to remove from the list of results
	 *
	 * @return    WatchPostQuery The current query, for fluid interface
	 */
	public function prune($watchPost = null)
	{
		if ($watchPost) {
			$this->addUsingAlias(WatchPostPeer::ID, $watchPost->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseWatchPostQuery
