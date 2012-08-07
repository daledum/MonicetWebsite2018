<?php


/**
 * Base class that represents a query for the 'pattern_cell_dorsal_left' table.
 *
 * 
 *
 * @method     PatternCellDorsalLeftQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PatternCellDorsalLeftQuery orderByPatternId($order = Criteria::ASC) Order by the pattern_id column
 * @method     PatternCellDorsalLeftQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     PatternCellDorsalLeftQuery orderByPoints($order = Criteria::ASC) Order by the points column
 *
 * @method     PatternCellDorsalLeftQuery groupById() Group by the id column
 * @method     PatternCellDorsalLeftQuery groupByPatternId() Group by the pattern_id column
 * @method     PatternCellDorsalLeftQuery groupByName() Group by the name column
 * @method     PatternCellDorsalLeftQuery groupByPoints() Group by the points column
 *
 * @method     PatternCellDorsalLeftQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PatternCellDorsalLeftQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PatternCellDorsalLeftQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PatternCellDorsalLeftQuery leftJoinPattern($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pattern relation
 * @method     PatternCellDorsalLeftQuery rightJoinPattern($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pattern relation
 * @method     PatternCellDorsalLeftQuery innerJoinPattern($relationAlias = null) Adds a INNER JOIN clause to the query using the Pattern relation
 *
 * @method     PatternCellDorsalLeftQuery leftJoinObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId relation
 * @method     PatternCellDorsalLeftQuery rightJoinObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId relation
 * @method     PatternCellDorsalLeftQuery innerJoinObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId relation
 *
 * @method     PatternCellDorsalLeftQuery leftJoinObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId relation
 * @method     PatternCellDorsalLeftQuery rightJoinObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId relation
 * @method     PatternCellDorsalLeftQuery innerJoinObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId relation
 *
 * @method     PatternCellDorsalLeftQuery leftJoinObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId relation
 * @method     PatternCellDorsalLeftQuery rightJoinObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId relation
 * @method     PatternCellDorsalLeftQuery innerJoinObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId relation
 *
 * @method     PatternCellDorsalLeft findOne(PropelPDO $con = null) Return the first PatternCellDorsalLeft matching the query
 * @method     PatternCellDorsalLeft findOneOrCreate(PropelPDO $con = null) Return the first PatternCellDorsalLeft matching the query, or a new PatternCellDorsalLeft object populated from the query conditions when no match is found
 *
 * @method     PatternCellDorsalLeft findOneById(int $id) Return the first PatternCellDorsalLeft filtered by the id column
 * @method     PatternCellDorsalLeft findOneByPatternId(int $pattern_id) Return the first PatternCellDorsalLeft filtered by the pattern_id column
 * @method     PatternCellDorsalLeft findOneByName(string $name) Return the first PatternCellDorsalLeft filtered by the name column
 * @method     PatternCellDorsalLeft findOneByPoints(string $points) Return the first PatternCellDorsalLeft filtered by the points column
 *
 * @method     array findById(int $id) Return PatternCellDorsalLeft objects filtered by the id column
 * @method     array findByPatternId(int $pattern_id) Return PatternCellDorsalLeft objects filtered by the pattern_id column
 * @method     array findByName(string $name) Return PatternCellDorsalLeft objects filtered by the name column
 * @method     array findByPoints(string $points) Return PatternCellDorsalLeft objects filtered by the points column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BasePatternCellDorsalLeftQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePatternCellDorsalLeftQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PatternCellDorsalLeft', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PatternCellDorsalLeftQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PatternCellDorsalLeftQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PatternCellDorsalLeftQuery) {
			return $criteria;
		}
		$query = new PatternCellDorsalLeftQuery();
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
	 * @return    PatternCellDorsalLeft|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PatternCellDorsalLeftPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PatternCellDorsalLeftPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PatternCellDorsalLeftPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PatternCellDorsalLeftPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the pattern_id column
	 * 
	 * @param     int|array $patternId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByPatternId($patternId = null, $comparison = null)
	{
		if (is_array($patternId)) {
			$useMinMax = false;
			if (isset($patternId['min'])) {
				$this->addUsingAlias(PatternCellDorsalLeftPeer::PATTERN_ID, $patternId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($patternId['max'])) {
				$this->addUsingAlias(PatternCellDorsalLeftPeer::PATTERN_ID, $patternId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PatternCellDorsalLeftPeer::PATTERN_ID, $patternId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PatternCellDorsalLeftPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the points column
	 * 
	 * @param     string $points The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByPoints($points = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($points)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $points)) {
				$points = str_replace('*', '%', $points);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PatternCellDorsalLeftPeer::POINTS, $points, $comparison);
	}

	/**
	 * Filter the query by a related Pattern object
	 *
	 * @param     Pattern $pattern  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByPattern($pattern, $comparison = null)
	{
		return $this
			->addUsingAlias(PatternCellDorsalLeftPeer::PATTERN_ID, $pattern->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Pattern relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function joinPattern($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pattern');
		
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
			$this->addJoinObject($join, 'Pattern');
		}
		
		return $this;
	}

	/**
	 * Use the Pattern relation Pattern object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternQuery A secondary query class using the current class as primary query
	 */
	public function usePatternQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPattern($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pattern', 'PatternQuery');
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalLeftMark object
	 *
	 * @param     ObservationPhotoDorsalLeftMark $observationPhotoDorsalLeftMark  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId($observationPhotoDorsalLeftMark, $comparison = null)
	{
		return $this
			->addUsingAlias(PatternCellDorsalLeftPeer::ID, $observationPhotoDorsalLeftMark->getPatternCellDorsalLeftId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId relation ObservationPhotoDorsalLeftMark object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalLeftMarkRelatedByPatternCellDorsalLeftId', 'ObservationPhotoDorsalLeftMarkQuery');
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalLeftMark object
	 *
	 * @param     ObservationPhotoDorsalLeftMark $observationPhotoDorsalLeftMark  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId($observationPhotoDorsalLeftMark, $comparison = null)
	{
		return $this
			->addUsingAlias(PatternCellDorsalLeftPeer::ID, $observationPhotoDorsalLeftMark->getContinuesFromCellId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId relation ObservationPhotoDorsalLeftMark object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalLeftMarkRelatedByContinuesFromCellId', 'ObservationPhotoDorsalLeftMarkQuery');
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalLeftMark object
	 *
	 * @param     ObservationPhotoDorsalLeftMark $observationPhotoDorsalLeftMark  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId($observationPhotoDorsalLeftMark, $comparison = null)
	{
		return $this
			->addUsingAlias(PatternCellDorsalLeftPeer::ID, $observationPhotoDorsalLeftMark->getContinuesOnCellId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId relation ObservationPhotoDorsalLeftMark object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalLeftMarkRelatedByContinuesOnCellId', 'ObservationPhotoDorsalLeftMarkQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PatternCellDorsalLeft $patternCellDorsalLeft Object to remove from the list of results
	 *
	 * @return    PatternCellDorsalLeftQuery The current query, for fluid interface
	 */
	public function prune($patternCellDorsalLeft = null)
	{
		if ($patternCellDorsalLeft) {
			$this->addUsingAlias(PatternCellDorsalLeftPeer::ID, $patternCellDorsalLeft->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePatternCellDorsalLeftQuery
