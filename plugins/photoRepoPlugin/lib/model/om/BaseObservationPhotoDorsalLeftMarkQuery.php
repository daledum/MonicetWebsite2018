<?php


/**
 * Base class that represents a query for the 'observation_photo_dorsal_left_mark' table.
 *
 * 
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByObservationPhotoDorsalLeftId($order = Criteria::ASC) Order by the observation_photo_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByPatternCellDorsalLeftId($order = Criteria::ASC) Order by the pattern_cell_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByIsWide($order = Criteria::ASC) Order by the is_wide column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByIsDeep($order = Criteria::ASC) Order by the is_deep column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByContinuesFromCellId($order = Criteria::ASC) Order by the continues_from_cell_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByContinuesOnCellId($order = Criteria::ASC) Order by the continues_on_cell_id column
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery groupById() Group by the id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByObservationPhotoDorsalLeftId() Group by the observation_photo_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByPatternCellDorsalLeftId() Group by the pattern_cell_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByIsWide() Group by the is_wide column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByIsDeep() Group by the is_deep column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByContinuesFromCellId() Group by the continues_from_cell_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByContinuesOnCellId() Group by the continues_on_cell_id column
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoDorsalLeftMarkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoDorsalLeftMarkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery leftJoinObservationPhotoDorsalLeft($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalLeft relation
 * @method     ObservationPhotoDorsalLeftMarkQuery rightJoinObservationPhotoDorsalLeft($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalLeft relation
 * @method     ObservationPhotoDorsalLeftMarkQuery innerJoinObservationPhotoDorsalLeft($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalLeft relation
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery leftJoinPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellDorsalLeftRelatedByPatternCellDorsalLeftId relation
 * @method     ObservationPhotoDorsalLeftMarkQuery rightJoinPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellDorsalLeftRelatedByPatternCellDorsalLeftId relation
 * @method     ObservationPhotoDorsalLeftMarkQuery innerJoinPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellDorsalLeftRelatedByPatternCellDorsalLeftId relation
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery leftJoinPatternCellDorsalLeftRelatedByContinuesFromCellId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellDorsalLeftRelatedByContinuesFromCellId relation
 * @method     ObservationPhotoDorsalLeftMarkQuery rightJoinPatternCellDorsalLeftRelatedByContinuesFromCellId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellDorsalLeftRelatedByContinuesFromCellId relation
 * @method     ObservationPhotoDorsalLeftMarkQuery innerJoinPatternCellDorsalLeftRelatedByContinuesFromCellId($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellDorsalLeftRelatedByContinuesFromCellId relation
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery leftJoinPatternCellDorsalLeftRelatedByContinuesOnCellId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellDorsalLeftRelatedByContinuesOnCellId relation
 * @method     ObservationPhotoDorsalLeftMarkQuery rightJoinPatternCellDorsalLeftRelatedByContinuesOnCellId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellDorsalLeftRelatedByContinuesOnCellId relation
 * @method     ObservationPhotoDorsalLeftMarkQuery innerJoinPatternCellDorsalLeftRelatedByContinuesOnCellId($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellDorsalLeftRelatedByContinuesOnCellId relation
 *
 * @method     ObservationPhotoDorsalLeftMark findOne(PropelPDO $con = null) Return the first ObservationPhotoDorsalLeftMark matching the query
 * @method     ObservationPhotoDorsalLeftMark findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoDorsalLeftMark matching the query, or a new ObservationPhotoDorsalLeftMark object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoDorsalLeftMark findOneById(int $id) Return the first ObservationPhotoDorsalLeftMark filtered by the id column
 * @method     ObservationPhotoDorsalLeftMark findOneByObservationPhotoDorsalLeftId(int $observation_photo_dorsal_left_id) Return the first ObservationPhotoDorsalLeftMark filtered by the observation_photo_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMark findOneByPatternCellDorsalLeftId(int $pattern_cell_dorsal_left_id) Return the first ObservationPhotoDorsalLeftMark filtered by the pattern_cell_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMark findOneByIsWide(boolean $is_wide) Return the first ObservationPhotoDorsalLeftMark filtered by the is_wide column
 * @method     ObservationPhotoDorsalLeftMark findOneByIsDeep(boolean $is_deep) Return the first ObservationPhotoDorsalLeftMark filtered by the is_deep column
 * @method     ObservationPhotoDorsalLeftMark findOneByContinuesFromCellId(int $continues_from_cell_id) Return the first ObservationPhotoDorsalLeftMark filtered by the continues_from_cell_id column
 * @method     ObservationPhotoDorsalLeftMark findOneByContinuesOnCellId(int $continues_on_cell_id) Return the first ObservationPhotoDorsalLeftMark filtered by the continues_on_cell_id column
 *
 * @method     array findById(int $id) Return ObservationPhotoDorsalLeftMark objects filtered by the id column
 * @method     array findByObservationPhotoDorsalLeftId(int $observation_photo_dorsal_left_id) Return ObservationPhotoDorsalLeftMark objects filtered by the observation_photo_dorsal_left_id column
 * @method     array findByPatternCellDorsalLeftId(int $pattern_cell_dorsal_left_id) Return ObservationPhotoDorsalLeftMark objects filtered by the pattern_cell_dorsal_left_id column
 * @method     array findByIsWide(boolean $is_wide) Return ObservationPhotoDorsalLeftMark objects filtered by the is_wide column
 * @method     array findByIsDeep(boolean $is_deep) Return ObservationPhotoDorsalLeftMark objects filtered by the is_deep column
 * @method     array findByContinuesFromCellId(int $continues_from_cell_id) Return ObservationPhotoDorsalLeftMark objects filtered by the continues_from_cell_id column
 * @method     array findByContinuesOnCellId(int $continues_on_cell_id) Return ObservationPhotoDorsalLeftMark objects filtered by the continues_on_cell_id column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoDorsalLeftMarkQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoDorsalLeftMarkQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhotoDorsalLeftMark', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoDorsalLeftMarkQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoDorsalLeftMarkQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoDorsalLeftMarkQuery();
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
	 * @return    ObservationPhotoDorsalLeftMark|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoDorsalLeftMarkPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the observation_photo_dorsal_left_id column
	 * 
	 * @param     int|array $observationPhotoDorsalLeftId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalLeftId($observationPhotoDorsalLeftId = null, $comparison = null)
	{
		if (is_array($observationPhotoDorsalLeftId)) {
			$useMinMax = false;
			if (isset($observationPhotoDorsalLeftId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID, $observationPhotoDorsalLeftId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($observationPhotoDorsalLeftId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID, $observationPhotoDorsalLeftId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID, $observationPhotoDorsalLeftId, $comparison);
	}

	/**
	 * Filter the query on the pattern_cell_dorsal_left_id column
	 * 
	 * @param     int|array $patternCellDorsalLeftId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellDorsalLeftId($patternCellDorsalLeftId = null, $comparison = null)
	{
		if (is_array($patternCellDorsalLeftId)) {
			$useMinMax = false;
			if (isset($patternCellDorsalLeftId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::PATTERN_CELL_DORSAL_LEFT_ID, $patternCellDorsalLeftId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($patternCellDorsalLeftId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::PATTERN_CELL_DORSAL_LEFT_ID, $patternCellDorsalLeftId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::PATTERN_CELL_DORSAL_LEFT_ID, $patternCellDorsalLeftId, $comparison);
	}

	/**
	 * Filter the query on the is_wide column
	 * 
	 * @param     boolean|string $isWide The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByIsWide($isWide = null, $comparison = null)
	{
		if (is_string($isWide)) {
			$is_wide = in_array(strtolower($isWide), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::IS_WIDE, $isWide, $comparison);
	}

	/**
	 * Filter the query on the is_deep column
	 * 
	 * @param     boolean|string $isDeep The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByIsDeep($isDeep = null, $comparison = null)
	{
		if (is_string($isDeep)) {
			$is_deep = in_array(strtolower($isDeep), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::IS_DEEP, $isDeep, $comparison);
	}

	/**
	 * Filter the query on the continues_from_cell_id column
	 * 
	 * @param     int|array $continuesFromCellId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByContinuesFromCellId($continuesFromCellId = null, $comparison = null)
	{
		if (is_array($continuesFromCellId)) {
			$useMinMax = false;
			if (isset($continuesFromCellId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::CONTINUES_FROM_CELL_ID, $continuesFromCellId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($continuesFromCellId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::CONTINUES_FROM_CELL_ID, $continuesFromCellId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::CONTINUES_FROM_CELL_ID, $continuesFromCellId, $comparison);
	}

	/**
	 * Filter the query on the continues_on_cell_id column
	 * 
	 * @param     int|array $continuesOnCellId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByContinuesOnCellId($continuesOnCellId = null, $comparison = null)
	{
		if (is_array($continuesOnCellId)) {
			$useMinMax = false;
			if (isset($continuesOnCellId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::CONTINUES_ON_CELL_ID, $continuesOnCellId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($continuesOnCellId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::CONTINUES_ON_CELL_ID, $continuesOnCellId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::CONTINUES_ON_CELL_ID, $continuesOnCellId, $comparison);
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalLeft object
	 *
	 * @param     ObservationPhotoDorsalLeft $observationPhotoDorsalLeft  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalLeft($observationPhotoDorsalLeft, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID, $observationPhotoDorsalLeft->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalLeft relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalLeft($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalLeft');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalLeft');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalLeft relation ObservationPhotoDorsalLeft object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalLeftQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalLeft($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalLeft', 'ObservationPhotoDorsalLeftQuery');
	}

	/**
	 * Filter the query by a related PatternCellDorsalLeft object
	 *
	 * @param     PatternCellDorsalLeft $patternCellDorsalLeft  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId($patternCellDorsalLeft, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::PATTERN_CELL_DORSAL_LEFT_ID, $patternCellDorsalLeft->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellDorsalLeftRelatedByPatternCellDorsalLeftId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function joinPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellDorsalLeftRelatedByPatternCellDorsalLeftId');
		
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
			$this->addJoinObject($join, 'PatternCellDorsalLeftRelatedByPatternCellDorsalLeftId');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellDorsalLeftRelatedByPatternCellDorsalLeftId relation PatternCellDorsalLeft object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalLeftQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellDorsalLeftRelatedByPatternCellDorsalLeftIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellDorsalLeftRelatedByPatternCellDorsalLeftId', 'PatternCellDorsalLeftQuery');
	}

	/**
	 * Filter the query by a related PatternCellDorsalLeft object
	 *
	 * @param     PatternCellDorsalLeft $patternCellDorsalLeft  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellDorsalLeftRelatedByContinuesFromCellId($patternCellDorsalLeft, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::CONTINUES_FROM_CELL_ID, $patternCellDorsalLeft->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellDorsalLeftRelatedByContinuesFromCellId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function joinPatternCellDorsalLeftRelatedByContinuesFromCellId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellDorsalLeftRelatedByContinuesFromCellId');
		
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
			$this->addJoinObject($join, 'PatternCellDorsalLeftRelatedByContinuesFromCellId');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellDorsalLeftRelatedByContinuesFromCellId relation PatternCellDorsalLeft object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalLeftQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellDorsalLeftRelatedByContinuesFromCellIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPatternCellDorsalLeftRelatedByContinuesFromCellId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellDorsalLeftRelatedByContinuesFromCellId', 'PatternCellDorsalLeftQuery');
	}

	/**
	 * Filter the query by a related PatternCellDorsalLeft object
	 *
	 * @param     PatternCellDorsalLeft $patternCellDorsalLeft  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellDorsalLeftRelatedByContinuesOnCellId($patternCellDorsalLeft, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::CONTINUES_ON_CELL_ID, $patternCellDorsalLeft->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellDorsalLeftRelatedByContinuesOnCellId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function joinPatternCellDorsalLeftRelatedByContinuesOnCellId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellDorsalLeftRelatedByContinuesOnCellId');
		
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
			$this->addJoinObject($join, 'PatternCellDorsalLeftRelatedByContinuesOnCellId');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellDorsalLeftRelatedByContinuesOnCellId relation PatternCellDorsalLeft object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalLeftQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellDorsalLeftRelatedByContinuesOnCellIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPatternCellDorsalLeftRelatedByContinuesOnCellId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellDorsalLeftRelatedByContinuesOnCellId', 'PatternCellDorsalLeftQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ObservationPhotoDorsalLeftMark $observationPhotoDorsalLeftMark Object to remove from the list of results
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function prune($observationPhotoDorsalLeftMark = null)
	{
		if ($observationPhotoDorsalLeftMark) {
			$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::ID, $observationPhotoDorsalLeftMark->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoDorsalLeftMarkQuery
