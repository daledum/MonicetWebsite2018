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
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByToCellId($order = Criteria::ASC) Order by the to_cell_id column
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery groupById() Group by the id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByObservationPhotoDorsalLeftId() Group by the observation_photo_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByPatternCellDorsalLeftId() Group by the pattern_cell_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByIsWide() Group by the is_wide column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByIsDeep() Group by the is_deep column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByToCellId() Group by the to_cell_id column
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
 * @method     ObservationPhotoDorsalLeftMarkQuery leftJoinPatternCellDorsalLeftRelatedByToCellId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellDorsalLeftRelatedByToCellId relation
 * @method     ObservationPhotoDorsalLeftMarkQuery rightJoinPatternCellDorsalLeftRelatedByToCellId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellDorsalLeftRelatedByToCellId relation
 * @method     ObservationPhotoDorsalLeftMarkQuery innerJoinPatternCellDorsalLeftRelatedByToCellId($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellDorsalLeftRelatedByToCellId relation
 *
 * @method     ObservationPhotoDorsalLeftMark findOne(PropelPDO $con = null) Return the first ObservationPhotoDorsalLeftMark matching the query
 * @method     ObservationPhotoDorsalLeftMark findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoDorsalLeftMark matching the query, or a new ObservationPhotoDorsalLeftMark object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoDorsalLeftMark findOneById(int $id) Return the first ObservationPhotoDorsalLeftMark filtered by the id column
 * @method     ObservationPhotoDorsalLeftMark findOneByObservationPhotoDorsalLeftId(int $observation_photo_dorsal_left_id) Return the first ObservationPhotoDorsalLeftMark filtered by the observation_photo_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMark findOneByPatternCellDorsalLeftId(int $pattern_cell_dorsal_left_id) Return the first ObservationPhotoDorsalLeftMark filtered by the pattern_cell_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMark findOneByIsWide(boolean $is_wide) Return the first ObservationPhotoDorsalLeftMark filtered by the is_wide column
 * @method     ObservationPhotoDorsalLeftMark findOneByIsDeep(boolean $is_deep) Return the first ObservationPhotoDorsalLeftMark filtered by the is_deep column
 * @method     ObservationPhotoDorsalLeftMark findOneByToCellId(int $to_cell_id) Return the first ObservationPhotoDorsalLeftMark filtered by the to_cell_id column
 *
 * @method     array findById(int $id) Return ObservationPhotoDorsalLeftMark objects filtered by the id column
 * @method     array findByObservationPhotoDorsalLeftId(int $observation_photo_dorsal_left_id) Return ObservationPhotoDorsalLeftMark objects filtered by the observation_photo_dorsal_left_id column
 * @method     array findByPatternCellDorsalLeftId(int $pattern_cell_dorsal_left_id) Return ObservationPhotoDorsalLeftMark objects filtered by the pattern_cell_dorsal_left_id column
 * @method     array findByIsWide(boolean $is_wide) Return ObservationPhotoDorsalLeftMark objects filtered by the is_wide column
 * @method     array findByIsDeep(boolean $is_deep) Return ObservationPhotoDorsalLeftMark objects filtered by the is_deep column
 * @method     array findByToCellId(int $to_cell_id) Return ObservationPhotoDorsalLeftMark objects filtered by the to_cell_id column
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
	 * Filter the query on the to_cell_id column
	 * 
	 * @param     int|array $toCellId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByToCellId($toCellId = null, $comparison = null)
	{
		if (is_array($toCellId)) {
			$useMinMax = false;
			if (isset($toCellId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::TO_CELL_ID, $toCellId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($toCellId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::TO_CELL_ID, $toCellId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::TO_CELL_ID, $toCellId, $comparison);
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
	public function filterByPatternCellDorsalLeftRelatedByToCellId($patternCellDorsalLeft, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::TO_CELL_ID, $patternCellDorsalLeft->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellDorsalLeftRelatedByToCellId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function joinPatternCellDorsalLeftRelatedByToCellId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellDorsalLeftRelatedByToCellId');
		
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
			$this->addJoinObject($join, 'PatternCellDorsalLeftRelatedByToCellId');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellDorsalLeftRelatedByToCellId relation PatternCellDorsalLeft object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalLeftQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellDorsalLeftRelatedByToCellIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPatternCellDorsalLeftRelatedByToCellId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellDorsalLeftRelatedByToCellId', 'PatternCellDorsalLeftQuery');
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
