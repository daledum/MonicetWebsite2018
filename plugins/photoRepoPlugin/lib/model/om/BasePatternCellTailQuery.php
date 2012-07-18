<?php


/**
 * Base class that represents a query for the 'pattern_cell_tail' table.
 *
 * 
 *
 * @method     PatternCellTailQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PatternCellTailQuery orderByPatternId($order = Criteria::ASC) Order by the pattern_id column
 * @method     PatternCellTailQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     PatternCellTailQuery orderByPoints($order = Criteria::ASC) Order by the points column
 *
 * @method     PatternCellTailQuery groupById() Group by the id column
 * @method     PatternCellTailQuery groupByPatternId() Group by the pattern_id column
 * @method     PatternCellTailQuery groupByName() Group by the name column
 * @method     PatternCellTailQuery groupByPoints() Group by the points column
 *
 * @method     PatternCellTailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PatternCellTailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PatternCellTailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PatternCellTailQuery leftJoinPattern($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pattern relation
 * @method     PatternCellTailQuery rightJoinPattern($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pattern relation
 * @method     PatternCellTailQuery innerJoinPattern($relationAlias = null) Adds a INNER JOIN clause to the query using the Pattern relation
 *
 * @method     PatternCellTail findOne(PropelPDO $con = null) Return the first PatternCellTail matching the query
 * @method     PatternCellTail findOneOrCreate(PropelPDO $con = null) Return the first PatternCellTail matching the query, or a new PatternCellTail object populated from the query conditions when no match is found
 *
 * @method     PatternCellTail findOneById(int $id) Return the first PatternCellTail filtered by the id column
 * @method     PatternCellTail findOneByPatternId(int $pattern_id) Return the first PatternCellTail filtered by the pattern_id column
 * @method     PatternCellTail findOneByName(string $name) Return the first PatternCellTail filtered by the name column
 * @method     PatternCellTail findOneByPoints(string $points) Return the first PatternCellTail filtered by the points column
 *
 * @method     array findById(int $id) Return PatternCellTail objects filtered by the id column
 * @method     array findByPatternId(int $pattern_id) Return PatternCellTail objects filtered by the pattern_id column
 * @method     array findByName(string $name) Return PatternCellTail objects filtered by the name column
 * @method     array findByPoints(string $points) Return PatternCellTail objects filtered by the points column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BasePatternCellTailQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePatternCellTailQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PatternCellTail', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PatternCellTailQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PatternCellTailQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PatternCellTailQuery) {
			return $criteria;
		}
		$query = new PatternCellTailQuery();
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
	 * @return    PatternCellTail|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PatternCellTailPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PatternCellTailQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PatternCellTailPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PatternCellTailQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PatternCellTailPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellTailQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PatternCellTailPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the pattern_id column
	 * 
	 * @param     int|array $patternId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellTailQuery The current query, for fluid interface
	 */
	public function filterByPatternId($patternId = null, $comparison = null)
	{
		if (is_array($patternId)) {
			$useMinMax = false;
			if (isset($patternId['min'])) {
				$this->addUsingAlias(PatternCellTailPeer::PATTERN_ID, $patternId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($patternId['max'])) {
				$this->addUsingAlias(PatternCellTailPeer::PATTERN_ID, $patternId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PatternCellTailPeer::PATTERN_ID, $patternId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellTailQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PatternCellTailPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the points column
	 * 
	 * @param     string $points The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellTailQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PatternCellTailPeer::POINTS, $points, $comparison);
	}

	/**
	 * Filter the query by a related Pattern object
	 *
	 * @param     Pattern $pattern  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternCellTailQuery The current query, for fluid interface
	 */
	public function filterByPattern($pattern, $comparison = null)
	{
		return $this
			->addUsingAlias(PatternCellTailPeer::PATTERN_ID, $pattern->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Pattern relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellTailQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     PatternCellTail $patternCellTail Object to remove from the list of results
	 *
	 * @return    PatternCellTailQuery The current query, for fluid interface
	 */
	public function prune($patternCellTail = null)
	{
		if ($patternCellTail) {
			$this->addUsingAlias(PatternCellTailPeer::ID, $patternCellTail->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePatternCellTailQuery
