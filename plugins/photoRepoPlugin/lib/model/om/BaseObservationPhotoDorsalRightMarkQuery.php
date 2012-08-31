<?php


/**
 * Base class that represents a query for the 'observation_photo_dorsal_right_mark' table.
 *
 * 
 *
 * @method     ObservationPhotoDorsalRightMarkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByObservationPhotoDorsalRightId($order = Criteria::ASC) Order by the observation_photo_dorsal_right_id column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByPatternCellDorsalRightId($order = Criteria::ASC) Order by the pattern_cell_dorsal_right_id column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByIsWide($order = Criteria::ASC) Order by the is_wide column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByIsDeep($order = Criteria::ASC) Order by the is_deep column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByToCellId($order = Criteria::ASC) Order by the to_cell_id column
 *
 * @method     ObservationPhotoDorsalRightMarkQuery groupById() Group by the id column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByObservationPhotoDorsalRightId() Group by the observation_photo_dorsal_right_id column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByPatternCellDorsalRightId() Group by the pattern_cell_dorsal_right_id column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByIsWide() Group by the is_wide column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByIsDeep() Group by the is_deep column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByToCellId() Group by the to_cell_id column
 *
 * @method     ObservationPhotoDorsalRightMarkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoDorsalRightMarkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoDorsalRightMarkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoDorsalRightMarkQuery leftJoinObservationPhotoDorsalRight($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalRight relation
 * @method     ObservationPhotoDorsalRightMarkQuery rightJoinObservationPhotoDorsalRight($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalRight relation
 * @method     ObservationPhotoDorsalRightMarkQuery innerJoinObservationPhotoDorsalRight($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalRight relation
 *
 * @method     ObservationPhotoDorsalRightMarkQuery leftJoinPatternCellDorsalRightRelatedByPatternCellDorsalRightId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellDorsalRightRelatedByPatternCellDorsalRightId relation
 * @method     ObservationPhotoDorsalRightMarkQuery rightJoinPatternCellDorsalRightRelatedByPatternCellDorsalRightId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellDorsalRightRelatedByPatternCellDorsalRightId relation
 * @method     ObservationPhotoDorsalRightMarkQuery innerJoinPatternCellDorsalRightRelatedByPatternCellDorsalRightId($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellDorsalRightRelatedByPatternCellDorsalRightId relation
 *
 * @method     ObservationPhotoDorsalRightMarkQuery leftJoinPatternCellDorsalRightRelatedByToCellId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellDorsalRightRelatedByToCellId relation
 * @method     ObservationPhotoDorsalRightMarkQuery rightJoinPatternCellDorsalRightRelatedByToCellId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellDorsalRightRelatedByToCellId relation
 * @method     ObservationPhotoDorsalRightMarkQuery innerJoinPatternCellDorsalRightRelatedByToCellId($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellDorsalRightRelatedByToCellId relation
 *
 * @method     ObservationPhotoDorsalRightMark findOne(PropelPDO $con = null) Return the first ObservationPhotoDorsalRightMark matching the query
 * @method     ObservationPhotoDorsalRightMark findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoDorsalRightMark matching the query, or a new ObservationPhotoDorsalRightMark object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoDorsalRightMark findOneById(int $id) Return the first ObservationPhotoDorsalRightMark filtered by the id column
 * @method     ObservationPhotoDorsalRightMark findOneByObservationPhotoDorsalRightId(int $observation_photo_dorsal_right_id) Return the first ObservationPhotoDorsalRightMark filtered by the observation_photo_dorsal_right_id column
 * @method     ObservationPhotoDorsalRightMark findOneByPatternCellDorsalRightId(int $pattern_cell_dorsal_right_id) Return the first ObservationPhotoDorsalRightMark filtered by the pattern_cell_dorsal_right_id column
 * @method     ObservationPhotoDorsalRightMark findOneByIsWide(boolean $is_wide) Return the first ObservationPhotoDorsalRightMark filtered by the is_wide column
 * @method     ObservationPhotoDorsalRightMark findOneByIsDeep(boolean $is_deep) Return the first ObservationPhotoDorsalRightMark filtered by the is_deep column
 * @method     ObservationPhotoDorsalRightMark findOneByToCellId(int $to_cell_id) Return the first ObservationPhotoDorsalRightMark filtered by the to_cell_id column
 *
 * @method     array findById(int $id) Return ObservationPhotoDorsalRightMark objects filtered by the id column
 * @method     array findByObservationPhotoDorsalRightId(int $observation_photo_dorsal_right_id) Return ObservationPhotoDorsalRightMark objects filtered by the observation_photo_dorsal_right_id column
 * @method     array findByPatternCellDorsalRightId(int $pattern_cell_dorsal_right_id) Return ObservationPhotoDorsalRightMark objects filtered by the pattern_cell_dorsal_right_id column
 * @method     array findByIsWide(boolean $is_wide) Return ObservationPhotoDorsalRightMark objects filtered by the is_wide column
 * @method     array findByIsDeep(boolean $is_deep) Return ObservationPhotoDorsalRightMark objects filtered by the is_deep column
 * @method     array findByToCellId(int $to_cell_id) Return ObservationPhotoDorsalRightMark objects filtered by the to_cell_id column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoDorsalRightMarkQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoDorsalRightMarkQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhotoDorsalRightMark', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoDorsalRightMarkQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoDorsalRightMarkQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoDorsalRightMarkQuery();
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
	 * @return    ObservationPhotoDorsalRightMark|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoDorsalRightMarkPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the observation_photo_dorsal_right_id column
	 * 
	 * @param     int|array $observationPhotoDorsalRightId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalRightId($observationPhotoDorsalRightId = null, $comparison = null)
	{
		if (is_array($observationPhotoDorsalRightId)) {
			$useMinMax = false;
			if (isset($observationPhotoDorsalRightId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::OBSERVATION_PHOTO_DORSAL_RIGHT_ID, $observationPhotoDorsalRightId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($observationPhotoDorsalRightId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::OBSERVATION_PHOTO_DORSAL_RIGHT_ID, $observationPhotoDorsalRightId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::OBSERVATION_PHOTO_DORSAL_RIGHT_ID, $observationPhotoDorsalRightId, $comparison);
	}

	/**
	 * Filter the query on the pattern_cell_dorsal_right_id column
	 * 
	 * @param     int|array $patternCellDorsalRightId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellDorsalRightId($patternCellDorsalRightId = null, $comparison = null)
	{
		if (is_array($patternCellDorsalRightId)) {
			$useMinMax = false;
			if (isset($patternCellDorsalRightId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::PATTERN_CELL_DORSAL_RIGHT_ID, $patternCellDorsalRightId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($patternCellDorsalRightId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::PATTERN_CELL_DORSAL_RIGHT_ID, $patternCellDorsalRightId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::PATTERN_CELL_DORSAL_RIGHT_ID, $patternCellDorsalRightId, $comparison);
	}

	/**
	 * Filter the query on the is_wide column
	 * 
	 * @param     boolean|string $isWide The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByIsWide($isWide = null, $comparison = null)
	{
		if (is_string($isWide)) {
			$is_wide = in_array(strtolower($isWide), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::IS_WIDE, $isWide, $comparison);
	}

	/**
	 * Filter the query on the is_deep column
	 * 
	 * @param     boolean|string $isDeep The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByIsDeep($isDeep = null, $comparison = null)
	{
		if (is_string($isDeep)) {
			$is_deep = in_array(strtolower($isDeep), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::IS_DEEP, $isDeep, $comparison);
	}

	/**
	 * Filter the query on the to_cell_id column
	 * 
	 * @param     int|array $toCellId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByToCellId($toCellId = null, $comparison = null)
	{
		if (is_array($toCellId)) {
			$useMinMax = false;
			if (isset($toCellId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::TO_CELL_ID, $toCellId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($toCellId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::TO_CELL_ID, $toCellId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::TO_CELL_ID, $toCellId, $comparison);
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalRight object
	 *
	 * @param     ObservationPhotoDorsalRight $observationPhotoDorsalRight  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalRight($observationPhotoDorsalRight, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::OBSERVATION_PHOTO_DORSAL_RIGHT_ID, $observationPhotoDorsalRight->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalRight relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalRight($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalRight');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalRight');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalRight relation ObservationPhotoDorsalRight object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalRightQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalRight($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalRight', 'ObservationPhotoDorsalRightQuery');
	}

	/**
	 * Filter the query by a related PatternCellDorsalRight object
	 *
	 * @param     PatternCellDorsalRight $patternCellDorsalRight  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellDorsalRightRelatedByPatternCellDorsalRightId($patternCellDorsalRight, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::PATTERN_CELL_DORSAL_RIGHT_ID, $patternCellDorsalRight->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellDorsalRightRelatedByPatternCellDorsalRightId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function joinPatternCellDorsalRightRelatedByPatternCellDorsalRightId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellDorsalRightRelatedByPatternCellDorsalRightId');
		
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
			$this->addJoinObject($join, 'PatternCellDorsalRightRelatedByPatternCellDorsalRightId');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellDorsalRightRelatedByPatternCellDorsalRightId relation PatternCellDorsalRight object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalRightQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellDorsalRightRelatedByPatternCellDorsalRightIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPatternCellDorsalRightRelatedByPatternCellDorsalRightId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellDorsalRightRelatedByPatternCellDorsalRightId', 'PatternCellDorsalRightQuery');
	}

	/**
	 * Filter the query by a related PatternCellDorsalRight object
	 *
	 * @param     PatternCellDorsalRight $patternCellDorsalRight  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByPatternCellDorsalRightRelatedByToCellId($patternCellDorsalRight, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::TO_CELL_ID, $patternCellDorsalRight->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellDorsalRightRelatedByToCellId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function joinPatternCellDorsalRightRelatedByToCellId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellDorsalRightRelatedByToCellId');
		
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
			$this->addJoinObject($join, 'PatternCellDorsalRightRelatedByToCellId');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellDorsalRightRelatedByToCellId relation PatternCellDorsalRight object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalRightQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellDorsalRightRelatedByToCellIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPatternCellDorsalRightRelatedByToCellId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellDorsalRightRelatedByToCellId', 'PatternCellDorsalRightQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ObservationPhotoDorsalRightMark $observationPhotoDorsalRightMark Object to remove from the list of results
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function prune($observationPhotoDorsalRightMark = null)
	{
		if ($observationPhotoDorsalRightMark) {
			$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::ID, $observationPhotoDorsalRightMark->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoDorsalRightMarkQuery
