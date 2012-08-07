<?php


/**
 * Base class that represents a query for the 'observation_photo_tail_mark' table.
 *
 * 
 *
 * @method     ObservationPhotoTailMarkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoTailMarkQuery orderByObservationPhotoTailId($order = Criteria::ASC) Order by the observation_photo_tail_id column
 * @method     ObservationPhotoTailMarkQuery orderByPatternCellTailId($order = Criteria::ASC) Order by the pattern_cell_tail_id column
 * @method     ObservationPhotoTailMarkQuery orderByIsWide($order = Criteria::ASC) Order by the is_wide column
 * @method     ObservationPhotoTailMarkQuery orderByIsDeep($order = Criteria::ASC) Order by the is_deep column
 * @method     ObservationPhotoTailMarkQuery orderByContinuesFromCellId($order = Criteria::ASC) Order by the continues_from_cell_id column
 * @method     ObservationPhotoTailMarkQuery orderByContinuesOnCellId($order = Criteria::ASC) Order by the continues_on_cell_id column
 *
 * @method     ObservationPhotoTailMarkQuery groupById() Group by the id column
 * @method     ObservationPhotoTailMarkQuery groupByObservationPhotoTailId() Group by the observation_photo_tail_id column
 * @method     ObservationPhotoTailMarkQuery groupByPatternCellTailId() Group by the pattern_cell_tail_id column
 * @method     ObservationPhotoTailMarkQuery groupByIsWide() Group by the is_wide column
 * @method     ObservationPhotoTailMarkQuery groupByIsDeep() Group by the is_deep column
 * @method     ObservationPhotoTailMarkQuery groupByContinuesFromCellId() Group by the continues_from_cell_id column
 * @method     ObservationPhotoTailMarkQuery groupByContinuesOnCellId() Group by the continues_on_cell_id column
 *
 * @method     ObservationPhotoTailMarkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoTailMarkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoTailMarkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoTailMarkQuery leftJoinObservationPhotoTail($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoTail relation
 * @method     ObservationPhotoTailMarkQuery rightJoinObservationPhotoTail($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoTail relation
 * @method     ObservationPhotoTailMarkQuery innerJoinObservationPhotoTail($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoTail relation
 *
 * @method     ObservationPhotoTailMarkQuery leftJoinPatternCellTailRelatedByPatternCellTailId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellTailRelatedByPatternCellTailId relation
 * @method     ObservationPhotoTailMarkQuery rightJoinPatternCellTailRelatedByPatternCellTailId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellTailRelatedByPatternCellTailId relation
 * @method     ObservationPhotoTailMarkQuery innerJoinPatternCellTailRelatedByPatternCellTailId($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellTailRelatedByPatternCellTailId relation
 *
 * @method     ObservationPhotoTailMarkQuery leftJoinPatternCellTailRelatedByContinuesFromCellId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellTailRelatedByContinuesFromCellId relation
 * @method     ObservationPhotoTailMarkQuery rightJoinPatternCellTailRelatedByContinuesFromCellId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellTailRelatedByContinuesFromCellId relation
 * @method     ObservationPhotoTailMarkQuery innerJoinPatternCellTailRelatedByContinuesFromCellId($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellTailRelatedByContinuesFromCellId relation
 *
 * @method     ObservationPhotoTailMarkQuery leftJoinPatternCellTailRelatedByContinuesOnCellId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellTailRelatedByContinuesOnCellId relation
 * @method     ObservationPhotoTailMarkQuery rightJoinPatternCellTailRelatedByContinuesOnCellId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellTailRelatedByContinuesOnCellId relation
 * @method     ObservationPhotoTailMarkQuery innerJoinPatternCellTailRelatedByContinuesOnCellId($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellTailRelatedByContinuesOnCellId relation
 *
 * @method     ObservationPhotoTailMark findOne(PropelPDO $con = null) Return the first ObservationPhotoTailMark matching the query
 * @method     ObservationPhotoTailMark findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoTailMark matching the query, or a new ObservationPhotoTailMark object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoTailMark findOneById(int $id) Return the first ObservationPhotoTailMark filtered by the id column
 * @method     ObservationPhotoTailMark findOneByObservationPhotoTailId(int $observation_photo_tail_id) Return the first ObservationPhotoTailMark filtered by the observation_photo_tail_id column
 * @method     ObservationPhotoTailMark findOneByPatternCellTailId(int $pattern_cell_tail_id) Return the first ObservationPhotoTailMark filtered by the pattern_cell_tail_id column
 * @method     ObservationPhotoTailMark findOneByIsWide(boolean $is_wide) Return the first ObservationPhotoTailMark filtered by the is_wide column
 * @method     ObservationPhotoTailMark findOneByIsDeep(boolean $is_deep) Return the first ObservationPhotoTailMark filtered by the is_deep column
 * @method     ObservationPhotoTailMark findOneByContinuesFromCellId(int $continues_from_cell_id) Return the first ObservationPhotoTailMark filtered by the continues_from_cell_id column
 * @method     ObservationPhotoTailMark findOneByContinuesOnCellId(int $continues_on_cell_id) Return the first ObservationPhotoTailMark filtered by the continues_on_cell_id column
 *
 * @method     array findById(int $id) Return ObservationPhotoTailMark objects filtered by the id column
 * @method     array findByObservationPhotoTailId(int $observation_photo_tail_id) Return ObservationPhotoTailMark objects filtered by the observation_photo_tail_id column
 * @method     array findByPatternCellTailId(int $pattern_cell_tail_id) Return ObservationPhotoTailMark objects filtered by the pattern_cell_tail_id column
 * @method     array findByIsWide(boolean $is_wide) Return ObservationPhotoTailMark objects filtered by the is_wide column
 * @method     array findByIsDeep(boolean $is_deep) Return ObservationPhotoTailMark objects filtered by the is_deep column
 * @method     array findByContinuesFromCellId(int $continues_from_cell_id) Return ObservationPhotoTailMark objects filtered by the continues_from_cell_id column
 * @method     array findByContinuesOnCellId(int $continues_on_cell_id) Return ObservationPhotoTailMark objects filtered by the continues_on_cell_id column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoTailMarkQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoTailMarkQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhotoTailMark', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoTailMarkQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoTailMarkQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoTailMarkQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoTailMarkQuery();
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
	 * @return    ObservationPhotoTailMark|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoTailMarkPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the observation_photo_tail_id column
	 * 
	 * @param     int|array $observationPhotoTailId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoTailId($observationPhotoTailId = null, $comparison = null)
	{
		if (is_array($observationPhotoTailId)) {
			$useMinMax = false;
			if (isset($observationPhotoTailId['min'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, $observationPhotoTailId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($observationPhotoTailId['max'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, $observationPhotoTailId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, $observationPhotoTailId, $comparison);
	}

	/**
	 * Filter the query on the pattern_cell_tail_id column
	 * 
	 * @param     int|array $patternCellTailId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellTailId($patternCellTailId = null, $comparison = null)
	{
		if (is_array($patternCellTailId)) {
			$useMinMax = false;
			if (isset($patternCellTailId['min'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, $patternCellTailId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($patternCellTailId['max'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, $patternCellTailId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, $patternCellTailId, $comparison);
	}

	/**
	 * Filter the query on the is_wide column
	 * 
	 * @param     boolean|string $isWide The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByIsWide($isWide = null, $comparison = null)
	{
		if (is_string($isWide)) {
			$is_wide = in_array(strtolower($isWide), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::IS_WIDE, $isWide, $comparison);
	}

	/**
	 * Filter the query on the is_deep column
	 * 
	 * @param     boolean|string $isDeep The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByIsDeep($isDeep = null, $comparison = null)
	{
		if (is_string($isDeep)) {
			$is_deep = in_array(strtolower($isDeep), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::IS_DEEP, $isDeep, $comparison);
	}

	/**
	 * Filter the query on the continues_from_cell_id column
	 * 
	 * @param     int|array $continuesFromCellId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByContinuesFromCellId($continuesFromCellId = null, $comparison = null)
	{
		if (is_array($continuesFromCellId)) {
			$useMinMax = false;
			if (isset($continuesFromCellId['min'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, $continuesFromCellId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($continuesFromCellId['max'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, $continuesFromCellId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, $continuesFromCellId, $comparison);
	}

	/**
	 * Filter the query on the continues_on_cell_id column
	 * 
	 * @param     int|array $continuesOnCellId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByContinuesOnCellId($continuesOnCellId = null, $comparison = null)
	{
		if (is_array($continuesOnCellId)) {
			$useMinMax = false;
			if (isset($continuesOnCellId['min'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, $continuesOnCellId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($continuesOnCellId['max'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, $continuesOnCellId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, $continuesOnCellId, $comparison);
	}

	/**
	 * Filter the query by a related ObservationPhotoTail object
	 *
	 * @param     ObservationPhotoTail $observationPhotoTail  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoTail($observationPhotoTail, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, $observationPhotoTail->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoTail relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoTail($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoTail');
		
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
			$this->addJoinObject($join, 'ObservationPhotoTail');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoTail relation ObservationPhotoTail object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoTailQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoTailQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoTail($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoTail', 'ObservationPhotoTailQuery');
	}

	/**
	 * Filter the query by a related PatternCellTail object
	 *
	 * @param     PatternCellTail $patternCellTail  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellTailRelatedByPatternCellTailId($patternCellTail, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, $patternCellTail->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellTailRelatedByPatternCellTailId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function joinPatternCellTailRelatedByPatternCellTailId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellTailRelatedByPatternCellTailId');
		
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
			$this->addJoinObject($join, 'PatternCellTailRelatedByPatternCellTailId');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellTailRelatedByPatternCellTailId relation PatternCellTail object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellTailQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellTailRelatedByPatternCellTailIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPatternCellTailRelatedByPatternCellTailId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellTailRelatedByPatternCellTailId', 'PatternCellTailQuery');
	}

	/**
	 * Filter the query by a related PatternCellTail object
	 *
	 * @param     PatternCellTail $patternCellTail  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellTailRelatedByContinuesFromCellId($patternCellTail, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, $patternCellTail->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellTailRelatedByContinuesFromCellId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function joinPatternCellTailRelatedByContinuesFromCellId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellTailRelatedByContinuesFromCellId');
		
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
			$this->addJoinObject($join, 'PatternCellTailRelatedByContinuesFromCellId');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellTailRelatedByContinuesFromCellId relation PatternCellTail object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellTailQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellTailRelatedByContinuesFromCellIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPatternCellTailRelatedByContinuesFromCellId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellTailRelatedByContinuesFromCellId', 'PatternCellTailQuery');
	}

	/**
	 * Filter the query by a related PatternCellTail object
	 *
	 * @param     PatternCellTail $patternCellTail  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellTailRelatedByContinuesOnCellId($patternCellTail, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, $patternCellTail->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellTailRelatedByContinuesOnCellId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function joinPatternCellTailRelatedByContinuesOnCellId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellTailRelatedByContinuesOnCellId');
		
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
			$this->addJoinObject($join, 'PatternCellTailRelatedByContinuesOnCellId');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellTailRelatedByContinuesOnCellId relation PatternCellTail object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellTailQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellTailRelatedByContinuesOnCellIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPatternCellTailRelatedByContinuesOnCellId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellTailRelatedByContinuesOnCellId', 'PatternCellTailQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ObservationPhotoTailMark $observationPhotoTailMark Object to remove from the list of results
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function prune($observationPhotoTailMark = null)
	{
		if ($observationPhotoTailMark) {
			$this->addUsingAlias(ObservationPhotoTailMarkPeer::ID, $observationPhotoTailMark->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoTailMarkQuery
