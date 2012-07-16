<?php


/**
 * Base class that represents a query for the 'observation_photo_dorsal_right' table.
 *
 * 
 *
 * @method     ObservationPhotoDorsalRightQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoDorsalRightQuery orderByPhotoId($order = Criteria::ASC) Order by the photo_id column
 * @method     ObservationPhotoDorsalRightQuery orderByIsSmooth($order = Criteria::ASC) Order by the is_smooth column
 * @method     ObservationPhotoDorsalRightQuery orderByIsIrregular($order = Criteria::ASC) Order by the is_irregular column
 *
 * @method     ObservationPhotoDorsalRightQuery groupById() Group by the id column
 * @method     ObservationPhotoDorsalRightQuery groupByPhotoId() Group by the photo_id column
 * @method     ObservationPhotoDorsalRightQuery groupByIsSmooth() Group by the is_smooth column
 * @method     ObservationPhotoDorsalRightQuery groupByIsIrregular() Group by the is_irregular column
 *
 * @method     ObservationPhotoDorsalRightQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoDorsalRightQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoDorsalRightQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoDorsalRightQuery leftJoinObservationPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhoto relation
 * @method     ObservationPhotoDorsalRightQuery rightJoinObservationPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhoto relation
 * @method     ObservationPhotoDorsalRightQuery innerJoinObservationPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhoto relation
 *
 * @method     ObservationPhotoDorsalRightQuery leftJoinObservationPhotoDorsalRightMark($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalRightMark relation
 * @method     ObservationPhotoDorsalRightQuery rightJoinObservationPhotoDorsalRightMark($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalRightMark relation
 * @method     ObservationPhotoDorsalRightQuery innerJoinObservationPhotoDorsalRightMark($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalRightMark relation
 *
 * @method     ObservationPhotoDorsalRight findOne(PropelPDO $con = null) Return the first ObservationPhotoDorsalRight matching the query
 * @method     ObservationPhotoDorsalRight findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoDorsalRight matching the query, or a new ObservationPhotoDorsalRight object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoDorsalRight findOneById(int $id) Return the first ObservationPhotoDorsalRight filtered by the id column
 * @method     ObservationPhotoDorsalRight findOneByPhotoId(int $photo_id) Return the first ObservationPhotoDorsalRight filtered by the photo_id column
 * @method     ObservationPhotoDorsalRight findOneByIsSmooth(boolean $is_smooth) Return the first ObservationPhotoDorsalRight filtered by the is_smooth column
 * @method     ObservationPhotoDorsalRight findOneByIsIrregular(boolean $is_irregular) Return the first ObservationPhotoDorsalRight filtered by the is_irregular column
 *
 * @method     array findById(int $id) Return ObservationPhotoDorsalRight objects filtered by the id column
 * @method     array findByPhotoId(int $photo_id) Return ObservationPhotoDorsalRight objects filtered by the photo_id column
 * @method     array findByIsSmooth(boolean $is_smooth) Return ObservationPhotoDorsalRight objects filtered by the is_smooth column
 * @method     array findByIsIrregular(boolean $is_irregular) Return ObservationPhotoDorsalRight objects filtered by the is_irregular column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoDorsalRightQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoDorsalRightQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhotoDorsalRight', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoDorsalRightQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoDorsalRightQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoDorsalRightQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoDorsalRightQuery();
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
	 * @return    ObservationPhotoDorsalRight|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoDorsalRightPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalRightPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalRightPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the photo_id column
	 * 
	 * @param     int|array $photoId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByPhotoId($photoId = null, $comparison = null)
	{
		if (is_array($photoId)) {
			$useMinMax = false;
			if (isset($photoId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightPeer::PHOTO_ID, $photoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($photoId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightPeer::PHOTO_ID, $photoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightPeer::PHOTO_ID, $photoId, $comparison);
	}

	/**
	 * Filter the query on the is_smooth column
	 * 
	 * @param     boolean|string $isSmooth The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByIsSmooth($isSmooth = null, $comparison = null)
	{
		if (is_string($isSmooth)) {
			$is_smooth = in_array(strtolower($isSmooth), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightPeer::IS_SMOOTH, $isSmooth, $comparison);
	}

	/**
	 * Filter the query on the is_irregular column
	 * 
	 * @param     boolean|string $isIrregular The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByIsIrregular($isIrregular = null, $comparison = null)
	{
		if (is_string($isIrregular)) {
			$is_irregular = in_array(strtolower($isIrregular), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightPeer::IS_IRREGULAR, $isIrregular, $comparison);
	}

	/**
	 * Filter the query by a related ObservationPhoto object
	 *
	 * @param     ObservationPhoto $observationPhoto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByObservationPhoto($observationPhoto, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalRightPeer::PHOTO_ID, $observationPhoto->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhoto relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function joinObservationPhoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhoto');
		
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
			$this->addJoinObject($join, 'ObservationPhoto');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhoto relation ObservationPhoto object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhoto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhoto', 'ObservationPhotoQuery');
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalRightMark object
	 *
	 * @param     ObservationPhotoDorsalRightMark $observationPhotoDorsalRightMark  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalRightMark($observationPhotoDorsalRightMark, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalRightPeer::ID, $observationPhotoDorsalRightMark->getObservationPhotoDorsalRightId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalRightMark relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalRightMark($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalRightMark');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalRightMark');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalRightMark relation ObservationPhotoDorsalRightMark object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalRightMarkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalRightMark($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalRightMark', 'ObservationPhotoDorsalRightMarkQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ObservationPhotoDorsalRight $observationPhotoDorsalRight Object to remove from the list of results
	 *
	 * @return    ObservationPhotoDorsalRightQuery The current query, for fluid interface
	 */
	public function prune($observationPhotoDorsalRight = null)
	{
		if ($observationPhotoDorsalRight) {
			$this->addUsingAlias(ObservationPhotoDorsalRightPeer::ID, $observationPhotoDorsalRight->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoDorsalRightQuery
